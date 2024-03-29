<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @if(Auth::user()->UserDetail->profile_pic)
        <img src="{{asset('logo.jpg')}}" class="img-circle" alt="User Image">
        @else
        <img src="{{asset('logo.jpg')}}" class="img-circle" alt="User Image">
        @endif
      </div>
      <div class="pull-left info">

        @role('directorevaluation')

        <p>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>

        @endrole
        @role('directormonitoring')

        <p>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
        @endrole


        {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigations</li>

      @role('directorevaluation')
      {{-- /Home  --}}
      <li class="">

        <a href="{{route('Evaluation_home')}}">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>

      </li>
      <li class="">

        <a href="{{route('adpProject_1819')}}">
          <i class="fa fa-file"></i>
          <span>2018-2019 ADP Projects</span>
        </a>

      </li>
      {{-- /evaluation  --}}

      <li class="treeview">
        <a href="#">
          <i class="fa fa-check-square-o"></i> <span>Evaluation</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{route('Evaluation_evaluation_assigned')}}"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
                <span class="label label-primary pull-right directorE_unassigned_counter"></span>
              </span></a></li>
          <li>
            <a href="{{route('Evaluation_evaluation_Inprogressprojects')}}"><i class="fa fa-circle-o"></i> In Progress
              <span class="label label-primary pull-right directorE_inprogress_counter"></span>
              </span>
            </a>
          </li>
          <li><a href="{!! route('Evaluation_evaluation_Completed') !!}"><i class="fa fa-circle-o"></i> Completed
              <span class="label label-primary pull-right directorE_completed_counter"></span>
              </span>
            </a></li>
          <li><a href="{!! route('Re_Assign') !!}"><i class="fa fa-circle-o"></i> Re Assign
              <span class="label label-primary pull-right directorE_ReAssign_counter"></span>
              </span>
            </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>Stopped Projects</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{route('stoppingProjects')}}"><i class="fa fa-circle-o"></i> All Assigned Projects
              <span class="label label-primary pull-right"></span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('stoppedProjects')}}"><i class="fa fa-circle-o"></i> Stopped Projects <span class="pull-right-container">
                <span class="label label-primary pull-right "></span>
              </span></a></li>
        </ul>
      </li>

      @endrole



      @role('directormonitoring')
      {{-- /Home  --}}
      <li class="">
        <a href="{{route('Monitoring_home')}}">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      {{-- monitoring  --}}

      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Monitoring</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('Monitoring_unassigned_projects')}}"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span></a></li>
          <li>
            <a href="{{route('Monitoring_inprogress_projects')}}"><i class="fa fa-circle-o"></i> In Progress
            </a>
          </li>
          <li><a href="{{route('Monitoring_complete_projects')}}"><i class="fa fa-circle-o"></i> Completed</a></li>
        </ul>
      </li>

      {{-- tpvs  --}}
      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Third Party Validations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> In Progress
            </a>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Completed</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Inquiry</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> In Progress
            </a>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Completed</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Special Assignment</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> In Progress
            </a>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Completed</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Third Party Validations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> In Progress
            </a>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Completed</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-address-book-o"></i>
          <span>H R M S</span>
        </a>
      </li>

      <li>
        <a href="calender">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-car"></i>
          <span>V M S</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>F M I S</span>
        </a>
      </li> --}}
      @endrole
      {{-- PDWP MEETING --}}
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>PDWP Meeting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('Conduct_PDWP_Meeting')}}"><i class="fa fa-circle-o"></i> Conduct Meeting <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span></a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
