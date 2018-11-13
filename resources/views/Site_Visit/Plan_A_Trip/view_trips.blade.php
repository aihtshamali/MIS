{{-- @extends('layouts.uppernav') --}}
@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  DGME | View Trip
@endsection
@section('styleTags')
  {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
<style>
  th{
      text-align:center;
  }
  td{
      text-align:center;
  }
/* {{--
  body {
  background: #191828;
  color: #efedef;
  font-family: "Roboto", Arial, Helvetica, sans-serif;
  font-size: 16px;
  font-weight: 300;
  letter-spacing: 0.01em;
  line-height: 1.6em;
  margin: 0;
  padding: 100px; } --}} */
h1 {
  font-size: 40px;
  line-height: 0.8em;
  color: rgba(255,255,255,0.2);}
/* a {
    background: #fd264f;
    color: #fff;
    display: block;
    font-size: 12px;
    line-height: 1em;
    margin: 0;
    padding: 5px 110px;
    position: fixed;
    top: 20px;
    right: -100px;
    text-align: center;
    text-decoration: none;
    transform: rotate(45deg);
} */
button:focus,
input:focus,
textarea:focus,
select:focus {
  outline: none; }

.tabss {
  display: block;
  display: -webkit-flex;
  display: -moz-flex;
  display: flex;
  -webkit-flex-wrap: wrap;
  -moz-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0;
  overflow: hidden; }
  .tabss [class^="tabs"] label,
  .tabss [class*=" tabs"] label {
    color: black;
    cursor: pointer;
    display: block;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1em;
    padding: 2rem 0;
    text-align: center; }
  .tabss [class^="tabs"] [type="radio"],
  .tabss [class*=" tabs"] [type="radio"] {
    border-bottom: 1px solid rgba(239, 237, 239, 0.5);
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: block;
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out; }
    .tabss [class^="tabs"] [type="radio"]:hover, .tabss [class^="tabs"] [type="radio"]:focus,
    .tabss [class*=" tabs"] [type="radio"]:hover,
    .tabss [class*=" tabs"] [type="radio"]:focus {
      border-bottom: 1px solid #fd264f; }
    .tabss [class^="tabs"] [type="radio"]:checked,
    .tabss [class*=" tabs"] [type="radio"]:checked {
      border-bottom: 2px solid #fd264f; }
    .tabss [class^="tabs"] [type="radio"]:checked + div,
    .tabss [class*=" tabs"] [type="radio"]:checked + div {
      opacity: 1; }
    .tabss [class^="tabs"] [type="radio"] + div,
    .tabss [class*=" tabs"] [type="radio"] + div {
      display: block;
      opacity: 0;
      padding: 2rem 0;
      width: 90%;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out; }
  .tabss .tabs-2 {
    width: 33%; }
    .tabss .tabs-2 [type="radio"] + div {
      width: 300%;
      margin-left: 200%; }
    .tabss .tabs-2 [type="radio"]:checked + div {
      margin-left: 0; }

    .tabss .tabs-2:nth-child(2) [type="radio"] + div {
      margin-left: 200%; }
    .tabss .tabs-2:nth-child(2) [type="radio"]:checked + div {
      margin-left: -100%; }

    .tabss .tabs-2:last-child [type="radio"] + div {
      margin-left: 100%; }
    .tabss .tabs-2:last-child [type="radio"]:checked + div {
      margin-left: -200%; }

  .container {
  margin-top:30px;
}

h1, h2, h3, h4, h5, h6 {
  /* font-family: 'Source Sans Pro'; */
  font-weight:700;
}

.fancyTab {
	text-align: center !important;
  padding:15px 0 !important;
  background-color: #eee !important;
	box-shadow: 0 0 0 1px #ddd !important;
	top:15px !important;
  transition: top .2s !important;
}


.whiteBlock {
  display:none;
}

.fancyTab.active .whiteBlock {
  display:block;
  height:2px;
  bottom:-2px;
  background-color:#fff;
  width:99%;
  position:absolute;
  z-index:1;
}

.fancyTab a {
	/* font-family: 'Source Sans Pro'; */
	font-size:1.65em;
	font-weight:300;
  transition:.2s;
  color:#333;
}

/*.fancyTab .hidden-xs {
  white-space:nowrap;
}*/

.fancyTabs {
	border-bottom:2px solid #ddd;
  margin: 15px 0 0;
}

li.fancyTab a {
  padding-top: 15px;
  top:-15px;
  padding-bottom:0;
}

li.fancyTab.active a {
  padding-top: inherit;
}

.fancyTab .fa {
  font-size: 40px;
	width:100%;
	padding: 15px 0 5px;
  color:#666;
}

.fancyTab.active .fa {
  color: #357ebd;
}

.fancyTab a:focus {
	outline:none;
}

.fancyTabContent {
  border-color: transparent;
  box-shadow: 0 -2px 0 -1px #fff, 0 0 0 1px #ddd;
  padding: 30px 15px 15px;
  position:relative;
  background-color:#fff;
}

.nav-tabs > li.fancyTab.active > a,
.nav-tabs > li.fancyTab.active > a:focus,
.nav-tabs > li.fancyTab.active > a:hover {
	border-width:0;
}

.nav-tabs > li.fancyTab:hover {
	background-color:#f9f9f9;
	box-shadow: 0 0 0 1px #ddd;
}

.nav-tabs > li.fancyTab.active:hover {
  background-color:#fff;
  box-shadow: 1px 1px 0 1px #fff, 0 0px 0 1px #ddd, -1px 1px 0 0px #ddd inset;
}

.nav-tabs > li.fancyTab:hover a {
	border-color:transparent;
}

.nav.nav-tabs .fancyTab a[data-toggle="tab"] {
  background-color:transparent;
  border-bottom:0;
}

.nav-tabs > li.fancyTab:hover a {
  border-right: 1px solid transparent;
}

.nav-tabs > li.fancyTab > a {
	margin-right:0;
	border-top:0;
  padding-bottom: 30px;
  margin-bottom: -30px;
}

.nav-tabs > li.fancyTab {
	margin-right:0;
	margin-bottom:0;
    width: 20%;
}

.nav-tabs > li.fancyTab:last-child a {
  border-right: 1px solid transparent;
}

.nav-tabs > li.fancyTab.active:last-child {
  border-right: 0px solid #ddd;
	box-shadow: 0px 2px 0 0px #fff, 0px 0px 0 1px #ddd;
}

.fancyTab:last-child {
  box-shadow: 0 0 0 1px #ddd;
}

.tabs .nav-tabs li.fancyTab.active a {
	box-shadow:none;
  top:0;
}

.nav-tabs > li.fancyTab {
    margin-right: 0;
    margin-bottom: 0;
    width: 20%;}
    .fancyTab.active {
    background: #fff;
    box-shadow: 1px 1px 0 1px #fff, 0 0px 0 1px #ddd, -1px 1px 0 0px #ddd inset;
    padding-bottom: 30px;
}
.fancyTab.active {
    top: 0;
    transition: top .2s;
}
.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}
.nav>li {
    position: relative;
    display: block;
}
.fancyTab.active {
  background: #fff;
	box-shadow: 1px 1px 0 1px #fff, 0 0px 0 1px #ddd, -1px 1px 0 0px #ddd inset;
  padding-bottom:30px;
}
/*
.arrow-down {
	display:none;
  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
  border-top: 22px solid #ddd;
  position: absolute;
  top: -1px;
  left: calc(50% - 20px);
}

.arrow-down-inner {
  width: 0;
  height: 0;
  border-left: 18px solid transparent;
  border-right: 18px solid transparent;
  border-top: 12px solid #fff;
  position: absolute;
  top: -22px;
  left: -18px;
}

.fancyTab.active .arrow-down {
  display: block;
} */

@media (max-width: 1200px) {

  .fancyTab .fa {
  	font-size: 36px;
  }

  .fancyTab .hidden-xs {
    font-size:22px;
	}

}


@media (max-width: 992px) {

  .fancyTab .fa {
  	font-size: 33px;
  }

  .fancyTab .hidden-xs {
  	font-size:18px;
    font-weight:normal;
  }

}


@media (max-width: 768px) {

  .fancyTab > a {
    font-size:18px;
  }

  .nav > li.fancyTab > a {
    padding:15px 0;
    margin-bottom:inherit;
  }

  .fancyTab .fa {
    font-size:30px;
  }

  .nav-tabs > li.fancyTab > a {
    border-right:1px solid transparent;
    padding-bottom:0;
  }

  .fancyTab.active .fa {
    color: #333;
	}

}

</style>
@endsection
@section('content')
<div class="content-wrapper" style="background-color:snow;">
    {{-- header --}}
    {{-- <section class="content-header">
        <h1>
         TO's Dashboard Table Designs
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
        <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

        </ol>
    </section> --}}

    {{-- TABS START --}}
    <div class="container">
            <section id="fancyTabWidget" class="tabs t-tabs">
                    <ul class="nav nav-tabs fancyTabs" role="tablist">

                                <li class="tab fancyTab active">
                                <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                    <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span class="hidden-xs">Home</span></a>
                                    <div class="whiteBlock"></div>
                                </li>

                                <li class="tab fancyTab">
                                <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                    <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-car"></span><span class="hidden-xs">Vehicles</span></a>
                                    <div class="whiteBlock"></div>
                                </li>

                                <li class="tab fancyTab">
                                <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                    <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-user"></span><span class="hidden-xs">Driver</span></a>
                                    <div class="whiteBlock"></div>
                                </li>

                                <li class="tab fancyTab">
                                <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                    <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-cogs"></span><span class="hidden-xs">R & M</span></a>
                                    <div class="whiteBlock"></div>
                                </li>

                                <li class="tab fancyTab">
                                <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                    <a id="tab4" href="#tabBody4" role="tab" aria-controls="tabBody4" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-stack-overflow"></span><span class="hidden-xs">Requests</span></a>
                                    <div class="whiteBlock"></div>
                                </li>

                                {{-- <li class="tab fancyTab">
                                <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                    <a id="tab5" href="#tabBody5" role="tab" aria-controls="tabBody5" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-question-circle"></span><span class="hidden-xs">Order</span></a>
                                    <div class="whiteBlock"></div>
                                </li> --}}
                    </ul>
                    <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                                <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                                    <div>
                                        <div class="row">

                                            <div class="col-md-12">
                                                    <section class="content col-md-12">

                                                            <div class="col-md-12">
                                                                <div class="box">

                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">Current Status of vehicles</h3>
                                                                        </div>
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Vehicle</th>
                                                                                <th style="width: 200px">Available</th>
                                                                                <th style="width: 200px">Days to go</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Vego 4000</td>
                                                                                <td><span class="badge bg-green" style="width: 100% !important" >Yes</span></td>
                                                                                <td style="text-align: center">-</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>Vego 2000</td>
                                                                                <td><span class="badge bg-red" style="width: 100% !important" >No</span></td>
                                                                                <td>3 days</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>Cultus 3000</td>
                                                                                <td><span class="badge bg-red" style="width: 100% !important" >No</span></td>
                                                                                <td>5 days</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>4.</td>
                                                                                <td>Cultus 1000</td>
                                                                                <td><span class="badge bg-green" style="width: 100% !important" >Yes</span></td>
                                                                                <td style="text-align: center">-</td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </section>
                                                        <section class="content col-md-12">

                                                            <div class="col-md-12">
                                                                <div class="box">

                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">Current Status of Drivers</h3>
                                                                        </div>
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Driver</th>
                                                                                <th style="width: 200px">Available</th>
                                                                                <th style="width: 200px">Days to go</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Waqar</td>
                                                                                <td><span class="badge bg-green" style="width: 100% !important" >Yes</span></td>
                                                                                <td style="text-align: center">-</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>Jahangir</td>
                                                                                <td><span class="badge bg-red" style="width: 100% !important" >No</span></td>
                                                                                <td>3 days</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>Ali</td>
                                                                                <td><span class="badge bg-red" style="width: 100% !important" >No</span></td>
                                                                                <td>5 days</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>4.</td>
                                                                                <td>Akbar</td>
                                                                                <td><span class="badge bg-green" style="width: 100% !important" >Yes</span></td>
                                                                                <td style="text-align: center">-</td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                        <div class="box box-primary">
                                                                            <div class="box-body no-padding">
                                                                            <!-- THE CALENDAR -->
                                                                            <div id="calendar"></div>
                                                                            </div>
                                                                            <!-- /.box-body -->
                                                                        </div>
                                                                        <!-- /. box -->
                                                                    </div>
                                                            </div>

                                                        </section>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                                    <div class="row">

                                            <div class="col-md-12">
                                                    <section class="content col-md-12">
                                                            <div class="col-md-12">
                                                                <div class="box">

                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">Vehicle Status</h3>
                                                                        </div>
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Vehicle</th>
                                                                                <th>Tours</th>
                                                                                <th>KiloMeters</th>
                                                                                <th>Litres</th>
                                                                                <th>Oil Change</th>
                                                                                <th>Tuning</th>
                                                                                <th>Tyres</th>
                                                                                <th>Brake Shoe</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Vego 4000</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>435 km</td>
                                                                                <td>34L</td>
                                                                                <td>15 days</td>
                                                                                <td>11 days</td>
                                                                                <td>5 days</td>
                                                                                <td>22 days</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>Vego 2000</td>
                                                                                <td>
                                                                                    1
                                                                                </td>
                                                                                <td>164 km</td>
                                                                                <td>19L</td>
                                                                                <td>16 days</td>
                                                                                <td>27 days</td>
                                                                                <td>2 days</td>
                                                                                <td>2 days</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>Cultus 3000</td>
                                                                                <td>
                                                                                    7
                                                                                </td>
                                                                                <td>502 km</td>
                                                                                <td>43L</td>
                                                                                <td>11 days</td>
                                                                                <td>9 days</td>
                                                                                <td>42 days</td>
                                                                                <td>23 days</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>4.</td>
                                                                                <td>Cultus 1000</td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>396 km</td>
                                                                                <td>29L</td>
                                                                                <td>22 days</td>
                                                                                <td>22 days</td>
                                                                                <td>63 days</td>
                                                                                <td>70 days</td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </section>
                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true" tabindex="0">
                                    <div class="row">
                                            <div class="col-md-12">
                                                    <section class="content col-md-12">

                                                            <div class="col-md-12">
                                                                <div class="box">

                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">Driver Info</h3>
                                                                        </div>
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Name</th>
                                                                                <th>Tours</th>
                                                                                <th>Last Tour</th>
                                                                                <th>Rating</th>
                                                                                <th>Leaves</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Waqar</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>10-9-18</td>
                                                                                <td>4.5</td>
                                                                                <td>0</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>Raza</td>
                                                                                <td>
                                                                                    2
                                                                                </td>
                                                                                <td>2-9-18</td>
                                                                                <td>4.2</td>
                                                                                <td>2</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>Ali</td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>7-9-18</td>
                                                                                <td>4.7</td>
                                                                                <td>1</td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </section>
                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-12">
                                                <section class="content col-md-12">

                                                        <div class="col-md-12">
                                                            <div class="box">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">Budget Available Rs. 1.2 million</h3>
                                                                </div>
                                                                <div class="box-body">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <th>Name</th>
                                                                        <th>Issue</th>
                                                                        <th>Last Repair Date</th>
                                                                        {{-- <th>Issue</th> --}}
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1.</td>
                                                                        <td>Vego</td>
                                                                        <td>
                                                                            Radiator Leak
                                                                        </td>
                                                                        <td>10-9-18</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2.</td>
                                                                        <td>Cultus</td>
                                                                        <td>
                                                                            Ac not working
                                                                        </td>
                                                                        <td>2-9-18</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3.</td>
                                                                        <td>Corrolla</td>
                                                                        <td>
                                                                            Left head light not working
                                                                        </td>
                                                                        <td>7-9-18</td>
                                                                    </tr>
                                                                </table>

                                                                </div>
                                                            </div>
                                                        </div>

                                                </section>

                                                <button type="button" class="btn btn-block btn-primary issuebtn">Generate an Issue</button>

                                                <section class="content col-md-12" id="createissue" style="display:none">

                                                        <div class="col-md-12">
                                                            <div class="box">

                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">Repairing Request Form</h3>
                                                                </div>
                                                                <div class="box-body">
                                                                    <div id="local">
                                                                        <div class="form-group" id='bd'>
                                                                            <label>Issue Type</label>
                                                                            <select id="pt" name="pt[]" class="form-control select2" data-placeholder="pt" style="width: 100%;">
                                                                                <option>Tuning</option>
                                                                                <option>Bumper</option>
                                                                                <option>Mirror</option>
                                                                                <option>Interior</option>
                                                                                <option>AC</option>
                                                                                <option>Engine</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group"  id='pr'>
                                                                            <label style="text-align:left">Vehicle</label>
                                                                            <select id="pt" name="pt[]" class="form-control select2" data-placeholder="pt" style="width: 100%;">
                                                                                <option disabled>Vego 2000</option>
                                                                                <option>Cultus 5555</option>
                                                                                <option>Corolla 4321</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Estimated Cost</label>
                                                                            <input type="text" class="form-control" id="purpose" placeholder="Enter cost for repairs">
                                                                        </div>

                                                                        <div class="form-group"  id='pr'>
                                                                            <label>Priority</label>
                                                                            <select id="pt" name="pt[]" class="form-control" data-placeholder="pt" style="width: 100%;">
                                                                                <option>Low</option>
                                                                                <option>Medium</option>
                                                                                <option>High</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Last Repair Details</label>
                                                                            <input type="text" class="form-control" id="purpose" placeholder="Enter previous detail for repairs">
                                                                            </div>
                                                                        <button type="button" class="btn btn-block btn-primary">Send Request</button>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                  </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true" tabindex="0">
                                <div class="row">
                                    <div class="col-md-12">

                                            <div class="tabss">
                                                <div class="tabs-2">
                                                    <label for="tabs2-1">Pending</label>
                                                    <input id="tabs2-1" name="tabss-two" type="radio" checked="checked">
                                                    <div>
                                                            <section class="content col-md-12">

                                                                    <div class="col-md-12">
                                                                        <div class="box">
                                                                            <div class="box-header with-border">
                                                                                <h3 class="box-title">Pending Requests</h3>
                                                                            </div>
                                                                            <div class="">
                                                                            <table class="table table-bordered">
                                                                                <thead>
                                                                                    <th style="width: 10px">#</th>
                                                                                    <th>Name</th>
                                                                                    <th>Location</th>
                                                                                    <th>Date</th>
                                                                                    <th>Days</th>
                                                                                    <th>Action</th>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>1.</td>
                                                                                    <td>Dr. Naveed</td>
                                                                                    <td>Multan</td>
                                                                                    <td>10-9-18</td>
                                                                                    <td>3 days</td>
                                                                                    <td>
                                                                                        <button class="btn btn-block btn-info assignbtn">Assign</button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2.</td>
                                                                                    <td>Yasir Shami</td>
                                                                                    <td>Okara</td>
                                                                                    <td>2-9-18</td>
                                                                                    <td>1 day</td>
                                                                                    <td>
                                                                                        <button class="btn btn-block btn-info assignbtn">Assign</button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3.</td>
                                                                                    <td>Ali Amjad</td>
                                                                                    <td>Rahim Yar Khan</td>
                                                                                    <td>7-9-18</td>
                                                                                    <td>5 days</td>
                                                                                    <td>
                                                                                        <button class="btn btn-block btn-info assignbtn">Assign</button>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12" id='assignform' style='display:none'>
                                                                            <div class="box">

                                                                                <div class="box-header with-border">
                                                                                    <h3 class="box-title">Assign</h3>
                                                                                </div>
                                                                                <div class="box-body">
                                                                                    <div id="local">
                                                                                        <div class="form-group"  id='pr'>
                                                                                            <label style="text-align:left">Driver</label>
                                                                                            <select id="pt" name="pt[]" class="form-control select2" data-placeholder="pt" style="width: 100%;">
                                                                                                <option>Waqar</option>
                                                                                                <option disabled>Ali</option>
                                                                                                <option>Baig</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="form-group"  id='pr'>
                                                                                            <label style="text-align:left">Vehicle</label>
                                                                                            <select id="pt" name="pt[]" class="form-control select2" data-placeholder="pt" style="width: 100%;">
                                                                                                <option disabled>Vego 2000</option>
                                                                                                <option>Cultus 5555</option>
                                                                                                <option>Corolla 4321</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <button type="button" class="btn btn-block btn-primary">Send Request</button>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                            </section>
                                                    </div>
                                                </div>

                                                <div class="tabs-2">
                                                    <label for="tabs2-2">Forwarded</label>
                                                    <input id="tabs2-2" name="tabss-two" type="radio">
                                                    <div>
                                                            <div class="col-md-12">
                                                                    <div class="box">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">Forwarded</h3>
                                                                        </div>
                                                                        <div class="box-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Name</th>
                                                                                <th>Location</th>
                                                                                <th>Date</th>
                                                                                <th>Days</th>
                                                                                {{-- <th></th> --}}
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Dr. Naveed</td>
                                                                                <td>Multan</td>
                                                                                <td>10-9-18</td>
                                                                                <td>3 days</td>
                                                                                {{-- <td>
                                                                                    <button type="button" class="btn btn-block btn-info">Assign</button>
                                                                                </td> --}}
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>Yasir Shami</td>
                                                                                <td>Okara</td>
                                                                                <td>2-9-18</td>
                                                                                <td>1 day</td>
                                                                                {{-- <td>
                                                                                    <button type="button" class="btn btn-block btn-info">Assign</button>
                                                                                </td> --}}
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>Ali Amjad</td>
                                                                                <td>Rahim Yar Khan</td>
                                                                                <td>7-9-18</td>
                                                                                <td>5 days</td>
                                                                                {{-- <td>
                                                                                    <button type="button" class="btn btn-block btn-info">Assign</button>
                                                                                </td> --}}
                                                                            </tr>
                                                                        </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="tabs-2">
                                                    <label for="tabs2-3">Approved/Rejected</label>
                                                    <input id="tabs2-3" name="tabss-two" type="radio">
                                                    <div>
                                                            <div class="col-md-12">
                                                                    <div class="box">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">Approved/Rejected Requests</h3>
                                                                        </div>
                                                                        <div class="box-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Name</th>
                                                                                <th>Location</th>
                                                                                <th>Date</th>
                                                                                <th>Days</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Dr. Naveed</td>
                                                                                <td>Multan</td>
                                                                                <td>10-9-18</td>
                                                                                <td>3 days</td>
                                                                                <td><span class="badge bg-green" style="width: 100% !important" >Approved</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>Yasir Shami</td>
                                                                                <td>Okara</td>
                                                                                <td>2-9-18</td>
                                                                                <td>1 day</td>
                                                                                <td><span class="badge bg-green" style="width: 100% !important" >Approved</span></td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>Ali Amjad</td>
                                                                                <td>Rahim Yar Khan</td>
                                                                                <td>7-9-18</td>
                                                                                <td>5 days</td>
                                                                                <td><span class="badge bg-red" style="width: 100% !important" >Rejected</span></td>
                                                                            </tr>
                                                                        </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>

                                            </div>


                                            </div>
                                        </div>
                                </div>
                                {{-- <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>This is the content of tab six.</h2>
                                            <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>

                                        </div>
                                    </div>
                                </div> --}}
                    </div>

                </section>
            </div>
    {{-- TABS END --}}

    {{-- body --}}
    {{-- <section class="content col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Current Status</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Vehicle</th>
                            <th style="width: 100px">Available</th>
                            <th style="width: 100px">Days to go</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Vego 4000</td>
                            <td><span class="badge bg-green" style="width: 100% !important" >Yes</span></td>
                            <td style="text-align: center">-</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Vego 2000</td>
                            <td><span class="badge bg-red" style="width: 100% !important" >No</span></td>
                            <td>3 days</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Cultus 3000</td>
                            <td><span class="badge bg-red" style="width: 100% !important" >No</span></td>
                            <td>5 days</td>

                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Cultus 1000</td>
                            <td><span class="badge bg-green" style="width: 100% !important" >Yes</span></td>
                            <td style="text-align: center">-</td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
        </div>
        <div class="col-md-3"></div>
    </section> --}}

    {{-- <section class="content col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Vehicle Status</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Vehicle</th>
                                <th>Tours</th>
                                <th>KiloMeters</th>
                                <th>Litres</th>
                                <th>Oil Change</th>
                                <th>Tuning</th>
                                <th>Tyres</th>
                                <th>Brake Shoe</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Vego 4000</td>
                                <td>
                                    3
                                </td>
                                <td>435 km</td>
                                <td>34L</td>
                                <td>15 days</td>
                                <td>11 days</td>
                                <td>5 days</td>
                                <td>22 days</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Vego 2000</td>
                                <td>
                                    1
                                </td>
                                <td>164 km</td>
                                <td>19L</td>
                                <td>16 days</td>
                                <td>27 days</td>
                                <td>2 days</td>
                                <td>2 days</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Cultus 3000</td>
                                <td>
                                    7
                                </td>
                                <td>502 km</td>
                                <td>43L</td>
                                <td>11 days</td>
                                <td>9 days</td>
                                <td>42 days</td>
                                <td>23 days</td>

                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Cultus 1000</td>
                                <td>
                                    5
                                </td>
                                <td>396 km</td>
                                <td>29L</td>
                                <td>22 days</td>
                                <td>22 days</td>
                                <td>63 days</td>
                                <td>70 days</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
    </section> --}}

    {{-- <section class="content col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Driver Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Tours</th>
                                <th>Last Tour</th>
                                <th>Rating</th>
                                <th>Leaves</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Waqar</td>
                                <td>
                                    3
                                </td>
                                <td>10-9-18</td>
                                <td>4.5</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Raza</td>
                                <td>
                                    2
                                </td>
                                <td>2-9-18</td>
                                <td>4.2</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Ali</td>
                                <td>
                                    5
                                </td>
                                <td>7-9-18</td>
                                <td>4.7</td>
                                <td>1</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
    </section> --}}

    {{-- <section class="content col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Budget Available Rs. 1.2 million</h3>
                    </div>
                    <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Issue</th>
                            <th>Last Repair Date</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Vego</td>
                            <td>
                                Radiator Leak
                            </td>
                            <td>10-9-18</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Cultus</td>
                            <td>
                                Ac not working
                            </td>
                            <td>2-9-18</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Corrolla</td>
                            <td>
                                Left head light not working
                            </td>
                            <td>7-9-18</td>
                        </tr>
                    </table>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
    </section> --}}

    {{-- <section class="content col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box">

              <div class="box-header with-border">
                  <h3 class="box-title">Repairing Request Form</h3>
              </div>
              <div class="box-body">

                  <div id="local">

                    <div class="form-group" id='bd'>
                      <label>Issue</label>
                      <input type="text" class="form-control" id="purpose" placeholder="Describe the issue">
                    </div>


                    <div class="form-group">
                        <label>Estimated Cost</label>
                        <input type="text" class="form-control" id="purpose" placeholder="Enter cost for repairs">
                    </div>

                    <div class="form-group"  id='pr'>
                        <label>Priority</label>
                        <select id="pt" name="pt[]" class="form-control" data-placeholder="pt" style="width: 100%;">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Last Repair Details</label>
                        <input type="text" class="form-control" id="purpose" placeholder="Enter previous detail for repairs">
                    </div>

                    <button type="button" class="btn btn-block btn-primary">Send Request</button>

                  </div>


            </div>
            <div class="col-md-3"></div>
          </div>
      </section>

      <section class="content col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Pending Requests</h3>
                </div>
                <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Days</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Dr. Naveed</td>
                        <td>Multan</td>
                        <td>10-9-18</td>
                        <td>3 days</td>
                        <td>
                            <button type="button" class="btn btn-block btn-info">Assign</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Yasir Shami</td>
                        <td>Okara</td>
                        <td>2-9-18</td>
                        <td>1 day</td>
                        <td>
                            <button type="button" class="btn btn-block btn-info">Assign</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Ali Amjad</td>
                        <td>Rahim Yar Khan</td>
                        <td>7-9-18</td>
                        <td>5 days</td>
                        <td>
                            <button type="button" class="btn btn-block btn-info">Assign</button>
                        </td>
                    </tr>
                </table>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
</section> --}}

</div>


@endsection
@section('scripttags')
<script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script type="text/javascript" src="{!! asset('js/AdminLTE/daterangepicker.js') !!}"></script>
  {{-- <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script> --}}

<script>

  $('.assignbtn').on('click',function(){
      $('#assignform').show('slow');
  })

  $('.issuebtn').on('click',function(){
      $('#createissue').show('slow');
  })

  $(document).on('change','#r1',function(){
    $('.addcity').hide()
  })

  $(document).on('change','#r2',function(){
    $('.addcity').show('slow')
  })

  $('.addcity').on('click',function(){
    $('#clonethis').clone().appendTo('#addhere').show('slow');
  })
$('#my_date').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
  });
  $('#my_date1').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
  });
  $('#my_date2').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
  });
  $(document).on('change','#type',function(){
    if ($(this).val() == "Local"){
      $('#out').hide()
      $('#local').show('slow')
    }
    else if($(this).val() == "Outstation"){
      $('#local').hide()
      $('#out').show('slow')
    }
    else{
      $('#local').hide()
      $('#out').hide()
    }
  })

  $(document).on('change','#reason',function(){
    if ($(this).val() == "Other" || $(this).val() == "Meeting"){
      $('#pr').hide()
      $('#bd').show('slow')
    }
    else if ($(this).val() == "Monitoring" || $(this).val() == "Evaluation"){
      $('#bd').hide()
      $('#pr').show('slow')
    }
    else{
      $('#bd').hide()
      $('#pr').hide()
    }

  })


        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()

          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
          //Money Euro
          $('[data-mask]').inputmask()

          //Date range picker
          $('#reservation').daterangepicker()
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
          //Date range as a button
          $('#daterange-btn').daterangepicker(
            {
              ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate  : moment()
            },
            function (start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
          )

          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })

          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
          })
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
          })
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
          })

          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()

          //Timepicker
          $('.timepicker').timepicker({
            showInputs: false
          })
        })
    </script>

<script>
        $(function () {

          /* initialize the external events
           -----------------------------------------------------------------*/
          function init_events(ele) {
            ele.each(function () {

              // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
              // it doesn't need to have a start or end
              var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
              }

              // store the Event Object in the DOM element so we can get to it later
              $(this).data('eventObject', eventObject)

              // make the event draggable using jQuery UI
              $(this).draggable({
                zIndex        : 1070,
                revert        : true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
              })

            })
          }

          init_events($('#external-events div.external-event'))

          /* initialize the calendar
           -----------------------------------------------------------------*/
          //Date for the calendar events (dummy data)
          var date = new Date()
          var d    = date.getDate(),
              m    = date.getMonth(),
              y    = date.getFullYear()
          $('#calendar').fullCalendar({
            header    : {
              left  : 'prev,next today',
              center: 'title',
              right : 'month,agendaWeek,agendaDay'
            },
            buttonText: {
              today: 'today',
              month: 'month',
              week : 'week',
              day  : 'day'
            },
            //Random default events
            events    : [
              {
                title          : 'All Day Event',
                start          : new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor    : '#f56954' //red
              },
              {
                title          : 'Long Event',
                start          : new Date(y, m, d - 5),
                end            : new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
              },
              {
                title          : 'Meeting',
                start          : new Date(y, m, d, 10, 30),
                allDay         : false,
                backgroundColor: '#0073b7', //Blue
                borderColor    : '#0073b7' //Blue
              },
              {
                title          : 'Lunch',
                start          : new Date(y, m, d, 12, 0),
                end            : new Date(y, m, d, 14, 0),
                allDay         : false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor    : '#00c0ef' //Info (aqua)
              },
              {
                title          : 'Birthday Party',
                start          : new Date(y, m, d + 1, 19, 0),
                end            : new Date(y, m, d + 1, 22, 30),
                allDay         : false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor    : '#00a65a' //Success (green)
              },
              {
                title          : 'Click for Google',
                start          : new Date(y, m, 28),
                end            : new Date(y, m, 29),
                url            : 'http://google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor    : '#3c8dbc' //Primary (light-blue)
              }
            ],
            editable  : true,
            droppable : true, // this allows things to be dropped onto the calendar !!!
            drop      : function (date, allDay) { // this function is called when something is dropped

              // retrieve the dropped element's stored Event Object
              var originalEventObject = $(this).data('eventObject')

              // we need to copy it, so that multiple events don't have a reference to the same object
              var copiedEventObject = $.extend({}, originalEventObject)

              // assign it the date that was reported
              copiedEventObject.start           = date
              copiedEventObject.allDay          = allDay
              copiedEventObject.backgroundColor = $(this).css('background-color')
              copiedEventObject.borderColor     = $(this).css('border-color')

              // render the event on the calendar
              // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
              $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

              // is the "remove after drop" checkbox checked?
              if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove()
              }

            }
          })

          /* ADDING EVENTS */
          var currColor = '#3c8dbc' //Red by default
          //Color chooser button
          var colorChooser = $('#color-chooser-btn')
          $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
          })
          $('#add-new-event').click(function (e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
              return
            }

            //Create events
            var event = $('<div />')
            event.css({
              'background-color': currColor,
              'border-color'    : currColor,
              'color'           : '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)

            //Add draggable funtionality
            init_events(event)

            //Remove event from text input
            $('#new-event').val('')
          })
        })
      </script>
      <script>

$(document).ready(function() {

  fancyTab

      var numItems = $('li.').length;


                if (numItems == 12){
                      $("li.fancyTab").width('8.3%');
                  }
                if (numItems == 11){
                      $("li.fancyTab").width('9%');
                  }
                if (numItems == 10){
                      $("li.fancyTab").width('10%');
                  }
                if (numItems == 9){
                      $("li.fancyTab").width('11.1%');
                  }
                if (numItems == 8){
                      $("li.fancyTab").width('12.5%');
                  }
                if (numItems == 7){
                      $("li.fancyTab").width('14.2%');
                  }
                if (numItems == 6){
                      $("li.fancyTab").width('16.666666666666667%');
                  }
                if (numItems == 5){
                      $("li.fancyTab").width('20%');
                  }
                if (numItems == 4){
                      $("li.fancyTab").width('25%');
                  }
                if (numItems == 3){
                      $("li.fancyTab").width('33.3%');
                  }
                if (numItems == 2){
                      $("li.fancyTab").width('50%');
                  }




          });

  $(window).load(function() {

    $('.fancyTabs').each(function() {

      var highestBox = 0;
      $('.fancyTab a', this).each(function() {

        if ($(this).height() > highestBox)
          highestBox = $(this).height();
      });

      $('.fancyTab a', this).height(highestBox);

    });
  });
      </script>
@endsection
