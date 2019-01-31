@extends('layouts.monitoringCM_Dashboard')
@section('title')
  DGME | Monitoring Dashboard
@endsection
@section('styleTags')
@endsection
@section('content')
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="col-md-12 row">
      <h3 class="topheading">Project Name</h3>
      <div class="col-md-8 col-md-offset-2">

        <div class="col-md-2">
          <b class="hedingTxt">GS No:</b>
        </div>
        <div class="col-md-3">
          <b class="hedingInt">123456789</b>
        </div>
        <div class="col-md-3">
          <b class="hedingTxt">Project Cost:</b>
        </div>
        <div class="col-md-4">
          <b class="hedingInt">400 million PKR</b>
        </div>
      </div>
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="col-md-10 col-md-offset-1">
      <div class="carousel-inner">
        <div class="item active">
          <img src="{{asset('monitoringDashboard/img/a (1).jpg')}}" alt="Los Angeles" style="width:100%;">
        </div>

        <div class="item">
          <img src="{{asset('monitoringDashboard/img/a (2).jpg')}}" alt="Chicago" style="width:100%;">
        </div>

        <div class="item">
          <img src="{{asset('monitoringDashboard/img/a (3).jpg')}}" alt="New york" style="width:100%;">
        </div>
      </div>
    </div>
    <div class="arrowstiQ">
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <i class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <i class="fas fa-angle-right"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-md-12 row">
    <div class="col-md-8 col-md-offset-2 pd4p">
      <div class="col-md-4">
        <b class="hedingTxt">Status Alert</b>
      </div>
      <div class="col-md-8">
       <a href="{{ route('Summary') }}">
         <b class="statusTxt" id="status">50%</b>
       </a>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection
