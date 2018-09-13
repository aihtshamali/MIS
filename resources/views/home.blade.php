@extends('layouts.landing')

@section('content')
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
                                    <em>Wenesday</em>
                                    <strong>September</strong>
                                    <div>12</div>
                                    </time>
                            <span class="in-red"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>Support Doc</h2>
                            <div>
                            <p>Kindly download the support guide by clicking <b style="color:green;"> <a href="www.google.com">here</a> </b></p>
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
                    {{-- <div class="in-viewer-header">
                        <img src="trash/img1.jpg">
                        <div>
                            <h2>no title...</h2>
                            <span>no date...</span>
                        </div>
                    </div> --}}
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

                    <li>
                        <div class="in-image">
                            <img src="trash/img10.jpg">
                            <span class="in-orange"><h6>Read more</h6></span>
                        </div>
                        <div class="in-content">
                            <h2>porttitor eu dui</h2>
                            <span>12 APRIL 2015, SUNDAY</span>
                            <div>
                            Sed dictum, nisl at condimentum mattis, lectus nisl rutrum dolor, vitae dictum erat nunc id ex. Ut ipsum lorem, auctor eu interdum vel, mollis eget felis. Aliquam faucibus ullamcorper nibh, a vestibulum tellus rhoncus a. Sed eros odio, porttitor eu dui tempor, tempus rhoncus elit.
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
@endsection
