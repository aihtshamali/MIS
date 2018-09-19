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
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Search Employees</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form" action="{!! route('search_officer') !!}" method="post">
                {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Officer</label>
                    <select class="form-control select2" name="officer_id" style="width: 100%;">
                      <option selected="selected" >Select A Officer</option>
                      @foreach($officers as $officer)
                        @if($officer->hasRole('officer'))
                        <option value="{{ $officer->id }}">{{ $officer->first_name }}  {{ $officer->last_name }} - {{ $officer->UserDetail->sector->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <button  class="btn btn-success pull-right" type="submit" name="button">Search</button>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
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
                  <table class="table table-hover table-striped">
                    <tbody>
                        <thead>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Team Members</th>
                            <th>Priority</th>
                            <th>Assigned Duration</th>
                            <th>Progress</th>
                            <th></th>
                          </thead>
                          <tbody>

                            @foreach ($assigned as $assigned)
                              <?php $var = 0?>
                              @if(isset($officer_id_special))
                                @foreach ($assigned->AssignedProjectTeam as $team)
                                @if($team->user->id == $officer_id_special)
                                  <?php $var = 1?>
                                @endif
                              @endforeach
                              @if($var == 1)
                                <?php $var = 0?>
                                <tr>
                                  <td>{{$assigned->project->project_no}}</td>
                                  <td>{{$assigned->project->title}}</td>
                                  <td>
                                      @foreach ($assigned->AssignedProjectTeam as $team)
                                      @if ($team->team_lead==1)
                                        <span style="font-weight:bold;color:blue">{{$team->user->first_name}}  {{$team->user->last_name}} -</span>
                                      @else
                                        <span class="">{{$team->user->first_name}} {{$team->user->last_name}}</span>
                                      @endif
                                    @endforeach

                                  </td>
                                  <td>
                                      @if ($assigned->priority==3)
                                      High
                                    @elseif ($assigned->priority==2)
                                      Normal
                                    @else
                                      Low
                                    @endif

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
                                      {{$assigned->progress }}% Complete
                                        </div>

                                      </div></td>

                                </tr>
                                
                              @endif
                              @else
                              <tr>
                                <td>{{$assigned->project->project_no}}</td>
                                <td>{{$assigned->project->title}}</td>
                                <td>
                                    @foreach ($assigned->AssignedProjectTeam as $team)
                                    @if ($team->team_lead==1)
                                      <span style="font-weight:bold;color:blue">{{$team->user->first_name}}  {{$team->user->last_name}} -</span>
                                    @else
                                      <span class="">{{$team->user->first_name}} {{$team->user->last_name}}</span>
                                    @endif
                                  @endforeach

                                </td>
                                <td>
                                    @if ($assigned->priority==3)
                                    High
                                  @elseif ($assigned->priority==2)
                                    Normal
                                  @else
                                    Low
                                  @endif

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
                                    {{$assigned->progress }}% Complete
                                      </div>

                                    </div></td>

                              </tr>
                              <tr>
                                <td colspan="6">
                                  {{--direct chat  --}}
                                  <div class="row problematicremark">
                                    <div class="col-md-4 col-md-offset-8">
                                      <div class="box box-danger direct-chat direct-chat-danger collapsed-box">
                                      <div class="box-header with-border">
                                        <h3 class="box-title" style="font-size: 15px">Problematic Remarks</h3>

                                        <div class="box-tools pull-right">
                                          <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="0 New Messages" v-text="messagecount"></span>
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                          </button>
                                          <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                                            <i class="fa fa-comments"></i></button>
                                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                      </div>
                                      <!-- /.box-header -->
                                      <div class="box-body" style="display: none;">
                                        <!-- Conversations are loaded here -->
                                        <div class="direct-chat-messages" >
                                          <!-- Message. Default to the left -->
                                          <span v-for="message in problematicRemarks">
                                              <!-- Message to the right -->
                                              <div class="direct-chat-msg right" v-if="message.user.id == auth_id">
                                                <div class="direct-chat-info clearfix">
                                                  <span class="direct-chat-name pull-right">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                                  <span class="direct-chat-timestamp pull-left">@{{message.created_at}}</span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{{asset('user.png')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                  @{{message.remarks}}
                                                </div>
                                                <!-- /.direct-chat-text -->
                                              </div>
                                              <!-- /.direct-chat-msg -->

                                              <div class="direct-chat-msg" v-else>
                                                <div class="direct-chat-info clearfix">
                                                  <span class="direct-chat-name pull-left">@{{message.user.first_name}} @{{message.user.last_name}}</span>
                                                  <span class="direct-chat-timestamp pull-right">@{{message.created_at}}</span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{{asset('user.png')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                  @{{message.remarks}}
                                                  <span style="position:absolute;right:0;bottom:0;font-size:10px;">(@{{message.activity_name}})</span>
                                                </div>
                                                <!-- /.direct-chat-text -->
                                              </div>
                                          <!-- /.direct-chat-msg -->
                                          </span>
                                        </div>
                                        <!--/.direct-chat-messages-->

                                        <!-- Contacts are loaded here -->
                                        <div class="direct-chat-contacts">
                                          <ul class="contacts-list">
                                            @foreach ($assigned->AssignedProjectTeam as $team)
                                            <li>
                                              <a href="#">
                                                <img class="contacts-list-img" src="{{asset('user.png')}}" alt="User Image">

                                                <div class="contacts-list-info">

                                                      <span class="contacts-list-name">
                                                        {{$team->User->first_name}} {{$team->User->last_name}}
                                                        {{-- <small class="contacts-list-date pull-right">{{date('Y-m-d')}}</small> --}}
                                                      </span>
                                                  {{-- <span class="contacts-list-msg">How have you been? I was...</span> --}}
                                                </div>
                                                <!-- /.contacts-list-info -->
                                              </a>
                                            </li>
                                          @endforeach
                                            <!-- End Contact Item -->
                                          </ul>
                                          <!-- /.contatcts-list -->
                                        </div>
                                        <!-- /.direct-chat-pane -->
                                      </div>
                                      <!-- /.box-body -->
                                      <div class="box-footer" style="display: none;">
                                        <form action="#"  v-on:submit.prevent="submitProblematic" class="problematicRemarkForm" method="post">
                                          {{ csrf_field() }}
                                          <div class="form-group">
                                            <input type="hidden" name="assigned_by" ref="assigned" value="{{$assigned->assigned_by}}" >
                                            <input type="hidden" name="project_id" value="{{$assigned->Project->id}}" ref="project_id">
                                          </div>
                                          <div class="input-group">
                                            <input type="text" name="message" v-model="message" placeholder="Type Message ..." class="form-control">
                                                <span class="input-group-btn">
                                                  <button type="button" v-on:click="submitProblematic" class="btn btn-danger btn-flat">Send</button>
                                                </span>
                                          </div>
                                        </form>
                                      </div>
                                      <!-- /.box-footer-->
                                    </div>
                                    </div>
                                  </div>
                                  <!--/.direct-chat -->
                                </td>
                              </tr>
                            @endif

                            @endforeach
                          </tbody>
                    </tbody>
                  </table>
                </div>
          </div>

          </div>
        </div>
      </div>


@endsection
@section('scripttags')

  <script type="text/javascript">

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
  </script>

  @endsection