@foreach ($katalogs as $katalog)
    <div class="col-sm-3 preview">
        <a href="{{ url('/katalog/katalogDetail/' . $katalog->id_costume) }}">
            <img src="{{ $katalog->imageUrl }}">
            <div class="detail-costume" data-id="{{ $katalog->id_costume }}">
                <h3>{{ $katalog->name }}</h3>
                <p>Ukuran: {{ $katalog->size }}</p>
            </div>
        </a>
    </div>
@endforeach
