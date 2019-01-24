<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <nav class="pcoded-navbar">
                <div class="pcoded-inner-navbar main-menu">
                   
                 <div class="pcoded-navigatio-lavel">Site Visits</div>
                    <ul class="pcoded-item pcoded-left-item">
                        @role('manager')
                        <li class="pcoded">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="zmdi zmdi-local-library"></i></span>
                                <span class="pcoded-mtext" >Recommended Visits</span>
                            </a>
                        </li>
                        @endrole    
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
                                        <span class="pcoded-mtext" >View All Visits</span>
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
