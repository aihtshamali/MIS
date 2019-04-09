@extends('layouts.uppernav')
@section('styletag')
<style>
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="box-body">
        <h1>PDWP Meetings</h1>
        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box " style="background-color:rgb(153, 153, 153);">
                    <div class="inner">
                        <a href="{{route('Conduct_PDWP_Meeting')}}">
                            <div class="inner">
                                <b style="font-size:20px;">Financial Year</b>
                                <h3>10<sup style="font-size: 20px">%</sup></h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box " style="background-color:rgb(153, 153, 153);">
                    <div class="inner"><a href="#">
                            <b style="font-size:20px;">Foreign Funded</b>
                            <h3>10<sup style="font-size: 20px">%</sup></h3>
                        </a></div><a href="#">
                        <div class="icon">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>
                    </a><a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box " style="background-color:rgb(153, 153, 153);">
                    <div class="inner"><a href="#">
                            <b style="font-size:20px;">Similar Monitoring</b>
                            <h3>10<sup style="font-size: 20px">%</sup></h3>
                        </a></div><a href="#">
                        <div class="icon">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </div>
                    </a><a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box " style="background-color:rgb(153, 153, 153);">
                    <div class="inner"><a href="#">
                            <b style="font-size:20px;">Regular monitoring</b>
                            <h3>10<sup style="font-size: 20px">%</sup></h3>
                        </a></div><a href="#">
                        <div class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </div>
                    </a><a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>


        </div>
    </div>
</div>
@endsection
@section('scripttags')
@endsection 