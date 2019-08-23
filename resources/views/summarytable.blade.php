<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Summary Table For Chairman</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">

    {{-- Css for this dashboard --}}
    <link rel="icon" href="{{asset('dgme.png')}}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/feather/css/feather.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/jquery.mCustomScrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/material-design/css/material-design-iconic-font.min.css')}}" />
    <!-- {{-- <link rel="shortcut icon" href="{{ asset('dgme.png' type="image/x-icon" /> --}} -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">

    @yield('styleTags')
    <style media="screen">
        .backforbtn {
            width: 5% !important;
            padding-top: 0.3% !important;
            cursor: pointer;
            transition: all 600ms ease;
            -webkit-transition: all 600ms ease;
        }

        .backforbtn:hover {
            transition: all 600ms ease;
            -webkit-transition: all 600ms ease;
        }
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{route('predashboard')}}">
                            {{-- <img class="img-fluid" src={{asset('_monitoring/css/images/logo.png')}} alt="Theme-Logo" /> --}}
                            <span style="font-size:20px; text-align:center;">DG ( M & E)</span>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li onclick="goBack()" class="backforbtn" style=""><img src="{{asset('backbtn.png')}}" width="20px" title="back" alt=""></li>
                            <li onclick="goforward()" class="backforbtn" style="margin: 0% 4%;"><img src="{{asset('backbtn.png')}}" width="19.5px" style="transform: rotate(180deg);" title="forward" alt=""></li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control" id="myInputiQ" style="border:none !important;">
                                        <!-- <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span> -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification float-right">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src={{asset('userImage.jpg')}} width="20px" class="img-radius" alt="User-Profile-Image">
                                        <span>
                                            @auth
                                            {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                            @endauth
                                        </span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            {{-- <a href="auth-normal-sign-in.html"> --}}
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();"><i class="feather icon-log-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>

                                        </li>
                                    </ul>

                                </div>
                            </li>
                    </div>
                    </li>
                    </ul>
                </div>
        </div>
        </nav>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">Dashboards</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Chairman Tables</span>
                                </a>
                                <ul class="pcoded-submenu dashboard">
                                    <li class="">
                                        <a href="{{route('summarytableMonitoring')}}">
                                            <span class="pcoded-mtext">Monitoring Summary Table</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('summarytableEvaluation')}}">
                                            <span class="pcoded-mtext">Evaluation Summary Table</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    @yield('content')
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>



</body>
{{-- required --}}
<script data-cfasync="false" src="{{asset('_monitoring/js/email-decode.min.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('_monitoring/js/popper.js/js/popper.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/dashboard/custom-dashboard.js')}}"></script>

{{-- slim scroll --}}
<!-- <script src="{{asset('_monitoring/js/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script> -->
<script src="{{asset('_monitoring/js/modernizr/js/modernizr.js')}}"></script>
<script src="{{asset('_monitoring/js/modernizr/js/css-scrollbars.js')}}"></script>


{{-- charts --}}
<script src="{{asset('_monitoring/js/chart.js/js/Chart.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/widget/amchart/serial.js')}}"></script>
{{-- scrollbar --}}
<script src="{{asset('_monitoring/css/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- <script src="{{asset('_monitoring/css/js/SmoothScroll.js')}}"></script> -->
<script src="{{asset('_monitoring/css/js/pcoded.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/vartical-layout.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/script.min.js')}}"></script>

</html>