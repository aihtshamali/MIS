<html>

<head>
    <meta charset="utf-8">

    <title>DGME</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">

    {{-- Css for this dashboard --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="icon" href="{{ asset('_monitoring/css/images/favicon.ico')}}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/feather/css/feather.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/style.css')}}" />
    {{--
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/jquery.mCustomScrollbar.css')}}" /> --}}
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap.min.css')}}" />

</head>
<style>
    a:hover{
        text-decoration: none;
    }
    .card {
        border-radius: 5px;
        margin-left: 10px;
        width: 280px;
        height: 150px;
        padding: 10px;
        text-align: center;
        
    }

    .card:hover {
        color:black; 
        /* margin: 20px; */
        border-radius: 5px;
        /* height: 120px; */
        text-decoration-line: none;
        text-decoration-style: none;
        -webkit-box-shadow: -1px 9px 25px 9px rgba(75, 79, 84, 0.79);
        box-shadow: -1px 9px 25px 9px rgba(75, 79, 84, 0.79);
        -moz-box-shadow: -1px 9px 25px 9px rgba(75, 79, 84, 0.79);

    }
</style>

<body style="background-color:white!important;">
    <div id="pcoded" class="pcoded">
        <div class="pcoded-main-container" style="background-color:white!important;">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row" style="margin-top:5%;">
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <a href="{{route('evaluation_dashboard')}}">
                                                    <div class="col-xl-3 col-md-6">
                                                        <div class="card bg-c-yellow update-card">
                                                            <div class="card-block">
                                                                <div class="row align-items-end">
                                                                    <div class="col-12">
                                                                        <h4 class="text-white">EVALUATION</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                    Here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="{{route('monitoring_dashboard')}}">
                                                    <div class="col-xl-3 col-md-6">
                                                        <div class="card bg-c-green update-card">
                                                            <div class="card-block">
                                                                <div class="row align-items-end">
                                                                    <div class="col-12">
                                                                        <h4 class="text-white">MONITORING</h4>
                                                                        {{-- <h6 class="text-white m-b-0">Page Views</h6>
                                                                        --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                    Here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="">
                                                    <div class="col-xl-3 col-md-6">
                                                        <div class="card bg-c-pink update-card">
                                                            <div class="card-block">
                                                                <div class="row align-items-end">
                                                                    <div class="col-12">
                                                                        <h4 class="text-white">TPV(s)</h4>
                                                                        {{-- <h6 class="text-white m-b-0">Task
                                                                            Completed</h6> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                    Here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="">
                                                    <div class="col-xl-3 col-md-6">
                                                        <div class="card bg-c-blue update-card">
                                                            <div class="card-block">
                                                                <div class="row align-items-end">
                                                                    <div class="col-12">
                                                                        <h4 class="text-white">INQUIRES</h4>
                                                                        {{-- <h6 class="text-white m-b-0">Task
                                                                            Completed</h6> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                    Here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:5%;">
                                        <!-- task, page, download counter  start -->
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <a href="">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card update-card" style="background-image: linear-gradient(to left, #3b3d35, #5c5f55, #808377, #a5a99b, #ccd1c1); ">
                                                        <div class="card-block">
                                                            <div class="row align-items-end">
                                                                <div class="col-12">
                                                                    <h4 class="text-white">Plan My Trip</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                here</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                                <a href="">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card update-card" style="background-image: linear-gradient(to left, #3b3d35, #5c5f55, #808377, #a5a99b, #ccd1c1);
">
                                                        <div class="card-block">
                                                            <div class="row align-items-end">
                                                                <div class="col-12">
                                                                    <h4 class="text-white">Check Accounts</h4>
                                                                    {{-- <h6 class="text-white m-b-0">Page Views</h6>
                                                                    --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                Here</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                                <a href="">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card  update-card" style="background-image: linear-gradient(to left, #3b3d35, #5c5f55, #808377, #a5a99b, #ccd1c1);
">
                                                        <div class="card-block">
                                                            <div class="row align-items-end">
                                                                <div class="col-12">
                                                                    <h4 class="text-white">My Profile</h4>
                                                                    {{-- <h6 class="text-white m-b-0">Task Completed</h6>
                                                                    --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                Here</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                                <a href="">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card update-card" style="background-image: linear-gradient(to left, #3b3d35, #5c5f55, #808377, #a5a99b, #ccd1c1);
">
                                                        <div class="card-block">
                                                            <div class="row align-items-end">
                                                                <div class="col-12">
                                                                    <h4 class="text-white">New Annoucments</h4>
                                                                    {{-- <h6 class="text-white m-b-0">Task Completed</h6>
                                                                    --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="text-white m-b-0"><i class="icon-action-redo text-white f-14 m-r-10"></i>Click
                                                                Here</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>