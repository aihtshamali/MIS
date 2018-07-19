@extends('layouts.uppernav')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      PROJECT EVALUATION MANAGEMENT SYSTEM
     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
     
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {{--  Chart 1  --}}
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Select Consultants</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
                <div class="table-responsive">
                    
                        <table class="table table-hover table-striped">
                          <tbody>
                          <tr>
                              <th>Select</th>
                              <th>Sector</th>>
                              <th>Officer Name</th>
                              <th>Designation</th>
                              <th>Work Load</th>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td >IT</td>
                            {{--  <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>  --}}
                            <td ><a href="#">Aymun Saif</a></td>
                            <td ><a href="#">Software Consultant</a></a></td>
                            <td > 
                                <button class="btn btn-md " style="background-color:salmon; color:black;">E | 25%</button>
                                <button  class="btn btn-md "style="background-color:mediumorchid; color:black;">M | 25%</button>
                                <button class="btn btn-md " style="background-color:skyblue; color:black;">TPVs | 15%</button>
                                <button class="btn btn-md " style="background-color:lightgreen; color:black;">I | 5%</button>
                                <button class="btn btn-md "style="background-color:tan; color:black;">SA| 35%</button>
                                <buttom  class="btn btn-md "style="background-color:yellow; color:black;">O | 15%</button>
                            </td>
                            
                            
                          </tr>
                          </tbody>
                        </table>
                </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
@endsection