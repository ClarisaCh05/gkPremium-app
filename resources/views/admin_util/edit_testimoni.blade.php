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
                    <h1>Tambah Promo</h1>
                </a>
            </div>
        </div>
        <form method="POST" class="add-testimoni">
            @csrf
            @foreach ($testimonies as $testimoni)
                <div class="row">
                    <div class="col add-image">
                        <h3>Foto Baru</h3>
                        <img id="imagePreview" class="image-preview" src="{{ $testimoni->imageUrl }}" alt="Image Preview">
                        <input type="file" accept=".jpg" name="image" id="image" class="form-control" onchange="previewImage(event)">
                    </div>
                </div>
                <div class="row">
                    <div class="col add-title">
                        <h3>Nama / Judul Promosi</h3>
                        <input type="text" name="name" class="title" value="{{ $testimoni->name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col add-desc">
                        <h3>Keterangan</h3>
                        <textarea name="description" class="description">{{ $testimoni->description }}</textarea>
                    </div>
                </div>
                <div class="row submit-btn-ctr">
                    <div class="submit-btn">
                        <button type="submit" value="{{ $testimoni->id_testimoni }}" class="edit">
                            Edit Testimoni
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>
            @endforeach
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

        $(document).ready(function() {
            $('.add-testimoni').on('submit', function (e) {
                e.preventDefault();

                var file = $(this).find('#image')[0].files[0];
                console.log(file);

                let formData2 = new FormData(this);

                if(file) {
                    let testimoniId = $(this).find('button.edit').val()
                    console.log(testimoniId);

                    var formData = new FormData();
                    formData.append('file', file);  
                    formData.append('_token', '{{ csrf_token() }}');
                    
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
                                    url: '{{ route("testimoni.updateTestimoni", ":id_testimoni") }}'.replace(':id_testimoni', testimoniId),
                                    method: 'POST',
                                    data: formData2,
                                    contentType: false,
                                    processData:false,
                                    success: function () {
                                        console.log('success');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Promo update error:', error);
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

                } else {
                    let testimoniId = $(this).find('button.edit').val()
                    console.log(testimoniId);

                    $('.image-preview').each(function() {
                        var imageSrc = $(this).attr('src');
                        console.log("Image src:", imageSrc);
                
                        formData2.append('imageUrl', imageSrc);

                        if(imageSrc) {
                            $.ajax({
                                url: '{{ route("testimoni.updateTestimoni", ":id_testimoni") }}'.replace(':id_testimoni', testimoniId),
                                method: 'POST',
                                data: formData2,
                                contentType: false,
                                processData:false,
                                success: function () {
                                    console.log('success');
                                    window.location.reload(); // Reload the page
                                },
                                error: function(xhr, status, error) {
                                    console.error('Testimoni update error:', error);
                                }
                            });
                        } else {
                            console.error("No picture to update");
                        }
                    });
                }
            })
        });
    </script>
@endsection