@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring | DGME
@endsection
@section('styleTags')
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
    .mt_6p{margin-top: 6% !important;}
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
</style>

@endsection
@section('content')

    {{-- frozen panel for plan and conduct monitoring  --}}
    <div class="col-md-12 fixed bg-g hidden-sm hidden-xs topSummary capitalize" style="margin-top:-2.9% !important;z-index:999 !important; margin-left:-2.85% !important;">

        <div class="bg-w border_top bg-w" style="padding:0.25rem !important;" >
                <style scoped>
                    .form-group{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;}
                    .form-group{padding: 0.05rem 0.75rem !important;}
                    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{padding-left: 0px !important;padding-right: 0px !important;}
                    label{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;padding:0rem 0.3rem !important;font-size: 12px !important;}

                </style>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="GS_no" class="">GS #: <span><b>{{$project->Project->ADP}}</b></span></label>
                    </div>
                    <div class="col-md-4">
                        <label for="project_title" class="">Project Title: <span><b>{{$project->Project->title}}</b></span></label>
                    </div>
                    <div class="col-md-4 ln_ht12">
                        <label for="project_cost" class="">Location: <span><b>
                          @foreach ($project->Project->AssignedDistricts as $district)
                            {{$district->District->name}},
                          @endforeach
                        </b></span></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 ln_ht12">
                        <label for="project_cost" class="">Original Approve Cost: <span><b>{{$project->Project->ProjectDetail->orignal_cost}}</b></span></label>
                    </div>
                    <div class="col-md-4 ln_ht12">
                        <label for="Location" class="">final Revised Cost: <span><b>
                          @php
                            $revisedFinalCost=0;
                          @endphp
                          @foreach ($project->Project->RevisedApprovedCost as $cost)
                            @php
                              $revisedFinalCost= $cost->cost;
                            @endphp
                          @endforeach
                          {{$revisedFinalCost}}
                        </b></span></label>
                    </div>
                    <div class="col-md-4">
                        <label for="PHI" class="">PHI </label>
                        <input name="phi" id="#phi" type="number" class="frozen_pane"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="planned_start_date" class="">Planned Start Date: <span><b>{{$project->Project->ProjectDetail->planned_start_date}}</b></span></label>
                    </div>
                    <div class="col-md-4">
                        <label for="planned_end_date" class="">Planned End Date: <span><b>{{$project->Project->ProjectDetail->planned_end_date}}</b></span> </label>
                    </div>
                    <div class="col-md-4">
                        <label for="actual_start_date" class="">Actual Start Date </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 ln_ht12">
                        <label for="progress" class="">Physical Progress %: <span><b>{{$project->progress}} %</b></span></label>
                    </div>
                    <div class="col-md-4">
                        <label for="Financial" class="">Financial Progress %</label>
                        <input type="text"  id="financial_progress" class="frozen_pane" name="financial_progress">
                    </div>
                    <div class="col-md-4">
                        <label for="last_monitoring" class="">Last Monitoring Date </label>
                    </div>

                </div>
        </div>
    </div>

    {{-- end of frozen panel --}}
    <div class="row">
            <div class="col-md-12 mainTabsAndNav mt_6p" style="padding-left: 15px !important;padding-right: 15px !important;">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <div class="row m-b-30">
                                <div class="col-lg-12 col-xl-12 col-md-8 col-sm-6">
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
                                        <li class="nav-item summaryNav">
                                          <a class="nav-link" data-toggle="tab" href="#summary" role="tab"><span style="font-size:14px; font-weight:bold;">SUMMARY</span></a>
                                          <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <form class="review" action="{{route('monitoring_review_form')}}"  method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="assigned_project_id" value="{{$project->id}}">
                                        <div class="tab-content card-block">
                                        <div class="tab-pane active" id="reviewDiv" role="tabpanel">
                                          <div class="col-md-12">
                                              <!-- Nav tabs -->
                                              <ul class="nav nav-tabs  tabs" role="tablist">
                                                  <li class="nav-item">
                                                      <a class="nav-link active" data-toggle="tab" href="#costDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Cost</b></a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link" data-toggle="tab" href="#locationDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Location</b></a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link" data-toggle="tab" href="#AgeOrgDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Agencies & Organization</b></a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link" data-toggle="tab" href="#DatesDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Dates</b></a>
                                                  </li>
                                              </ul>
                                              <!-- Tab panes -->
                                              <div class="tab-content tabs card-block">
                                                  <div class="tab-pane active" id="costDiv" role="tabpanel">
                                                      <div class="costDiv pd_1 clearfix">
                                                          <div class="card-header">
                                                              <h4>FINANCIAL COST</h4>
                                                              <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                              Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                              quam repellendus adipisci. Repellat sapiente asperiores
                                                              numquam beatae at distinctio quaerat reiciendis
                                                              repudiandae. -->
                                                          </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-md-4 offset-md-2">
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>ADP Allocation of Fiscal Year :</b></label>
                                                                    <br>
                                                                    <input type="text" class="form-control" name="ADP_allocation_cost" id="ADP_allocation_cost" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>Total Allocation by that time (Cumulative):</b></label>
                                                                    <br>
                                                                    <input type="text" class="form-control" name="ADP_allocation_cost" id="ADP_allocation_cost" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>Utilization Against Cost Allocation :</b></label>
                                                                    <br>
                                                                <input type="text" class="form-control" name="utilization_allocation" id="utilization_allocation" />

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>Release To Date of Fiscal Year :</b></label>
                                                                    <br>
                                                                    <input type="text" class="form-control" name="release_to_date" id="release_to_date" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>Total Releases To Date :</b></label>
                                                                    <br>
                                                                    <input type="text" class="form-control" name="total_release_to_date" id="total_release_to_date" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>Utilization Against Releases :</b></label>
                                                                    <br>
                                                                    <input type="text" class="form-control" name="u_against_rel" id="u_against_rel" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-10 offset-md-1">
                                                                   <div class="divider"></div>
                                                                   <div class="col-md-4 offset-md-2">
                                                                        <div class="form-group">
                                                                            <label for="" class="col-form-label"><b>Technical Sanction Cost:</b></label>
                                                                            <br>
                                                                            <input class="form-control" type="text" name="ts_cost" placeholder="TS Cost" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="" class="col-form-label"><b>Contract Award Cost :</b></label>
                                                                            <br>
                                                                            <input class="form-control" type="text" name="cad_cost"  placeholder="Contract Cost" />
                                                                        </div>

                                                                    </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                  </div>
                                                  </div>
                                                  <div class="tab-pane" id="locationDiv" role="tabpanel">
                                                    <div class="TimeDiv pd_1 clearfix">
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">District</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="District" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">City</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="City" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">GPS</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="GPS" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Longitude</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Longitude" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Latitude</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Latitude" />
                                                          </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="tab-pane" id="AgeOrgDiv" role="tabpanel">
                                                    <div class="age_orgDiv pd_1 clearfix">
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Opration & Management</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Opration & Management" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Contractor/Supplier</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Contractor/Supplier" />
                                                          </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="tab-pane" id="DatesDiv" role="tabpanel">
                                                    <div class="dates pd_1 clearfix">
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Project Approval Date</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Project Approval Date" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Admin Approval Date</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Admin Approval Date" />
                                                          </div>
                                                      </div>
                                                      <div class="form-group row mb_2">
                                                          <label class="col-sm-3 font-15">Actual Start Date</label>
                                                          <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Actual Start Date" />
                                                          </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    </form>
                                        <div class="tab-pane " id="p_monitoring" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-6">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs tabs p_tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active PlanDoc" data-toggle="tab" href="#PlanDocDiv"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Documents</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link i-dates" data-toggle="tab" href="#i-dates"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Project Design</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link financialphase" data-toggle="tab" href="#financial"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial Phasing</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link MOBtab" data-toggle="tab" href="#MOBdiv"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Mapping Of objectives</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link  kpis" data-toggle="tab" href="#kpis" role="tab"
                                                                aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan ( KPI's)</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link activities" data-toggle="tab" href="#activities"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Tasks</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link TimeTab" data-toggle="tab" href="#TimesDiv"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Time</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link CostingTab" data-toggle="tab" href="#CostingDiv"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Costing</b></a>
                                                        </li>
                                                        {{-- <li class="nav-item">
                                                            <a class="nav-link Objectives" data-toggle="tab" href="#Objectives"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Objectives</b></a>
                                                        </li> --}}
                                                        <li class="nav-item">
                                                            <a class="nav-link PAT" data-toggle="tab" href="#PAT"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan A Trip</b></a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content tabs card-block active">
                                                        <div class="tab-pane active" id="PlanDocDiv" role="tabpanel" aria-expanded="true">
                                                          <div class="col-md-12 col-sm-12">
                                                            <!-- Our markup, the important part here! -->
                                                            <div id="drag-and-drop-zone" class="dm-uploader">
                                                              <h3 class="mb-5 mt-5 text-muted text_center">Drag &amp; drop files here</h3>

                                                              <div class="btn btn-primary btn-block">
                                                                <input type="file" id="html_btn" title='Click to add Files' />
                                                                  <span>Open the file Browser</span>
                                                              </div>
                                                            </div><!-- /uploader -->
                                                          </div>
                                                        </div>
                                                        <div class="tab-pane" id="i-dates" role="tabpanel" aria-expanded="false">
                                                          <style scopped>

                                                          </style>
                                                            <div class="row">
                                                                <div class="col-md-6 objtivesNew border_right pd_1_2">
                                                                  <div class="DisInlineflex newClass mb_2 col-md-12">
                                                                    <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective 1</label>
                                                                    <div class="col-sm-7">
                                                                      <input type="text" class="form-control form-txt-primary" name="obj[]" placeholder="Objective 1">
                                                                    </div>
                                                                    <div class="col-sm-2 addbtn text_center">
                                                                      <button class="btn btn-sm btn-info" type="button" id="add_more_objective">+</button>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-6 compActNew border_left pd_1_2">
                                                                  <div class="DisInlineflex newClasscompAct mb_2 col-md-12">
                                                                    <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component 1</label>
                                                                    <div class="col-sm-7">
                                                                      <input type="text" name="comp[]" class="form-control form-txt-primary" placeholder="Component 1">
                                                                    </div>
                                                                    <div class="col-sm-2 addbtn text_center">
                                                                      <button class="btn btn-sm btn-info" type="button" id="add_more_compAct">+</button>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <button class="btn aho col-md-2 offset-md-10" type="button" id="saveObjComp">Save</button>
                                                            </div>
                                                          {{-- <div class="col-md-12 objtivesNew pd_1_2">
                                                            <div class="DisInlineflex newClass mb_2 col-md-12">
                                                              <div class="col-sm-5">
                                                                <input type="text" class="form-control form-txt-primary" placeholder="Objective 1">
                                                              </div>
                                                              <div class="col-md-1">
                                                                <div class="col-md-5 border_right fullHeight"></div>
                                                              </div>
                                                              <div class="col-md-6 compActNew">
                                                                <div class="newClasscompAct col-md-12 row">
                                                                  <div class="col-sm-10">
                                                                    <input type="text" class="form-control form-txt-primary" placeholder="Component 1">
                                                                  </div>
                                                                  <div class="col-sm-2 addbtn text_center">
                                                                    <button class="btn btn-sm btn-primary " title="Add More Component" type="button" id="add_more_compAct">+</button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="container">
                                                            <div class="offset-md-11 col-md-1 addbtn text_center">
                                                              <button class="btn btn-sm btn-primary" title="Add More Objectves" type="button" id="add_more_objective">+</button>
                                                            </div>
                                                          </div> --}}
                                                        </div>
                                                        <div class="tab-pane" id="financial" role="tabpanel" aria-expanded="false">
                                                            <div>
                                                                <h5 style="padding-top:20px;padding-bottom:10px;clear:both;">Original PC-I</h5>
                                                                <div class="row">
                                                                    <h5 class="col-md-4">Gestation Period: <b><span id="t_months"></span> months</b></h5>
                                                                    <h5 class="col-md-4">Total Cost: <b><span id="t_cost"></span> Million(s)</b></h5>
                                                                    <h5 class="col-md-4">Start Date: <b id="f_date"></b></h5>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table  table-bordered nowrap"  id="countit">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Sr #</th>
                                                                                <th>Financial Year</th>
                                                                                <th>Duration</th>
                                                                                <th>Cost</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id='original_tbody'>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class='row' style="margin-bottom:20px">
                                                                    <div class="col-md-8 fazuldiv"></div>
                                                                    <div class="col-md-5 offset-md-3 alert alert-danger dangercustom">Cost does not match. Difference: <span id="od_cost">0</span> Million(s)</div>
                                                                    <h5 class="col-md-4 float-right" >Total Cost: <b>
                                                                        <span id="ot_cost">0</span> Million(s)</b>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="MOBdiv" role="tabpanel" aria-expanded="false">
                                                          <div class="row col-md-12 border">
                                                            <div class="col-md-8 offset-md-2 ">
                                                              <div class="row">
                                                                <h5 class="textlef pd_1_2 col-md-6">Objectives</h5>
                                                                <h5 class="textlef pd_1_2 col-md-6">Component</h5>
                                                              </div>
                                                              <ul class="pd_1_6" id="ObjCompHere">

                                                              </ul>
                                                              <button class="btn aho col-md-3 offset-md-9 mb_2" type="button" id="ObjCompShowSum">Show Summary</button>
                                                            </div>
                                                            <div class=" col-md-8 offset-md-2 ">
                                                              <h5 class="textlef pd_1_6">Summary</h5>
                                                              <div class="col-md-12 SumObjComp nodisplay">

                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="tab-pane active" id="kpis" role="tabpanel" aria-expanded="false" style="display:none;">
                                                            <div class="card m-0 z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>KPI(s)</h4>
                                                                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae. -->
                                                                </div>
                                                                <div class="card-block">
                                                                    {{-- <div class="row form-group" style="height: 100px;">
                                                                        <div class="col-md-4 offset-md-2">
                                                                            <label for="" class="sub-title">Sector:<b></b></label>
                                                                        </div>
                                                                        <div class="col-md-4 offset-md-1 "><label class="sub-title">
                                                                                Subsector: <b></b></label></div>
                                                                    </div> --}}
                                                                    <div class="row form-group">
                                                                        {{-- <div class="col-md-2 offset-md-1"><label for="">KPI(s):</label></div>
                                                                        --}}
                                                                        <div class="col-md-5">
                                                                            <h5 class="mb_2">Choose KPI(s)</h4>
                                                                            <select id='custom-headers' class="searchable"
                                                                                multiple='multiple'>
                                                                                <option value='kpi_1'>kpi 1</option>
                                                                                <option value='kpi_2'>kpi 2</option>
                                                                                <option value='kpi_3'>kpi 3</option>
                                                                                <option value='kpi_4'>kpi 4</option>
                                                                                <option value='kpi_5'>kpi 5</option>
                                                                                <option value='kpi_6'>kpi 6</option>
                                                                                <option value='kpi_7'>kpi 7</option>
                                                                                <option value='kpi_8'>kpi 8</option>
                                                                                <option value='kpi_9'>kpi 9</option>
                                                                                <option value='kpi_10'>kpi 10</option>
                                                                                <option value='kpi_11'>kpi 11</option>
                                                                                <option value='kpi_12'>kpi 12</option>
                                                                                <option value='kpi_13'>kpi 13</option>
                                                                                <option value='kpi_14'>kpi 14</option>
                                                                                <option value='kpi_15'>kpi 15</option>
                                                                                <option value='kpi_16'>kpi 16</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="row col-md-1">
                                                                          <div class="border_right col-md-6"></div>
                                                                          <div class="col-md-6"></div>
                                                                        </div>
                                                                        <div class="col-md-6" style="padding-left:3% !important;">                                                                            <div class="row col-md-12">
                                                                            <ul class="col-md-6 row">
                                                                              <h5 class=" mb_2">KPIs</h5>
                                                                              <li class="col-md-12">
                                                                                KPI 1
                                                                              </li>
                                                                              <li class="col-md-12">
                                                                                KPI 2
                                                                              </li>
                                                                            </ul>
                                                                            <ul class="col-md-6 row">
                                                                              <h5 class=" mb_2">Components</h5>
                                                                                <li class="col-md-12">
                                                                                  <select class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                                                                      {{-- <option value="" selected hidden>Select Multiple Components</option> --}}
                                                                                      <option value="AL">Component 1</option>
                                                                                      <option value="WY">Component 2</option>
                                                                                      <option value="WY">Component 3</option>
                                                                                      <option value="WY">Component 4</option>
                                                                                      <option value="WY">Component 5</option>
                                                                                  </select>
                                                                                </li>
                                                                                <li class="col-md-12">
                                                                                  <select class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                                                                      {{-- <option value="" selected hidden>Select Multiple Components</option> --}}
                                                                                      <option value="AL">option 1</option>
                                                                                      <option value="WY">option 2</option>
                                                                                      <option value="WY">option 3</option>
                                                                                      <option value="WY">option 4</option>
                                                                                      <option value="WY">option 5</option>
                                                                                  </select>
                                                                                </li>
                                                                            </ul>
                                                                          </div>
                                                                        </div>

                                                                        {{-- <div class="col-md-2 offset-md-1"><button class="btn btn-sm btn-success"
                                                                                style="font-size: 20px;" id="add-more">+</button></div>
                                                                        --}}

                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="col-md-3 offset-md-9">
                                                                        <a class="btn btn-success btn-md activities saveNnextbtn" data-toggle="tab" href="#activities"
                                                                        role="tab" aria-expanded="false">Save &
                                                                            Proceed</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane " id="activities" role="tabpanel" aria-expanded="false"
                                                            style="display:none;">
                                                            <div class="card">
                                                                <div class="card-header"></div>
                                                                <div class="card-block">

                                                                    <div class="row form-group">
                                                                        <div class="col-md-10 offset-md-1 planMactivities">
                                                                            <div class="row form-group">
                                                                            <div class="col-md-4 offset-md-1"><label for=""> <b>Component 1</b></label></div>
                                                                            {{-- <div class="col-md-4 offset-md-1"> <input type="text" class="form-control"></div> --}}
                                                                            <div class="col-md-2 offset-md-4 mb_1" style="padding-top:0.6%;">
                                                                              <button class="btn btn-sm btn-warning float-right" type="button" id="add_activity" name="add_activity"> Add Tasks</button>
                                                                            </div>
                                                                            </div>


                                                                         </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                        <div class="col-md-3 offset-md-9">
                                                                            <a class="btn btn-success btn-md saveNnextbtn" >Save & Proceed</a>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane " id="TimesDiv" role="tabpanel" aria-expanded="false"
                                                            style="display:none;">
                                                            <div class="card">
                                                                <div class="card-header"></div>
                                                                <div class="card-block">
                                                                    <div class="row form-group">
                                                                        <h5 class="col-md-6 textlef mb_2">Component</h5>
                                                                        <h5 class="col-md-6 textlef mb_2">Duration In Days</h5>
                                                                          <b class="col-md-12">
                                                                            Component 1
                                                                          </b>
                                                                          <b class="col-md-6 mb_2">
                                                                            Task 1
                                                                          </b>
                                                                            <input type="text" class="form-control col-md-6 form-txt mb_2" placeholder="Time Duration" />
                                                                          <b class="col-md-6 mb_2">
                                                                            Task 2
                                                                          </b>
                                                                            <input type="text" class="form-control col-md-6 form-txt mb_2" placeholder="Time Duration" />
                                                                          <b class="col-md-6 mb_2">
                                                                            Task 3
                                                                          </b>
                                                                            <input type="text" class="form-control col-md-6 form-txt mb_2" placeholder="Time Duration" />
                                                                          {{-- <p class="col-md-6">
                                                                            task 1<br/>
                                                                            task 2<br/>
                                                                            task 3<br/>
                                                                            task 4<br/>
                                                                          </p> --}}
                                                                          {{-- <b class="col-md-6">
                                                                            Component 2
                                                                          </b>
                                                                          <p class="col-md-6">
                                                                            task 1<br/>
                                                                            task 2<br/>
                                                                            task 3<br/>
                                                                            task 4<br/>
                                                                          </p> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                        <div class="col-md-3 offset-md-9">
                                                                            <a class="btn btn-success btn-md saveNnextbtn" >Save & Proceed</a>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane " id="CostingDiv" role="tabpanel" aria-expanded="false"
                                                            style="display:none;">
                                                            <div class="card">
                                                                <div class="card-header"></div>
                                                                <div class="card-block">
                                                                    <div class="row form-group">
                                                                        <b class="col-md-3 textlef mb_2">Component</b>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Unit" name="" /></div>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Quantity" name="" /></div>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Cost" name="" /></div>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Amount" name="" /></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <b class="col-md-3 textlef mb_2">Task</b>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Unit" name="" /></div>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Quantity" name="" /></div>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Cost" name="" /></div>
                                                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Amount" name="" /></div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                        <div class="col-md-3 offset-md-9">
                                                                            <a class="btn btn-success btn-md saveNnextbtn" >Save & Proceed</a>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="c_monitoring" role="tabpanel" style="display:none;">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-6">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active financial" data-toggle="tab" href="#financial"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial</b></a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link quality_assesment" data-toggle="tab" href="#quality_assesment"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Quality
                                                                    Assesment</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link stakeholder" data-toggle="tab" href="#stakeholder"
                                                                role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Stakeholders</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link issues" data-toggle="tab" href="#issues" role="tab"
                                                                aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Issues</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link risks" data-toggle="tab" href="#risks" role="tab"
                                                                aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Risks</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link HSE" data-toggle="tab" href="#HSE" role="tab"
                                                                aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Health
                                                                    Safety Enviornment</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link procurement" data-toggle="tab" href="#procurement"
                                                                role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Procurement</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link gllery" data-toggle="tab" href="#Gallery"
                                                                role="tab" aria-expanded="false">
                                                                <b style="font-size:14px; font-weight:bold;">Photos&Videos</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link Documents" data-toggle="tab" href="#Documents"
                                                                role="tab" aria-expanded="false">
                                                                <b style="font-size:14px; font-weight:bold;">Documents</b></a>
                                                        </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content tabs card-block">
                                                        <div class="tab-pane active" id="financialDiv" role="tabpanel"
                                                            aria-expanded="false">
                                                            <div class="card m-0 z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>FINANCIAL COST</h4>
                                                                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae. -->
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="row">
                                                                        <div class="col-md-4 offset-md-2">
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label"><b>ADP Allocation of Fiscal Year :</b></label>
                                                                                <br>
                                                                                <input type="text" class="form-control" name="adp_allocation_cost" id="ADP_allocation_cost" />
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label"><b>Total Allocation by that time (Cumulative):</b></label>
                                                                                <br>
                                                                                <input type="text" class="form-control" name="ADP_allocation_cost" id="ADP_allocation_cost" />
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label"><b>Utilization Against Cost Allocation :</b></label>
                                                                                <br>
                                                                            <input type="text" class="form-control" name="utilization_allocation" id="utilization_allocation" />

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label"><b>Release To Date of Fiscal Year :</b></label>
                                                                                <br>
                                                                                <input type="text" class="form-control" name="release_to_date" id="release_to_date" />
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label"><b>Total Releases To Date :</b></label>
                                                                                <br>
                                                                                <input type="date" class="form-control" name="total_release_to_date" id="total_release_to_date" />
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label"><b>Utilization Against Releases :</b></label>
                                                                                <br>
                                                                                <input type="text" class="form-control" name="u_against_rel" id="u_against_rel" />
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10 offset-md-1">
                                                                               <div class="divider"></div>
                                                                               <div class="col-md-4 offset-md-2">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="col-form-label"><b>Technical Sanction Cost:</b></label>
                                                                                        <br>
                                                                                        <input class="form-control" type="text" name="ts_cost" placeholder="TS Cost" />
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="" class="col-form-label"><b>Contract Award Cost :</b></label>
                                                                                        <br>
                                                                                        <input class="form-control" type="text" name="cad_cost"  placeholder="Contract Cost" />
                                                                                    </div>

                                                                                </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="col-md-3 offset-md-9">
                                                                        <a class="btn btn-success btn-md saveNnextbtn physical" >Save & Proceed</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="quality_assesment" role="tabpanel"
                                                            aria-expanded="false">
                                                            <div class="card z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>Quality Assesment</h4>
                                                                    <!-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore neque, repellendus, nihil, ullam eligendi facilis dicta possimus magnam voluptatem dolores quasi provident quisquam voluptas cum distinctio! Numquam debitis est neque? -->
                                                                </div>
                                                                <div class="card-block">
                                                                  {{-- <div class="row">
                                                                      <div class="col-md-10 offset-md-1 components" id="components" style="background: lavender;">
                                                                          <div class="form-group">
                                                                              <label for=""> <b>Component Title :</b></label>
                                                                              <select class=" form-control form-control-primary ">
                                                                                    <option value="" selected disabled>Select Component</option>
                                                                                    <option value="1" >Component 1</option>
                                                                                    <option value="2">Component 2</option>
                                                                                    <option value="3" >Component 3</option>
                                                                                </select>
                                                                          </div>

                                                                        </div>
                                                                      </div>--}}
                                                                      <div class="row oneComponentQA">
                                                                          <div class="col-md-6 offset-md-1">
                                                                                To assess quality of components, press here. <button class="btn btn-sm btn-primary" id="add_more_component" name="add_more_component[]" type="button"><span><i class="fa fa-plus"></i></span></button>
                                                                          </div>
                                                                      </div>

                                                                    </div>
                                                                </div>
                                                                    {{--  --}}
                                                                <div class="card z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>General Feed Back</h4>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class=" form-group row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-1">
                                                                            <b><label for="">1 </label></b>
                                                                        </div>

                                                                        <div class="col-md-5">
                                                                            <b><label for="">Test Performed ?</label></b>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-success btn-sm btn-outline-success">
                                                                                YES</button>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-danger btn-sm btn-outline-danger">
                                                                                NO</button>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                    </div>
                                                                    <div class=" form-group row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-1">
                                                                            <b><label for="">2 </label></b>
                                                                        </div>

                                                                        <div class="col-md-5">
                                                                            <b><label for="">Adequate Test Results</label></b>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-success btn-sm btn-outline-success">
                                                                                YES</button>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-danger btn-sm btn-outline-danger">
                                                                                NO</button>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                    </div>
                                                                    <div class=" form-group row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-1">
                                                                            <b><label for="">3 </label></b>
                                                                        </div>

                                                                        <div class="col-md-5">
                                                                            <b><label for="">Onsite Labs Established</label></b>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-success btn-sm btn-outline-success">
                                                                                YES</button>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-danger btn-sm btn-outline-danger">
                                                                                NO</button>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                    </div>
                                                                    <div class=" form-group row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-1">
                                                                            <b><label for="">4 </label></b>
                                                                        </div>

                                                                        <div class="col-md-5">
                                                                            <b><label for="">Overall Quality Good?</label></b>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-success btn-sm btn-outline-success">
                                                                                YES</button>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button class="btn btn-danger btn-sm btn-outline-danger">
                                                                                NO</button>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <h6><b>Comments</b></h6>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12">
                                                                            <p class="block form-control">
                                                                                <!-- Lorem ipsum dolor sit amet consectetur
                                                                                adipisicing elit. Dicta, eligendi! -->
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane active" id="stakeholder" role="tabpanel"
                                                            aria-expanded="true">
                                                            {{-- <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla
                                                                posuere elit quis auctor interdum praesent sit amet nulla vel
                                                                enim amet. Donec convallis tellus neque, et imperdiet felis
                                                                amet.</p> --}}
                                                            <div class="card z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>Stakeholders</h4>
                                                                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae. -->
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table  table-bordered nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sr #</th>
                                                                                        <th>Stakeholder Type</th>
                                                                                        <th>Name</th>
                                                                                        <th>Designation</th>
                                                                                        <th>Email </th>
                                                                                        <th>Contact #</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="stakeholders">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label for="">1</label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-md-12">
                                                                                                <select id="districts" name="stakeholder" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                                                                                                    <option value="" hidden='hidden'>Select</option>
                                                                                                    <option value="">some option</option>
                                                                                                    <option value="">to choose</option>
                                                                                                    <option value="">from</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td><input type="text" name="stakeholder_name"
                                                                                                class="form-control" /></td>
                                                                                                <td><input type="text" name="stakeholder_designation"
                                                                                                    class="form-control" /> </td>
                                                                                        <td><input type="text" name="stakeholder_number"
                                                                                                class="form-control" /></td>
                                                                                        <td><input type="text" name="stakeholder_email"
                                                                                                class="form-control" /></td>
                                                                                        <td><button type="button" name="add[]"
                                                                                                class=" form-control btn btn-success "
                                                                                                id="addmore" style="size:14px;">+</button></td>
                                                                                    </tr>
                                                                                </tbody>

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane active" id="issues" role="tabpanel" aria-expanded="true">
                                                            <div class="card z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>Issues and Observations</h4>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae.
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Issues</th>
                                                                                    <th>Issue Type</th>
                                                                                    <th>Severity</th>
                                                                                    <th>Department</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id='add-issue-here'>
                                                                                <tr>
                                                                                    <td><input type="text" name="issue" style="width:100%;padding:2%;" /></td>
                                                                                    <td>
                                                                                        <select id="issues2" name="issuetype" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                                                                                            <option value="" hidden='hidden'>Select</option>
                                                                                            <option value="Time">Time</option>
                                                                                            <option value="Cost">Cost</option>
                                                                                            <option value="Quality">Quality</option>
                                                                                            <option value="Scope">Scope</option>
                                                                                            <option value="Benifits">Benifits</option>
                                                                                            <option value="Risks">Risks</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control form-control-primary">
                                                                                            <option value="" selected disabled>Select</option>
                                                                                            <option value="1">Very High</option>
                                                                                            <option value="2">High</option>
                                                                                            <option value="3">Medium</option>
                                                                                            <option value="4">Low</option>
                                                                                            <option value="5">Very Low</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control form-control-primary">
                                                                                            <option value="" selected disabled>Select</option>
                                                                                            <option value="1">Very High</option>
                                                                                            <option value="2">High</option>
                                                                                            <option value="3">Medium</option>
                                                                                            <option value="4">Low</option>
                                                                                            <option value="5">Very Low</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td style="width:5%;">
                                                                                        <button class="btn btn-sm btn-success" type="button" id="add-more-issues">+</button>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane active" id="risks" role="tabpanel" aria-expanded="true">
                                                            <div class="card z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>Risks</h4>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae.
                                                                    <div class="progress clearfix mt2 clrornge" style="margin: 3% 0% 0%;">
                                                                      <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ" style="color:#fff !important;padding:0px !important;margin:0px !important;">25%</span></div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="col-md-12">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <style scoped media="screen">
                                                                                .bg_sky{background:#8abdd6e6;}
                                                                                    .bg_yel{background:#ffc110;}
                                                                                    .bg_br{background:#7d641da6;}
                                                                                    .bg_bl{background:#2f779ae6;}
                                                                                    .bg_gr{background:#349634;}
                                                                                    .text_center{text-align:center;}
                                                                                    th{border:1px solid #00000014;padding: 1% 0%;text-align:center;text-transform:capitalize;}
                                                                                    td{border:1px solid #00000014;}
                                                                                    .nobortop{border-top:none !important;}
                                                                                    .noborbottom{border-bottom:none !important;}
                                                                                    .white{color:#fff !important;}
                                                                                    .black{color:#000 !important;}
                                                                                    .red{color:red !important;}
                                                                                    select.form-control:not([size]):not([multiple]){padding: 0% !important;}
                                                                                    </style>
                                                                            <table class="col-md-12">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="bg_sky noborbottom wd-5p" rowspan="2"
                                                                                            colspan="1">
                                                                                            SR#.
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Activity
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Risk event
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Risk Type
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Cost
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                              probability
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2">Impact</th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2">Score</th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2">
                                                                                            Rating
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="riskmatrix">
                                                                                    <tr>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td>
                                                                                          <select class="form-control form-control-primary">
                                                                                            <option value="" selected="" disabled="">Activity</option>
                                                                                            <option value="1">Activity 1</option>
                                                                                            <option value="2">Activity 2</option>
                                                                                            <option value="3">Activity 3</option>
                                                                                            <option value="4">Activity 4</option>
                                                                                            <option value="5">Activity 5</option>
                                                                                          </select>
                                                                                        </td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td>
                                                                                          <select class="form-control form-control-primary">
                                                                                            <option value="" selected="" disabled="">Probability</option>
                                                                                            <option value="1">Probability 1</option>
                                                                                            <option value="2">Probability 2</option>
                                                                                            <option value="3">Probability 3</option>
                                                                                            <option value="4">Probability 4</option>
                                                                                            <option value="5">Probability 5</option>
                                                                                          </select>
                                                                                        </td>
                                                                                        <td>
                                                                                          <select class="form-control form-control-primary">
                                                                                            <option value="" selected="" disabled="">Impact</option>
                                                                                            <option value="1">Impact 1</option>
                                                                                            <option value="2">Impact 2</option>
                                                                                            <option value="3">Impact 3</option>
                                                                                            <option value="4">Impact 4</option>
                                                                                            <option value="5">Impact 5</option>
                                                                                          </select>
                                                                                        </td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><button class="btn btn-sm btn-success"
                                                                                                type="button" id="add-more">+</button></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane active" id="HSE" role="tabpanel" aria-expanded="true">
                                                            <div class="card z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>Health Safety Enviornment</h4>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae.
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-stripped nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sr.No</th>
                                                                                        <th>Description</th>
                                                                                        <th>Yes</th>
                                                                                        <th>No</th>
                                                                                        <th>Comments</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="stakeholders">
                                                                                    <tr>
                                                                                        <td>1.</td>
                                                                                        <td>Do workers have a safe route to
                                                                                            their place of work?</td>

                                                                                        <td>
                                                                                            <div class="checkbox-fade fade-in-success m-0">
                                                                                                <label>
                                                                                                    <input type="checkbox" id="yes">
                                                                                                    <span class="cr">
                                                                                                        <i class="cr-icon icofont icofont-ui-check txt-success"></i>
                                                                                                    </span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="checkbox-fade fade-in-danger m-0">
                                                                                                <label>
                                                                                                    <input type="checkbox" id="no"
                                                                                                        checked>
                                                                                                    <span class="cr">
                                                                                                        <i class="cr-icon icofont icofont-ui-check txt-danger"></i>
                                                                                                    </span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </td>

                                                                                        <td>Lorem, ipsum dolor sit amet
                                                                                            consectetur adipisicing elit.
                                                                                            Quaerat, tempore?</td>
                                                                                    </tr>


                                                                                </tbody>

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane " id="Gallery" role="tabpanel" aria-expanded="false"
                                                            style="display:none;">
                                                            <div class="container">
                                                              <div class="col-md-12 col-sm-12">

                                                                <!-- Our markup, the important part here! -->
                                                                <div id="drag-and-drop-zone" class="dm-uploader">
                                                                  <h3 class="mb-5 mt-5 text-muted text_center">Drag &amp; drop files here</h3>

                                                                  <div class="btn btn-primary btn-block">
                                                                    <input type="file" id="html_btn" title='Click to add Files' />
                                                                      <span>Open the file Browser</span>
                                                                  </div>
                                                                </div><!-- /uploader -->

                                                              </div>
                                                              <div class="col-md-12 col-sm-12">
                                                                <div class="card">
                                                                  <div class="card-header">
                                                                    File List
                                                                  </div>

                                                                  <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                                                                    <li class="text-muted text-center empty">No files uploaded.</li>
                                                                  </ul>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane " id="Documents" role="tabpanel" aria-expanded="false"
                                                            style="display:none;">
                                                            <div class="container">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="tab-pane active" id="procurment" role="tabpanel"
                                                            aria-expanded="true">
                                                        </div> --}}

                                                    </div>
                                                </div>

                                            </div>

                                            {{-- <button type="button" class="btn btn-success alert-success-msg m-b-10" style=" margin-left: 80%;">Submit
                                                Monitoring</button> --}}


                                        </div>
                                        <div class="tab-pane" id="summary" role="tabpanel">
                                            <fieldset>
                                                <div class="form-group row">
                                                    <div class="col-md-1 col-sm-1">
                                                    </div>

                                                    <div class="col-md-4 col-sm-2">
                                                        <div class="card summary-card bg-new">
                                                            <div class="card-header"></div>
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                                                        style="text-align:center; vertical-align:middle; font-size:13px; margin-top: -10%;margin-left: 10%;"
                                                                        data-modal="modal-1">Work Breakdown <br>Structure<br>(WBS)</button>
                                                                    <div class="md-modal md-effect-3" id="modal-1">
                                                                        <div class="md-content">
                                                                            <h3>Work Breakdown Structure</h3>
                                                                            <div>
                                                                                <canvas id="barChart" width="400" height="400"></canvas>
                                                                                <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="md-overlay"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-1 col-sm-1"></div>

                                                    <div class="col-md-4 col-sm-2">
                                                        <div class="card summary-card bg-new">
                                                            <div class="card-header"></div>
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                                                        style="text-align:center; vertical-align:middle; font-size:13px;margin-left: 20%;"
                                                                        data-modal="modal-2">Gantt Chart</button>
                                                                    <div class="md-modal md-effect-3" id="modal-2">
                                                                        <div class="md-content">
                                                                            <h3>Ghantt Chart</h3>
                                                                            <div>
                                                                                <canvas id="barChart" width="400" height="400"></canvas>
                                                                                <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="md-overlay"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-1 col-sm-1">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 col-sm-1">
                                                    </div>


                                                    <div class="col-md-4 col-sm-2">
                                                        <div class="card summary-card bg-new">
                                                            <div class="card-header"></div>
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                                                        style="text-align:center; vertical-align:middle; font-size:13px;margin-left:20%"
                                                                        data-modal="modal-3">Burn Chart</button>
                                                                    <div class="md-modal md-effect-3" id="modal-3">
                                                                        <div class="md-content">
                                                                            <h3>Burn Chart </h3>
                                                                            <div>
                                                                                <canvas id="barChart" width="400" height="400"></canvas>
                                                                                <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="md-overlay"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-1 col-sm-1"></div>

                                                    <div class="col-md-4 col-sm-2">
                                                        <div class="card summary-card bg-new">
                                                            <div class="card-header"></div>
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                                                        style="text-align:center; vertical-align:middle; font-size:13px;margin-left:20%"
                                                                        data-modal="modal-4">PROGRESS</button>
                                                                    <div class="md-modal md-effect-3" id="modal-4">
                                                                        <div class="md-content">
                                                                            <h3>Progress in %</h3>
                                                                            <div>
                                                                                <canvas id="barChart" width="400" height="400"></canvas>
                                                                                <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="md-overlay"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-1 col-sm-1">
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
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
                                    <td class="text-right"><span class="f-right"><a href="#"> Singular app</a></span></td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-meeting-add"></i> Updated:</td>
                                    <td class="text-right">12 May, 2015</td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-id-card"></i> Created:</td>
                                    <td class="text-right">25 Feb, 2015</td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-spinner-alt-5"></i> Priority:</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="#">
                                                <i class="icofont icofont-upload m-r-5"></i> Highest
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-spinner-alt-3"></i> Revisions:</td>
                                    <td class="text-right">29</td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-ui-love-add"></i> Added by:</td>
                                    <td class="text-right"><a href="#">Winnie</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icofont icofont-washing-machine"></i> Status:</td>
                                    <td class="text-right">Published</td>
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
@endsection
@section("js_scripts")
<!-- Multiselect js -->
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
{{-- this is custome dgme js for this page only Ok ? if you want to add kindly add here dont mess here!! --}}
<script src="{{asset('_monitoring/js/_dgme/DGME_officer_inprogressSingle.js')}}"></script>
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
<script>
$(document).ready(function(){
  $('form').on('submit',function(e){
    e.preventDefault();
    // var formdata= new FormData($(this).serialize());
    // console.log(formdata);
    //   for (var value of formdata.values()) {
    //     console.log(value);
    //   }
    //   console.log(formdata);
    axios.post($(this).attr('action'),{data:$(this).serialize()})
    .then(function (response) {
        console.log(response.data);
    })
    .catch(function (error) {
        console.log(error);
    });
    // console.log($('.review').serialize());
  });
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
@endsection
