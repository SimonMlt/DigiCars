<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>DigiCars</title>

    {{--    Table CSS--}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>
<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">Digi<em>Cars</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" class="active">Accueil</a></li>
                        <li><a href="{{ route('vehicules') }}">Nos voitures</a></li>
                        <li><a href="{{ route('reservationsdates') }}">Réservations</a></li>
{{--                        <li class="dropdown">--}}
{{--                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
{{--                               aria-haspopup="true" aria-expanded="false">About</a>--}}

{{--                            <div class="dropdown-menu">--}}
{{--                                <a class="dropdown-item" href="about.html">About Us</a>--}}
{{--                                <a class="dropdown-item" href="blog.html">Blog</a>--}}
{{--                                <a class="dropdown-item" href="team.html">Team</a>--}}
{{--                                <a class="dropdown-item" href="testimonials.html">Testimonials</a>--}}
{{--                                <a class="dropdown-item" href="faq.html">FAQ</a>--}}
{{--                                <a class="dropdown-item" href="terms.html">Terms</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('Connexion') }}</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('Inscription') }}</a></li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->is_admin)
                                        <a class="dropdown-item" href="{{ route('adminvehicules') }}">Nos voitures</a>
                                        <a class="dropdown-item" href="{{ route('admindevis') }}">Liste des devis</a>
                                        <a class="dropdown-item" href="{{ route('backreservationsdates') }}">Gestion des réservations</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
{{--@if (Route::is('home') or Route::is('index'))--}}
{{--    <!-- ***** Main Banner Area Start ***** -->--}}
{{--    <div class="main-banner" id="top">--}}
{{--        <video autoplay muted loop id="bg-video">--}}
{{--            <source src="assets/images/video.mp4" type="video/mp4"/>--}}
{{--        </video>--}}

{{--        <div class="video-overlay header-text">--}}
{{--            <div class="caption">--}}
{{--                <h6>Lorem ipsum dolor sit amet</h6>--}}
{{--                <h2>Best <em>car dealer</em> in town!</h2>--}}
{{--                <div class="main-button">--}}
{{--                    <a href="contact.html">Contact Us</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- ***** Main Banner Area End ***** -->--}}
{{--@endif--}}

<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>

@yield('section')

<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    Copyright © 2021 DigiCars
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/js/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.js') }}"></script>
<script src="{{ asset('assets/js/accordions.js') }}"></script>

<!-- Global Init -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Table JS-->
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>


</body>
</html>
