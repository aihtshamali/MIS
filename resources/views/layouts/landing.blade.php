<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('dgme.png')}}" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('landingPage/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('landingPage/css/animate.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('landingPage/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/owl.theme.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('landingPage/css/magnific-popup.css')}}">
    <!-- Full Page Animation -->
    <link rel="stylesheet" href="{{ asset('landingPage/css/animsition.min.css')}}">
    <!-- Ionic Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('landingPage/css/ionicons.min.css')}}"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Main Style css -->
    <link href="{{ asset('landingPage/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/stylesheet.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/carouselTicker.css')}}" media="screen">
    @yield('styleTags')
</head>

<body>
  <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
      {{-- <div class="container"> --}}
           <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
                  <a class="navbar-brand page-scroll" href="#main"><img class="w_46p" id="logo" src="{{ asset('dgme.png')}}" alt="DGME Logo" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                      </ul>
                      <ul class="navbar-nav my-2 my-lg-0">
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#services">PEMS</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#features">PMMS</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#reviews">TPV's</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#pricing">SPECIAL ASSIGNMENT</a>
                          </li>
                          @auth
                          <li class="nav-item">
                            <a class="nav-link" style="" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                          </li>
                          @else
                            <li id="element" class="show-modal nav-item">
                              <a class="nav-link" style=" " data-toggle="modal" data-target="#myModal" href="#!" >Login</a>
                              {{-- <li><strong><a href="{{route('register')}}">Register</a></strong></li> --}}
                              {{-- {{route('login')}} --}}
                            </li>
                          @endauth
                      </ul>
                  </div>

              </div>
          </nav>
      {{-- </div> --}}
@yield('content')
    <!-- Wrapper-->
{{-- </div> --}}

    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="{{ asset('landingPage/js/jquery-2.1.1.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/menu.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/jquery.carouselTicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/start.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/Customvue.min.js')}}"></script>
    @yield('scripttags')
</body>

</html>
