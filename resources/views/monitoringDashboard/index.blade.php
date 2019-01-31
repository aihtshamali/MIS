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
  padding: 50px;
}
</style>
@endsection
@section('content')
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div id="text-carousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="row">
            <div class="col-xs-12">
                <div class="carousel-inner">
                    <div class="item active">
                      <div class="col-md-12 row">
                        <div class="col-md-10 col-md-offset-1">
                          <h3 class="topheading border-bottom">First Project Name</h3>
                        </div>
                      </div>
                      <div class="col-md-10 col-md-offset-1 border-bottom">
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
                        <div class="col-md-12 carousel-content">
                            <div>
                              <img src="{{asset('monitoringDashboard/img/a (1).jpg')}}" alt="Chicago" style="width:100%;">
                              <div class="col-md-12 row">
                                <div class="col-md-8 col-md-offset-2 pd4p">
                                  <div class="col-md-4">
                                    <b class="hedingTxt" style="font-size:27px !important;">Status Alert</b>
                                  </div>
                                  <div class="col-md-8">
                                   <a href="{{ route('Summary') }}">
                                     <b class="statusTxt" id="status">30%</b>
                                   </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                      <div class="col-md-12 row">
                        <div class="col-md-10 col-md-offset-1">
                          <h3 class="topheading border-bottom">Second Project Name</h3>
                        </div>
                      </div>
                      <div class="col-md-10 col-md-offset-1 border-bottom">
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
                        <div class="col-md-12 carousel-content">
                            <div>
                              <img src="{{asset('monitoringDashboard/img/a (2).jpg')}}" alt="Chicago" style="width:100%;">
                              <div class="col-md-12 row">
                                <div class="col-md-8 col-md-offset-2 pd4p">
                                  <div class="col-md-4">
                                    <b class="hedingTxt">Status Alert</b>
                                  </div>
                                  <div class="col-md-8">
                                   <a href="{{ route('Summary') }}">
                                     <b class="statusTxt yel">50%</b>
                                   </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                      <div class="col-md-12 row">
                        <div class="col-md-10 col-md-offset-1">
                          <h3 class="topheading border-bottom">Third Project Name</h3>
                        </div>
                      </div>
                      <div class="col-md-10 col-md-offset-1 border-bottom">
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
                        <div class="col-md-12 carousel-content">
                            <div>
                              <img src="{{asset('monitoringDashboard/img/a (2).jpg')}}" alt="Chicago" style="width:100%;">
                              <div class="col-md-12 row">
                                <div class="col-md-8 col-md-offset-2 pd4p">
                                  <div class="col-md-4">
                                    <b class="hedingTxt">Status Alert</b>
                                  </div>
                                  <div class="col-md-8">
                                   <a href="{{ route('Summary') }}">
                                     <b class="statusTxt green">90%</b>
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
    <div class="arrowstiQ">
      <a class="left carousel-control" href="#text-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left fas fa-angle-left"></span>
      </a>
      <a class="right carousel-control" href="#text-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right fas fa-angle-right"></span>
      </a>
    </div>
  </div>

</div>
@endsection
@section('script')
@endsection
