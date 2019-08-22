@extends('layouts.uppernav')
@section('styletags')
  <style media="screen">
    .priority{
      /* background: #fff; */
   opacity: .4;
   color:black;
   font-weight: bold;
    }
    .table.dataTable td, .table.dataTable th {
         text-align:justify !important;
    font-size: 14px !important;
    }
  </style>
@endsection
@section('content')
<div class="content-wrapper">

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning">
             <div class="box-header with-border">
              <h3 class="box-title"><b>UNASSIGNED PROJECTS</b></h3> <button class="btn btn-sm btn-success" style="color:white;font-weight:bold font-size:20px;">@if(isset($projects)){{$projects->count()}}@endif</button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" data-page-length="50" class="table table-hover table-bordered table-striped">
                    <thead>
                       <tr>
                        <th>Project No.</th>
                       <th style="width:35% !important;">Project Title</th>
                        <th>Assigned By</th>
                        <th>Priority</th>
                        <th>Project Score</th>
                        <th>Project Type</th>
                        <th colspan="1" >Project Priority</th>
                        <th>Action</th>
                       </tr>
                     </thead>
                      <tbody>
                          @foreach($projects as $project)
                                <tr>
                                    <form class="" action="{{route('create_from_director')}}" method="GET">
                                        {{ csrf_field() }}
                                  <td>{{$project->Project->project_no}}</td>
                                  <td><a href="{{route('projects.show',$project->project_id)}}">{{$project->Project->title}}</a></td>
                                  <td>{{$project->AssignedBy($project->assigned_by)->first_name}} </td>
                                  <td>{{ $project->Project->ProjectDetail->AssigningForum->name }}</td>
                                  <td>{{ round($project->Project->score,2,PHP_ROUND_HALF_UP) }}</td>
                                  <td>{{$project->Project->ProjectType->name}}</td>
                                    <input type="hidden" name="inheritPriority" value="{{$project->priority}}">
                                  <td>
                                    <input type="hidden" name="priority" value="">
                                    <input type="hidden" name="project_id" value="{{$project->project_id}}">
                                    {{ $project->Project->ProjectDetail->AssigningForum->name }}
                                  </td>
                                  {{-- <td>{{ $project->Project->score }}</td> --}}
                                  <td><input type="submit" name="submit" value="Assign" class="btn btn-info"></td>
                                  </form>
                                </tr>
                          @endforeach
                      </tbody>
                  </table>
               </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection
@section('scripttags')
<script>
    $('.priority').on('click',function(){
      $('.priority').css('opacity','0.4');
      $('input[name="priority"]').val($(this).text().toLowerCase().replace(' ','_'));
      $(this).css('opacity','unset').css('color','black');
    });
</script>
@endsection
