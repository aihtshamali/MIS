@extends('layouts.uppernav')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
    ASSIGNED MONITORING PROJECTS
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>
{{--  {{dd($officers)}}  --}}
  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">ASSIGNED PROJECTS - OFFICERS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
            <div class="box-body">
                {{-- Chat --}}
                {{-- EndChat --}}
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                   
                        <thead>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Project Officers</th>
                            <th>Priority</th>
                            <th>Assigned Date</th>
                            <th>Progress</th>
                          </thead>
                          <tbody>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  @endsection
