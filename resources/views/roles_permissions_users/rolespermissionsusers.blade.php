@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Roles And Permissions</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="/rolesandpermissions" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Roles</label>
                <select class="form-control select2" name="roles[]" multiple="multiple" data-placeholder="Select Roles"
                        style="width: 100%;">
                  @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label>Permissions</label>
                <select class="form-control select2" name="permissions[]" multiple="multiple" data-placeholder="Select Permissions"
                        style="width: 100%;">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <button type="submit" class="btn btn-success pull-right" style="margin-right:20px;">Submit</button>
        </div>
      </form>
        </div>
</div>
<br>
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Users And Roles</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="/usersandroles" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label>Users</label>

                <select class="form-control select2" name="users[]" multiple="multiple" data-placeholder="Select Users"
                        style="width: 100%;">

                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Roles</label>
              <select class="form-control select2" name="roles[]" multiple="multiple" data-placeholder="Select Roles"
                      style="width: 100%;">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          <!-- /.col -->
        </div>
          <!-- /.row -->
          <button type="submit" class="btn btn-success pull-right" style="margin-right:20px;">Submit</button>
        </div>
      </form>
        </div>
</div>
<br>
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Users And Permissions</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="/usersandpermissions" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label>Users</label>
                <select class="form-control select2" name="users[]" multiple="multiple" data-placeholder="Select Users"
                        style="width: 100%;">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label>Permissions</label>
                <select class="form-control select2" name="permissions[]" multiple="multiple" data-placeholder="Select Permissions"
                        style="width: 100%;">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endforeach
                </select>
              </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
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
