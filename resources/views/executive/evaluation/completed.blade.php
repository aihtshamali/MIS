@extends('layouts.uppernav')
@section('styletags')
  <style>
   ul{
         padding-left: 0px !important;
      }
      ul>li{
        list-style-type: none;
       
      }
      .table.dataTable td, .table.dataTable th {
         text-align: left !important;
    font-size: 14px !important;
    }
  </style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    {{-- <h1>
    COMPLETED EVALUATION PROJECTS
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
     
    </ol> --}}
  </section>

  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><b>COMPLETED EVALUATION PROJECTS</b></h3>
               <button class="btn btn-sm btn-success" style="color:white;font-weight:bold font-size:20px;">@if(isset($completed)){{$completed->count()}}@endif</button>
  
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1"  data-page-length="100" class="table table-hover table-bordered compact table-striped">
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
                    @foreach ($completed as $project)
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
                     <div class="progress">
                                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 10+ $project->progress;?>% ">
                                      {{round($project->progress, 0, PHP_ROUND_HALF_UP) }}% Complete
                                        </div>

                                      </div> 
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
  </section>


@endsection
