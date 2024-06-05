@extends('admin_layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_css/input_file.css') }}">
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
            <form class="add-costume">
                @csrf
                <div class="inputs-ctr">
                    <div class="inputs">
                        <div class="input">
                            <h3>Nama Kostum</h3>
                            <input type="text" name="name" class="name">
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
                        <div class="input">
                            <h3>Ukuran</h3>
                            <select class="form-select size" name="size">
                                <option default></option>
                                <option value="anak">Anak</option>
                                <option value="dewasa">Dewasa</option>
                                <option value="anak dan dewasa">Anak & Dewasa</option>
                            </select>
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="input">
                            <h3>Harga</h3>
                            <input type="number" name="price" class="price">
                        </div>
                        <div class="input">
                            <h3>Deskripsi</h3>
                            <textarea name="description" class="description"></textarea>
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
            formData.append('categories', JSON.stringify(select2Values));

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
            
            // Reset file input
            $('#multiplefileupload').fileinput('clear');
        }
    </script>
@endsection