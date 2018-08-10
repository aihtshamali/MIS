@extends('layouts.uppernav')
@section('styletag')
  <style media="screen">
    .row{
      margin-top: 3%;
    }
  </style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container col-md-12">
    <form class="form" action="{{url('/reset_store')}}" method="post">
      {{ csrf_field() }}
      {{-- <div class="row col-md-8">
        <div class="col-md-4">
          <label>Current Password</label>
        </div>
        <div class="col-md-4">
          <input class="form-control" type="password" name="old_password" placeholder="Enter Current Password" required>
        </div>
      </div> --}}
      <div class="row col-md-8">
        <div class="col-md-4">
          <label>New Password</label>
        </div>
        <div class="col-md-4">
          {{-- <input class="form-control" type="password" name="new_password" placeholder="Enter New Password"> --}}
          <input class="form-control" id="password" type="password" name="password" placeholder="Enter New Password" required>
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="row col-md-8">
        <div class="col-md-4">
          <label>Confirm New Password</label>
        </div>
        <div class="col-md-4">
          <input id="password-confirm" type="password" class="form-control" placeholder="Confirm New Password" name="password_confirmation" required>
        </div>
    </div>
    <div class="row col-md-8">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <input type="submit" class="btn btn-success pull-right" value="Save">
      </div>
    </div>
    </form>

  </div>
</div>
      <!-- /.content-wrapper -->
@endsection
