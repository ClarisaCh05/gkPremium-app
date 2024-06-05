@extends('admin_layouts.master')
@section('css')
    <style>
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
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="col title">
            <a href="{{ route('promosi') }}">
                <i class="fas fa-angle-left"></i>
                <h1>Tambah Promo</h1>
            </a>
        </div>
        <form class="add-promosi" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col add-image">
                <h3>Foto</h3>
                <img id="imagePreview" class="image-preview" src="" alt="Image Preview">
                <input type="file" name="image" id="image" class="form-control" accept=".jpg" onchange="previewImage(event)">
            </div>
            <div class="col add-details">
                <div class="input-name">
                    <h3>Nama Promo / Promosi</h3>
                    <input type="text" name="title" class="title">
                </div>
            </div>
            <div class="col add-promo">
                <div class="submit-btn">
                    <button type="submit" class="tambah">
                        Tambahkan Promosi
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        </form>
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

        $(".add-promosi").on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            
            $.ajax({
                url: '{{ route('promosi.addPromo') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var promoId = response.id_promo;
                    console.log("id promo:", promoId)
                    
                    var file = $('#image')[0].files[0]; // Get the file from the input
                    var formData2 = new FormData();
                    
                    formData2.append('file', file);
                    formData2.append('_token', '{{ csrf_token() }}');
                    formData2.append('id_promo', promoId);

                    if(promoId) {
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
                                            id_promo: promoId,
                                            image: response.image_url,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            console.log("Image added to database:", response);
                                            window.location.reload(); // Reload the page
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
                },
                error: function(xhr, status, error) {
                    console.error('Promo submission error:', error);
                }
            });
        });
    </script>
@endsection
