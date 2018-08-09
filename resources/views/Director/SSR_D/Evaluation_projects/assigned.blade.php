@extends('layouts.uppernav')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
    ASSIGNED EVALUATION PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">@if(isset($assigned)){{$assigned->count()}}@endif</button>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>
{{--  {{dd($officers)}}  --}}
  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">ASSIGNED PROJECTS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <tbody>
                        <thead>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Team Members</th>
                            <th>Priority</th>
                            <th>Assigned Duration</th>
                            <th>Progress</th>
                            <th>Comments</th>
                          </thead>
                          <tbody>
                            @foreach ($assigned as $assigned)
                              <tr>
                                <td>{{$assigned->project->project_no}}</td>
                                <td>{{$assigned->project->title}}</td>
                                <td>
                                    @foreach ($assigned->AssignedProjectTeam as $team)
                                    @if ($team->team_lead==1)
                                      <span style="font-weight:bold;color:blue">{{$team->user->first_name}}  {{$team->user->last_name}} -</span>
                                    @else
                                      <span class="">{{$team->user->first_name}} {{$team->user->last_name}}</span>
                                    @endif
                                  @endforeach

                                </td>
                                <td>
                                    @if ($assigned->priority==3)
                                    High
                                  @elseif ($assigned->priority==2)
                                    Normal
                                  @else
                                    Low
                                  @endif

                                </td>

                                <td>
                                  @php
                                    $interval = date_diff(date_create(date('Y-m-d h:i:s',strtotime($assigned->created_at))), date_create(date('Y-m-d h:i:s')))->format('%m Month %d Day %h Hours');
                                    // $duration=$interval->format();
                                  @endphp
                                  {{-- {{$assigned->created_at}} --}}
                                  {{$interval}}
                                  {{-- {{dd($interval)}} --}}
                                  {{-- {{$duration}} --}}
                                </td>
                                <td>{{$assigned->progress}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                    </tbody>
                  </table>
                </div>
          </div>

          </div>
        </div>
      </div>


@endsection
