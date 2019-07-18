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
    ASSIGNED EVALUATION PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">@if(isset($assigned)){{$assigned->count()}}@endif</button>
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

          <div class="box1 box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">ASSIGNED PROJECTS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body1">
                <div class="table-responsive">
                  <table class="table table-hover table-striped" id="tableData">
                        <thead>
                          <th>Project Number</th>
                          <th>Project Name</th>
                          <th>Team Members</th>
                          <th>Priority</th>
                          <th>Score</th>
                          <th>Assigned Duration</th>
                          <th>Progress</th>
                          <th></th>
                          </thead>
                          <tbody>

                            @foreach ($assigned as $assigned)
                              <tr>
                              
                                <td>{{$assigned->project->project_no}}</td>
                                <td>{{$assigned->project->title}}</td>
                                <td>
                                    @foreach ($assigned->AssignedProjectTeam as $team)
                                    @if ($team->team_lead==1)
                                <span style="font-weight:bold;color:red"><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}}  {{$team->user->last_name}}</a> - </span>
                                    @else
                                      <span class=""><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}} {{$team->user->last_name}}</a></span>
                                    @endif
                                  @endforeach

                                </td>
                                <td>
                                  {{ $assigned->project->ProjectDetail->AssigningForum->name }}
                                </td>
                                <td>
                                  {{ round($assigned->project->score,2,PHP_ROUND_HALF_UP) }}
                                </td>

                                <td>
                                  @php
                                    $interval = date_diff(date_create(date('Y-m-d h:i:s',strtotime($assigned->created_at))), date_create(date('Y-m-d h:i:s')))->format('%m Month %d Day %h Hours');
                                    // $duration=$interval->format();
                                  @endphp
                                  {{-- {{$assigned->created_at}} --}}
                                  {{$interval}}
                                  {{-- {{dd($interval)}} --}}
                                  {{-- {{$duration}} --}}
                                </td>
                                <td><div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 20+$assigned->progress; ?>% ">
                                    {{round($assigned->progress, 0, PHP_ROUND_HALF_UP) }}% Complete
                                      </div>

                                    </div></td>
                                    <td>
                                <form action="{{route('stopAssignedProject')}}" method="post" >
                                {{ csrf_field() }}
                                  <button type="button" class="stopBtn btn btn-md btn-danger" rel='popover' data-placement='bottom' data-original-title='Remarks' data-html="true" 
                                  data-content="<input type='hidden' name='assigned_project_id' value='{{$assigned->id}}'>
                                  <input type='text' name='remarks'> <button type='submit' class='btn btn-success'> Save </button>">Stop Project</button>
                                </form>
                              </td>

                              </tr>

                            @endforeach
                          </tbody>
                  </table>
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
    $(document).ready(function(){

      $('.stopBtn').popover();

      $('.stopBtn').on('click', function (e) {
        $('.stopBtn').not(this).popover('hide');
      });
   
    });
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('#tableData').DataTable();
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
