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
                                <li class="active">
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
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                    <span class="pcoded-mtext" >New Project</span>
                                    {{-- <span class="pcoded-badge label label-danger"></span> --}}
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                    <a href="{{route('createMonitoringEntryForm')}}">
                                            <span class="pcoded-mtext" >Create</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="{{route('viewMonitoringForm')}}">
                                            <span class="pcoded-mtext" >View</span>
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

                        <div id="styleSelector">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
  