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
  .fileprogress{display: none}
  .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
  .percent { position:absolute; display:inline-block; top:3px; left:48%; }
  </style>
@endsection
@section('content')


<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
             STAGES OF MONITORING PROJECT
            {{-- <span class="label label-danger">{{$officer->count()}}</span> --}}
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
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <p>
                         Project Number : 
                            <b>
                            {{-- {{$project_data->Project->project_no}}  --}}
                            Dummy
                            </b><br>
                        </p>
                        <p>
                        Project Name :
                            <b> 
                            {{-- {{$project_data->Project->title}}  --}}
                            Dummy
                            </b><br>
                        </p>
                        <p>
                            Project Members :<b>
                            Dummy
                            {{-- @foreach ($project_data->AssignedProjectTeam as $member)
                            {{$member->User->first_name}} {{$member->User->last_name}},
                            @endforeach --}}
                            </b>
                            <br>
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
                <hr/>
                <div class="panel-group">
                        {{-- @foreach($activities as $activity) --}}
                    <div class="panel" >
                    <div class="panel-heading" style="background-color:#4A6066 !important; color:white;" ><b>STAGE I : </b> DOCUMENTS</div>
                    <div class="panel-body">
                        <ol>
                            <li>
                                <div class="pull-left">DOCUMENT COLLECTION </div>
                                <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                    </div>
                            </li>
                           
                            <li> 
                                <div class="pull-left">DOCUMENTS REVIEW</div>
                                    <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                    </div>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" style="background-color:#5F909C !important; color:white;"><b>STAGE II : </b> METHODOLOGY</div>
                    <div class="panel-body">
                        <ol>
                            <li>
                                <div class="pull-left"><a href="#">DEVELOPEMENT OF WBS </a></div>
                                
                                <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pull-left">IDENTIFICATION OF KPI(s)</div>
                                <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                    </div>
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="panel">
                    <div class="panel-heading"  style="background-color:#885691 !important; color:white;"><b>STAGE III : </b> PLANNING OF  VISIT</div>
                    <div class="panel-body">
                        <ol>
                            <li>
                                    <div class="pull-left"><a>PLAN A TRIP</a></div>
                                    <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                    </div>  
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="panel">
                    <div class="panel-heading"  style="background-color:#C489B4 !important; color:white;"><b>STAGE IV : </b> SITEVISITS & OBSERVATIONS</div>
                    <div class="panel-body">
                            <div class="progress" >
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                    1% Complete
                                </div> 
                            </div> 
                        <ol>
                            <li>
                                STAKEHOLDERS IDENTIFICATION
                            </li>
                            <li>
                                FILL STANDARD QUESTIONNAIRES
                            </li>
                            <li>
                              AGREEMENT ON WBS GHANTT CHARTS SIGNED BY THE DEPARTMENT
                            </li>
                            <li>
                                PHYSICAL VERIFICATION OF ACTIVITIES
                            </li>
                            <li>
                                PICTURES AND GPS COORDINATES
                            </li>
                            <li>
                               DRONE VIDEOS
                            </li>
                            <li>
                             SAMPLES FOR TESTING AND RESULTS
                            </li>

                        </ol>
                    </div>
                 </div>
                
                <div class="panel">
                    <div class="panel-heading"  style="background-color:#DF724A   !important; color:white;"><b>STAGE V : </b> ANALYSIS</div>
                    <div class="panel-body">
                        <ol>
                            <li>
                                    <div class="pull-left"> UPDATE GHANTT CHARTS</div>
                                    <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                            1% Complete
                                        </div>  
                            </li>
                            <li>
                                    <div class="pull-left">   ANALYSIS </div>
                                    <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                            1% Complete
                                        </div>  
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="panel">
                    <div class="panel-heading"  style="background-color:#F2B279 !important; color:white;"><b>STAGE VI : </b> REPORT REVIEW</div>
                    <div class="panel-body">
                        <ol>
                            <li><div class="pull-left">  REPORT </div>
                                <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                    </div>  
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="panel">
                 <div class="panel-heading"  style="background-color:#9BA64B !important; color:white;"><b>STAGE VII : </b> FOLLOW UP</div>
                    <div class="panel-body">
                        <ol>
                            <li>
                                <div class="pull-left">   FOLLOW UP OF PROJECT </div>
                                <div class="progress pull-right" style="display: inline; margin-left: 5%; width: 50%;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                        1% Complete
                                </div>  
                             </li>
                         </ol>
                    </div>
                </div>  
                {{-- @endforeach --}}
            </div>
            <a href="#" class="btn btn-success btn-md pull-right">DONE </a>
         
           
       
    </section>
</div>
@endsection
@section('scripttags')
<script>   
 

       $(document).ready(function(){
     

        $('.btn').popover();
  
        $('.btn').on('click', function (e) {
          $('.btn').not(this).popover('hide');
        });
  
  
      });
  
      </script>
@endsection
