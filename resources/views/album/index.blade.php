@extends('layouts.master')

@push('css')
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
<div class="container mt-4">
    <div class="row">
        <!-- Post Feed -->
        <div class="card mb-4">
            <div id="postCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Post Image 1">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Post Image 2">
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Post Image 3">
                    </div>
                    <!-- Add more slides as needed -->
                </div>
                <a class="carousel-control-prev" href="#postCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#postCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Post Title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

</div>
@endsection