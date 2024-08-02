@extends('admin_layouts.master')
@section('css')
    <style>
        .add-ctr {
            background-color: var(--main);
            padding: 8px;
            margin: 16px 0 16px 1px;
            border: 2px solid black;
            border-radius: 5px;
            text-align: center;
        }

        .add-ctr a {
            text-decoration: none;
            color: black;
            font-weight: 600;
        }

        .add-ctr a:hover {
            color: black
        }

        .add-ctr i {
            margin-left: 8px;
        }

        .history-btn {
            background-color: var(--main);
            padding: 8px;
            margin: 16px 0 16px 1px;
            border: 2px solid black;
            border-radius: 5px;
            text-align: center;
            font-weight: 600;
        }

        .btn-ctr {
            margin: 16px 0 16px 0;
        }

        .col.search input {
            padding: 8px;
            font-size: 16px;
            width: 50%;
        }
    </style>
@endsection
@section('main')
    <div class="container promosi">
        <h1>Daftar Promosi</h1>
        <form id="searchForm" action="{{ route('promosi.searchPromo') }}" method="GET">
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
        <div class="row-3 btn-group">
            <div class="col-md-6 add-ctr">
                <a class="add-btn" href="{{ route('promosi.tambahPromosi') }}">
                    Tambah
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="col-md-12 history">
                <a class="col" href="{{ route('promosi.past_promosi') }}">
                    <button type="button" class="history-btn">
                        Promosi Lalu
                    </button>
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
                    <div class="btn-ctr">
                        <a href="/promosi/editPromo/{{ $item->id_promo }}" class="btn btn-success edit">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
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
            
            // $('.trash').on('click', function(e) {
            //     e.preventDefault();

            //     if (!confirm('Are you sure?')) {
            //         return;
            //     }

            //     var promoId = $(this).data('id'); // Use data attribute to get promo ID
            //     console.log("ID:", promoId);

            //     $.ajax({
            //         url: '{{ route("promosi.deletePromo", ":id_promo") }}'.replace(':id_promo', promoId),
            //         method: 'DELETE',
            //         data: {
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                 alert('Promo deleted successfully');
            //                 location.reload(); // Reload the page to reflect changes
            //             } else {
            //                 alert('Failed to delete promo');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             alert('Error: ' + error);
            //         }
            //     });
            // });
        });
    </script>
@endsection
