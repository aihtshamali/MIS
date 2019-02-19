<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">

  {{-- Css for this dashboard --}}
    <link rel="icon" href="{{asset('dgme.png')}}" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/feather/css/feather.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/style.css')}}"/>
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/jquery.mCustomScrollbar.css')}}"/>
    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/material-design/css/material-design-iconic-font.min.css')}}"/>
    <!-- {{-- <link rel="shortcut icon" href="{{ asset('dgme.png' type="image/x-icon" /> --}} -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@yield('styleTags')
<style media="screen">
  .backforbtn{width:5% !important;padding-top:0.3% !important;cursor:pointer;transition:all 600ms ease;    -webkit-transition: all 600ms ease;}
  .backforbtn:hover{transition:all 600ms ease;    -webkit-transition: all 600ms ease;}
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
                              <li onclick="goBack()" class="backforbtn"><img src="{{asset('backbtn.png')}}" width="15px" title="back" alt=""></li>
                              <li onclick="goforward()" class="backforbtn"><img src="{{asset('backbtn.png')}}" width="14.5px" style="transform: rotate(180deg);" title="forward" alt=""></li>
                                <li class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                            <input type="text" class="form-control" id="myInputiQ" style="border:none !important;">
                                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
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
                                          <a href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();" ><i class="feather icon-log-out"></i> Logout
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>

                                      </li>
                                  </ul>

                                      </div>
                                  </li>
                          <li class="header-notification float-right">
                            <div class="dropdown-primary dropdown">
                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-message-square"></i>
                                    <span class="badge bg-c-green">0</span>
                                </div>
                            </div>
                        </li>
                        <li class="header-notification float-right">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <span class="badge bg-c-pink">0</span>
                                </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius" src={{asset('_monitoring/css/images/avatar-4.jpg')}} alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">Dummy</h5>
                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                            </div>
                        </li>
                        </ul>
                    </div></div>
                </nav>
                <!-- Sidebar chat start -->
                <div id="sidebar" class="users p-chat-user showChat">
                    <div class="had-container">
                        <div class="card card_main p-fixed users-main">
                            <div class="user-box">
                                <div class="chat-inner-header">
                                    <div class="back_chatBox">
                                        <div class="right-icon-control">
                                            <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                            <div class="form-icon">
                                                <i class="icofont icofont-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-friend-list">
                                    <div class="media userlist-box" data-id="1" data-status="online" data-username="Duumy Officer" data-toggle="tooltip" data-placement="left" title="Dummy Officer">
                                        <a class="media-left" href="#!">
                                            <img class="media-object img-radius img-radius" src={{asset('_monitoring/css/images/avatar-3.jpg')}} alt="Generic placeholder image ">
                                            <div class="live-status bg-success"></div>
                                        </a>
                                        <div class="media-body">
                                            <div class="f-13 chat-header">Dummy Officer</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Sidebar inner chat start-->
                <div class="showChat_inner">
                    <div class="media chat-inner-header">
                        <a class="back_chatBox">
                            <i class="feather icon-chevron-left"></i> Dummy Officer
                        </a>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src={{asset('_monitoring/css/images/avatar-3.jpg')}} alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda mollitia dolores, quas totam, odit tempore laudantium tenetur debitis nulla, commodi voluptatem distinctio laborum ipsa esse. Ex itaque aspernatur expedita quisquam.</p>
                                <p class="chat-time">8:20 a.m.</p>
                            </div>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                <p class="chat-time">8:20 a.m.</p>
                            </div>
                        </div>
                        <div class="media-right photo-table">
                            <a href="#!">
                                <img class="media-object img-radius img-radius m-t-5" src={{asset('_monitoring/css/images/avatar-4.jpg')}} alt="Generic placeholder image">
                            </a>
                        </div>
                    </div>
                    <div class="chat-reply-box p-b-20">
                        <div class="right-icon-control">
                            <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                            <div class="form-icon">
                                <i class="feather icon-navigation"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Data Entry --}}
                @role('dataentry')
                  @include('_Monitoring.inc.rightSidebar')
                @endrole

                {{-- Officers  --}}
                {{-- {{dd($check)}} --}}
                @role('officer|transportofficer|evaluator|monitor')
                @include('_Monitoring.inc.officerSidebar')
                @endrole



                {{-- DG OR DC --}}
                @role('manager')
                   @include('_Monitoring.inc.managerSidebar')
                @endrole

                {{-- Director Monitoring --}}
                @role('directormonitoring')
                   @include('_Monitoring.inc.directorMonitoring')
                @endrole

                {{-- Director Evaluation --}}
                @role('directorevaluation')
                @include('_Monitoring.inc.directorEvaluation')
                @endrole

                {{-- IT ADMIN --}}
                @role('admin')
                @include('_Monitoring.inc.itAdmin')
                @endrole
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
<script src="{{asset('_monitoring/js/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('_monitoring/js/modernizr/js/modernizr.js')}}"></script>
<script src="{{asset('_monitoring/js/modernizr/js/css-scrollbars.js')}}"></script>


{{-- charts --}}
<script src="{{asset('_monitoring/js/chart.js/js/Chart.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/widget/amchart/serial.js')}}"></script>
{{-- scrollbar --}}
<script src="{{asset('_monitoring/css/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/SmoothScroll.js')}}"></script>
<script src="{{asset('_monitoring/css/js/pcoded.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/vartical-layout.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/script.min.js')}}"></script>
@yield("js_scripts")
{{-- <script src="{{asset('_monitoring/css/js/SmoothScroll.js')}}"></script> --}}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
        function goBack() {
            window.history.back();
        }
        function goforward() {
            window.history.forward()
        }
</script>
<script>
        function Export2Doc(element, filename = ''){
            var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml+document.getElementById(element).innerHTML+postHtml;
        
            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });
            
            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
            
            // Specify file name
            filename = filename?filename+'.doc':'document.doc';
            
            // Create download link element
            var downloadLink = document.createElement("a");
        
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob ){
                navigator.msSaveOrOpenBlob(blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = url;
                
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
            
            document.body.removeChild(downloadLink);
        }
        </script>    
</html>
