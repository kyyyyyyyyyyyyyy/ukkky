<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <title> APEL DKIS | @yield('title')</title>
	<link rel="icon" href="{{ url('assets/images/folder.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('')}}vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('')}}vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('')}}vendor/perfect-scrollbar/css/perfect-scrollbar.css">

    <!-- CSS for this page only -->
    @stack('css')
    <!-- End CSS  -->

    <link rel="stylesheet" href="{{ asset('')}}assets/css/style.min.css">
    <link rel="stylesheet" href="{{ asset('')}}assets/css/bootstrap-override.min.css">
    <link rel="stylesheet" id="theme-color" href="{{ asset('')}}assets/css/dark.min.css">
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        @include('layouts.header')
        @include('layouts.nav')
            
        @yield('content')
        @include('layouts.settings')
        

        <footer>
            Copyright © 2023 &nbsp <a href=""> DKIS PKL PERTIWI</a> <span> . All rights Reserved</span>
        </footer>
        {{-- <div class="overlay action-toggle">
        </div> --}}
    </div>
    {{-- upload album --}}
    <div class="modal fade" id="formAlbum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Membuat Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('albums.store') }}" method="post" id="albumForm">
                        @csrf
                        <div class="mb-3">
                            <label for="basicInput" class="form-label">Nama album</label>
                            <input type="text" placeholder="Masukkan Nama Album" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


{{-- upload foto --}}
<div class="modal fade" id="formFoto" data-backdrop="static"
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
</div>
    <script src="{{ asset('')}}vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('')}}vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- js for this page only -->
    @stack('js')
    <!-- ======= --> 
    <script src="{{ asset('')}}assets/js/main.min.js"></script>
    <script>
        Main.init()
    </script>

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
</body>

</html>





