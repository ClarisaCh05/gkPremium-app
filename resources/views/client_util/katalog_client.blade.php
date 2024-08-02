@extends('layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/front_css/katalog.css') }}">
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
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('client.homepage') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Katalog</li> 
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 filter-kategori">
                <label>Kategori :</label>
                <select class="form-select kostum" name="category" id="category-filter">
                    <option value="" default>Semua Kategori</option>
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
            <div class="col-md-3 filter-ukuran">
                <label>Ukuran :</label>
                <select name="size" id="sizes" class="form-select">
                    <option value="">Pilih Ukuran</option>
                    <option value="semua ukuran">Semua Ukuran</option>
                    <option value="" disabled></option>
                    <hr>
                    <option value="" disabled></option>
                    <option value="Bayi" disabled style="font-weight: bold;">Bayi</option>
                    <option value="" disabled></option>
                    <option value="3m">3 - 6 Bulan</option>
                    <option value="6m">6 - 9 Bulan</option>
                    <option value="9m">9 - 12 Bulan</option>
                    <option value="12m">12 - 18 Bulan</option>
                    <option value="18m">18 - 24 Bulan</option>
                    <option value="" disabled></option>
                    <hr>
                    <option value="" disabled></option>
                    <option value="balita" disabled style="font-weight: bold;">Balita</option>
                    <option value="" disabled></option>
                    <option value="2t">2 Tahun</option>
                    <option value="3t">3 Tahun</option>
                    <option value="4t">4 Tahun</option>
                    <option value="5t">5 Tahun</option>
                    <option value="" disabled></option>
                    <hr>
                    <option value="" disabled></option>
                    <option value="anak" disabled style="font-weight: bold;">Anak</option>
                    <option value="" disabled></option>
                    <option value="xs-a">4 Tahun</option>
                    <option value="s-a">5 - 6 Tahun</option>
                    <option value="m-a">7 - 8 Tahun</option>
                    <option value="l-a">9 - 12 Tahun</option>
                    <option value="" disabled></option>
                    <hr>
                    <option value="" disabled></option>
                    <option value="remaja" disabled style="font-weight: bold;">Remaja</option>
                    <option value="" disabled></option>
                    <option value="xs-r">12 - 13 Tahun</option>
                    <option value="s-r">14 - 15 Tahun</option>
                    <option value="m-r">15 - 16 Tahun</option>
                    <option value="l-r">16 - 18 Tahun</option>
                    <option value="" disabled></option>
                    <hr>
                    <option value="" disabled></option>
                    <option value="dewasa" disabled style="font-weight: bold;">Dewasa Wanita</option>
                    <option value="" disabled></option>
                    <option value="xs-w">XS</option>
                    <option value="s-w">S</option>
                    <option value="m-w">M</option>
                    <option value="l-w">L</option>
                    <option value="xl-w">XL</option>
                    <option value="" disabled></option>
                    <hr>
                    <option value="" disabled></option>
                    <option value="dewasa" disabled style="font-weight: bold;">Dewasa Pria</option>
                    <option value="" disabled></option>
                    <option value="xs-p">XS</option>
                    <option value="s-p">S</option>
                    <option value="m-p">M</option>
                    <option value="l-p">L</option>
                    <option value="xl-p">XL</option>
                    <option value="" disabled></option>
                </select>
            </div>
            <div class="col-md-3 filter-tema">
                <label>Tema :</label>
                <select name="themes" id="themes" class="form-select">
                    <option value="">Semua Tema</option>
                    {{-- @if(isset($themes) && count($themes) > 0)
                        @foreach ($themes as $index => $theme)
                            <option value="{{ $theme->id_theme }}">{{ $theme->theme }}</option>
                        @endforeach
                    @else
                        <option value="">Tema tidak tersedia</option>
                    @endif --}}
                    <option value="1">Ancient Civilization / Peradaban Kuno</option>
                    <option value="2">Medieval / Renaissance / Abad Pertengahan</option>
                    <option value="3">90's</option>
                    <option value="4">Wild West</option>
                    <option value="5">Film dan Acara TV</option>
                    <option value="6">Anime</option>
                    <option value="7">Superhero dan Penjahat</option>
                    <option value="8">Ikon Musik</option>
                    <option value="9">Karakter Video Game</option>
                    <option value="10">Karakter Kartun</option>
                    <option value="11">Karakter Cerita / Dongeng</option>
                    <option value="12">Makhluk Mitos</option>
                    <option value="13">Penyihir</option>
                    <option value="14">Bajak Laut</option>
                    <option value="15">Putri Duyung</option>
                    <option value="16">Vampir dan Manusia Serigala</option>
                    <option value="17">Steampunk</option>
                    <option value="18">Dokter dan Perawat</option>
                    <option value="19">Polisi</option>
                    <option value="20">Pemadam Kebakaran</option>
                    <option value="21">Militer</option>
                    <option value="22">Pelaut</option>
                    <option value="23">Ilmuwan</option>
                    <option value="24">Pilot dan Pramugari</option>
                    <option value="25">Hewan</option>
                  </select>
            </div>
            <div class="col-md-3 filter-color">
                <label>Warna :</label>
                <select name="colors" id="colors" class="form-select">
                    <option value="">Semua Warna</option>
                    {{-- @if(isset($colors) && count($colors) > 0)
                        @foreach ($colors as $index => $color)
                            <option value="{{ $color->id_color }}">{{ $color->color }}</option>
                        @endforeach
                    @else
                        <option value="">Warna tidak tersedia</option>
                    @endif --}}
                    <option value="1">Merah</option>
                    <option value="2">Oranye / Jingga</option>
                    <option value="3">Kuning</option>
                    <option value="4">Hijau</option>
                    <option value="5">Biru</option>
                    <option value="6">Ungu</option>
                    <option value="7">Pink</option>
                    <option value="8">Cokelat</option>
                    <option value="9">Hitam</option>
                    <option value="10">Putih</option>
                    <option value="11">Abu-abu</option>
                </select>
            </div>
        </div>
        <div class="row katalog">
            @if ($noResults)
                <p>No results found.</p>
            @else
                <div class="cards-wrapper" id="katalog-container">
                    @include('partials.costumeClientItems', ['katalogs' => $katalogs, 'noResults' => $noResults])
                </div>
            @endif
            <div class="d-flex justify-content-center mt-4" id="pagination-container">
                {{ $katalogs->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            let _token = '{{ csrf_token() }}';

            function performSearch(page = 1) {
                let size = $('[name="size"]').val();
                let category = $('#category-filter').val();
                let color = $('[name="colors"]').val();
                let theme = $('[name="themes"]').val();
                let search = $('[name="search"]').val(); // Add this line to get search input value

                $.ajax({
                    url: '{{ route('client.filter') }}',
                    method: 'GET',
                    data: {
                        _token: _token, // Include CSRF token in request
                        size: size,
                        category: category,
                        color: color,
                        theme: theme,
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

            $('[name="themes"]').on('change', function() {
                performSearch();
            });

            $('[name="colors"]').on('change', function() {
                performSearch();
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                performSearch(page);
            });

            //Initialize socket connection only once
            let domain_name = '127.0.0.1';
            let socket_port = '8005'; // Use a fallback port if SOCKET_PORT is not set
            let socket = io(`${window.location.protocol}//${domain_name}:${socket_port}`);
            console.log(socket);

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

            $('.card').on('click', function(event) {
                event.preventDefault();
                
                var id_costume = $(this).data('costume-id');
                var url = $(this).attr('href');

                $.ajax({
                    url: '{{ route("client.Updateview", ":id_costume") }}'.replace(':id_costume', id_costume),
                    method: 'POST',
                    data: {
                        _token: _token, // Include CSRF token in request
                        id_costume: id_costume,
                    },
                    success: function(response) {
                        console.log("AJAX Response:", response);
                        alert('view updated');
                        // Redirect to the URL after emitting the event
                        window.location.href = url;
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
