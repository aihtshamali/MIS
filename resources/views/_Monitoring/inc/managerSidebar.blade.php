<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="dashboard">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="{{url('monitoring_dashboard')}}">
                                    <span class="pcoded-mtext">Home</span>
                                </a>
                            </li>
                            <!-- <li class="#">
                                    <a href="dashboard-crm.html">
                                        <span class="pcoded-mtext">CRM</span>
                                    </a>
                                </li> -->
                            <li class="analytics">
                                <a href="{{route('analytics')}}">
                                    <span class="pcoded-mtext">Analytics</span>
                                    <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Projects</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                            <span class="pcoded-mtext">Monitoring Projects</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="{{route('monitoring_unassigned')}}">
                                    <span class="pcoded-mtext">New Assignments</span>
                                    <!-- <span class="pcoded-badge label label-danger">0</span> -->

                                </a>
                            </li>
                            <li class=" ">
                                <a href="{{route('monitoring_inprogress')}}">
                                    <span class="pcoded-mtext">In Progress</span>
                                    <!-- <span class="pcoded-badge label label-warning">0</span> -->

                                </a>
                            </li>
                            <li class=" ">
                                <a href="{{route('monitoring_completed')}}">
                                    <span class="pcoded-mtext">Completed</span>
                                    <!-- <span class="pcoded-badge label label-success">0</span> -->
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Chairman Projects</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">

                            <span class="pcoded-micon"><i class="zmdi zmdi-car"></i></span>
                            <span class="pcoded-mtext">Send Projects</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="{{route('AssignedToExecutive')}}">
                                    <span class="pcoded-mtext">Push To Executive</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="{{route('AssignedToChairman')}}">
                                    <span class="pcoded-mtext">Pushed To Chairman</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Chairman Summary</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{route('summarytable')}}">

                            <span class="pcoded-micon"><i class="zmdi zmdi-car"></i></span>
                            <span class="pcoded-mtext">Chairman Summary</span>
                        </a>
                    </li>
                </ul>
                <!-- <div class="pcoded-navigatio-lavel">HR(Human Resource)</div>
                    <ul class="pcoded-item">
                        <li class="">
                            <a href="{{route('attendance')}}">

                                <span class="pcoded-micon"><i class="zmdi zmdi-collection-text"></i></span>
                                <span class="pcoded-mtext" >Attendance Sheet</span>
                            </a>
                        </li>
                    </ul> -->
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