@extends('layouts.uppernav')
@section('styletag')
  <style media="screen">
      
       ul{
         padding-left: 0px !important;
      }
      ul>li{
        list-style-type: none;
       
      }
       .table.dataTable td, .table.dataTable th {
         text-align:LEFT !important;
    font-size: 14px !important;
    }
     
  </style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  
{{--  {{dd($officers)}}  --}}
  <section class="content">
      {{--  sekect consulatants  --}}
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>ASSIGNED PROJECTS</b></h3>
              <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;">@if(isset($assigned)){{$assigned->count()}}@endif</button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
                <div class="table-responsive">
                  <table  data-page-length="50" class="table table-striped table-bordered compact" id="example1">
                        <thead>
                          <th>Project #</th>
                          <th  style="width:25% !important;">Project Name</th>
                          <th>Team Members</th>
                          <th>SNE</th>
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
                                <span ><a style="font-weight:bold;color:red" href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}}  {{$team->user->last_name}}</a> <br></span>
                                    @else
                                      <span class=""><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}} {{$team->user->last_name}}</a> <br></span>
                                    @endif
                                  @endforeach

                                </td>
                                <td>
                                  {{ $assigned->project->ProjectDetail->AssigningForum->name }}
                                </td>
                                <td>
                                  {{ round($assigned->project->score,2,PHP_ROUND_HALF_UP) }}
                                </td>
                                <td>{{$assigned->project->ProjectDetail->sne}}</td>
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
