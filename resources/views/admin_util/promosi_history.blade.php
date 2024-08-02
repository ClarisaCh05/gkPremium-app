@extends('admin_layouts.master')
@section('css')
    <style>
        .back-ctr {
            background-color: var(--main);
            padding: 8px;
            margin: 16px 0 16px 12px;
            border: 2px solid black;
            border-radius: 5px;
            text-align: center;
        }

        .back-ctr a {
            text-decoration: none;
            color: black;
            font-weight: 600;
        }

        .back-ctr a:hover {
            color: black
        }

        .back-ctr i {
            margin-right: 8px;
        }

        .btn-group {
            width: 250px;
        }
    </style>
@endsection
@section('main')
    <div class="container promosi">
        <h1>Daftar Promosi yang Sudah Berjalan</h1>
        <form id="searchForm" action="{{ route('promosi.searchPastPromo') }}" method="GET">
            <div class="row">
                <div class="col-md-4 search">
                    <i class="fas fa-magnifying-glass"></i>
                    <label>Cari</label>
                    <br>
                    <input type="text" name="search" class="form-control search">
                </div>
                <div class="col-md-4 date-picker">
                    <i class="fas fa-calendar"></i>
                    <label>Cari berdasarkan tanggal</label>
                    <input type="text" name="daterange" class="form-control" id="daterange" />
                </div>
            </div>
        </form>
        <div class="row btn-group">
            <div class="col-md-6 back-ctr">
                <a class="back-btn" href="{{ route('promosi') }}">
                    <i class="fas fa-chevron-left"></i>
                    kembali
                </a>
            </div>
        </div>
        <div class="row-sm-6 promo-ctr">
            <div class="preview">
                @foreach ($promosi as $item)
                    <h2>{{ $item->title }}</h2>
                    <div class="image">
                        <img src="{{ $item->image }}" alt="Promosi">
                    </div>
                    <br>
                    <p style="font-weight: bold;">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }} - 
                        {{ \Carbon\Carbon::parse($item->ended_at)->format('d/m/Y') }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#daterange').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                },
                opens: 'left'
            });

            // Submit the form automatically on search input change
            $('input[name="search"]').on('input', function() {
                $('#searchForm').submit();
            });

            // Submit the form automatically on date range change
            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                $('#searchForm').submit();
            });
        });
    </script>
@endsection
