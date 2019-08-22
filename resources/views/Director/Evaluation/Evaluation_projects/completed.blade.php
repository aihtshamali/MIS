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
         text-align:LEFT !important;
    font-size: 14px !important;
    }
  </style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  

  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><b>COMPLETED PROJECTS</b></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" data-page-length="50" class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr >
                            <th>Project #</th>
                            <th style="width:25% !important;">Project Name</th>
                            <th>Project Officers</th>
                            <th>SNE</th>
                            <th style="width:15% !important;">Subsectors</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Score</th>
                            <th>Progress</th>
                          </tr>
                    </thead>

                  <tbody>
                    @foreach ($projects as $project)
                      <tr @if($project->progress < 100) style="background:red;color:white" @endif>
                        <td>{{ $project->project->project_no }}</td>
                      <td>{{ $project->project->title }}</td>
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
                        <ul>
                        @foreach ($project->project->AssignedSubSectors as $item)
                              <li>{{$item->SubSector->name}}</li> 
                        @endforeach
                        </ul>
                    </td>
                    <td>
                    {{date('d-M-y',strtotime($project->created_at))}}
                    </td>
                    <td>
                    {{ date('d-M-y',strtotime($project->updated_at)) }}
                    </td>
                    <td>
                      {{ round($project->project->score,2,PHP_ROUND_HALF_UP) }}
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
