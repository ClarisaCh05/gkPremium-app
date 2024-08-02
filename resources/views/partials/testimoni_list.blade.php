@if($noResults)
    <p>No testimonies found.</p>
@else
    @foreach ($testimonies as $index => $testimoni)
        <div class="preview" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $index }}">
            <div class="ulasan-pic">
                <div class="row image_testimoni">
                    <img src="{{ $testimoni->imageUrl }}" alt="{{ $testimoni->name }}">
                </div>
                <div class="row name_testimoni">
                    <p style="font-weight: bold;">{{ $testimoni->name }}</p>
                </div>
                <div class="row deskripsi" style="padding: 8px 8px 0 8px;">
                    <p>{{ $testimoni->description }}</p>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $index }}">{{ $testimoni->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <img src="{{ $testimoni->imageUrl }}" class="ulasan-pic">
                            </div>
                            <div class="col" style="margin-top: 16px;">
                                <p>{{ $testimoni->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
