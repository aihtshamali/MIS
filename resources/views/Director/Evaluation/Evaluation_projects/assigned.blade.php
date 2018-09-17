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
    new Vue({
    el: '.problematicremark',
    data: {
      problematicRemarks: {},
      activity_id: '',
      message: '',
      project_id: '',
      messagecount:0,
      assigned: '',
      auth_id: {!! Auth::check() ? Auth::id() : 'null' !!}
    },
    created(){
      this.project_id=document.querySelector("input[name=project_id]").value;
      this.assigned=document.querySelector("input[name=assigned_by]").value;
    },
    mounted() {
      this.getProblematicRemarks();
      $(".direct-chat-messages").stop().animate({ scrollTop: $(".direct-chat-messages")[0].scrollHeight}, 1000);
      this.listen();
    },
    // define methods under the `methods` object
    methods: {
      submitProblematic: function (event) {
        axios.post('/Problematicremarks',
          {
            api_token: this.api_token,
            remarks: this.message,
            activity_id: this.activity_id,
            assigned_by: this.assigned,
            project_id:this.project_id
          })
          .then((response) => {
            this.problematicRemarks.push(response.data);
            this.getUnreadCount();
            // console.log(response);
            this.message = '';
            })
            .catch(function (error) {
                console.log(error);
            })

      },
      getUnreadCount () {
        axios.get("/GetUnreadCount/"+this.project_id)
              .then((response) => {
                console.log(response);
                this.messagecount = response.data;
              })
              .catch(function (error) {
                console.log(error);
              });
      },
    getProblematicRemarks () {
      axios.get("/Problematicremarks/"+this.project_id)
            .then((response) => {
              this.problematicRemarks = response.data
            })
            .catch(function (error) {
              console.log(error);
            });
    },
    listen() {
      Echo.private('problematicremarks.'+this.project_id)
          .listen('ProblematicEvent', (message) => {
            this.problematicRemarks.push(message);
            this.getUnreadCount();
          });
        }
    }
  })
  </script>

  @endsection
