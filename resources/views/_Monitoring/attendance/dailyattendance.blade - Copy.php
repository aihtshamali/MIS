@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Attendance | DGME
@endsection
@section('styleTags')
  <style media="screen">
.navbar-logo,.pcoded-navbar{display:none !important;}
.pcoded[theme-layout="vertical"][vertical-placement="left"][vertical-nav-type="expanded"][vertical-effect="shrink"] .pcoded-content{margin-left:0px !important;}
    .pdlf6
      {
        padding-left: 6% !important;
      }
    p
      {
        margin-bottom: 0px !important;
      }
    .userDiv:hover
      {
        box-shadow: none;
        -webkit-transition: all 600ms ease;
        transition: all 600ms ease;
      }
    .userDiv:hover p b
      {
        text-decoration: underline;
        -webkit-transition: all 900ms ease;
        transition: all 900ms ease;
      }
    .userDiv:hover h5
      {
        text-decoration: underline;
        -webkit-transition: all 900ms ease;
        transition: all 900ms ease;
      }
    .bd-rad
      {
        border-radius: 7px !important;
      }
    .nopad
      {
        padding: 0px !important;
      }
    .greyShadow
      {
        box-shadow: 0px 2px 62px #777777;
      }
    .redShadow
      {
        box-shadow: 0px 2px 62px #e43030;
      }
    .greenShadow
      {
        box-shadow: 0px 2px 62px #19821c;
      }
    .usermain
      {
        cursor: pointer;margin-bottom: 3%;
      }
    .main-body .page-wrapper
      {
        padding: 0.5rem !important;
      }
    .userDiv img
      {
        width: 100px !important;
        margin:auto !important;
      }
  </style>
@endsection
@section('content')
  <div class="row col-md-12">
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">Aihtsham</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">It Consultant</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greenShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="redShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greenShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greenShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
    <div class="col-md-2 usermain">
      <div class="greyShadow userDiv border bd-rad">
      <center><img src="{{asset('male-user.png')}}" class="col-md-12" alt="Employee image"></center>
      <h5 class="col-md-12 pdlf6">name</h5>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Role</b>
        <b class="col-md-6">testing</b>
      </p>
      <p class="col-md-12 nopad">
        <b class="col-md-6">Time</b>
        <b class="col-md-6">51516</b>
      </p>
      </div>
    </div>
  </div>
@endsection
@section("js_scripts")
  <script type="text/javascript"></script>
@endsection
