@extends('layouts.monitoringCM_Dashboard')
@section('title')
  DGME | Monitoring Dashboard
@endsection
@section('styleTags')
<style type="text/css">
#chartdiv {
  width: 100%;
  height: 300px;
  overflow: hidden;
  border-radius: 7px !important;
}
#chartdiv1 {
  width: 100%;
  height: 100%;
  overflow: hidden;
  border-radius: 7px !important;
}
#chartdiv2 {
  width: 100%;
  height: 300px;
  overflow: hidden;
  border-radius: 7px !important;
}
#chartdiv3 {
  width: 100%;
  height: 300px;
  overflow: hidden;
  border-radius: 7px !important;
}
#chartdiv5 {
  width: 100%;
  height: 300px;
  overflow: hidden;
  border-radius: 7px !important;
}
th{
  background: #524572;
  /* background: #5e986f; */
  text-align: center !important;
  border: 1px solid #fff;
  color: #fff;
}
.bglightskyforheader{background: linear-gradient(to right, #01a9ac, #01dbdf61);color: #312354 !important;}
.bglightorangeforheader{background: linear-gradient(to right, #f56d33, #fe94668f);color: #fff !important;}
td, th{padding: 0.5% !important;}
table{border-collapse: unset !important;}
td{
  text-align: center;
  /* background:  linear-gradient(to bottom, #8cad59, #86ca209e, #c6e890, #a0d257); */
  background: #5e986f;
  /* background: #524572ad; */
  color: #fff;
  /* color: #472f82; */
  font-weight: 600;
  border: 1px solid #fff;
  /* border-right: 1px solid #fff; */
  /* border-left: 1px solid #fff; */
}
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
/* card */
.update-card {
    color: #fff;
}
.bg-c-yellow {
    background: -webkit-gradient(linear, left top, right top, from(#fe9365), to(#feb798));
    background: linear-gradient(to right, #fe9365, #feb798);
}
.bg-c-green {
    background: -webkit-gradient(linear, left top, right top, from(#0ac282), to(#0df3a3));
    background: linear-gradient(to right, #0ac282, #0df3a3);
}
.bg-c-pink {
    background: -webkit-gradient(linear, left top, right top, from(#fe5d70), to(#fe909d));
    background: linear-gradient(to right, #fe5d70, #fe909d);
}
.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#01a9ac), to(#01dbdf));
    background: linear-gradient(to right, #01a9ac, #01dbdf);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    /* background-color: #fff; */
    background-clip: border-box;
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 1%;
    padding: 7% 11% 7% 11%;
}
.card-block {
    padding: 1.25rem;
}
.nopadmar{padding: 0% !important;margin: 0% !important;}
.nopad{padding: 0% !important;}
.card-footer{margin-top: 7% !important;border-top: 1px solid #fff;color: #fff;padding-top: 3%;}
.mt3p{margin-top: 3% !important;}
.float-right{float: right !important;}
.arrowstiQ{position: fixed !important;width: 98% !important;z-index: 9999 !important;}
.carousel-control {width: fit-content !important;color: #5e986f !important;font-size: 52px !important;opacity: 1 !important;}
.txt-black{color: #000 !important;}
.bggraygradient{background: linear-gradient(to left, #CCCCCC, #EEEEEE, #EEEEEE, #CCCCCC) !important;}
</style>
@endsection
@section('content')
<div class="col-md-12">
  <h3 class="topheading txt-black">{{$project->title}}</h3>
  <table class="col-md-12">
    <tr>
      <th>#</th>
      <th colspan="3" class="">Dates</th>
      <th colspan="2" class="">Costs</th>
      <th colspan="2" class="">Progress</th>
      <!-- <th colspan="2">Total Projects</th> -->
    </tr>
    <tr>
      <td>GS #.</td>
      <td>Actual Start Date</td>
      <td>Planned Start Date</td>
      <td>Planned End Date</td>
      <td>Original Approved Cost</td>
      <td>Final Revised Cost</td>
      <td>Financial Progress</td>
      <td>Physical Progress</td>
      <!-- <td>Total projects of Monitoring</td> -->
      <!-- <td>Total projects in progress of Monitoring</td> -->
    </tr>
    <tr>
      <td>{{$project->financial_year}}/{{$project->ADP}}</td>
      <td>@if($progress->MProjectDate){{date('d-M-Y',strtotime($progress->MProjectDate->actual_start_date))}}@else Not Added @endif</td>
      <td>{{date('d-M-Y',strtotime($project->ProjectDetail->planned_start_date))}}</td>
      <td>{{date('d-M-Y',strtotime($project->ProjectDetail->planned_end_date))}}</td>
      <td>{{round($project->ProjectDetail->orignal_cost,2)}} Million PKR</td>
      <td>
        @if($project->RevisedApprovedCost->last())
          {{round($project->RevisedApprovedCost->last()->cost,2)}}
        @else
          0
        @endif
        Million PKR</td>
        <td id="financial">
          @if($project->AssignedProject!==NULL && $progress!==NULL){{round(calculateMFinancialProgress($progress->id,2))}}@else{{0}}@endif%
        </td>
        <td id="physical">
          @if($project->AssignedProject!==NULL && $progress!==NULL){{round(calculateMPhysicalProgress($progress->id,2))}}@else{{0}}@endif%
        </td>
      <!-- <td>77</td> -->
      <!-- <td>60</td> -->
    </tr>
  </table>
</div>
  <div class="col-md-12 row mt3p">
    <div class="col-md-4">
      <h3 class="text-center txt-black">Physical Progress</h3>
      <div class="card update-card nopad">
        <div id="chartdiv3" class="bggraygradient"></div>
      </div>
    </div>
    <div class="col-md-4">
        <h3 class="text-center txt-black">Cumulative Progress</h3>
        <div class="card update-card nopad ">
          <div id="chartdiv2"></div>
        </div>
</div>
<div class="col-md-4">
    <h3 class="text-center txt-black">Financial Progress</h3>
    <div class="card update-card nopad">
      <div id="chartdiv" class="bggraygradient"></div>
    </div>
</div>
</div>
<div class="row col-md-12 mt3p">
<div class="col-md-4">
    <div class="">
      <img src="http://172.16.10.14/storage/uploads/monitoring/{{$project->AssignedProject->MProjectProgress->last()->id}}/{{$project->AssignedProject->MProjectProgress->last()->MAppAttachment->where('type','image/jpeg')->last()->project_attachement}}" alt="" style="width:100%;">
    </div>
  </div>
  <div class="col-md-8">
    <div id="chartdiv5"></div>
  </div>
</div>

<!-- <div class="arrowstiQ">
  <a class="left carousel-control" href="#text-carousel" data-slide="prev" style="left: 1% !important;">
    <span class="glyphicon glyphicon-chevron-left fas fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#text-carousel" data-slide="next" style="right: 1% !important;">
    <span class="glyphicon glyphicon-chevron-right fas fa-angle-right"></span>
  </a>
</div> -->
@endsection
@section('script')
<script src="js/app.js" charset="utf-8"></script>
<!-- Chart code -->
<script>

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.paddingRight = 20;


var st = [{"year":0,"value":0}];
    var i = 1;
    financial_progress_values.forEach(element => {
      st.push ({
        "year":i,
        "value": element
      });
      i++;
    });

// Add data
chart.data = st;

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// // Pre zoom
// chart.events.on("datavalidated", function () {
//   categoryAxis.zoomToIndexes(Math.round(chart.data.length * 0.4), Math.round(chart.data.length * 0.55));
// });

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;
valueAxis.max = 80;
// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "year";
series.strokeWidth = 2;
series.tensionX = 0.77;

var range = valueAxis.createSeriesRange(series);
range.value = 0;
range.endValue = 1000;
range.contents.stroke = am4core.color("#6b75dc");
// range.contents.fill = am4core.color("#fff");
range.contents.fill = range.contents.stroke;

// Add scrollbar
// var scrollbarX = new am4charts.XYChartScrollbar();
// scrollbarX.series.push(series);
// chart.scrollbarX = scrollbarX;
chart.cursor = new am4charts.XYCursor();
</script>

<script>

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);
chart.paddingRight = 20;


var st = [{"year":0,"value":0,"value2":0}];
    var i =0;
    financial_progress_values.forEach(element => {
      st.push ({
        "year":i+1,
        "value": element,
        "value2":physical_progress_values[i]
      });
      i++;
    });
    console.log(st);
    

// Add data
chart.data = st;

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;
valueAxis.max = 80;

//Create Series
var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "value2";
series2.dataFields.categoryX = "year";
series2.strokeWidth = 2;
series2.tensionX = 0.77;
series2.name = "Physical Progress";
// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "year";
series.strokeWidth = 2;
series.tensionX = 0.77;
series.name = "Financial Progress";

// Add legend
chart.legend = new am4charts.Legend();
chart.cursor = new am4charts.XYCursor();
</script>

<script>

// Define icons
var icon1 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTc2IiBoZWlnaHQ9Ijg4OSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNODcuODIuMDY2djc2LjQzNmwtNC4wNjUgMi45ODR2NjUuNDE4bC0yLjkwNCAzLjQ0My0uNzc0IDYzLjEyMy01LjIyOCA1LjczOHY2MS45NzVsLTIuMzIzIDQuODItLjc3NCAxNzguNTgtOS42OCAyLjI5Ni0uNzc1IDEyOC41NC05LjEgMy4yMTR2MTE5LjU4OWwtNS42MTQgMS4xNDgtLjc3NCA4NC4wMS03LjU1IDEuMTQ4djQ5LjM1aC04LjMyNnYxMS4wMThoLTYuOTd2OC4yNjRILjd2MjAuNjU4aDE3NC40MzdWODcxLjE2aC0xNy40MjR2LTguMjY0aC0xMS4yM3YtOS42NGwtNy4zNTYtLjIzLS45NjgtNzMuNjgxLTcuNTUtLjkxOC45NjctOTguOTMtNy45MzgtMS44MzctLjc3NC0xMjIuMTE0LTYuOTctMS44MzYtMS4zNTUtMTM4LjE4Mi01LjYxNC03LjU3NFYzMDcuMTg3bC02LjAwMi05LjQxMXYuMjMtMzkuOTRsLTQuMjYtMy42NzMtLjc3NC0zNi45NTVoLS45Njh2LTQ2LjU5NmwtMy44NzItNi44ODZ2LTYwLjEzOWwtMy42NzgtMi45ODQtLjM4OC0yMS4xMTdWLjA2NmgtMS4xNjF6IiBmaWxsPSIjMDAwMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48L3N2Zz4=";

var icon2 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTAzIiBoZWlnaHQ9IjU3NSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAzIDU3Ny45VjI4OC41YzAtMS4xLTEuMi0yLjEtMi4yLTIuMWgtOFYxODIuMWMwLTEtMS4xLTIuMS0yLjEtMi4xSDc0LjRWOTguNWMwLTEtMS0yLTIuMS0ySDU5LjJzLjEtMS45LjEtMy0xLjEtMS4xLTEuMS0xLjFWNDIuN2gtMi4xVjhoLTN2ODQuNGgtMlY0Ni44aC0xLjl2NDUuOEgzNC45di00N2gtMS4ydjQ2LjloLTIuOVYuNWgtNC4ydjkyaC01LjF2NGgtOC4xYy0xLjEgMC0yIDEtMiAydjE4OEgyLjJjLTEuMSAwLTIuMSAxLTIuMSAydjI4OS40SDEwM3oiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

var icon3 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iODMiIGhlaWdodD0iNTU2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0zOS44Ljh2NTYuNWwtNS4xIDEuM3Y1aDN2M2gxLjh2MmgtMy44Yy0uOSAwLTIuMSAxLTIuMSAydjE2LjloLTRzLjkgMTUuOS45IDE2LjljMCAxIDEuMSAyIDIuMSAyaDF2MTYuOWgtNy4xYy0xIDAtMiAxLTIgMnY5aC04LjFjLTEuMSAwLTIgMS0yIDJ2MS45aC0ybDQuMSAzOC43aC0zbDMuOSAzNy45aC0zLjlsMy43IDM3LjdoLTMuOWw0LjQgMzcuN2gtNC4zbDMuOSAzNi44aC00bDQuMiAzNi45aC00LjNsNC40IDM4LjdoLTQuM2w0IDM5LjhzLTEuNy0uMS0yLjUgMGMtLjggMC0xLjEgMS4xLTEuMyAxLjgtLjIuNy0xMy4xIDExNS0xMy4xIDExNWw0MS0uMmguN2w0MSAuMlM3MC4yIDQ0NC45IDcwIDQ0NC4yYy0uMi0uNy0uNS0xLjgtMS4zLTEuOC0uOC0uMS0yLjUgMC0yLjUgMGw0LTM5LjhoLTQuM2w0LjQtMzguN0g2Nmw0LjItMzYuOWgtNGwzLjktMzYuOGgtNC4zbDQuNC0zNy43aC0zLjlsMy43LTM3LjdoLTMuOWwzLjktMzcuOWgtM2w0LjEtMzguN2gtMnYtMS45YzAtMS4xLS45LTItMi0ySDU5di05YzAtMS0xLTItMi0yaC03LjF2LTE2LjloMWMxIDAgMi4xLTEgMi4xLTJzLjktMTYuOS45LTE2LjloLTRWNzAuNmMwLTEtMS4xLTItMi4xLTJINDR2LTJoMS44di0zaDN2LTVsLTUuMS0xLjNWLjhoLTMuOXoiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

var icon4 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTgwIiBoZWlnaHQ9IjQ5MyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMzAuNy40djQwLjhoLTJ2NmgydjIuNWwtMSAzLjVoLTFjLTEgMC0yIDEtMiAydjJoLTFjLS45IDAtMiAxLTIgMnY1LjloLTFjLTEuMSAwLTIuMSAxLTIuMSAydjhoLTFjLTEgMC0yIDEtMiAyVjg2aC0xYy0xIDAtMi4xIDEtMi4xIDJ2MTYuOWgtMi4xYy0xIDAtMiAuOS0yIDJ2MjMuOWgtMmMtMSAwLTIgMS0yIDJ2NDAuN2gtMmMtMSAwLTIgMS0yIDJ2NTEuN2MwIC45LTIuMSAxLjItMi4xIDJ2MjY2LjJsMzEuOCAxaDFsMjguOC0uOWg1Ni4ybDI4LjguOWgxbDMxLjgtMVYyMjkuMmMwLS44LTIuMS0xLjEtMi4xLTJ2LTUxLjdjMC0xLTEtMi0yLTJoLTJ2LTQwLjdjMC0uOS0xLjEtMi0yLjEtMmgtMnYtMjMuOWMwLTEtMS4xLTItMi0yaC0yLjFWODhjMC0xLTEtMi0yLjEtMmgtMXYtOC45YzAtMS0xLTItMi0yaC0xdi04YzAtMS0xLTItMi0yaC0xLjF2LTUuOWMwLTEtMS4xLTItMi0yaC0xdi0yYzAtMS0xLTItMi0yaC0xbC0xLTMuNXYtMi41aDJ2LTZoLTJWLjRoLTMuOHY0MC44aC0ydjZoMnYyLjVsLTEgMy41aC0xYy0xIDAtMiAxLTIgMnYyaC0xYy0uOSAwLTIgMS0yIDJ2NS45aC0xYy0xLjEgMC0yLjEgMS0yLjEgMnY4aC0xYy0xIDAtMiAxLTIgMlY4NmgtMWMtMSAwLTIuMSAxLTIuMSAydjE2LjloLTIuMWMtMSAwLTIgLjktMiAydjIzLjloLTJjLTEgMC0yIDEtMiAydjQwLjdoLTJjLTEgMC0yIDEtMiAydjUxLjdjMCAuOS0yLjEgMS4yLTIuMSAydjczLjVINjV2LTczLjVjMC0uOC0yLjEtMS4xLTIuMS0ydi01MS43YzAtMS0xLTItMi0yaC0ydi00MC43YzAtLjktMS4xLTItMi4xLTJoLTJ2LTIzLjljMC0xLTEuMS0yLTItMmgtMi4xVjg4YzAtMS0xLTItMi4xLTJoLTF2LTguOWMwLTEtMS0yLTItMmgtMXYtOGMwLTEtMS0yLTItMmgtMS4xdi01LjljMC0xLTEuMS0yLTItMmgtMXYtMmMwLTEtMS0yLTItMmgtMWwtMS0zLjV2LTIuNWgydi02aC0yVi40aC0zLjh6TTY1IDMxMy42aDIzLjRsLjEuMUw2NSAzNTkuMXYtNDUuNXptMjYuNyAwaDIzLjZ2NDUuOGwtMjMuNi00NS44em0tMS43IDMuM2wyNS4yIDQ5Ljd2MTA2LjNINjVWMzY2LjJsMjUtNDkuM3oiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

var icon5 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTQ0IiBoZWlnaHQ9IjQ4NSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNjkuOS4zdjQwSDY5Yy0uOCAwLTIuMSAxLjEtMi4xIDIuMXYyOC43YzAgMS4xLTEuMi45LTEuMiAyLjF2MjUuOWMwIC45LTEgMS4xLTEgMnY5LjRsLTcuMiAxOS40aC00Yy0xIDAtMi4xIDEtMi4xIDJ2NWgtM2MtMSAwLTIuMSAxLTIuMSAydjI3LjhoLTNjLTEgMC0yLjEuOS0yLjEgMnYzMy44YzAgMS40LTMgMi4xLTMgM3YxNjIuMWgtNWMtMSAwLTIuMSAxLTIuMSAydjM1LjhIMjBjLTEgMC0yLjEgMS0yLjEgMnY1My43SDIuN2MtMSAwLTIgMS0yIDJ2MjQuNWw3MS4xLjdoLjZsNzEuMS0uN3YtMjQuNWMwLTEtMS0yLTItMmgtMTUuMnYtNTMuN2MwLTEtMS0yLTIuMS0yaC0xMS4xdi0zNS44YzAtMS0xLTItMi4xLTJoLTVWMjA1LjVjMC0xLTMuMS0xLjYtMy4xLTN2LTMzLjhjMC0xLTEtMi0yLTJoLTN2LTI3LjhjMC0uOS0xLTItMi4xLTJoLTN2LTVjMC0xLTEtMi0yLTJoLTRsLTcuMi0xOS40di05LjRjMC0uOS0xLTEuMS0xLTJWNzMuMmMwLTEuMi0xLjItMS0xLjItMi4xVjQyLjRjMC0xLTEuMi0yLjEtMi4xLTIuMWgtLjlWLjNoLTQuNXoiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

// Create chart instance
var chart1 = am4core.create("chartdiv1", am4charts.XYChart);
chart1.hiddenState.properties.opacity = 0;
chart1.defaultState.transitionDuration = 5000;

// Add data
chart1.data = [{
  "category": "Financial Progress",
  "height": 82,
  "ratio": 1 / 5.12,
  "icon": icon1
}];

// Create axes
var categoryAxis = chart1.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#ffffff");
categoryAxis.renderer.labels.template.fillOpacity = 1;
categoryAxis.renderer.inside = true;

chart1.paddingBottom = 0;

var valueAxis = chart1.yAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.max = 100;
valueAxis.strictMinMax = true;
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.minLabelPosition = 0.05;

// Create series
var series = chart1.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "height";
series.dataFields.categoryX = "category";
series.columns.template.disabled = true;

var bullet = series.bullets.push(new am4charts.Bullet());
bullet.defaultState.properties.opacity = 0.5;

var hoverState = bullet.states.create("hover");
hoverState.properties.opacity = 0.9;

var image = bullet.createChild(am4core.Image);
image.horizontalCenter = "middle";
image.verticalCenter = "top";

image.propertyFields.href = "icon";
image.height = am4core.percent(100);
image.propertyFields.widthRatio = "ratio";

bullet.events.on("positionchanged", (event)=>{
    event.target.deepInvalidate();
});

var label = series.bullets.push(new am4charts.LabelBullet());
label.label.text = "{height} %";
label.dy = -15;

let gradient1 = new am4core.LinearGradient();
gradient1.addColor(am4core.color("#65adb9"));
gradient1.addColor(am4core.color("#65adb9"));
gradient1.addColor(am4core.color("#12576985"));
gradient1.rotation = 90;
chart1.background.fill = gradient1;
</script>
<!-- Cumulative chart -->
{{-- <script>
// Create chart instance
var chart2 = am4core.create("chartdiv2", am4charts.XYChart);

// Increase contrast by taking evey second color
chart2.colors.step = 2;

// Add data
chart2.data = generateChartData();

// Create axes
var dateAxis = chart2.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 50;

// Create series
function createAxisAndSeries(field, name, opposite) {
  var valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());

  var series = chart2.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = field;
  series.dataFields.dateX = "date";
  series.strokeWidth = 2;
  series.yAxis = valueAxis;
  series.name = name;
  series.tooltipText = "{name}: [bold]{valueY}[/]";
  series.tensionX = 0.8;

  var interfaceColors = new am4core.InterfaceColorSet();

  // switch(bullet) {
  //   case "triangle":
  //     var bullet = series.bullets.push(new am4charts.Bullet());
  //     bullet.width = 12;
  //     bullet.height = 12;
  //     bullet.horizontalCenter = "middle";
  //     bullet.verticalCenter = "middle";
  //
  //     var triangle = bullet.createChild(am4core.Triangle);
  //     triangle.stroke = interfaceColors.getFor("background");
  //     triangle.strokeWidth = 2;
  //     triangle.direction = "top";
  //     triangle.width = 12;
  //     triangle.height = 12;
  //     break;
  //   case "rectangle":
  //     var bullet = series.bullets.push(new am4charts.Bullet());
  //     bullet.width = 10;
  //     bullet.height = 10;
  //     bullet.horizontalCenter = "middle";
  //     bullet.verticalCenter = "middle";
  //
  //     var rectangle = bullet.createChild(am4core.Rectangle);
  //     rectangle.stroke = interfaceColors.getFor("background");
  //     rectangle.strokeWidth = 2;
  //     rectangle.width = 10;
  //     rectangle.height = 10;
  //     break;
  //   default:
  //     var bullet = series.bullets.push(new am4charts.CircleBullet());
  //     bullet.circle.stroke = interfaceColors.getFor("background");
  //     bullet.circle.strokeWidth = 2;
  //     break;
  // }

  valueAxis.renderer.line.strokeOpacity = 1;
  valueAxis.renderer.line.strokeWidth = 2;
  valueAxis.renderer.line.stroke = series.stroke;
  valueAxis.renderer.labels.template.fill = series.stroke;
  valueAxis.renderer.opposite = opposite;
  valueAxis.renderer.grid.template.disabled = true;
}

createAxisAndSeries("visits", "Visits", false, "circle");
// createAxisAndSeries("views", "Views", true, "triangle");
createAxisAndSeries("hits", "Hits", true, "rectangle");

// Add legend
chart2.legend = new am4charts.Legend();

// Add cursor
chart2.cursor = new am4charts.XYCursor();

// generate some random data, quite different range
function generateChartData() {
  var chartData = [];
  var firstDate = new Date();
  firstDate.setDate(firstDate.getDate() - 100);
  firstDate.setHours(0, 0, 0, 0);

  var visits = 70;
  var hits = 60;
  // var views = 8700;

  for (var i = 0; i < 15; i++) {
    // we create date objects here. In your data, you can have date strings
    // and then set format of your dates using chart2.dataDateFormat property,
    // however when possible, use date objects, as this will speed up chart rendering.
    var newDate = new Date(firstDate);
    newDate.setDate(newDate.getDate() + i);

    visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
    hits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
    // views += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

    chartData.push({
      date: newDate,
      visits: visits,
      hits: hits
      // views: views
    });
  }
  return chartData;
}
</script> --}}
<!-- end Cumulative -->
<!-- chartdiv3 Start -->
<script>
// Create chart instance
var chart3 = am4core.create("chartdiv3", am4charts.XYChart);
chart3.paddingRight = 20;

// Add data

var st = [{"year":0,"value":0}];
    var i = 1;
    physical_progress_values.forEach(element => {
      st.push ({
        "year":i,
        "value": element
      });
      i++;
    });

chart3.data = st;

// Create axes
var categoryAxis = chart3.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// // Pre zoom
// chart3.events.on("datavalidated", function () {
//   categoryAxis.zoomToIndexes(Math.round(chart3.data.length * 0.4), Math.round(chart3.data.length * 0.55));
// });

// Create value axis
var valueAxis = chart3.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;
valueAxis.max = 80;
// Create series
var series = chart3.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "year";
series.strokeWidth = 2;
series.tensionX = 0.77;

var range = valueAxis.createSeriesRange(series);
range.value = 0;
range.endValue = 1000;
range.contents.stroke = am4core.color("#65adb9");
// range.contents.fill = am4core.color("#fff");
range.contents.fill = range.contents.stroke;

// Add scrollbar
// var scrollbarX = new am4charts.XYChartScrollbar();
// scrollbarX.series.push(series);
// chart3.scrollbarX = scrollbarX;
chart3.cursor = new am4charts.XYCursor();
</script>
<script type="text/javascript">
$(document).ready(function()
{
  var status = $(document.getElementById('financial'));
  let temp = actual_progress;
  console.log(temp);
  
  if (temp-financial_progress <= 25) {
    status.className = '';
    status.addClass('green');
  }
  else if (temp-financial_progress <= 50) {
    status.className = '';
    status.addClass('yel');
  }
  // else if (temp<= 75 && temp>= 50) {
  //   status.addClass('blue');
  // }
  else if (temp-financial_progress <= 75) {
    status.className = '';
    status.addClass('orange');
  }
  else if (temp-financial_progress<=100) {
    status.className = '';
    status.addClass('red');
  }
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
  var status = $(document.getElementById('physical'));
  let temp = actual_progress;
  console.log(temp);
  
  if (temp-physical_progress <= 25) {
    status.className = '';
    status.addClass('green');
  }
  else if (temp-physical_progress <= 50) {
    status.className = '';
    status.addClass('yel');
  }
  // else if (temp<= 75 && temp>= 50) {
  //   status.addClass('blue');
  // }
  else if (temp-physical_progress <= 75) {
    status.className = '';
    status.addClass('orange');
  }
  else if (temp-physical_progress<=100) {
    status.className = '';
    status.addClass('red');
  }
});
</script>
<!-- start gant chart -->
<script>
// Themes begin
// am4core.useTheme(am4themes_animated);
// Themes end

var chart5 = am4core.create("chartdiv5", am4charts.XYChart);
chart5.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart5.paddingRight = 30;
chart5.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm";

var colorSet = new am4core.ColorSet();
colorSet.saturation = 0.4;

chart5.data = [ {
  "category": "Module #1",
  "start": "2016-01-01",
  "end": "2016-01-14",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Gathering requirements"
}, {
  "category": "Module #1",
  "start": "2016-01-16",
  "end": "2016-01-27",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Producing specifications"
}, {
  "category": "Module #1",
  "start": "2016-02-05",
  "end": "2016-04-18",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Development"
}, {
  "category": "Module #1",
  "start": "2016-04-18",
  "end": "2016-04-30",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Testing and QA"
}, {
  "category": "Module #2",
  "start": "2016-01-08",
  "end": "2016-01-10",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Gathering requirements"
}, {
  "category": "Module #2",
  "start": "2016-01-12",
  "end": "2016-01-15",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Producing specifications"
}, {
  "category": "Module #2",
  "start": "2016-01-16",
  "end": "2016-02-05",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Development"
}, {
  "category": "Module #2",
  "start": "2016-02-10",
  "end": "2016-02-18",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Testing and QA"
}, {
  "category": "Module #3",
  "start": "2016-01-02",
  "end": "2016-01-08",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Gathering requirements"
}, {
  "category": "Module #3",
  "start": "2016-01-08",
  "end": "2016-01-16",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Producing specifications"
}, {
  "category": "Module #3",
  "start": "2016-01-19",
  "end": "2016-03-01",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Development"
}, {
  "category": "Module #3",
  "start": "2016-03-12",
  "end": "2016-04-05",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Testing and QA"
}, {
  "category": "Module #4",
  "start": "2016-01-01",
  "end": "2016-01-19",
  "color": colorSet.getIndex(14).brighten(0.5),
  "task": "Gathering requirements"
}];

chart5.dateFormatter.dateFormat = "yyyy-MM-dd";
chart5.dateFormatter.inputDateFormat = "yyyy-MM-dd";

var categoryAxis = chart5.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.inversed = true;

var dateAxis = chart5.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 70;
dateAxis.baseInterval = { count: 1, timeUnit: "day" };
// dateAxis.max = new Date(2018, 0, 1, 24, 0, 0, 0).getTime();
//dateAxis.strictMinMax = true;
dateAxis.renderer.tooltipLocation = 0;

var series1 = chart5.series.push(new am4charts.ColumnSeries());
series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText = "{task}: [bold]{openDateX}[/] - [bold]{dateX}[/]";

series1.dataFields.openDateX = "start";
series1.dataFields.dateX = "end";
series1.dataFields.categoryY = "category";
series1.columns.template.propertyFields.fill = "color"; // get color from data
series1.columns.template.propertyFields.stroke = "color";
series1.columns.template.strokeOpacity = 1;

chart5.scrollbarX = new am4core.Scrollbar();
</script>
<!-- end gant chart -->
@endsection
