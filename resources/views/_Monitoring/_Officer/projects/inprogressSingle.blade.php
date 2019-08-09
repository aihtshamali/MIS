@extends('_Monitoring.layouts.upperNavigation')
@section('title')
Monitoring | DGME
@endsection
@section('styleTags')
<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/icofont/css/icofont.css')}}" />
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
<link href="{{asset('lightRoom/lightgallery.css')}}" rel="stylesheet" /> 
@endsection
@section('content')
{{-- frozen panel for plan and conduct monitoring  --}}
@php
$maintab='review';
$innertab='cost';
if(\Session::has('maintab')){
$maintab=\Session::get('maintab');
$innertab=\Session::get('innertab');
}
@endphp
<div class="fixed bg-g hidden-sm hidden-xs topSummary capitalize nodisplay" style="">
  <div class="bg-w border_top bg-w" style="padding:0% 0% 0.5% 1% !important;">
    <style scoped>
      .form-group {
        margin-bottom: 0rem !important;
        border: none !important;
        background-color: transparent !important;
      }

      .form-group {
        padding: 0.05rem 0.75rem !important;
      }

      .col,
      .col-1,
      .col-10,
      .col-11,
      .col-12,
      .col-2,
      .col-3,
      .col-4,
      .col-5,
      .col-6,
      .col-7,
      .col-8,
      .col-9,
      .col-auto,
      .col-lg,
      .col-lg-1,
      .col-lg-10,
      .col-lg-11,
      .col-lg-12,
      .col-lg-2,
      .col-lg-3,
      .col-lg-4,
      .col-lg-5,
      .col-lg-6,
      .col-lg-7,
      .col-lg-8,
      .col-lg-9,
      .col-lg-auto,
      .col-md,
      .col-md-1,
      .col-md-10,
      .col-md-11,
      .col-md-12,
      .col-md-2,
      .col-md-3,
      .col-md-4,
      .col-md-5,
      .col-md-6,
      .col-md-7,
      .col-md-8,
      .col-md-9,
      .col-md-auto,
      .col-sm,
      .col-sm-1,
      .col-sm-10,
      .col-sm-11,
      .col-sm-12,
      .col-sm-2,
      .col-sm-3,
      .col-sm-4,
      .col-sm-5,
      .col-sm-6,
      .col-sm-7,
      .col-sm-8,
      .col-sm-9,
      .col-sm-auto,
      .col-xl,
      .col-xl-1,
      .col-xl-10,
      .col-xl-11,
      .col-xl-12,
      .col-xl-2,
      .col-xl-3,
      .col-xl-4,
      .col-xl-5,
      .col-xl-6,
      .col-xl-7,
      .col-xl-8,
      .col-xl-9,
      .col-xl-auto {
        padding-left: 0px !important;
        padding-right: 0px !important;
      }

      label {
        margin-bottom: 0rem !important;
        border: none !important;
        background-color: transparent !important;
        padding: 0rem 0.3rem !important;
        /* font-size: 12px !important; */
        font-size: inherit;
      }

      .font-18 {
        font-size: 18px !important;
      }

      .fontf_sh {
        font-size: 14px !important;
        font-weight: 600 !important;
      }

      /* .progress-bar{color: #000 !important;} */
      .progress-bar-success {
        background-color: #007b1b;
      }

      .progress {
        background: #6967674f !important;
      }

      .pdz_six {
        padding: 0% 6% !important;
      }

      .topsummaryinput {
        font-size: 14px !important;
        padding: 0px !important;
        font-weight: 600 !important;
        border: none !important;
        color: #1e2d52 !important;
        max-width: 115px !important
      }

      @media only screen and (max-width: 1024px) {
        .topSummary {
          margin-top: -4% !important;
          z-index: 999;
          margin-left: -4% !important;
        }
      }
    </style>
    <div class="col-md-12">
      <center>
        <b class="primarybold mb_1 font-18">
          <span>Project Title</span> <span class=""> :</span>
          <span class="black">{{$project->Project->title}}</span>
        </b>
      </center>
    </div>
    <div class="col-md-12 ln_ht12">
      <b for="project_cost" class=""><span>Location: </span></b><span>
        @foreach ($assigned_districts as $district)
        {{$district->District->name}},
        @endforeach
      </span>
    </div>
    <div class="form-group row">
      <div class="col-md-3">
        <p for="GS_no" class=" mb_1"><span class="fontf_sh">GS #: </span><span>{{$project->Project->ADP}}</span></p>
      </div>
      <div class="col-md-3">
        <p for="gestation Period" class=" mb_1 "><span title="Gestation Period" class="fontf_sh">Gest. Period: </span><span>

            {{$gestation_period}}

          </span> </p>
      </div>
      <div class="col-md-3 ln_ht12">
        <p for="project_cost" class=" mb_1 "><span class="fontf_sh">Original Approve Cost:</span> <span>{{round($project->Project->ProjectDetail->orignal_cost,3)}}<small>Million PKR</small></span></p>
      </div>

      <div class="col-md-3 ln_ht12">
        <p for="Location" class=" mb_1 "><span class="fontf_sh">final Revised Cost:</span>
          @if($project->Project->RevisedApprovedCost->last())
          {{round($project->Project->RevisedApprovedCost->last()->cost,3)}}
          @else
          0
          @endif
          <small>Million PKR</small>
        </p>
      </div>
      <div class="col-md-3">
        <p for="Date_of_visit" class=" mb_1 "><span class="fontf_sh">First Visit Date: </span>
          <span>
            @if(isset($first_visit_date->first_visit_date))
            @php
            $originalDate=$first_visit_date->first_visit_date;
            $date = date("d-M-Y", strtotime($originalDate));
            // echo $date;
            @endphp
            {{$date}}

            @endif
          </span> </p>
      </div>
      <div class="col-md-3">
        <p for="planned_start_date" class=" mb_1 "><span class="fontf_sh">Planned Start Date: </span>
          <span>
            @php
            $originalDate=$project->Project->ProjectDetail->planned_start_date;
            $date = date("d-M-Y", strtotime($originalDate));
            // echo $date;
            @endphp
            {{$date}}
          </span>
        </p>
      </div>
      <div class="col-md-3">
        <p for="planned_end_date" class=" mb_1"><span class="fontf_sh">Planned End Date: </span>
          <span>
            @php
            $originalDate=$project->Project->ProjectDetail->planned_end_date;
            $date = date("d-M-Y", strtotime($originalDate));
            // echo $date;
            @endphp
            {{$date}}
          </span>
        </p>
      </div>
      <div class="col-md-3">
        <p for="actual_start_date" class=" mb_1"><span class="fontf_sh">Actual Start Date: </span>
          <span>
            @if(isset($dates->actual_start_date))
            @php
            $originalDate=$dates->actual_start_date;
            $date = date("d-M-Y", strtotime($originalDate));
            // echo $date;
            @endphp
            {{$date}}

            @endif
          </span>
        </p>
      </div>
      {{-- <div class="col-md-3 ln_ht12">
                        <b for="Location" class=" mb_1 fontf_sh"><span >final Revised Cost:</span> 
                          @if($project->Project->RevisedApprovedCost->last())
                            {{round($project->Project->RevisedApprovedCost->last()->cost,3)}}
      @else
      0
      @endif
      Million PKR
      </b>
    </div> --}}
    <div class="col-md-3">
      <p for="earned_value" class=" mb_1"><span class="fontf_sh">Earned Value: </span><span>{{round(calculateEarnedvalue($project->MProjectProgress->last()->id),3)}} </span></p>
    </div>
    <div class="col-md-3">
      <P for="actual_value" class=" mb_1"><span class="fontf_sh">Planned Value: </span><span>{{round(calculatePlannedValue($project->MProjectProgress->last()->id),3)}} </span></p>
    </div>
    <div class="col-md-3">
      <p for="cost_performance" class=" mb_1"><span class="fontf_sh">Cost Performace Index (CPI): </span><span>{{round(costPerformanceindex($project->MProjectProgress->last()->id),2)}}%</span></p>
    </div>
    <div class="col-md-3">
      <p for="spi" class=" mb_1"><span class="fontf_sh">Schedule Performance Index (SPI): </span><span>{{round(scheduledPerformanceindex($project->MProjectProgress->last()->id),2)}}%</span></p>
    </div>
    <div class="col-md-3">
      <p for="eac" class=" mb_1"><span class="fontf_sh">Estimated At Completion : </span><span>{{round(estimatedAtCompletion($project->MProjectProgress->last()->id),3)}}</span></p>
    </div>
    <div class="col-md-3 ln_ht12">
      <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Planned Progress %: </span>
        <span class="pdz_six" id="PlannedProg">{{round(calculatePlannedProgress($project->MProjectProgress->last()->id),2)}}%</span>
      </p>
    </div>
    <div class="col-md-3">
      <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Financial Progress:</span>
        <span class="pdz_six" id="financialprog">{{round(calculateMFinancialProgress($project->MProjectProgress->last()->id),2)}}%</span>
      </p>
    </div>
    <div class="col-md-3">
      <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">All Progress:</span>
        <span class="pdz_six" id="">{{round(calculateTotalMPhysicalProgress($project->MProjectProgress->last()->id),2)}}%</span>
      </p>
    </div>
    <div class="col-md-3 ln_ht12">
      <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Physical Progress: </span>
        <span class="pdz_six" id="Physicalprog">{{round(calculateMPhysicalProgress($project->MProjectProgress->last()->id),2)}}%</span>
        <br /><small>(against Total Releases To Date)</small>
      </p>
    </div>
  </div>
</div>
</div>
<!--start show project detail btn-->
<div class="col-md-1 hidden-sm hidden-xs text-center downtiQ " title="Show Project Detail">
  <div class="offset-md-2 col-md-5 border golbtn">
    <i class="fa fa-angle-double-down"></i>
  </div>
</div>
<!--end show project detail btn-->

{{-- end of frozen panel --}}
<div class="row">
  <div class="col-md-12 mainTabsAndNav" style="padding-left: 15px !important;padding-right: 15px !important;">
    <!-- start hide project detail btn -->
    <div class="col-md-1 hidden-sm hidden-xs text-center uptiQ nodisplay" title="Hide Detail">
      <div class="offset-md-2 col-md-5 border golbtn">
        <i class="fa fa-angle-double-up"></i>
      </div>
    </div>
    <!-- end hide project detail btn -->
    <div class="card" style="    margin-top: 5%; box-shadow: 0px 0px 33px #77777769;">
      <div class="card-block">
        <div class="row m-b-30">
          <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
              <li class="nav-item reviewTab">
                <a class="nav-link {{isset($maintab) && $maintab=='review' ? 'active' : ''}}" data-toggle="tab" href="#reviewDiv" role="tab"><span style="font-size:14px; font-weight:bold;">REVIEW</span></a>
                <div class="slide"></div>
              </li>
              <li class="nav-item planNav">
                <a class="nav-link {{isset($maintab) && $maintab=='plan' ? 'active' : ''}}" data-toggle="tab" href="#p_monitoring" role="tab"><span style="font-size:14px; font-weight:bold;">PLAN MONITORING</span></a>
                <div class="slide"></div>
              </li>
              <li class="nav-item conductNav  {{isset($maintab) && $maintab=='conduct' ? 'active' : ''}}">
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
            $teamflag = $project->AssignedProjectTeam->where('user_id',Auth::id())->first()->team_lead==1;
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
  <div class="col-md-3 nodisplay p_details" style="padding-left: 15px !important;  padding-right: 15px !important;">
    <div class="card">
      <div class="card-header">
        <h5 class="card-header-text"><i class="icofont icofont-ui-note m-r-10"></i> Project Details</h5>
      </div>
      <div class="card-block task-details">
        <table class="table table-border table-xs">
          <div class="card-block task-details">
            <table class="table table-border table-xs">
              <tbody>
                <tr>
                  <td><i class="icofont icofont-ebook"></i> Generate Report :</td>
                  <td class="text-center" style="vertical-align:middle;"><span class="f-center"><a href="{{route('generate_monitoring_report',['project_id'=>$project->id])}}"><b style="color:red;">Click here to view & download report</b></a></span></td>
                </tr>
                <tr>
                  <td><i class="icofont icofont-contrast"></i> Project:</td>
                  <td class="text-center" style="vertical-align:middle;"><span class="f-center"><a href="#"> {{$project->Project->title}}</a></span></td>
                </tr>
                <tr>
                  <td><i class="icofont icofont-meeting-add"></i> Financial Progress:</td>
                  <td class="text-center" style="vertical-align:middle;">{{round(calculateMFinancialProgress($project->MProjectProgress->last()->id),2)}}%</td>
                </tr>
                <tr>
                  <td><i class="icofont icofont-id-card"></i> Physical Progress:</td>
                  <td class="text-center" style="vertical-align:middle;">{{round(calculateMPhysicalProgress($project->MProjectProgress->last()->id),2)}}%</td>
                </tr>
                <tr>
                  <td><i class="icofont icofont-user"></i> Assigned by:</td>
                  <td class="text-center" style="vertical-align:middle;">({{$project->getassignedperson($project->assigned_by)->designation}}) {{$project->getassignedperson($project->assigned_by)->first_name}}{{$project->getassignedperson($project->assigned_by)->last_name}} </td>
                </tr>
                <tr>
                  <td><i class="icofont icofont-spinner-alt-3"></i> Revisions:</td>
                  <td class="text-center" style="vertical-align:middle;">{{$progresses->count()}}</td>
                </tr>

                <tr>
                  <td><i class="icofont icofont-washing-machine"></i> Status:</td>
                  <td class="text-center" style="vertical-align:middle;">{{$project->Project->status ? 'Active' : 'In-Active'}}</td>
                </tr>
              </tbody>
            </table>
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
        <div id="ganttChart">
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
<!-- <script src="{{asset('js/app.js')}}"></script> -->
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.inline('short_desc');
</script>
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

<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13">ye pele cmntd th</script> -->
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
{{-- end js for file upload  --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.js"></script>
<script src="{{asset('_monitoring/js/_dgme/DGME_officer_inprogressSingle.js')}}"></script>

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

<script>
  $(document).ready(function() {

    //   console.log("Team Lead Check " +team_lead_check);
    // if(!team_lead_check){

    //   $('input').prop('disabled',true);
    //   $('select').prop('disabled',true);
    //   $('button').prop('disabled',true);
    // }  
    var success = "{{Session::get('success')}}";
    if (success) {
      toast({
        type: 'success',
        title: success
      })
    }
    if ("{{$teamflag}}" != true) {
      $('form.serializeform :input,form.serializeform :button,form.serializeform select').attr('disabled', 'disabled');
    }
    var compData = '';
    var activities = '';
    var sponsoringAgency = '';
    var executingAgency = '';

    function getWBS(route, id) {
      axios.get(route, {
          params: {
            "user_location_id": id,
          }
        })
        .then((response) => {
          var ds = '';
          console.log(response);
          for (let i = 0; i < response.data.length; i++) {

            ds = response.data[i];
            var oc = $('#WBSChart').orgchart({
              'data': ds,
              'nodeContent': 'title'
            });
          }

          //    $('.'+response.data.role+'_unassigned_counter').text(response.data.unassigned);
        })
        .catch(function(error) {
          console.log(error);
        });

    }
    var wbs = true;

    $('.summaryNav').on('click', function() {
      if (wbs) {
        assigned_user_locations.forEach(element => {
          console.log('sa');

          getWBS('{{route("getProjectKpi")}}', element.id);
        });
        wbs = false;
      }
    });
    (function($) {

      axios.post('{{route("getProjectComponents")}}', {
          MProjectProgressId: '<?= $monitoringProjectId ?>'
        })
        .then(response => {
          compData = response.data
          //    console.log(response);
          componentsfroConductMonitoring(compData)

        })
        .catch(function(error) {
          console.log(error);
        });

    })();

    (function($) {

      axios.post('{{route("getProjectActivities")}}', {
          MProjectProgressId: '<?= $monitoringProjectId ?>'
        })
        .then(response => {
          activities = response.data
          activitiesfroConductMonitoring(activities)

        })
        .catch(function(error) {
          console.log(error);
        });

    })();

    (function($) {

      axios.post('{{ route("getAssignedSponsoringAgency") }}', {
          originalProjectId: '<?= $org_projectId ?>',
          // _token: '{{ csrf_field() }}'
        })
        .then(response => {
          // console.log(response);
          sponsoringAgency = response.data
          sponsoringAgencyforCM(sponsoringAgency)

        })
        .catch(function(error) {
          console.log(error);
        });

    })();

    (function($) {

      axios.post('{{ route("getAssignedExecutingAgency") }}', {
          originalProjectId: '<?= $org_projectId ?>',
          // _token: '{{ csrf_field() }}'
        })
        // console.log("sponsoring");
        .then(response => {
          executingAgency = response.data
          executingAgencyforCM(executingAgency)

        })
        .catch(function(error) {
          console.log(error);
        });

    })();


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

    // $('form.serializeform').on('submit',function(e){

    //   e.preventDefault();
    //     $.ajax( {
    //     data: new FormData(this),
    //     type: $( this ).attr( 'method' ),
    //     url: $(this).attr('action'),
    //     cache:false,
    //     contentType: false,
    //     processData: false,
    //     dataType: "json",
    //     success: function( feedback ){
    //         console.log(feedback);
    //         if(feedback.resType=="ObjectiveAndComponents"){
    //           ObjectiveComponent(feedback.data.components,feedback.data.objectives);
    //         }
    //         if(feedback.resType=="forTime"){
    //           ObjectiveComponentTime(feedback.data.CompActivityMapping);
    //           console.log('done');

    //         }
    //       //   if(feedback){
    //           toast({
    //           type: feedback.type,
    //           title: feedback.msg
    //         })
    //       //   }
    //       //   else{
    //           //   alert("Data saved successfully");
    //       //   }
    //     },
    //     error:function(err){
    //           toast({
    //           type: 'error',
    //           title: err
    //           })
    //         }
    //   });
    // });
    var count = 0;
    var compopt = '';
    $('li.optiontest').on('click', function() {
      compopt = '';

      for (let index = 0; index < compData.length; index++) {
        compopt += '<option value="' + compData[index].id + '">' + compData[index].component + '</option>';

      }

      var t = $(this).attr('id').toString()
      var b = true;
      if (t.split('-s')[1] == 'election') {
        b = false;
        $('#addkpi').find('#' + t).remove()
      }

      if (b) {
        var Li = `<li id='` + t.split('-s')[0] + '-selection' + `' class="col-md-12 row" style="margin-top:5px;">
                    <div class='col-md-4'>
                        <span name="kpiname[]"> ` + $(this).text() + `</span>

                       <input type="hidden" name='kpinamesId[]' value='` + $(this).attr('data-value') + `'/>
                    </div>
                    <div class="col-md-8">
                        <select class="kpisel col-sm-12" name='mappedKpicomponent_` + count + `[]' multiple="multiple" id="optionsHere">
                    ` + compopt + `
                        </select>
                    </div>
                    </li>`;
        count++;
        $(Li).appendTo('#addkpi')


        // console.log($('#addkpi').find());
        $('.kpisel').select2()
      }

    })

    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll > 380) {
        $("#table-1 > thead").css({
          "position": "fixed",
          "margin-top": "-26.1%",
          "background": "#fff",
          "z-index": "999"
        });
        $("#table-1 > thead > tr > th:eq(0)").css({
          "width": "45px"
        });
        $("#table-1 > thead > tr > th:eq(1)").css({
          "width": "128px"
        });
        $("#table-1 > thead > tr > th:eq(2)").css({
          "width": "171px"
        });
        $("#table-1 > thead > tr > th:eq(3)").css({
          "width": "171px"
        });
        $("#table-1 > thead > tr > th:eq(4)").css({
          "width": "171px"
        });
        $("#table-1 > thead > tr > th:eq(5)").css({
          "width": "171px"
        });
        $("#table-1 > thead > tr > th:eq(6)").css({
          "width": "50px"
        });
        $("#table-1 > thead > tr > th").css({
          "border-left": "none",
          "border-right": "none"
        });
        // $("#table-1 > thead > tr > #action").hide();
      } else {
        $("#table-1 > thead").css({
          "position": "relative",
          "background": "#fff"
        });
        // $("#table-1 > thead > tr > th").css({ "width": "171px", "border-left": "none", "border-right": "none"});
        $("#table-1 > thead > tr > #action").show();
      }
    });

  });
</script>
<script type="text/javascript">
  let modalId = $('#image-gallery');

  $(document)
    .ready(function() {

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
          .click(function() {
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
            .each(function() {
              counter++;
              $(this)
                .attr('data-image-id', counter);
            });
        }
        $(setClickAttr)
          .on('click', function() {
            updateGallery($(this));
          });
      }
    });

  // build key actions
  $(document)
    .keydown(function(e) {
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
      this.parentElement.querySelector(".nested").classList.toggle("nodisplay");
      this.parentElement.querySelector(".nested").classList.toggle("active");
      this.classList.toggle("caret-right");
      this.classList.toggle("caret-down");
    });
  }
</script>
<!-- end treeview -->
<script type="text/javascript">
  var check = true
  $('.photogallary').on('click', function() {
    if (check) {
      $('.photogallaryDiv').css('display', 'inline-flex');
    } else {
      $('.photogallaryDiv').css('display', 'none');
    }
    check = !check
  });
  $('.vidgallary').on('click', function() {
    if (check) {
      $('.vidgallaryDiv').css('display', 'inline-flex');
    } else {
      $('.vidgallaryDiv').css('display', 'none');
    }
    check = !check
  });
</script>
<script type="text/javascript">
  // $('.nested').parent().on('click', function (){
  //   $('.nested').css('display','none');
  // })
  // zoom image start
  // var previous=0;
  //
  // $('.imggaltiQ').click(function(){
  //     previous=$(this);
  //
  //     previous.removeClass("fullWidth");
  //     previous.addClass("halfWidth");
  //     previous.css({'cursor':'zoom-in'});
  //     // console.log($('#'+previous).width());
  //     // console.log($('#'+previous).width()/$('#'+previous).parent().width() * 100);
  //     var trmp = $(this).width()/$(this).parent().width() * 100;
  //     trmp = Math.ceil(trmp/100)*100;
  //
  //     if($(this).width()!=trmp)
  //     {
  //       console.log(this);
  //
  //     previous.removeClass("halfWidth");
  //     previous.addClass("fullWidth");
  //     $(this).css({'cursor':'zoom-out'});
  //     }
  //
  // });
  // zoom image end
  $(document).ready(function() {
    $('#lightgallery').lightGallery();
  });
</script>
<script src="{{asset('lightRoom/picturefill.min.js')}}"></script>
<script src="{{asset('lightRoom/lightgallery-all.min.js')}}"></script>
<script src="{{asset('lightRoom/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var financialprogtxt = $('#financialprog').text();
    var financialprog = $('#financialprog');
    var financialprogtxtsplit = financialprogtxt.replace("%", "");
    if (financialprogtxtsplit <= 25) {
      financialprog.attr("class", "pdz_six redtXt");
    } else if (financialprogtxtsplit <= 50) {
      financialprog.attr("class", "orangetXt pdz_six");
    }
    // else if (temp<= 75 && temp>= 50) {
    //   status.addClass('blue');
    // }
    else if (financialprogtxtsplit <= 75) {
      financialprog.attr("class", "pdz_six yeltXt");
    } else if (financialprogtxtsplit <= 100) {
      financialprog.attr("class", "pdz_six greentXt");
    }
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var Physicalprogtxt = $('#Physicalprog').text();
    var Physicalprog = $('#Physicalprog');
    var Physicalprogtxtsplit = Physicalprogtxt.replace("%", "");
    if (Physicalprogtxtsplit <= 25) {
      Physicalprog.attr("class", "pdz_six redtXt");
    } else if (Physicalprogtxtsplit <= 50) {
      Physicalprog.attr("class", "orangetXt pdz_six");
    }
    // else if (temp<= 75 && temp>= 50) {
    //   status.addClass('blue');
    // }
    else if (Physicalprogtxtsplit <= 75) {
      Physicalprog.attr("class", "pdz_six yeltXt");
    } else if (Physicalprogtxtsplit <= 100) {
      Physicalprog.attr("class", "pdz_six greentXt");
    }
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var PlannedProgtxt = $('#PlannedProg').text();
    var PlannedProg = $('#PlannedProg');
    var PlannedProgtxtsplit = PlannedProgtxt.replace("%", "");
    if (PlannedProgtxtsplit <= 25) {
      PlannedProg.attr("class", "pdz_six redtXt");
    } else if (PlannedProgtxtsplit <= 50) {
      PlannedProg.attr("class", "orangetXt pdz_six");
    }
    // else if (temp<= 75 && temp>= 50) {
    //   status.addClass('blue');
    // }
    else if (PlannedProgtxtsplit <= 75) {
      PlannedProg.attr("class", "pdz_six yeltXt");
    } else if (PlannedProgtxtsplit <= 100) {
      PlannedProg.attr("class", "pdz_six greentXt");
    }
  });
</script>
<!-- for test upload -->
<script>
  const dropArea = document.getElementById('drop--area');

  ['dragenter', 'dragover'].forEach(event => {
    dropArea.addEventListener(event, function(e) {
      e.preventDefault();
      e.stopPropagation();
      dropArea.classList.add('highlight');
    });
  });

  ['dragleave', 'drop'].forEach(event => {
    dropArea.addEventListener(event, function(e) {
      e.preventDefault();
      e.stopPropagation();
      dropArea.classList.remove('highlight');
    });
  });

  dropArea.addEventListener('drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
    let dt = e.dataTransfer;
    let files = dt.files;
    handleFiles(files).then(result => {
      console.log(result.children)
    })
  });

  function handleFiles(files) {
    return new Promise((resolve, reject) => {
      const Files = Array.from(files);
      const createFileId = (length) => {
        let str = "";
        for (; str.length < length; str += Math.random().toString(36).substr(2));
        return str.substr(0, length);
      }
      Files.forEach(file => {
        file.id = createFileId((Math.round(file.lastModified * 100) / file.lastModified));
        uploadFile(file);
        previewFile(file);
      });

      resolve(document.getElementById('gallery'));
    })
  }

  function previewFile(file) {
    const reader = new FileReader();
    //console.log('file:id', file.id)
    reader.readAsDataURL(file);
    reader.onloadend = function() {
      const img = document.createElement('img');
      const fig = document.createElement('figure');
      const spanOne = document.createElement('span');
      const spanTwo = document.createElement('span');
      const mainSpan = document.createElement('span');
      const progressSpan = document.createElement('span');
      fig.classList.add('preview');
      img.classList.add('img');
      mainSpan.classList.add('mainSpan');
      spanOne.classList.add('spanOne');
      spanTwo.classList.add('spanTwo');
      progressSpan.classList.add('progressSpan');
      progressSpan.id = file.id;
      mainSpan.onclick = function(e) {
        this.parentElement.remove();
      }
      img.src = reader.result;
      [spanOne, spanTwo].forEach(item => {
        mainSpan.appendChild(item);
      });
      [img, mainSpan, progressSpan].forEach(item => {
        fig.appendChild(item);
      });
      document.getElementById('gallery').appendChild(fig);
    }
  }

  function uploadFile(file) {
    const config = {
      headers: {
        "X-Requested-With": "XMLHttpRequest"
      },
      onUploadProgress: function(progressEvent) {
        let progress = Math.round((progressEvent.loaded * 100.0) / progressEvent.total);
        if (document.getElementById(`${file.id}`) !== null) {
          document.getElementById(`${file.id}`).style.height = `${100 - progress}%`;
        }
      }
    }
    // TODO
    // const url = 'https://api.cloudinary.com/v1_1/dxlhzerlq/upload';
    const data = new FormData();
    data.append("upload_preset", "acjlrvii"); //append cloudinary specific config
    data.append('file', file);
    axios.post(url, data, config).then(res => {
      if (res.data) {
        const uploadedImgData = res.data;
        const imgTag = document.getElementById(`${file.id}`).previousSibling.previousSibling;
        imgTag.src = uploadedImgData.url;
        imgTag.dataset.data = JSON.stringify(uploadedImgData);
        document.getElementById(`${file.id}`).parentElement.classList.remove('preview');
        document.getElementById(`${file.id}`).parentElement.classList.add('done');
        //console.log(imgTag);
      }
    }).catch(err => {
      console.log(err);
    })
  }
</script>
@endsection