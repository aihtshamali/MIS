<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <nav class="pcoded-navbar">
                <div class="pcoded-inner-navbar main-menu">
                    <div class="pcoded-navigatio-lavel">Navigation</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu active pcoded-trigger">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="{{url('monitoring_dashboard')}}">
                                        <span class="pcoded-mtext">Home</span>
                                    </a>
                                </li>
                                {{-- <li class="#">
                                    <a href="dashboard-crm.html">
                                        <span class="pcoded-mtext">CRM</span>
                                    </a>
                                </li>
                                <li class="#">
                                    <a href="dashboard-analytics.html">
                                        <span class="pcoded-mtext">Analytics</span>
                                        <span class="pcoded-badge label label-info ">NEW</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                       
                    </ul>

                    <div class="pcoded-navigatio-lavel">Projects</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" class="Monitoring_Projects">
                                <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                                <span class="pcoded-mtext" >Monitoring Projects</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="New_Assignments" >
                                <a href="{{route('Monitoring_newAssignments')}}">
                                        <span class="pcoded-mtext">New Assignments</span>
                                        <span class="pcoded-badge label label-danger">0</span>

                                    </a>
                                </li>
                                <li class=" ">
                                <a href="{{route('Monitoring_inprogressAssignments')}}">
                                        <span class="pcoded-mtext" >In Progress</span>
                                        <span class="pcoded-badge label label-warning">0</span>

                                    </a>
                                </li>
                                <li class=" ">
                                <a href="{{route('Monitoring_completedAssignments')}}">
                                        <span class="pcoded-mtext" >Completed</span>
                                        <span class="pcoded-badge label label-success">0</span>
                                    </a>
                                </li>
                                {{-- <li class=" ">
                                    <a href="box-shadow.html">
                                        <span class="pcoded-mtext" >Box-Shadow</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="accordion.html">
                                        <span class="pcoded-mtext" >Accordion</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="generic-class.html">
                                        <span class="pcoded-mtext" >Generic Class</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="tabs.html">
                                        <span class="pcoded-mtext" >Tabs</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="color.html">
                                        <span class="pcoded-mtext" >Color</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="label-badge.html">
                                        <span class="pcoded-mtext">Label Badge</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="progress-bar.html">
                                        <span class="pcoded-mtext" >Progress Bar</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="preloader.html">
                                        <span class="pcoded-mtext" >Pre-Loader</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="list.html">
                                        <span class="pcoded-mtext" >List</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="tooltip.html">
                                        <span class="pcoded-mtext" >Tooltip And Popover</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="typography.html">
                                        <span class="pcoded-mtext" >Typography</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="other.html">
                                        <span class="pcoded-mtext" >Other</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        {{-- <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-gitlab"></i></span>
                                <span class="pcoded-mtext">Advance Components</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="draggable.html">
                                        <span class="pcoded-mtext" >Draggable</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="bs-grid.html">
                                        <span class="pcoded-mtext" >Grid Stack</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="light-box.html">
                                        <span class="pcoded-mtext" >Light Box</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="modal.html">
                                        <span class="pcoded-mtext" >Modal</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="notification.html">
                                        <span class="pcoded-mtext" >Notifications</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="notify.html">
                                        <span class="pcoded-mtext" >PNOTIFY</span>
                                        <span class="pcoded-badge label label-info">NEW</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="rating.html">
                                        <span class="pcoded-mtext" >Rating</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="range-slider.html">
                                        <span class="pcoded-mtext" >Range Slider</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="slider.html">
                                        <span class="pcoded-mtext" >Slider</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="syntax-highlighter.html">
                                        <span class="pcoded-mtext" >Syntax Highlighter</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="tour.html">
                                        <span class="pcoded-mtext" >Tour</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="treeview.html">
                                        <span class="pcoded-mtext" >Tree View</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="nestable.html">
                                        <span class="pcoded-mtext" >Nestable</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="toolbar.html">
                                        <span class="pcoded-mtext" >Toolbar</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="x-editable.html">
                                        <span class="pcoded-mtext" >X-Editable</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                                <span class="pcoded-mtext" >Extra Components</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="session-timeout.html">
                                        <span class="pcoded-mtext" >Session Timeout</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="session-idle-timeout.html">
                                        <span class="pcoded-mtext" >Session Idle Timeout</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="offline.html">
                                        <span class="pcoded-mtext" >Offline</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class=" ">
                            <a href="animation.html">
                                <span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i><b>A</b></span>
                                <span class="pcoded-mtext" >Animations</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="sticky.html">
                                <span class="pcoded-micon"><i class="feather icon-cpu"></i></span>
                                <span class="pcoded-mtext" >Sticky Notes</span>
                                <span class="pcoded-badge label label-danger">HOT</span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-command"></i></span>
                                <span class="pcoded-mtext" >Icons</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="icon-font-awesome.html">
                                        <span class="pcoded-mtext" >Font Awesome</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-themify.html">
                                        <span class="pcoded-mtext" >Themify</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-simple-line.html">
                                        <span class="pcoded-mtext" >Simple Line Icon</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-ion.html">
                                        <span class="pcoded-mtext" >Ion Icon</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-material-design.html">
                                        <span class="pcoded-mtext" >Material Design</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-icofonts.html">
                                        <span class="pcoded-mtext" >Ico Fonts</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-weather.html">
                                        <span class="pcoded-mtext" >Weather Icon</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-typicons.html">
                                        <span class="pcoded-mtext" >Typicons</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-flags.html">
                                        <span class="pcoded-mtext" >Flags</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                    <div class="pcoded-navigatio-lavel">Site Visits</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">

                                <span class="pcoded-micon"><i class="zmdi zmdi-car"></i></span>
                                <span class="pcoded-mtext" >Plan A Visit</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="{{route('trip.create')}}">
                                        <span class="pcoded-mtext" >Schedule New Visit</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="{{route('trip.index')}}">
                                        <span class="pcoded-mtext" >View Visits</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
               

                    <div class="pcoded-navigatio-lavel">Planner</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                                <span class="pcoded-mtext" >Event Calendar</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="event-full-calender.html">
                                        <span class="pcoded-mtext" >Scheduler</span>
                                    </a>
                                </li>
                                {{-- <li class="">
                                    <a href="event-clndr.html">
                                        <span class="pcoded-mtext" >CLNDER</span>
                                        <span class="pcoded-badge label label-info">NEW</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                    <div class="pcoded-navigatio-lavel">Upload Attachments</div>
                    <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                            <a href="#">
                                <span class="pcoded-micon"><i class="feather icon-upload-cloud"></i></span>
                                <span class="pcoded-mtext" >File Upload</span>
                            </a>
                        </li>
                    </ul>
{{--
                    <div class="pcoded-navigatio-lavel">Other</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                <span class="pcoded-mtext">Menu Levels</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext" >Menu Level 2.1</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext" >Menu Level 2.2</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-mtext" >Menu Level 3.1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext" >Menu Level 2.3</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="">
                            <a href="javascript:void(0)" class="disabled">
                                <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                                <span class="pcoded-mtext"  >Disabled Menu</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="sample-page.html">
                                <span class="pcoded-micon"><i class="feather icon-watch"></i></span>
                                <span class="pcoded-mtext" >Sample Page</span>
                            </a>
                        </li>
                    </ul>
                    <div class="pcoded-navigatio-lavel">Support</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="">
                            <a href="http://html.codedthemes.com/Adminty/doc" target="_blank">
                                <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                                <span class="pcoded-mtext" >Documentation</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#" target="_blank">
                                <span class="pcoded-micon"><i class="feather icon-help-circle"></i></span>
                                <span class="pcoded-mtext" >Submit Issue</span>
                            </a>
                        </li>
                    </ul> --}}
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
                        {{-- styleSelector --}}
                        {{-- <div id="styleSelector">

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
