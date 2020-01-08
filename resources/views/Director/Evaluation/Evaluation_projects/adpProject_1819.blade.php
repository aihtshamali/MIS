@extends('layouts.uppernav')
@section('styletags')
  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
  <style>
   ul{
         padding-left: 0px !important;
      }
      ul>li{
        list-style-type: none;

      }
       .table.dataTable td, .table.dataTable th {
         text-align:center !important;
    font-size: 13px !important;
    vertical-align: middle !important;
    }
    hr{
      margin-top: 5px !important;
margin-bottom: 5px !important;
    }
  </style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><b>2018-2019 PROJECTS</b></h3>
              <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">@if(isset($projects)){{$projects->count()}}@endif</button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" data-page-length="100" class="table compact table-bordered ">
                    <thead>
                        <tr >
                            <th>Project #</th>
                            <th>ADP</th>
                            <th style="width:15% !important; " >Project Name</th>
                            <th>Project Officers</th>
                            <th>SNE</th>
                            <th >Subsectors</th>
                            <th>Planned Gestation Period</th>
                            <th>Progress</th>
                          </tr>
                    </thead>

                  <tbody>
                    @foreach ($projects as $project)
                      <tr>
                        <td>{{ $project->project->project_no }}</td>
                          <td>{{ $project->project->ADP }}/{{ $project->project->financial_year }}</td>
                      <td style="text-align:left !important;">{{ $project->project->title }}</td>
                      <td>
                     <ul>
                        @foreach ($project->AssignedProjectTeam as $team)
                        @if ($team->team_lead==1)
                        <li>
                          <span ><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}" style="font-weight:bold; color:red">{{$team->user->first_name}}  {{$team->user->last_name}}</a></span>
                        </li>
                        @else
                        <li>
                          <span class=""><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}} {{$team->user->last_name}}</a></span>
                        </li>
                        @endif
                      @endforeach
                      </ul>
                    </td>
                    <td>{{$project->project->ProjectDetail->sne}}</td>
                    <td>
                      <span class="">
                           @foreach ($project->project->AssignedSubSectors as $item)
                         <b>{{$item->SubSector->sector->name}}</b>
                         @endforeach
                      </span>
                     <hr>
                     <ul>
                       @foreach ($project->project->AssignedSubSectors as $item)
                           <li>{{$item->SubSector->name}}</li>
                       @endforeach
                     </ul>
                    </td>
                    <td class="text-center">
                      Start Date : <b>{{date('d-M-y',strtotime($project->project->ProjectDetail->planned_start_date))}}</b> <br>
                      End Date : <b>{{date('d-M-y',strtotime($project->project->ProjectDetail->planned_end_date))}}</b> <br>
                      @php
                        $interval = date_diff( date_create(date('d-M-y h:i:s',strtotime($project->project->ProjectDetail->planned_start_date))),
                        date_create(date('d-M-y h:i:s',strtotime($project->project->ProjectDetail->planned_end_date))))->format('%y Year %m Month %d Day %h Hours');
                      @endphp
                      {{$interval}}
                    </td>

                    <td>
                      {{ round($project->progress,2,PHP_ROUND_HALF_UP) }}
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                </div>
            </div>

          </div>
        </div>
      </div>


@endsection
