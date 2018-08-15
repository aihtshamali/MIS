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
          @role('manager')
            <p>Manager Dashboard</p>
          @endrole
          @role('admin')
            <p>Admin Dashboard</p>
          @endrole
          @role('user')
            <p>User Dashboard</p>
          @endrole
          {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigations</li>

        @role('manager')
        {{--  /Home  --}}
        <li class="">
          <a href="{{route('Exec_home')}}">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        {{--  /evaluation  --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Evaluation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('assignproject.index')}}"><i class="fa fa-circle-o"></i> Un- Assigned <span class="pull-right-container">
              @if (isset($unassigned))
                <span class="label label-primary pull-right">{{$unassigned->count()}}</span>
              @endif
            </span></a></li>
            <li>
              <a href="{{route('Exec_evaluation_assigned')}}"><i class="fa fa-circle-o"></i> In Progress
                @if (isset($assigned))
                  <span class="label label-primary pull-right">{{$assigned->count()}}</span>
                @endif
                @if (isset($assignedtoManager))
                  <span class="label label-warning pull-right">{{$assignedtoManager->count()}}</span>
                @endif
              </a>
            </li>
            <li><a href="{{route('Exec_evaluation_completed')}}"><i class="fa fa-circle-o"></i> Completed</a></li>
          </ul>
        </li>
        {{--  monitoring  --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Monitoring</span>
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
        {{--  tpvs  --}}
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
         {{--  Inquiry  --}}
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
         {{--  Special Assign  --}}
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
        {{--  Other Assign  --}}
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

         {{--  HRMS  --}}
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book-o"></i>
              <span>H R M S</span>
          </a>
        </li>

        {{--  Calender  --}}
        <li>
          <a href="calender">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        {{--  VMS  --}}
        <li class="treeview">
            <a href="#">
              <i class="fa fa-car"></i>
              <span>V M S</span>
            </a>
          </li>
        {{--  FMS  --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>F M I S</span>
          </a>
         </li>
        @endrole

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
