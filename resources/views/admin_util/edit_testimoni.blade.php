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
            margin-top: 32px;
        }

        .add-desc .description {
            padding: 8px;
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

        .preview-category-box .tags .remove-theme {
            padding: 8px;
            margin-right: 8px; 
            background-color: salmon;
            border: none;
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
        <div class="row">
            <div class="col title">
                <a href="{{ route('testimoni') }}">
                    <i class="fas fa-angle-left"></i>
                    <h1>Edit Testimoni</h1>
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
                        <h3>Nama / Judul Edit</h3>
                        <input type="text" name="name" class="form-control title" value="{{ $testimoni->name }}">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 64px;">
                    <div class="col add-desc">
                        <h3>Keterangan</h3>
                        <textarea name="description" class="form-control description">{{ $testimoni->description }}</textarea>
                    </div>
                </div>
                <div class="preview-category-box">
                    @foreach ($testimoni_kategori as $tk)
                        @foreach ($categories as $category)
                            @if ($tk->id_kategori == $category->id_category)
                                <div class="tags" id="{{ $category->id_category }}">
                                    <button class="remove-category" data-testi-category="{{ $tk->id_testimoni_kategori }}" data-csrf="{{ csrf_token() }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <span class="tag" id="{{ $category->id_category }}">{{ $category->category }}</span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="input-cat">
                    <h3>Kategori</h3>
                    <div class="cat-btn">
                        <select name="category" class="form-select" id="multiple-select-field" data-placeholder="Pilih Kategori" multiple>
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
                <div class="preview-category-box">
                    @foreach ($testimoni_tema as $tt)
                        @foreach ($themes as $theme)
                            @if ($tt->id_theme == $theme->id_theme)
                                <div class="tags" id="{{ $theme->id_theme }}">
                                    <button class="remove-theme" data-testi-theme="{{ $tt->id_testimoni_tema }}" data-csrf="{{ csrf_token() }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <span class="tag" id="{{ $theme->id_theme }}">{{ $theme->theme}}</span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="input-theme">
                    <h3>Tema</h3>
                    <div class="theme-btn">
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

        $('#multiple-select-field').select2( {
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

        let removeCatId = [];
        let removeThemeId = [];

        $(document).ready(function() {
            $('.remove-category').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    console.log("click")
                    var id_testi_cat = $(this).data('testi-category');
                    removeCatId.push(id_testi_cat);
                    console.log("id cat:", removeCatId);

                    $(this).closest('.tags').remove();

                    var token = $(this).data('csrf');

                    $.each(removeCatId, function(index, value) {
                        console.log(removeCatId)
                        deleteCategory(value, token).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log('Error deleting category:', errorThrown);
                        });
                    });
                });
            });

            $('.remove-theme').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    console.log("click")
                    var id_testi_theme = $(this).data('testi-theme');
                    removeThemeId.push(id_testi_theme);
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

            $('.add-testimoni').on('submit', function (e) {
                e.preventDefault();

                var file = $(this).find('#image')[0].files[0];
                console.log(file);

                var select2Values = $('#multiple-select-field').val();
                console.log('Selected values:', select2Values);

                var themeValues = $('#multiple-select-field-theme').val();
                console.log('Selected themes:', themeValues);

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
                                        addCategory(testimoniId, select2Values);
                                        addThemes(testimoniId, themeValues);
                                        window.location.reload(); // Reload the page
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
                                    addCategory(testimoniId, select2Values);
                                    addThemes(testimoniId, themeValues);
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

            function addCategory(testiId, selectValues) {
                if (selectValues.length > 0) {
                    $.ajax({
                        url: '{{ route('testimoni.addTestimoniCategory') }}',
                        method: 'POST',
                        data: {
                            id_testimoni: testiId,
                            categories: selectValues,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            console.log('Category added to database');
                            resetForm();
                        },
                        error: function (xhr, status, error) {
                            console.error('Category addition error:', error);
                        }
                    });   
                } 
            }

            function addThemes(testiId, selectValues) {
                if (selectValues.length > 0) {
                    $.ajax({
                        url: '{{ route('testimoni.addTestimoniTheme') }}',
                        method: 'POST',
                        data: {
                            id_testimoni: testiId,
                            theme: selectValues,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            console.log('Theme added to database');
                            resetForm();
                        },
                        error: function (xhr, status, error) {
                            console.error('Theme addition error:', error);
                            alert('Theme addition error: ' + error);
                        }
                    });
                }
            }

            function deleteCategory(ccId, token) {
                console.log("cateId:", ccId);
                return $.ajax({
                    type: 'DELETE',
                    url: '{{ route("testimoni.deleteTestimoniCategory", ":id_testimoni_kategori") }}'.replace(':id_testimoni_kategori', ccId),
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

            function deleteTheme(ccId, token) {
                return $.ajax({
                    type: 'DELETE',
                    url: '{{ route("testimoni.deleteTestimoniTheme", ":id_testimoni_tema") }}'.replace(':id_testimoni_tema', ccId),
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

            // Function to reset the form
            function resetForm() {
                // Clear Select2 selected values
                $('#multiple-select-field').val(null).trigger('change');
                $('#multiple-select-field-theme').val(null).trigger('change');
            }
        });
    </script>
@endsection