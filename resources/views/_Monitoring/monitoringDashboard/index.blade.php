@extends('layouts.monitoringCM_Dashboard')
@section('title')
  DGME | Monitoring Dashboard
@endsection
@section('styleTags')
<style type="text/css">
.carousel-content {
    color:black;
    display:flex;
    align-items:center;
    /* max-height: 515px !important; */
}
.carousel-content img
{
object-fit: cover;
}

#text-carousel {
  width: 100%;
  height: auto;
  /* padding: 50px; */
}
</style>
@endsection
@section('content')
<div class="container">
  <div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel">
    <div id="text-carousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="row">
            <div class="col-xs-12">
                <div class="carousel-inner">
                    <div class="item active">
                      <div class="col-md-12 row">
                        <div class="col-md-12">
                          <h3 class="topheading">First Project Name</h3>
                        </div>
                      </div>
                      <div class="col-md-12 border-bottom border-top">
                        <div class="col-md-2">
                          <b class="hedingTxt">GS No<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingInt">123456789</b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingTxt">Project Cost<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingInt">400 million PKR</b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingTxt">Status Alert<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <a href="{{ route('Summary') }}">
                            <b class="statusTxt" id="status">30%</b>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-12 border-bottom border-top">
                        <div class="col-md-2">
                          <b class="hedingTxt">Financial Progress<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingInt">12%</b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingTxt">Physical Progress<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingInt">40%</b>
                        </div>
                        
                      </div>
                        <div class="col-md-8 col-md-offset-2 carousel-content pdt3p">
                            <div>
                              <img src="{{asset('monitoringDashboard/img/a (1).jpg')}}" alt="Chicago" style="width:100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="arrowstiQ">
      <a class="left carousel-control" href="#text-carousel" data-slide="prev" style="left: 14% !important;">
        <span class="glyphicon glyphicon-chevron-left fas fa-angle-left"></span>
      </a>
      <a class="right carousel-control" href="#text-carousel" data-slide="next" style="right: 14% !important;">
        <span class="glyphicon glyphicon-chevron-right fas fa-angle-right"></span>
      </a>
    </div>
  </div>

</div>
@endsection
@section('script')
@endsection
