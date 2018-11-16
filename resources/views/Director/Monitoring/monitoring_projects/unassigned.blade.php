@extends('layouts.uppernav')
@section('styletag')
  <style media="screen">
      div.box-body1{
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
      }
      div.box1{
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1)
      }
  </style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
    UNASSIGNED MONITORING PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">@if(isset($assigned)){{$assigned->count()}}@endif</button>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>
{{--  {{dd($officers)}}  --}}
  <section class="content">
      {{--  select consulatants  --}}
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Search Projects</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form" action="#" method="get">
                {{ csrf_field() }}

              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label >Select Project</label>
                  <select class="form-control select2" name="project_id" style="width: 100%;">
                    <option selected="selected" value="" >Select A Project</option>
                    {{-- @foreach($projects as $project)
                      <option value="{{ $project->Project->id }}">{{ $project->Project->title }}</option>
                    @endforeach --}}
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"  style="margin-top:10px">
                  <label>Select Sector</label>
                  <select class="form-control select2" name="sector_id" style="width: 100%;">
                    <option selected="selected" value="" >Select A Sector</option>
                    {{-- @foreach($sectors as $sector)
                      <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach --}}
                  </select>
                </div>
              </div>
              <div class="row" style="margin-top:10px">

                  <div class="col-md-3"></div>
                  <div class="col-md-3">
                    <label for="">Starting Cost in Million</label>
                    <input class="form-control" type="number" name="starting_cost" value="">
                  </div>
                  <div class="col-md-3">
                    <label for="">Ending Cost in Million</label>
                    <input class="form-control" type="number" name="ending_cost" value="">
                  </div>

            </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-6">
                  <button  class="btn btn-success pull-right btn-sm"  style="margin-top:10px"   type="submit" name="button">Search</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                          @include('inc.msgs')
                          <div class="form-group">
                          <label>Un-Assigned Projects</label>

                          <table class="table table-responsive table-bordered projects">
                          <thead>
                          <th>Project No.</th>
                          <th>Project Name</th>
                          <th>Assigned By</th>
                          <th>Priority</th>
                          <th>Project Type</th>

                          <th colspan="1" >Project Priority</th>
                          <th>Action</th>
                          </thead>
                          <tbody>
                          {{-- {{dd($projects)}}/ --}}
                          {{-- @foreach($p as $project) --}}

                          <tr>
                          <form class="" action="{{route('DPM_AssignToConsultant')}}" method="GET">
                          {{ csrf_field() }}
                          <td>-----</td>
                          <td>-----<a href="#"></a></td>
                          <td>*******</td>
                          {{-- @if($project->priority == 3) --}}
                          <td>*****</td>
                          {{-- @elseif($project->priority == 2) --}}
                          {{-- <td>Normal Priority</td> --}}
                          {{-- @else --}}
                          {{-- <td>Low Priority</td> --}}
                          {{-- @endif --}}
                          <td></td>

                          <td>
                          {{-- <input type="hidden" name="priority" value="">
                          <input type="hidden" name="project_id" value="{{$project->project_id}}"> --}}
                          <button type="button" class="btn btn-sm priority" style="background-color:red; ">High Priority</button>
                          <button type="button"  class="btn btn-sm priority"style="background-color:green; ">Normal Priority</button>
                          <button type="button" class="btn btn-sm priority" style="background-color:yellow; ">Low Priority</button>

                          </td>
                          <td><input type="submit" name="submit" value="Assign" class="btn btn-info"></td>
                          </form>
                          </tr>
                          {{-- @endforeach --}}
                          </tbody>
                          </table>

                       </div>
                    <!-- /.col -->
                  </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                  <!-- /.container -->
                  </div>
              </form>
                </div>
        </div>

          </div>
        </div>
      </div>


@endsection
@section('scripttags')

  <script type="text/javascript" src="{!! asset('js/AdminLTE/moment.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/AdminLTE/moment.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/AdminLTE/daterangepicker.js') !!}"></script>
  <script type="text/javascript">

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
  //
  // $('#daterange-btn').daterangepicker(
  //   {
  //     ranges   : {
  //       'Today'       : [moment(), moment()],
  //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
  //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
  //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //     },
  //     startDate: moment().subtract(29, 'days'),
  //     endDate  : moment()
  //   },
  //   function (start, end) {
  //     // $('#daterange-btn').parent().append('<input type="hidden" valu')
  //     $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  //   }
  // );

  </script>


  @endsection
