@extends('admin_layouts.master')
@section('css')
    <style>
        h3 {
            margin-top: 16px;
        }

        input {
            margin-bottom: 4px;
        }
        
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

        .submit-btn {
            text-align: center;
            margin-top: 16px;
        }

        .submit-btn button {
            text-align: center;
            background-color: var(--tambah);
            border: none;
            padding: 8px 16px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
        }

        .submit-btn button i {
            margin-left: 16px;
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
            <form class="add-promosi" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Foto</h3>
                <div class="col photo-preview">
                    @foreach ($promo_img as $img)
                        <img id="imagePreview" class="image-preview" src="{{ $img->image }}" alt="Image Preview">
                        <input type="file" accept=".jpg" name="image" id="image" class="form-control" onchange="previewImage(event)">
                    @endforeach
                </div>
                <div class="col add-details">
                    <div class="input-name">
                        <h3>Nama Promo / Promosi</h3>
                        <input type="text" name="title" class="form-control title" value="{{ $promo->title }}">
                    </div>
                </div>
                <br>
                <div class="row date" style="margin-left: 4px;">
                    <div class="col-md-6 start-date">
                        <h3>Tanggal Mulai Promosi</h3>
                        <input type="date" name="created_at" class="form-control" value="{{ $promo->created_at }}">
                    </div>
                    <div class="col-md-6 end-date">
                        <h3>Tanggal Promosi Berakhir</h3>
                        <input type="date" name="ended_at" class="form-control" value="{{ $promo->ended_at }}">
                    </div>
                </div>
                <br>
                <div class="col add-promo">
                    <div class="submit-btn">
                        <button type="submit" class="tambah" value="{{ $promo->id_promo }}">
                            Tambahkan Promosi
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
            $('.edit-promosi').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var file = $('#image')[0].files[0];
                let promo_id = $(this).find('button.edit').val();
                formData.append('promo_id', promo_id);

                for (var pair of formData.entries()) {
                    console.log(pair[0]+ ': ' + pair[1]); 
                }

                if (file) {
                    // Append file to formData
                    formData.append('file', file);

                    $.ajax({
                        url: '{{ route('promosi.uploadImage') }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.image_url) {
                                formData.append('imageUrl', response.image_url);
                                updatePromo(promo_id, formData);
                            } else {
                                console.error('Image URL missing in response');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Image upload error:', error);
                        }
                    });
                } else {
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
                }
            });

            function updatePromo(promo_id, formData) {
                $.ajax({
                    url: '{{ route("promosi.updateImagePromo", ":id_promo") }}'.replace(':id_promo', promo_id),
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
            }
        });
    </script>
@endsection
