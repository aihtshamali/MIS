@extends('layouts.uppernav')
@section('styletag')
<style>
 .content
  {
    background-color: #fff !important;
  }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content col-md-12" style="padding:70px">
    <h1 style="margin-bottom:50px!important">
    STOPPED EVALUATION PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">{{$stoppedProjects->count()}}</button>
    </h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%;">
      <thead>
        <tr>
          <th>Project No</th>
          <th>Name</th>
          <th>Remarks</th>
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
          <td>{{$stoppedProject->User->first_name}} {{$stoppedProject->User->last_name}}</td>
          <td>{{date('Y-m-d H:i:s',strtotime($stoppedProject->created_at))}}</td>
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

@endsection
@section('scripttags')
{{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> --}}
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endsection