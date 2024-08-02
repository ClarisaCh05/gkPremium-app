@extends('admin_layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_css/input_file.css') }}">
    <style>
        h3 {
            margin-top: 16px;
        }

        input {
            margin-bottom: 4px;
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
@section('title')
    <title>GK Tambah Kostum</title>
@endsection
@section('main')
    <div class="title">
                <a href="{{ route('kostum.getCompleteCostume') }}">
                    <i class="fas fa-angle-left"></i>
                    <h1>Tambah Kostum</h1>
                </a>
            </div>
            <form class="container add-costume" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row inputs-ctr">
                    <div class="col-md-6 inputs">
                        <div class="input">
                            <h3>Nama Kostum</h3>
                            <input type="text" name="name" class="form-control name">
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
                        <div class="col-md-6 input" style="padding-left: 0px;">
                            <div class="filter-ukuran">
                                <h3>Ukuran</h3>
                                <select name="size" class="form-select size" id="sizes">
                                    <option value="">Pilih Ukuran</option>
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
                        </div>
                        <div class="input-color">
                            <h3>Warna</h3>
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
                            <input type="number" name="price" class="form-control price">
                        </div>
                        <div class="input">
                            <h3>Deskripsi</h3>
                            <textarea name="description" class="form-control description"></textarea>
                        </div>
                        <div class="input-foto">
                            <h3>Foto</h3>
                            <div class="verify-sub-box">
                                <div class="file-loading">
                                    <input name="image" id="multiplefileupload" type="file" accept=".jpg" multiple>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="tambah">
                        Tambah Kostum
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
@endsection
@section('script')
    <script type="text/javascript">

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

        $('.add-costume').on('submit', function(event) {
            event.preventDefault();

            // Get the selected values from the select2 dropdown
            var select2Values = $('#multiple-select-field').val();
            console.log('Selected values:', select2Values);

            var colorValues = $('#multiple-select-field-color').val();
            console.log('Selected colors:', colorValues);

            var themeValues = $('#multiple-select-field-theme').val();
            console.log('Selected themes:', themeValues);

            var fileInput = $('#multiplefileupload')[0];
            var files = fileInput.files;
            console.log('Files:', files);

            var name = $('.name').val()
            console.log(name)

            var size = $('.size').val()
            console.log(size)

            var description = $('.description').val()
            console.log(description)

            var harga = $('.price').val()
            console.log(harga)

            let formData = new FormData(this);

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('status', 0);
            formData.append('categories', JSON.stringify(select2Values));
            formData.append('color', JSON.stringify(colorValues));
            formData.append('theme', JSON.stringify(themeValues));

            $.ajax({
                url: '{{ route('kostum.addCostume') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var costumeId = response.id_costume;

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
                                resetForm();
                        },
                        error: function (xhr, status, error) {
                            console.error('Category addition error:', error);
                            alert('Category addition error: ' + error);
                        }
                    });

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
                                resetForm();
                        },
                        error: function (xhr, status, error) {
                            console.error('Color addition error:', error);
                            alert('Color addition error: ' + error);
                        }
                    });

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
                                resetForm();
                        },
                        error: function (xhr, status, error) {
                            console.error('Theme addition error:', error);
                            alert('Theme addition error: ' + error);
                        }
                    });
                },

                error: function(xhr, status, error) {
                    console.error('Submission error:', error);
                }
            });
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
    </script>
@endsection