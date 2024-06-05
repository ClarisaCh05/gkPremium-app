<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use App\Events\PrivateMessageEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function conversation($userId) {
        $adminId = 4; // Assuming the admin ID is 4.
        $authUserId = Auth::id();

         // Log the user IDs for debugging
        Log::info('Authenticated User ID: ' . $authUserId); //1
        Log::info('User ID from Route: ' . $userId); //4

        // Check if the authenticated user is an admin or the specific user
        if (!in_array($authUserId, [$adminId, $userId])) {
            return response()->json(['message' => 'Unauthorized action.'], 403);
        }
    
        $users = User::where('id', '!=', Auth::id())->get();
        $friendInfo = User::findOrFail($userId);
        $myInfo = User::find(Auth::id());
    
        // Fetch user messages with the associated message content
        $userMessages = UserMessage::with('message')
            ->where(function ($q) use ($userId, $authUserId, $adminId) {
                $q->where(function ($q2) use ($authUserId, $adminId) {
                    $q2->where('sender_id', $authUserId)
                        ->where('reciever_id', $adminId);
                })
                ->orWhere(function ($q2) use ($authUserId, $adminId) {
                    $q2->where('sender_id', $adminId)
                        ->where('reciever_id', $authUserId);
                })
                ->orWhere(function ($q2) use ($userId, $adminId) {
                    $q2->where('sender_id', $userId)
                        ->where('reciever_id', $adminId);
                })
                ->orWhere(function ($q2) use ($userId, $adminId) {
                    $q2->where('sender_id', $adminId)
                        ->where('reciever_id', $userId);
                });
            })
            ->get();
    
        // Format messages to include sender name and message content
        $messages = $userMessages->map(function($userMessage) {
            $messageContent = $userMessage->message ? $userMessage->message->message : '[Deleted message]';
            $senderName = $userMessage->sender_id == Auth::id() ? Auth::user()->name : User::find($userMessage->sender_id)->name;
    
            return [
                'sender_name' => $senderName,
                'content' => $messageContent,
                'created_at' => $userMessage->created_at,
            ];
        });
    
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'friendInfo' => $friendInfo,
                'messages' => $messages,
            ]);
        }
    
        $data = [
            'users' => $users,
            'friendInfo' => $friendInfo,
            'myInfo' => $myInfo,
            'messages' => $messages,
            'userId' => $userId,
        ];
    
        if ($authUserId == $adminId) {
            return view('message.conversation', $data);
        } else {
            return view('client_util.client_chat', $data);
        }
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'message' => 'required',
            'reciever_id' => 'required'
        ]);

        $sender_id = Auth::id();
        $receiver_id = $request->reciever_id;

        $message = new Message();
        $message->message = $request->message;

        if($message->save()) {
            try {
                Log::info('Message saved', [
                    'message_id' => $message->id, 
                    'sender_id' => $sender_id, 
                    'receiver_id' => $receiver_id
                ]);
                $message->users()->attach($sender_id, ['reciever_id' => $receiver_id]);
                $sender = User::where('id', '=', $sender_id)->first();

                $data = [
                    'sender_id' => $sender_id,
                    'sender_name' => $sender->name,
                    'reciever_id' => $receiver_id,
                    'content' => $message->message,
                    'created_at' => $message->created_at,
                    'message_id' => $message->id,
                ];

                Log::info('Broadcasting event with data', $data);

                // event(new PrivateMessageEvent($data));
                event(new PrivateMessageEvent($data));

                return response()->json([
                    'data' => $data,
                    'success' => true,
                    'message' => 'Message sent successfully'
                ]);
            } catch (\Exception $e) {
                $message->delete();
                Log::error('Error sending message: ' . $e->getMessage(), ['exception' => $e]);
                return response()->json([
                    'success' => false,
                    'message' => 'Message could not be sent',
                    'error' => $e->getMessage()
                ], 500);
            }            
        }

        return response()->json([
            'success' => false,
            'message' => 'Message could not be sent'
        ], 500);
    }

    // MessageController.php

    public function deleteChat($friendId)
    {
        $authUserId = Auth::id();

        // Fetch user messages for the conversation
        $userMessages = UserMessage::where(function ($query) use ($authUserId, $friendId) {
            $query->where('sender_id', $authUserId)
                ->where('reciever_id', $friendId);
        })->orWhere(function ($query) use ($authUserId, $friendId) {
            $query->where('sender_id', $friendId)
                ->where('reciever_id', $authUserId);
        })->get();

        // Delete the messages
        foreach ($userMessages as $userMessage) {
            $message = $userMessage->message;
            if ($message) {
                $message->delete();
            }
            $userMessage->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Chat history deleted successfully'
        ]);
    }
}
