<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>
    <!-- Custom styles -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('public/assets/marketplace/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/marketplace/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    @yield('styles')
</head>

    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('search') }}"><img src="{{ asset('public/assets/img/ekyc-logo.png') }}" alt="Logo" class="the-logo"> EKYC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('search') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('documentation') }}">Documentation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

        <div class="mobile-menu d-block d-md-none">
            <div class="menubtn"><i class="fas fa-long-arrow-left"></i></div>
            <div class="menubtn"><i class="fas fa-redo"></i></div>
        </div>
        @include('partials.guest.footer')
        <script src="https://kit.fontawesome.com/2888840f77.js" crossorigin="anonymous"></script>

        <script src="{{ asset('public/assets/marketplace/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/assets/marketplace/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        @yield('scripts')
    </body>
</html>