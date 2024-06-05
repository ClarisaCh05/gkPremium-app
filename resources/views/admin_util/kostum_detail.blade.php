@extends('admin_layouts.master')
@section('css')
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: black;
        }

        .row.katalog-detail span {
            font-size: 48px;
            font: bold;
        }

        .row.katalog-detail i {
            font-size: 40px;
            align-items: center;
            margin-right: 16px;
        }

        .col.image img {
            height: 40rem;
        }

        .col.details p {
            margin-bottom: 16px;
            font-size: 20px;
        }

        .add-btn {
            background-color: var(--main);
            padding: 8px 16px 8px 16px;
            border-radius: 5px;
            border: 2px solid black;
            text-decoration: none;
            color: black;
            font-weight: 600;
        }

        .add-ctr a:hover {
            color: black;
        }

        .add-ctr i {
            margin-left: 8px;
        }

        .add-ctr {
            margin: 24px 0 16px 0;
        }

    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row katalog-detail">
            <a href="{{ route('katalog') }}">
                <i class="fas fa-chevron-left"></i>
                <span>Kembali</span>
            </a>
            <div class="col image">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    @foreach ($costume->images as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ $image->imageUrl }}" class="d-block w-100" alt="Costume Image">
                    </div>
                    @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col details">
                @if ($costume)
                    <h2 class="title">{{ $costume->name }}</h2>
                    <p class="price">@price($costume->price)</p>
                    <p class="size">{{ $costume->size }}</p>
                    <hr>
                    <p class="description">{{ $costume->description }}</p>
                    <hr>
                @else
                    <p>Costume not found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection