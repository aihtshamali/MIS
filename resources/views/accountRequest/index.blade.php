@extends('layouts.uppernav')

@section('content')
<div class="content-wrapper">
<div class="row">
    @foreach($users as $user)
    <div class="col-md-4" style="padding:40px">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow">
          <div class="widget-user-image">
            <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
          </div>
          <!-- /.widget-user-image -->
          <h3 class="widget-user-username">{{$user->name}}</h3>
        <h5 class="widget-user-desc">{{$user->email}}</h5>
        </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li>
                <select class="form-control select2" value="">
                <option name="" id="" class="bg-red">InActive</option>
                <option name="" id="" class="bg-green">Active</option>
                </select>
            </li>
            <li><a href="#">Created At<span class="pull-right badge bg-aqua btn">{{$user->created_at}}</span></a></li>
            <li><a href="#" class="btn">Submit</a></li>
            {{-- <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
            {{-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> --}}
          </ul>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    <!-- /.col -->
    @endforeach
</div>
@endsection
