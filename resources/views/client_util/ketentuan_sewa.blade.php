@extends('layouts.home')
@section('css')
    <style>
        .breadcrumbs-ctr {
            margin-left: 32px;
            margin-top: 16px;
        }

        .container:last-child {
            margin-top: 24px;
            margin-bottom: 64px;
        }

        .container li {
            font-size: 18px;
            margin-bottom: 8px;
        }

        h2 {
            font-weight: bold;
        }
    </style>
@endsection
@section('main')
<div class="breadcrumbs-ctr">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('client.homepage') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ketentuan</li>
        </ol>
    </nav>
</div>
<div class="container">
    <h1>Ketentuan Sewa</h1>
</div>
<div class="container">
    <div class="kostum-detail">
        <div class="desc">
            <h2>1. Ketentuan Sewa</h2>
          <ul>
            <li>Harga yg tertera untuk sewa kostum selama 1-3 hari (diambil H-1 acara dan dikembalikan H+1 acara).</li>
            <li>Lebih dari 3 hari sewa akan dikenakan biaya tambah hari sebesar 25.000/kostum/hari.</li>
            <li>Jika ada pembatalan/pergantian kostum maka DP(uang muka) hangus atau sesuai kebijakan manajemen.</li>
            <li>Reschedule diperbolehkan 1x dengan menginfokan admin terlebih dahulu.</li>
            <li>Pelunasan sewa dan deposit(jaminan) sebelum kostum diambil.</li>
            <li>Deposit akan dikembalikan langsung tunai atau ditransfer maks H+2 (hari kerja) dari tgl pengembalian.</li>
            <li>Saat pengambilan kostum, mohon minta nota ke admin  (nota harus disimpan dengan baik).</li>
          </ul>
          <br>
          <h2>2. Ketentuan Pengiriman Luar Kota</h2>
          <ul>
            <li>Kostum akan di kirim H-3acara, dan penyewa kirimkan kembali ke Surabaya H+2 acara(terlampir resi).</li>
            <li>Untuk pengiriman luar kota ada tambahan biaya (menyesuaikan kostum, tempat dan pengiriman). kesepakatan dengan admin.
              Karna Jika di dalam surabaya sewa 3hari, lebih dari 3hari ada biaya tambahan 25.000/hari. Untuk keluar kota butuh 7-10hari (termasuk hari pengiriman dan sewa).
            </li>
            <li>Ongkir di tanggung oleh penyewa.</li>
          </ul>
        </div>
    </div>
</div>
@endsection