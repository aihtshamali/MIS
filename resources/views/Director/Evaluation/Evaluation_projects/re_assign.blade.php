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
  <div class="content-wrapper">

    <section class="content">
          <div class="row">
            <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
              <h3 class="box-title"><b> REASSIGN EVALUATION PROJECTS</b></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
      <div class="box-body">
        <table id="example1"  data-page-length="100" class="table table-bordered table-striped compact">
          <thead>
          <tr>
            <th>Project #</th>
            <th style="width:25% !important;">Project Name</th>
            <th>Subsector(s)/Department(s)</th>
            <th>SNE</th>
            <th>Assigned To</th>
            <th>Assigned By</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
              <tr>
                <td>{{ $project->project->project_no }}</td>
                <td>{{ $project->project->title }}</td>
                <td>{{ $project->project->AssignedSubSectors[0]->SubSector->name }}</td>
                <td>{{$project->project->ProjectDetail->sne}}</td>
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
