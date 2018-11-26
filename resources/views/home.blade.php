@extends('layouts.landing')
@section('title')
   Home Page | DGME MIS
@endsection
@section('styleTags')
   <style media="screen">
     .btn, .nav-item, .nav-link{background: transparent !important;font-size: .9rem !important;color: #666 !important;font-weight:700 !important;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
     .btn:hover, .nav-item:hover, .nav-link:hover{background: #687753 !important;color: #fff !important;border-radius: .25rem !important;font-size: .9rem !important;font-weight:700 !important;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
     a{text-decoration: none !important;}
     hr {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important;
            border: 0;
            border-top: 1px solid #ffffff47 !important;
        }
     .w_30p{width: 46% !important;margin-top: -11% !important;}
     .tile {
      width: 100%;
      display: inline-block;
      box-sizing: border-box;
      background: #687753 !important;
      padding: 20px;
      margin-bottom: 7%;
      border-radius: 10px;
      -webkit-transition: all 600ms ease;
      transition: all 600ms ease;
    }
     .tile:hover {
       background: #687753e6 !important;
      box-shadow: 0px 0px 37px #777;
      -webkit-transition: all 600ms ease;
      transition: all 600ms ease;
    }
    .tile .title {
      margin-top: 0px;
    }
    .tile.purple, .tile.blue, .tile.red, .tile.orange, .tile.green {
      color: #fff;
    }
    .navbar-default{background-color: #fff !important;}
    /* .navbar-default .navbar-nav > li > a{color: #666 !important;} */
    /* .tile.purple {
      background: #5133AB;
    } */
    /* .tile.purple:hover {
      background: #3e2784 !important;
    }
    .tile.red {
      background: #AC193D;
    }
    .tile.red:hover {
      background: #7f132d;
    }
    .tile.green {
      background: #00A600;
    }
    .tile.green:hover {
      background: #007300;
    }
    .tile.blue {
      background: #2672EC;
    }
    .tile.blue:hover {
      background: #125acd;
    }
    .tile.orange {
      background: #DC572E;
    }
    .tile.orange:hover {
      background: #b8431f;
    } */
    .pt_3p{padding-top: 3% !important;}
    .black{color: #777 !important;}
    .mr_3p{margin: 3%;}
    .nopad-nomar{padding: 0px !important;margin: 0px !important;}
    .bg_g{ background: #687753 !important}
    .clr_g{ color: #687753 !important}
    .white{color: #fff !important;}
   </style>
@endsection
@section('content')
<<<<<<< HEAD
    <div class="wrapper">
        <div style="position:fixed; width:100vw;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#043808!important">
                <div class="container-fluid">

                    <button style="margin-left:0px !important; " class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto" style="margin-left: 0 !important; align-items: center; width:100%;">
                            <li><img src="{!! asset('dgme.png') !!}" style="height:60px;"></li>
                            <li class="dropbtn nav-item active">
                                <a class="nav-link" href="#">HOME</a>
                            </li>
                            <div class="dropdown">
                                <li class="nav-item">
                                    <a id="PEMS" class="nav-link" href="#evaluation">PEMS</a>
                                </li>
                                <!-- <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div> -->
                            </div>
                            <div class="dropdown">
                                <li class="nav-item">
                                    <a id="PMMS" class="nav-link" href="#monitoring">PMMS</a>
                                </li>
                                <!-- <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div> -->
                            </div>
                            <div class="dropdown">
                                <li class="nav-item">
                                    <a id="TPV" class="nav-link" href="#validation">TPV's</a>
                                </li>
                                <!-- <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div> -->
                            </div>
                            <div class="dropdown">
                                <li class="nav-item">
                                    <a id="SPECIAL" class="nav-link" href="#specialAssignment">SPECIAL ASSIGNMENT</a>
                                </li>
                                <!-- <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div> -->
                            </div>

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

                    <!-- <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> -->
                </div>

            </nav>
        </div>
        <!-- Page Content Holder -->
        <div id="content" style="margin-top:100px;">



            <h2><b>DIRECTORATE GENERAL MONITORING AND EVALUATION</b></h2>
            <p>Welcome to the official INTRANET website of Directorate General Monitoring & Evaluation, Punjab. We invite you to get to know our organization by exploring this site on which you will learn about our mission,
             vision and objectives. The site also provides information about different projects and provides access to valuable statistics. We hope…</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2 id="evaluation"><b>EVALUATION</b></h2>
            <p>Examination, at specified points in time of projects performance, usually with emphasis on impact and also on relevance & efficiency.</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2 id="monitoring"><b>MONITORING</b></h2>
            <p>Assessing performance, analyzing organizational performance; and examining processes in the environment of an organization.</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2 id="validation"><b>VALDATION</b></h2>
            <p>Third Party Validation is to gauge the progress with regard to its objectives and intended impact from an independent perspective.</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2 id="specialAssignment"><b>SPECIAL ASSIGNMENT</b></h2>
            <p>Special Assignments on the direction of CM Punjab, Chief Secretary’s Punjab and Chairman PND Board, Govt. of the Punjab.</p>
            <div class="line"></div>
        </div>

        <!-- Sidebar Holder -->
        <nav id="sidebar" style="position:sticky;top:0;">
            <div class="ideaboxNews in-easing" id="idx1" style="color:black;">
                    <h3>UPCOMING EVENTS</h3>
                <ul>
                    <li>
                        <div class="in-image">
                            <!-- <img src="trash/img1.jpg"> -->
                            <time datetime="2018-08-30" class="icon">
                                    <em>Thursday</em>
                                    <strong>AUGUST</strong>
                                    <div>30</div>
                                  </time>
                            <span class="in-red"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Meeting</h2>
                            <span>30 AUGUST 2018, SATURDAY</span>
                            <div>
                            Meeting with officers
                            <p>Meeting is about DashBoard of Monitoring</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <!-- <img src="trash/img1.jpg"> -->
                            <time datetime="2018-09-01" class="icon">
                                    <em>Saturday</em>
                                    <strong>September</strong>
                                    <div>01</div>
                                  </time>
                            <span class="in-red"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>WORKFLOW</h2>
                            <span>01 SEPTEMBER 2018, SATURDAY</span>
                            <div>
                            WORKFLOW
                            <p>Welcome to the official INTRANET website of Directorate General Monitoring & Evaluation, Punjab. We invite you to get to know our organization by exploring this site on which you will learn about our mission,
             vision and objectives. The site also provides information about different projects and provides access to valuable statistics. We hope…</p>

                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img14.jpg">
                            <span class="in-darkblue"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>simply dummy text of the</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam augue nec neque dapibus, at condimentum tellus ultrices. Duis semper varius nulla, sit amet aliquet sapien efficitur eu. Mauris convallis, augue placerat lacinia rhoncus, eros est congue mi, in vestibulum orci arcu maximus nulla. Mauris in blandit lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="in-image">
                            <img src="trash/img16.jpg">
                            <span class="in-yellow"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>senectus et netus et malesuada</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi pulvinar, metus in interdum elementum, tellus augue tempus tellus, eu condimentum quam leo in arcu. Donec urna felis, fringilla eu enim nec, elementum fermentum ex.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img17.jpg">
                            <span class="in-green"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Fusce eu quam</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Nullam id varius nulla, a varius eros. Fusce eu quam ac velit venenatis molestie vel eu libero. In hac habitasse platea dictumst. Suspendisse sagittis eget leo non porta.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img18.jpg">
                            <span class="in-orange"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Etiam leo libero</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Vestibulum mollis metus nisi, sit amet varius metus dapibus gravida. Morbi sed est sapien. Phasellus porta mauris id ullamcorper faucibus. Etiam leo libero, fermentum non efficitur non, faucibus non neque. Nulla accumsan mauris nisl, id malesuada sem ultrices eget
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img19.jpg">
                            <span class="in-turquoise"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Mauris tristique</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Mauris tristique consectetur interdum. Suspendisse potenti. Donec eget elit vel quam sollicitudin vulputate. Nam pellentesque gravida ante a ultricies. Sed neque massa, pharetra sed turpis et, maximus luctus turpis. Nullam id varius nulla, a varius eros. Fusce eu quam ac velit venenatis molestie vel eu libero. In hac habitasse platea dictumst. Suspendisse sagittis eget leo non porta.
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="in-viewer test" style="overflow-y:scroll;">
                    <!-- <div class="in-viewer-header">
                        <img src="trash/img1.jpg">
                        <div>
                            <h2>no title...</h2>
                            <span>no date...</span>
                        </div>
                    </div> -->
                    <div class="in-viewer-content">
                        no content...
                    </div>
                    <span class="in-viewer-close"></span>
                </div>
            </div>

            <div class="ideaboxNews in-easing" id="idx2" style="color:black; position: none;">
                    <h3>LATEST NEWS</h3>
                <ul>
                    <li>
                        <div class="in-image">
                            <!-- <img src="trash/img1.jpg"> -->
                            <time datetime="2018-08-30" class="icon">
                                    <em>Wednesday</em>
                                    <strong>September</strong>
                                    <div>12</div>
                                  </time>
                            <span class="in-red"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Support Doc</h2>
                            <div>
                            <p style="color:black;">Kinldy download the support doc by clicking
                                <b style="color:green;">
                                    <a href="/DGME MIS GUIDELINES.docx")}}>here.</a>
                                </b>
                            </p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="in-image">
                            <img src="trash/img1.jpg">
                            <span class="in-red"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>LOREM IPSUM DOLAR</h2>
                            <span>10 APRIL 2015, SUNDAY</span>
                            <div>
                            111Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img3.jpg">
                            <span class="in-turquoise"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>SIT AMET</h2>
                            <span>11 APRIL 2015, SUNDAY</span>
                            <div>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </div>
                        </div>
                    </li>
                       <li>
                        <div class="in-image">
                            <img src="trash/img18.jpg">
                            <span class="in-orange"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Etiam leo libero</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Vestibulum mollis metus nisi, sit amet varius metus dapibus gravida. Morbi sed est sapien. Phasellus porta mauris id ullamcorper faucibus. Etiam leo libero, fermentum non efficitur non, faucibus non neque. Nulla accumsan mauris nisl, id malesuada sem ultrices eget
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img19.jpg">
                            <span class="in-turquoise"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Mauris tristique</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Mauris tristique consectetur interdum. Suspendisse potenti. Donec eget elit vel quam sollicitudin vulputate. Nam pellentesque gravida ante a ultricies. Sed neque massa, pharetra sed turpis et, maximus luctus turpis. Nullam id varius nulla, a varius eros. Fusce eu quam ac velit venenatis molestie vel eu libero. In hac habitasse platea dictumst. Suspendisse sagittis eget leo non porta.
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="in-viewer test2" style="overflow-y:scroll;">
                    <!-- <div class="in-viewer-header">
                        <img src="trash/img1.jpg">
                        <div>
                            <h2>no title...</h2>
                            <span>no date...</span>
                        </div>
                    </div> -->
                    <div class="in-viewer-content">
                        no content...
                    </div>
                    <span class="in-viewer-close"></span>
                </div>
            </div>


            <div class="ideaboxNews in-easing" id="idx1" style="color:black; position: none;">
                    <h3>ANNOUNCEMENTS</h3>
                <ul>
                    <li>
                        <div class="in-image">
                            <img src="trash/img1.jpg">
                            <span class="in-red"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>LOREM IPSUM DOLAR</h2>
                            <span>10 APRIL 2015, SUNDAY</span>
                            <div>
                            111Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img3.jpg">
                            <span class="in-turquoise"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>SIT AMET</h2>
                            <span>11 APRIL 2015, SUNDAY</span>
                            <div>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img7.jpg">
                            <span class="in-yellow"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>text of the printing</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                            Aenean id rutrum libero, eu elementum enim. Quisque cursus mattis velit. Donec ac ex luctus, blandit ante vel, feugiat magna. Maecenas vitae nisi nulla.<br><br> Sed nibh risus, maximus in imperdiet in, auctor eget nisl. Nullam venenatis ac nunc a feugiat. Pellentesque nulla est, scelerisque id ligula non, convallis euismod odio. Proin tortor est, tincidunt ac libero consequat, venenatis pulvinar purus. Maecenas a feugiat velit<
                            /div>
                        </div>
                    </li>
=======
      <div class="main" id="main">
        {{-- start vertical auto clider --}}
        {{-- end vertical auto clider --}}
          <!-- Main Section-->
          <div class="hero-section app-hero">
              <div class="container">
                  <div class="hero-content app-hero-content text-center">
                      <div class="row justify-content-md-center">
                          <div class="col-md-10">
                              <h1 class="wow fadeInUp" data-wow-delay="0s">DIRECTORATE GENERAL MONITORING & EVALUATION</h1>
                              <p class="wow fadeInUp" data-wow-delay="0.2s">
                                  Welcome to the official INTRANET website of Directorate General Monitoring & Evaluation, Punjab. We invite you to get to know our organization by exploring this site on which you will learn about our mission, vision and objectives. The site also provides information about different projects and provides access to valuable statistics. We hope…
                              </p>
                              {{-- <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="#">Live Preview</a> --}}
                              {{-- <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="#">Buy Now</a> --}}
                          </div>
                          <div class="col-md-12">
                              <div class="hero-image">
                                  {{-- <img class="img-fluid" src="assets/images/app_hero_1.png" alt="" /> --}}
                                  {{-- main --}}
                                  <div id="testmodal" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  {{-- <h1 class="col-md-10 black nopad-nomar">Login</h2> --}}
                                                  <button type="button" class="close col-md-2" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  {{-- <h4 class="modal-title">Confirmation</h4> --}}
                                              </div>
                                              <div class="modal-body">
                                                <div class="limiter">
                                              		<div class="container-login100">
                                              			<div class="wrap-login100 p-t-50 p-b-20">
                                                      <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                                                        {{ csrf_field() }}
                                              					<span style="text-align: center ; text-decoration-color: lightslategray" class="p-b-7">
                                              						<div style="text-align: center ">
                                              								<img src="logo.jpg"  alt="AVATAR">
                                              						</div>
                                              					</span>
                                              					<div class="wrap-input100 validate-input m-t-40 m-b-15" data-validate = "Enter username">
                                              						<input class="input100 col-md-8 offset-md-2 form-control" placeholder="Username" type="text" id="username" name="username" value="{{ old('username') }}">
                                                              <span class="focus-input100" data-placeholder="UserName"></span>
                                                              @if ($errors->has('username'))
                                                                   <div class="help-block">
                                                                      <strong>{{ $errors->first('username') }}</strong>
                                                                  </div>
                                                              @endif
                                              					</div>
                                              					<div class="wrap-input100 validate-input m-b-15" data-validate="Enter password">
                                              	  					<input class="input100 col-md-8 offset-md-2 form-control" placeholder="Password" id="password" type="password" name="password">
                                                            <span class="focus-input100" data-placeholder="Password"></span>
                                                            @if ($errors->has('password'))
                                                            <div class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="checkbox m-b-20 mr_3p">
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember  me
                                              				 </div>

                                              					<div class="container-login100-form-btn ">
                                              						<button class="login100-form-btn btn bg_g white"  >
                                              							Login
                                              						</button>
                                              					</div>

                                              					{{-- <ul class="login-more p-t-50 m-b-8 modal-footer">
                                              							<span class="txt1">
                                              								Forgot
                                              							</span>
                                              							<b>
                                              							<a href="#" class="txt2 clr_g">
                                              									Username  /  Password?
                                              							</a>
                                              							</b>
                                              							<b>
                                              								<a href="/register" class="txt2 btn bg_g" style=" float : right; margin-left: 20px;">
                                              									 Sign up
                                              								</a>
                                              							</b>

                                              					</ul> --}}
                                              				</form>
                                              			</div>
                                              		</div>
                                              	</div>
                                              </div>
                                              {{-- <div class="">
                                                  <button type="button" class="btn-default" data-dismiss="modal">Close</button>
                                              </div> --}}
                                          </div>
                                      </div>
                                  </div>
                                  {{-- <div id="testmodal-1" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">Confirmation</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>Do you want to save changes you made to document before closing?</p>
                                                  <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div> --}}
                                  {{-- end main --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @auth
          <div class="pt_3p text-center">
            <div class="container">
              <div class="row">
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="{{route('monitoring_dashboard')}}" class="tile purple">
                      <h3 class="title">Monitoring</h3>
                      <hr/>
                      <p>Visit Monitoring</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.6s">
                    <a href="{{route('evaluation_dashboard')}}" class="tile orange">
                      <h3 class="title">Evaluation</h3>
                      <hr/>
                      <p>Visit Evaluation</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.7s">
                    <a href="" class="tile green">
                      <h3 class="title">TPV(s)</h3>
                      <hr/>
                      <p>Visit TPV(s)</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.8s">
                  <a href="" class="tile green">
                    <h3 class="title">Inquires</h3>
                    <hr/>
                    <p>Visit Inquires</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="{{route('trip.create')}}" class="tile orange">
                      <h3 class="title">Plan My Trip</h3>
                      <hr/>
                      <p>Visit Plan My Trip</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="1.0s">
                  <a href="" class="tile green">
                    <h3 class="title">Accounts</h3>
                    <hr/>
                    <p>Click here to visit Accounts</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="1.2s">
                  <a href="" class="tile green">
                    <h3 class="title">My Profile</h3>
                    <hr/>
                    <p>Click here to visit My Profile</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="1.3s">
                  <a href="" class="tile purple">
                    <h3 class="title">New Announcement</h3>
                    <hr/>
                    <p>Check Announcements</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endauth
          <div class="services-section text-center" id="services">
              <!-- Services section (small) with icons -->
              <div class="container">
                  <div class="row  justify-content-md-center">
                      <div class="col-md-8">
                          <div class="services-content">
                              <h1 class="wow fadeInUp" data-wow-delay="0s">Vission & Mission</h1>
                              <p class="wow fadeInUp" data-wow-delay="0.2s">
                                  Our Vission Modern, progressive, efficient, and reliable organization & Our Mission is Planning, monitoring and evaluation of PSDP
                              </p>
                          </div>
                      </div>
                      <div class="col-md-12 text-center">
                          <div class="services">
                              <div class="row">
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.2s">
                                      <div class="services-icon">
                                          <img src="{{ asset('landingPage/img/monitoring.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Monitoring</h1>
                                          <p>
                                              Assessing performance, analyzing organizational performance; and examining processes in the environment of an organization.
                                          </p>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.3s">
                                      <div class="services-icon">
                                          <img class="icon-2" src="{{ asset('landingPage/img/evaluation.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Evaluation</h1>
                                          <p>
                                              Examination, at specified points in time of projects performance, usually with emphasis on impact and also on relevance & efficiency.
                                          </p>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.4s">
                                      <div class="services-icon">
                                          <img class="icon-3" src="{{ asset('landingPage/img/Validation.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Validation</h1>
                                          <p>
                                              Third Party Validation is to gauge the progress with regard to its objectives and intended impact from an independent perspective.
                                          </p>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.4s">
                                      <div class="services-icon">
                                          <img class="icon-3" src="{{ asset('landingPage/img/specialAss.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Special Assignments</h1>
                                          <p>
                                              Special Assignments on the direction of CM Punjab, Chief Secretary’s Punjab and Chairman PND Board, Govt. of the Punjab
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="counter-section">
              <div class="container">
                  <div class="row text-center">
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-ioxhost"></i>
                              </div>
                              <h3><span class="counter">250</span>+</h3>
                              <div class="counter-text">
                                  <h4>Monitoring projects</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-industry"></i>
                              </div>
                              <h3><span class="counter">1000</span>+</h3>
                              <div class="counter-text">
                                  <h4>Evaluation Projects</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-check-square-o"></i>
                              </div>
                              <h3><span class="counter">500</span>+</h3>
                              <div class="counter-text">
                                  <h4>Validation</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-bookmark"></i>
                              </div>
                              <h3><span class="counter">80</span>+</h3>
                              <div class="counter-text">
                                  <h4>Special Assignments</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer Section -->
          <div class="footer">
              <div class="container">
                  <div class="col-md-12 text-center">
                      {{-- <img src="assets/logos/logo.png" alt="Adminty Logo" /> --}}
                      {{-- <ul class="footer-menu">
                          <li><a href="http://demo.com">Site</a></li>
                          <li><a href="#">Support</a></li>
                          <li><a href="#">Terms</a></li>
                          <li><a href="#">Privacy</a></li>
                      </ul> --}}
                      <div class="footer-text">
                          <p>
                              Copyright © 2018 DGME. All Rights Reserved.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Scroll To Top -->
          <a id="back-top" class="back-to-top page-scroll" href="#main">
              <i class="fa fa-chevron-up"></i>
          </a>
          <!-- Scroll To Top Ends-->
      </div>
      <!-- Main Section -->
  </div>
@endsection
@section('scripttags')
  <script>
// $(document).ready(function(){
//   $('.nav-link').mouseenter(function(){
//     $(this).attr(`style`,`color:#fff !important;`);
//     });
//   $(window).scroll(function(){
//     var scroll = $(window).scrollTop();
//     if (scroll > 30)
//     {
//       $('.nav-link').attr(`style`,`color:#777777d9 !important;`);
//       $('.nav-link').mouseenter(function(){
//         $(this).attr(`style`,`color:#fff !important;`);
//         });
//       $('.nav-link').mouseleave(function(){
//         $(this).attr(`style`,`color:#777777d9 !important;`);
//         });
//     }
//     else
//      {
//        $('.nav-link').attr(`style`,`color:#fff !important;`);
//        $('.nav-link').mouseenter(function(){
//          $(this).attr(`style`,`color:#777777d9 !important;`);
//          });
//        $('.nav-link').mouseleave(function(){
//          $(this).attr(`style`,`color:#fff !important;`);
//          });
//      }
//   });
//   });
  $(document).ready(function(){
  var show_btn=$('.show-modal');
      var show_btn=$('.show-modal');
      //$("#testmodal").modal('show');
>>>>>>> c066efcd219f866a922a085b944b92e78bab36ed

        show_btn.click(function(){
          $("#testmodal").modal('show');
      })
    });

<<<<<<< HEAD
                    <li>
                        <div class="in-image">
                            <img src="trash/img16.jpg">
                            <span class="in-yellow"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>senectus et netus et malesuada</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi pulvinar, metus in interdum elementum, tellus augue tempus tellus, eu condimentum quam leo in arcu. Donec urna felis, fringilla eu enim nec, elementum fermentum ex.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img17.jpg">
                            <span class="in-green"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Fusce eu quam</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Nullam id varius nulla, a varius eros. Fusce eu quam ac velit venenatis molestie vel eu libero. In hac habitasse platea dictumst. Suspendisse sagittis eget leo non porta.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img18.jpg">
                            <span class="in-orange"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Etiam leo libero</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Vestibulum mollis metus nisi, sit amet varius metus dapibus gravida. Morbi sed est sapien. Phasellus porta mauris id ullamcorper faucibus. Etiam leo libero, fermentum non efficitur non, faucibus non neque. Nulla accumsan mauris nisl, id malesuada sem ultrices eget
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="in-image">
                            <img src="trash/img19.jpg">
                            <span class="in-turquoise"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Mauris tristique</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                                 Mauris tristique consectetur interdum. Suspendisse potenti. Donec eget elit vel quam sollicitudin vulputate. Nam pellentesque gravida ante a ultricies. Sed neque massa, pharetra sed turpis et, maximus luctus turpis. Nullam id varius nulla, a varius eros. Fusce eu quam ac velit venenatis molestie vel eu libero. In hac habitasse platea dictumst. Suspendisse sagittis eget leo non porta.
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="in-viewer test3">
                    <div class="in-viewer-header">
                        <img src="trash/img1.jpg">
                        <div>
                            <h2>no title...</h2>
                            <span>no date...</span>
                        </div>
                    </div>
                    <div class="in-viewer-content">
                        no content...
                    </div>
                    <span class="in-viewer-close"></span>
                </div>
            </div>
        </nav>
        </div>
=======
    $(function() {
            $('#element').on('click', function( e ) {
                Custombox.open({
                    target: '#testmodal-1',
                    effect: 'fadein'
                });
                e.preventDefault();
            });
        });
</script>
>>>>>>> c066efcd219f866a922a085b944b92e78bab36ed
@endsection
