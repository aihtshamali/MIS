@extends('layouts.uppernav')
@section('styletag')
  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
    #chartdiv {
  width		: 100%;
  height		: 80%;
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
  height:5%;
  text-align: center;
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
  .dark-grey{
    font-size: 0px;
    background-color:#5c5c5c;
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
  .orange{
    color:#e08e0b;
    font-size: 0px;
    background-color:#e08e0b;
    padding: 9px;
    margin: 2px;
  }
  .card-footer{
  height:15%;

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
            Evaluation Total Projects

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
                        <label for=""></label>
                        </div>
                        <div id="chartdiv"></div>
                        <div class="card-footer" >
                          <div style="padding:5px;display:inline-block;">
                            <span class="lightblue">-</span>
                            <label style="vertical-align:-webkit-baseline-middle;">{{count($total_projects)}} Total Projects</label>
                        </div>
                        <div style="padding:5px; display:inline-block;">
                            <span class="dark-grey">-</span>
                            <label style="vertical-align:-webkit-baseline-middle;">{{$total_assigned_projects}} Total Un-Assigned Projects</label>
                        </div>
                        <div style="padding:5px; display:inline-block;">
                                <span class="darkblue">-</span>
                                <label style="vertical-align:-webkit-baseline-middle;">{{$inprogress_projects}} Total InProgress Projects</label>
                            </div>
                        <div style="padding:5px; display:inline-block;">
                                <span class="purple">-</span>
                                <label style="vertical-align:-webkit-baseline-middle;">{{$completed_projects}} Completed Projects</label>
                            </div>
                            <div style="padding:5px; display:inline-block;">
                                <span class="orange">-</span>
                                <label style="vertical-align:-webkit-baseline-middle;">{{$stopped_projects}} Stopped Projects</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            <!-- Modal -->
        <div class="modal fade in" id="myModal" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Projects</h4>
              </div>
              <div class="modal-body">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Total Projects</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>SR #</th>
                                  <th>Project No</th>
                                  <th>GS #</th>
                                  <th>Name</th>
                                  <th>Sector</th>
                                  <th>Cost</th>
                                  <th>Status</th>
                                  <th>Officer</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                  @php
                                    $counter = 1;
                                  @endphp
                                  @foreach ($total_projects as $total_project)
                                    <tr>
                                      <td>{{  $counter++ }}</td>
                                      <td>{{$total_project->project_no}}</td>
                                      <td style="width:120px">{{$total_project->financial_year}} / {{$total_project->ADP}}</td>
                                      <td>{{$total_project->title}}</td>
                                      <td>
                                      @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                        {{ $sub_sectors->SubSector->name }}
                                      @endforeach
                                      <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}}</td>
                                      </td>
                                      @if($total_project->AssignedProject)
                                      @if ($total_project->AssignedProject->complete == 0)
                                        <td>InProgress</td>
                                      @else
                                        <td>Completed</td>
                                      @endif
                                    @else
                                      <td>Not Assigned</td>
                                    @endif
                                      <td>
                                        @if($total_project->AssignedProject)
                                        @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                          {{ $team->User->first_name }} {{ $team->User->last_name }}
                                        @endforeach
                                      @endif
                                      </td>
                                    </tr>
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

        <div class="modal fade in" id="myModal1" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Projects</h4>
              </div>
              <div class="modal-body">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">UnAssigned Projects</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>SR #</th>
                                  <th>Project No</th>
                                  <th>GS #</th>
                                  <th>Name</th>
                                  <th>Sector</th>
                                  <th>Cost</th>
                                  <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                  @php
                                    $counter = 1;
                                  @endphp
                                  @foreach ($actual_total_assigned_projects as $total_project)
                                    <tr>
                                      <td>{{  $counter++ }}</td>
                                      <td>{{$total_project->project_no}}</td>
                                      <td style="width:120px">{{$total_project->financial_year}} / {{$total_project->ADP}}</td>
                                      <td>{{$total_project->title}}</td>
                                      <td>
                                      @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                        {{ $sub_sectors->SubSector->name }}
                                      @endforeach
                                      </td>
                                      <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}}</td>
                                      @if($total_project->AssignedProject)
                                      @if ($total_project->AssignedProject->complete == 0)
                                        <td>InProgress</td>
                                      @else
                                        <td>Completed</td>
                                      @endif
                                    @else
                                      <td>Not Assigned</td>
                                    @endif
                                    </tr>
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

        <div class="modal fade in" id="myModal2" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Projects</h4>
              </div>
              <div class="modal-body">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">InProgress Projects</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>SR #</th>
                                  <th>Project No</th>
                                  <th>GS #</th>
                                  <th>Name</th>
                                  <th>Sector</th>
                                  <th>SNE</th>
                                  <th>Officer</th>
                                  <th>Progress</th>
                                  <th>Duration</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                  @php
                                    $counter = 1;
                                  @endphp
                                  @foreach ($total_projects as $total_project)
                                    @if($total_project->AssignedProject && $total_project->AssignedProject->complete == 0)
                                    <tr>
                                      <td>{{  $counter++ }}</td>
                                      <td>{{$total_project->project_no}}</td>
                                      <td style="width:120px">{{$total_project->financial_year}} / {{$total_project->ADP}}</td>
                                      <td>{{$total_project->title}}</td>
                                      <td>
                                      @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                        {{ $sub_sectors->SubSector->name }}
                                      @endforeach
                                      </td>
                                      <td>{{$total_project->ProjectDetail->sne}}</td>
                                      <td>
                                        @if($total_project->AssignedProject)
                                        @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                          {{ $team->User->first_name }} {{ $team->User->last_name }}
                                        @endforeach
                                      @endif
                                      </td>
                                      <td>
                                          {{round($total_project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                                      </td>
                                      <td>
                                        @php
                                        $first_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->created_at)));
                                        $current_date = new DateTime(date('Y-m-d'));
                                        $difference = $current_date->diff($first_date);
                                        echo $difference->format('%m months %d days');
                                        @endphp
                                      </td>
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

        <div class="modal fade in" id="myModal3" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Projects</h4>
              </div>
              <div class="modal-body">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Completed Projects</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>SR #</th>
                                  <th>Project No</th>
                                  <th>GS #</th>
                                  <th>Name</th>
                                  <th>Sector</th>
                                  <th>SNE</th>
                                  <th>Officer</th>
                                  <th>Duration</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                  @php
                                    $counter = 1;
                                  @endphp
                                  @foreach ($total_projects as $total_project)
                                    @if($total_project->AssignedProject && $total_project->AssignedProject->complete == 1)
                                    <tr>
                                      <td>{{  $counter++ }}</td>
                                      <td>{{$total_project->project_no}}</td>
                                      <td style="width:120px">{{$total_project->financial_year}} / {{$total_project->ADP}}</td>
                                      <td>{{$total_project->title}}</td>
                                      <td>
                                      @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                        {{ $sub_sectors->SubSector->name }}
                                      @endforeach
                                      </td>
                                      <td>{{$total_project->ProjectDetail->sne}}</td>
                                      <td>
                                        @if($total_project->AssignedProject)
                                        @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                          {{ $team->User->first_name }} {{ $team->User->last_name }}
                                        @endforeach
                                      @endif
                                      </td>
                                      <td>
                                        @php
                                        $first_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->created_at)));
                                        $current_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->completion_date)));
                                        $difference = $current_date->diff($first_date);
                                        echo $difference->format('%m months %d days');
                                        @endphp
                                      </td>
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
        <div class="modal fade in" id="myModal4" style="display: block; padding-right: 17px;display:none">
            <div class="modal-dialog" style="width:90%">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Projects</h4>
                </div>
                <div class="modal-body">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Stopped Projects</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                <table id="example2" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th>SR #</th>
                                    <th>Project No</th>
                                    <th>GS #</th>
                                    <th>Name</th>
                                    <th>Sector</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                  </tr>
                                  </thead>
                                  <tbody id="tbody">
                                    @php
                                      $counter = 1;
                                    @endphp
                                    @foreach ($total_projects as $stopped_total_project)
                                    @if($stopped_total_project->AssignedProject && $stopped_total_project->AssignedProject->stopped == true)
                                      <tr>
                                        <td>{{  $counter++ }}</td>
                                        <td>{{$stopped_total_project->project_no}}</td>
                                        <td style="width:120px">{{$stopped_total_project->financial_year}} / {{$stopped_total_project->ADP}}</td>
                                        <td>{{$stopped_total_project->title}}</td>
                                        <td>
                                        @foreach ($stopped_total_project->AssignedSubSectors as $sub_sectors)
                                          {{ $sub_sectors->SubSector->name }}
                                        @endforeach
                                        </td>
                                        <td>{{round($stopped_total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}}</td>
                                        @if($stopped_total_project->AssignedProject)
                                        @if($stopped_total_project->AssignedProject->stopped!=null)
                                          <td>Stopped</td>
                                        @elseif ($stopped_total_project->AssignedProject->complete == 0)
                                          <td>InProgress</td>
                                        @elseif($stopped_total_project->AssignedProject->complete == 1)
                                          <td>Completed</td>
                                        @endif
                                      @else
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

<script>
$('#example1').DataTable()
$('#example2').DataTable()
$('#example3').DataTable()
$('#example4').DataTable()



    var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider": [ {
      "Type": "Total\nProjects\n({{count($total_projects)}})",
      "Number of Projects": total_projects/total_projects*100 ,
      "color": "#0D8ECF",

    }, {
      "Type": "UnAssigned\nProjects\n({{$total_assigned_projects}})",
      "Number of Projects": (total_assigned_projects/total_projects*100).toFixed(2) < 1 && (total_assigned_projects/total_projects*100).toFixed(2) > 0 ? 1 : (total_assigned_projects/total_projects*100).toFixed(2),
      "color": "#333"
    }, {
      "Type": "Inprogress\nProjects\n({{$inprogress_projects}})",
      "Number of Projects": (inprogress_projects/total_projects*100).toFixed(2) < 1 && (inprogress_projects/total_projects*100).toFixed(2) > 0 ? 1 : (inprogress_projects/total_projects*100).toFixed(2),
      "color": "#2A0CD0"
    }, {
      "Type": "Completed\nProjects\n({{$completed_projects}})",
      "Number of Projects": (completed_projects/total_projects*100).toFixed(2) < 1 && (completed_projects/total_projects*100).toFixed(2) > 0 ? 1 : (completed_projects/total_projects*100).toFixed(2),
      "color": "#8A0CCF"
    },
    {
      "Type": "Stopped\nProjects\n({{$stopped_projects}})",
      "Number of Projects": (stopped_projects/total_projects*100).toFixed(2) < 1 && (stopped_projects/total_projects*100).toFixed(2) > 0 ? 1 : (stopped_projects/total_projects*100).toFixed(2),
      "color": "#e08e0b"
    } 
     ],
    "valueAxes": [ {
      "title" : "Percentage",
      "gridColor": "#FFFFFF",
      "gridAlpha": 0.2,
      "dashLength": 0
    } ],
    "gridAboveGraphs": true,
    "startDuration": 1,
    "graphs": [ {
      "balloonText": "[[category]]: <b>[[value]] %</b>",
      "fillAlphas": 0.8,
      "lineAlpha": 0.2,
      "type": "column",
      "labelText": "[[value]] % , [[category]]",
      "fillColorsField": "color",
      "valueField": "Number of Projects"
    } ],
    "chartCursor": {
      "categoryBalloonEnabled": false,
      "cursorAlpha": 0,
      "zoomable": false
    },
    "categoryField": "Type",
    "categoryAxis": {
      "title" : "Project Categories",
      "gridPosition": "middle",
      "gridAlpha": 0,
      "tickPosition": "middle",
      "tickLength": 5,
    //   "labelRotation":30,
      // "ignoreAxisWidth": true,
      "autoWrap": false
    },
    "export": {
      "enabled": true
    }
  } );
</script>
<script type="text/javascript">
$(document).on('click','g',function(){
  var data=$(this).attr('aria-label').split('\n')[0];  
  if(data === " Total")
    $('#myModal').modal('show');
  else if(data === " UnAssigned")
    $('#myModal1').modal('show');
  else if(data === " Inprogress")
    $('#myModal2').modal('show');
  else if(data === " Completed")
    $('#myModal3').modal('show');
    else if(data === " Stopped")
    $('#myModal4').modal('show');

});
</script>
@endsection
