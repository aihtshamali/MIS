@extends('layouts.uppernav')
@section('styletag')
  <style media="screen">
      div.box-body1{
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
      }
      div.box1{
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1)
      }
      .table>thead>tr>th {
  width: 25px !important;
}

  </style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
      <div class="row ">
      <div class="col-md-12" style="padding:70px">
          <div class="box box-warning">
              <div class="box-header with-border">
                  <h4>
                      STOPPED EVALUATION PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">@if(isset($stoppedProjects)){{$stoppedProjects->count()}}@endif</button>
                    </h4>
              </div>
              <div class="box-body1">
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
      </div>
      </div>
  </section>
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