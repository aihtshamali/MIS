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
    <a href="{{route('m_chart_two')}}">
          <div id="chartdiv2"></div>
    </a>
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

{{-- //CHART TWO --}}
<script>
  function loadDataTable(){
    // $('table.officer_projects').DataTable({
    //   dom: 'Bfrtip',
    //       buttons: [
    //           'copy', 'csv', 'excel', 'pdf', 'print'
    //       ]
    // });
    // $('.dt-buttons').addClass('col-md-6')
    // $('.dataTables_filter').addClass('col-md-6').css('text-align','right');
  }

let chart2 = am4core.create("chartdiv2", am4charts.XYChart);

var st = [];
        $i = 0;
        officers.forEach(element => {
          st.push ({
            "Name":element.first_name +" "+element.last_name,
            "userid":element.id,
            "Team Member": assigned_projects[$i],
            "Team Lead" : team_lead[$i],
            "Team Member": assigned_projects[$i],
            "Individual Projects" : individual_projects[$i]
          });
          $i++;
        });

// Add data
chart2.data = st;

// Create axes
let categoryAxis2 = chart2.xAxes.push(new am4charts.CategoryAxis());
categoryAxis2.dataFields.category = "Name";
categoryAxis2.renderer.grid.template.location = 0;
categoryAxis2.renderer.minGridDistance = 30;
// Label
var label = categoryAxis.renderer.labels.template;
label.wrap = false;
label.maxWidth = 50;
label.verticalCenter = "middle";

// Rotation
categoryAxis2.renderer.labels.template.rotation=45;

let valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());
valueAxis2.renderer.inside = true;
valueAxis2.renderer.labels.template.disabled = true;
valueAxis2.min = 0;


// Modal
// var temp=new Vue({
//        el: '.modal-body',
//        data: {
//          officer_projects:[],
//          officer_name:''
//        },
//        methods: {
//         fillModal(data,name){
           
//            this.officer_projects=data
//            this.officer_name=name
//            loadDataTable()      
//          }
//        },
//      })

// Create series
function createSeries(field, name,color="#67b7dc") {

  // Set up series
  let series = chart2.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "Name";
  series.sequencedInterpolation = true;

  // Make it stacked
  series.stacked = true;

  // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

  // Color
  series.columns.template.fill = am4core.color(color); // fill

  // Add label
  let labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.label.text = "{valueY}";
  labelBullet.locationY = 0.5;

  

  // OnCLick EVENT
  series.columns.template.events.on("hit", function(ev) {
    var name=ev.target.dataItem._dataContext.Name;
    axios.get('{{route("getOfficerProjects")}}',{
      params: {
        'user':ev.target.dataItem._dataContext.userid,
        '_token':"{{csrf_token()}}",
        'status': series.name.replace(" ","").replace("Projects","")
      }
    })
    .then((response) => {
      var projects=response.data;
      temp.fillModal(projects,name)
      $("#OfficerProjectModal").modal('show');
    })
    .catch(function (error) {
      console.log(error);
    });
  }, this);
  return series;
}

var series1=createSeries("Team Lead", "Team Lead","#0062b7");
var series2=createSeries("Team Member", "Team Member","#929eaa");
createSeries("Individual Projects", "Individual Projects","#00a65a");

// Legend
// chart2.legend = new am4charts.Legend();
</script>
@endsection
