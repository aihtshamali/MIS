<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title') Summary For Chairman</title>
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
    <link href="{{ asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" media="all" />


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
    <style>
        .themecolor {
            color: #687753;
        }

        .margin-top-3per {
            margin-top: 3%;
        }

        .margin-top-5per {
            margin-top: 5%;
        }

        .row {
            margin-right: 0px !improtant;
            margin-left: 0px !improtant;
        }

        .font-13 {
            font-size: 13px;
        }

        .font-14 {
            font-size: 14px;
        }

        .widthfull {
            width: 100%;
        }

        .toppaddinglogos {
            padding-top: 11px;
        }

        .red {
            background-color: #bf0000;
            color: #fde3e3;
            width: 150px !important;
        }

        .yellow {
            background-color: #e9e929;
            color: #801d1d;
            width: 150px !important;
        }

        .green {
            background-color: #0aa70a;
            color: #f7f7f7;
            width: 150px !important;
        }

        .container {
            margin-top: 2% !important;
        }

        .halfheight {
            height: 50%;
        }

        .fullheight {
            height: 100%;
        }

        body {
            overflow-x: hidden
        }

        .relativetable {
            width: 100%;
            overflow: auto;
        }

        .table thead th {
            vertical-align: -webkit-baseline-middle !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: transparent !important;
        }

        table.dataTable {
            border-left: 1px solid #777;
            border-right: 1px solid #777;
        }

        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding: 3px 0px !important;
            text-align: center !important;
        }

        table.table-bordered.dataTable th,
        table.table-bordered.dataTable td {
            vertical-align: -webkit-baseline-middle !important;
        }

        .bgsky {
            background: #87ceeb82;
            color: #000;
        }

        .bglightgreen {
            background: #c6f7caa3;
            color: #000;
        }

        .bggrey {
            background: #ededed;
            color: #000;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #959798;
        }

        small {
            font-size: 55% !important;
            font-weight: 600;
        }

        .margintopbottom {
            margin: 3% 0% !important;
        }

        .nobordertop {
            border-top: none !important;
        }

        .noborderbottom {
            border-bottom: none !important;
        }

        .lineheightzero {
            line-height: 0 !important;
        }

        .lineheightone {
            line-height: 1.2 !important;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 96% !important;
                margin: auto;
            }

            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before,
            table.dataTable thead .sorting_desc_disabled:after {
                bottom: 0 !important;
                right: 0 !important;
            }
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
                                    <span class="pcoded-mtext">Summary View</span>
                                </a>
                                <ul class="pcoded-submenu dashboard">
                                    <li class="">
                                        <a href="{{route('summarytableMonitoring')}}">
                                            <span class="pcoded-mtext">Monitoring Summary View</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('summarytableEvaluation')}}">
                                            <span class="pcoded-mtext">Evaluation Summary View</span>
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
<script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#example_1').DataTable();
    })
</script>

</html>