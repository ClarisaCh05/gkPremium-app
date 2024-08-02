@extends('layouts.home')
@section('css')
    <style>
        .breadcrumbs-ctr {
            margin: 16px 0 16px 0;
        }
        .carousel-inner {
            margin-top: 64px;
        }
        .keterangan li {
            list-style: circle;
        }
        .details .chat {
            border: 2px solid black;
            padding: 8px;
            color: black;
            text-decoration: none;
            margin-right: 24px;
        }
        .details .chat:hover {
            color: black;
        }
        .details .chat i {
            margin-left: 8px;
        }
        .whatsApp {
            font-size: 24px;
            color: white;
            background-color: green;
            border-radius: 50%;
            padding: 8px 12px 8px 12px;
            text-decoration: none;
        }
        .like {
            font-size: 24px;
            color: white;
            background-color: red;
            border-radius: 50%;
            padding: 8px 12px 8px 12px;
            text-decoration: none;
            margin-left: 16px;
        }
        .container {
            margin-bottom: 16px;
        }

        .carousel-item img {
            object-fit: contain;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: #e1e1e1;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev span,
        .carousel-control-next span {
            width: 1.5rem;
            height: 1.5rem;
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
                        <li class="breadcrumb-item"><a href="{{ route('client.katalog') }}">Katalog</a></li>
                        @if ($costumes)
                            <li class="breadcrumb-item active" aria-current="page">{{ $costumes->name }}</li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="row">
            <div class="col-12 carousel-wrapper">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < $costumes->images->count(); $i++)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @foreach ($costumes->images as $item)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} c-item">
                                <img src="{{ $item->imageUrl }}" class="d-block w-100 c-img">
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
            </div>
        </div>

        <!-- Details Section -->
        <div class="row">
            <div class="col-12 details">
                @if ($costumes)
                    <h2 class="title">{{ $costumes->name }}</h2>
                    <p class="price">@price($costumes->price)</p>
                    <p class="size">@sizeLabel($costumes->size)</p>
                    <div class="col">
                        <a href="" class="chat" id="chatLink" data-costume-id="{{ $costumes->id_costume }}" data-costume-interest="{{ $costumes->interest }}">
                            Chat
                            <i class="fas fa-comment"></i>
                        </a>
                        <a href="https://wa.me/6285215003507" class="whatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="#" class="like" id="likeButton" data-costume-name="{{ $costumes->name }}" 
                            data-costume-price="{{ $costumes->price }}" 
                            data-costume-image="{{ $costumes->images[0]->imageUrl ?? '' }}">
                            <i class="fas fa-heart"></i> 
                        </a>                       
                    </div>
                    <hr>
                    <p class="description">{{ $costumes->description }}</p>
                    <hr>
                @else
                    <p>Costume not found.</p>
                @endif
                <div class="keterangan">
                    <h5>Ketentuan Sewa</h5>
                    <h6>1. Ketentuan Sewa</h6>
                    <ul>
                        <li>Harga yg tertera untuk sewa kostum selama 1-3 hari (diambil H-1 acara dan dikembalikan H+1 acara).</li>
                        <li>Lebih dari 3 hari sewa akan dikenakan biaya tambah hari sebesar 25.000/kostum/hari.</li>
                        <li>Jika ada pembatalan/pergantian kostum maka DP(uang muka) hangus atau sesuai kebijakan manajemen.</li>
                        <li>Reschedule diperbolehkan 1x dengan menginfokan admin terlebih dahulu.</li>
                        <li>Pelunasan sewa dan deposit(jaminan) sebelum kostum diambil.</li>
                        <li>Deposit akan dikembalikan langsung tunai atau ditransfer maks H+2 (hari kerja) dari tgl pengembalian.</li>
                        <li>Saat pengambilan kostum, mohon minta nota ke admin  (nota harus disimpan dengan baik).</li>
                    </ul>
                    <h6>2. Ketentuan Pengiriman Luar Kota</h6>
                    <ul>
                        <li>Kostum akan di kirim H-3 acara, dan penyewa kirimkan kembali ke Surabaya H+2 acara (terlampir resi).</li>
                        <li>Untuk pengiriman luar kota ada tambahan biaya (menyesuaikan kostum, tempat dan pengiriman). kesepakatan dengan admin. Karena Jika di dalam surabaya sewa 3 hari, lebih dari 3 hari ada biaya tambahan 25.000/hari. Untuk keluar kota butuh 7-10 hari (termasuk hari pengiriman dan sewa).</li>
                        <li>Ongkir di tanggung oleh penyewa.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOM fully loaded and parsed");

            let chatLinks = document.querySelectorAll('#chatLink');
            console.log(`Found ${chatLinks.length} chatLink elements`);

            const likeButton = document.getElementById('likeButton');
            const likedCostumesDropdown = document.getElementById('likedCostumesDropdown');

            if (likeButton) {
                likeButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    console.log("click");

                    const costumeName = this.getAttribute('data-costume-name');
                    const costumePrice = this.getAttribute('data-costume-price');
                    const costumeImage = this.getAttribute('data-costume-image');
                    console.log("data:", costumeName, costumePrice, costumeImage);

                    const likedCostumes = JSON.parse(localStorage.getItem('likedCostumes')) || [];
                    console.log("likedCostumes:", likedCostumes);

                    const existingCostume = likedCostumes.find(costume => costume.name === costumeName);
                    console.log("existing costume:", existingCostume);

                    if (!existingCostume) {
                        likedCostumes.push({ name: costumeName, price: costumePrice, image: costumeImage });
                        localStorage.setItem('likedCostumes', JSON.stringify(likedCostumes));
                        console.log("likedCostumes 2:", likedCostumes);
                        renderLikedCostumes();
                    }
                });
            }

            function renderLikedCostumes() {
                const likedCostumes = JSON.parse(localStorage.getItem('likedCostumes')) || [];
                console.log("likedCostumes render:", likedCostumes);
                likedCostumesDropdown.innerHTML = '';

                likedCostumes.forEach(costume => {
                    const costumeItem = document.createElement('li');
                    costumeItem.classList.add('row');
                    costumeItem.innerHTML = `
                        <div class="col-sm-3 imageCart">
                            <img src="${costume.image}" alt="" style="height: 50px;">
                        </div>
                        <span class="col-sm-6 item">
                            <span class="item-left">
                                <img src="${costume.image}" alt="" style="height: 50px;">
                                <span class="item-info">
                                    <span style="font-weight: bold;">${costume.name}</span>
                                    <br>
                                    <span>${costume.price}</span>
                                </span>
                            </span>
                        </span>
                        <div class="col-sm-2 item-right">
                            <button class="btn btn-xs btn-danger remove-like" data-costume-name="${costume.name}">x</button>
                        </div>
                    `;
                    likedCostumesDropdown.appendChild(costumeItem);
                });

                document.querySelectorAll('.remove-like').forEach(button => {
                    button.addEventListener('click', function () {
                        const costumeName = this.getAttribute('data-costume-name');
                        const likedCostumes = JSON.parse(localStorage.getItem('likedCostumes')) || [];
                        const updatedCostumes = likedCostumes.filter(costume => costume.name !== costumeName);
                        localStorage.setItem('likedCostumes', JSON.stringify(updatedCostumes));
                        renderLikedCostumes();
                    });
                });
            }

            renderLikedCostumes();

            chatLinks.forEach(chatLink => {
                chatLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    console.log("Chat link clicked");

                    checkAuthentication();

                    let costumeId = this.getAttribute('data-costume-id');
                    let costumeInterest = this.getAttribute('data-costume-interest');
                    console.log("Costume ID:", costumeId);
                    console.log("Costume Interest:", costumeInterest);

                    let interestInt = parseInt(costumeInterest);
                    console.log("Parsed Interest:", interestInt);
                    interestInt++;
                    console.log("New Interest:", interestInt);

                    const url = '{{ route("client.updateInterest", ":id_costume") }}'.replace(':id_costume', costumeId);
                    console.log("Generated URL:", url);

                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            id_costume: costumeId,
                            interest: interestInt,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Costume updated in database');
                        },
                        error: function(xhr, status, error) {
                            console.error('Costume update error:', error);
                        }
                    });
                });
            });

            function checkAuthentication() {
                fetch('/check-auth')
                    .then(response => response.json())
                    .then(data => {
                        if (data.authenticated) {
                            console.log("User authenticated");
                            let currentUrl = window.location.href;
                            window.location.href = `/conversation/${data.userId}?previous_url=${encodeURIComponent(currentUrl)}`;
                        } else {
                            console.log("User not authenticated, redirecting to login");
                            window.location.href = '{{ route('login') }}';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

    </script>
@endsection
