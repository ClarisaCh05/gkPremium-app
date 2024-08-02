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
            padding: 8px;
            margin-right: 8px; 
            background-color: salmon;
            border: none;
        }

        .preview-category-box .tags .remove-color {
            padding: 8px;
            margin-right: 8px; 
            background-color: salmon;
            border: none;
        }

        .preview-category-box .tags .remove-theme {
            padding: 8px;
            margin-right: 8px; 
            background-color: salmon;
            border: none;
        }

        h3 {
            margin-top: 16px;
        }

        input {
            margin-bottom: 4px;
        }

        .edit-btn {
            text-align: center;
            margin-top: 16px;
        }

        .edit-btn button {
            text-align: center;
            background-color: var(--tambah);
            border: none;
            padding: 8px 16px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
        }

        .edit-btn button i {
            margin-left: 16px;
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
            <div class="row inputs-ctr">
                <div class="col-md-6 inputs">
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
                        <input type="text" class="form-control name" name="name" value="{{ $item->name }}" placeholder="{{ $item->name }}">
                    </div>
                    <div class="input">
                        <h3>Ukuran</h3>
                        <select name="size" class="form-select" id="select-size" style="width: 50%">
                            <option value="{{ $item->size }}" selected>@sizeLabel($item->size)</option>
                            <option value="semua ukuran">Semua Ukuran</option>
                            <option value="" disabled></option>
                            <hr>
                            <option value="" disabled></option>
                            <option value="Bayi" disabled style="font-weight: bold;">Bayi</option>
                            <option value="" disabled></option>
                            <option value="3m">3 - 6 Bulan</option>
                            <option value="6m">6 - 9 Bulan</option>
                            <option value="9m">9 - 12 Bulan</option>
                            <option value="12m">12 - 18 Bulan</option>
                            <option value="18m">18 - 24 Bulan</option>
                            <option value="" disabled></option>
                            <hr>
                            <option value="" disabled></option>
                            <option value="balita" disabled style="font-weight: bold;">Balita</option>
                            <option value="" disabled></option>
                            <option value="2t">2 Tahun</option>
                            <option value="3t">3 Tahun</option>
                            <option value="4t">4 Tahun</option>
                            <option value="5t">5 Tahun</option>
                            <option value="" disabled></option>
                            <hr>
                            <option value="" disabled></option>
                            <option value="anak" disabled style="font-weight: bold;">Anak</option>
                            <option value="" disabled></option>
                            <option value="xs-a">4 Tahun</option>
                            <option value="s-a">5 - 6 Tahun</option>
                            <option value="m-a">7 - 8 Tahun</option>
                            <option value="l-a">9 - 12 Tahun</option>
                            <option value="" disabled></option>
                            <hr>
                            <option value="" disabled></option>
                            <option value="remaja" disabled style="font-weight: bold;">Remaja</option>
                            <option value="" disabled></option>
                            <option value="xs-r">12 - 13 Tahun</option>
                            <option value="s-r">14 - 15 Tahun</option>
                            <option value="m-r">15 - 16 Tahun</option>
                            <option value="l-r">16 - 18 Tahun</option>
                            <option value="" disabled></option>
                            <hr>
                            <option value="" disabled></option>
                            <option value="dewasa" disabled style="font-weight: bold;">Dewasa Wanita</option>
                            <option value="" disabled></option>
                            <option value="xs-w">XS</option>
                            <option value="s-w">S</option>
                            <option value="m-w">M</option>
                            <option value="l-w">L</option>
                            <option value="xl-w">XL</option>
                            <option value="" disabled></option>
                            <hr>
                            <option value="" disabled></option>
                            <option value="dewasa" disabled style="font-weight: bold;">Dewasa Pria</option>
                            <option value="" disabled></option>
                            <option value="xs-p">XS</option>
                            <option value="s-p">S</option>
                            <option value="m-p">M</option>
                            <option value="l-p">L</option>
                            <option value="xl-p">XL</option>
                            <option value="" disabled></option>
                        </select>
                    </div>
                    <div class="input-color">
                        <h3>Warna</h3>
                        <div class="preview-category-box">
                            @foreach ($costume_color as $cc)
                                @foreach ($colors as $color)
                                    @if ($cc->id_color == $color->id_color)
                                        <div class="tags" id="{{ $color->id_color }}">
                                            <button class="remove-color" data-costume-color="{{ $cc->id_costume_color }}" data-csrf="{{ csrf_token() }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <span class="tag" id="{{ $color->id_color }}">{{ $color->color }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <select name="color" class="form-select" id="multiple-select-field-color" data-placeholder="Pilih Warna" multiple>
                            <option value="1">Merah</option>
                            <option value="2">Oranye / Jingga</option>
                            <option value="3">Kuning</option>
                            <option value="4">Hijau</option>
                            <option value="5">Biru</option>
                            <option value="6">Ungu</option>
                            <option value="7">Pink</option>
                            <option value="8">Cokelat</option>
                            <option value="9">Hitam</option>
                            <option value="10">Putih</option>
                            <option value="11">Abu-abu</option>
                        </select>
                    </div>
                    <div class="input-theme">
                        <h3>Tema</h3>
                        <div class="preview-category-box">
                            @foreach ($costume_theme as $ct)
                                @foreach ($themes as $theme)
                                    @if ($ct->id_theme == $theme->id_theme)
                                        <div class="tags" id="{{ $theme->id_theme }}">
                                            <button class="remove-theme" data-costume-theme="{{ $ct->id_costume_theme }}" data-csrf="{{ csrf_token() }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <span class="tag" id="{{ $theme->id_theme }}">{{ $theme->theme }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <select name="theme" class="form-select" id="multiple-select-field-theme" data-placeholder="Pilih Tema" multiple>
                            <option value="1">Ancient Civilization / Peradaban Kuno</option>
                            <option value="2">Medieval / Renaissance / Abad Pertengahan</option>
                            <option value="3">90's</option>
                            <option value="4">Wild West</option>
                            <option value="5">Film dan Acara TV</option>
                            <option value="6">Anime</option>
                            <option value="7">Superhero dan Penjahat</option>
                            <option value="8">Ikon Musik</option>
                            <option value="9">Karakter Video Game</option>
                            <option value="10">Karakter Kartun</option>
                            <option value="11">Karakter Cerita / Dongeng</option>
                            <option value="12">Makhluk Mitos</option>
                            <option value="13">Penyihir</option>
                            <option value="14">Bajak Laut</option>
                            <option value="15">Putri Duyung</option>
                            <option value="16">Vampir dan Manusia Serigala</option>
                            <option value="17">Steampunk</option>
                            <option value="18">Dokter dan Perawat</option>
                            <option value="19">Polisi</option>
                            <option value="20">Pemadam Kebakaran</option>
                            <option value="21">Militer</option>
                            <option value="22">Pelaut</option>
                            <option value="23">Ilmuwan</option>
                            <option value="24">Pilot dan Pramugari</option>
                            <option value="25">Hewan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 inputs">
                    <div class="input">
                        <h3>Harga</h3>
                        <input type="number" class="form-control price" name="price" placeholder="{{ $item->price }}" value="{{ $item->price }}">
                    </div>
                    <div class="input">
                        <h3>Deskripsi</h3>
                        <textarea class="form-control desc" name="description" placeholder="{{ $item->description }}">{{ $item->description }}</textarea>
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

        $('#multiple-select-field-color').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        });

        $('#multiple-select-field-theme').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        });

        let removeImgId = [];
        let removeCatId = [];
        let removeColorId = [];
        let removeThemeId = [];

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

            $('.remove-color').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    console.log("click")
                    var id_cos_color = $(this).data('costume-color');
                    removeColorId.push(id_cos_color);
                    console.log("id color:", removeColorId);

                    $(this).closest('.tags').remove();

                    var token = $(this).data('csrf');

                    $.each(removeColorId, function(index, value) {
                        deleteColor(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log('Error deleting color:', errorThrown);
                        });
                    });
                });
            });

            $('.remove-theme').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    console.log("click")
                    var id_cos_theme = $(this).data('costume-theme');
                    removeThemeId.push(id_cos_theme);
                    console.log("id theme:", removeThemeId);

                    $(this).closest('.tags').remove();

                    var token = $(this).data('csrf');

                    $.each(removeThemeId, function(index, value) {
                        deleteTheme(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log('Error deleting theme:', errorThrown);
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

                var colorValues = $('#multiple-select-field-color').val();
                console.log('Selected colors:', colorValues);

                var themeValues = $('#multiple-select-field-theme').val();
                console.log('Selected themes:', themeValues);

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

                if (colorValues.length > 0) {
                    $.ajax({
                        url: '{{ route('kostum.addColor') }}',
                        method: 'POST',
                        data: {
                            id_costume: costumeId,
                            color: colorValues,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            console.log('Color added to database');
                        },
                        error: function (xhr, status, error) {
                            console.error('Color addition error:', error);
                            alert('Color addition error: ' + error);
                        }
                    });
                }

                if (themeValues.length > 0) {
                    $.ajax({
                        url: '{{ route('kostum.addTheme') }}',
                        method: 'POST',
                        data: {
                            id_costume: costumeId,
                            theme: themeValues,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            console.log('Theme added to database');
                        },
                        error: function (xhr, status, error) {
                            console.error('Theme addition error:', error);
                            alert('Theme addition error: ' + error);
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
                        $('#multiple-select-field-color').val(response.colors.map(cl => cl.id_color)).trigger('change');
                        $('#multiple-select-field-theme').val(response.theme.map(t => t.id_theme)).trigger('change');
                    } else {
                        $('#multiple-select-field').val([]).trigger('change');
                        $('#multiple-select-field-color').val([]).trigger('change');
                        $('#multiple-select-field-theme').val([]).trigger('change');
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

            $('.remove-color').off('click').on('click', function(e) {
                e.preventDefault();
                console.log("click")
                var id_cos_color = $(this).data('costume-color');
                removeColorId.push(id_cos_color);
                console.log("id color:", removeColorId);

                $(this).closest('.tags').remove();

                var token = $(this).data('csrf');

                $.each(removeColorId, function(index, value) {
                    deleteColor(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log('Error deleting color:', errorThrown);
                    });
                });
            });

            $('.remove-theme').off('click').on('click', function(e) {
                e.preventDefault();
                console.log("click")
                var id_cos_theme = $(this).data('costume-theme');
                removeThemeId.push(id_cos_theme);
                console.log("id cat:", removeThemeId);

                $(this).closest('.tags').remove();

                var token = $(this).data('csrf');

                $.each(removeThemeId, function(index, value) {
                    deleteTheme(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log('Error deleting theme:', errorThrown);
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

        function deleteColor(ccId, token) {
            console.log('removed id color:', ccId)
            return $.ajax({
                type: 'DELETE',
                url: '{{ route("kostum.deleteColor", ":id_costume_color") }}'.replace(':id_costume_color', ccId),
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('Color deleted successfully');
                },
                error: function(error) {
                    console.log('Error deleting color:', error);
                    throw error;
                }
            });
        }

        function deleteTheme(ccId, token) {
            return $.ajax({
                type: 'DELETE',
                url: '{{ route("kostum.deleteTheme", ":id_costume_theme") }}'.replace(':id_costume_theme', ccId),
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('Theme deleted successfully');
                },
                error: function(error) {
                    console.log('Error deleting theme:', error);
                    throw error;
                }
            });
        }
    </script>
@endsection