@extends('layouts.uppernav')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
    Reviewed EVALUATION PROJECTS
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">REVIEWED PROJECTS</h3>

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
                        <tr >
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Project Officers</th>
                            <th>Project Priority</th>
                            <th>Project Score</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Comments</th>
                            <th>Progress</th>
                          </tr>
                    </tbody>
                  </table>
                </div>
          </div>

          </div>
        </div>
      </div>


@endsection
