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
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/bootstrap.min.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('ionicons/css/ionicons.min.css')}}" />
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/jquery-jvectormap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE/daterangepicker.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css')}}" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/_all-skins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE/all.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('datatableevaluation/dataTables.bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href=" {{asset('datatableevaluation/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('datatableevaluation/buttons.dataTables.min.css')}}">



    @yield('styletag')


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('styletags')
    <style>
        .initial {
            background: #fff !important;
        }

        .inner a,
        .small-box a,
        .small-box-footer {
            color: #000 !important;
            transition: all 1s ease;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
        }

        .small-box:hover .inner a,
        .small-box:hover .small-box a,
        .small-box-footer:hover {
            color: #fff !important;
            transition: all 1s ease;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
        }

        table.dataTable td,
        table.dataTable th {
            text-align: center !important;
            font-size: 16px !important;
            padding-bottom: 1%;
            word-spacing: 50% !important;
        }

        .info h4 {
            color: #fff !important;
        }

        .nav-pills>li+li {
            margin-left: 3% !important;
        }

        .nav-pills>li {
            background: transparent !important;
            ;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="{{route('predashboard')}}" class="logo">
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

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle showBoxtiQ" data-toggle="dropdown">
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
                            <ul class="dropdown-menu BoxtiQ">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('logo.jpg')}}" class="img-circle" alt="User Image">
                                    <p>
                                        {{Auth::user()->first_name}}
                                        <small>Member since {{date('M Y',strtotime(Auth::user()->created_at))}}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer" style="background-color:#3c8dbc;padding:0% !important;">
                                    <div class="pull-left">
                                        <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-left" style="margin-left:3.85px">
                                        <a href="/reset_password" class="btn btn-default btn-flat">Reset Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
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

        @role('officer|transportofficer|evaluator|monitor')
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
<script src="{{asset('js/Customvue.min.js')}}"></script>
<!-- jQuery 3 -->
<script src="{{asset('js/app.js')}}"></script>
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
<script src="{{asset('datatableevaluation/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatableevaluation/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('datatableevaluation/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('datatableevaluation/buttons.flash.min.js')}}"></script>
<script src="{{asset('datatableevaluation/jszip.min.js')}}"></script>
<script src="{{asset('datatableevaluation/pdfmake.min.js')}}"></script>
<script src="{{asset('datatableevaluation/vfs_fonts.js')}}"></script>
<script src="{{asset('datatableevaluation/buttons.html5.min.js')}}"></script>
<script src="{{asset('datatableevaluation/buttons.print.min.js')}}"></script>






@yield('scripttags')
<script>
    // $('.dropdown-toggle .showBoxtiQ').dropdown();

    (function() {
        axios.post('{{route("unassignedCounter")}}', {
                user: " {{Auth::user()}}"
            }).then((response) => {
                $('.' + response.data.role + '_unassigned_counter').text(response.data.unassigned);
            })
            .catch(function(error) {
                console.log(error);
            });
    })();
    (function() {
        axios.post('{{route("inProgressCounter")}}', {
                user: "{{Auth::user()}}"
            })
            .then((response) => {
                // console.log('Fuck '+response.data.role);
                var role = response.data.role;
                $('.' + role + '_inprogress_counter').text(response.data.assigned);
                if (role == 'executive')
                    $('.' + role + '_Managerinprogress_counter').text(response.data.manager);
            })
            .catch(function(error) {
                console.log(error);
            });
    })();
    (function() {
        axios.post('{{route("assignedCounter")}}', {
                user: "{{Auth::user()}}"
            })
            .then((response) => {
                var role = response.data.role;
                $('.' + role + '_assigned_counter').text(response.data.assigned);
            })
            .catch(function(error) {
                console.log(error);
            });
    })();
    (function() {
        axios.post('{{route("completedCounter")}}', {
                user: "{{Auth::user()}}"
            })
            .then((response) => {
                // console.log(response,'sad');
                var role = response.data.role;
                $('.' + role + '_completed_counter').text(response.data.assigned);
            })
            .catch(function(error) {
                console.log(error);
            });
    })();
</script>

<script>
    // const app = new Vue({
    //     el: '.notifications-menu',
    //     data: {
    //         notifications: {},
    //         tc: 0,
    //         NotificationsCount: 0,
    //         user: {
    //             !!Auth::user() !!
    //         },
    //         user_id: {
    //             !!Auth::check() ? Auth::id() : 'null'!!
    //         }
    //     },
    //     mounted() {
    //         this.getNotifications();
    //         // this.listen();
    //     },
    //     methods: {
    //         getNotifications() {
    //             axios.get('/api/notifications/' + this.user_id)
    //                 .then((response) => {
    //                     //TODO
    //                     if (response.data[1] == 'officer') {
    //                         this.notifications = response.data[0];
    //                     } else {
    //                         this.notifications = response.data[0];
    //                     }
    //                     if (this.notifications[0].text)
    //                         this.tc = response.data.length - 1;
    //                 })
    //                 .catch(function(error) {
    //                     console.log(error);
    //                 });
    //         }
    // ,
    // listen() {
    //   Echo.private('projectAssigned.'+this.user_id)
    //       .listen('ProjectAssignedEvent', (notification) => {
    //         this.notifications.unshift(notification);
    //       });
    //       Echo.private('projectAssignedManager.'+this.user_id)
    //           .listen('ProjectAssignedManagerEvent', (notification) => {
    //             this.notifications.unshift(notification);
    //             // console.log(notification);
    //           });
    //       // Echo.private('chats.'+this.user_id)
    //     .listen('ChatEvent', (message) => {
    //       this.messages.unshift(message);
    //       console.log(message);
    //       console.log('message');
    //     })

    // }
    // }
    // })
</script>

<script> 
   $(document).ready(function() 
   {
    $('#example1').DataTable( {
       dom: 'Bfrtip',
        buttons: [
           'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    } );
     $('#example2').DataTable( {
       dom: 'Bfrtip',
        buttons: [
           'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    } );
} );
</script>

</html>