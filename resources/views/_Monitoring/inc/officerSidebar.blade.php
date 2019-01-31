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
                            </ul>
                        </li>
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
                    <div class="pcoded-navigatio-lavel"></div>
                    <ul class="pcoded-item pcoded-left-item">
                      <li class="ms-hover">
                        <a href="{{route('minitoringDashboard')}}">
                          <span class="pcoded-micon"><i class="zmdi zmdi-assignment"></i></span>
                          <span class="pcoded-mtext" >Monitoring Dashboard</span>
                        </a>
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
