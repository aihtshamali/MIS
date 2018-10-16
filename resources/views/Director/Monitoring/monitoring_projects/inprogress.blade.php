@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
        INPROGRESS MONITORING PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">0</button>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
          <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
    
        </ol>
      </section>
      <section class="content">
            <div class="row">
                    <div class="col-md-12">
                      <div class="box box-danger">
                        <div class="box-header with-border">
                          <h3 class="box-title">Inprogress Projects</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                                <table class="table table-responsive table-bordered projects">
                                        <thead>
                                        <th>Project No.</th>
                                        <th>Project Name</th>
                                        <th>Assigned To</th>
                                        <th>Priority</th>
                      
                                        <th colspan="1" >Project Priority</th>
                                        <th>Progress</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                </table>
                        </div>
                      </div>
                    </div>
            </div>
      </section>
</div>
@endsection