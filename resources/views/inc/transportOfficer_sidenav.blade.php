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
    
              @role('transportofficer')
              <p>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
              @endrole
            </div>
          </div>
      
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navigations</li>
    
            @role('transportofficer')
            <li>
              <a href="{{url('/dashboard')}}">
              <i class="fa fa-home"></i><span>Home</span>
              </a>
            </li>
             {{-- Projects --}}
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Projects</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Evaluation Type
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
      
                  <ul class="treeview-menu">
                      <li>
                        <a href="{{route('new_evaluation')}}"><i class="fa fa-circle-o"></i> New Assignments
                      {{--  dd($officer);
                        @if($officer->count()>0)  --}}
                          <span class="pull-right-container">
                              <span class="label label-danger pull-right  officer_assigned_counter">0</span>
                          </span>
        
                      {{--  @endif  --}}
                    </a></li>
                      <li><a href="{{route('inprogress_evaluation')}}"><i class="fa fa-circle-o"></i> In-Progress
                        <span class="pull-right-container">
                            <span class="label label-danger pull-right  officer_inprogress_counter">0</span>
        
                        </span>
        
                      </a></li>
                      <li><a href="{{route('completed_evaluation')}} "><i class="fa fa-circle-o"></i> Completed
                        <span class="pull-right-container">
                          <span class="label label-danger pull-right  officer_completed_counter">0</span>
        
                        </span>
                      </a>
                    </li>
                  </ul>
                </li>
              
            </ul>
          </li>
    
          {{-- Plan A Visit --}}
          <li class="treeview">
              <a href="#">
                <i class="fa fa-car"></i>
                <span>Plan My Visit</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-rights"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('trip.create')}}"><i class="fa fa-circle-o"></i>
                   New Trip
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">new</span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="{{route('trip.index')}}"><i class="fa fa-bus"></i>
                     View All
                     <span class="pull-right-container">
                        <span class="label label-primary pull-right">new</span>
                      </span>
                  </a>
                </li>
              </ul>
          </li>
            @endrole
    
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    