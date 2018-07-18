@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Project Assignment</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="/assignproject" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Un-Assigned Projects</label>
                <select class="form-control select2" name="projects[]" multiple="multiple" data-placeholder="Select Project"
                        style="width: 100%;">
                  @foreach($projects as $project)
                    @if($project->status == 0)
                    <option value="{{$project->id}}">{{$project->title}}   &#151;   {{$project->proj_no}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label>Officers</label>
                <select class="form-control select2" name="users"  data-placeholder="Select Officers"
                        style="width: 100%;">
                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}   &#151;   {{$user->email}}</option>
                        @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
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
