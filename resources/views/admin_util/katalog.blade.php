@extends('admin_layouts.master')
@section('css')
    <style>
        .preview {
            cursor: pointer;
        }

        .preview img {
            width: 15rem;
            height: 15rem;
        }

        .preview .detail-costume {
            margin-top: 24px;
        }

        i {
            margin-right: 8px;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection
@section('main')
    <h1>Katalog</h1>
    <div class="row search-container">
        <div class="col-sm-3">
            <form id="search-form" action="{{ route('katalog.searchCostume') }}" method="GET">
                <div class="input">
                    <span>Search</span>
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" value="{{ old('search') }}">
                        <button class="btn btn-outline-secondary" type="button" id="search-button">
                            <i class="fas fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <div class="input">
                <i class="fas fa-filter"></i><span>Kategori</span>
                <select name="category" class="form-select" id="category-filter" data-placeholder="Pilih Kategori">
                    <option value="" default></option>
                    <option value="14">Adat</option>
                    <option value="6">Aksesoris</option>
                    <option value="12">Animal</option>
                    <option value="15">Apron</option>
                    <option value="7">Bridal Station</option>
                    <option value="19">Cosplay</option>
                    <option value="16">Futuristik</option>
                    <option value="10">Halloween</option>
                    <option value="11">Hero</option>
                    <option value="3">Internasional</option>
                    <option value="4">Karakter</option>
                    <option value="18">Model</option>
                    <option value="9">Natal</option>
                    <option value="13">Onesie</option>
                    <option value="20">Prince</option>
                    <option value="2">Princess</option>
                    <option value="5">Profesi</option>
                    <option value="1">Sayurbuah</option>
                    <option value="17">Old</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="katalog-container">
            @include('partials.katalog_items')
        </div>
        <div class="d-flex justify-content-center mt-4" id="pagination-container">
            {{ $katalogs->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            function performSearch(page = 1) {
                let searchQuery = $('[name="search"]').val();
                console.log(searchQuery);
                let category = $('#category-filter').val();
                console.log(category);
                console.log("Filter parameters:", { search: searchQuery, category: category });

                $.ajax({
                    url: '{{ route('katalog.searchCostume') }}',
                    method: 'GET',
                    data: {
                        search: searchQuery,
                        category: category,
                        page: page
                    },
                    success: function(response) {
                        $('#katalog-container').html(response.katalogs);
                        $('#pagination-container').html(response.pagination);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            $('#search-button').on('click', function(e) {
                e.preventDefault();
                performSearch();
            });

            $('#category-filter').on('change', function() {
                performSearch();
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                performSearch(page);
            });

            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                performSearch();
            });
        });
    </script>
@endsection
