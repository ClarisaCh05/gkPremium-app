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
            margin-top: 40px;
        }

        .add-desc .description {
            padding: 8px;
        }

        .cat-btn {
            width: 80% !important;
        }

        .theme-btn {
            width: 80% !important;
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
                    <input type="text" name="name" class="form-control title">
                </div>
            </div>
            <div class="row" style="margin-bottom: 64px;">
                <div class="col add-desc">
                    <h3>Keterangan</h3>
                    <textarea name="description" class="form-control description"></textarea>
                </div>
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

        $(".add-testimoni").on("submit", function(e) {
            e.preventDefault();

            // Get the selected values from the select2 dropdown
            var select2Values = $('#multiple-select-field').val();
            console.log('Selected values:', select2Values);

            var themeValues = $('#multiple-select-field-theme').val();
            console.log('Selected themes:', themeValues);
            
            var file = $('#image')[0].files[0];
            var formData = new FormData();
            formData.append('file', file);
            formData.append('categories', JSON.stringify(select2Values));
            formData.append('theme', JSON.stringify(themeValues));
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
                                var testimoniId = response.id_testimoni;
                                console.log(testimoniId)
                                
                                $.ajax({
                                    url: '{{ route('testimoni.addTestimoniCategory') }}',
                                    method: 'POST',
                                    data: {
                                        id_testimoni: testimoniId,
                                        categories: select2Values,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function () {
                                        console.log('Category added to database');
                                        resetForm();
                                    },
                                    error: function (xhr, status, error) {
                                        console.error('Category addition error:', error);
                                        alert('Category addition error: ' + error);
                                    }
                                });

                                $.ajax({
                                    url: '{{ route('testimoni.addTestimoniTheme') }}',
                                    method: 'POST',
                                    data: {
                                        id_testimoni: testimoniId,
                                        theme: themeValues,
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

            // Function to reset the form
            function resetForm() {
                // Clear text inputs and textareas
                $('.add-costume')[0].reset();
                
                // Clear Select2 selected values
                $('#multiple-select-field').val(null).trigger('change');
                $('#multiple-select-field-color').val(null).trigger('change');
                $('#multiple-select-field-theme').val(null).trigger('change');
                
                // Reset file input
                $('#multiplefileupload').fileinput('clear');
            }
        })
    </script>
@endsection