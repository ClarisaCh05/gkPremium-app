<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="https://kit.fontawesome.com/be6ef7a374.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/2.0.1/chartjs-plugin-zoom.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css">

        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css"> 
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script> 
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script> 

        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/admin_css/sidebar.css') }}">

        @vite(['resources/js/app.js'])
        <script src="{{ asset('js/main.js') }}"></script>
        {{-- <script src="{{ asset('js/socket.io.js') }}"></script> --}}
        
        @yield('css')

        <style>
            main {
                margin-bottom: 24px;
            }

            /* this is needed to make the content scrollable on larger screens */
            @media (min-width: 820px) {
                .h-sm-100 {
                    height: 100%;
                }
            }

            .logo {
                width: 40px;
                margin-right: 16px;
            }

            li {
                margin: 8px 0 8px 0;
            }

            .nav-link {
                color: black;
            }

            .nav-link:hover {
                color: black;
                text-decoration: underline;
            }

            .title {
                width: 100%;
                font-size: 32px;
                margin-bottom: 24px;
            }

            .title a {
                text-decoration: none;
                color: black;
                display: flex;
                align-items: center;
            }

            .title a i {
                font-size: 40px;
                margin: 0 16px 8px 0;
            }

        </style>
        
        @yield('t')
    </head>
    <body>
        <div class="container-fluid overflow-hidden">
            <div class="row vh-100 overflow-auto">
                <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 d-flex sticky-top" style="background-color: var(--main);">
                    <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-black">
                        <a href="{{ route('homeAdmin') }}" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5">
                                <img src="/img/logo-gk.png" class="logo">
                                <span class="d-none d-sm-inline" style="color: black; font-weight: bold;">
                                    Admin
                                </span>
                            </span>
                        </a>
                        <ul class="nav nav-pilss flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{ route('katalog') }}" class="nav-link px-sm-0 px-2">
                                    <i class="fas fa-border-all"></i>
                                    <span class="ms-1 d-none d-sm-inline">Katalog</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homeAdmin') }}" class="nav-link px-sm-0 px-2">
                                    <i class="fas fa-home"></i>
                                    <span class="ms-1 d-none d-sm-inline">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kostum.getCompleteCostume') }}" class="nav-link px-sm-0 px-2">
                                    <i class="fas fa-tshirt"></i>
                                    <span class="ms-1 d-none d-sm-inline">Kostum</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('message.conversation', ['userId' => auth()->user()->id]) }}" class="nav-link px-sm-0 px-2">
                                    <i class="fas fa-comment"></i>
                                    <span class="ms-1 d-none d-sm-inline">Chat</span>
                                </a> 
                            </li>
                            <li>
                                <a href="{{ route('promosi') }}" class="nav-link px-sm-0 px-2">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span class="ms-1 d-none d-sm-inline">Promosi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('testimoni') }}" class="nav-link px-sm-0 px-2">
                                    <i class="fas fa-eye"></i>
                                    <span class="ms-1 d-none d-sm-inline">Testimoni</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="logout nav-link px-sm-0 px-2"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-door-open"></i>
                                    <span class="ms-1 d-none d-sm-inline">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex flex-column h-sm-100">
                    <main class="row overflow-auto">
                        <div class="col pt-4">
                            @yield('main')
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>

        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
        
        @yield('script')
        @stack('scripts')
    </body>
</html>