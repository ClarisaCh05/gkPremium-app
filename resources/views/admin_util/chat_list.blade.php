@extends('admin_layouts.master')
@section('main')
     <h1>Chat</h1>
            <div class="search-container">
                <div class="input">
                    <i class="fas fa-magnifying-glass"></i><span>Search</span>
                    <br>
                    <input type="text">
                </div>
                <div class="input">
                    <i class="fas fa-calendar"></i><span>Tanggal</span>
                    <br>
                    <input type="date">
                </div>
            </div>
            <div class="chat-list">
                <div class="chat-preview">
                    <i class="fas fa-user"></i>
                    <div class="detail">
                        <div class="id-btn">
                            <h3>ID : 1</h3>
                            <div class="btn-ctr">
                                <a type="button" href="/html/admin/chat.html" class="chat">
                                    <i class="fas fa-comment"></i>
                                </a>
                                <button type="button" class="trash"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <h3>User : Jessica</h3>
                        <h3>Message : </h3>
                        <label>Hello World......</label><span>12:59</span>
                    </div>
                </div>
                <div class="chat-preview">
                    <i class="fas fa-user"></i>
                    <div class="detail">
                        <div class="id-btn">
                            <h3>ID : 1</h3>
                            <div class="btn-ctr">
                                <button type="button" class="chat">
                                    <i class="fas fa-comment"></i>
                                </button>
                                <button type="button" class="trash"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <h3>User : Jessica</h3>
                        <h3>Message : </h3>
                        <label>Hello World......</label><span>12:59</span>
                    </div>
                </div>
                <div class="chat-preview">
                    <i class="fas fa-user"></i>
                    <div class="detail">
                        <div class="id-btn">
                            <h3>ID : 1</h3>
                            <div class="btn-ctr">
                                <button type="button" class="chat">
                                    <i class="fas fa-comment"></i>
                                </button>
                                <button type="button" class="trash"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <h3>User : Jessica</h3>
                        <h3>Message : </h3>
                        <label>Hello World......</label><span>12:59</span>
                    </div>
                </div>
            </div>
@endsection