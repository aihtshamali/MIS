@extends('layouts.uppernav')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
    ASSIGNED EVALUATION PROJECTS
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
                            <th>Project Officers</th>
                            <th>Priority</th>
                            <th>Assigned Date</th>
                            <th>Progress</th>
                          </thead>
                          <tbody>
                            @foreach ($projects as $project)
                              <tr>
                                <td>{{$project->project->project_no}}</td>
                                <td>{{$project->project->title}}</td>
                                <td>
                                  @foreach ($project->AssignedProjectTeam as $team)
                                    @if ($team->team_lead==1)
                                      <span style="color:green">{{$team->user->first_name}}</span>
                                    @else
                                      <span class="">{{$team->user->first_name}}</span>
                                    @endif
                                  @endforeach
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
                                <td>{{$project->created_at}}</td>
                                <td>{{$project->progress}}%</td>
                              </tr>
                            @endforeach
                          </tbody>
                    </tbody>
                  </table>
                <h3 class="box-title">ASSIGNED PROJECTS</h3>
                  <table class="table table-hover table-striped">
                    <tbody>
                        <thead>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Assigned To</th>
                            <th>Priority</th>
                            <th>Assigned Date</th>
                          </thead>
                          <tbody>

                  @foreach ($managerProjects as $project)
                    <tr>
                      <td>{{$project->project->project_no}}</td>
                      <td>{{$project->project->title}}</td>
                      <td>
                        <span class="">{{$project->user->first_name}}</span>
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
                      <td>{{$project->created_at}}</td>
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
