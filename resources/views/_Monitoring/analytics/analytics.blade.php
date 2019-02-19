@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring Dashboard | DGME
@endsection
@section('styleTags')
<style media="screen">
  .mtb{margin: 1% 0% !important;}
  .pdlfrt1{padding: 0% 1% !important;}
  .page-body{background: #fff;box-shadow: 3px 0px 23px #00000040;}
  .mxh3h{max-height: 300px !important;transition: all 900ms ease;
  -webkit-transition: all 900ms ease;cursor: pointer;}
  .mxh3h:hover{box-shadow: 9px 6px 15px #85c5e340; transition:transition: all 900ms ease;
  -webkit-transition: all 900ms ease;}
  #chartdiv{height: 300px !important;}
</style>
@endsection
@section('content')
<div class="row col-md-12 pdlfrt1">
  <div class="col-md-4 pdlfrt1 mtb mxh3h">
    <div class="border col-md-12">
      <a href="{{route('m_chart_one')}}">
          <div id="chartdiv"></div>
      </a>
    </div>
  </div>
  <div class="col-md-4 pdlfrt1 mtb mxh3h mxh3h">
    <div class="border col-md-12">
    <a href="{{route('m_chart_two')}}">Click</a>
    </div>
  </div>
  <div class="col-md-4 pdlfrt1 mtb mxh3h mxh3h">
    <div class="border col-md-12">
        Put AM Charts here...
    </div>
  </div>
  <div class="col-md-4 pdlfrt1 mtb mxh3h">
    <div class="border col-md-12">
        Put AM Charts here...
    </div>
  </div>
  <div class="col-md-4 pdlfrt1 mtb mxh3h">
    <div class="border col-md-12">
        Put AM Charts here...
    </div>
  </div>
  <div class="col-md-4 pdlfrt1 mtb mxh3h">
    <div class="border col-md-12">
        Put AM Charts here...
    </div>
  </div>
</div>
@endsection
@section('js_scripts')
{{-- <script src="{{asset('js/AdminLTE/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/AdminLTE/dataTables.bootstrap.min.js')}}"></script> --}}
<script src="{{asset('js/app.js')}}"></script>
<script>
  let chart = am4core.create("chartdiv", am4charts.XYChart);

  chart.data = [{
    "Type": "Total Projects",
    "value": total_projects
  },
  {
    "Type": "UnAssigned Projects",
    "value": total_projects-inprogress_projects-completed_projects
  },
  {
    "Type": "InProgress Projects",
    "value": inprogress_projects
  },
  {
    "Type": "Completed Projects",
    "value": completed_projects
  }];

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "Type";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "Type";
series.name = "Value";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
</script>
@endsection
