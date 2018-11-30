@extends('layouts.uppernav')
@section('styletag')

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
        Total Project's Progress

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
              {{-- {{ dump(count($value)) }} --}}
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
                                <div class="box-header">
                                  <h3 class="box-title">Projects</h3>
                                </div>
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
                                      <th>Progress</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                      @php
                                        $inner_counter = 1;
                                      @endphp
                                      @foreach ($value as $project)
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
                                        {{-- @else
                                          <td>Not Assigned</td>
                                        @endif --}}
                                          <td>
                                            {{-- @if(isset(App\AssignedProject::find($total_project->assigned_project_id))) --}}
                                            @foreach ($project->AssignedProject->AssignedProjectTeam as $team)
                                              <span @if($team->team_lead == 1) style="color:blue;" @endif>{{ $team->User->first_name }} {{ $team->User->last_name }}</span>
                                            @endforeach
                                          {{-- @endif --}}
                                          </td>
                                          <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                                  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 20+$project->AssignedProject->progress; ?>% ">
                                                {{round($project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}% Complete
                                                  </div>
                                                </div></td>
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

<script type="text/javascript">
$(document).ready(function(){
for (var i = 4; i >= 0; i--) {
  $('#example'+i).DataTable()
}
});
</script>

<script type="text/javascript">
$(document).on('click','g.amcharts-graph-column',function(){
  var data=$(this).attr('aria-label').split(' ')[1];
  console.log(data);
    $('#Modal'+data).modal('show');
});
</script>

<script>
var st = [];
  $i = 0;
  // $count=0;
  Sneprojects.forEach(element => {
    st.push ({
      "Name":categories[$i],
      "Number of Projects": Sneprojects[$i]
    });
    $i++;
  });
  var chart = AmCharts.makeChart( "chartdiv12", {
  "type": "serial",
  "theme": "light",
  "dataProvider":st,
  "valueAxes": [ {
    "title" : "Number of Projects",
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "labelText": "[[value]]",
    "valueField": "Number of Projects"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "Name",
  "categoryAxis": {
    "title" : "SNE Categories",
    "autoGridCount": false,
    "equalSpacing": true,
    "gridCount": 1000,
    "gridPosition": "middle",
    "gridAlpha": 0,
    "tickPosition": "middle",
    "tickLength": 5,
    "labelRotation":30,
    // "ignoreAxisWidth": true,
    "autoWrap": true
  },
  "export": {
    "enabled": true
  }

} );
     </script>
@endsection
