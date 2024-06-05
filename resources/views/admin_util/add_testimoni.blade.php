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
        
        .add-testimoni h3 {
            margin: 16px 0 16px 0;
        }

        .add-testimoni input {
            width: 80%
        }

        .add-testimoni textarea {
            width: 80%;
            height: 80%;
        }

        .add-title input {
            padding: 8px;
            font-size: 16px;
        }

        .submit-btn-ctr {
            margin-top: 64px;
        }

        .add-desc .description {
            padding: 8px;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col title">
                <a href="{{ route('testimoni') }}">
                    <i class="fas fa-angle-left"></i>
                    <h1>Tambah Testimoni</h1>
                </a>
            </div>
        </div>
        <form method="POST" class="add-testimoni">
            @csrf
            <div class="row">
                <div class="col add-image">
                    <h3>Foto</h3>
                    <img id="imagePreview" class="image-preview" src="" alt="Image Preview">
                    <input type="file" accept=".jpg" name="image" id="image" class="form-control" onchange="previewImage(event)">
                </div>
            </div>
            <div class="row">
                <div class="col add-title">
                    <h3>Nama / Judul Testimoni</h3>
                    <input type="text" name="name" class="title">
                </div>
            </div>
            <div class="row">
                <div class="col add-desc">
                    <h3>Keterangan</h3>
                    <textarea name="description" class="description"></textarea>
                </div>
            </div>
            <div class="row submit-btn-ctr">
                <div class="submit-btn">
                    <button type="submit" class="tambah">
                        Tambahkan Testimoni
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

        $(".add-testimoni").on("submit", function(e) {
            e.preventDefault();
            
            var file = $('#image')[0].files[0];
            var formData = new FormData();
            formData.append('file', file);
            formData.append('_token', '{{ csrf_token() }}');

            let formData2 = new FormData(this);

            $.ajax({
                url: '{{ route('testimoni.uploadImage') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response.image_url);
                    formData2.append('_token', '{{ csrf_token() }}');
                    formData2.append('imageUrl', response.image_url);

                    if(response.image_url) {
                        $.ajax({
                            url: '{{ route('testimoni.addTestimoni') }}',
                            method: 'POST',
                            data: formData2,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log("Testimoni added to database", response);
                                window.location.reload(); // Reload the page
                            }
                        });
                    } else {
                        console.error("Failed to upload image");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Data upload error:', error);
                }
            });
        })
    </script>
@endsection