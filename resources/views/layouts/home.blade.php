<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/be6ef7a374.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/style2.css') }}">
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

          .nav-link {
            color: black !important;
            margin: 0 16px 0 16px;
            font-weight: bold;
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
                              <a class="nav-link" href="https://www.instagram.com/gudangkostum_surabaya/"><i class="fa-brands fa-instagram"></i></a>
                          </li>
                          <li class="nav-item brand">
                              <a class="nav-link" href="https://www.facebook.com/gudangkostumsurabaya"><i class="fa-brands fa-facebook"></i></a>
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
                          <a class="nav-link" href="https://wa.me/6285215003507"><i class="fa-brands fa-whatsapp"></i>WhatsApp</a>
                      </li>
                      <li class="nav-item brand">
                          <a class="nav-link" href="https://www.instagram.com/gudangkostum_surabaya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa-brands fa-instagram"></i>Instagram</a>
                      </li>
                      <li class="nav-item brand">
                          <a class="nav-link" href="https://www.facebook.com/gudangkostumsurabaya" target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                            Facebook
                          </a>
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
          @yield('main')
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
                  <a href="#">
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
                    <span style="font-size: 13px;">Gudang Kostum Surabaya</span>
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
        @yield('javascript')
        @stack('scripts')
        <script type="text/javascript"> 
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
