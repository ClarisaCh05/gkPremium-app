<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://kit.fontawesome.com/be6ef7a374.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/landing.css') }}">

        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/socket.io.js') }}"></script>

        <title>Gudang Kostum Premium</title>

        <style>
          .btn-ctr {
            margin-bottom: 8px;
          }
      
          .btn-ctr i {
            font-size: 24px;
            color: black;
          }
      
          .btn-ctr .email {
            font-size: 16px;
            font-weight: 600;
            margin-right: 8px;
          }
      
          .btn-ctr button {
            background-color: white;
            border: none;
          }
      
          li {
            list-style: none;
          }
      
          .nav-link {
            color: black;
          }
          
          .navbar .search {
            display: flex;
            align-items: center;
          }
          .navbar .search input {
              margin-left: 10px;
              flex-grow: 1;
          }

          .d-lg-none i {
              margin-right: 8px;
          }

          .navbar-brand img {
              height: 80px !important; /* Adjust this value to make the logo bigger */
          }

          box-shadow: 2px 6px 8px rgba(22, 22, 26, 0.18);

          @media (max-width: 992px) {
              .navbar-brand {
                  flex: 1;
                  display: flex;
                  justify-content: center;
              }
              .search,
              .navbar-nav.ms-auto.d-lg-flex {
                  display: none;
              }
          }

          .card {
            box-shadow: 2px 6px 8px rgba(22, 22, 26, 0.18);
          }
        </style>
        @yield('css')
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="/img/logo-gk.png" alt="Logo" style="height: 40px;"></a>
                  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <form class="d-flex search" action="{{ route('client.katalogSearch') }}" method="GET">
                        <i class="fas fa-magnifying-glass icon"></i>
                        <input type="text" class="form-control main-search" name="search" placeholder="search" value="{{ request('search') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    </form>                                     
                      <ul class="navbar-nav ms-auto d-none d-lg-flex">
                          @guest
                              @if (Route::has('login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}" @click.prevent="showLogin">{{ __('Login') }}</a>
                                  </li>
                              @endif

                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}" @click.prevent="showRegister">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                          <li class="nav-item chat">
                              <a class="nav-link" href="#" id="chatLink"><i class="fas fa-comment-dots"></i></a>
                          </li>
                          <li class="nav-item brand">
                              <a class="nav-link" href="https://wa.me/6285215003507"><i class="fa-brands fa-whatsapp"></i></a>
                          </li>
                          <li class="nav-item brand">
                              <a class="nav-link" href="https://www.instagram.com/gudangkostum_surabaya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa-brands fa-instagram"></i></a>
                          </li>
                          <li class="nav-item brand">
                              <a class="nav-link" href="https://www.facebook.com/gudangkostumsurabaya" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
          <nav class="navbar navbar-expand-lg navbar-light" style="border-top: 1px solid black; border-bottom: 1px solid black;">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('client.homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('client.katalog') }}">Katalog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('client.siapaKami') }}">Siapa Kami</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('client.getClientTestimoni') }}">Testimoni</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('client.ketentuanSewa') }}">Ketentuan Sewa</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto d-lg-none">
                      @guest
                          @if (Route::has('login'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}" @click.prevent="showLogin">{{ __('Login') }}</a>
                              </li>
                          @endif

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}" @click.prevent="showRegister">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                      <li class="nav-item chat">
                          <a class="nav-link" href="#" id="chatLink"><i class="fas fa-comment-dots"></i>Chat</a>
                      </li>
                      <li class="nav-item brand">
                          <a class="nav-link" href="{{ url('https://wa.me/6285215003507') }}"><i class="fa-brands fa-whatsapp"></i>WhatsApp</a>
                      </li>
                      <li class="nav-item brand">
                          <a class="nav-link" href="{{ url('https://www.instagram.com/gudangkostum_surabaya/') }}"><i class="fa-brands fa-instagram"></i>Instagram</a>
                      </li>
                      <li class="nav-item brand">
                          <a class="nav-link" href="{{ url('https://www.facebook.com/gudangkostumsurabaya') }}"><i class="fa-brands fa-facebook"></i>Facebook</a>
                      </li>
                      <form class="d-flex search" action="{{ route('client.katalogSearch') }}" method="GET">
                        <i class="fas fa-magnifying-glass icon"></i>
                        <input type="text" class="form-control main-search" name="search" placeholder="search" value="{{ request('search') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    </form>                                     
                  </ul>
                </div>
              </div>
            </nav>
          </header>
        <main>
          <div id="carouselExampleIndicators" class="carousel slide big-screen" data-bs-ride="carousel">
            <div class="carousel-indicators">
            @for ($i = 0; $i < ceil($promos->count()); $i++)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}"></button>
            @endfor
            </div>
            <div class="carousel-inner">
            @foreach ($promos as $promo)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} c-item">
                    <img src="{{ $promo->image }}" class="d-block w-100 c-img">
                </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="katalog-c-ctr">
        <div class="katalog-c">
            <h2>Pilihan Kostum</h2>
            <div id="carouselExampleControls" class="carousel carousel-dark slide d-none d-sm-block" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($katalogs->chunk(5) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="cards-wrapper">
                        @foreach ($chunk as $katalog)
                            <a href="{{ route('client.homepage') }}" data-costume-id="{{ $katalog->id_costume }}" class="card">
                            <div class="image-wrapper">
                                <img src="{{ $katalog->imageUrl }}" alt="{{ $katalog->name }}">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $katalog->name }}</h5>
                                <p class="card-text">{{ $katalog->description }}</p>
                            </div>
                            </a>
                        @endforeach
                    </div>
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
            <div id="carouselExampleControlsSmallScreen" class="carousel slide d-sm-none" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($katalogs as $katalog)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="cards-wrapper">
                            <a href="{{ url('client/costumeDetail/' . $katalog->id_costume) }}" data-costume-id="{{ $katalog->id_costume }}" class="card">
                            <div class="image-wrapper">
                                <img src="{{ $katalog->imageUrl }}" alt="{{ $katalog->name }}">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $katalog->name }}</h5>
                                <p class="card-text">{{ $katalog->description }}</p>
                            </div>
                            </a>
                    </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsSmallScreen" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsSmallScreen" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            </div>
        </div>
        </div>
        <div class="bridestation">
        <div class="container">
            <div class="row">
            <div class="col">
                <p class="sub-title">BRIDE STATION</p>
                <p class="bs-desc">#bridestation menyediakan Gaun Pesta dan Gaun Pengantin.</p>
            </div>
            @foreach ($brideStation->chunk(3) as $chunk)
                @foreach ($chunk as $bridal)
                <div class="col bs-col-card">
                    <a href="{{ url('client/costumeDetail/' . $bridal->id_costume) }}" data-costume-id="{{ $bridal->id_costume }}" class="card bs-card">
                    <div class="image-wrapper">
                        <img src="{{ $bridal->imageUrl }}" alt="{{ $bridal->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $bridal->name }}</h5>
                        <p class="card-text">{{ $bridal->description }}</p>
                    </div>
                    </a>
                </div>
                @endforeach
            @endforeach
            <div id="carouselExampleControlsSmallScreen3" class="carousel slide d-sm-none" data-bs-ride="carousel">
                <div class="carousel-inner">
                @foreach ($brideStation as $bridal)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="cards-wrapper">
                            <a href="{{ url('client/costumeDetail/' . $bridal->id_costume) }}" data-costume-id="{{ $bridal->id_costume }}" class="card">
                            <div class="image-wrapper">
                                <img src="{{ $bridal->imageUrl }}" alt="{{ $bridal->name }}">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $bridal->name }}</h5>
                                <p class="card-text">{{ $bridal->description }}</p>
                            </div>
                            </a>
                    </div>
                    </div>
                @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsSmallScreen3" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsSmallScreen3" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
        </div>
        </div>
        <div class="kategori">
        <h2>Kategori Populer</h2>
        <div class="container">
            <div class="row">
                <a href="#" class="col category-link" id="princess" data-category="2">
                    <p>PRINCESS</p>
                </a>
                <a href="#" class="col category-link" id="hero" data-category="11">
                    <p>HERO</p>
                </a>
            </div>
            <div class="row">
                <a href="#" class="col category-link" id="internasional" data-category="3">
                    <p>INTERNASIONAL</p>
                </a>
                <a href="#" class="col category-link" id="karakter" data-category="4">
                    <p>KARAKTER</p>
                </a>
            </div>            
        </div>
        </div>
        <div class="seen-c">
            <h2>Kostum yang Sering Dilihat</h2>
            <div id="carouselExampleControls2" class="carousel carousel-dark slide d-none d-sm-block" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($topCostume->chunk(5) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="cards-wrapper">
                        @foreach ($chunk as $costume)
                            <a href="{{ url('client/costumeDetail/' . $costume->id_costume) }}" data-costume-id="{{ $costume->id_costume }}" class="card">
                            <div class="image-wrapper">
                                <img src="{{ $costume->imageUrl }}" alt="{{ $costume->name }}">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $costume->name }}</h5>
                                <p class="card-text">{{ $costume->description }}</p>
                            </div>
                            </a>
                        @endforeach
                    </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div id="carouselExampleControlsSmallScreen2" class="carousel slide d-sm-none" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($topCostume as $costume)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="cards-wrapper">
                            <a href="{{ url('client/costumeDetail/' . $costume->id_costume) }}" data-costume-id="{{ $costume->id_costume }}" class="card">
                            <div class="image-wrapper">
                                <img src="{{ $costume->imageUrl }}" alt="{{ $costume->name }}">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $costume->name }}</h5>
                                <p class="card-text">{{ $costume->description }}</p>
                            </div>
                            </a>
                    </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsSmallScreen2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsSmallScreen2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
        </main>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col">
                <img src="/img/logo-gk.png">
              </div>
              <div class="col">
                <div class="location">
                  <div class="title">
                    <i class="fa-solid fa-location-dot"></i><span>Location</span>
                  </div>
                  <p class="main-info">Gudang Kostum</p>
                  <p>Yakaya Superindo Lt.2 Rungkut Mapan Utara FA 01 Surabaya</p>
                  <a href="#">Google Map</a>
                </div>
              </div>
              <div class="col">
                <div class="time">
                  <div class="title">
                    <i class="fa-regular fa-clock"></i><span>Operational Time</span>
                  </div>
                  <p class="main-info">Senin - Jumat pk. 09.00-16.00</p>
                  <p class="main-info">Sabtu pk. 09.00-13.00</p>
                  <p>*Selain jam itu dengan perjanjian</p>
                </div>
              </div>
              <div class="col">
                <div class="contacts">
                  <div class="title">
                    <i class="fa-solid fa-phone"></i><span>Contacts</span>
                  </div>
                  <a href="https://wa.me/6285215003507">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>0852-1500-3507</span>
                  </a>
                  <br>
                  <a href="https://www.instagram.com/gudangkostum_surabaya/">
                    <i class="fa-brands fa-instagram"></i>
                    <span>gudangkostum_surabaya</span>
                  </a>
                  <a href="https://www.facebook.com/gudangkostumsurabaya">
                    <i class="fa-brands fa-facebook"></i>
                    <span>Gudang Kostum Surabaya</span>
                  </a>
                </div>
              </div>
              <div class="col">
                <div class="online-shop">
                  <div class="title">
                    <i class="fa-solid fa-bag-shopping"></i><span>Online Shop(s)</span>
                  </div>
                  <a href="https://shopee.co.id/gudangkostum?smtt=0.0.9">
                    <img src="/img/icons8-shopee-20.svg" class="shoope-img">
                    <span>Shopee</span>
                  </a>
                  <br>
                  <a href="https://shopee.co.id/gudangkostum?smtt=0.0.9" class="lazada">
                    <img src="/img/icons8-lazada.svg">
                    <span>Lazada</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @stack('scripts')
        @yield('javascript')
        <script> 
          document.addEventListener('DOMContentLoaded', function (e) {
            //Page animation
            // Define an array to store the elements to be animated
            console.log('Hello world');

            //chat
            document.getElementById('chatLink').addEventListener('click', function(event) {
                event.preventDefault();
                checkAuthentication();
            });

            function checkAuthentication() {
                fetch('/check-auth')
                    .then(response => response.json())
                    .then(data => {
                        if (data.authenticated) {
                            // Redirect to the conversation page with the previous page link
                            window.location.href = `/conversation/${data.userId}`;
                        } else {
                            // Redirect to the login page
                            window.location.href = '{{ route('login') }}';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            //chat
            document.getElementById('chatLink').addEventListener('click', function(event) {
                event.preventDefault();
                checkAuthentication();
            });

            function checkAuthentication() {
                fetch('/check-auth')
                    .then(response => response.json())
                    .then(data => {
                        if (data.authenticated) {
                            // Redirect to the conversation page with the previous page link
                            window.location.href = `/conversation/${data.userId}`;
                        } else {
                            // Redirect to the login page
                            window.location.href = '{{ route('login') }}';
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            }

            document.querySelectorAll('.category-link').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    let category = this.getAttribute('data-category');
                    let url = new URL('{{ route('client.katalogSearch') }}');
                    url.searchParams.append('category', category);
                    window.location.href = url;
                });
            });
        })
      </script>
    </body>
</html>
