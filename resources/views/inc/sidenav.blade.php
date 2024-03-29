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
          <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
          @endrole
          @role('adminhr')
          <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
          @endrole
          @role('dataentry')
          <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
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
        <li>
          <a href="{{url('/dashboard')}}">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        @role('admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Roles</span>

          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('roles.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i>View</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{route('register')}}">
            <i class="fa fa-files-o"></i>
            <span>User</span>

          </a>
          <ul class="treeview-menu">
            {{-- <li><a href="{{route('register')}}"><i class="fa fa-circle-o"></i>Create</a></li> --}}
            {{-- <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i>View</a></li> --}}
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Permissions</span>

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

              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/rolespermissionsusers/create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                <li><a href="{{url('/rolespermissionsusers/view')}}"><i class="fa fa-circle-o"></i>View</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Sectors</span>
                <span class="pull-right-container">
                  {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('sector.create')}}"><i class="fa fa-circle-o"></i>Add New Sector</a></li>
                <li><a href="{{route('sector.index')}}"><i class="fa fa-circle-o"></i>View Sectors</a></li>
              </ul>
            </li>
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Sub-Sectors</span>
                  <span class="pull-right-container">
                    {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('sub_sector.create')}}"><i class="fa fa-circle-o"></i>Add New Sub-Sector</a></li>
                  <li><a href="{{route('sub_sector.index')}}"><i class="fa fa-circle-o"></i>View Sub-Sectors</a></li>
                </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Assigning Forum</span>
                    <span class="pull-right-container">
                      {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('assigning_forum.create')}}"><i class="fa fa-circle-o"></i>Add</a></li>
                    <li><a href="{{route('assigning_forum.index')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-files-o"></i>
                      <span>Approving Forum</span>
                      <span class="pull-right-container">
                        {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{route('approving_forum.create')}}"><i class="fa fa-circle-o"></i>Add</a></li>
                      <li><a href="{{route('approving_forum.index')}}"><i class="fa fa-circle-o"></i>View</a></li>
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

            <li class="treeview">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Districts</span>
                  <span class="pull-right-container">
                    {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('district.create')}}"><i class="fa fa-circle-o"></i>Add New District</a></li>
                  <li><a href="{{route('district.index')}}"><i class="fa fa-circle-o"></i>View District</a></li>
                </ul>
              </li>
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Delete Projects</span>
                  <span class="pull-right-container">
                    {{-- <span class="label label-primary pull-right">Add new Project</span> --}}
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('admin_projects_remove')}}"><i class="fa fa-circle-o"></i>All Projects</a></li>
                </ul>
              </li>



        @endrole
        @role('dataentry')

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
            {{-- <li><a href="{{url('/assignproject')}}"><i class="fa fa-circle-o"></i>Assign Projects</a></li>--}}
            <li><a href="{{route('projects.index')}}"><i class="fa fa-circle-o"></i>View All Projects</a></li>
          </ul>
        </li>
        @endrole

        @role('adminhr')

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>PDWP Meeting</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.create')}}"><i class="fa fa-circle-o"></i>Add New Meeting</a></li>
            <li><a href="{{route('admin.index')}}"><i class="fa fa-circle-o"></i>View All </a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Miscellaneous PDWP Minutes</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('misc_minutes_create')}}"><i class="fa fa-circle-o"></i>Add New Minutes</a></li>
            <li><a href="{{route('view_misc_minutes')}}"><i class="fa fa-circle-o"></i>View All </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Dispatch Letter</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('dispatch_form')}}"><i class="fa fa-circle-o"></i>Add New Letter</a></li>
            <li><a href="{{route('dispatchLetterIndex')}}"><i class="fa fa-circle-o"></i>View All Letters</a></li>
          </ul>
        </li>
        @endrole
        {{-- @endpermission --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
