{{-- Admin Chat --}}
@extends('admin_layouts.master')
@section('css')
<style>
    .chat-row {
        border: 1px solid lightgray;
        padding: 16px
    }

    .chat-input {
        border: 1px solid black; 
        border-radius: 10px; 
        padding: 8px 10px;
    }

    .chatInput {
        border: 1px solid red !important;
        background-color: yellow !important;
        z-index: 1000 !important;
    }
    
    .list-group li {
        display: flex;
        list-style: none;
        margin-bottom: 8px;
        align-items: center;
        border-top: 1px solid lightgrey;
        border-bottom: 1px solid lightgrey;
        padding: 8px 0 8px 0; 
    }

    .list-group li:hover {
        background-color: lightgrey;
    }

    .list-group a {
        color: black;
        text-decoration: none;
        margin-right: 16px;
    }
    
    .message-listing {
        height: 30rem;
    }

    h5 {
        text-decoration: underline;
    }

    .chat-section {
        border-left: 1px solid lightgrey;
    }

    .chat-name {
        margin: 8px 0 8px 0;
    }

    .chat-header {
        margin-bottom: 8px;
        border-bottom: 1px solid lightgrey;
    }

</style>
@endsection
@section('main')
    <div class="col-md-3">
        <h1>Chat</h1>
    </div>
    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <h5 style="font-weight: 600;">Users</h5>
                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach ($users as $user)
                            <li class="chat-user-list @if($user->id == $friendInfo->id) active @endif">
                                <a href="javascript:void(0)" data-id="{{ $user->id }}" class="user-link" style="font-weight: 600;">
                                    {{ $user->name }}
                                </a>
                                <div class="remove-chat">
                                    <button class="btn btn-danger" id="remove" value="${{ $user->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-9 chat-section">
            <div class="chat-header" id="chatHeader">
                <div class="chat-name" style="font-weight: 600; margin-left:8px;">
                    {{ $friendInfo->name }}
                </div>
            </div>
            <div class="chat-body">
                <div class="message-listing" id="messageWrapper"> 
                    @foreach ($messages as $message)
                        <div class="row message align-items-center mb-2">
                            <div class="col-md-12 user-info">
                                <div class="chat-image">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="chat-name">
                                    {{ $message['sender_name'] }}
                                    <span class="small time" title="{{ $message['created_at'] }}">
                                        {{ \Carbon\Carbon::parse($message['created_at'])->format('h:mm A') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12 message-content">
                                <div class="message-text">
                                    {{ $message['content'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="chat-box">
                <div class="chat-input" id="chatInput" contenteditable=""></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            let $chatHeader = $("#chatHeader");
            let $chatName = $chatHeader.find(".chat-name");
            let $chatInput = $(".chat-input");
            let $chatBody = $(".chat-body");
            let $messageWrapper = $("#messageWrapper");

            $chatInput.on('focus', function () {
                console.log('Chat input focused');
            });
            
            let user_id = "{{ auth()->user()->id }}"
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);

            let friendId = "{{ $friendInfo->id }}";

            socket.on('connect', function() {
                socket.emit('user_connected', user_id);
            });

            $(document).on('click', '.user-link', function() {
                friendId = $(this).data('id');
                console.log("User link clicked, friendId:", friendId); // Added logging
                $('.user-link').closest('li').removeClass('active');
                $(this).closest('li').addClass('active');
                fetchConversation(friendId);
            });

            $(document).on('click', '.btn-danger', function() {
                let friendId = $(this).val().replace('$', '');
                if (confirm('Are you sure you want to delete this chat history?')) {
                    deleteChat(friendId);
                }
            });

            function deleteChat(friendId) {
                $.ajax({
                    url: "{{ route('message.delete-chat', '') }}/" + friendId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log('Chat history deleted');
                            // Optionally clear the message display if the current chat is deleted
                            if (friendId == "{{ $friendInfo->id }}") {
                                $messageWrapper.html('');
                            }
                        } else {
                            console.error('Error deleting chat history:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting chat history:', error);
                    }
                });
            }

            function fetchConversation(friendId) {
                console.log("Fetching conversation for user ID:", friendId);
                $.ajax({
                    url: "{{ route('message.conversation', '') }}/" + friendId,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            $chatName.text(response.friendInfo.name);
                            $messageWrapper.html(''); // Clear previous messages
                            response.messages.forEach(message => {
                                appendMessageToWrapper(message);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching conversation:', error);
                    }
                });
            }

            $chatInput.keypress(function (e) {
                let message = $(this).html();
                if (e.which === 13 && !e.shiftKey) {
                    e.preventDefault();
                    $chatInput.html("");
                    console.log('friendinfo:', friendId)
                    sendMessage(message);
                    return false;
                }
            });

            function sendMessage(message) {
                let url = "{{ route('message.send-message') }}";
                let token = "{{ csrf_token() }}";
                console.log(friendId)

                // Check if a friend is selected
                if (!friendId) {
                    console.error('No friend selected for sending message');
                    return;
                }

                console.log("Sending message to friend ID:", friendId);

                let formData = new FormData();
                formData.append('message', message);
                formData.append('_token', token);
                formData.append('reciever_id', friendId);
                
                appendMessageToSender(message);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    success: function(response) {
                        if(response.success){
                            console.log(response.data);
                        } else {
                            console.error('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Submission error:', error);
                    }
                });
            }

            function appendMessageToWrapper(message) {
                let messageElement = '<div class="row message align-items-center mb-2">' +
                    '<div class="col-md-12 user-info" style="display: flex; align-items: center; margin-top: 16px; margin-left:16px;">\n' +
                        '<div class="chat-image" style="margin-right: 10px">\n' +
                            '<i class="fas fa-user"></i>\n' +
                        '</div>\n' +
                        '<div class="chat-name" style="font-weight: 600; display:flex; flex-direction: row;">\n' +
                            message.sender_name +
                            '<span class="small time" title="'+moment(message.created_at).format('YYYY-MM-DD HH:mm:ss')+'" style="color: grey; margin-left: 5px; padding-top: 3px;">\n' +
                            moment(message.created_at).format('h:mm A') + '</span>\n' +
                        '</div>\n' +
                    '</div>\n' +
                    '<div class="col-md-12 message-content">\n' +
                        '<div class="message-text">\n' + message.content +
                        '</div>\n' +
                    '</div>\n' +
                '</div>';
                
                $messageWrapper.append(messageElement);
            }


            function appendMessageToSender(message) {
                let name = '{{ $myInfo->name }}';
                let messageElement = '<div class="row message align-items-center mb-2">' +
                    '<div class="col-md-12 user-info" style="display: flex; align-items: center; margin-top: 16px; margin-left:16px;">\n' +
                        '<div class="chat-image" style="margin-right: 10px">\n' +
                            '<i class="fas fa-user"></i>\n' +
                        '</div>\n' +
                        '<div class="chat-name" style="font-weight: 600; display:flex; flex-direction: row;">\n' +
                            name +
                            '<span class="small time" title="'+getCurrentDateTime()+'" style="color: grey; margin-left: 5px; padding-top: 3px;">\n' +
                            getCurrentTime() + '</span>\n' +
                        '</div>\n' +
                    '</div>\n' +
                    '<div class="col-md-12 message-content">\n' +
                        '<div class="message-text">\n' + message +
                        '</div>\n' +
                    '</div>\n' +
                '</div>';
                
                $messageWrapper.append(messageElement);
            }

            function getCurrentDateTime() {
                return moment().format('YYYY-MM-DD HH:mm:ss');
            }

            function getCurrentTime() {
                return moment().format('h:mm A');
            }

            socket.on("private-channel:PrivateMessageEvent", function (message) {
                appendMessageToWrapper(message);
            });
        });

    </script>
@endpush
