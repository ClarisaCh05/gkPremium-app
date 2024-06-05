@extends('layouts.home')
@section('css')
    <style>
        .breadcrumbs-ctr {
            margin-left: 32px;
            margin-top: 16px;
        }

        .container:last-child {
            margin-top: 64px;
        }

        .container .logo img {
            height: 15em;
        }

        .container .logo {
            text-align: center;
            margin: 2em;
        }

        .container .desc {
            text-align: justify;
            font-size: 18px;
        }

        .container .desc p {
            line-height: 1.8;
        }

        .container .desc h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 24px;
        }
    </style>
@endsection
@section('main')
<div class="breadcrumbs-ctr">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('client.homepage') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Siapa Kami</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="logo">
        <img src="/img/logo-gk.png">
    </div>
</div>
<div class="container">
    <div class="desc">
        <h1>Tentang Kami</h1>
        <p>Gudang Kostum adalah Costume Center yang berpusat di kota Surabaya, yang menjual dan menyewakan aneka kostum pilihan berkualitas, lengkap, bersih, dan terjangkau.
            Gudang Kostum sudah dipercaya banyak lembaga Perusahaan maupun Pemerintahan, Sekolah, maupun pribadi yang sedang mengadakan ACARA-ACARA spesial seperti Gala Dinner perusahaan,
            Ulang tahun perusahaan, Kostum untuk Ulang Tahun dan Perayaan lainnya, Acara 1001 Malam di Akhir Tahun, Lomba Fashion anak, Modelling, dan juga kostum Fotografi.
            Dengan menjaga kualitas layanan, Gudang Kostum telah menyewakan kostum terbaiknya di seluruh Indonesia.
        </p>
    </div>
</div>
<div class="container">
    <div class="desc">
        <h1>Pembelian Kostum</h1>
        <p>95% koleksi Gudang Kostum adalah berasal dari Import dan berkualitas, sedangkan sisanya dibuat dengan desain sendiri dengan penjahit yang ahli di bidang kostum.
            Kostum dapat dibeli apabila Ready Stok di Store ataupun melalui pemesanan PRE ORDER dengan lama pengerjaan sekitar 30 hari. Disarankan dapat memesan kostum lebih dari 30 hari.
        </p>
        <br>
        <p>Koleksi Lengkap ada di INSTAGRAM <a href="https://www.instagram.com/gudangkostum_surabaya/">@gudangkostum_surabaya</a></p>
    </div>
</div>
@endsection