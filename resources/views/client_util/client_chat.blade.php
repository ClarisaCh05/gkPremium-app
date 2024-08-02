{{-- Client chat --}}
@extends('layouts.home')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .chat-row {
        border: 1px solid lightgray;
        padding: 16px
    }

    /* Set the max height and make the chat body scrollable */
    .chat-body {
        max-height: 400px; /* You can adjust the height as needed */
        overflow-y: auto;
    }

    /* Optional: Add some styles to make the scrollbar look nice */
    .chat-body::-webkit-scrollbar {
        width: 8px;
    }

    .chat-body::-webkit-scrollbar-thumb {
        background-color: #888; 
        border-radius: 4px;
    }

    .chat-body::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    /* Ensure the chat input has some padding and is clearly separated from the chat body */
    .chat-box {
        border-top: 1px solid #ddd;
        padding: 10px;
    }

    .chat-input {
        border: 1px solid black; 
        border-radius: 10px; 
        padding: 8px 10px;
        min-height: 50px; /* Adjust as needed */
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
        font-weight: 600; 
        display:flex; 
        flex-direction: row;
    }

    .chat-header {
        margin-bottom: 8px;
        border-bottom: 1px solid lightgrey;
    }

    .chat-image {
        margin-right: 10px;
    }

    .user-info {
        display: flex; 
        align-items: center; 
        margin-top: 16px; 
        margin-left:16px;
    }

    .small.time {
        color: grey;
        margin-left: 5px; 
        padding-top: 3px;
    }

    .container {
        margin-top: 16px;
        margin-bottom: 16px;
    }

</style>
@endsection
@section('main')
    <div class="container">
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
                                @if($user->id == 4) <!-- Only show user with id=4 -->
                                <li class="chat-user-list @if($user->id == $friendInfo->id) active @endif">
                                    <a href="javascript:void(0)" data-id="{{ $user->id }}" class="user-link" style="font-weight: 600;">
                                        {{ $user->name }}
                                    </a>
                                </li>
                                @endif
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
                                            {{ \Carbon\Carbon::parse($message['created_at'])->format('h:i A') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 message-content">
                                    <div class="message-text">
                                        {!! $message['content'] !!}
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
            
            // Get previous_url from the query string and set it as the initial chat input value
            let urlParams = new URLSearchParams(window.location.search);
            let previousUrl = urlParams.get('previous_url');

            if (previousUrl) {
                $chatInput.html(`<a href="${previousUrl}" target="_blank">${previousUrl}</a>`);
            }

            let user_id = "{{ auth()->user()->id }}"
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);

            let friendId = 4; // Set friendId directly to 4

            socket.on('connect', function() {
                socket.emit('user_connected', user_id);
            });

            console.log("User ID:", user_id);

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
                console.log("text:", message);
                let messageElement = `<div class="row message align-items-center mb-2">
                    <div class="col-md-12 user-info" style="display: flex; align-items: center; margin-top: 16px; margin-left:16px;">
                        <div class="chat-image" style="margin-right: 10px">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="chat-name" style="font-weight: 600; display:flex; flex-direction: row;">
                            ${escapeHtml(message.sender_name)}
                            <span class="small time" title="${moment(message.created_at).format('YYYY-MM-DD HH:mm:ss')}" style="color: grey; margin-left: 5px; padding-top: 3px;">
                                ${moment(message.created_at).format('h:mm A')}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 message-content">
                        <div class="message-text">${escapeHtml(message.content)}</div>
                    </div>
                </div>`;

                $messageWrapper.append(messageElement);
            }


            function appendMessageToSender(message) {
                console.log("text:", message);
                let name = '{{ $myInfo->name }}';
                    let messageElement = `<div class="row message align-items-center mb-2">
                        <div class="col-md-12 user-info" style="display: flex; align-items: center; margin-top: 16px; margin-left:16px;">
                            <div class="chat-image" style="margin-right: 10px">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="chat-name" style="font-weight: 600; display:flex; flex-direction: row;">
                                ${escapeHtml(name)}
                                <span class="small time" title="${getCurrentDateTime()}" style="color: grey; margin-left: 5px; padding-top: 3px;">
                                    ${getCurrentTime()}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 message-content">
                            <div class="message-text">${escapeHtml(message)}</div>
                        </div>
                    </div>`;

                    $messageWrapper.append(messageElement);
            }

            function escapeHtml(text) {
                let map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };
                return text.replace(/[&<>"']/g, function(m) { return map[m]; });
            }

            function getCurrentDateTime() {
                return moment().format('YYYY-MM-DD HH:mm:ss');
            }

            function getCurrentTime() {
                return moment().format('h:mm A');
            }

            socket.on("private-channel:PrivateMessageEvent", function (message) {
                console.log("text:", message);
                appendMessageToWrapper(message);
            });
        });
    </script>
@endpush
