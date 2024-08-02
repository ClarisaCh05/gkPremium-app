@extends('layouts.home')
@section('css')
    <style>
      .breadcrumbs-ctr {
        margin-top: 16px;
      }

      .preview-container {
        display: flex;
        position: relative;
        flex-wrap: wrap;
        text-align: center;
        justify-content: center;
        align-content: center;
      }

      .preview {
        margin: 1em 0.5em 3em 2em;
        border: 1px solid gainsboro;
        box-shadow: 0px 2px 4px 0px rgb(187, 183, 183);
      }

      .preview:hover {
        cursor: pointer;
      }

      .preview img {
        height: auto;
      }

      .ulasan-pic {
        width: 20rem;
      }

      .row.image_testimoni img {
        width: 100%;
        height: 180px;
        object-fit: cover; 
      }

      .modal-body .col .ulasan-pic {
        width: 250px;
      }

      main h1 {
        font-weight: bold;
        text-align: center;
      }

      .name_testimoni p {
        position: relative;
        text-align: center;
        margin: 16px 8px 16px 0;
      }

      label {
        align-content: center;
        margin: 0 0 8px 0;
      }

      .search-ctr {
        text-align: end;
      }

    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col breadcrumbs-ctr">
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('client.homepage') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Ulasan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <h1>Ulasan</h1>
        </div>
        <div class="row search-ctr">
          <div class="col dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid black;">
              Filter
            </button>
            <form class="dropdown-menu p-4" style="width:30%;" id="filter-form">
              <div class="category">
                <label class="select-cat">Kategori :</label>
                <select name="categories" id="categories" class="form-select">
                  <option value="">Semua Kategori</option>
                  @if(isset($categories) && count($categories) > 0)
                      @foreach ($categories as $index => $category)
                          <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                      @endforeach
                  @else
                      <option value="">Kategori tidak tersedia</option>
                  @endif
                </select>              
              </div>
              <br>
              <div class="theme">
                <label class="select-theme">Tema :</label>
                <select name="themes" id="themes" class="form-select">
                  <option value="">Semua Tema</option>
                  @if(isset($themes) && count($themes) > 0)
                      @foreach ($themes as $index => $theme)
                          <option value="{{ $theme->id_theme }}">{{ $theme->theme }}</option>
                      @endforeach
                  @else
                      <option value="">Tema tidak tersedia</option>
                  @endif
                </select>
              </div>
              {{-- <br> --}}
              {{-- <div class="size">
                <label class="select-theme">Ukuran :</label>
                <select name="categories" id="categories" class="form-select">
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
                  <option value="dewasa" disabled style="font-weight: bold;">Dewasa</option>
                  <option value="" disabled></option>
                  <option value="xs">XS</option>
                  <option value="s">S</option>
                  <option value="m">M</option>
                  <option value="l">L</option>
                  <option value="xl">XL</option>
                  <option value="" disabled></option>
                  </select>
                </select>
              </div> --}}
              {{-- <br>
              <div class="color">
                <label class="select-theme">Warna :</label>
                <select name="colors" id="colors" class="form-select">
                  <option value="">Semua Warna</option>
                  @if(isset($colors) && count($colors) > 0)
                      @foreach ($colors as $index => $color)
                          <option value="{{ $color->id_color }}">{{ $color->color }}</option>
                      @endforeach
                  @else
                      <option value="">Warna tidak tersedia</option>
                  @endif
                </select>
              </div> --}}
              <br>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search" style="margin-right: 8px"></i>
                Search</button>
            </form>
          </div>
          <form action="GET" class="col-md-2" id="search-form">
            <div class="search-bar">
              <div class="input-group mb-3">
                <input type="text" name="search-testimoni" class="form-control" id="search-input" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" style="border: 1px solid black;">
                <span class="input-group-text" id="basic-addon1" style="background-color: white; border: 1px solid black;"><i class="fas fa-search"></i></span>
              </div>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col preview-container" id="testimonies-list">
            @include('partials.testimoni_list', ['testimonies' => $testimonies, 'noResults' => $noResults ?? false])
          </div>
        </div>        
    </div>
@endsection
@section('javascript')
    <script>
      $(document).ready(function() {
        function performSearch() {
          let category = $('#categories').val();
          let theme = $('#themes').val();
          let search = $('#search-input').val();
          let _token = '{{ csrf_token() }}';

          console.log('theme:', theme);

          $.ajax({
            url: "{{ route('client.getFilterTestimoni') }}",
            method: 'GET',
            data: {
              _token: _token,
              category: category,
              theme: theme,
              search: search
            },
            success: function(response) {
              $('#testimonies-list').html(response.testimonies);
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
          });
        }

        $('#filter-form').on('submit', function(e) {
          e.preventDefault();
          performSearch();
        });

        $('#search-form').on('submit', function(e) {
          e.preventDefault();
          performSearch();
        });
    });
    </script>
@endsection