@extends('layouts.uppernav')
@section('styletags')
  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
  <style media="screen">
      div.box-body1{
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
      }
      div.box1{
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1)
      }
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
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
   
    {{-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol> --}}
  </section>
{{--  {{dd($officers)}}  --}}
  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><b>ASSIGNED PROJECTS TO OFFICERS </b> </h3>
               <button class="btn btn-sm btn-success" style="color:white;font-weight:bold font-size:20px;">@if(isset($assigned)){{$assigned->count()}}@endif</button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
                {{-- Chat --}}
                {{-- EndChat --}}
                <div class="">
                  <table id="example1" data-page-length="100"  class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Project #</th>
                            <th style="width:25% !important;">Project Title</th>
                            <th>Project Officers</th>
                            <th>Priority</th>
                            <th>Project Score</th>
                            <th>Assigned Date</th>
                            <th>Progress</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($assigned as $project)
                              <tr>
                                <td>{{$project->project->project_no}}</td>
                                <td>{{$project->project->title}}</td>
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
                                <td>
                                  {{ $project->Project->ProjectDetail->AssigningForum->name }}
                                </td>
                                <td>
                                  {{ round($project->Project->score,2,PHP_ROUND_HALF_UP) }}
                                </td>
                                <td>  {{date('d-M-y',strtotime($project->created_at))}}</td>

                                <td>
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 10+ $project->progress;?>% ">
                                      {{round($project->progress, 0, PHP_ROUND_HALF_UP) }}% Complete
                                        </div>

                                      </div></td>
                              </tr>
                            @endforeach
                          </tbody>
                  </table>
                </div>

          </div>
        </div>
      </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            {{--  Chart 1  --}}
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><b>ASSIGNED PROJECTS TO DIRECTORS</b></h3> <button class="btn btn-sm btn-success" style="color:white;font-weight:bold font-size:20px;">@if(isset($managerProjects)){{$managerProjects->count()}}@endif</button>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>

                </div>
              </div>
              <div class="box-body">
                  <div class="table">
                    <table id="example2" data-page-length="100"  class="table table-hover table-bordered compact table-striped">
                        <thead>
                          <tr>
                              <th>Project #</th>
                          <th style="width:30% !important;">Project Title</th>
                          <th>Assigned To</th>
                          <th>Priority</th>
                          <th>Assigned Date</th>
                          <th>Assigned Officer</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($managerProjects as $project)
                              <tr>
                                <td>{{$project->project->project_no}}</td>
                                <td>{{$project->project->title}}</td>
                                <td>
                                  <span class="">{{$project->user->first_name}} {{$project->user->last_name}}</span>
                                </td>
                                <td>
                                  @if ($project->priority==3)
                                    High
                                  @elseif ($project->priority==2)
                                    Normal
                                  @else
                                    Low
                                  @endif
                                </td>
                                <td>{{date('d-M-y',strtotime($project->created_at))}}</td>
                                <td>
                                   <ul>
                                     @if(isset($project->Project->AssignedProject->AssignedProjectTeam) && $project->Project->AssignedProject->AssignedProjectTeam!=null)
                                          @foreach ($project->Project->AssignedProject->AssignedProjectTeam as $team)
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
                                      @else
                                      <b><span style="color:red;">Not Assigned  </span></b>
                                      @endif
                                      </ul>
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
