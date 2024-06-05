<!-- Blade Template (katalog_client.blade.php) -->
<div class="row">
    @foreach ($katalogs as $costume)
        <div class="col-md-3 col-sm-6 col-12">
            <a class="card" style="width: 18rem;" href="{{ url('client/costumeDetail/' . $costume->id_costume) }}" data-costume-id="{{ $costume->id_costume }}" data-costume-view="{{ $costume->views }}">
                <div class="image-wrapper">
                    <img src="{{ $costume->imageUrl }}" class="card-img-top" alt="{{ $costume->name }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $costume->name }}</h5>
                    <p class="card-text">@price($costume->price)</p>
                </div>
            </a>
        </div>
    @endforeach
</div>
