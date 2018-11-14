
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page template for creative dashboard">
    <meta name="keywords" content="Landing page template">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('dgme.png')}}" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="{{ asset('landingPage/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,700,600" rel="stylesheet" type="text/css">
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
    <link rel="stylesheet" href="{{ asset('landingPage/css/ionicons.min.css')}}">
    <!-- Main Style css -->
    <link href="{{ asset('landingPage/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    @yield('styleTags')
</head>

<body>
  <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
      <div class="container">
           <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
                  <a class="navbar-brand page-scroll" href="#main"><img class="w_30p" src="{{ asset('dgme.png')}}" alt="DGME Logo" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                      </ul>
                      <ul class="navbar-nav my-2 my-lg-0">
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#main">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#services">Important</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#features">Benefits</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#reviews">Testimonials</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link page-scroll" href="#pricing">Pricing</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Contact</a>
                          </li>
                      </ul>
                  </div>
                  @auth
                    @role('admin')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ url('/admin') }}">Home</a>
                    @endrole
                    @role('directorevaluation')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ url('/director_evaluation') }}">Home</a>
                    @endrole
                    @role('directormonitoring')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ url('/director_Monitor') }}">Home</a>
                    @endrole
                    @role('manager')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ url('/manager') }}">Home</a>
                    @endrole
                    @role('adminhr')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="#">Home</a>
                    @endrole
                    @role('dataentry')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ route('projects.index') }}">Home</a>
                    @endrole
                    @role('officer')
                    <a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ url('/officer') }}">Home</a>
                    @endrole
                    <strong><a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7;" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Sign out
                         </a></strong>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                         </form>
                  @else
                 <strong><a class="btn btn-md btn-light" style="margin-right:10px;opacity: 0.7; " href="{{route('login')}}" >Login</a></strong>
                 {{-- <li><strong><a href="{{route('register')}}">Register</a></strong></li> --}}
                 @endauth
              </div>
          </nav>
      </div>
@yield('content')
    <!-- Wrapper-->

    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="{{ asset('landingPage/js/jquery-2.1.1.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/menu.js')}}"></script>
    <script type="text/javascript" src="{{ asset('landingPage/js/custom.js')}}"></script>
    @yield('scripttags')
</body>

</html>
