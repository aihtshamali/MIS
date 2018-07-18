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
        <th>Assigned To</th>
        <th>Created By</th>
        <th>Created Date</th>
        <th>File</th>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          <tr>
            <td><a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a></td>
            @if (isset($project->ProjectType->project_type_name))
              <td>{{$project->ProjectType->project_type_name}}</td>
            @endif
            @if (isset($project->user))
              <td>{{$project->user->name}}</td>
            @else
              <td>Unassigned</td>
            @endif
              <td>{{$project->getUser($project->created_by)->name}}</td>
              <td>{{$project->created_at}}</td>
              <td><a href="{{asset('storage/uploads/projects/'.$project->attachments)}}" download>Excel File</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
