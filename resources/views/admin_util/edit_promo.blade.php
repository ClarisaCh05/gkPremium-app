@extends('admin_layouts.master')
@section('css')
    <style>
        .image-old-preview {
            width: 100%;
            max-width: 300px;
            height: auto;
            margin-top: 10px;
            margin-bottom: 16px;
        }

        .image-preview {
            width: 100%;
            max-width: 300px;
            height: auto;
            margin-top: 10px;
            margin-bottom: 16px;
        }

        .add-image input {
            margin-bottom: 16px;
            width: 50%;
        }

        .add-details input {
            padding: 8px;
            width: 50%;
        }

        .input-name input {
            font-size: 16px;
            margin-bottom: 16px;
        }

        .photo-input {
            margin-top: 24px;
        }

        .photo-input img {
            margin-bottom: 16px;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="col title">
            <a href="{{ route('promosi') }}">
                <i class="fas fa-angle-left"></i>
                <h1>Edit Promo</h1>
            </a>
        </div>
        @foreach ($promos as $promo)
                <form class="add-promosi" method="POST" action="{{ route('promosi.updatePromo', ['id_promo' => $promo->id_promo]) }}" enctype="multipart/form-data">
                    @csrf
                    <h3>Foto</h3>
                    <div class="photo-preview">
                        @foreach ($promo_img as $img)
                            <img id="imageOldPreview" class="image-old-preview" src="{{ $img->image }}" alt="Image Preview">
                            <br>
                            <button class="btn btn-danger" data-id="{{ $img->id_promo_img }}" data-csrf="{{ csrf_token() }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endforeach
                    </div>
                    <div class="col add-image">
                        <div class="photo-input">
                            <img id="imagePreview" class="image-preview" src="" alt="Image Preview">
                            <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="col add-details">
                        <div class="input-name">
                            <br>
                            <h3>Nama Promo / Promosi</h3>
                            <input type="text" name="title" class="title" value="{{ $promo->title }}">
                        </div>
                    </div>
                    <div class="col add-promo">
                        <div class="submit-btn">
                            <button type="submit" class="edit" value="{{ $promo->id_promo }}">
                                Edit Promosi
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </form>
        @endforeach
    </div>
@endsection
@section('script')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function() {

            $('.btn-danger').on('click', function(e) {
                e.preventDefault();
                console.log("click")

                var id_promo_img = $(this).attr('data-id');
                console.log("id img promo:", id_promo_img);

                var token = $(this).data('csrf');

                deleteImage(id_promo_img, token);
            });

            $('.add-promosi').on('submit', function(e) {
                    
                e.preventDefault();

                let promo_id = $(this).find('button.edit').val();
                console.log(promo_id);

                var formData = new FormData(this);
                formData.append('promo_id', promo_id);

                $.ajax({
                    url: '{{ route("promosi.updatePromo", ":id_promo") }}'.replace(':id_promo', promo_id),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function() {
                        console.log('Promo updated to database');
                        window.location.reload(); // Reload the page
                    },
                    error: function(xhr, status, error) {
                        console.error('Promo update error:', error);
                    }
                });
                
                var file = $(this).find('#image')[0].files[0]; // Get the file from the input
                var formData2 = new FormData();

                formData2.append('file', file);
                formData2.append('_token', '{{ csrf_token() }}');
                formData2.append('id_promo', promo_id);

                if (file) {
                    $.ajax({
                        url: '{{ route('promosi.uploadImage') }}',
                        method: 'POST',
                        data: formData2,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.image_url) {
                                $.ajax({
                                    url: '{{ route('promosi.saveImage') }}',
                                    method: 'POST',
                                    data: {
                                        id_promo: promo_id,
                                        image: response.image_url,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log("Image added to database:", response);
                                    }
                                });
                            } else {
                                console.error('Image URL missing in response');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Image upload error:', error);
                        }
                    });
                }
            });
        });

        function deleteImage(id_promo_img, token) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '{{ route("promosi.deletePromoImg", ":id_promo_img") }}'.replace(':id_promo_img', id_promo_img),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Image deleted successfully');
                            location.reload();
                        } else {
                            alert('Failed to delete image');
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        }
    </script>
@endsection
