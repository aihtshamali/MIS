<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DGME</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE/bootstrap.min.css')}}"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('ionicons/css/ionicons.min.css')}}"/>
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE/jquery-jvectormap.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/AdminLTE/daterangepicker.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css')}}"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE/_all-skins.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/AdminLTE/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE/all.css')}}">

@yield('styletag')


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('styletags')
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">

      <!-- Logo -->
      <a href="{{url('/predashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DG</b>ME</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DG M &amp E</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">


      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <button class="btn btn-warning " style="margin-top:10px;"> VERSION 1.0 </button>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('logo.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>

              <span class="label label-warning notificationCount">@{{tc}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span>@{{tc}}</span> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="notification_menu menu" >
                  <li v-for="notification in notifications">
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i>   @{{notification.text}}
                    </a>
                  </li>
                  {{-- <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                  --}}
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a  class="dropdown-toggle" data-toggle="dropdown">
            @auth
              @if(Auth::user()->UserDetail)
              @if(Auth::user()->UserDetail->profile_pic)
              <img src="{{asset('uploads/userprofile/'.Auth::user()->UserDetail->profile_pic)}}" class="user-image" alt="User Image">
              @else
              <i class="fa fa-user" style="font-size:20px"></i>
              {{-- <img src="{{asset('logo.jpg')}}" style="width:10%;" class="img-circle" alt="User Image"> --}}
              @endif
              @endif
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            @endauth
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('logo.jpg')}}" class="img-circle" alt="User Image">
                <p>
                {{Auth::user()->first_name}}
                  <small>Member since {{date('M Y',strtotime(Auth::user()->created_at))}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" style="background-color:#3c8dbc">
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                  <div class="pull-left" style="margin-left:1.5px">
                    <a href="/reset_password" class="btn btn-default btn-flat">Reset Password</a>
                  </div>
                <div class="pull-right">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" >Sign out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>


  @role('dataentry')
  @include('inc.sidenav')

  @endrole

  @role('adminhr')
  @include('inc.sidenav')

  @endrole

  @role('officer')
  @include('inc.officer_sidenav')
  @endrole


  @role('directormonitoring|directorevaluation')

  @include('inc.director_sidenav')
  @endrole

  @role('manager')
  @include('inc.executive_sidenav')
  @endrole

  @role('admin')
  @include('inc.sidenav')
  @endrole
  @include('inc.sidebar')

  {{-- {{dd(\App\AssignedProjectTeam::where('assigned_project_id','1')->where('user_id','2002')->first())}} --}}
  @yield('content')

</div>




</body>
<!-- jQuery 3 -->
<script src="{{asset('js/AdminLTE/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/AdminLTE/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/AdminLTE/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/AdminLTE/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('js/AdminLTE/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('js/AdminLTE/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/AdminLTE/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('js/AdminLTE/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('js/AdminLTE/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/AdminLTE/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/AdminLTE/demo.js')}}"></script>
<script src="{{asset('js/AdminLTE/select2.min.js')}}"></script>
<script src="{{asset('js/AdminLTE/select2.full.min.js')}}"></script>
{{-- !-- InputMask --> --}}
<script src="{{asset('js/AdminLTE/jquery.inputmask.js')}}"></script>
<script src="{{asset('js/AdminLTE/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('js/AdminLTE/jquery.inputmask.extensions.js')}}"></script>
<script src="{{asset('js/Customvue.min.js')}}"></script>

@yield('scripttags')
  <script>
  (function(){
    axios.post('{{route("unassignedCounter")}}',{
        user:"{{Auth::user()}}"
        })
        .then((response) => {
          // console.log(response.data);
          // console.log(response.data);
          $('.'+response.data.role+'_unassigned_counter').text(response.data.unassigned);
        })
        .catch(function (error) {
          console.log(error);
        });
      })();
      (function(){
        axios.post('{{route("inProgressCounter")}}',{
            user:"{{Auth::user()}}"
        })
        .then((response) => {
          // console.log('Fuck '+response.data.role);
          var role=response.data.role;
          $('.'+role+'_inprogress_counter').text(response.data.assigned);
          if(role=='executive')
          $('.'+role+'_Managerinprogress_counter').text(response.data.manager);
        })
        .catch(function (error) {
          console.log(error);
        });
      })();
      (function(){
        axios.post('{{route("assignedCounter")}}',{
            user:"{{Auth::user()}}"
            })
            .then((response) => {
              var role=response.data.role;
              $('.'+role+'_assigned_counter').text(response.data.assigned);
            })
            .catch(function (error) {
              console.log(error);
            });
          })();
          (function(){
            axios.post('{{route("completedCounter")}}',{
                user:"{{Auth::user()}}"
                })
                .then((response) => {
                  // console.log(response,'sad');
                  var role=response.data.role;
                  $('.'+role+'_completed_counter').text(response.data.assigned);
                })
                .catch(function (error) {
                  console.log(error);
                });
            })();
  </script>

  <script>
  const app = new Vue({
    el: '.notifications-menu',
    data: {
      notifications: {},
      tc: 0,
      NotificationsCount: 0,
      user: {!! Auth::user() !!},
      user_id: {!! Auth::check() ? Auth::id() : 'null' !!}
    },
    mounted() {
      this.getNotifications();
      this.listen();
    },
    methods: {
      getNotifications() {
        axios.get('/api/notifications/'+this.user_id)
              .then((response) => {
                    //TODO
                    if(response.data[1]=='officer'){
                      this.notifications = response.data[0];
                    }
                    else{
                      this.notifications = response.data[0];
                    }
                    if(this.notifications[0].text)
                        this.tc=response.data.length-1;
              })
              .catch(function (error) {
                console.log(error);
              });
      },
      listen() {
        Echo.private('projectAssigned.'+this.user_id)
            .listen('ProjectAssignedEvent', (notification) => {
              this.notifications.unshift(notification);
            });
            Echo.private('projectAssignedManager.'+this.user_id)
                .listen('ProjectAssignedManagerEvent', (notification) => {
                  this.notifications.unshift(notification);
                  // console.log(notification);
                });
            // Echo.private('chats.'+this.user_id)
            //     .listen('ChatEvent', (message) => {
            //       this.messages.unshift(message);
            //       console.log(message);
            //       console.log('message');
            //     })

      }
    }
  })

    </script>




<!-- Mirrored from adminlte.io/themes/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Jul 2018 04:56:24 GMT -->
</html>
