@extends('admin_layouts.master')
@section('css')
    <style>
      .modal-backdrop.fade.show {
        z-index: 1 !important;
      }
    </style>
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

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fas fa-check-circle text-success" style="font-size: 3em;"></i>
        <p>Your costume has been added successfully!</p>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
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
    $('#successModal').modal('show');
  });
      
</script>
@endsection