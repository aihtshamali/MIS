@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<style media="screen">
    .pcoded .pcoded-navbar .pcoded-item{width: 100% !important;}
        .header-content{
          padding:10px;
        }
        table.projects th , td{
          text-align: center !important;
        }
        .veryHigh{
          height: 100%;
        }
        .parent {
          overflow: hidden;
          position: relative;
          width: 100%;
        }
        .priority{
          /* background: #fff; */
       opacity: .4;
       color:black;
       font-weight: bold;
        }
        .child-right {
          background:green;
          height: 100%;
          width: 50%;
          position: absolute;
          right: 0;
          top: 0;
        }

      </style>
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card z-depth-5">
        <div class="card-header"> <h4><b>Inprogress Monitoring Projects</b></h4></div>
        <div class="card-block">
                <div class="card-block">
                        <div class="dt-responsive table-responsive">
                                <table id="simpletable"
                                class="table table-bordered table-stripped nowrap">
                            <thead>
                            <tr>
                                <th>Project #</th>
                                <th>Project Name</th>
                                <th>Assigned To</th>
                                 <th>Project Score</th>
                               <th>Assigning Forum</th>
                                <th>Project Type</th>
                                {{-- <th>Action</th> --}}
                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->Project->project_no}}</td>
                                    <td>{{$project->Project->title}}</td>
                                    <td>
                                        @foreach ($project->AssignedProjectTeam as $team)
                                        {{$project}}
                                        @if ($team->team_lead==1)
                                            <span style="font-weight:bold;color:blue">{{$team->User->first_name}}  {{$team->User->last_name}} -</span>
                                        @else
                                            <span class="">{{$team->User->first_name}} {{$team->User->last_name}}</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{round($project->Project->score,2,PHP_ROUND_HALF_UP) }}</td>
                                    <td>{{ $project->Project->ProjectDetail->AssigningForum->name }}</td>
                                     <td>{{$project->Project->ProjectType->name}}</td>
                                </tr>
                              @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>   
        </div>
        <div class="card-footer"></div>
    </div>
</div>
</div>
@endsection
@section('js_scripts')
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
@endsection