@extends('layouts.uppernav')
@section('styletags')
  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">


@endsection
@section('content')
  <div class="content-wrapper">

    <section class="content">
          <div class="row">
            <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Project #</th>
            <th>Project Name</th>
            <th>Department</th>
            <th>Assigned To</th>
            <th>Assigned By</th>
            <th>ReAssign</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
              <tr>
                <td>{{ $project->project->project_no }}</td>
                <td>{{ $project->project->title }}</td>
                <td>{{ $project->project->AssignedSubSectors[0]->SubSector->name }}</td>
                <td>
                  @foreach ($project->AssignedProjectTeam as $team)
                    @if ($team->team_lead==1)
                      <span style="font-weight:bold;color:blue">{{$team->user->first_name}}  {{$team->user->last_name}} -</span>
                    @else
                      <span class="">{{$team->user->first_name}} {{$team->user->last_name}}</span>
                    @endif
                  @endforeach
                </td>
                <td>{{ $project->User->first_name }} {{ $project->User->last_name }}</td>
                <form class="" action="{{route('create_from_director')}}" method="get">
                  {{ csrf_field() }}
                  <input type="hidden" name="reAssign" value="1">
                  <input type="hidden" name="project_id" value="{{  $project->project->id}}">
                  <input type="hidden" name="priority" value="{{  $project->priority}}">
                <td><button class="btn btn-primary" type="submit">Re Assign</button></td>
              </form>
              </tr>
            @endforeach


          </tbody>
          <tfoot>
          <tr>
            <th>Project #</th>
            <th>Project Name</th>
            <th>Department</th>
            <th>Assigned To</th>
            <th>Assigned By</th>
            <th>ReAssign</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
</section>
</div>
@endsection
@section('scripttags')
  <script src="{!! asset('js/AdminLTE/jquery.dataTables.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/AdminLTE/dataTables.bootstrap.min.js') !!}"></script>
  <script type="text/javascript">
  $(function () {
      $('#example1').DataTable();
    });
    </script>
@endsection
