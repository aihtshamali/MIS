@extends('layouts.uppernav')
@section('styletag')
  <style media="screen">
    .header-content{
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
    }
    .child-right {
      background:green;
      height: 100%;
      width: 50%;
      position: absolute;
      right: 0;
      top: 0;
    }
  </style>
@endsection
@section('content')
<div class="content-wrapper">
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title header-content">Un-assigned Projects</h3>
          <h3 class="box-title header-content">Assigned Projects</h3>
          <h3 class="box-title header-content">Completed Projects</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="/assignproject" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Un-Assigned Projects</label>
                <table class="table table-responsive table-bordered projects">
                  <thead>
                    <th>Project No.</th>
                    <th>Project Name</th>
                    <th>Project Type</th>
                    <th>Created At</th>
                    <th colspan="1" >Project Priority</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                  @foreach($projects as $project)
                    @if($project->status == 0)
                        <tr>
                          <td>{{$project->project_no}}</td>
                          <td>{{$project->title}}</td>
                          <td>{{$project->ProjectType->name}}</td>
                          <td>{{$project->created_at}}</td>
                          <td>
                            <div class="row">
                                <div class="col-md-3 veryHigh">
                                  Very High
                                </div>
                                <div class="col-md-3 high">
                                  High
                                </div>
                                <div class="col-md-3 normal">
                                  Normal
                                </div>
                                <div class="col-md-3 low">
                                  Low
                                </div>
                            </div>
                          </td>
                          <td><input type="submit" name="submit" value="Assign" class="btn btn-info"></td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                </table>
              </div>
            <!-- /.col -->
          </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
          <!-- /.container -->
          </div>
        <div class="row col-sm-6">
            <textarea class="textarea" name="remarks" placeholder="Write Some Remarks Here" style="width: 619px; height: 61px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success pull-right" style="margin-right:20px;">Submit</button>
        </div>
      </form>
        </div>
</div>
</div>
@endsection
@section('scripttags')

<script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()

});
      </script>
@endsection
