<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <link rel="stylesheet" href="{{ asset('assets/dist') }}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <a class="navbar-brand" href="#">Gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          @if (!Auth::check())
       
            <a href="/login" class="btn btn-info my-2 my-sm-0" type="submit">Login</a>

          @endif
         
        </div>
      </nav>
      <div class="container">
        <div class="container-fluid">
          @yield('main')

          @foreach ( $data as $item )
  <style>
    .image-container {
    position: relative;
    display: inline-block;
    margin-right: 55px;
}

.image-buttons {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover .image-buttons {
    opacity: 1;
}
  </style>

<div class="image-container">
  <img src="{{ asset('storage/images/' . $item->lokasi_file) }}" data-toggle="modal" data-target="#instagramModal{{ $item->id }}" width="250px" height="200x">
  <div class="image-buttons">
      <form action="/like-foto" method="post">
          @csrf
          <input type="hidden" name="foto_id" value="{{ $item->id }}">
          <button class="btn btn-outline-secondary btn-sm" type="submit">
              <i class="fas fa-heart"></i> Like
          </button>
      </form>
      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#instagramModal{{ $item->id }}">
          <i class="fas fa-comment"></i> Comment
      </button>
  </div>
</div>

<div class="modal fade" id="instagramModal{{ $item->id }}" tabindex="-1" aria-labelledby="instagramModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-8">
                      <img src="{{ asset('storage/images/' . $item->lokasi_file) }}" class="img-fluid" alt="Instagram Image">
                  </div>
                  <div class="col-md-4">
                      <h2>Comments</h2>
                      <ul class="list-group">
                          @foreach ($item->komentar as $komentar )
                          <span>{{ $komentar->user->username }}</span><li class="list-group-item">{{ $komentar->isi_komentar }}</li>
                          @endforeach
                      </ul>
                      <form action="/komentar" method="post">
                          @csrf
                          <input type="hidden" name="foto_id" value="{{ $item->id }}">
                          <div class="input-group mt-3">
                              <input type="text" class="form-control" placeholder="Add a comment" name="isi_komentar">
                              <button class="btn btn-primary btn-sm ml-2" type="submit">
                                  <i class="fas fa-paper-plane"></i> Send
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
        </div>
      </div>
</body>
<!-- jQuery -->
<script src="{{ asset('assets/plugins') }}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins') }}/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist') }}/js/adminlte.min.js"></script>
</html>