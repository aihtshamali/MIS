@extends('layouts.uppernav')
@section('content')
<style>
 .table.dataTable td, .table.dataTable th {
         text-align:LEFT !important;
    font-size: 14px !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <section class="content-header">
          <h1>
            Officers List
          </h1>]
        </section> --}}
    
        <section class="content">
    
          <div class="row">
          <div class="col-md-12">
            
            <div class="box box-warning">
              <!-- /.box-header -->
                <div class="box-header with-border">
                  <h3 class="box-title"><b>All Officers</b></h3>
                  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
                </div>
              <div class="box-body">
                <table id="example1"  data-page-length="100" class="table table-bordered table-hover ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Status</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->designation}}</td>
                            <td>{{$user->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
              </div>
            </div>
          </div>
          </div>
        </section>
      </div>
@endsection