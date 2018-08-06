@extends('layouts.uppernav')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:10px">
  <!-- Content Header (Page header) -->
    <h3>All Projects</h3>
    <table class="table table-responsive">
      <thead>
        <th>Title</th>
        <th>Project Type</th>
        <th>Created By</th>
        <th>Created At</th>
        {{-- <th>Created Date</th> --}}
        <th>File</th>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          {{-- {{dd($project->project_details)}} --}}
          <tr>
            <td><a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a></td>
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
              <td><a href="{{asset('storage/uploads/projects/'.$project->ProjectDetail->project_attachements)}}" download>File</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
