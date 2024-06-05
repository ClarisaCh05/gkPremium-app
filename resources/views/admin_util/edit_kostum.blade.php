@extends('admin_layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_css/input_file.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <style>
        .edit-btn .edit {
            background-color: var(--main);
            padding: 8px 16px 8px 16px;
            border-radius: 5px;
        }

        .edit-btn .edit i {
            margin-left: 8px;
        }

        .input-foto .preview-image-box {
            width: 100%;
            height: 300px;
            border: 1px solid gray;
            border-radius: 5px;
            padding: 8px;
            margin: 16px 0 16px 0;
            display: flex;
            flex-direction: row;
        }

        .input-foto .preview-category-box {
            width: 100%;
            border: 1px solid gray;
            border-radius: 5px;
            padding: 8px;
            margin: 16px 0 16px 0;
        }

        .img-box {
            border: 1px solid gray;
            padding: 8px;
            width: 220px;
            height: 280px;
            margin: 0 8px 0 8px;
        }

        .img-box img {
            width: 200px;
            height: 220px;
            margin-bottom: 8px;
        }

        .img-box .remove-img {
            padding: 4px 8px 4px 8px;
            background-color: salmon;
            border: none;
        }

        .input .preview-category-box {
            display: flex;
            flex-direction: row;
        }

        .preview-category-box .tags {
            width: 200px;
            margin: 8px;
            border: 1px solid grey;
        }

        .preview-category-box .tags .remove-category {
            padding: 8px 0 0 16px;
            margin-right: 8px; 
            background-color: salmon;
            border: none;
        }
    </style>
@endsection
@section('title')
    <title>GK Sunting Kostum</title>
@endsection
@section('main')
    <div class="title">
        <a href="{{ route('kostum.getCompleteCostume') }}">
            <i class="fas fa-angle-left"></i>
            <h1>Edit Kostum</h1>
        </a>
    </div>
    @foreach ($costume as $item)
        <form method="POST" class="update-costume" action="{{ route('kostum.updateCostume', ['id_costume' => $item->id_costume]) }}" enctype="multipart/form-data">
            @csrf
            <div class="input-foto">
                <h3>Foto</h3>
                <div class="preview-image-box">
                    @foreach ($images as $image)
                        <div class="img-box" id="{{ $image->id_image }}">
                            <img src="{{ $image->imageUrl }}" alt="{{ $item->name }}" id="{{ $image->id_image }}">
                            <div class="img-act-box">
                                <button class="remove-img" id="{{ $image->id_image }}" data-csrf="{{ csrf_token() }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="verify-sub-box">
                    <div class="file-loading">
                        <input name="image" id="multiplefileupload" type="file" accept=".jpg" multiple>
                    </div>
                </div>
            </div>
            <div class="inputs-ctr">
                <div class="inputs">
                    <div class="input">
                        <h3>Kategori</h3>
                        <div class="preview-category-box">
                            @foreach ($costume_category as $cc)
                                @foreach ($categories as $category)
                                    @if ($cc->id_category == $category->id_category)
                                        <div class="tags" id="{{ $category->id_category }}">
                                            <button class="remove-category" data-costume-category="{{ $cc->id_costume_category }}" data-csrf="{{ csrf_token() }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <span class="tag" id="{{ $category->id_category }}">{{ $category->category }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="cat-btn">
                            <select name="category" class="form-select" id="multiple-select-field" data-placeholder="Pilih Kategori" multiple>
                                <option default></option>
                                    <option value="14">Adat</option>
                                    <option value="6">Aksesoris</option>
                                    <option value="12">Animal</option>
                                    <option value="15">Apron</option>
                                    <option value="7">Bridal Sration</option>
                                    <option value="19">Cosplay</option>
                                    <option value="16">Futuristik</option>
                                    <option value="10">Halloween</option>
                                    <option value="11">Hero</option>
                                    <option value="3">Internasional</option>
                                    <option value="4">Karakter</option>
                                    <option value="18">Model</option>
                                    <option value="9">Natal</option>
                                    <option value="13">Onesie</option>
                                    <option value="20">Prince</option>
                                    <option value="2">Princess</option>
                                    <option value="5">Profesi</option>
                                    <option value="1">Sayurbuah</option>
                                    <option value="17">Old</option>
                            </select>
                        </div>
                    </div>
                    <div class="input">
                        <h3>Nama Kostum</h3>
                        <input type="text" class="name" name="name" value="{{ $item->name }}" placeholder="{{ $item->name }}">
                    </div>
                    <div class="input">
                        <h3>Ukuran</h3>
                        <select name="size" class="form-select" id="select-size" style="width: 50%">
                            <option value="{{ $item->size }}" selected>{{ $item->size }}</option>
                            <option value="anak">Anak</option>
                            <option value="dewasa">Dewasa</option>
                            <option value="anak dan dewasa">Anak & Dewasa</option>
                        </select>
                    </div>
                </div>
                <div class="inputs">
                    <div class="input">
                        <h3>Harga</h3>
                        <input type="number" class="price" name="price" placeholder="{{ $item->price }}" value="{{ $item->price }}">
                    </div>
                    <div class="input">
                        <h3>Deskripsi</h3>
                        <textarea class="desc" name="description" placeholder="{{ $item->description }}">{{ $item->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="edit-btn">
                <button type="submit" class="edit" value="{{ $item->id_costume }}">
                    Edit Kostum
                    <i class="fas fa-pen"></i>
                </button>
            </div>
        </form>
    @endforeach
@endsection
@section('script')
    <script type="text/javascript">
        $("#multiplefileupload").fileinput({
            'theme': 'fa',
            'uploadUrl': '#',
            showRemove: false,
            showUpload: false,
            showZoom: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            browseLabel: "",
            browseIcon: "<i class='fa fa-plus'></i>",
            overwriteInitial: false,
            initialPreviewAsData: true,
            fileActionSettings :{
                showUpload: false,
                showZoom: false,
                removeIcon: "<i class='fa fa-times'></i>",
            }
        });

        $('#multiple-select-field').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        });

        let removeImgId = [];
        let removeCatId = [];

        $(document).ready(function() {
            $('.remove-img').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    console.log("click")
                    var id_img = $(this).attr('id');
                    removeImgId.push(id_img);
                    console.log("id img:", removeImgId);
                    
                    var token = $(this).data('csrf');

                    $(this).closest('.img-box').remove();

                    deleteImage(id_img, token);

                }); 
            });

            $('.remove-category').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    console.log("click")
                    var id_cos_cat = $(this).data('costume-category');
                    removeCatId.push(id_cos_cat);
                    console.log("id cat:", removeCatId);

                    $(this).closest('.tags').remove();

                    var token = $(this).data('csrf');

                    $.each(removeCatId, function(index, value) {
                        deleteCategory(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log('Error deleting category:', errorThrown);
                        });
                    });
                });
            });

            $('form.update-costume').on('submit', function(e) {
                e.preventDefault();

                let costumeId = $(this).find('button.edit').val();

                var fileInput = $('#multiplefileupload')[0];
                var files = fileInput.files;
                console.log('Files:', files);

                var select2Values = $('#multiple-select-field').val();
                console.log('Selected values:', select2Values);

                var formData = new FormData(this);
                formData.append('id_costume', costumeId);

                $.ajax({
                    url: '{{ route("kostum.updateCostume", ":id_costume") }}'.replace(':id_costume', costumeId),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function() {
                        console.log('Costume updated to database');
                        // refreshForm(costumeId);
                        window.location.reload(); // Reload the page
                    },
                    error: function(xhr, status, error) {
                        console.error('Costume update error:', error);
                    }
                })

                if (files.length > 0) {
                    for (var i = 0; i < files.length; i++) {
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            var formData2 = new FormData();
                            formData2.append('file', file);
                            formData2.append('name', $('.name').val());
                            formData2.append('_token', '{{ csrf_token() }}')
                            formData2.append('id_costume', costumeId); // Add costume ID to the form data
                            
                            $.ajax({
                                url: '{{ route('kostum.uploadImage') }}',
                                method: 'POST',
                                data: formData2,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    console.log('Image Upload Response:', response);
                                    if (response.image_url) {
                                        $.ajax({
                                            url: '{{ route('kostum.saveImage') }}',
                                            method: 'POST',
                                            data: {
                                                id_costume: costumeId,
                                                imageUrl: response.image_url,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                console.log('Image added to database:', response);
                                            }
                                        });
                                    } else {
                                        console.error('Image URL missing in response');
                                    }
                                }
                            })
                        }
                    }
                }

                if (select2Values.length > 0) {
                    $.ajax({
                        url: '{{ route('kostum.addCategory') }}',
                        method: 'POST',
                        data: {
                            id_costume: costumeId,
                            categories: select2Values,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            console.log('Category added to database');
                        },
                        error: function (xhr, status, error) {
                            console.error('Category addition error:', error);
                        }
                    });   
                }  
            })
        });

        function refreshForm(costumeId) {
            $.ajax({
                url: '{{ route("kostum.editCostume", ":id_costume") }}'.replace(':id_costume', costumeId),
                method: 'GET',
                success: function(response) {
                    console.log('Form data retrieved:', response);

                    // Clear current form values
                    $('form.update-costume')[0].reset();

                    console.log(response.name, response.price, response.description, response.size)
                    // Update form with new values
                    $('.name').val(response.name);
                    $('.price').val(response.price);
                    $('.desc').val(response.description);
                    $('#select-size').val(response.size).trigger('change');

                    // Ensure response.categories is defined
                    if (response.categories && response.categories.length > 0) {
                        // Update Select2 categories
                        $('#multiple-select-field').val(response.categories.map(c => c.id_category)).trigger('change');
                    } else {
                        $('#multiple-select-field').val([]).trigger('change');
                    }

                    // Clear existing images and add new images
                    if (response.images && response.images.length > 0) {
                            response.images.forEach(function(image) {
                            var existingImage = $('#' + image.id_image);
                            if (existingImage.length > 0) {
                                // Image exists, update it
                                existingImage.attr('src', image.imageUrl).attr('alt', response.name);
                            } else {
                                // Image does not exist, append it
                                $('.preview-image-box').append(`
                                    <div class="img-box" id="${image.id_image}">
                                        <img src="${image.imageUrl}" alt="${response.name}" id="${image.id_image}">
                                        <div class="img-act-box">
                                            <button class="remove-img" id="${image.id_image}" data-csrf="{{ csrf_token() }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                `);
                            }
                        });
                    }

                    // Reinitialize remove buttons
                    initializeRemoveButtons();
                },
                error: function(xhr, status, error) {
                    console.error('Error retrieving form data:', error);
                }
            });
        }

        function initializeRemoveButtons() {
            $('.remove-img').off('click').on('click', function(e) {
                e.preventDefault();
                console.log("click");
                var id_img = $(this).attr('id');
                removeImgId.push(id_img);
                console.log("id img:", removeImgId);
                
                var token = $(this).data('csrf');

                $(this).closest('.img-box').remove();

                deleteImage(id_img, token);
            });

            $('.remove-category').off('click').on('click', function(e) {
                e.preventDefault();
                console.log("click");
                var id_cos_cat = $(this).data('costume-category');
                removeCatId.push(id_cos_cat);
                console.log("id cat:", removeCatId);

                $(this).closest('.tags').remove();

                var token = $(this).data('csrf');

                $.each(removeCatId, function(index, value) {
                    deleteCategory(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log('Error deleting category:', errorThrown);
                    });
                });
            });
        }

        function deleteImage(imageId, token) {
            $.ajax({
                type: 'DELETE',
                url: '{{ route("kostum.imageDelete", ":id_image") }}'.replace(':id_image', imageId),
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('Image deleted successfully');
                },
                error: function(error) {
                    console.log('Error deleting image:', error);
                }
            });
        }

        function deleteCategory(ccId, token) {
            return $.ajax({
                type: 'DELETE',
                url: '{{ route("kostum.deleteCategory", ":id_costume_category") }}'.replace(':id_costume_category', ccId),
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('Category deleted successfully');
                },
                error: function(error) {
                    console.log('Error deleting category:', error);
                    throw error;
                }
            });
        }
    </script>
@endsection