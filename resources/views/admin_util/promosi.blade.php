@extends('admin_layouts.master')
@section('css')
    <style>
        .add-ctr {
            background-color: var(--main);
            padding: 8px;
            margin: 16px 0 16px 1px;
            width: 12%;
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
        <div class="row">
            <div class="col search">
                <form action="{{ route('promosi.searchPromo') }}" method="GET">
                    <i class="fas fa-magnifying-glass"></i>
                    <label>Search</label>
                    <br>
                    <input type="text" name="search" class="search">
                </form>
            </div>
        </div>
        <div class="row add-ctr">
            <a class="add-btn" href="{{ route('promosi.tambahPromosi') }}">
                Tambah
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="row-sm-6 promo-ctr">
            <div class="preview">
                @foreach ($promosi as $item)
                    <h2>{{ $item->title }}</h2>
                    <div class="image">
                        <img src="{{ $item->image }}" alt="Promosi">
                    </div>
                    <div class="btn-ctr">
                        <a href="/promosi/editPromo/{{ $item->id_promo }}" class="btn btn-success edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="javascript:void(0)" data-id="{{ $item->id_promo }}" class="btn btn-danger trash">
                            <i class="fas fa-trash"></i>
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
            //
            $('.trash').on('click', function(e) {
                e.preventDefault();

                if (!confirm('Are you sure?')) {
                    return;
                }

                var promoId = $(this).data('id'); // Use data attribute to get promo ID
                console.log("ID:", promoId);

                $.ajax({
                    url: '{{ route("promosi.deletePromo", ":id_promo") }}'.replace(':id_promo', promoId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Promo deleted successfully');
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert('Failed to delete promo');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            });
        });
    </script>
@endsection
