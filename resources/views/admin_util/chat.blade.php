@extends('admin_layouts.master')
@section('main')
    <div class="title">
                <a href="/html/admin/chat_list.html">
                    <i class="fas fa-angle-left"></i>
                    <h1>Chat</h1>
                </a>
            </div>
            <div class="chat-window">
                <div class="id">
                    <div class="user">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="identity">
                        <h3>ID : 1</h3>
                        <h3>User : Jessica</h3>
                    </div>
                </div>
                <div class="chat-ctr">
                    <div class="user-chat">
                        <label>Hello World.....</label><span>16.30</span>
                    </div>
                </div>
                <div class="answer">
                    <input type="text" class="answer-input">
                    <i class="fas fa-paper-plane"></i>
                </div>
            </div>
@endsection