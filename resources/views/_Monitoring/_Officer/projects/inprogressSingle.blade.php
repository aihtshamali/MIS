@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/sweetalert.css')}}" />   
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/component.css')}}" />
 <!-- Select 2 css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/multiselect/css/multi-select.css')}}" />
{{-- datedropper --}}
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/datedropper/datedropper.min.css')}}" />
{{-- Data Tables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />

<style>
.bg-new{
 background:linear-gradient(to left, black,#404E67 );   
}

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
    margin-top:5px;
    margin-bottom:20px;
}

</style>
@section('content')
<div class="row">
        <div class="col-sm-12 col-xl-12">
                <div class="card z-depth-5" >
                        <div class="card-header">
                            <h5>Project Details</h5>
                            {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
        
                        </div>
                        <div class="card-block">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="GS_no" class="block form-control">GS # </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="project_title" class="block form-control">Project Title </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="project_cost" class="block form-control">Cost </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Location" class="block form-control">Location </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="PHI" class="block form-control">PHI </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="planned_start_date" class="block form-control">Planned Start Date </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="planned_end_date" class="block form-control">Planned End Date </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="actual_start_date" class="block form-control">Actual Start Date </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="progress" class="block form-control">Progress %</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Financial" class="block form-control">Financial Progress %</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_monitoring" class="block form-control">Last Monitoring Date </label>
                                    </div>
                                   
                                </div>
                        </div>
                        <div class="card-footer">

                            </div>
                </div>
            <!-- Form Basic Wizard card start -->
            <form action="">
            <div class="card z-depth-5">
                <div class="card-header"> 
                </div>
                <div class="card-block">
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div id="wizard1">
                                <section>
                                    <form class="wizard-form" id="basic-forms" action="#">
                                        <h3> <b>SUMMARY </b></h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-1 col-sm-1">
                                                </div>
                                                <a href="#">
                                                <div class="col-md-4 col-sm-2">
                                                    <div class="card ">
                                                        <div class="card-header"></div> 
                                                        <div class="card-block">
                                                            <h3  style="text-align:center; vertical-align:middle; font-size:25px;">Work Breakdown Structure <br>(WBS)</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                                
                                                <div class="col-md-1 col-sm-1"></div>
                                                <a href="#">
                                                    <div class="col-md-4 col-sm-2">
                                                    <div class="card ">
                                                        <div class="card-header"></div> 
                                                        <div class="card-block">
                                                            <h3  style="text-align:center; vertical-align:middle; font-size:25px;">Ghantt <br>Chart</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                                

                                                <div class="col-md-1 col-sm-1"> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-1 col-sm-1">
                                                </div>

                                                <a href="#">
                                                <div class="col-md-4 col-sm-2">
                                                        <div class="card summary-card bg-new">
                                                            <div class="card-header"></div> 
                                                            <div class="card-block">
                                                                <h3  style="text-align:center;  vertical-align:middle; font-size:25px;">Burn <br>Chart</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                
                                                
                                                <div class="col-md-1 col-sm-1"></div>
                                                 <a href="">
                                                    <div class="col-md-4 col-sm-2">
                                                            <div class="card summary-card bg-new">
                                                                <div class="card-header"></div> 
                                                                <div class="card-block">
                                                                    <h3  style="text-align:center; vertical-align:middle; font-size:25px;">Progress</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                <div class="col-md-1 col-sm-1"> 
                                                </div>
                                               
                                            </div>
                                        </fieldset>
                                        <h3><b>CONDUCT MONITORING</b></h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="name-2" class="block">First name *</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="name-21" name="name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="surname-2" class="block">Last name *</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="surname-21" name="surname" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="phone-2" class="block">Phone #</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="phone-21" name="phone" type="number" class="form-control phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="date" class="block">Date Of Birth</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="date1" name="Date Of Birth" type="text" class="form-control date-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    Select Country</div>
                                                <div class="col-sm-12">
                                                    <select class="form-control required">
                                                        <option>Select State</option>
                                                        <option>Gujarat</option>
                                                        <option>Kerala</option>
                                                        <option>Manipur</option>
                                                        <option>Tripura</option>
                                                        <option>Sikkim</option>
                                                    </select>
                                                            </div>
                                                        </div>
                                        </fieldset>
                                        
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div> --}}

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
                                    {{-- <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p> --}}
                                    {{-- <fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-2 col-sm-1">
                                                </div>
                                                
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="card ">
                                                        <div class="card-header"></div> 
                                                        <div class="card-block">
                                                            <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:20px;margin-top:-6%;margin-left:7%;" data-modal="modal-1"></button>
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
                                                
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="card ">
                                                            <div class="card-header"></div> 
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-2"></button>
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
                                                    <div class="col-md-1 col-sm-1"></div>
                                                    <div class="col-md-2 col-sm-2">
                                                            <div class="card ">
                                                                <div class="card-header"></div> 
                                                                    <div class="card-block">
                                                                        <div class="animation-model">
                                                                            <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-2"></button>
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
                                                <div class="col-md-2 col-sm-1">
                                                </div>
                                                
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="card ">
                                                        <div class="card-header"></div> 
                                                        <div class="card-block">
                                                            <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:20px;margin-top:-6%;margin-left:7%;" data-modal="modal-1"></button>
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
                                                
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="card ">
                                                            <div class="card-header"></div> 
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                    <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-2"></button>
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
                                                    <div class="col-md-1 col-sm-1"></div>
                                                    <div class="col-md-2 col-sm-2">
                                                            <div class="card ">
                                                                <div class="card-header"></div> 
                                                                    <div class="card-block">
                                                                        <div class="animation-model">
                                                                            <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-2"></button>
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
                                                    <div class="col-md-2 col-sm-1">
                                                    </div>
                                                    
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="card ">
                                                            <div class="card-header"></div> 
                                                            <div class="card-block">
                                                                <div class="animation-model">
                                                                        <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:20px;margin-top:-6%;margin-left:7%;" data-modal="modal-1"></button>
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
                                                    
                                                        <div class="col-md-3 col-sm-3">
                                                            
                                                        </div>  
                                                        <div class="col-md-1 col-sm-1"></div>
                                                        <div class="col-md-2 col-sm-2">
                                                                <div class="card ">
                                                                    <div class="card-header"></div> 
                                                                        <div class="card-block">
                                                                            <div class="animation-model">
                                                                                <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "  style="text-align:center; vertical-align:middle; font-size:25px;margin-left:15%" data-modal="modal-2"></button>
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
                                    </fieldset> --}}
                                    <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#financial" role="tab"><b style="font-size:14px; font-weight:bold;">Financial</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#physical" role="tab"><b style="font-size:14px; font-weight:bold;">Physical</b> </a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#quality_assesment" role="tab"><b style="font-size:14px; font-weight:bold;">Quality Assesment</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#stakeholder" role="tab"><b style="font-size:14px; font-weight:bold;">Stakeholders</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#issues" role="tab"><b style="font-size:14px; font-weight:bold;">Issues</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#risks" role="tab"><b style="font-size:14px; font-weight:bold;">Risks</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#HSE" role="tab"><b style="font-size:14px; font-weight:bold;">Health Safety Enviornment</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#procurement" role="tab"><b style="font-size:14px; font-weight:bold;">Procurement</b></a>
                                                <div class="slide" style="background:#fe8774;"></div>
                                            </li> 
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs-left-content card-block">
                                            {{-- Financial --}}
                                            <div class="tab-pane active " id="financial" role="tabpanel">
                                                <div class="card z-depth-5">
                                                    <div class="card-header">
                                                        <h4>FINANCIAL COST</h4>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="allocation_cost" class="block form-control">Cost Allocation : </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="release_to_date" class="block form-control">Release To Date : </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="utilization_allocation" class="block form-control">Utilization Against Allocation : </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="u_against_rel" class="block form-control">Utilization Against Release : </label>
                                                                
                                                            </div>
                                                        </div>
                                                    <div class="divider"></div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <b><label for="kpis">KPI(s) : </label></b>
                                                            <select class="js-example-basic-multiple js-placeholder-multiple col-sm-12"  multiple="multiple">
                                                            {{-- <option value="" selected>Select</option> --}}
                                                            <option value="1">KPI 1</option>
                                                            <option value="2">KPI 2</option>
                                                            <option value="3">KPI 3</option>
                                                            <option value="4">KPI 4</option>
                                                            <option value="5">KPI 5</option>
                                                        </select>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <b><label for="sectors">Sectors : </label></b>
                                                            <select  name="sectors[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12"  multiple="multiple">
                                                                @foreach ($sectors as $sector)
                                                                    @if($sector->status == 1)
                                                                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>   
                                                    <div class="divider-dotted"></div>
                                                    <div class=" form-group row">
                                                    <div class="col-md-4">
                                                    <b><label for="asd">Actual Start Date : </label></b>
                                                        <input id="dropper-default" class="form-control" type="text" placeholder="Select your date" />                                                                
                                                    </div>
                                                    <div class="col-md-4">
                                                            <b><label for="asd">T S : </label></b>
                                                        <input id="dropper-animation" class="form-control" type="text" placeholder="Select your date" />                                                                
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b><label for="asd">Contract Award Date : </label></b>
                                                        <input id="dropper-format" class="form-control" type="text" placeholder="Select your date" />                                                                
                                                    </div>
                                                    </div>                                                            
                                                    </div>
                                                    {{-- <div class="card-footer"></div> --}}
                                                </div>           
                                            </div>

                                            {{-- Physical --}}
                                            <div class="tab-pane" id="physical" role="tabpanel">
                                                <div class="card z-depth-5">
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
                                                                        <td>0.00</td>
                                                                        <td>6</td>
                                                                        <td>2 months</td>
                                                                        <td>2011/04/25</td>
                                                                        <td>2015/04/25</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Analysis</td>
                                                                        <td>0.00</td>
                                                                        <td>2</td>
                                                                        <td>2 months</td>
                                                                        <td>2011/04/25</td>
                                                                        <td>2015/04/25</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Observations</td>
                                                                        <td>0.00</td>
                                                                        <td>2</td>
                                                                        <td>2 months</td>
                                                                        <td>2011/04/25</td>
                                                                        <td>2015/04/25</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Visits</td>
                                                                        <td>0.00</td>
                                                                        <td>2</td>
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
                                            
                                            {{-- Quality Assesment --}}
                                            <div class="tab-pane" id="quality_assesment" role="tabpanel">
                                                {{-- <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p> --}}
                                                <div class="card z-depth-5">
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
                                                <div class="card z-depth-5">
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
                                                                <button class="btn btn-md btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-md btn-outline-danger"> NO</button>
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
                                                                <button class="btn btn-md btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-md btn-outline-danger"> NO</button>
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
                                                                <button class="btn btn-md btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-md btn-outline-danger"> NO</button>
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
                                                                <button class="btn btn-md btn-outline-success"> YES</button>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <button class="btn btn-md btn-outline-danger"> NO</button>
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
                                        
                                            {{-- Stakeholders --}}
                                            <div class="tab-pane" id="stakeholder" role="tabpanel">
                                                    <div class="card z-depth-5">
                                                            <div class="card-header">
                                                                <h4>Stakeholders</h4>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                            </div>
                                                            <div class="card-block">
                                                                    <div class="dt-responsive table-responsive">
                                                                            <table id="simpletable3"
                                                                                    class="table table-striped table-bordered nowrap">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Designation</th>
                                                                                <th>Department</th>
                                                                                <th>Contact #</th>
                                                                                <th>Email </th>
                                                                                
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <tr>
                                                                                        <td>Hassan Warriach</td>
                                                                                        <td>Systems Administrator</td>
                                                                                        <td>Dummy Dept</td>
                                                                                        <td>0900-78601</td>
                                                                                        <td>abc@gmail.com</td>
                                                                                        
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Aymun Saif</td>
                                                                                        <td>Software Consultant</td>
                                                                                        <td>Dummy Dept</td>
                                                                                        <td>0900-78601</td>
                                                                                        <td>abc@gmail.com</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Aihtsham Ali</td>
                                                                                        <td>Accountant</td>
                                                                                        <td>Dummy Dept</td>
                                                                                        <td>0900-78601</td>
                                                                                        <td>abc@gmail.com</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Anas Majeed</td>
                                                                                        <td>System Architect</td>
                                                                                        <td>Dummy Dept</td>
                                                                                        <td>0900-78601</td>
                                                                                        <td>abc@gmail.com</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Hassan Ali</td>
                                                                                        <td>Regional Directo</td>
                                                                                        <td>Dummy Dept</td>
                                                                                        <td>0900-78601</td>
                                                                                        <td>abc@gmail.com</td>
                                                                                    </tr>
                                                                                    
                                    
                                                                            </tbody>
                                                                            
                                                                        </table>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                {{-- <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p> --}}
                                            </div>

                                            {{--issues   --}}
                                            <div class="tab-pane" id="issues" role="tabpanel">
                                                    <div class="card z-depth-5">
                                                        <div class="card-header">
                                                            <h4>Issues and Observations</h4>
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique totam harum sit. Quibusdam libero, harum rem quam repellendus adipisci. Repellat sapiente asperiores numquam beatae at distinctio quaerat reiciendis repudiandae.
                                                        </div>
                                                        <div class="card-block">
                                                            <div class="dt-responsive table-responsive">
                                                                <table id="simpletable"
                                                                        class="table table-striped table-bordered nowrap">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Issues</th>
                                                                        <th>Sovereignty</th>
                                                                        <th>Owner/Authorized Person</th>
                                                                        
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
                                                                                    <select class="form-control form-control-danger">
                                                                                        <option value="" selected disabled>Select</option>
                                                                                        <option value="1" >Contractor</option>
                                                                                        <option value="2" >Consumer</option>
                                                                                        <option value="3" >Dummy 1</option>  

                                                                                    </select></td>
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
                                                                                    <select class="form-control form-control-danger">
                                                                                        <option value="" selected disabled>Select</option>
                                                                                        <option value="1" >Contractor</option>
                                                                                        <option value="2" >Consumer</option>
                                                                                        <option value="3" >Dummy 1</option>  

                                                                                    </select></td>
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
                                                                                    <select class="form-control form-control-danger">
                                                                                        <option value="" selected disabled>Select</option>
                                                                                        <option value="1" >Contractor</option>
                                                                                        <option value="2" >Consumer</option>
                                                                                        <option value="3" >Dummy 1</option>  

                                                                                    </select></td>
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
                                                                                    <select class="form-control form-control-danger">
                                                                                        <option value="" selected disabled>Select</option>
                                                                                        <option value="1" >Contractor</option>
                                                                                        <option value="2" >Consumer</option>
                                                                                        <option value="3" >Dummy 1</option>  

                                                                                    </select></td>
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
                                                                                    <select class="form-control form-control-danger">
                                                                                        <option value="" selected disabled>Select</option>
                                                                                        <option value="1" >Contractor</option>
                                                                                        <option value="2" >Consumer</option>
                                                                                        <option value="3" >Dummy 1</option>  

                                                                                    </select></td>
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
                                                                                    <select class="form-control form-control-danger">
                                                                                        <option value="" selected disabled>Select</option>
                                                                                        <option value="1" >Contractor</option>
                                                                                        <option value="2" >Consumer</option>
                                                                                        <option value="3" >Dummy 1</option>  

                                                                                    </select></td>
                                                                            </tr>
                                                                        </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        
                                            {{-- risks --}}
                                            
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

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="{{asset('_monitoring/js/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/modalEffects.js')}}"></script>
<script src="{{asset('_monitoring/css/js/classie.js')}}"></script>
<script src="{{asset('_monitoring/css/js/modal.js')}}"></script>
<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
{{-- date dropper --}}
<script src="{{asset('_monitoring/js/datedropper/js/datedropper.min.js')}}"></script>
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
$("#dropper-default").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#1abc9c", 
        dropBorder: "1px solid #1abc9c"
    }),
$("#dropper-animation").dateDropper( {
        dropWidth: 200,
        init_animation: "bounce",
        dropPrimaryColor: "#1abc9c", 
        dropBorder: "1px solid #1abc9c"
    }),
$("#dropper-format").dateDropper( {
        dropWidth: 200,
        format: "F S, Y",
        dropPrimaryColor: "#1abc9c", 
        dropBorder: "1px solid #1abc9c"
    });
document.querySelector('.alert-success-msg').onclick = function(){
    swal("Good job!", "You submitted the project!", "success");
};
</script>

@endsection
