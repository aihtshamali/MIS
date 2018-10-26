@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/sweetalert.css')}}" />   
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/component.css')}}" />
 <!-- Select 2 css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/multiselect/css/multi-select.css')}}" />
{{-- datedropper --}}
<link rel="stylesheet" href="{{ asset('_monitoring/css/pages/advance-elements/css/bootstrap-datetimepicker.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/daterangepicker.css')}}" />
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/datedropper/datedropper.min.css')}}" /> --}}
{{-- Data Tables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/icofont/css/icofont.css')}}"/>
<style>
.bg-new{
 background:linear-gradient(to left, black,#404E67 );   
}
th, td {
    white-space: inherit !important;
}
#physical, #quality_assesment , #stakeholder , #issues , #risks ,#HSE , #procurement{
    display:none;
}
.noborder{border: none !important;padding: 3% !important;}

.summary-card{
  margin: 15px;
  border-radius: 5px;
  width:300px;
  padding:10px;
  height: 180px;
-webkit-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
-moz-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
}
a:hover{
text-decoration: none;
}
.summary-card:hover{
  background:white; !important
  margin: 15px;
  border-radius: 5px;
  width:300px;
  padding:10px;
  height: 180px;
  -webkit-box-shadow: 0px -1px 79px 14px rgba(189,187,189,1);
-moz-box-shadow: 0px -1px 79px 14px rgba(189,187,189,1);
box-shadow: 0px -1px 79px 14px rgba(189,187,189,1);

}
.divider{
    border:#404E67  1px solid ;
    margin-top:5px;
    margin-bottom:20px;
}
.divider-dotted{
    border:#fe8774  1px dashed;
    margin-top: 21px;
    margin-bottom: 15px;
}
.fixed{position: fixed !important;}
.z-9999{z-index: 9999 !important}
.bg-g{background-color: #f6f7fb !important;}
.z-depth-5{box-shadow: none !important;}
.border_top{border-top: 1px solid #777 !important;}
.bg-w{background:white!important;}
/* .navbar-logo[logo-theme="theme1"]{padding: 6.2% 0% !important;} */
@media (min-width: 768px){
.offset-md-2 {
    margin-left: 17.8% !important;
}}
.risktable{
    padding:0px; !imporatant
    margin:0px; !important
}

</style>
@section('content')
                
<div style="margin-top:-3.8% !important;">
    <div class="col-md-12 fixed z-9999 bg-g" style="margin-left:-2.79% !important;">
    <div class="">
        {{-- <h5>Project Details</h5> --}}
        {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}

    </div>
    <div class="bg-w border_top bg-w" style="padding:0.25rem !important;" >
        <style scoped>
            .form-group{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;}
            .form-group{padding: 0.05rem 0.75rem !important;}
            .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{padding-left: 0px !important;padding-right: 0px !important;}
            label{margin-bottom:0rem !important;border:none !important;background-color:transparent !important;padding:0rem 0.3rem !important;font-size: 12px !important;}

        </style>
            {{-- <h5>Project Details</h5> --}}
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
                    <input name="phi" id="#phi" type="number"/>
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
                    <input type="text"  id="financial_progress" name="financial_progress">
                </div>
                <div class="col-md-4">
                    <label for="last_monitoring" class="">Last Monitoring Date </label>
                </div>
               
            </div>
    </div>
</div>
</div>
<div class="row">
        <div class="col-sm-12 col-xl-12" style="margin-top:12% !important;">
            <!-- Form Basic Wizard card start -->
            <form action="">
            <div class="card z-depth-3">
                <div class="card-header"> 
                </div>
                <div class="card-block">
                    <div class="row m-b-30">
                        <div class="col-lg-12 col-xl-12 col-md-8 col-sm-6">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#summary" role="tab"><span style="font-size:15px; font-weight:bold;">SUMMARY</span></a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#c_monitoring" role="tab"><span style="font-size:15px; font-weight:bold;">CONDUCT MONITORING</span></a>
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
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:20px;margin-top:-6%;margin-left:7%;" data-modal="modal-1">Work Breakdown <br>Structure<br>(WBS)</button>
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
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-2">Ghantt Chart</button>
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
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-3">Burn Chart</button>
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
                                                                        <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:18%" data-modal="modal-4">PROGRESS</button>
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
                                <div class="tab-pane" id="c_monitoring" role="tabpanel">
                                    <div class="row">
                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-6">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs  tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active financial" data-toggle="tab" href="#financial" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link physical" data-toggle="tab" href="#physical" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Physical</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link quality_assesment" data-toggle="tab" href="#quality_assesment" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Quality Assesment</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link stakeholder" data-toggle="tab" href="#stakeholder" role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Stakeholders</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link issues" data-toggle="tab" href="#issues" role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Issues</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link risks" data-toggle="tab" href="#risks" role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Risks</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link HSE" data-toggle="tab" href="#HSE" role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Health Safety Enviornment</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link procurement" data-toggle="tab" href="#procurement" role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Procurement</b></a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active"  id="financial" role="tabpanel" aria-expanded="false">
                                                <div class="card m-0 z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>FINANCIAL COST</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="form-group row" >
                                                        <div class="col-md-6" style="padding:5px;">
                                                            <label for="allocation_cost" class="block form-control"> <b style="font-size:14px;">Cost Allocation : </b></label>
                                                        </div>
                                                        <div class="col-md-3" style="padding:5px;">
                                                            <label for="release_to_date" class="block form-control"><b style="font-size:14px;">Release To Date : </b></label>
                                                        </div>
                                                        <div class="col-md-3" style="padding:5px;" >
                                                            <input type="text" name="release_to_date" id="release_to_date"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <div class="col-md-3" style="padding:5px;">
                                                                <label for="utilization_allocation" class="block form-control"><b style="font-size:14px;">Utilization Against Allocation : </b></label>
                                                            </div>
                                                            <div class="col-md-3" style="padding:5px;">
                                                                <input type="text" name="utilization_allocation" id="utilization_allocation"/>
                                                            
                                                            </div>
                                                            <div class="col-md-3" style="padding:5px;">
                                                                <label for="u_against_rel" class="block form-control"><b style="font-size:14px;">Utilization Against Release :</b> </label>
                                                            </div>
                                                            <div class="col-md-3" style="padding:5px; ">
                                                                <input type="text"name="u_against_rel" id="u_against_rel"/>
                                                            </div>
                                                        </div>
                                                    <div class="divider"></div>
                                                    <div class="form-group row">
                                                            <div class="col-md-5">
                                                                    <b><label for="sectors">Sectors : </label></b>
                                                                    <select  name="sectors[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12 form-control"  multiple="multiple">
                                                                        @foreach ($sectors as $sector)
                                                                            @if($sector->status == 1)
                                                                            <option value="{{$sector->id}}">{{$sector->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                            <b><label for="kpis">KPI(s) : </label></b>
                                                            <select class="js-example-basic-multiple js-placeholder-multiple col-sm-12 form-control"  multiple="multiple">
                                                            {{-- <option value="" selected>Select</option> --}}
                                                            <option value="1">KPI 1</option>
                                                            <option value="2">KPI 2</option>
                                                            <option value="3">KPI 3</option>
                                                            <option value="4">KPI 4</option>
                                                            <option value="5">KPI 5</option>
                                                        </select>

                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        
                                                    </div>   
                                                    <div class="divider-dotted"></div>
                                                    <div class=" form-group row">
                                                    <div class="col-md-3">
                                                    <b><label for="asd">Actual Start Date : </label></b>
                                                        <input class="form-control" type="text" name="asd" placeholder="Select your date" />                                                                
                                                    </div>
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-3">
                                                            <b><label for="ts">Technical Sanction : </label></b>
                                                        <input  class="form-control" type="text" name="ts" placeholder="Select your date" />                                                                
                                                    </div>
                                                    <div class="col-md-1">
                                                        </div>
                                                    <div class="col-md-3">
                                                        <b><label for="cwd">Contract Award Date : </label></b>
                                                        <input class="form-control" type="text" name="cwd" placeholder="Select your date" />                                                                
                                                    </div>
                                                    </div>                                                            
                                                    </div>
                                                    {{-- <div class="card-footer"></div> --}}
                                                </div>  
                                            </div>
                                            <div class="tab-pane" id="physical" role="tabpanel" aria-expanded="false">
                                                <div class="card z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>PHYSICAL</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="simpletable"
                                                                    class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                <tr>
                                                                    <th>Activities</th>
                                                                    <th>Units</th>
                                                                    <th>Quantity</th>
                                                                    <th>Duration</th>
                                                                    <th>Start date</th>
                                                                    <th>End Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Documents</td>
                                                                        <td><input type="number" step="0.01" name="units" /></td>
                                                                        <td><input type="number"  name="quantity" /></td>
                                                                        <td>2 months</td>
                                                                        <td>2011/04/25</td>
                                                                        <td>2015/04/25</td>
                                                                    </tr>
                                                                    
                                                                       
                                                                </tbody>
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="quality_assesment" role="tabpanel" aria-expanded="false">
                                                <div class="card z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>Quality Assesment</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                                <table id="simpletable"
                                                                        class="table table-striped table-bordered nowrap">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Activities</th>
                                                                        <th>Assesment</th>
                                                                        <th>Comments</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Dummy Activity</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" style="background:#e85445;color:white;">Poor</option>
                                                                                <option value="2" style="background:#f5d75c;color:white;">Partially Satisfactory</option>
                                                                                <option value="3" style="background:#44d581;color:white;">Satisfactory</option> 
                                                                            </select>
                                                                            </td>
                                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Dummy Activity</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" style="background:#e85445;color:white;">Poor</option>
                                                                                <option value="2" style="background:#f5d75c;color:white;">Partially Satisfactory</option>
                                                                                <option value="3" style="background:#44d581;color:white;">Satisfactory</option> 
                                                                            </select>
                                                                            </td>
                                                                            <td>Lorem ipsum dolor sit amet.</td>
                                                                        </tr>
                                                                    </tbody>
                                                                    
                                                                </table>
                                                        </div>
                                                    </div>
                                                
                                                </div>
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
                                                                <button class="btn btn-success btn-sm btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-danger btn-sm btn-outline-danger"> NO</button>
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
                                                                <button class="btn btn-success btn-sm btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-danger btn-sm btn-outline-danger"> NO</button>
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
                                                                <button class="btn btn-success btn-sm btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-danger btn-sm btn-outline-danger"> NO</button>
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
                                                                <button class="btn btn-success btn-sm btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-danger btn-sm btn-outline-danger"> NO</button>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>          
                                                    </div>
                                                    <div class="card-footer">
                                                        <h6><b>Comments</b></h6>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                            <p class="block form-control">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, eligendi!
                                                            </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane active"  id="stakeholder" role="tabpanel" aria-expanded="true">
                                                {{-- <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p> --}}
                                                <div class="card z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>Stakeholders</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                    <table class="table  table-bordered nowrap">
                                                                    <thead>
                                                                    <tr>
                                                                        <th >Name</th>
                                                                        <th>Designation</th>
                                                                        <th>Department</th>
                                                                        <th>Contact #</th>
                                                                        <th>Email </th>
                                                                        <th>Action</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="stakeholders" >
                                                                        <tr>
                                                                        <td><input type="text" name="stakeholder_name" class="form-control" /></td>
                                                                        <td><input type="text" name="stakeholder_designation" class="form-control" /> </td>
                                                                        <td><input type="text" name="stakeholder_dept" class="form-control" /></td>
                                                                        <td><input type="text" name="stakeholder_number" class="form-control" /></td>
                                                                        <td><input type="text" name="stakeholder_email" class="form-control" /></td>
                                                                        <td><button type="button" name="add[]" class=" form-control btn btn-success btn-outline-success"  id="add-more" style="size:14px;">+</button></td>
                                                                        
                                                                    </tr>   
                                                                            
                            
                                                                    </tbody>
                                                                    
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                          
                                            </div>
                                            <div class="tab-pane active"  id="issues" role="tabpanel" aria-expanded="true">
                                                <div class="card z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>Issues and Observations</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                <tr>
                                                                    <th>Issues</th>
                                                                    <th>Severity</th>
                                                                    <th>Responsible</th>
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>Time</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" >Very High</option>
                                                                                <option value="2" >High</option>
                                                                                <option value="3" >Medium</option> 
                                                                                <option value="4" >Low</option> 
                                                                                <option value="5" >Very Low</option> 

                                                                            </select>
                                                                            </td>
                                                                            <td> 
                                                                                    <input type="text" name="owner"/> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Cost</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" >Very High</option>
                                                                                <option value="2" >High</option>
                                                                                <option value="3" >Medium</option> 
                                                                                <option value="4" >Low</option> 
                                                                                <option value="5" >Very Low</option> 

                                                                            </select>
                                                                            </td>
                                                                            <td> 
                                                                                    <input type="text" name="owner"/> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Quality</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" >Very High</option>
                                                                                <option value="2" >High</option>
                                                                                <option value="3" >Medium</option> 
                                                                                <option value="4" >Low</option> 
                                                                                <option value="5" >Very Low</option> 

                                                                            </select>
                                                                            </td>
                                                                            <td> 
                                                                                    <input type="text" name="owner"/> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Scope</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" >Very High</option>
                                                                                <option value="2" >High</option>
                                                                                <option value="3" >Medium</option> 
                                                                                <option value="4" >Low</option> 
                                                                                <option value="5" >Very Low</option> 

                                                                            </select>
                                                                            </td>
                                                                            <td> 
                                                                                    <input type="text" name="owner"/> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Benefits</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" >Very High</option>
                                                                                <option value="2" >High</option>
                                                                                <option value="3" >Medium</option> 
                                                                                <option value="4" >Low</option> 
                                                                                <option value="5" >Very Low</option> 

                                                                            </select>
                                                                            </td>
                                                                            <td> 
                                                                                    <input type="text" name="owner"/> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Risks</td>
                                                                            <td>
                                                                                <select class="form-control form-control-primary">
                                                                                <option value="" selected disabled>Select</option>
                                                                                <option value="1" >Very High</option>
                                                                                <option value="2" >High</option>
                                                                                <option value="3" >Medium</option> 
                                                                                <option value="4" >Low</option> 
                                                                                <option value="5" >Very Low</option> 

                                                                            </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="owner"/> 
                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane active"  id="risks" role="tabpanel" aria-expanded="true">
                                                <div class="card z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>Risks</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                        <div class="card-block">
                                                            <div class="col-md-12">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="complex-dt" class=" risktable table table-bordered nowrap">
                                                                        <thead>
                                                                        <tr>
                                                                            <th rowspan="2" style=" background:#8bd2fd;text-align: center;
                                                                            vertical-align: middle;">
                                                                                    Risk Category
                                                                            </th>
                                                                            <th rowspan="2" style=" background:#8bd2fd; text-align: center;
                                                                            vertical-align: middle;">
                                                                                    Risk Events
                                                                            </th>
                                                                            <th rowspan="2" style="padding: 0px;" >
                                                                                <table >
                                                                                    <tr>
                                                                                        <th colspan="4" style=" background:#ffe55e; border:none; text-align:center;">Before Mitigation</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="text-align: center;
                                                                                        vertical-align: middle; background:lightgray;" ><b style="color:red;">Probabilty</b></th>
                                                                                        <th style="padding:0;text-align: center;
                                                                                        vertical-align: middle; background:grey;">
                                                                                            <table >
                                                                                                <tr>
                                                                                                    <th rowspan="2" style="background:grey; border:none;">Severity</th>
                                                                                                    <table >
                                                                                                        <tr>
                                                                                                        <th style="background:lightgray" >C</th>
                                                                                                        <th style="background:lightgray" >T</th>
                                                                                                        <th style="background:lightgray">Q</th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                    <th style="background:#5a72fe; text-align: center;
                                                                                                    vertical-align: middle;">
                                                                                                            Impact <br> P*(C+T+Q)/3
                                                                                                        </th>
                                                                                                        <th style=" background:#8bd2fd; text-align: center;
                                                                                                        vertical-align: middle;">
                                                                                                            Risk Owner
                                                                                                        </th>
                                                                                                        <th style=" background:#8bd2fd; text-align: center;
                                                                                                        vertical-align: middle;">
                                                                                                            Risk Response
                                                                                                        </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                            
                                                                                        </th>
                                                                                            

                                                                                    </tr>
                                                                                
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                        
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>here</td>
                                                                                <td>here2</td>
                                                                            </tr>

                                                                        </tbody>
                                                                    
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   </div>
                                            </div>
                                            <div class="tab-pane active"  id="HSE" role="tabpanel" aria-expanded="true">
                                                <div class="card z-depth-right-0">
                                                    <div class="card-header">
                                                        <h4>Health Safety Enviornment</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
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
                                                                        <tbody id="stakeholders" >   
                                                                             <tr>
                                                                                <td>1.</td>
                                                                                <td>Do workers have a safe route to their place of work?</td>
                                                                                
                                                                                <td >
                                                                                    <div class="checkbox-fade fade-in-success m-0">
                                                                                        <label>
                                                                                            <input type="checkbox"  id="yes">
                                                                                            <span class="cr">
                                                                                            <i class="cr-icon icofont icofont-ui-check txt-success"></i>
                                                                                        </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </td>        
                                                                                <td > 
                                                                                    <div class="checkbox-fade fade-in-danger m-0">
                                                                                        <label>
                                                                                            <input type="checkbox"  id="no" checked>
                                                                                            <span class="cr">
                                                                                            <i class="cr-icon icofont icofont-ui-check txt-danger"></i>
                                                                                        </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                       
                                                                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, tempore?</td>
                                                                                </tr> 
                                                                                
                                
                                                                        </tbody>
                                                                        
                                                                    </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane active"  id="stakeholder" role="tabpanel" aria-expanded="true"></div>


                                        </div>
                                    </div>
                                    
                                   </div>
                               <button type="button" class="btn btn-success alert-success-msg m-b-10" style=" margin-left: 80%;" >Submit Monitoring</button>
                                    
                                
                            </div>
                        </div>
                        </div>
                     </div>

                </div>
            <!-- Form Basic Wizard card end -->
           
        </div>
    </form>
        </div>
    </div>
@endsection
@section("js_scripts")
<script src="{{asset('_monitoring/js/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery.steps/js/jquery.steps.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery-validation/js/jquery.validate.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/form-validation/validate.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/forms-wizard-validation/form-wizard.js')}}"></script>

<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
{{-- date dropper --}}

<script src="{{asset('_monitoring/css/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>

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

<script>
//  $('input[type="checkbox"]').on('change', function() {
//    $(this).parent().parent().siblings().children().children().children('input[type="checkbox"]').not(this).prop('checked', false);
// });
$('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
 function hideall()
 {
     $('#financial').hide();
     $('#physical').hide();
     $('#quality_assesment').hide();
     $('#stakeholder').hide();
     $('#issues').hide();
     $('#risks').hide();
     $('#HSE').hide();
     $('#procuremnet').hide();
}
$('.financial').on('click',function(){
    hideall();
    $('#financial').show();
});
$('.physical').on('click',function(){
    hideall();
    $('#physical').show();
});
$('.quality_assesment').on('click',function(){
    hideall();
    $('#quality_assesment').show();
});
$('.stakeholder').on('click',function(){
    hideall();
    $('#stakeholder').show();
});
$('.issues').on('click',function(){
    hideall();
    $('#issues').show();
});
$('.risks').on('click',function(){
    hideall();
    $('#risks').show();
});
$('.HSE').on('click',function(){
    hideall();
    $('#HSE').show();
});
$('.procuremnet').on('click',function(){
    hideall();
    $('#procurement').show();
});



document.querySelector('.alert-success-msg').onclick = function(){
    swal("Good job!", "You submitted the project!", "success");
};
$(function() {
        $('input[name="asd"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });
    });

$(function() {
        $('input[name="ts"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });
    });

$(function() {
    $('input[name="cwd"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});
</script>
<script>
    
$('button#add-more').click(function(e){
    var add_stakeholder='<tr>'
                        +'<td><input type="text" name="stakeholder_name" class="form-control" /></td>'
                        +'<td><input type="text" name="stakeholder_designation" class="form-control" /> </td>'
                        +'<td><input type="text" name="stakeholder_dept" class="form-control" /></td>'
                        +'<td><input type="text" name="stakeholder_number" class="form-control" /></td>'
                        +'<td><input type="text" name="stakeholder_email" class="form-control" /></td>'
                        +'<td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>   ';
                        $('#stakeholders').append(add_stakeholder);
                    });
    function removerow(e)
    {
        $(e).parent().parent().remove();
    }

</script>
@endsection
