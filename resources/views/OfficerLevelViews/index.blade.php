-@extends('layouts.uppernav')
@section('styletag')
<style media="screen">
  .InProgressProjects{
    display:none;
  }
  .CompletedProjects{
    display:none;
  }
  .content-header
    {
      font-size: 27px !important;
      font-weight: 200 !important;
    }
  .floatRight
    {
      float: right !important;
      margin-left: 12px !important;
      margin-top: 2% !important;
    }
  .nav>li>a{padding: 10px 27px !important}
</style>
@endsection
@section('content')
  <div class="content-wrapper">
      <section class="content-header">
          {{$user->first_name}} {{$user->last_name}}
      </section>
      <div class="col-md-6">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#" class="topnav" data-id="newAssignments" >New Assignments<span class="label label-primary floatRight">{{$NewAssignedprojects->count()}}</span></a></li>
          <li><a href="#" class="topnav" data-id="InProgressProjects">In Progress<span class="label label-primary floatRight">{{$inProgressProjects->count()}}</span></a></li>
          <li><a href="#" class="topnav" data-id="CompletedProjects">Completed<span class="label label-primary floatRight">{{$CompletedProjects->count()}}</span></a></li>
        </ul>
      </div>
      <section class="content">
      <div class="row">
        <div class="col-md-12 col-xs-12"></div>
        <div class="col-md-12 col-xs-12">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
              </div>
              <div class="box-body">
               <div class="row">
                <div class="col-md-12 col-xs-12">

                    <div class="table-responsive">
                      {{-- New Assignment Table --}}
                      <table class="table table-hover newAssignments table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;">Project Number</th>
                            <th style="text-align:center;">Project Name</th>
                            <th style="text-align:center;">Assigned By</th>
                            <th style="text-align:center;">Priority</th>
                            <th style="text-align:center;">Score</th>
                            <th style="text-align:center;">Action</th>
                          </tr>
                        </thead>
                        <tbody style="text-align:center;">
                          @foreach($NewAssignedprojects as $o)
                          <tr>
                            <td> {{$o->project->project_no}} </td>
                            <td>{{$o->project->title}}  </td>
                            @if(($o->getassignedperson($o->assigned_by))->hasRole("directorevaluation"))
                            <td><span style="background-color:#E8971E; padding:5px; margin:px; color:white; font-weight:bold">{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</span></td>
                            @elseif(($o->getassignedperson($o->assigned_by))->hasRole("directormonitoring"))
                            <td><span style="background-color:#7906A1; padding:5px; margin:px; color:white; font-weight:bold">{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</span></td>
                            @elseif(($o->getassignedperson($o->assigned_by))->hasRole("manager"))
                            <td><span style="background-color:#B20013; padding:5px; margin:px; color:white; font-weight:bold">{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</span></td>
                            @endif
                            <td>
                              {{ $o->project->ProjectDetail->AssigningForum->name }}
                            </td>
                            <td>{{ round($o->project->score,2,PHP_ROUND_HALF_UP) }}</td>
                              <input type="hidden" name="id" value="{{$o->id}}">
                              <td><a href=""><button class="btn btn-success" disabled>Review</button></a> </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{-- In Progress Table --}}
                      <table class="table table-hover InProgressProjects table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;">Project Number</th>
                            <th style="text-align:center;">Project Name</th>
                            <th style="text-align:center;">Assigned By</th>
                            <th style="text-align:center;">Priority</th>
                            <th style="text-align:center;">Score</th>
                            <th style="text-align:center;">Duration</th>
                            <th style="text-align:center;">SNE</th>
                            <th style="text-align:center;">Progress</th>
                            <th style="text-align:center;">Action</th>
                          </tr>
                        </thead>
                        <tbody style="text-align:center;">
                          @foreach($inProgressProjects as $o)
                            <tr>
                              <td> {{$o->Project->project_no}} </td>
                              <td><a href="{{route('ViewAsOfficerActivities',['project_id'=> $o->project_id,'user_id'=> $user->id])}}">{{$o->project->title}}</a> </td>
                              <td>{{$user->first_name}} {{$user->last_name}}</td>
                              <td>
                                {{ $o->project->ProjectDetail->AssigningForum->name }}
                              </td>
                              <td>
                                {{ round($o->project->score,2,PHP_ROUND_HALF_UP) }}
                              </td>
                              <td>
                                @php
                                  $interval = date_diff(date_create(date('Y-m-d h:i:s',strtotime($o->created_at))), date_create(date('Y-m-d h:i:s')))->format('%m Month %d Day %h Hours');
                                  // $duration=$interval->format();
                                @endphp
                                {{-- {{$assigned->created_at}} --}}
                                {{$interval}}
                              </td>
                              <td>
                                @if ($o->project->ProjectDetail->sne)
                                  {{ $o->project->ProjectDetail->sne }}
                                @else
                                  <span style="color:red">Not Added</span>
                                @endif
                              </td>
                              <td>

                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $o->progress; ?>% ">
                                      {{round($o->progress, 0, PHP_ROUND_HALF_UP) }}% Complete
                                      </div>

                                    </div>
                              </td>
                              <td>
                                <a href="#" disabled class="btn btn-primary" style="margin-bottom:3px;">Review Project</a></br>
                              </td>

                              </tr>
                              @endforeach
                        </tbody>
                      </table>
                      {{-- Completed Projects Table --}}
                      <table class="table table-hover CompletedProjects table-striped">
                        <thead >
                            <th style="text-align:center;" >Project Number</th>
                            <th style="text-align:center;">Project Name</th>
                            <th style="text-align:center;">Progress</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        <tbody style="text-align:center;">
                            @foreach($CompletedProjects as $o)
                            <tr >
                            <td> {{$o->Project->project_no}} </td>
                            <td><a href="{{route('ViewAsOfficerActivities',['project_id'=>$o->project_id,'user_id'=>$user->id])}}">{{$o->Project->title}}</a> </td>
                            <td>
                              @if($o->progress > 95)
                              <label class="label label-success"> Completed {{$o->progress}}%</label>
                              @endif
                              @if($o->progress<50)
                              <label class="label label-danger"> Not Completed {{$o->progress}}%</label>
                              @endif
                            </td>
                            <td>
                              <a href="#" disabled class="btn btn-primary" style="margin-bottom:3px;">Review Project</a></br>
                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
              </div>
          </div>
        </div>
        <div class="col-md-2 col-xs-2"></div>
       </div>
    </section>
    </div>
@endsection
@section('scripttags')
  <script type="text/javascript">
    function hideall(){
      $('.CompletedProjects').hide();
      $('.InProgressProjects').hide();
      $('.newAssignments').hide();
    }
    $(document).on('click','.topnav',function(){
      hideall();
      $('.'+$(this).data('id')).show('slow');
    })
    function inActiveAll(){
      $("li.active").each(function(){
          $(this).removeClass('active')
      })
    }
    $('.topnav').on('click',function(){
      inActiveAll();
      $(this).parent().addClass("active");
    })
  </script>
@endsection
