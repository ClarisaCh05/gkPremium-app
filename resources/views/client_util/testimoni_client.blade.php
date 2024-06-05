@extends('layouts.home')
@section('css')
    <style>
      .breadcrumbs-ctr {
          margin-left: 32px;
          margin-top: 16px;
      }

      .preview-container {
          display: flex;
          flex-wrap: wrap;
      }

      .preview {
          margin: 1em 0.5em 3em 2em;
      }

      .preview:hover {
          cursor: pointer;
          box-shadow: 0px 2px 4px 0px rgb(187, 183, 183);
      }

      .preview img {
        height: auto;
      }

      .ulasan-pic img {
          width: 250px;
          height: auto;
      }

      .modal-body .col .ulasan-pic {
          width: 250px;
      }

      main h1 {
          font-weight: bold;
          text-align: center;
      }
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col breadcrumbs-ctr">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('client.homepage') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Ulasan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <h1>Ulasan</h1>
        </div>
        <div class="row">
          <div class="col preview-container">
            @foreach ($testimonies as $index => $testimoni)
              <div class="preview" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $index }}">
                <div class="ulasan-pic">
                  <img src="{{ $testimoni->imageUrl }}" alt="{{ $testimoni->name }}">
                </div>
              </div>
        
              {{-- Modal --}}
              <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $index }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel{{ $index }}">{{ $testimoni->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col">
                          <img src="{{ $testimoni->imageUrl }}" class="ulasan-pic">
                        </div>
                        <div class="col">
                          <p>{{ $testimoni->description }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>        
    </div>
@endsection