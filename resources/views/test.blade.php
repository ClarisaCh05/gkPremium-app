<script>
    $(function () {
        let $chatInput = $(".chat-input");
        let $messageWrapper = $("#messageWrapper");

        // Get previous_url from the query string and set it as the initial chat input value
        let urlParams = new URLSearchParams(window.location.search);
        let previousUrl = urlParams.get('previous_url');

        if (previousUrl) {
            $chatInput.html(`<a href="${previousUrl}" target="_blank">${previousUrl}</a>`);
        }

        let user_id = "{{ auth()->user()->id }}";
        let ip_address = '127.0.0.1';
        let socket_port = '8005';
        let socket = io(ip_address + ':' + socket_port);

        let friendId = 4; // Set friendId directly to 4

        socket.on('connect', function() {
            socket.emit('user_connected', user_id);
        });

        fetchConversation(friendId); // Fetch conversation on load

        function fetchConversation(friendId) {
            console.log("Fetching conversation for user ID:", friendId);
            $.ajax({
                url: "{{ route('message.conversation', '') }}/" + friendId,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
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
                sendMessage(message);
                return false;
            }
        });

        function sendMessage(message) {
            let url = "{{ route('message.send-message') }}";
            let token = "{{ csrf_token() }}";

            if (!friendId) {
                console.error('No friend selected for sending message');
                return;
            }

            let formData = new FormData();
            formData.append('message', message);
            formData.append('_token', token);
            formData.append('receiver_id', friendId);
            
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
            let content = $('<div>').html(message.content).text();
            let formattedContent = content.replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank">$1</a>');

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
                    '<div class="message-text">\n' + formattedContent +
                    '</div>\n' +
                '</div>\n' +
            '</div>';
            
            $messageWrapper.append(messageElement);
        }

        function appendMessageToSender(message) {
            let name = '{{ $myInfo->name }}';
            let content = $('<div>').html(message).text();
            let formattedContent = content.replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank">$1</a>');

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
                    '<div class="message-text">\n' + formattedContent +
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
