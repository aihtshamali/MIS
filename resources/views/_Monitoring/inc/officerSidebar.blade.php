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
                        {{-- <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                <span class="pcoded-mtext">Page layouts</span>
                                <span class="pcoded-badge label label-warning">NEW</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext">Vertical</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="menu-static.html">
                                                <span class="pcoded-mtext" >Static Layout</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-header-fixed.html">
                                                <span class="pcoded-mtext" >Header Fixed</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-compact.html">
                                                <span class="pcoded-mtext" >Compact</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-sidebar.html">
                                                <span class="pcoded-mtext">Sidebar Fixed</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class=" pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext" >Horizontal</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="menu-horizontal-static.html" target="_blank">
                                                <span class="pcoded-mtext" >Static Layout</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-horizontal-fixed.html" target="_blank">
                                                <span class="pcoded-mtext">Fixed layout</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-horizontal-icon.html" target="_blank">
                                                <span class="pcoded-mtext">Static With Icon</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-horizontal-icon-fixed.html" target="_blank">
                                                <span class="pcoded-mtext">Fixed With Icon</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="menu-bottom.html">
                                        <span class="pcoded-mtext" >Bottom Menu</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="box-layout.html" target="_blank">
                                        <span class="pcoded-mtext">Box Layout</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="menu-rtl.html" target="_blank">
                                        <span class="pcoded-mtext">RTL</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="navbar-light.html">
                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                <span class="pcoded-mtext">Navigation</span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                <span class="pcoded-mtext" >Widget</span>
                                <span class="pcoded-badge label label-danger">100+</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="widget-statistic.html">
                                        <span class="pcoded-mtext" >Statistic</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="widget-data.html">
                                        <span class="pcoded-mtext" >Data</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="widget-chart.html">
                                        <span class="pcoded-mtext" >Chart Widget</span>
                                    </a>
                                </li>

                            </ul>
                        </li> --}}
                    </ul>
                    <div class="pcoded-navigatio-lavel">Projects</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                                    <span class="pcoded-mtext" >Monitoring Projects</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
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
                                    <a href="form-elements-component.html">
                                        <span class="pcoded-mtext" >Schedule New Visit</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="form-elements-add-on.html">
                                        <span class="pcoded-mtext" >View Previous Visits</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    {{-- <div class="pcoded-navigatio-lavel">Tables</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                                <span class="pcoded-mtext" >Bootstrap Table</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="bs-basic-table.html">
                                        <span class="pcoded-mtext" >Basic Table</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="bs-table-sizing.html">
                                        <span class="pcoded-mtext" >Sizing Table</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="bs-table-border.html">
                                        <span class="pcoded-mtext" >Border Table</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="bs-table-styling.html">
                                        <span class="pcoded-mtext" >Styling Table</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-inbox"></i></span>
                                <span class="pcoded-mtext" >Data Table</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="dt-basic.html">
                                        <span class="pcoded-mtext" >Basic Initialization</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-advance.html">
                                        <span class="pcoded-mtext" >Advance Initialization</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-styling.html">
                                        <span class="pcoded-mtext" >Styling</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-api.html">
                                        <span class="pcoded-mtext" >API</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ajax.html">
                                        <span class="pcoded-mtext" >Ajax</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-server-side.html">
                                        <span class="pcoded-mtext" >Server Side</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-plugin.html">
                                        <span class="pcoded-mtext" >Plug-In</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-data-sources.html">
                                        <span class="pcoded-mtext" >Data Sources</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-server"></i></span>
                                <span class="pcoded-mtext">Data Table Extensions</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="dt-ext-autofill.html">
                                        <span class="pcoded-mtext" >AutoFill</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext" >Button</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="dt-ext-basic-buttons.html">
                                                <span class="pcoded-mtext" >Basic Button</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="dt-ext-buttons-html-5-data-export.html">
                                                <span class="pcoded-mtext" >Html-5 Data Export</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-col-reorder.html">
                                        <span class="pcoded-mtext" >Col Reorder</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-fixed-columns.html">
                                        <span class="pcoded-mtext" >Fixed Columns</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-fixed-header.html">
                                        <span class="pcoded-mtext" >Fixed Header</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-key-table.html">
                                        <span class="pcoded-mtext" >Key Table</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-responsive.html">
                                        <span class="pcoded-mtext" >Responsive</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-row-reorder.html">
                                        <span class="pcoded-mtext" >Row Reorder</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-scroller.html">
                                        <span class="pcoded-mtext"  >Scroller</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="dt-ext-select.html">
                                        <span class="pcoded-mtext" >Select Table</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class=" ">
                            <a href="foo-table.html">
                                <span class="pcoded-micon"><i class="feather icon-hash"></i></span>
                                <span class="pcoded-mtext" >FooTable</span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                                <span class="pcoded-mtext" >Handson Table</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="handson-appearance.html">
                                        <span class="pcoded-mtext">Appearance</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-data-operation.html">
                                        <span class="pcoded-mtext">Data Operation</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-rows-cols.html">
                                        <span class="pcoded-mtext">Rows Columns</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-columns-only.html">
                                        <span class="pcoded-mtext">Columns Only</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-cell-features.html">
                                        <span class="pcoded-mtext">Cell Features</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-cell-types.html">
                                        <span class="pcoded-mtext">Cell Types</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-integrations.html">
                                        <span class="pcoded-mtext">Integrations</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-rows-only.html">
                                        <span class="pcoded-mtext">Rows Only</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="handson-utilities.html">
                                        <span class="pcoded-mtext">Utilities</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="editable-table.html">
                                <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                <span class="pcoded-mtext" >Editable Table</span>
                            </a>
                        </li>
                    </ul> --}}

                    {{-- <div class="pcoded-navigatio-lavel">Chart And Maps</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span>
                                <span class="pcoded-mtext" >Charts</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="chart-google.html">
                                        <span class="pcoded-mtext" >Google Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-echart.html">
                                        <span class="pcoded-mtext" >Echarts</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-chartjs.html">
                                        <span class="pcoded-mtext" >ChartJs</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-list.html">
                                        <span class="pcoded-mtext" >List Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-float.html">
                                        <span class="pcoded-mtext" >Float Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-knob.html">
                                        <span class="pcoded-mtext" >Knob chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-morris.html">
                                        <span class="pcoded-mtext" >Morris Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-nvd3.html">
                                        <span class="pcoded-mtext" >Nvd3 Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-peity.html">
                                        <span class="pcoded-mtext" >Peity Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-radial.html">
                                        <span class="pcoded-mtext" >Radial Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-rickshaw.html">
                                        <span class="pcoded-mtext" >Rickshaw Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-sparkline.html">
                                        <span class="pcoded-mtext" >Sparkline Chart</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="chart-c3.html">
                                        <span class="pcoded-mtext" >C3 Chart</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-map"></i></span>
                                <span class="pcoded-mtext">Maps</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="map-google.html">
                                        <span class="pcoded-mtext" >Google Maps</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="map-vector.html">
                                        <span class="pcoded-mtext" >Vector Maps</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="map-api.html">
                                        <span class="pcoded-mtext" >Google Map Search API</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="location.html">
                                        <span class="pcoded-mtext" >Location</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="https://colorlib.com//polygon/adminty/files/extra-pages/landingpage/index.html" target="_blank">
                                <span class="pcoded-micon"><i class="feather icon-navigation-2"></i></span>
                                <span class="pcoded-mtext" >Landing Page</span>
                            </a>
                        </li>
                    </ul> --}}

                    {{-- <div class="pcoded-navigatio-lavel">Pages</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-unlock"></i></span>
                                <span class="pcoded-mtext">Authentication</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="auth-normal-sign-in.html" target="_blank">
                                        <span class="pcoded-mtext" >Login With BG Image</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-sign-in-social.html" target="_blank">
                                        <span class="pcoded-mtext" >Login With Social Icon</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-sign-in-social-header-footer.html" target="_blank">
                                        <span class="pcoded-mtext" >Login Social With Header And Footer</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-normal-sign-in-header-footer.html" target="_blank">
                                        <span class="pcoded-mtext" >Login With Header And Footer</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-sign-up.html" target="_blank">
                                        <span class="pcoded-mtext" >Registration BG Image</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-sign-up-social.html" target="_blank">
                                        <span class="pcoded-mtext" >Registration Social Icon</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-sign-up-social-header-footer.html" target="_blank">
                                        <span class="pcoded-mtext" >Registration Social With Header And Footer</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-sign-up-header-footer.html" target="_blank">
                                        <span class="pcoded-mtext" >Registration With Header And Footer</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-multi-step-sign-up.html" target="_blank">
                                        <span class="pcoded-mtext" >Multi Step Registration</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-reset-password.html" target="_blank">
                                        <span class="pcoded-mtext" >Forgot Password</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-lock-screen.html" target="_blank">
                                        <span class="pcoded-mtext" >Lock Screen</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="auth-modal.html" target="_blank">
                                        <span class="pcoded-mtext" >Modal</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-sliders"></i></span>
                                <span class="pcoded-mtext" >Maintenance</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="error.html">
                                        <span class="pcoded-mtext" >Error</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="comming-soon.html">
                                        <span class="pcoded-mtext" >Comming Soon</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="offline-ui.html">
                                        <span class="pcoded-mtext" >Offline UI</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                <span class="pcoded-mtext" >User Profile</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="timeline.html">
                                        <span class="pcoded-mtext" >Timeline</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="timeline-social.html">
                                        <span class="pcoded-mtext" >Timeline Social</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="user-profile.html">
                                        <span class="pcoded-mtext" >User Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="user-card.html">
                                        <span class="pcoded-mtext" >User Card</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                                <span class="pcoded-mtext" >E-Commerce</span>
                                <span class="pcoded-badge label label-danger">NEW</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="product.html">
                                        <span class="pcoded-mtext" >Product</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="product-list.html">
                                        <span class="pcoded-mtext" >Product List</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="product-edit.html">
                                        <span class="pcoded-mtext" >Product Edit</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="product-detail.html">
                                        <span class="pcoded-mtext" >Product Detail</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="product-cart.html">
                                        <span class="pcoded-mtext" >Product Card</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="product-payment.html">
                                        <span class="pcoded-mtext" >Credit Card Form</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-mail"></i></span>
                                <span class="pcoded-mtext" >Email</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="email-compose.html">
                                        <span class="pcoded-mtext" >Compose Email</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="email-inbox.html">
                                        <span class="pcoded-mtext" >Inbox</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="email-read.html">
                                        <span class="pcoded-mtext" >Read Mail</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-mtext" >Email Template</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="https://colorlib.com//polygon/adminty/files/extra-pages/email-templates/email-welcome.html">
                                                <span class="pcoded-mtext" >Welcome Email</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="https://colorlib.com//polygon/adminty/files/extra-pages/email-templates/email-password.html">
                                                <span class="pcoded-mtext"  >Reset Password</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="https://colorlib.com//polygon/adminty/files/extra-pages/email-templates/email-newsletter.html">
                                                <span class="pcoded-mtext"  >Newsletter Email</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="https://colorlib.com//polygon/adminty/files/extra-pages/email-templates/email-launch.html">
                                                <span class="pcoded-mtext" >App Launch</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="https://colorlib.com//polygon/adminty/files/extra-pages/email-templates/email-activation.html">
                                                <span class="pcoded-mtext" >Activation Code</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul> --}}
{{-- 
                    <div class="pcoded-navigatio-lavel">App</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class=" ">
                            <a href="chat.html">
                                <span class="pcoded-micon"><i class="feather icon-message-square"></i></span>
                                <span class="pcoded-mtext" >Chat</span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-globe"></i></span>
                                <span class="pcoded-mtext" >Social</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="fb-wall.html">
                                        <span class="pcoded-mtext" >Wall</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="message.html">
                                        <span class="pcoded-mtext" >Messages</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-check-circle"></i></span>
                                <span class="pcoded-mtext" >Task</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="task-list.html">
                                        <span class="pcoded-mtext" >Task List</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="task-board.html">
                                        <span class="pcoded-mtext" >Task Board</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="task-detail.html">
                                        <span class="pcoded-mtext" >Task Detail</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="issue-list.html">
                                        <span class="pcoded-mtext" >Issue List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                                <span class="pcoded-mtext" >To-Do</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="todo.html">
                                        <span class="pcoded-mtext" >To-Do</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="notes.html">
                                        <span class="pcoded-mtext">Notes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-image"></i></span>
                                <span class="pcoded-mtext">Gallery</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="gallery-grid.html">
                                        <span class="pcoded-mtext" >Gallery-Grid</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="gallery-masonry.html">
                                        <span class="pcoded-mtext" >Masonry Gallery</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="gallery-advance.html">
                                        <span class="pcoded-mtext" >Advance Gallery</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-search"></i><b>S</b></span>
                                <span class="pcoded-mtext" >Search</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="search-result.html">
                                        <span class="pcoded-mtext" >Simple Search</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="search-result2.html">
                                        <span class="pcoded-mtext" >Grouping Search</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-award"></i></span>
                                <span class="pcoded-mtext" >Job Search</span>
                                <span class="pcoded-badge label label-danger">NEW</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="job-card-view.html">
                                        <span class="pcoded-mtext" >Card View</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="job-details.html">
                                        <span class="pcoded-mtext" >Job Detailed</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="job-find.html">
                                        <span class="pcoded-mtext" >Job Find</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="job-panel-view.html">
                                        <span class="pcoded-mtext" >Job Panel View</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul> --}}
                   
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

                        <div id="styleSelector">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
  