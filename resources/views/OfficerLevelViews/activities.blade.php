@extends('layouts.uppernav')
@section('styletag')
  <style media="screen">
  .direct-chat-messages{
    max-height: 250px;
    overflow-y: scroll
  }
  body{
    overflow-x: hidden;
  }
  ul.progressbar{
    display: inline-flex;
  }
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
  .progressbar a{
    color: unset;
  }
  .progressbar a:hover{
    color: unset !important;
    cursor: pointer !important;
  }
  .progressbar {
    counter-reset: step;
  }
  .progressbar li:hover{
    color: green;
  }
  .progressbar li {
    list-style-type: none;
    width: 25%;
    float: left;
    font-size: 12px;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    color: #5b0303;
  }
  .progressbar li:before {
    width: 30px;
    height: 30px;
    content: counter(step);
    counter-increment: step;
    line-height: 30px;
    border: 2px solid #5b0303;
    display: block;
    text-align: center;
    margin: 0 auto 10px auto;
    /* border-radius: 50%; */
    background-color: white;
  }
  .progressbar li:after {
    width: 100%;
    height: 2px;
    content: '';
    position: absolute;
    background-color: #5b0303;
    top: 15px;
    left: -50%;
    z-index: -1;
  }
  .progressbar li:first-child:after {
    content: none;
  }
  .progressbar li.active {
    color: green;
  }
  .progressbar li.active:before {
    border-color: #55b776;
  }
  .progressbar li.active + li:after {
    background-color: #55b776;
  }
  .bs-example{
    margin: 200px 150px 0;
  }
  .popover-title .close{
    position: relative;
    bottom: 3px;
  }
  .table tr td .progress {
    margin-top: 10px;
    height: 30px;
  }
  .detailTab{
    
margin-top: 2%;
  }
  .detailTab th,.detailTab td {
     
        vertical-align: middle !important;
        text-align:left;
         /* border: 1px solid #999; */
            
        /* width:20% !important; */
            padding:-2% !important;
            margin:-2% !important;
        }

  .fileprogress{display: none}
  .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
  .percent { position:absolute; display:inline-block; top:3px; left:48%; }
  .percentBox{border: 2px solid #790d0d;text-align: center;width: 30px;overflow: hidden;height: 25px; disabled:disabled}
  .percentBox p{margin: 0px !important; padding: 0px !important;}
    /* Paste this css to your style sheet file or under head tag */
  /* This only works with JavaScript,
  if it's not present, don't show loader */
  /* .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
  .se-pre-con {
  	position: fixed;
  	left: 0px;
  	top: 0px;
  	width: 100%;
  	height: 100%;
  	z-index: 9999;
  	background: url(https://media.giphy.com/media/cZDRRGVuNMLOo/giphy.gif) center no-repeat #fff;
  } */
  #loader
  {
    display: none;
    background: #000000b3;
    padding: 15% 31% 0% 31%;
    position: fixed;
    z-index: 9999;
    width: 100%;
    height: 100%;
  }
  .loader img{width: 150px !important;margin: auto;}
  .skin-blue .main-header .navbar{position: fixed !important;width: 100% !important;}


  </style>
@endsection
@section('content')
<div id="loader"><img src="{{asset('loader.gif')}}"/></div>
  <div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
      <h1>
        In-Progress Evaluation Activities
        {{-- <span class="label label-danger">{{$project_id}}</span> --}}
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
        <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

      </ol>
    </section>

    {{-- <!-- Main content --> --}}
    <section class="content">
      {{-- row 1 --}}

      <div class="row">

        <div class="col-md-12 col-xs-12" >
          <div class="box1 box-warning">

            <div class="box-header with-border">
              <table class="table table-borderd compact detailTab col-md-12">
                
                <tr>
                  <th style="width:10%;">Project #</th>
                  <td style="width:15%;" >{{$project_data->Project->project_no}}</td>
                  <th style="width:10%;">Project Title</th>
                  <td style="width:30%;">{{$project_data->Project->title}}</td>
                  <th>Project Members</th>
                   <td>
                        @foreach ($project_data->AssignedProjectTeam as $team)
                        @if ($team->team_lead==1)
                          <span ><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}" style="font-weight:bold; color:red">{{$team->user->first_name}}  {{$team->user->last_name}}</a></span>
                        @else
                          <span class=""><a href="{{route('ViewAsOfficerNewAssignments',$team->user->id)}}">{{$team->user->first_name}} {{$team->user->last_name}}</a></span>
                        @endif
                      @endforeach
                </td>
                </tr>
                <tr>
                    <th>GS/ADP #</th>
                    <td >
                      {{$project_data->Project->ADP}} / {{$project_data->Project->financial_year}}
                    </td>
                    <th>Location</th>
                    <td>
                      @foreach ($project_data->Project->AssignedDistricts as $district)
                          {{$district->District->name}}<br>
                          @endforeach
                    </td>               
                    <th>SNE</th>
                    <td> {{ $project_data->Project->ProjectDetail->sne }}</td>
                </tr>
                <tr>
                  <th>Sector(s) & Subsector(s)</th>
                  <td>
                    @foreach ($project_data->Project->AssignedSubSectors as $subsct)
                      {{$subsct->SubSector->Sector->name}}
                    @endforeach
                    -
                     @foreach ($project_data->Project->AssignedSubSectors as $subsct)
                      {{$subsct->SubSector->name}} <br>
                    @endforeach
                  </td>
                  <th>Sponsoring Department</th>
                  <td> 
                    @foreach ($project_data->Project->AssignedSponsoringAgencies as $SponsoringAgency)
                        {{$SponsoringAgency->SponsoringAgency->name}}<br>
                      @endforeach
                  </td>
                  <th>Executing Department</th>
                  <td>
                      @foreach ($project_data->Project->AssignedExecutingAgencies as $ExecutingAgency)
                        {{$ExecutingAgency->ExecutingAgency->name}}<br>
                      @endforeach
                  </td>
                 
                </tr>
                <tr>
                   <th>
                    Approving Forum 
                  </th>
                  <td>
                       {{$project_data->Project->ProjectDetail->ApprovingForum->name}}
                  </td>
                  <th>Original Cost</th>
                  <td>
                    {{round($project_data->Project->ProjectDetail->orignal_cost,3,PHP_ROUND_HALF_UP)}} Million PKR
                  </td>
                  <th>Revised Cost <br> (if any)</th>
                  <td>
                     @foreach ($project_data->Project->RevisedApprovedCost as $revised_cost)
                        {{round($revised_cost->cost,3,PHP_ROUND_HALF_UP)}}
                        @if(last($project_data->Project->RevisedApprovedCost->toArray())['id'] != $revised_cost->id)
                          -
                        @endif
                      @endforeach
                  </td>
                </tr>
                <tr>
                  <th>Planned Dates & Gestation Period</th>
                  <td>{{date('d-M-y',strtotime($project_data->Project->ProjectDetail->planned_start_date))}} 
                  <b style="margin-left: 4%;margin-right: 4%;">To</b>  {{date('d-M-y',strtotime($project_data->Project->ProjectDetail->planned_end_date))}}
                <br>
                 @php
                      $interval = date_diff(date_create(date('d-M-y',strtotime($project_data->Project->ProjectDetail->planned_start_date))), 
                                            date_create(date('d-M-y',strtotime($project_data->Project->ProjectDetail->planned_end_date))))->format('%y Year %m Month %d Day ');
                      // $duration=$interval->format();
                    @endphp
                   <span style="background:aquamarine; padding-left:3%; padding-right:3%;"> {{$interval}}</span>
                </td>
                 
                  <th>Revised Dates</th>
                  <td>
                   {{date('d-M-y',strtotime($project_data->Project->ProjectDetail->revised_start_date))}}
                  <b style="margin-left: 4%;margin-right: 4%;">To</b>
                    @foreach ($project_data->Project->RevisedEndDate as $revised_date)
                      {{date('d-M-y',strtotime($revised_date->end_date))}}
                      @if(last($project_data->Project->RevisedEndDate->toArray())['id'] != $revised_date->id)
                        -
                      @endif
                    @endforeach
                  </td>
                 
                </tr>
                {{-- <tr>
                  <th></th>
                  <td></td>
                </tr>
                <tr>
                  <th></th>
                  <td></td>
                </tr> --}}

              </table>
            <div class="box-tools pull-right">
              {{-- <button  href="#" type="button" class="btn btn-xs btn-primary"> EDIT</button> --}}
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <hr/>
            <b>
              GLOBAL PROGRESS
            </b>

            <div class="progress">

              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:{{$average_progress}}%">
            {{$average_progress}}% Complete
            </div>
          </div>
        </div>
        <div class="box-body1">
          {{--direct chat  --}}
          <div class="row problematicremark">
            <div class="col-md-offset-8 col-md-3">
              <div class="box box-danger direct-chat direct-chat-danger collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title" style="font-size: 15px">Problematic Remarks</h3>

                <div class="box-tools pull-right">
                  <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="0 New Messages" v-text="messagecount">0</span>
                  <button type="button" class="btn btn-box-tool expand" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                    <i class="fa fa-comments"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="display: none;">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" v-chat-scroll>
                  <!-- Message. Default to the left -->
                  <span v-for="message in problematicRemarks">
                      <!-- Message to the right -->
                      <div class="direct-chat-msg right" v-if="message.user.id == auth_id">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                          <span class="direct-chat-timestamp pull-left" v-text="message.created_at"></span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('user.png')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text" v-text="message.remarks">
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
                    @foreach ($project_data->AssignedProjectTeam as $team)
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
                <form action="#" v-on:submit.prevent="submitProblematic" class="problematicRemarkForm" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="hidden" name="assigned_by" ref="assigned" value="{{$project_data->assigned_by}}" >
                    <input type="hidden" name="project_id" value="{{$project_data->Project->id}}" ref="project_id">
                    <select class="form-control" name="activity_id" v-model="activity_id">
                      <option value="">Select an Activity</option>
                      @foreach ($activities as $activity)
                        <option value="{{$activity->id}}">{{$activity->ProjectActivity->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-group">
                    <input type="text" name="message" v-model="message" placeholder="Type Message ..." class="form-control textmessage">
                        <span class="input-group-btn">
                          <button type="submit" v-on:submit.prevent="submitProblematic" class="btn btn-danger btn-flat">Send</button>
                        </span>
                  </div>
                </form>
              </div>
              <!-- /.box-footer-->
            </div>
            </div>
          </div>
          <!--/.direct-chat -->
          <div class="row" >
            <div class="col-md-12 col-xs-12">
              <div class="table-responsive">
                <form action="{{route('projectCompleted')}}" method="POST">
                  {{csrf_field()}}
                  <table class="table table-hover table-striped">
                    <b>ACTIVITY CHART</b>
                    <thead >
                      <th style="text-align:center;" >No.</th>
                      <th style="text-align:center;">Activity Name</th>
                      <th style="text-align:center;">Activity Attachments</th>
                      <th style="text-align:center;">Activity Progress</th>
                      {{-- <th style="text-align:center;">Remarks</th> --}}
                    </thead>
                    <tbody style="text-align:center;">
                      @php
                      $arr=array();
                        foreach ($assignedDocuments as $docs) {
                          array_push($arr,$docs);
                        }
                        $activity_count=0;
                      @endphp
                      @foreach($activities as $activity)
                        <tr>
                          <td> {{$activity->ProjectActivity->id}} </td>
                          <td>
                            @if($activity->ProjectActivity->name=="Document Collection")
                             <a class="activity_docs" data-toggle="modal" data-target="#modalAttachment" data-id="{{$activity->id}}"> {{$activity->ProjectActivity->name}}  </a>
                           @else
                             {{$activity->ProjectActivity->name}}
                           @endif
                           </td>
                          <td>
                              @foreach ($activity->AssignedActivityAttachments as $attachment)
                                <a href="{{asset("storage/uploads/projects/project_activities/".Auth::user()->username."/".$attachment->attachment_name.".".$attachment->type)}}" download>{{$attachment->attachment_name}}<i class="fa fa-file-{{$icons[$attachment->type]}}-o fa-1x text-center" title="{{ $attachment->attachment_name }}" /></i>
                                  <span style="padding-right:5px;">|</span></a>
                              @endforeach
                            </td>
                          <td>
                            <div>
                              <ul class="progressbar">
                                @if($activity->progress != 0.0)
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    @if($activity->progress <= 25.0)
                                      <label style="padding:5px;min-width:60px">
                                        {{ round($activity->progress,0,PHP_ROUND_HALF_UP )}} %
                                      </label>
                                    @elseif($activity->progress <= 50.0)
                                      <label style="padding:5px;min-width:120px">
                                        {{ round($activity->progress,0,PHP_ROUND_HALF_UP )}} %
                                      </label>
                                    @elseif($activity->progress <= 75.0)
                                      <label style="padding:5px;min-width:180px">
                                        {{ round($activity->progress,0,PHP_ROUND_HALF_UP )}} %
                                      </label>
                                    @else
                                      <label style="padding:5px;min-width:240px">
                                        {{ round($activity->progress,0,PHP_ROUND_HALF_UP )}} %
                                      </label>
                                    @endif
                                    </div>
                                  </div>
                                @endif
                                @php
                                  $total=100;
                                  $count=1;$counter=0;
                                  $style="disabled";
                                  $i=$assignedDocuments->count();
                                  if ($i!=0) {
                                    $counter=(100)/$i;
                                  }
                                  $temp=$counter;
                                @endphp
                                @foreach ($arr as $docs)
                                  @if($activity->ProjectActivity->id < 7 && $docs->AssignedProjectActivity->id &&  $activity->progress < round($temp,0,PHP_ROUND_HALF_UP)  &&  $activity->ProjectActivity->name!='Site Visits' && $activity->ProjectActivity->id < 3)
                                   <a class="btn"  disabled>
                                    <input type="hidden" class="{{round($temp,0,PHP_ROUND_HALF_UP)}}_{{$activity->id}}" name="percent" value="{{round($temp,0,PHP_ROUND_HALF_UP)}},{{$project_data->project->id}},{{$activity->id}}">
                                      <div class="percentBox">
                                        <p>{{$docs->ActivityDocument->name}}</p>
                                      </div>
                                      <span>{{round($temp,0,PHP_ROUND_HALF_UP)}}%</span>
                                      </input>
                                    </a>
                                  @endif
                                  @php
                                  $temp+=$counter;
                                  @endphp
                                @endforeach
                                @if($activity->progress < 25.0  && $activity->ProjectActivity->id < 7 && $activity->ProjectActivity->id > 2  &&  $activity->ProjectActivity->name!='Site Visits')
                                  <a class="btn" id="myDiv" disabled>
                                      <input type="hidden" class="25_{{$activity->id}}" name="percent" value="25,{{$project_data->project->id}},{{$activity->id}}">
                                      <div class="percentBox">
                                        <p>1</p>
                                      </div>
                                      <span>25%</span>
                                      </input>
                                    </a>
                                @endif
                                @if($activity->progress < 50.0 && $activity->ProjectActivity->id < 7 && $activity->ProjectActivity->id > 2)
                                   <a class="btn"  disabled>
                                      <input type="hidden" class="50_{{$activity->id}}" name="percent" value="50,{{$project_data->project->id}},{{$activity->id}}">
                                      <div class="percentBox">
                                      @if($activity->ProjectActivity->name=='Site Visits')
                                        <p>Plan A Trip</p>
                                      @else
                                        <p>2</p>
                                      @endif
                                      </div>
                                      <span>50%</span>
                                    </input>
                                  </a>
                                @endif
                                @if ($activity->progress < 75.0 && $activity->ProjectActivity->id < 7 && $activity->ProjectActivity->id > 2 &&  $activity->ProjectActivity->name!='Site Visits')
                                  <a class="btn"  disabled>
                                      <input type="hidden" class="75_{{$activity->id}}" name="percent" value="75,{{$project_data->project->id}},{{$activity->id}}">
                                      <div class="percentBox">
                                        <p>3</p>
                                      </div>
                                      <span>75%</span>
                                    </input>
                                  </a>
                              @endif
                              @if ($activity->progress < 100.0 && $activity->ProjectActivity->id > 2)
                                {{-- {{dump($activities[$activity_count-1]->progress >= 100)}} --}}
                                   <a class="btn"  disabled>
                                    <input type="hidden" class="100_{{$activity->id}}" name="percent" value="100,{{$project_data->project->id}},{{$activity->id}}">
                                    <div class="percentBox">
                                    @if($activity->ProjectActivity->name=='Site Visits')
                                      <p>Close A Trip</p>
                                    @else
                                      <p>4</p>
                                    @endif
                                    </div>
                                    <span>100%</span>
                                  </input>
                                </a>
                              @endif
                            <a class="btn" rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" disabled data-content="Start Date: <input class='form-control' type='date' name='start_date' value='{{$activity->start_date}}' required>End Date:<input type='date' class='form-control' value='{{$activity->end_date}}' name='end_date' required><button type='button' class='btn btn-success pull-right' onClick='saveDates({{$activity->id}},this)'>Update</button>" >
                              <div class="percentBox">
                                <p>Dates</p>
                              </div>
                            </a>
              </ul>
            </div>
          </td>
        </tr>
        @php
          $activity_count++;
        @endphp
      @endforeach
    </tbody>
  </table>
  <input type="hidden" name="assigned_project_id" style="display:inline;float:right" value="{{$project_data->id}}">
  <button type="submit" class="btn btn-success pull-right" @if($project_data->progress != 100 ||( $project_data->progress == 100 && $project_data->complete==1)) disabled @endif >Project Completed
  </button>
</form>
</div>
</div>
</div>
{{-- End row --}}
<hr>
<div class="row">
  <div class="form-group col-md-10 col-xs-12">
    <form class="saveActivityAttachment" action="" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="col-md-4">
        <select name="attachment_activity" id="" class="select2 form-control">
          <option value="">Select Activity For Attachments</option>
          <optgroup label="Activities">
          @foreach($activities as $activity){
              <option value="{{$activity->id}}">{{$activity->ProjectActivity->name}}</option>
          @endforeach
        </optgroup>
        </select>
      </div>
      <div class="col-md-4">
        <input type="text" name="attachment_name" class="form-control"  placeholder="Enter Attachment Name">
      </div>
      <div class="col-md-4">
        <input type="file" style="" class="form-control" name="activity_attachment">
      </div>

      <br>
      <input type="button" disabled name="Submit" value="Save Attachment" class="btn btn-success pull-right">

    </form>
    <div class="row">
      <div class="col-md-8">
        <div class="fileprogress progress-bar progress-bar-success progress-bar-striped"role="progressbar"
        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
        0%
      </div>
      <div id="status"></div>
      </div>
    </div>

  </div>
</div>

</div>
</div>
</div>

</div>
<!-- Modal -->
<div id="modalAttachment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Choose Only Available Documents</h4>
      </div>
      <form class="" action="{{route('AssignActivityDocument')}}" method="post">
      <div class="modal-body">
          {{ csrf_field() }}
          <input type="hidden" name="assigned_project_id" value="{{$project_data->id}}">
          <input type="hidden" id="modal_assigned_activity_id" name="assigned_activity_id">
        @foreach ($activity_documents as $docs)
          <div>
            @if(isset($assignedDocuments->where('activity_document_id',$docs->id)->first()->id))
              <input type="checkbox" name="activity_document_id[]" checked disabled value="{{$docs->id}}">
              <label for="" disabled>
                {{$docs->name}}
              </label>
            @else
              <input type="checkbox" name="activity_document_id[]"  value="{{$docs->id}}">
              <label for="">
                {{$docs->name}}
              </label>
            @endif
          </div>
        @endforeach

      </div>
      <div class="modal-footer">
        <input type="submit" name="Submit" class="pull-right btn btn-success btn-sm" value="Submit">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>


</section>
{{-- <a href="#!"><img border="0" alt="Image" src="https://media.giphy.com/media/cZDRRGVuNMLOo/giphy.gif">there</a> --}}
</div>

@endsection

@section('scripttags')
  {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> --}}
  {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> --}}
  <script src="http://malsup.github.com/jquery.form.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.select2').select2();
    (function() {

    var bar = $('.fileprogress');
    var percent = $('.percent');
    var status = $('#status');

    $('form.saveActivityAttachment').ajaxForm({
        beforeSend: function() {
            status.empty();
            bar.show();
            var percentVal = '0%';
            bar.css('width',percentVal);
            $('.fileprogress').html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            bar.html(percentVal);
    		//console.log(percentVal, position, total);
        },
        success: function() {
            var percentVal = '100% Completed';
            bar.css('width',percentVal);
            bar.width(percentVal)
            bar.html(percentVal);
        },
    	complete: function(xhr) {
        if(xhr.statusText=="OK"){
          status.html('File Upload SuccessFully')
          location.reload();
        }else{
            status.html(xhr.responseText)
        }
            		// status.html(xhr.responseText);
    	}
    });

    })();
  });

    new Vue({
    el: '.problematicremark',
    data: {
      problematicRemarks: {},
      activity_id: '',
      message: '',
      project_id: '',
      assigned: '',
      messagecount:0,
      auth_id: {!! Auth::check() ? Auth::id() : 'null' !!}
    },
    created(){
      this.project_id=document.querySelector("input[name=project_id]").value;
      this.assigned=document.querySelector("input[name=assigned_by]").value;
    },
    mounted() {
      this.getUnreadCount();
      this.getProblematicRemarks();
      // this.listen();
    },
    // define methods under the `methods` object
    methods: {
      submitProblematic: function (event) {
        if(this.activity_id!=null && this.activity_id!=''){
        axios.post('/Problematicremarks',
          {
            api_token: this.api_token,
            remarks: this.message,
            activity_id: this.activity_id,
            assigned_by: this.assigned,
            project_id:this.project_id
          })
          .then((response) => {
            console.log(response);
            this.problematicRemarks.push(response.data);
            this.message = '';
            this.getUnreadCount();
            })
            .catch(function (error) {
                console.log(error);
            })
          }else{
            alert('Please Select the Activity');
          }
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
    }
    // ,
    // listen() {
    //   Echo.private('problematicremarks.'+this.project_id)
    //       .listen('ProblematicEvent', (message) => {
    //         console.log(message);
    //         this.problematicRemarks.push(message);
    //         this.getUnreadCount();
    //       });
    //     }
    }
  })
  </script>
  <script>
  function myFunction(div) {
  $("#loader").toggle();
  // $(div).toggle();
  return ;
  }
  function saveData(id,number,objthis=null,Assigned_document_id=null,document_id=null){
    myFunction(this);
    var rout='{{route("save_percentage")}}';
    // console.log($('.'+number+'_'+id).val());
    var form_data = new FormData();
    opt = $('.'+number+'_'+id).val();
    // console.log(opt);
    if(objthis!=null){ // objthis is only for DocsAttachment
      rout='{{route("saveDocAttachment")}}';
      var file_data = $(objthis).siblings()[0].files[0];
      if(!file_data){
        alert("Please Choose a File");
        myFunction(this);
        return;
      }
      form_data.append('activity_attachment', file_data);
      form_data.append('activity_document_id', document_id);
      form_data.append('assigned_project_activity_id', id);
      form_data.append('assigned_activity_document_id', Assigned_document_id);
    }
    form_data.append('data', opt);
    form_data.append('csrf-token', "{{ csrf_token() }}");

    $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: rout, // This is the url we gave in the route
      // dataType: 'text',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data, // a JSON object to send back
      success: function(response){ // What to do if we succeed
        // console.log(response);
          location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          console.log(JSON.stringify(jqXHR));
          alert("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
      });

  }
  function saveDates(id,objthis=null){
    myFunction(this);
    var rout='{{route("save_dates")}}';
    // console.log($('.'+number+'_'+id).val());
    var form_data = new FormData();
    // opt = $('.'+number+'_'+id).val();
    var start_date= $(objthis).siblings().first().val();
    var end_date= $(objthis).siblings().last().val();
    form_data.append('assigned_project_activity_id', id);

    form_data.append('start_date', start_date);
    form_data.append('end_date', end_date);
    form_data.append('csrf-token', "{{ csrf_token() }}");

    $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: rout, // This is the url we gave in the route
      // dataType: 'text',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data, // a JSON object to send back
      success: function(response){ // What to do if we succeed
        // console.log(response);
          location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          console.log(JSON.stringify(jqXHR));
          alert("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
      });

  }

    $('.activity_docs').click(function(){

      $("#modal_assigned_activity_id").val($(this).data('id'));
    });

    $(document).ready(function(){

      $('.btn').popover();

      $('.btn').on('click', function (e) {
        $('.btn').not(this).popover('hide');
      });
    });
    </script>
  @endsection
