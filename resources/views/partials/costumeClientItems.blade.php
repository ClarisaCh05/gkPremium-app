<div class="row">
    @if ($noResults)
        <div class="col-12" style="margin-top: 16px; color:lightgray;">
            <p class="text-center">No costumes found matching your criteria.</p>
        </div> 
    @else
        @foreach ($katalogs as $costume)
            @if ($costume->status == 0)
                <div class="col">
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
            @endif
        @endforeach
    @endif
</div>
