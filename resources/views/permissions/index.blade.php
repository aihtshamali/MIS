@extends('layouts.uppernav')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
       
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">View Permissions</h3>
              </div>
        <div class="box-body">
          <div class="table-responsive">
              <table class="table table-hover table-striped">
                <tbody>
                      <tr >
                        <th>Permission Name</th>
                        <th>Description</th>
                       
                        <th>Action</th>
                      </tr>
                      @foreach($permissions as $permission)
                      <tr>
                        <td>{{$permission->name}}</td>
                        <td>
                        @if($permission->description != null)
                        {{$permission->description}}
                        @else
                        NULL
                        @endif
                        </td>
                        <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                          <td>
                            {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="submit" class="btn btn-danger " value="Delete">
                        </td>
                      </form>
                      </tr>
                     
                   @endforeach
                </tbody>
              </table>
            </div>
        </div>
          </div>
      <div class="col-md-3"></div>
      </div>
    </section>
</div>
@endsection

