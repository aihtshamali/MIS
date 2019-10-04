@extends('layouts.uppernav')
@section('content')
<style>
   .table.dataTable td, .table.dataTable th {
         text-align:LEFT !important;
    font-size: 14px !important;
    vertical-align:middle !important;
    }
     ul{
         padding-left: 0px !important;
           margin-bottom: 0px !important;
      }
      ul>li{
        list-style-type: none;
      
      }
        hr{
          margin-top: 8px !important;
    margin-bottom: 2px !important ;
    border-top: 1px solid #ccc !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:10px">
  <!-- Content Header (Page header) -->
    <div class="box box-primary">
    <div class="box-header">
    <h3>Evaluation Projects</h3>
    <hr>
    </div>
    <div class="box-body">
    <table id="example1"   data-page-length="100" class="table table-hovered table-bordered compact">
      <thead>
        <th>Project #</th>
        <th style="width:28% !important;" >Title</th>
        <th style="width:10% !important;">Project Type</th>
        <th>SNE</th>
        <th style="width:17% !important;" >Department</th>
        <th style="width:15% !important;">Created By & At</th>
        <th>File</th>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          {{-- {{dd($project->project_details)}} --}}
          <tr>
          <td>{{$project->project_no}}</td>
            <td><a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a></td>
            @if (isset($project->ProjectType))
              <td>{{$project->ProjectType->name}}</td>
            @endif
              <td>{{$project->ProjectDetail->sne}}</td>
               <td> 
                 <span class="">
                    @foreach ($project->AssignedSubSectors as $item)
                  <b>{{$item->SubSector->sector->name}}</b>
                  @endforeach
                </span>
                <hr>
                <ul>
                  @foreach ($project->AssignedSubSectors as $item)
                      <li>{{$item->SubSector->name}}</li> 
                  @endforeach
                </ul>
              </td>
              <td> {{$project->user->first_name}} {{$project->user->last_name}} <br> {{date('d-M-y | h:i:s A',strtotime($project->created_at))}}   </td>
             
              <td>
                @if(isset($project->ProjectDetail->project_attachements))
                <a href="{{asset('storage/uploads/projects/'.$project->ProjectDetail->project_attachements)}}" download>File</a>
              @endif
              </td>

          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    </div>
</div>
@endsection
