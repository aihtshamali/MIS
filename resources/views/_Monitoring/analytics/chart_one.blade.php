@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring Dashboard | DGME
@endsection
@section('styleTags')
<style media="screen">
  .mtb{margin: 1% 0% !important;}
  .pdlfrt1{padding: 0% 1% !important;}
</style>
@endsection
@section('content')
<div class="row col-md-12 pdlfrt1">
  <div class="col-md-12 pdlfrt1 mtb">
    <div class="border col-md-12">
          <div id="chartdiv"></div>
          <div class="card-footer">
            <div style="padding:5px;display:inline-block;">
            <span class="lightblue">-</span>
            <label style="vertical-align:-webkit-baseline-middle;">{{$total_projects}} Total Projects</label>
        </div>
        <div style="padding:5px; display:inline-block;">
            <span class="dark-grey">-</span>
            <label style="vertical-align:-webkit-baseline-middle;">{{$total_projects-$inprogress_projects-$completed_projects}} Total Un-Assigned Projects</label>
        </div>
        <div style="padding:5px; display:inline-block;">
                <span class="darkblue">-</span>
                <label style="vertical-align:-webkit-baseline-middle;">{{$inprogress_projects}} Total InProgress Projects</label>
            </div>
        <div style="padding:5px; display:inline-block;">
                <span class="purple">-</span>
                <label style="vertical-align:-webkit-baseline-middle;">{{$completed_projects}} Completed Projects</label>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('js_scripts')
{{-- {{-- <script src="{{asset('js/app.js')}}"></script> --}}
<script>
  am4core.useTheme(am4themes);
  // am4core.useTheme(am4themes_animated);
  let chart = am4core.create("chartdiv", am4charts.XYChart);

  chart.data = [{
    "Type": "Total Projects",
    "value": total_projects,
    // "color": "#6600ff"
  },
  {
    "Type": "UnAssigned Projects",
    "value": total_projects-inprogress_projects-completed_projects,
    // "color": "#0099e6"
  },
  {
    "Type": "InProgress Projects",
    "value": inprogress_projects,
    // "color": "#4dc3ff"
  },
  {
    "Type": "Completed Projects",
    "value": completed_projects,
    // "color": "#40bf80"
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

chart.colors.list = [
  am4core.color("#845EC2"),
  am4core.color("#D65DB1"),
  am4core.color("#FF6F91"),
  am4core.color("#FF9671"),
];

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "Type";
series.name = "Value";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

// var valueLabel = series.bullets.push(new am4charts.LabelBullet());
// valueLabel.label.text = "{categoryX}: {valueY}[/]";
// valueLabel.label.fontSize = 15;
// valueLabel.label.verticalCenter = "bottom";

// var columnTemplate = series.columns.template;
// columnTemplate.strokeWidth = 2;
// columnTemplate.strokeOpacity = 1;
</script>
@endsection
