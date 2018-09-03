@extends('layouts.uppernav')

@section('styletag')
  <style media="screen">
  .direct-chat-messages{
    max-height: 250px;
    overflow-y: scroll
  }
  body{
    overflow-x: scroll;
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
    border-radius: 50%;
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

  </style>
@endsection
@section('content')

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
              <p>
                Project Number : <b> {{$project_data->Project->project_no}} </b></br>
              </p>
              <p >
                Project Name :<b> {{$project_data->Project->title}}  </b></br>
              </p>

              <p>
                Project Members :<b>
                  @foreach ($project_data->AssignedProjectTeam as $member)
                    {{$member->User->first_name}} {{$member->User->last_name}},
                  @endforeach
                </b>
              </br>
            </p>


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
              aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
              1% Complete
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
                  <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="0 New Messages">0</span>
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
                <form action="#" method="POST">
                  {{csrf_field()}}
                  <table class="table table-hover table-striped">
                    <b>ACTIVITY CHART</b>
                    <thead >
                      <th style="text-align:center;" >No.</th>
                      <th style="text-align:center;">Activity Name</th>
                      <th style="text-align:center;">Activity Progress</th>
                      {{-- <th style="text-align:center;">Remarks</th> --}}
                    </thead>
                    <tbody style="text-align:center;">

                      @foreach($activities as $activity)
                        <tr>
                          <td> {{$activity->ProjectActivity->id}} </td>
                          <td> {{$activity->ProjectActivity->name}} </td>
                          <td>
                            <div>
                              <ul class="progressbar">
                                @if($activity->progress >= 25.0)
                                  <a class="btn" >
                                    <input type="hidden" class="{{$activity->id}}" name="percent" value="25,{{$project_data->project->id}},{{$activity->id}}">
                                    <li class="active">25%</li>
                                  </input>
                                </a>
                              @else
                                <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},25)'>Save</button>">
                                  <input type="hidden" class="25_{{$activity->id}}" name="percent" value="25,{{$project_data->project->id}},{{$activity->id}}">
                                  <li>25%</li>
                                </input>
                              </a>
                            @endif
                            @if ($activity->progress >= 50.0)
                              <a class="btn" >
                                <input type="hidden" class="{{$activity->id}}" name="percent" value="50,{{$project_data->project->id}},{{$activity->id}}">
                                <li class="active">50%</li>
                              </input>
                            </a>
                          @else
                            <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},50)'>Save</button>">
                              <input type="hidden" class="50_{{$activity->id}}" name="percent" value="50,{{$project_data->project->id}},{{$activity->id}}">
                              <li>50%</li>
                            </input>
                          </a>
                        @endif
                        @if ($activity->progress >= 75.0)
                          <a class="btn" >
                            <input type="hidden" class="{{$activity->id}}" name="percent" value="75,{{$project_data->project->id}},{{$activity->id}}">
                            <li class="active">75%</li>
                          </input>
                        </a>
                      @else
                        <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},75)'>Save</button>">
                          <input type="hidden" class="75_{{$activity->id}}" name="percent" value="75,{{$project_data->project->id}},{{$activity->id}}">
                          <li>75%</li>
                        </input>
                      </a>
                    @endif
                    @if ($activity->progress >= 100.0)
                      <a class="btn" >
                        <input type="hidden" class="{{$activity->id}}" name="percent" value="100,{{$project_data->project->id}},{{$activity->id}}">
                        <li class="active">100%</li>
                      </input>
                    </a>
                  @else
                    <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},100)'>Save</button>">
                      <input type="hidden" class="100_{{$activity->id}}" name="percent" value="100,{{$project_data->project->id}},{{$activity->id}}">
                      <li>100%</li>
                    </input>
                  </a>
                @endif
              </ul>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <input type="hidden" name="id" style="display:inline;float:right" value="{{$project_data->project_id}}">
  <button type="button" class="btn btn-success pull-right" >Project Completed
  </button>
</form>
</div>
</div>
</div>
{{-- End row --}}
<hr>
<div class="row">
  <div class="form-group col-md-10 col-xs-12">
    <form class="" action="{{route('saveActivityAttachment')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="col-md-4">
        <select name="attachment_activity" id="" class="select2 form-control">
          <option value="">Select Activity For Attachments</option>
          @foreach($activities as $activity){
            <option value="{{$activity->id}}">{{$activity->ProjectActivity->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <input type="text" name="attachment_name" class="form-control"  placeholder="Enter Attachment Name">
      </div>
      <div class="col-md-4">
        <input type="file" style="" class="form-control" name="activity_attachment">
      </div>
      <br>
      <input type="submit" name="Submit" value="Save Attachment" class="btn btn-success pull-right">

    </form>
  </div>
</div>

</div>
</div>
</div>

</div>


</section>

</div>

@endsection

@section('scripttags')
  <script type="text/javascript">

    new Vue({
    el: '.problematicremark',
    data: {
      problematicRemarks: {},
      activity_id: '',
      message: '',
      project_id: '',
      assigned: '',
      auth_id: {!! Auth::check() ? Auth::id() : 'null' !!}
    },
    created(){
      this.project_id=document.querySelector("input[name=project_id]").value;
      this.assigned=document.querySelector("input[name=assigned_by]").value;
    },
    mounted() {
      this.getProblematicRemarks();
      this.listen();
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
            })
            .catch(function (error) {
                console.log(error);
            })
          }else{
            alert('Please Select the Activity');
          }
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
          });
        }
    }
  })
  </script>
  <script>
  function saveData(id,number){
    console.log(number);
    console.log($('.'+number+'_'+id).val());
    opt = $('.'+number+'_'+id).val();
    $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      url: '/officer/save_percentage', // This is the url we gave in the route
      data: {
        "_token": "{{ csrf_token() }}",
        'data' : opt}, // a JSON object to send back
        success: function(response){ // What to do if we succeed
          // console.log(response);
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
      });
    }

    // $('#btn-confirm').on('click',function(){
    //   $('#myModal').modal({
    //     show:true
    //   });
    // });

    $(document).ready(function(){
      $('.expand').on('click',function(){
        if($('.expand').children('.fa-plus').length){
        axios.post('/ReadProblematicremarks',
          {
            api_token: '{{ csrf_field() }}',
            project_id: $('input[name="project_id"]').val()
          }).then((response) => {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      });

      $('.btn').popover();

      $('.btn').on('click', function (e) {
        $('.btn').not(this).popover('hide');
      });


    });

    </script>
  @endsection
