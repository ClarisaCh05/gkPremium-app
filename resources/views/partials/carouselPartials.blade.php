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
                    <a href="{{ url('client/costumeDetail/' . $katalog->id_costume) }}" data-costume-id="{{ $katalog->id_costume }}" class="card">
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
                    <a href="{{ url('client/costumeDetail/' . $costume->id_costume) }}" class="card">
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
                    <a href="{{ url('client/costumeDetail/' . $costume->id_costume) }}" class="card">
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