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

  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Completed Projects</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                        <tr >
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Project Officers</th>
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
                      @foreach ($project->AssignedProjectTeam as $team)
                        {{ $team->User->first_name }} {{ $team->User->last_name }}
                      @endforeach
                      @if(count($project->AssignedProjectTeam) > 1)
                      /
                    @endif
                    </td>
                    <td>
                    {{date('d-m-Y',strtotime($project->created_at))}}
                    </td>
                    <td>
                    {{ date('d-m-Y',strtotime($project->updated_at)) }}
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
