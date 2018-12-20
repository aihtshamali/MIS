@extends('layouts.uppernav')
@section('styletag')
  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
#chartdiv12 {
  width		: 100%;
  height	: 90%;
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
  text-align: center;
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
        SNE Projects

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
                        <div id="chartdiv12"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            @php
              $counter = 0;
            @endphp
            @foreach ($actual_Sneprojects as $value)
              @if (count($value)>0)
                <div class="modal fade in" id="Modal{{ $value[0]->ProjectDetail->sne ?$value[0]->ProjectDetail->sne:"NOT" }}" style="display: block; padding-right: 17px;display:none">
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
                            <table id="example{{ $counter++ }}" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>SR #</th>
                                <th>Project No</th>
                                <th>GS #</th>
                                <th>Name</th>
                                <th>Sector</th>
                                <th>Cost</th>
                                <th>Districts</th>
                                <th>Officer</th>
                                <th>Assigned Date</th>
                                <th>Progress</th>
                              </tr>
                              </thead>
                              <tbody id="tbody">
                                @php
                                  $inner_counter = 1;
                                @endphp
                                @foreach ($value as $project)
                                @if(isset($project->AssignedProject))
                                  @if($project->AssignedProject->complete == 0)
                                  <tr>
                                    <td>{{  $inner_counter++ }}</td>
                                    <td>{{$project->project_no}}</td>
                                    <td style="width:120px">{{$project->financial_year}} / {{$project->ADP}}</td>
                                    <td>{{$project->title}}</td>
                                    <td>
                                      @if (isset($project->AssignedSubSectors))
                                        @foreach ($project->AssignedSubSectors as $sub_sectors)
                                          {{ $sub_sectors->SubSector->name }}
                                        @endforeach
                                      @endif
                                    </td>
                                    @if (isset($project->ProjectDetail))
                                      <td>{{round($project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}}</td>
                                    @else
                                      <td>No Details</td>
                                    @endif
                                    {{-- @if(isset(App\AssignedProject::find($total_project->assigned_project_id))) --}}
                                    <td>
                                      @foreach ($project->AssignedDistricts as $district)
                                        {{  $district->District->name}},
                                      @endforeach
                                    </td>
                                      @if(isset($project->AssignedProject))
                                      <td>
                                        @foreach ($project->AssignedProject->AssignedProjectTeam as $team)
                                          <span @if($team->team_lead == 1) style="color:blue;" @endif>{{ $team->User->first_name }} {{ $team->User->last_name }}</span>
                                        @endforeach

                                      </td>
                                      <td>{{ date('d-M-Y',strtotime($project->AssignedProject->created_at)) }}</td>
                                      <td>
                                          {{round($project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                                      </td>
                                    @else
                                      <td>Not Assigned</td>
                                      <td>Not Assigned</td>
                                      <td>Not Assigned</td>
                                    @endif
                                  </tr>
                                  @endif
                                  @else
                                  <tr>
                                    <td>{{  $inner_counter++ }}</td>
                                    <td>{{$project->project_no}}</td>
                                    <td style="width:120px">{{$project->financial_year}} / {{$project->ADP}}</td>
                                    <td>{{$project->title}}</td>
                                    <td>
                                      @if (isset($project->AssignedSubSectors))
                                        @foreach ($project->AssignedSubSectors as $sub_sectors)
                                          {{ $sub_sectors->SubSector->name }}
                                        @endforeach
                                      @endif
                                    </td>
                                    @if (isset($project->ProjectDetail))
                                      <td>{{round($project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}}</td>
                                    @else
                                      <td>No Details</td>
                                    @endif
                                    {{-- @if(isset(App\AssignedProject::find($total_project->assigned_project_id))) --}}
                                    <td>
                                      @foreach ($project->AssignedDistricts as $district)
                                        {{  $district->District->name}},
                                      @endforeach
                                    </td>
                                      @if(isset($project->AssignedProject))
                                      <td>
                                        @foreach ($project->AssignedProject->AssignedProjectTeam as $team)
                                          <span @if($team->team_lead == 1) style="color:blue;" @endif>{{ $team->User->first_name }} {{ $team->User->last_name }}</span>
                                        @endforeach

                                      </td>
                                      <td>{{ date('d-M-Y',strtotime($project->AssignedProject->created_at)) }}</td>
                                      <td>
                                          {{round($project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                                      </td>
                                    @else
                                      <td>Not Assigned</td>
                                      <td>Not Assigned</td>
                                      <td>Not Assigned</td>
                                    @endif
                                  </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.box-body -->
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
              @endif
            @endforeach

          @php
            $counter = 0;
            $counter2 = 4;
          @endphp
          @foreach ($actual_Sneprojects as $value)
            @if (count($value)>0)
          <div class="modal fade in" id="ModalCOMPLETED{{ $value[0]->ProjectDetail->sne ?$value[0]->ProjectDetail->sne:"NOT" }}" style="display: block; padding-right: 17px;display:none">
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
                                <table id="example{{ $counter2++ }}" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th>SR #</th>
                                    <th>Project No</th>
                                    <th>GS #</th>
                                    <th>Name</th>
                                    <th>Sector</th>
                                    <th>Cost</th>
                                    <th>Districts</th>
                                    <th>Officer</th>
                                    <th>Assigned Date</th>
                                    <th>Progress</th>
                                  </tr>
                                  </thead>
                                  <tbody id="tbody">
                                    @php
                                      $inner_counter = 1;
                                    @endphp
                                    @foreach ($value as $project)
                                      @if($project->AssignedProject && $project->AssignedProject->complete == 1)
                                      <tr>
                                        <td>{{  $inner_counter++ }}</td>
                                        <td>{{$project->project_no}}</td>
                                        <td style="width:120px">{{$project->financial_year}} / {{$project->ADP}}</td>
                                        <td>{{$project->title}}</td>
                                        <td>
                                          @if (isset($project->AssignedSubSectors))
                                            @foreach ($project->AssignedSubSectors as $sub_sectors)
                                              {{ $sub_sectors->SubSector->name }}
                                            @endforeach
                                          @endif
                                        </td>
                                        @if (isset($project->ProjectDetail))
                                          <td>{{round($project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}}</td>
                                        @else
                                          <td>No Details</td>
                                        @endif
                                        <td>
                                          @foreach ($project->AssignedDistricts as $district)
                                            {{  $district->District->name}},
                                          @endforeach
                                        </td>
                                      @if(isset($project->AssignedProject))
                                      <td>
                                        @foreach ($project->AssignedProject->AssignedProjectTeam as $team)
                                          <span @if($team->team_lead == 1) style="color:blue;" @endif>{{ $team->User->first_name }} {{ $team->User->last_name }}</span>
                                        @endforeach
                                      </td>
                                      <td>{{ date('d-M-Y',strtotime($project->AssignedProject->created_at)) }}</td>
                                      <td>
                                            {{round($project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                                          </td>
                                          @else
                                      <td>Not Assigned</td>
                                      <td>Not Assigned</td>
                                      <td>Not Assigned</td>
                                          @endif
                                      </tr>
                                    @endif
                                    @endforeach
                                  </table>
                                </div>
                              </div>
                            </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        @endif
      @endforeach

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
<script type="text/javascript">
$(document).ready(function(){
for (var i = 7; i >= 0; i--) {
  $('#example'+i).DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
}

$('.dt-buttons').addClass('col-md-6')
$('.dataTables_filter').addClass('col-md-6').css('text-align','right');
});
</script>
<script>
var st = [];
  $i = 0;
  Sneprojects.forEach(element => {
    st.push ({
      "category":categories[$i],
      "completed": SneCompletedprojects[$i],
      "inprogress": SneInprogressprojects[$i],
      'total': Sneprojects[$i]
    });
    $i++;
  });

  function inProgressFunction(ev) {
    var data = ev.target.dataItem.categories.categoryX;
    if(data == "NOT SET"){
      $('#ModalNOT').modal('show');
    }
    $('#Modal'+data).modal('show');
    $('#Modal'+data).children().children().children('.modal-header').children('h4.modal-title').text("InProgress "+data+" SNE Projects");
}
  function completedFunction(ev) {
    var data = ev.target.dataItem.categories.categoryX;
    if(data == "NOT SET"){
      $('#ModalNOT').modal('show');
    }
    $('#ModalCOMPLETED'+data).modal('show');
    $('#ModalCOMPLETED'+data).children().children().children('.modal-header').children('h4.modal-title').text("Completed "+data+" SNE Projects");
  }

  // am4core.useTheme(am4themes);
// Themes end

var chart = am4core.create("chartdiv12", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0;

chart.data = st;

chart.colors.step = 2;
chart.padding(30, 30, 10, 30);
chart.legend = new am4charts.Legend();

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.renderer.minWidth = 50;

var series1 = chart.series.push(new am4charts.ColumnSeries());
series1.dataFields.valueY = "inprogress";
series1.dataFields.categoryX = "category";
// series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText =
  "{name} ({total}): {valueY}";
series1.name = "InProgress Projects";
series1.stacked = true;
series1.columns.template.events.on("hit", inProgressFunction, this);

var bullet1 = series1.bullets.push(new am4charts.LabelBullet());
bullet1.label.text = "{valueY}";
bullet1.label.fill = am4core.color("#ffffff");
bullet1.locationY = 0.5;

var series2 = chart.series.push(new am4charts.ColumnSeries());
// series2.columns.template.width = am4core.percent(80);
series2.columns.template.tooltipText =
  "{name} ({total}): {valueY}";
series2.name = "Completed Projects";
series2.dataFields.categoryX = "category";
series2.dataFields.valueY = "completed";
series2.columns.template.events.on("hit", completedFunction, this);
series2.stacked = true;

var bullet2 = series2.bullets.push(new am4charts.LabelBullet());
bullet2.label.text = "{valueY}";
bullet2.locationY = 0.5;
bullet2.label.fill = am4core.color("#ffffff");
     </script>
@endsection
