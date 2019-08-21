@extends('layouts.uppernav')
@section('styletag')
<style>
   ul{
         padding-left: 0px !important;
      }
      ul>li{
        list-style-type: none;
       
      }
     
</style>
@endsection
@section('content')
<div class="content-wrapper">
<!-- Content Wrapper. Contains page content -->

<section class="content">
    <div class="row">
      <div class="col-md-12" >
        <div class="box box-warning ">
            <div class="box-header with-border">
              <h4 class="box-title"><b>STOPPED PROJECTS</b></h4>
            </div>
            <div class="box-body">
              <table id="example1" data-page-length="50" class="table table-striped table-bordered compact " style="width:100%;">
                <thead>
                  <tr>
                    <th >Project No</th>
                    <th  style="width:20% !important;">Name</th>
                    <th >Remarks</th>
                    <th>SNE</th>
                    <th>Stopped By</th>
                    <th>Stopped Date</th>
                    <th>Re Assign</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($stoppedProjects as $stoppedProject)
                      
                  <tr>
                    <td>{{$stoppedProject->AssignedProject->Project->project_no}}</td>
                    <td>{{$stoppedProject->AssignedProject->Project->title}}</td>
                    <td>{{$stoppedProject->remarks}}</td>
                    <td>{{$stoppedProject->AssignedProject->Project->ProjectDetail->sne}}</td>
                    <td>{{$stoppedProject->User->first_name}} {{$stoppedProject->User->last_name}}</td>
                    <td>{{date('d-M-Y',strtotime($stoppedProject->created_at))}}</td>
                    <td>
                      <form class="" action="{{route('create_from_director')}}" method="get">
                          {{ csrf_field() }}
                          <input type="hidden" name="reAssign" value="1">
                          <input type="hidden" name="project_id" value="{{$stoppedProject->AssignedProject->Project->id}}">
                          <input type="hidden" name="priority" value="{{$stoppedProject->AssignedProject->priority}}">
                        <button class="btn btn-primary" type="submit">Re Assign</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
            </div>
      </div>
      </div>
    </div>
</section>
</div>
@endsection
