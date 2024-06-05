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
            margin: 0;
        }

        input {
            margin: 0 0 0 12px !important;
        }    

        .button-ctr .col {
            margin: 0 12px 8px 12px;
        }

        a {
            padding: 0 0 16px 0 !important;
        }

        .csr {
            margin-right: 60px;
        }

        .carousel-inner img {
            height: 46rem;
            width: 100%;
        }

        .col {
            padding: 0 !important;
        }

    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="csr">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src={{ asset("/img/IMG_20190129_123003_248.jpg") }} class="d-block">
                      </div>
                      <div class="carousel-item">
                        <img src="/img/IMG_20171110_211532_802 (1).jpg" class="d-block">
                      </div>
                      <div class="carousel-item">
                        <img src={{ asset("/img/IMG_20190129_112103_045.jpg") }} class="d-block">
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="logo">
                <img src={{ asset("/img/logo-gk.png") }}>
            </div>
            <div class="title">
                <p>Selamat Datang di Website Gudang Kostum Premium Surabaya</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-1">
                    <p for="name" class="col-form-label">{{ __('Name') }}</p>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-1">
                    <p for="email" class="col-form-label">{{ __('Email Address') }}</p>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-1">
                    <p for="password" class="col-form-label">{{ __('Password') }}</p>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <p for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</p>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="row mb-0 button-ctr">
                    <div class="col">
                        <button type="submit" class="btn btn-dark">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('login') }}">Masuk menggunakan akun yang sudah ada</a>
        </div>
    </div>
</div>
@endsection
