@extends('_Monitoring.layouts.upperNavigation')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4><b>PC-1 of Projects</b> <b style="background:red;color:white">&nbsp;{{ $projects->count() }} &nbsp;</b></h4></div>
            <div class="card-block">
                    <div class="dt-responsive table-responsive">
                            <table id="simpletable"
                            class="table table-bordered table-stripped nowrap">
                        <thead>
                        <tr>
                            <th>SR #</th>
                            <th>Project Name</th>
                            <th>Sector</th>
                            <th>Cost</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                          @php
                            $counter = 1;
                          @endphp
                          @foreach ($projects as $project)
                            <tr>
                              <td>{{  $counter++ }}</td>
                              <td>{{$project->title}}</td>
                              <td>
                              @foreach ($project->AssignedSubSectors as $sub)
                                  {{$sub->SubSector->Sector->name}}
                              @endforeach
                              </td>
                              <td>
                                {{-- {{dd($project->ProjectDe)}} --}}
                                {{$project->ProjectDetail->orignal_cost}}
                              </td>
                              <td>
                                <a href="{{route('projects.show',$project->id)}}" class="btn btn-sm btn-info">View Project</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-header"></div>
        </div>
    </div>
</div>
@endsection
