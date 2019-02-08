@extends('layouts.uppernav')
@section('styletag')
<link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
    #chartdiv2 {
  width		: 100%;
  height	: 90%;
  font-size: 5px;
  }
  tspan{
  font-size	: 15px;
  }
  .card{
  /* width:250px; */
  background:white;
  margin: 0px;
  border-radius: 5px;
  height: 100%;
  -webkit-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  -moz-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  }
  .card-header{
  height:10%;
  text-align: left;
  font-weight: bold;
  padding: 10px;
  text-decoration: underline;
  }
  .lightblue{
    font-size: 0px;
    background-color: #0D8ECF;
    padding: 9px;
    margin: 2px;
    color:#0D8ECF;
  }
  .blue{
    font-size: 0px;
    background-color:#0D52D1;
    padding: 9px;
    margin: 2px;
    color:#0D52D1;
  }
  .darkblue{
    font-size: 0px;
    background-color:#2A0CD0;
    padding: 9px;
    margin: 2px;
    color:#2A0CD0;
  }
  .purple{
    color:#8A0CCF;
    font-size: 0px;
    background-color:#8A0CCF;
    padding: 9px;
    margin: 2px;

  }

  a{
  color: black;
  }

  .card:hover{
  /* width:357px; */
  background:white;
  margin: 0px;
  border-radius: 5px;
  height: 100%;
  -webkit-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  -moz-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  }

</style>

@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          Assigned Projects

        </h1>
        <ol class="breadcrumb">
        <li><a href="{{route('Exec_pems_tab')}}"><i class="fa fa-backward" ></i>Back</a></li>
          {{-- <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li> --}}
        </ol>
    </section>

    <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="card col-md-12" >
                        <div class="card-header">

                        </div>
                        <div id="chartdiv2"></div>

                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            <div class="modal fade in" id="OfficerProjectModal" style="display: block; padding-right: 17px;display:none">
              <div class="modal-dialog" style="width:90%">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Projects</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-bordered table-striped officer_projects">
                          <thead>
                          <tr>
                            <th>SR #</th>
                            <th>Project No</th>
                            <th>GS #</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>Officer</th>
                            <th>Assigned Date</th>
                            <th>Progress</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(officer_project,index) in officer_projects">
                              <td>
                                @{{index+1}}
                              </td>
                              <td>@{{officer_project.project_no}}</td>
                              <td>@{{officer_project.financial_year}} / @{{officer_project.ADP}}</td>
                              <td>@{{officer_project.title}}</td>
                              <td>@{{officer_project.orignal_cost}} Million</td>
                              <td>@{{officer_name}}</td>
                              <td>@{{officer_project.assigned_date}}</td>
                              <td>@{{officer_project.progress}}%</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                              <!-- /.box -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
    </section>

</div>
@endsection
@section('scripttags')
<script src="{{asset('js/AdminLTE/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/AdminLTE/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/charts/amcharts.js')}}"></script>
<script src="{{asset('js/charts/serial.js')}}"></script>
<script src="{{asset('js/charts/fabric.min.js')}}"></script>
<script src="{{asset('js/charts/FileSaver.min.js')}}"></script>
<script src="{{asset('js/charts/jszip.min.js')}}"></script>
<script src="{{asset('js/charts/pdfmake.min.js')}}"></script>
<script src="{{asset('js/charts/export.min.js')}}"></script>
<script src="{{asset('js/charts/dark.js')}}"></script>
<script src="{{asset('js/charts/black.js')}}"></script>
<script src="{{asset('js/charts/chalk.js')}}"></script>
<script src="{{asset('js/charts/light.js')}}"></script>
<script src="{{asset('js/charts/patterns.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>



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

let chart = am4core.create("chartdiv2", am4charts.XYChart);

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
chart.data = st;

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "Name";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
// Label
var label = categoryAxis.renderer.labels.template;
label.wrap = false;
label.maxWidth = 50;
label.verticalCenter = "middle";

// Rotation
categoryAxis.renderer.labels.template.rotation=90;

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;


// Modal
var temp=new Vue({
       el: '.modal-body',
       data: {
         officer_projects:[],
         officer_name:''
       },
       methods: {
        fillModal(data,name){
           
           this.officer_projects=data
           this.officer_name=name
           loadDataTable()      
         }
       },
     })

// Create series
function createSeries(field, name,color="#67b7dc") {

  // Set up series
  let series = chart.series.push(new am4charts.ColumnSeries());
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
chart.legend = new am4charts.Legend();
</script>




<script type="text/javascript">
$(document).on('click','g.amcharts-graph-column',function(){
  var data=$(this).attr('aria-label').replace(/[\s+,\.+]/g, '');
  console.log(data);
    $('#Modal'+data).modal('show');
});
</script>
@endsection
