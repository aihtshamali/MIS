@extends('layouts.monitoringCM_Dashboard')
@section('title')
  DGME | Monitoring Dashboard
@endsection
@section('styleTags')
<style type="text/css">
#chartdiv {
  width: 100%;
  height: 100%;
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
  height: 400px;
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
td, th{padding: 0.1% !important;}
table{border-collapse: unset !important;}
td{
  text-align: center;
  background: #5e986f;
  /* background: #524572ad; */
  color: #fff;
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
    background-color: #fff;
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
</style>
@endsection
@section('content')
<div class="col-md-12">
  <h3 class="topheading">Delivery of better extension servioces to accelerate fish culture prctices.</h3>
  <table>
    <tr>
      <th>#</th>
      <th colspan="3" class="">Dates</th>
      <th colspan="2" class="">Costs</th>
      <th colspan="2" class="">Progress</th>
      <th colspan="2">Total Projects</th>
    </tr>
    <tr>
      <td>GS #.</td>
      <td>Actual Start Date</td>
      <td>Planned Start Date</td>
      <td>Planned End Date</td>
      <td>Final Revised Cost</td>
      <td>Original Approve Cost</td>
      <td>Financial Progress</td>
      <td>Physical Progress</td>
      <td>Total projects of Monitoring</td>
      <td>Total projects in progress of Monitoring</td>
    </tr>
    <tr>
      <td>2018-19/5762</td>
      <td>2014-08-01</td>
      <td>2014-07-01</td>
      <td>2019-06-30</td>
      <td>398 Million PKR</td>
      <td>392.79 Million PKR</td>
      <td class="yel">50%</td>
      <td class="blue">76%</td>
      <td>77</td>
      <td>60</td>
    </tr>
  </table>
</div>
<div class="row col-md-12 mt3p">
<div class="col-md-5">
  <div class="item ">
    <img src="http://172.16.10.11/storage/uploads/monitoring/3/SligJesgm8aHjs7sBhOsECC5NQhrIrH9sVe0cb4H.jpeg" alt="" style="width:100%;">
  </div>
</div>
<div class="col-md-4">
  <div id="chartdiv2"></div>
</div>
<div class="col-md-3 float-right">
  <div class="col-md-12 mt3p">
    <div class="card update-card nopad">
      <div id="chartdiv1"></div>
    </div>
  </div>
  <div class="col-md-12 mt3p">
    <div class="card bg-c-yellow update-card nopad">
    <div id="chartdiv"></div>
  </div>
</div>
  <div class="col-md-12 mt3p">
    <div class="card bg-c-green update-card">
      <h4 class="nopadmar">PKR 398 Million</h4>
      <b>Original Approve Cost</b>
      <div class="card-footer">
        <i class="fa fa-clock-o" aria-hidden="true"></i> update : 2:15 am
      </div>
    </div>
  </div>
  <div class="col-md-12 mt3p">
    <div class="card bg-c-lite-green update-card">
      <h4 class="nopadmar">PKR 398 Million</h4>
      <b>Original Approve Cost</b>
      <div class="card-footer">
        <i class="fa fa-clock-o" aria-hidden="true"></i> update : 2:15 am
      </div>
    </div>
  </div>
</div>
<div class="arrowstiQ">
  <a class="left carousel-control" href="#text-carousel" data-slide="prev" style="left: 1% !important;">
    <span class="glyphicon glyphicon-chevron-left fas fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#text-carousel" data-slide="next" style="right: 1% !important;">
    <span class="glyphicon glyphicon-chevron-right fas fa-angle-right"></span>
  </a>
</div>
</div>
@endsection
@section('script')
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<!-- Chart code -->
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Define icons
var icon1 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTc2IiBoZWlnaHQ9Ijg4OSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNODcuODIuMDY2djc2LjQzNmwtNC4wNjUgMi45ODR2NjUuNDE4bC0yLjkwNCAzLjQ0My0uNzc0IDYzLjEyMy01LjIyOCA1LjczOHY2MS45NzVsLTIuMzIzIDQuODItLjc3NCAxNzguNTgtOS42OCAyLjI5Ni0uNzc1IDEyOC41NC05LjEgMy4yMTR2MTE5LjU4OWwtNS42MTQgMS4xNDgtLjc3NCA4NC4wMS03LjU1IDEuMTQ4djQ5LjM1aC04LjMyNnYxMS4wMThoLTYuOTd2OC4yNjRILjd2MjAuNjU4aDE3NC40MzdWODcxLjE2aC0xNy40MjR2LTguMjY0aC0xMS4yM3YtOS42NGwtNy4zNTYtLjIzLS45NjgtNzMuNjgxLTcuNTUtLjkxOC45NjctOTguOTMtNy45MzgtMS44MzctLjc3NC0xMjIuMTE0LTYuOTctMS44MzYtMS4zNTUtMTM4LjE4Mi01LjYxNC03LjU3NFYzMDcuMTg3bC02LjAwMi05LjQxMXYuMjMtMzkuOTRsLTQuMjYtMy42NzMtLjc3NC0zNi45NTVoLS45Njh2LTQ2LjU5NmwtMy44NzItNi44ODZ2LTYwLjEzOWwtMy42NzgtMi45ODQtLjM4OC0yMS4xMTdWLjA2NmgtMS4xNjF6IiBmaWxsPSIjMDAwMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48L3N2Zz4=";

var icon2 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTAzIiBoZWlnaHQ9IjU3NSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAzIDU3Ny45VjI4OC41YzAtMS4xLTEuMi0yLjEtMi4yLTIuMWgtOFYxODIuMWMwLTEtMS4xLTIuMS0yLjEtMi4xSDc0LjRWOTguNWMwLTEtMS0yLTIuMS0ySDU5LjJzLjEtMS45LjEtMy0xLjEtMS4xLTEuMS0xLjFWNDIuN2gtMi4xVjhoLTN2ODQuNGgtMlY0Ni44aC0xLjl2NDUuOEgzNC45di00N2gtMS4ydjQ2LjloLTIuOVYuNWgtNC4ydjkyaC01LjF2NGgtOC4xYy0xLjEgMC0yIDEtMiAydjE4OEgyLjJjLTEuMSAwLTIuMSAxLTIuMSAydjI4OS40SDEwM3oiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

var icon3 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iODMiIGhlaWdodD0iNTU2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0zOS44Ljh2NTYuNWwtNS4xIDEuM3Y1aDN2M2gxLjh2MmgtMy44Yy0uOSAwLTIuMSAxLTIuMSAydjE2LjloLTRzLjkgMTUuOS45IDE2LjljMCAxIDEuMSAyIDIuMSAyaDF2MTYuOWgtNy4xYy0xIDAtMiAxLTIgMnY5aC04LjFjLTEuMSAwLTIgMS0yIDJ2MS45aC0ybDQuMSAzOC43aC0zbDMuOSAzNy45aC0zLjlsMy43IDM3LjdoLTMuOWw0LjQgMzcuN2gtNC4zbDMuOSAzNi44aC00bDQuMiAzNi45aC00LjNsNC40IDM4LjdoLTQuM2w0IDM5LjhzLTEuNy0uMS0yLjUgMGMtLjggMC0xLjEgMS4xLTEuMyAxLjgtLjIuNy0xMy4xIDExNS0xMy4xIDExNWw0MS0uMmguN2w0MSAuMlM3MC4yIDQ0NC45IDcwIDQ0NC4yYy0uMi0uNy0uNS0xLjgtMS4zLTEuOC0uOC0uMS0yLjUgMC0yLjUgMGw0LTM5LjhoLTQuM2w0LjQtMzguN0g2Nmw0LjItMzYuOWgtNGwzLjktMzYuOGgtNC4zbDQuNC0zNy43aC0zLjlsMy43LTM3LjdoLTMuOWwzLjktMzcuOWgtM2w0LjEtMzguN2gtMnYtMS45YzAtMS4xLS45LTItMi0ySDU5di05YzAtMS0xLTItMi0yaC03LjF2LTE2LjloMWMxIDAgMi4xLTEgMi4xLTJzLjktMTYuOS45LTE2LjloLTRWNzAuNmMwLTEtMS4xLTItMi4xLTJINDR2LTJoMS44di0zaDN2LTVsLTUuMS0xLjNWLjhoLTMuOXoiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

var icon4 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTgwIiBoZWlnaHQ9IjQ5MyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMzAuNy40djQwLjhoLTJ2NmgydjIuNWwtMSAzLjVoLTFjLTEgMC0yIDEtMiAydjJoLTFjLS45IDAtMiAxLTIgMnY1LjloLTFjLTEuMSAwLTIuMSAxLTIuMSAydjhoLTFjLTEgMC0yIDEtMiAyVjg2aC0xYy0xIDAtMi4xIDEtMi4xIDJ2MTYuOWgtMi4xYy0xIDAtMiAuOS0yIDJ2MjMuOWgtMmMtMSAwLTIgMS0yIDJ2NDAuN2gtMmMtMSAwLTIgMS0yIDJ2NTEuN2MwIC45LTIuMSAxLjItMi4xIDJ2MjY2LjJsMzEuOCAxaDFsMjguOC0uOWg1Ni4ybDI4LjguOWgxbDMxLjgtMVYyMjkuMmMwLS44LTIuMS0xLjEtMi4xLTJ2LTUxLjdjMC0xLTEtMi0yLTJoLTJ2LTQwLjdjMC0uOS0xLjEtMi0yLjEtMmgtMnYtMjMuOWMwLTEtMS4xLTItMi0yaC0yLjFWODhjMC0xLTEtMi0yLjEtMmgtMXYtOC45YzAtMS0xLTItMi0yaC0xdi04YzAtMS0xLTItMi0yaC0xLjF2LTUuOWMwLTEtMS4xLTItMi0yaC0xdi0yYzAtMS0xLTItMi0yaC0xbC0xLTMuNXYtMi41aDJ2LTZoLTJWLjRoLTMuOHY0MC44aC0ydjZoMnYyLjVsLTEgMy41aC0xYy0xIDAtMiAxLTIgMnYyaC0xYy0uOSAwLTIgMS0yIDJ2NS45aC0xYy0xLjEgMC0yLjEgMS0yLjEgMnY4aC0xYy0xIDAtMiAxLTIgMlY4NmgtMWMtMSAwLTIuMSAxLTIuMSAydjE2LjloLTIuMWMtMSAwLTIgLjktMiAydjIzLjloLTJjLTEgMC0yIDEtMiAydjQwLjdoLTJjLTEgMC0yIDEtMiAydjUxLjdjMCAuOS0yLjEgMS4yLTIuMSAydjczLjVINjV2LTczLjVjMC0uOC0yLjEtMS4xLTIuMS0ydi01MS43YzAtMS0xLTItMi0yaC0ydi00MC43YzAtLjktMS4xLTItMi4xLTJoLTJ2LTIzLjljMC0xLTEuMS0yLTItMmgtMi4xVjg4YzAtMS0xLTItMi4xLTJoLTF2LTguOWMwLTEtMS0yLTItMmgtMXYtOGMwLTEtMS0yLTItMmgtMS4xdi01LjljMC0xLTEuMS0yLTItMmgtMXYtMmMwLTEtMS0yLTItMmgtMWwtMS0zLjV2LTIuNWgydi02aC0yVi40aC0zLjh6TTY1IDMxMy42aDIzLjRsLjEuMUw2NSAzNTkuMXYtNDUuNXptMjYuNyAwaDIzLjZ2NDUuOGwtMjMuNi00NS44em0tMS43IDMuM2wyNS4yIDQ5Ljd2MTA2LjNINjVWMzY2LjJsMjUtNDkuM3oiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

var icon5 = "data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iMTQ0IiBoZWlnaHQ9IjQ4NSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNjkuOS4zdjQwSDY5Yy0uOCAwLTIuMSAxLjEtMi4xIDIuMXYyOC43YzAgMS4xLTEuMi45LTEuMiAyLjF2MjUuOWMwIC45LTEgMS4xLTEgMnY5LjRsLTcuMiAxOS40aC00Yy0xIDAtMi4xIDEtMi4xIDJ2NWgtM2MtMSAwLTIuMSAxLTIuMSAydjI3LjhoLTNjLTEgMC0yLjEuOS0yLjEgMnYzMy44YzAgMS40LTMgMi4xLTMgM3YxNjIuMWgtNWMtMSAwLTIuMSAxLTIuMSAydjM1LjhIMjBjLTEgMC0yLjEgMS0yLjEgMnY1My43SDIuN2MtMSAwLTIgMS0yIDJ2MjQuNWw3MS4xLjdoLjZsNzEuMS0uN3YtMjQuNWMwLTEtMS0yLTItMmgtMTUuMnYtNTMuN2MwLTEtMS0yLTIuMS0yaC0xMS4xdi0zNS44YzAtMS0xLTItMi4xLTJoLTVWMjA1LjVjMC0xLTMuMS0xLjYtMy4xLTN2LTMzLjhjMC0xLTEtMi0yLTJoLTN2LTI3LjhjMC0uOS0xLTItMi4xLTJoLTN2LTVjMC0xLTEtMi0yLTJoLTRsLTcuMi0xOS40di05LjRjMC0uOS0xLTEuMS0xLTJWNzMuMmMwLTEuMi0xLjItMS0xLjItMi4xVjQyLjRjMC0xLTEuMi0yLjEtMi4xLTIuMWgtLjlWLjNoLTQuNXoiIGZpbGw9IiMwMDAwMDAiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvc3ZnPg==";

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0;
chart.defaultState.transitionDuration = 5000;

// Add data
chart.data = [{
  "category": "Physical Progress",
  "height": 82,
  "ratio": 1 / 5.12,
  "icon": icon1
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#ffffff");
categoryAxis.renderer.labels.template.fillOpacity = 1;
categoryAxis.renderer.inside = true;

chart.paddingBottom = 0;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.max = 100;
valueAxis.strictMinMax = true;
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.minLabelPosition = 0.05;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "height";
series.dataFields.categoryX = "category";
series.columns.template.disabled = true;

var bullet = series.bullets.push(new am4charts.Bullet());
bullet.defaultState.properties.opacity = 1;

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

let gradient = new am4core.LinearGradient();
gradient.addColor(am4core.color("#f0b24f"));
gradient.addColor(am4core.color("#ca6c46"));
gradient.addColor(am4core.color("#0c0524"));
gradient.rotation = 90;
chart.background.fill = gradient;
</script>
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

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
gradient1.addColor(am4core.color("#967720"));
gradient1.addColor(am4core.color("#af6c19"));
gradient1.addColor(am4core.color("#08291e"));
gradient1.rotation = 90;
chart1.background.fill = gradient1;
</script>
<script type="text/javascript">
// Themes begin
// Themes end

// Create chart instance
var chart2 = am4core.create("chartdiv2", am4charts.XYChart);

// Add data
chart2.data = [{
  "country": "USA",
  "visits": 2025
}, {
  "country": "China",
  "visits": 1882
}, {
  "country": "Japan",
  "visits": 1809
}, {
  "country": "Germany",
  "visits": 1322
}, {
  "country": "UK",
  "visits": 1122
}];

// Create axes

var categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart2.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
</script>
@endsection
