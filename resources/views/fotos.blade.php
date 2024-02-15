@extends('layouts.master')

@push('styles')
    <link href="../vendor/select2/css/select2.min.css" rel="stylesheet" />
    <link href="../vendor/select2-bootstrap-4-theme/select2-bootstrap-4.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="{{ url('fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css')}}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ url('select2/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{ url('select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="{{ url('alert.js')}}"></script>
@endpush

@section('title', 'Dashboard')
@section('name', 'Super Admin')
@section('content')

<div class="main-content">

@foreach($fotos as $foto)

<div class="container mt-4">
    <div class="card">
        <img src="{{ asset('penyimpanan/' . $foto->image) }}" class="card-img-top" alt="Post Image">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div class="font-weight-bold">{{ $foto->title }}</div>
            </div>
            <div class="mb-2">
                <span class="font-weight-bold">{{ $foto->description }}</span>
            </div>
            <div class="row">
                <div class="col-4">
                    <form action="{{ url('liked') }}" method="post">
                        @csrf
                        <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                        <button class="btn btn-link">
                            @if(Auth::user()->hasLiked($foto))
                            <i class="bi bi-heart-fill"></i>
                            @else
                            <i class="bi bi-heart"></i>
                            @endif
                            {{ $likeCounts[$foto->id] ?? 0 }} 
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <a href="tweets/{{ $foto->id }}/edit"><i class="bi bi-chat"></i> {{ $commentCounts[$foto->id] ?? 0 }} </a>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div> 
@endforeach


{{-- upload album --}}
{{-- <div class="modal fade" id="formAlbum" data-backdrop="static"
     data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Membuat Album</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('albums.store') }}" method="post" id="albumForm">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="basicInput" class="form-label">Nama album</label>
                            <input type="text" placeholder="Masukan Nama Album" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


{{-- upload foto --}}
{{-- <div class="modal fade" id="formFoto" data-backdrop="static"
     data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mengupload Foto</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data" id="fotoForm">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="basicInput" class="form-label">Judul Foto</label>
                            <input type="text" placeholder="Masukan Judul Foto" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="educational_level_id" class="form-label">album</label>
                        <select class="js-exxxample-basic-single form-select" name="album_id">
                            @foreach($choses as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="mail_file" class="form-label">Pilih File</label>
                            <input type="file" placeholder="" value="" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


                            

 <!-- js for this page only -->
 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/select2/js/select2.min.js"></script>

<script>
    // Reset form when modal is hidden
    document.addEventListener('DOMContentLoaded', function () {
        var modals = document.querySelectorAll('#formAlbum, #formFoto');
        
        modals.forEach(function (modal) {
            modal.addEventListener('hidden.bs.modal', function (e) {
                var forms = modal.querySelectorAll('form');
                forms.forEach(function (form) {
                    form.reset();
                });
            });
        });
    });
</script>

</div>
@endsection
