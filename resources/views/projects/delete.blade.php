@extends('layouts.uppernav')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:10px">
  <!-- Content Header (Page header) -->
    <h3>Monitoring Projects</h3>
    <table class="table table-responsive">
      <thead>
        <th style="width:40% !important;">Title</th>
        <th>Project Type</th>
        <th>Created By</th>
        <th>Created At</th>
        {{-- <th>Created Date</th> --}}
        <th>File</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach ($monitoring_projects as $project)
          {{-- {{dd($project->project_details)}} --}}
          <tr>
            <td>
            <a href="{{route('projects.show',$project->id)}}">Delete: {{$project->title}}</a>
        </td>
            @if (isset($project->ProjectType))
              <td>{{$project->ProjectType->name}}</td>
            @endif
            {{-- @if (isset($project->user))
              <td>{{$project->user->first_name}}</td> --}}
            {{-- @else --}}
              {{-- <td>Unassigned</td> --}}
            {{-- @endif --}}
              {{-- <td>{{$project->getUser($project->created_by)->name}}</td> --}}
              <td>{{$project->user->username}}</td>
              <td>{{$project->created_at}}</td>

              <td>
                @if(isset($project->ProjectDetail->project_attachements))
                <a href="{{asset('storage/uploads/projects/'.$project->ProjectDetail->project_attachements)}}" download>File</a>
              @endif
              </td>
              <td>
                  
            <form action="{{route('admin_projects_destroy',$project->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" >
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="DELETE">
            </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <h3>Evaluation Projects(Not Tested Yet)</h3>
    <table class="table table-responsive">
      <thead>
        <th style="width:40% !important;">Title</th>
        <th>Project Type</th>
        <th>Created By</th>
        <th>Created At</th>
        {{-- <th>Created Date</th> --}}
        <th>File</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          {{-- {{dd($project->project_details)}} --}}
          <tr>
            <td>
            <a href="{{route('projects.show',$project->id)}}">Delete: {{$project->title}}</a>
        </td>
            @if (isset($project->ProjectType))
              <td>{{$project->ProjectType->name}}</td>
            @endif
            {{-- @if (isset($project->user))
              <td>{{$project->user->first_name}}</td> --}}
            {{-- @else --}}
              {{-- <td>Unassigned</td> --}}
            {{-- @endif --}}
              {{-- <td>{{$project->getUser($project->created_by)->name}}</td> --}}
              <td>{{$project->user->username}}</td>
              <td>{{$project->created_at}}</td>

              <td>
                @if(isset($project->ProjectDetail->project_attachements))
                <a href="{{asset('storage/uploads/projects/'.$project->ProjectDetail->project_attachements)}}" download>File</a>
              @endif
              </td>
              <td>
                  
            <form action="{{route('admin_projects_destroy',$project->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" >
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="DELETE">
            </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
