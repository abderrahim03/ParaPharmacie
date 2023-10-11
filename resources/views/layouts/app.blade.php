<!doctype html>
<html lang="en">
  <head>
  	<title>Para pharmacie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	</head>
	<body>
        
        <header >
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{route('home')}}">Para</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        
                        {{-- <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="#" class="nav-link">Catalog</a>
                        </li>
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="#" class="nav-link">Work</a>
                        </li> --}}

                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a href="{{ route('about') }}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settinges</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">dashboard</a>
                                <a class="dropdown-item" href="#">Page 2</a>
                                <a class="dropdown-item" href="#">Page 3</a>
                                <a class="dropdown-item" href="#">Page 4</a>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            <!-- END nav -->
        </header>

        <div class="container">
            @include('flash-message')
            <!-- Content section -->
            @yield('content')
        </div>


        <footer>
            <!-- Footer content -->
        </footer>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>

	</body>
</html>


