@extends('layouts.app')

@section('css')
    <style>
        main {
            margin-top: 8px;
        }

        .logo img {
            width: 10rem;
        }

        .title p {
            font-size: 40px;
            font-weight: 600;
        }

        .form.login p {
            padding: 0;
            margin-bottom: 8px;
        }

        .form.login input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
        }

        .form.login a {
            font-size: 12px;
        }

        #login-btn {
            width: 30%;
            padding: 8px;
            background-color: black;
            border-radius: 5px;
            color: white;
            letter-spacing: 3px;
            margin: 16px 0px 16px 0;
        }

        .csr {
            margin-left: 60px;
        }

        .carousel-inner img {
            height: 45rem;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="logo">
                <img src="/img/logo-gk.png">
            </div>
            <div class="title">
                <p>Selamat Datang Kembali di Website Gudang Kostum Premium Surabaya</p>
            </div>
            <form class="form login" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <p for="email" class="col-form-label">{{ __('Email Address') }}</p>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <p for="password" class="col-form-label">{{ __('Password') }}</p>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-0">
                    <div class="col-md-8">
                        <button type="submit" id="login-btn">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            <a href="{{ route('register') }}">Belum punya akun? Buat di sini</a>
        </div>
        <div class="col">
            <div class="csr">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="/img/IMG_20190129_112103_045.jpg" class="d-block">
                      </div>
                      <div class="carousel-item">
                        <img src="/img/IMG_20171110_211532_802 (1).jpg" class="d-block">
                      </div>
                      <div class="carousel-item">
                        <img src="/img/IMG_20171110_210325_976 (1).jpg" class="d-block">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
