@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  DGME | Attendance Dashboard
@endsection
@section('styleTags')
<style>
    .navbar-logo,.pcoded-navbar{display:none !important;}
    .pcoded[theme-layout="vertical"][vertical-placement="left"][vertical-nav-type="expanded"][vertical-effect="shrink"] .pcoded-content{margin-left:0px !important;}
    td, th{text-align:center;}
    button, input, optgroup, select, textarea{border-radius:6px !important}
    table{margin-top:3% !important;}
    th{padding: 8px 0px;}
    tr{border-bottom:1px solid #ccc;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
    tbody tr:nth-child(even){color:#555;background-color:#eeecec;}
    tbody tr:hover{color:#777;background-color:#fff;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
    thead:nth-child(1){background: #404e67 !important;color: #fff !important;}
    th{border:1px solid #fff;}
    td{border: 1px solid #cccccc47;font-weight: 600;}
    td{border: 1px solid #cccccc47;font-weight: 600;}
    /* card */
    .absiconcardbordrad{position: absolute;margin: -9% 0%;font-size: 36px;box-shadow: -3px 4px 23px #7777773d;text-align: center;padding: 3%;}
    .absiconcard{position: absolute;margin: -16% 0%;font-size: 36px;box-shadow: -3px 4px 23px #7777773d;text-align: center;padding: 3%;border-radius: 58px;}    .orrange{background: #fea11e;color:#fff;}
    .red{background: #ec4d4a;color:#fff;}
    .sky{background: #1cbed3;color:#fff;}
    .green{background: #5eb662;color:#fff;}
    .card-title, .card-text{text-align: right;clear:both;padding: 0px;}
    .card-text{color: #404e6796;}
    .card-title{color:#404e67;}
    .paddingtop-16{padding-top:16% !important;}
    /* #chartdiv {width: 30%;height: 100px;margin:auto;} */
    #backButton {
		border-radius: 4px;
		padding: 8px;
		border: none;
		font-size: 16px;
		background-color: #2eacd1;
		color: white;
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
	}
	.invisible {
		display: none;
	}
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
          <div class="col-md-3 absiconcard orrange">
            <i class="feather icon-users"></i>
          </div>
        <h5 class="card-title col-sm-7 offset-md-5 float-right">Attendance</h5>
        <h2 class="card-text">25</h2>
        <hr/>
            <a href="{{route('dailyattendance')}}"><h6><i class="feather icon-file-text"></i> Show All</h6></a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
          <div class="col-md-3 absiconcard green">
            <i class="feather icon-user"></i>
          </div>
        <h5 class="card-title col-sm-7 offset-md-5 float-right">Present</h5>
        <h2 class="card-text">20</h2>
        <hr/>
            <a href="#!"><h6><i class="feather icon-file-text"></i> Show All</h6></a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
          <div class="col-md-3 absiconcard red">
            <i class="feather icon-thumbs-down"></i>
          </div>
        <h5 class="card-title col-sm-7 offset-md-5 float-right">Late comers</h5>
        <h2 class="card-text">20</h2>
        <hr/>
            <a href="#!"><h6><i class="feather icon-file-text"></i> Show All</h6></a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
          <div class="col-md-3 absiconcard sky">
            <i class="feather icon-clock"></i>
          </div>
        <h5 class="card-title col-sm-7 offset-md-5 float-right">Late comers</h5>
        <h2 class="card-text">20</h2>
        <hr/>
            <a href="#!"><h6><i class="feather icon-file-text"></i> Show All</h6></a>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
          <div class="col-md-11 absiconcardbordrad green">
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          <button class="btn invisible" id="backButton">< Back</button>
          </div>
        <h5 class="card-title paddingtop-16">Late comers</h5>
        <h2 class="card-text">20</h2>
        <hr/>
            <a href="#!"><h6><i class="feather icon-file-text"></i> Show All</h6></a>
      </div>
    </div>
  </div>
</div>
@endsection
@section("js_scripts")
<!-- Resources -->
<!-- <script src="js/app.js"></script> -->
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<!-- Chart code -->
<script>
window.onload = function () {

var totalVisitors = 883000;
var visitorsData = {
	"New vs Returning Visitors": [{
		click: visitorsChartDrilldownHandler,
		cursor: "pointer",
		explodeOnClick: false,
		innerRadius: "75%",
		legendMarkerType: "square",
		name: "New vs Returning Visitors",
		radius: "100%",
		showInLegend: true,
		startAngle: 90,
		type: "doughnut",
		dataPoints: [
			{ y: 519960, name: "New Visitors", color: "#E7823A" },
			{ y: 363040, name: "Returning Visitors", color: "#546BC1" }
		]
	}],
	"New Visitors": [{
		color: "#E7823A",
		name: "New Visitors",
		type: "column",
		xValueFormatString: "MMM YYYY",
		dataPoints: [
			{ x: new Date("1 Jan 2015"), y: 33000 },
			{ x: new Date("1 Feb 2015"), y: 35960 },
			{ x: new Date("1 Mar 2015"), y: 42160 },
			{ x: new Date("1 Apr 2015"), y: 42240 },
			{ x: new Date("1 May 2015"), y: 43200 },
			{ x: new Date("1 Jun 2015"), y: 40600 },
			{ x: new Date("1 Jul 2015"), y: 42560 },
			{ x: new Date("1 Aug 2015"), y: 44280 },
			{ x: new Date("1 Sep 2015"), y: 44800 },
			{ x: new Date("1 Oct 2015"), y: 48720 },
			{ x: new Date("1 Nov 2015"), y: 50840 },
			{ x: new Date("1 Dec 2015"), y: 51600 }
		]
	}],
	"Returning Visitors": [{
		color: "#546BC1",
		name: "Returning Visitors",
		type: "column",
		xValueFormatString: "MMM YYYY",
		dataPoints: [
			{ x: new Date("1 Jan 2015"), y: 22000 },
			{ x: new Date("1 Feb 2015"), y: 26040 },
			{ x: new Date("1 Mar 2015"), y: 25840 },
			{ x: new Date("1 Apr 2015"), y: 23760 },
			{ x: new Date("1 May 2015"), y: 28800 },
			{ x: new Date("1 Jun 2015"), y: 29400 },
			{ x: new Date("1 Jul 2015"), y: 33440 },
			{ x: new Date("1 Aug 2015"), y: 37720 },
			{ x: new Date("1 Sep 2015"), y: 35200 },
			{ x: new Date("1 Oct 2015"), y: 35280 },
			{ x: new Date("1 Nov 2015"), y: 31160 },
			{ x: new Date("1 Dec 2015"), y: 34400 }
		]
	}]
};

var newVSReturningVisitorsOptions = {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "New VS Returning Visitors"
	},
	subtitles: [{
		text: "Click on Any Segment to Drilldown",
		backgroundColor: "#2eacd1",
		fontSize: 16,
		fontColor: "white",
		padding: 5
	}],
	legend: {
		fontFamily: "calibri",
		fontSize: 14,
		itemTextFormatter: function (e) {
			return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";  
		}
	},
	data: []
};

var visitorsDrilldownedChartOptions = {
	animationEnabled: true,
	theme: "light2",
	axisX: {
		labelFontColor: "#717171",
		lineColor: "#a2a2a2",
		tickColor: "#a2a2a2"
	},
	axisY: {
		gridThickness: 0,
		includeZero: false,
		labelFontColor: "#717171",
		lineColor: "#a2a2a2",
		tickColor: "#a2a2a2",
		lineThickness: 1
	},
	data: []
};

newVSReturningVisitorsOptions.data = visitorsData["New vs Returning Visitors"];
$("#chartContainer").CanvasJSChart(newVSReturningVisitorsOptions);

function visitorsChartDrilldownHandler(e) {
	e.chart.options = visitorsDrilldownedChartOptions;
	e.chart.options.data = visitorsData[e.dataPoint.name];
	e.chart.options.title = { text: e.dataPoint.name }
	e.chart.render();
	$("#backButton").toggleClass("invisible");
}

$("#backButton").click(function() { 
	$(this).toggleClass("invisible");
	newVSReturningVisitorsOptions.data = visitorsData["New vs Returning Visitors"];
	$("#chartContainer").CanvasJSChart(newVSReturningVisitorsOptions);
});

}
</script>
@endsection