<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  {{-- <link rel="icon" type="image/png" style="width:50%" href=""/> --}}
  <title>DGME MIS</title>

  <!-- Favicon -->
  <link href="{{asset('landingAssets/favicon.ico')}}" rel="shortcut icon" />
  <link href="{{asset('landingAssets/apple-touch-icon.png')}}" rel="apple-touch-icon" />

  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic' rel='stylesheet' type='text/css' />
  <link href="{{asset('landingAssets/vendor/fontawesome-4.6.3/css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- CSS -->
  <link href="{{asset('landingAssets/vendor/bootstrap-3.3.6/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('landingAssets/vendor/animsition-4.0.2/css/animsition.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingAssets/vendor/flexisel-2.1.0/css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('landingAssets/vendor/vanillabox-0.1.7/theme/sweet/vanillabox.css')}}" rel="stylesheet" />

  <!-- Main CSS-->
  <link href="{{asset('landingAssets/css/style.css')}}" rel="stylesheet" />

  <link href="{{asset('landingAssets/css/style-white.css')}}" rel="stylesheet" />
  <style>
    li > a , li >strong >a {
      font-size: 17px !important;
    font-weight: unset !important;
    }
    .dropdown-item{
      color:#000000 !important;
      text-align: center;
    }
    .dropdown-menu{
      padding:10px;
    }
  </style>

</head>
<body>

<div class="animsition">
<main>

  <header id="ha-header" class="ha-header" style="top:unset">
    <div class="ha-header-perspective">

      <div class="ha-header-front" style="overflow:unset !important">
        <ul class="firstnav" style="margin:3px;padding:5px">
            <!-- <li><img class="logo-img" src="logo.png" style=" margin-top: -20px " width="80" height="61"  ALT="align box" Align=Left></li>  -->
        <button class="btn btn-warning ">VERSION 1.0</button>
          <li class="dropdown ">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Projects <span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{route('projects.create')}}">New Project</a>
              <a class="dropdown-item" href="#">Evaluation</a>
              <a class="dropdown-item" href="#">Monitoring</a>
              <a class="dropdown-item" href="#">Analytics</a>
              <div class="dropdown-divider"> </div>
               <a class="dropdown-item" href="#">Something </a>
            </div>
              {{-- <a class=" dropdown-toggle" data-toggle ="dropdown" role="button" data-toggle="dropdown"  href="#intro" aria-expanded="false">
               Projects <span class="caret"></span>
              </a>
              <div class="dropdown-menu" >
                 <a class="dropdown-item" href="{{route('projects.create')}}">New Project</a>
                 <a class="dropdown-item" href="#">Evaluation</a>
                 <a class="dropdown-item" href="#">Evaluation</a>
                 <a class="dropdown-item" href="#">Analytics</a>
                 <div class="dropdown-divider"> </div>
                 <a class="dropdown-item" href="#">Something </a>
               </div> --}}
           </li>

           <li><a href="#work">HRIS</a></li>
           <li><a href="#services">VMS</a></li>
           <li><a href="#about">FMIS</a></li>
           <li><a href="#contactForm">Contact Us</a></li>
           <div class="pull-right" style="margin-top:14px">
             @auth
               @role('admin')
               <a href="{{ url('/admin') }}">Home</a>
               @endrole
               @role('executive')
               <a href="{{ url('/executive') }}">Home</a>
               @endrole
               @role('manager')
               <a href="{{ url('/manager') }}">Home</a>
               @endrole
               @role('dataentry')
               <a href="{{ route('projects.index') }}">Home</a>
               @endrole
               @role('user')
               <a href="{{ route('projects.index') }}">Home</a>
               @endrole
               <li><strong><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Sign out
                    </a></strong>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form></li>
             @else
            <li><strong><a href="{{route('login')}}" >Login</a></strong></li>
            {{-- <li><strong><a href="{{route('register')}}">Register</a></strong></li> --}}
            @endauth

          </div>


        </ul>
      </div> <!-- end ha-header-front -->

      <div class="ha-header-bottom" style="overflow:unset;">
          <nav class="container">
          <ul class="" >
              <!-- <li><img class="logo-img" src="logo.png" style=" margin-top: -20px; " width="80" height="61" align="left"  ALT="align box" ></li>  -->
              <li class="dropdown">
                  <a class="btn btn-secondary dropdown-toggle" style="color:white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Projects <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('projects.create')}}">New Project</a>
                    <a class="dropdown-item" href="#">Evaluation</a>
                    <a class="dropdown-item" href="#">Monitoring</a>
                    <a class="dropdown-item" href="#">Analytics</a>
                    <div class="dropdown-divider"> </div>
                     <a class="dropdown-item" href="#">Something </a>
                  </div>
                </li>

               <li><a href="#work">HRIS</a></li>
               <li><a href="#services">VMS</a></li>
               <li><a href="#about">FMIS</a></li>
               <li><a href="#contactForm">Contact Us</a></li>
               <div class="pull-right">
                 @auth
                   @role('admin')
                   <a href="{{ route('projects.index') }}" style="font-size:17px">Home</a>
                   @endrole
                   @role('user')
                   <a href="{{ route('projects.create') }}" style="font-size:17px">Home</a>
                   @endrole
                   <li><strong><a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Sign out
                        </a></strong>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form></li>
                 @else
                <li><strong><a href="{{route('login')}}" >Login</a></strong></li>
                <li><strong><a href="{{route('register')}}">Register</a></strong></li>
                @endauth

                  {{-- <li><strong><a href="../../../../../../dgmeLOGIN/colorlib.com//index.html" >Login</a></strong></li>
                  <li><strong><a href="../../../../../../dgmeLOGIN/colorlib.com/register.html">Register</a></strong></li> --}}
              </div>

            <!-- <li><a href="index.html#intro">Top</a></li>
            <li><a href="index.html#work">Work</a></li>
            <li><a href="index.html#services">Services</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="index.html#contact">Contact</a></li> -->
          </ul>
        </nav>

      </div> <!-- end ha-header-bottom -->

    </div> <!-- end ha-header-perspective -->
  </header>
  @yield('content')

</main>
<footer id="contactForm">
  <div class="footer-content">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <h4>Email</h4>
          <p>mis.dgme.gov.pk:8080</p>
        </div> <!-- /.col-md-3 -->

        <div class="col-md-3">
          <h4>Telephone</h4>
          <p>+92-42-99233187-91</p>
        </div> <!-- /.col-md-3 -->

        <div class="col-md-3">
          <h4>Address</h4>
          <p>Directorate General Monitoring & Evaluation P&D Department, 65-Trade Centre Block<br />
             M.A Johar Town, Lahore (Punjab), Pakistan.</p>
        </div> <!-- /.col-md-3 -->

        <div class="col-md-3">
          <h4>Follow</h4>
          <ul class="social list-inline list-unstyled">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div> <!-- /.col-md-3 -->

      </div> <!-- /.row -->

      <form id="contactForm" data-toggle="validator" class="shake">

        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" id="name" placeholder="Your name" required data-error="Name missing">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="" placeholder="Your email" required>
              <div class="help-block with-errors"></div>
            </div>
          </div> <!-- /.col-md-6 -->

          <div class="col-md-6">
            <div class="form-group">
              <textarea id="message" class="form-control" rows="5" placeholder="Write your message here" required></textarea>
              <div class="help-block with-errors"></div>
            </div>

            <button type="submit" id="form-submit" class="btn btn-white">Submit</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>

          </div> <!-- /.col-md-6 -->

        </div> <!-- /.row -->
      </form>

      <p class="copyright">Copyright &copy; 2018 IT Team All Rights Reserved.</p>

    </div> <!-- /.container -->
  </div> <!-- /.footer-content -->
</footer>

</div> <!-- /.animsition -->

<script src="{{asset('landingAssets/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('landingAssets/vendor/bootstrap-3.3.6/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landingAssets/vendor/jquery-smooth-scrolling-1.5.2/jquery.smoothscroll.min.js')}}"></script>
<script src="{{asset('landingAssets/vendor/animsition-4.0.2/js/animsition.min.js')}}"></script>
<script src="{{asset('landingAssets/js/waypoints.min.js')}}"></script>
<script src="{{asset('landingAssets/vendor/vanillabox-0.1.7/jquery.vanillabox.js')}}"></script>
<script src="{{asset('landingAssets/vendor/flexisel-2.1.0/js/jquery.flexisel.js')}}"></script>
<script src="{{asset('landingAssets/contact-form/js/validator.min.js')}}"></script>
<script src="{{asset('landingAssets/contact-form/js/form-scripts.js')}}"></script>
<script src="{{asset('landingAssets/js/scripts.js')}}"></script>
@yield('script')
</body>

<!-- Mirrored from wearekllr.com/demos/float/template/index-white.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Jun 2018 04:49:37 GMT -->
</html>
