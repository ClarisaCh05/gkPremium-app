@extends('layouts.app')

@section('content')
    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <h5>Users</h5>
        
                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach ($users as $user)
                            <li class="chat-user-list">
                                <a href="{{ route('message.conversation', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <h1>Message</h1>
            Select user from the list to start messaging
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(function () {
            let user_id = "{{ auth()->user()->id }}"
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);

            socket.on('connect', function() {
                socket.emit('user_connected', user_id);
            });

            socket.on('')
        })
    </script>
@endpush
