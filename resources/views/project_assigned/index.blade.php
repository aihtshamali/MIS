@extends('layouts.uppernav')
@section('styletags')
  <style media="screen">
    /* .header-content{
      padding:10px;
    }
    table.projects th , td{
      text-align: center !important;
    }
    .veryHigh{
      height: 100%;
    }
    .parent {
      overflow: hidden;
      position: relative;
      width: 100%;
    } */
    /* .child-right {
      background:green;
      height: 100%;
      width: 50%;
      position: absolute;
      right: 0;
      top: 0;
    } */
    .priority{
      /* background: #fff; */
   opacity: .4;
   color:black;
   font-weight: bold;
    }
    .table.dataTable td, .table.dataTable th {
         text-align: left !important;
    font-size: 14px !important;
    }
    
  </style>
@endsection
@section('content')
<div class="content-wrapper">
<!-- SELECT2 EXAMPLE -->
 <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><b>UNASSIGNED EVALUATION PROJECTS</b></h3>
               <button class="btn btn-sm btn-success" style="color:white;font-weight:bold font-size:20px;">@if(isset($projects)){{$projects->count()}}@endif</button>
  
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1"  data-page-length="100" class="table table-hover table-bordered compact ">
                    <thead>
                        <tr>
                          <th>Project No.</th>
                          <th style="width:35% !important;">Project Title</th>
                          <th>Project Type</th>
                          <th>Created At</th>
                          <th >Project Priority</th>
                          <th>Project Score</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @foreach($projects as $project)
                        <tr>
                            <form class="" action="{{route('assignproject.create')}}" method="GET">
                                {{ csrf_field() }}
                          <td>{{$project->project_no}}</td>
                          <td><a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a></td>
                          <td>{{$project->ProjectType->name}}</td>
                          <td>{{date('d-M-y',strtotime($project->created_at))}}</td>
                          <td>
                            <input type="hidden" name="priority" value="">
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            {{-- {{dd($project->ProjectDetail)}} --}}
                            @if(isset($project->ProjectDetail))
                              {{ $project->ProjectDetail->AssigningForum->name }}
                            @else
                              No Detail Given
                            @endif
                          </td>
                          <td>{{ round($project->score,2,PHP_ROUND_HALF_UP) }}</td>
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
