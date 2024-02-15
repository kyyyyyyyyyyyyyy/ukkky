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

<div class="container mt-4">
    <div class="row">
        <!-- Post Feed -->
        <div class="container mt-4">
            <div class="row">
                <!-- Post Feed -->
                @foreach($albums as $album)
                <div class="card mb-4">
                    <div id="carouselExample{{ $loop->index }}" class="carousel slide mt-5 mb-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($album->fotos as $index => $foto)
                                <li data-bs-target="#carouselExample{{ $loop->parent->index }}" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($album->fotos as $foto)
                                <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                    <img class="d-block w-100" src="{{ asset('penyimpanan/' . $foto->image) }}" alt="Image {{ $loop->iteration }}"  style="max-width: 100%; height: 50%;">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample{{ $loop->index }}" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample{{ $loop->index }}" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text">{{ $album->description }}</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                        <a href="{{ route('albums.edit', $album->id) }}" class="position-absolute bottom-2 end-0"><i class="ti-more-alt"></i></a>                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>                           

 <!-- js for this page only -->
 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/select2/js/select2.min.js"></script>


</div>
@endsection
