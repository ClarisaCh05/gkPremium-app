@extends('layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/front_css/katalog.css') }}">
    <style>
        .col.breadcrumbs {
            margin-top: 16px !important;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col breadcrumbs">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('client.homepage') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Katalog</li> 
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col filter-kategori">
                <label>Kategori :</label>
                <select class="form-select kostum" name="category" id="category-filter">
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
            <div class="col filter-ukuran">
                <label>Ukuran :</label>
                <select class="size-ld form-select" name="size">
                    <option value=""></option>
                    <option value="anak">Anak</option>
                    <option value="dewasa">Dewasa</option>
                    <option value="anak dan dewasa">Anak dan Dewasa</option>
                </select>
            </div>
        </div>
        <div class="row katalog">
            <div class="cards-wrapper" id="katalog-container">
                @include('partials.costumeClientItems')
            </div>
            <div class="d-flex justify-content-center mt-4" id="pagination-container">
                {{ $katalogs->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            function performSearch(page = 1) {
                let size = $('[name="size"]').val();
                let category = $('#category-filter').val();
                let search = $('[name="search"]').val(); // Add this line to get search input value
                let _token = '{{ csrf_token() }}'; // Include CSRF token

                $.ajax({
                    url: '{{ route('client.filter') }}',
                    method: 'GET',
                    data: {
                        _token: _token, // Include CSRF token in request
                        size: size,
                        category: category,
                        search: search, // Pass the search parameter
                        page: page
                    },
                    success: function(response) {
                        // console.log("AJAX Response:", response);
                        $('#katalog-container').html(response.katalogs);
                        $('#pagination-container').html(response.pagination);
                        addCardClickListeners()
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            $('#category-filter').on('change', function() {
                performSearch();
            });

            $('[name="size"]').on('change', function() {
                performSearch();
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                performSearch(page);
            });

            // Initialize socket connection only once
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);

            // Add event listeners to .card elements
            function addCardClickListeners() {
                document.querySelectorAll('.card').forEach(function(card) {
                    card.addEventListener('click', function(event) {
                        let costumeId = this.getAttribute('data-costume-id');
                        console.log("costume ID: ", costumeId);
                        socket.emit('view-costume', { costumeId: costumeId }, (response) => {
                            console.log('Event emitted, server response:', response);
                        });
                    });
                });
            }

            // Initially add event listeners
            addCardClickListeners();

            // When new content is loaded (e.g., via AJAX), re-apply event listeners
            $(document).ajaxComplete(function() {
                addCardClickListeners();
            });

            document.addEventListener('DOMContentLoaded', function() {
                window.Echo.channel('costume-updates')
                    .listen('CostumeViewed', (data) => {
                        console.log('Costume Viewed Event:', data);
                        // Update the view count in the DOM
                    });

            });
        });
    </script>
@endsection
