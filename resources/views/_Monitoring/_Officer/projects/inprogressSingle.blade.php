@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring | DGME
@endsection
@section('styleTags')
  {{-- <link rel="stylesheet" href="{{ asset('css/app.css')}}" /> --}}

<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/icofont/css/icofont.css')}}"/>
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/sweetalert.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/component.css')}}" />
 <!-- Select 2 css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/multiselect/css/multi-select.css')}}" />
{{-- date --}}
<link rel="stylesheet" href="{{ asset('_monitoring/css/pages/advance-elements/css/bootstrap-datetimepicker.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/daterangepicker.css')}}" />
{{-- Data Tables --}}
<link href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<!-- css file upload Frame work -->
<link href="{{ asset('_monitoring/js/jquery.filer/css/jquery.filer.css')}}" />
<link href="{{ asset('_monitoring/js/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" />
<link href="{{ asset('_monitoring/css/css/fileuploadernew.css')}}" />
<link href="{{ asset('_monitoring/css/css/jquery.dm-uploader.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
{{-- ORG Chart --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/css/jquery.orgchart.css" />
{{-- font awesome --}}
<link rel="stylesheet" href="{{ asset('_monitoring\css\icon\font-awesome\css\font-awesome.min.css')}}" />

{{-- This is dgme custom css for this page only ,write here any css you want to Ok!!! --}}
<link rel="stylesheet" href="{{asset('_monitoring/css/css/_dgme/DGME_officer_inprogressSingle.css')}}" />
<style media="screen">
    /* html{scroll-behavior: smooth;} */
    .paddtopbottom1per{padding: 1% 0% !important;}
    .media{display: block !important;}
    #html_btn {width: 90%;position: absolute;opacity: 0;cursor: pointer;left: 5%;}
    .text_center{text-align: center;}
    .text_left{text-align: left;}
    .new_Btn {cursor: pointer;}
    .nav-link {padding: .5rem .5rem !important;}
    @media only screen and (max-width: 420px){
    .ms-container .ms-selectable, .ms-container .ms-selection {
        width: 50% !important;
        /* clear: both; */
        float: left !important;
    }}
    .ms-container{width: 100% !important;}
    .wd-5p{width: 5% !important;}
    .mt_6p{margin-top: 6%;}
    .pd_1{padding: 1% !important;margin-bottom: 2%;border-radius: 3px;}
    .bg_g{background-color: #00000014}
    input{background: transparent !important;border: 1px solid #77777747 !important;}
    .bg_yelop{background-color: #92ac0126;}
    .clearfix{clear: both !important;}
    .textlef{text-align: left !important;}
    .mb_2{margin-bottom: 2% !important;}
    .mb_1{margin-bottom: 1% !important;}
    .font-15{font-size: 15px !important;}
    .pd_1_2{padding: 1% 2% !important}
    .pd_1_6{padding: 1% 6% !important}
    .row{padding-left: 0px !important;padding-right: 0px !important;}
    .DisInlineflex{display: inline-flex !important;}
    .border_right{border-right:1px solid #e9ecef !important}
    .border_left{border-left:1px solid #e9ecef !important}
    .bg_sk{background: #01a9ac14;}
    .bg_or{background: #fe936524;}
    .mr_0_1{margin:0% 1% !important;}
    /* p{clear: both !important;} */
    .select2-container--default .select2-selection--multiple .select2-selection__rendered li{color: #131010b8 !important;background: transparent !important;border: none;}
    .select2-container--default .select2-selection--multiple .select2-selection__choice span{color: #777 !important;}
    .select2-container--default.select2-container--focus .select2-selection--multiple {border: 1px solid #01a9ac !important;border-top-color: rgb(1, 169, 172) !important;border-top-style: solid !important;border-top-width: 1px !important;border-right-color: rgb(1, 169, 172) !important;border-right-style: solid !important;border-right-width: 1px !important;border-bottom-color: rgb(1, 169, 172) !important;border-bottom-style: solid !important;border-bottom-width: 1px !important;border-left-color:rgb(1, 169, 172) !important;border-left-style: solid !important;border-left-width: 1px !important;border-image-source: initial !important;border-image-slice: initial !important;border-image-width: initial !important;border-image-outset: initial !important;border-image-repeat: initial !important;
}
    .select2-container{width: 100% !important;}
    .capitalize{text-transform: capitalize;}
    .select2-search input{border:none !important;}
    .fullHeight{height: 100% !important;}
    .aho{background: #01a9ac;color: #fff;}
    .aho:active{background: #01a9acd6;border: 1px solid #01a9ac;}
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    background-color: transparent !important;
    color: #444;
    padding: 0px !important;
}
.headText{font-size: 15px;text-transform: capitalize;}
.boldText{font-weight: 900;}
.New_Assignments a{color : #FE8A7D !important;}
.Monitoring_Projects{color : #FE8A7D !important;}
.red{color: #F22525 !important;font-size: 21px;font-weight: 900;}
.blue{color: #7942FA !important;font-size: 21px;font-weight: 900;}
.sky{color: #42BDFA !important;font-size: 21px;font-weight: 900;}
.green{color: green !important;font-size: 21px;font-weight: 900;}
.errortiQ{color: #A91F1A !important;font-size: 25px;font-weight: 900;}
.tdprocu{padding: 0px !important;text-align: center !important;}
.modal-open, .modal{overflow-x: scroll !important;}
/* .orgchart{background: #fff !important;} */
</style>

@endsection
@section('content')
    {{-- frozen panel for plan and conduct monitoring  --}}
    <div class="fixed bg-g hidden-sm hidden-xs topSummary capitalize" style="">
    <div class="bg-w border_top bg-w" style="padding:0.25rem !important;" >
      <style scoped>
          .form-group{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;}
          .form-group{padding: 0.05rem 0.75rem !important;}
          .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{padding-left: 0px !important;padding-right: 0px !important;}
          label{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;padding:0rem 0.3rem !important;font-size: 12px !important;}
        @media only screen and (max-width: 1024px)
          {
            .topSummary
              {
                margin-top:-4% !important;z-index:999; margin-left:-4% !important;
              }
          }
      </style>
                  <div class="col-md-12">
                      <label for="project_title" class="">Project Title: <span><b>{{$project->Project->title}}</b></span></label>
                  </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="GS_no" class="">GS #: <span><b>{{$project->Project->ADP}}</b></span></label>
                    </div>
                    <div class="col-md-2 ln_ht12">
                        <label for="project_cost" class="">Location: <span><b>
                          @foreach ($project->Project->AssignedDistricts as $district)
                            {{$district->District->name}},
                          @endforeach
                        </b></span></label>
                    </div>
                    <div class="col-md-2">
                        <label for="PHI" class="">PHI </label>
                        <input name="phi" id="#phi" type="number" class="frozen_pane widthInh"/>
                    </div>
                    <div class="col-md-2 ln_ht12">
                        <label for="Location" class="">final Revised Cost: <span><b>
                          @php
                            $revisedFinalCost=0;
                          @endphp
                          @foreach ($project->Project->RevisedApprovedCost as $cost)
                            @php
                              $revisedFinalCost= $cost->cost;
                            @endphp
                          @endforeach
                          {{round($revisedFinalCost,2)}}
                        </b></span></label>
                    </div>
                    <div class="col-md-2 ln_ht12">
                        <label for="project_cost" class="">Original Approve Cost: <span><b>{{round($project->Project->ProjectDetail->orignal_cost,2)}}</b></span></label>
                    </div>
                    <div class="col-md-2">
                        <label for="planned_start_date" class="">Planned Start Date: <span><b>{{$project->Project->ProjectDetail->planned_start_date}}</b></span></label>
                    </div>
                    <div class="col-md-2">
                        <label for="planned_end_date" class="">Planned End Date: <span><b>{{$project->Project->ProjectDetail->planned_end_date}}</b></span> </label>
                    </div>
                    <div class="col-md-2">
                        <label for="actual_start_date" class="">Actual Start Date </label>
                    </div>
                    <div class="col-md-2 ln_ht12">
                        <label for="" name="phy_progress" id="phy_progress" class="">Physical Progress: <span><b  style="font-size:13px;">{{calculateMPhysicalProgress($project->MProjectProgress->last()->id)}}%</b></span></label>
                    </div>
                    <div class="col-md-2">
                        {{-- <label for="Financial" class="">Financial Progress %</label> --}}
                        {{-- <input type="text"  id="f_progress" class="" name="f_progress" value=""> --}}
                    <label for="" name="f_progress" id="f_progress" class="">Financial Progress: <span ><b style="font-size:13px;">{{calculateMFinancialProgress($project->MProjectProgress->last()->id)}}%</b></span></label>
                    </div>
                    <div class="col-md-2">
                        <label for="last_monitoring" class="">Last Monitoring Date </label>
                    </div>
                </div>
        </div>
    </div>
    <!--start show project detail btn-->
      <div class="col-md-1 hidden-sm hidden-xs text-center downtiQ nodisplay"  title="Show Project Detail">
        <div class="offset-md-2 col-md-5 border golbtn">
          <i class="fa fa-angle-double-down"></i>
        </div>
      </div>
    <!--end show project detail btn-->

    {{-- end of frozen panel --}}
    <div class="row">
            <div class="col-md-12 mainTabsAndNav mt_6p" style="padding-left: 15px !important;padding-right: 15px !important;">
                <!-- start hide project detail btn -->
                <div class="col-md-1 hidden-sm hidden-xs text-center uptiQ" title="Hide Detail">
                  <div class="offset-md-2 col-md-5 border golbtn">
                    <i class="fa fa-angle-double-up"></i>
                  </div>
                </div>
                <!-- end hide project detail btn -->
                    <div class="card" style="box-shadow: 0px 0px 33px #77777769;">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <div class="row m-b-30">
                                <div class="col-md-12">
                                  <!-- Nav tabs -->
                                  <ul class="nav nav-tabs md-tabs" role="tablist">
                                      <li class="nav-item reviewTab">
                                          <a class="nav-link active" data-toggle="tab" href="#reviewDiv" role="tab"><span style="font-size:14px; font-weight:bold;">REVIEW</span></a>
                                          <div class="slide"></div>
                                      </li>
                                      <li class="nav-item planNav">
                                          <a class="nav-link" data-toggle="tab" href="#p_monitoring" role="tab"><span style="font-size:14px; font-weight:bold;">PLAN MONITORING</span></a>
                                          <div class="slide"></div>
                                      </li>
                                      <li class="nav-item conductNav">
                                          <a class="nav-link" data-toggle="tab" href="#c_monitoring" role="tab"><span style="font-size:14px; font-weight:bold;">CONDUCT MONITORING</span></a>
                                          <div class="slide"></div>
                                      </li>
                                      <li class="nav-item resultNav">
                                          <a class="nav-link" data-toggle="tab" href="#r_monitoring" role="tab"><span style="font-size:14px; font-weight:bold;">RESULT MONITORING</span></a>
                                          <div class="slide"></div>
                                      </li>
                                      <li class="nav-item summaryNav">
                                        <a class="nav-link" data-toggle="tab" href="#summary" role="tab"><span style="font-size:14px; font-weight:bold;">SUMMARY</span></a>
                                        <div class="slide"></div>
                                      </li>
                                  </ul>
                                    <!-- Tab panes -->
                                    @php
                                        $teamflag=false;
                                      $teamflag =  $project->AssignedProjectTeam->where('user_id',Auth::id())->first()->team_lead==1;
                                      if(count($project->AssignedProjectTeam)==1)
                                         $teamflag=true;
                                    @endphp
                                    <div class="tab-content card-block" style="">
                                        @include('_Monitoring/inc/monitoring/reviewDiv')
                                        @include('_Monitoring/inc/monitoring/planmonitoring')
                                        @include('_Monitoring/inc/monitoring/conduct_monitoring')
                                        @include('_Monitoring/inc/monitoring/r_monitoring')
                                        @include('_Monitoring/inc/monitoring/summary')
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Form Basic Wizard card end -->
                    </div>
            </div>
            <div class="col-xl-3 col-lg-12 nodisplay p_details" style="padding-left: 15px !important;  padding-right: 15px !important;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text"><i class="icofont icofont-ui-note m-r-10"></i> Project Details</h5>
                    </div>
                    <div class="card-block task-details">
                        <table class="table table-border table-xs">
                            <tbody>
                                <tr>
                                    <td><i class="icofont icofont-contrast"></i> Project:</td>
                                    <td class="text-center"><span class="f-center"><a href="#"> {{$project->Project->title}}</a></span></td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-meeting-add"></i> Financial Progress:</td>
                                <td class="text-center">{{calculateMFinancialProgress($project->MProjectProgress->last()->id)}}%</td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-id-card"></i> Physical Progress:</td>
                                    <td class="text-center">{{calculateMPhysicalProgress($project->MProjectProgress->last()->id)}}%</td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-user"></i> Assigned by:</td>
                                    <td class="text-center">({{$project->getassignedperson($project->assigned_by)->designation}}) {{$project->getassignedperson($project->assigned_by)->first_name}}{{$project->getassignedperson($project->assigned_by)->last_name}} </td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-spinner-alt-3"></i> Revisions:</td>
                                    <td class="text-center">{{$progresses->count()}}</td>
                                </tr>

                                <tr>
                                    <td><i class="icofont icofont-washing-machine"></i> Status:</td>
                                    <td class="text-center">{{$project->Project->status ? 'Active' : 'In-Active'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div>
                            <span>
                                <a href="#!" class="text-muted m-r-10 f-16"><i class="icofont icofont-random"></i> </a>
                            </span>
                            <span class="m-r-10">
                                <a href="#!" class="text-muted f-16"><i class="icofont icofont-options"></i></a>
                            </span>
                            <div class="dropdown-secondary dropdown d-inline-block">
                                <button class="btn btn-sm btn-primary dropdown-toggle waves-light" type="button" id="dropdown3"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn"
                                    data-dropdown-out="fadeOut">
                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-checked m-r-10"></i>Check
                                        in</a>
                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-attachment m-r-10"></i>Attach
                                        screenshot</a>
                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-rotation m-r-10"></i>Reassign</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-edit-alt m-r-10"></i>Edit
                                        task</a>
                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-close m-r-10"></i>Remove</a>
                                </div>
                                <!-- end of dropdown menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

                  <!-- Modal 1 WBS Chart-->
                  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document" style="min-width: 202500px !important;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">WBS Chart</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="WBSChart">

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>






        <!-- Modal 2 Gantt Chart-->
        <div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Gantt Chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="ganttChart" >
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

@endsection
@section("js_scripts")
<!-- Multiselect js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
<script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script>

{{-- date dropper --}}
<script src="{{asset('_monitoring/css/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/custom-picker.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="{{asset('_monitoring/js/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/modalEffects.js')}}"></script>
<script src="{{asset('_monitoring/css/js/classie.js')}}"></script>
<script src="{{asset('_monitoring/css/js/modal.js')}}"></script>
{{-- data-table --}}
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
<!-- jquery file upload js -->
 {{-- <script src="{{asset('_monitoring/js/jquery.filer/js/jquery.filer.min.js')}}"></script>
<script src="{{asset('_monitoring/js/filer/custom-filer.js')}}"></script>
<script src="{{asset('_monitoring/js/filer/jquery.fileuploads.init.js')}}"></script>
<script src="{{asset('_monitoring/js/pcoded.min.js')}}"></script> --}}
<script src="{{asset('_monitoring/js/vartical-layout.min.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('_monitoring/js/script.js')}}"></script>
{{-- new js for file upload  --}}
<script src="{{asset('_monitoring/js/jquery.dm-uploader.min.js')}}"></script>
<script src="{{asset('_monitoring/js/demo-ui.js')}}"></script>
<script src="{{asset('_monitoring/js/demo-config.js')}}"></script>
{{-- this is custom dgme js for this page only Ok ? if you want to add kindly add here dont mess here!! --}}
<!-- File item template -->
<script type="text/html" id="files-template">
    <li class="media">
        <div class="media-body mb-1">
            <p class="mb-2">
                <strong>%%filename%%</strong>
                <!-- - Status: <span class="text-muted">Waiting</span> -->
            </p>
            <!-- <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                role="progressbar"
                style="width: 0%"
                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div> -->
        <hr class="mt-1 mb-1" />
    </div>
</li>
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.js"></script>
<script src="{{asset('_monitoring/js/_dgme/DGME_officer_inprogressSingle.js')}}"></script>
<script>


$(document).ready(function(){
    if("{{$teamflag}}"!=true){
        $('form.serializeform :input,form.serializeform :button,form.serializeform select').attr('disabled','disabled');
    }
    var compData='';
    var activities='';
    var sponsoringAgency='';
    var executingAgency='';

    function getWBS(route,id){
        axios.get(route,{
     params:{
         "assigned_project_id":id,
     }
     })
     .then((response) => {
         var ds ='';
         for (let i = 0; i < response.data.m_kpi.sector.length; i++) {
             console.log(response.data.m_kpi.sector);

             ds = response.data.m_kpi.sector[i];
            var oc = $('#WBSChart').orgchart({
            'data' : ds,
            'nodeContent': 'title'
            });
         }

    //    $('.'+response.data.role+'_unassigned_counter').text(response.data.unassigned);
     })
     .catch(function (error) {
       console.log(error);
     });

   }
   var wbs=true;

   $('.summaryNav').on('click', function () {
        if(wbs){
            getWBS('{{route("getProjectKpi")}}',"{{$project->id}}");
            wbs=false;
        }
    });
        (function($) {
            console.log();

                axios.post('{{route("getProjectComponents")}}',{
                      MProjectProgressId:'<?= $monitoringProjectId ?>'
                    })
                    .then(response => {
                       compData=response.data
                    //    console.log(response);
                       componentsfroConductMonitoring(compData)

                    }
                )
                .catch(function (error) {
                    console.log(error);
                });

        }) ();

        (function($) {

                axios.post('{{route("getProjectActivities")}}',{
                      MProjectProgressId:'<?= $monitoringProjectId ?>'
                    })
                    .then(response => {
                        activities=response.data
                       console.log(response,"sad");
                       activitiesfroConductMonitoring(activities)

                    }
                )
                .catch(function (error) {
                    console.log(error);
                });

        }) ();

        (function($) {

                axios.post('{{ route("getAssignedSponsoringAgency") }}',{
                    originalProjectId:'<?= $org_projectId ?>',
                    // _token: '{{ csrf_field() }}'
                    })
                    // console.log("sponsoring");
                    .then(response => {
                        sponsoringAgency=response.data
                       console.log(response,"sponsoring");
                       sponsoringAgencyforCM(sponsoringAgency)

                    }
                )
                .catch(function (error) {
                    console.log(error);
                });

        }) ();

         (function($) {

                axios.post('{{ route("getAssignedExecutingAgency") }}',{
                    originalProjectId:'<?= $org_projectId ?>',
                    // _token: '{{ csrf_field() }}'
                    })
                    // console.log("sponsoring");
                    .then(response => {
                        executingAgency=response.data
                       console.log(response,"executingAgency");
                       executingAgencyforCM(executingAgency)

                    }
                )
                .catch(function (error) {
                    console.log(error);
                });

        }) ();


//     (function($) {

//  axios.get('http://0188606c.ngrok.io/api/projectRelatedKpi',{
//      params:{
//          "assigned_project_id":1034,
//      }
//      })
//      .then((response) => {
//          console.log(response.data.data.m_kpi.sector);

//      //   $('.'+response.data.role+'_unassigned_counter').text(response.data.unassigned);
//      })
//      .catch(function (error) {
//        console.log(error);
//      });
//    })();

    // WBS Chart Start
// (function($) {
//   $(function() {
//    var ds = {
//      'name': 'Infrastructure Projects',
//      'children': [
//        { 'name': 'Roads', 'title': '',
//        'children':[
//         {'name':'Flexible Pavements',
//           'children': [
//             {'name':'Mobilization / Site Clearance', 'title' :'3 %'},
//             {'name':'Excavation (Cut & Fill)','title':'2 % '},
//             {'name':'Road Construction','title':'70 %',
//              'children':[
//                {'name':'Asphalt Base Course ','title':'12%',
//                 'children':[
//                   {'name':'Prime Coat','title':'2%'},
//                   {'name':'Laying of Asphalt Base Course','title':'10%'}
//                 ]
//                },
//                {'name':'Asphalt Wearing Course ','title':'12%',
//                 'children':[
//                   {'name':'Tack Coat','title':'2%'},
//                   {'name':'Laying of Wearing Course','title':'6%'}
//                 ]

//                },
//                {'name':'Aggregate Base Course','title':'15%'},
//                {'name':'Sub Base','title':'15%'},
//                {'name':'Sub Grade','title':'10%'},
//                {'name':'Median','title':'5%'},
//                {'name':'Shoulder Dressing','title':'5%'},
//              ]
//             },
//           ]
//         },
//         {'name':'Rigid Pavements'},
//        ]
//      }]
//     };

// axios.get('{{route("getProjectKpi")}}',{
//      params:{
//          "assigned_project_id":"{{$project->id}}",
//      }
//      })
//      .then((response) => {
//          console.log(response.data.m_kpi.sector);
//          var ds = response.data.m_kpi.sector[0];
//         var oc = $('#WBSChart').orgchart({
//         'data' : ds,
//         'nodeContent': 'title'
//         });

//      //   $('.'+response.data.role+'_unassigned_counter').text(response.data.unassigned);
//      })
//      .catch(function (error) {
//        console.log(error);
//      });

//   });
// })(jQuery);

  $('form.serializeform').on('submit',function(e){

    e.preventDefault();
      $.ajax( {
      data: new FormData(this),
      type: $( this ).attr( 'method' ),
      url: $(this).attr('action'),
      cache:false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function( feedback ){
          console.log(feedback);
          if(feedback.resType=="ObjectiveAndComponents"){
            ObjectiveComponent(feedback.data.components,feedback.data.objectives);
          }
          if(feedback.resType=="forTime"){
            ObjectiveComponentTime(feedback.data.CompActivityMapping);
            console.log('done');

          }
        //   if(feedback){
            toast({
            type: feedback.type,
            title: feedback.msg
          })
        //   }
        //   else{
            //   alert("Data saved successfully");
        //   }
      },
      error:function(err){
            toast({
            type: 'error',
            title: err
            })
          }
    });
  });
  var count=0;
  var compopt='';
  $('li.optiontest').on('click', function () {
        compopt='';
    console.log(compData);

        for (let index = 0; index < compData.length; index++) {
            compopt+='<option value="'+compData[index].id+'">'+compData[index].component+'</option>';
            console.log(index);

        }
        console.log(compopt,compData.length);

        var t = $(this).attr('id').toString()
        var b = true;
            if(t.split('-s')[1]=='election'){
                b = false;
                $('#addkpi').find('#' + t).remove()
            }

            if (b) {
               var Li=`<li id='` + t.split('-s')[0]+'-selection' + `' class="col-md-12 row" style="margin-top:5px;">
                    <div class='col-md-6'>
                        <span name="kpiname[]"> `+ $(this).text() + `</span>

                       <input type="hidden" name='kpinamesId[]' value='`+$(this).attr('data-value')+`'/>
                        </div>
                    <div class="col-md-6">
                        <select class="kpisel col-sm-12" name='mappedKpicomponent_`+count+`[]' multiple="multiple" id="optionsHere">
                    `+ compopt +`
                        </select>
                    </div>
                    </li>`;
                    count++;
                $(Li).appendTo('#addkpi')


                // console.log($('#addkpi').find());
                $('.kpisel').select2()
            }

    })

  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if (scroll > 380)
    {
      $("#table-1 > thead").css({ "position": "fixed", "margin-top": "-26.1%", "background": "#fff", "z-index": "999"});
      $("#table-1 > thead > tr > th:eq(0)").css({"width": "45px"});
      $("#table-1 > thead > tr > th:eq(1)").css({"width": "128px"});
      $("#table-1 > thead > tr > th:eq(2)").css({"width": "171px"});
      $("#table-1 > thead > tr > th:eq(3)").css({"width": "171px"});
      $("#table-1 > thead > tr > th:eq(4)").css({"width": "171px"});
      $("#table-1 > thead > tr > th:eq(5)").css({"width": "171px"});
      $("#table-1 > thead > tr > th:eq(6)").css({"width": "50px"});
      $("#table-1 > thead > tr > th").css({"border-left": "none", "border-right": "none"});
      // $("#table-1 > thead > tr > #action").hide();
    }
    else
     {
       $("#table-1 > thead").css({ "position": "relative", "background": "#fff"});
       // $("#table-1 > thead > tr > th").css({ "width": "171px", "border-left": "none", "border-right": "none"});
       $("#table-1 > thead > tr > #action").show();
     }
  });

});
</script>
<script type="text/javascript">
let modalId = $('#image-gallery');

$(document)
.ready(function () {

  loadGallery(true, 'a.thumbnail');

  //This function disables buttons when needed
  function disableButtons(counter_max, counter_current) {
    $('#show-previous-image, #show-next-image')
      .show();
    if (counter_max === counter_current) {
      $('#show-next-image')
        .hide();
    } else if (counter_current === 1) {
      $('#show-previous-image')
        .hide();
    }
  }

  /**
   *
   * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
   * @param setClickAttr  Sets the attribute for the click handler.
   */

  function loadGallery(setIDs, setClickAttr) {
    let current_image,
      selector,
      counter = 0;

    $('#show-next-image, #show-previous-image')
      .click(function () {
        if ($(this)
          .attr('id') === 'show-previous-image') {
          current_image--;
        } else {
          current_image++;
        }

        selector = $('[data-image-id="' + current_image + '"]');
        updateGallery(selector);
      });

    function updateGallery(selector) {
      let $sel = selector;
      current_image = $sel.data('image-id');
      $('#image-gallery-title')
        .text($sel.data('title'));
      $('#image-gallery-image')
        .attr('src', $sel.data('image'));
      disableButtons(counter, $sel.data('image-id'));
    }

    if (setIDs == true) {
      $('[data-image-id]')
        .each(function () {
          counter++;
          $(this)
            .attr('data-image-id', counter);
        });
    }
    $(setClickAttr)
      .on('click', function () {
        updateGallery($(this));
      });
  }
});

// build key actions
$(document)
.keydown(function (e) {
  switch (e.which) {
    case 37: // left
      if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
        $('#show-previous-image')
          .click();
      }
      break;

    case 39: // right
      if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
        $('#show-next-image')
          .click();
      }
      break;

    default:
      return; // exit this handler for other keys
  }
  e.preventDefault(); // prevent the default action (scroll / move caret)
});
</script>
<!-- start treeview -->
<script type="text/javascript">
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
toggler[i].addEventListener("click", function() {
  this.parentElement.querySelector(".nested").classList.toggle("active");
  this.parentElement.querySelector(".nested").classList.toggle("nodisplay");
  this.classList.toggle("caret-right");
  this.classList.toggle("caret-down");
});
}
</script>
<!-- end treeview -->
<script type="text/javascript">
var check = true
  $('.photogallary').on('click', function () {
    if(check){
      $('.photogallaryDiv').css('display','inline-flex');
    }
    else{
      $('.photogallaryDiv').css('display','none');
    }
    check = !check
  });
  $('.vidgallary').on('click', function () {
    if(check){
      $('.vidgallaryDiv').css('display','inline-flex');
    }
    else{
      $('.vidgallaryDiv').css('display','none');
    }
    check = !check
  });
</script>
<script type="text/javascript">
// $('.nested').parent().on('click', function (){
//   $('.nested').css('display','none');
// })

</script>
@endsection
