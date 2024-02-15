@extends('layouts.master')

@push('css')

<link href="../vendor/select2/css/select2.min.css" rel="stylesheet" />
<link href="../vendor/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ url('vendor/chart.js/Chart.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css')}}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="{{ url('plugins/alert.js')}}"></script>
@endpush

@section('title', 'Dashboard')
@section('name', 'Super Admin')
@section('content')

<div class="main-content">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Instagram Home</title>
</head>
<body>

<!-- Main Content -->
    <div class="title">
        Opsi Album
    </div>
    <div class="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Hapus Foto</h4>
                            <br>
                            <div id="carouselExample" class="carousel slide mt-5 mb-5" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($fotos as $index => $foto)
                                    @if($foto->album_id == $album->id)
                                    <li data-bs-target="#carouselExample" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                    @endif
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($fotos as $foto)
                                    @if($foto->album_id == $album->id)
                                    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                        <a href="dashoard.ph">
                                            <img class="d-block w-100" src="{{ asset('penyimpanan/' . $foto->image) }}" alt="Image {{ $loop->iteration }}" style="max-width: 100%; height: auto;">                                        
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                            
                            
                            {{-- <form id="deleteForm{{ $album->id }}" action="" method="POST">
                                @csrf
                                @method('DELETE')
                             
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $album->id }}')">
                                            <i class="ti-trash"></i> Hapus
                                        </button>
                                    </div>

                            </form> --}}
                        </div>
                        <div class="card-title">
                            <h4>Edit Album</h4>
                            <br>
                            <form action="{{ route('albums.update', $album->id) }}" method="post" id="albumForm">
                                @csrf
                                @method('put')
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicInput" class="form-label">Nama album</label>
                                        <input type="text" placeholder="Masukan Nama Album" value="{{ $album->name }}" class="form-control" name="name">
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $album->description }}</textarea>
                                    </div>
                                </div>
            
                                <a href="{{ url('albums') }}" class="btn btn-primary">
                                    <i class="ti-back-left"></i>  kembali
                                </a>
                                <button type="submit" class="btn btn-primary align-end ">
                                    <i class="ti-cloud-up"></i>
                                    ubah
                                </button>
                            </form>

                        </div>
                        <div class="card-title">
                            <br>
                            <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="col-md-6 mb-3">
                                    <button type="submit" class="btn btn-danger" onclick="confirmDelete('{{ $album->id }}')">
                                        <i class="ti-trash"></i> Hapus Album Ini
                                    </button>
                                </div>
                            </form>
                            

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS and jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/select2/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

</div>
@endsection