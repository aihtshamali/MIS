@extends('layouts.uppernav')
@section('styletag')
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
    .table>thead>tr>th {
width: 25px !important;
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
              <h2 class="box-title">Completed Projects</h2>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                  <table id="example" class="table table-hover table-striped">
                    <thead>
                        <tr >
                            <th>Project No.</th>
                            <th>Project Title</th>
                            <th>Project Officers</th>
                            <th>SNE</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Score</th>
                            <th>Progress</th>
                          </tr>
                    </thead>

                  <tbody>
                    @foreach ($projects as $project)
                      <tr>
                        <td>{{ $project->project->project_no }}</td>
                      <td>{{ $project->project->title }}</td>
                      <td>
                          @foreach ($project->AssignedProjectTeam as $team)
                          @if ($team->team_lead==1)
                          <span ><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}" style="font-weight:bold;color:red">{{$team->user->first_name}} {{$team->user->last_name}} </a> <br></span>
                          @else
                            <span class=""><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}} {{$team->user->last_name}} <br></a></span>
                          @endif
                         @endforeach
                    </td>
                    <td>{{$project->project->ProjectDetail->sne}}</td>
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
@section('scripttags')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endsection