<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('logo.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          @role('admin')
            <p>Admin Dashboard</p>
          @endrole
          @role('user')
            <p>User Dashboard</p>
          @endrole
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
        {{-- <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          </ul>
        </li> --}}
        {{-- @permission('can.do.anything') --}}
        @role('admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Roles</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">new</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('roles.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i>View</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Permissions</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">new</span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('permissions.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
              <li><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i>View</a></li>
            </ul>
          </li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Roles Permissions Users</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">new</span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/rolespermissionsusers/create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                <li><a href="{{url('/rolespermissionsusers/view')}}"><i class="fa fa-circle-o"></i>View</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Sponsor Agencies</span>
                <span class="pull-right-container">
                  {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('SponsorAgency.create')}}"><i class="fa fa-circle-o"></i>Add New Sponsor Agency</a></li>
                <li><a href="{{route('SponsorAgency.index')}}"><i class="fa fa-circle-o"></i>View All Sponsor Agencies</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Executing Agencies</span>
                <span class="pull-right-container">
                  {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('ExecutingAgency.create')}}"><i class="fa fa-circle-o"></i>Add New Executing Agencies</a></li>
                <li><a href="{{route('ExecutingAgency.index')}}"><i class="fa fa-circle-o"></i>View Executing Agencies</a></li>
              </ul>
            </li>
            {{-- @permission('can.add.project') --}}
            {{-- @role('user') --}}
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Projects</span>
                <span class="pull-right-container">
                  {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('projects.create')}}"><i class="fa fa-circle-o"></i>Add New Project</a></li>
                {{-- @endpermission --}}
                <li><a href="{{url('/assignproject')}}"><i class="fa fa-circle-o"></i>Assign Projects</a></li>
                <li><a href="{{route('projects.index')}}"><i class="fa fa-circle-o"></i>View All Projects</a></li>
              </ul>
            </li>
            {{-- @endrole --}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
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
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="/profile"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        @endrole
        @role('user')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Projects</span>
            <span class="pull-right-container">
              {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('projects.create')}}"><i class="fa fa-circle-o"></i>Add New Project</a></li>
            {{-- @endpermission --}}
            {{-- <li><a href="{{url('/assignproject')}}"><i class="fa fa-circle-o"></i>Assign Projects</a></li>
            <li><a href="{{route('projects.index')}}"><i class="fa fa-circle-o"></i>View All Projects</a></li> --}}
          </ul>
        </li>
        @endrole
        {{-- @endpermission --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
