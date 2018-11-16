@extends('_Monitoring.layouts.upperNavigation')
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
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />

{{-- font awesome --}}
<link rel="stylesheet" href="{{ asset('_monitoring\css\icon\font-awesome\css\font-awesome.min.css')}}" />

{{-- This is dgme custom css for this page only ,write here any css you want to Ok!!! --}}
<link rel="stylesheet" href="{{asset('_monitoring/css/css/_dgme/DGME_officer_inprogressSingle.css')}}" />

@endsection
@section('content')
             
    {{-- frozen panel for plan and conduct monitoring  --}}
    <div class="col-md-12 fixed bg-g hidden-sm hidden-xs topSummary nodisplay" style="margin-top:-2.8% !important;z-index:999 !important; margin-left:-2.79% !important;">
    
        <div class="bg-w border_top bg-w" style="padding:0.25rem !important;" >
                <style scoped>
                    .form-group{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;}
                    .form-group{padding: 0.05rem 0.75rem !important;}
                    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{padding-left: 0px !important;padding-right: 0px !important;}
                    label{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;padding:0rem 0.3rem !important;font-size: 12px !important;}

                </style>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="GS_no" class="">GS # </label>
                    </div>
                    <div class="col-md-8">
                        <label for="project_title" class="">Project Title </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="project_cost" class="">Cost </label>
                    </div>
                    <div class="col-md-4">
                        <label for="Location" class="">Location </label>
                    </div>
                    <div class="col-md-4">
                        <label for="PHI" class="">PHI </label>
                        <input name="phi" id="#phi" type="number" class="frozen_pane"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="planned_start_date" class="">Planned Start Date </label>
                    </div>
                    <div class="col-md-4">
                        <label for="planned_end_date" class="">Planned End Date </label>
                    </div>
                    <div class="col-md-4">
                        <label for="actual_start_date" class="">Actual Start Date </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="progress" class="">Progress %</label>
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
            <div class="col-md-9 mainTabsAndNav" style="padding-left: 15px !important;
        padding-right: 15px !important;">
                <form action="#">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <div class="row m-b-30">
                                <div class="col-lg-12 col-xl-12 col-md-8 col-sm-6">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item summaryNav">
                                            <a class="nav-link active" data-toggle="tab" href="#summary" role="tab"><span style="font-size:14px; font-weight:bold;">SUMMARY</span></a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item planNav">
                                            <a class="nav-link" data-toggle="tab" href="#p_monitoring" role="tab"><span style="font-size:14px; font-weight:bold;">PLAN
                                                    MONITORING</span></a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item conductNav">
                                            <a class="nav-link" data-toggle="tab" href="#c_monitoring" role="tab"><span style="font-size:14px; font-weight:bold;">CONDUCT
                                                    MONITORING</span></a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="summary" role="tabpanel">
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
                                        <div class="tab-pane " id="p_monitoring" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-6">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs tabs p_tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active i-dates" data-toggle="tab" href="#i-dates"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Important Dates</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link financialphasing" data-toggle="tab" href="#financial"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial Phasing</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link  kpis" data-toggle="tab" href="#kpis" role="tab"
                                                                aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Key
                                                                    Point Indicators ( KPI(s))</b></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link activities" data-toggle="tab" href="#activities"
                                                                role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Tasks</b></a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content tabs card-block ">
                                                        <div class="tab-pane active" id="i-dates" role="tabpanel" aria-expanded="false">
                                                            <div class="row">
                                                                <div class="col-md-4 offset-md-1">
                                                                    <div class="form-group">
                                                                        <label for="" class="col-form-label"><b>Technical Sanction :</b></label>
                                                                        <br>
                                                                        <input class="form-control" type="text" name="ts"  placeholder="Select your date" />
                                                                    </div> 
                                                                    <div class="form-group">
                                                                            <label for="" class="col-form-label"><b>Contract Award Date :</b></label>
                                                                            <br>
                                                                            <input class="form-control" type="text" name="cwd" placeholder="Select your date" />
                                                                        </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label"><b>Actual Start Date :</b></label>
                                                                    <br>
                                                                    <input class="form-control" type="text" name="asd" placeholder="Select your date" />                                                                   
                                                                </div>
                                                                
                                                                
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane " id="financial" role="tabpanel" aria-expanded="false">
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
                                                        <div class="tab-pane" id="kpis" role="tabpanel" aria-expanded="false" style="display:none;">
                                                            <div class="card m-0 z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>KPI(s)</h4>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae.
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="row form-group" style="height: 100px;">
                                                                        <div class="col-md-4 offset-md-2">
                                                                            <label for="" class="sub-title">Sector:<b></b></label>
                                                                        </div>
                                                                        <div class="col-md-4 offset-md-1 "><label class="sub-title">
                                                                                Subsector: <b></b></label></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        {{-- <div class="col-md-2 offset-md-1"><label for="">KPI(s):</label></div>
                                                                        --}}
                                                                        <div class="col-sm-12 col-xl-6 m-b-30 offset-md-3">
                                                                            <h4 class="sub-title">Choose KPIS(s)</h4>
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
                                                                            <div class="col-md-4 offset-md-1"> <input type="text" class="form-control"></div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                            <div class="col-md-4 offset-md-1"><button class="btn btn-sm btn-warning" type="button" id="add_activity" name="add_activity"> Add Activities</button></div>
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
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content tabs card-block">
                                                        <div class="tab-pane active" id="financialDiv" role="tabpanel"
                                                            aria-expanded="false">
                                                            <div class="card m-0 z-depth-right-0">
                                                                <div class="card-header">
                                                                    <h4>FINANCIAL COST</h4>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae.
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
                                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore neque, repellendus, nihil, ullam eligendi facilis dicta possimus magnam voluptatem dolores quasi provident quisquam voluptas cum distinctio! Numquam debitis est neque?
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
                                                                                Lorem ipsum dolor sit amet consectetur
                                                                                adipisicing elit. Dicta, eligendi!
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
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                    Sunt similique totam harum sit. Quibusdam libero, harum rem
                                                                    quam repellendus adipisci. Repellat sapiente asperiores
                                                                    numquam beatae at distinctio quaerat reiciendis
                                                                    repudiandae.
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
                                                                                    <td><input type="text" name="issue" style="width:100%" /></td>
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
                                                                                    th{;border:2px solid #000;text-align:center;text-transform:capitalize;}
                                                                                    td{;border:1px solid #000;}
                                                                                    .nobortop{border-top:none !important;}
                                                                                    .noborbottom{border-bottom:none !important;}
                                                                                    .white{color:#fff !important;}
                                                                                    .black{color:#000 !important;}
                                                                                    .red{color:red !important;}
                                                                                    </style>
                                                                            <table class="col-md-12">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Activity
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Activity ?
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Risk catagory
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Risk event
                                                                                        </th>
                                                                                        <th class="bg_sky noborbottom" rowspan="2">Department Stakeholder</th>

                                                                                        <th class="bg_sky noborbottom" rowspan="2">probability</th>

                                                                                        <th class="bg_sky noborbottom" rowspan="2">
                                                                                            Impact
                                                                                        </th>
        
                                                                                        <th class="bg_sky noborbottom" rowspan="2"
                                                                                            colspan="1">
                                                                                            Risk Score
                                                                                        </th>
                                                                                    </tr>
{{--                                                                                     
                                                                                    <tr>
                                                                                        <th>c</th>
                                                                                        <th>t</th>
                                                                                        <th>Q</th>
                                                                                        <th class="bg_bl nobortop white"><span
                                                                                                class="red">p</span>*(C+T+Q)/3</th>
                                                                                    </tr> --}}
                                                                                </thead>
                                                                                <tbody id="riskmatrix">
                                                                                    <tr>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
                                                                                        <td><input type="text" class="form-control"></td>
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
                                                        {{-- <div class="tab-pane active" id="procurment" role="tabpanel"
                                                            aria-expanded="true">
                                                        </div> --}}
        
                                                    </div>
                                                </div>
        
                                            </div>

                                            {{-- <button type="button" class="btn btn-success alert-success-msg m-b-10" style=" margin-left: 80%;">Submit
                                                Monitoring</button> --}}
        
        
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <!-- Form Basic Wizard card end -->
                    </div>
                </form>
            </div>
            <div class="p_details" style="padding-left: 15px !important;  padding-right: 15px !important;">
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

{{-- this is custome dgme js for this page only Ok ? if you want to add kindly add here dont mess here!! --}}
<script src="{{asset('_monitoring/js/_dgme/DGME_officer_inprogressSingle.js')}}"></script>

<script>
    $(document).on('change', '#sector', function() {
    var opt = $(this).val()
    //   console.log(opt);
    $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onsectorselect', // This is the url we gave in the route
    data: {
    "_token": "{{ csrf_token() }}",
    'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
    console.log(response);
    $("#sub_sectors").empty();
    $.each(response, function () {
        $('#sub_sectors').append("<option value=\""+this.id+"\">"+this.name+"</option>");
    });
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
    });
    });
</script>
@endsection
