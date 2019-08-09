<style>
    .ms-selection ul li {
        background: #119e36 !important;
        color: #fff !important;
    }

    .ms-container .ms-selectable li.ms-hover {
        background-color: #119e36;
    }

    /* 01a9ac */
</style>

<div class="tab-pane {{isset($maintab) && $maintab=='plan' ? 'active' : ''}}" id="p_monitoring" role="tabpanel">
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12  planNavBar">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs p_tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{isset($innertab) && $innertab=='documents' ? 'active' : ''}} 
                    PlanDoc" data-toggle="tab" href="#PlanDocDiv" role="tab" aria-expanded="false">
                    <b style="font-size:14px; font-weight:bold;">Documents</b></a>
                </li>
                <!-- {{-- <li class="nav-item">
                    <a class="nav-link financialphase" data-toggle="tab" href="#financial" id="fpli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial Phasing</b></a>
                </li> --}} -->
                <li class="nav-item">
                    <a class="nav-link {{isset($innertab) && $innertab == 'projectdesign' ? 'active' : ''}} i-dates" data-toggle="tab" href="#i-dates" id="pdli" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Project Design</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{isset($innertab) && $innertab == 'userLoc' ? 'active' : ''}} userlocTab" data-toggle="tab" href="#userlocDiv" id="" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">User Location</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="Mapping" ? "active" : ""}} MOBtab' id="MOBtab" data-toggle="tab" href="#MOBdiv" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Mapping Of objectives</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="KPI" ? "active" : ""}} kpis' data-toggle="tab" href="#kpis" role="tab" id="kpisss" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan WBS</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="uderKPI" ? "active" : ""}} userKPITab' data-toggle="tab" href="#userKPIDiv" id="" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">User WBS</b></a>
                </li>
               
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="task" ? "active" : ""}} activities' data-toggle="tab" href="#activities" id="tali" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Tasks</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="time" ? "active" : ""}} TimeTab' data-toggle="tab" href="#TimesDiv" id="tili" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Time</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="Costing" ? "active" : ""}} CostingTab' data-toggle="tab" href="#CostingDiv" id="cosli" role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Costing</b></a>
                </li>
             
            </ul>

            <div class="tab-content tabs card-block {{isset($maintab) && $maintab=='plan' ? 'active' : ''}}">
                
                <div class="tab-pane {{isset($innertab) && $innertab=='documents' ? 'active' : ''}}" 
                         id="PlanDocDiv" role="tabpanel" aria-expanded="true"> 
                    <div class="card">
                        <div class="card-header"> <h4><b>Documents & Images</b></h4></div>
                        <div class="card-block">
                            <form class="serializeform" action="{{route('saveMonitoringAttachments')}}" 
                            method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class="btn col-md-10 offset-md-2 btn-primary btn-block">
                                            <input type="file" id="html_btn" name="planmonitoringfile" title='Click to add Files' />
                                            <input type="hidden" name="page_tabs" value="plan_documents">
                                            <span>Upload File</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <input type="text" name="file_name" class="placeholder" style="width: 100%;padding: 2%;" placeholder="Type File Name" />
                                    </div>
                                    <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                    <div class="col-md-3 ">
                                        <button type="submit" class="btn btn-sm btn-success pull-right" name="submit">Submit</button>
                                    </div>
                                </div>
                                    
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">  <h4><b>Uploaded Attachments</b></h4> </div>
                        <div class="card-block"> 
                            @if($project_documents ->count())
                             <div class="row" style="margin-top:5%; margin-bottom: 10%;">   
                                <div class="offset-md-3">   
                                <div class="table table-stripped ">
                                    <table >
                                        <thead>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Attachments</th>
                                            <th>Upload Date & Time</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($project_documents as $p_doc)
                                                <tr>
                                                    <td>  
                                                        <form action="{{route('deleteAttachment')}}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                          <input type="hidden" name="page_tabs" value="plan_documents">
                                                        <input type="hidden" name="document_id" value="{{$p_doc->id}}">
                                                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                                        <button class="btn btn-sm btn-danger deleteObjective"  
                                                        onclick="return confirm('Are you sure?')" type="submit" id="" > 
                                                        <i class="fa fa-trash"></i> </button>
                                                         </form>
                                                    </td>
                                                    <td>{{$p_doc->attachment_name}}</td>
                                                    <td>
                                                        <a href="{{asset('storage/uploads/projects/monitoring_attachments/'.$p_doc->attachment_name.'.'.$p_doc->type)}}" download> 
                                                            <i class="fa fa-file-{{$icons[$p_doc->type]}}-o fa-1x text-center" title="{{$p_doc->attachment_name }}" /></i>    
                                                        </a>
                                                    </td>
                                                    <td>{{date('d-F-Y | H:i:s', strtotime($p_doc->created_at))}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                   
                                </div>
                                </div>
                            </div>
                           @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>No Uploaded Attachments</b></h5>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="tab-pane {{isset($innertab) && $innertab=='projectdesign' ? 'active' : ''}}" id="i-dates" role="tabpanel" aria-expanded="false">
                    <div class="card">
                        <div class="card-block">
                            <form class="serializeform" action="{{ route('projectDesignMonitoring') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                        <input type="hidden" name="page_tabs" value="plan_projectdesign">
                                        <input type="hidden" name="objct" id="objct" value="{{count($objectives)}}">
                                        <input type="hidden" name="compAct" id="compAct" value="{{count($components)}}">
                                        <div class="col-md-6 objtivesNew border_right pd_1_2">
                                        <div class="DisInlineflex newClass1 mb_2 col-md-12">
                                            <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective 1</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="obj[]" placeholder="Objective 1">
                                            </div>
                                            <div class="col-sm-2 addbtn text_center">
                                                <button class="btn btn-sm btn-info" type="button" id="add_more_objective" tabindex=1>+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 compActNew border_left pd_1_2">
                                        <div class="DisInlineflex newClasscompAct mb_2 col-md-12">
                                            <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component 1</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="comp[]" class="form-control" placeholder="Component 1">
                                            </div>
                                            <div class="col-sm-2 addbtn text_center">
                                                <button class="btn btn-sm btn-info" type="button" id="add_more_compAct" tabindex=100>+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn aho col-md-2 offset-md-10" type="submit" id="saveObjComp">Save & Proceed</button>
                                    </div>
                                </form>
                        
                        </div>
                    </div>
            
                    <div class="card">
                        <div class="card-header"><h4><b>Summary Of Objectives</b></h4></div>
                        <div class="card-block">
                            <div class="row">
                                @if(isset($objectives))
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <th></th>
                                                <th>Objectives</th>
                                            </tr>
                                            @foreach($objectives as $obj)                       
                                            <tr>
                                                <td>
                                                    <form action="{{route('deleteObjective')}}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                            <input type="hidden" name="page_tabs" value="plan_projectdesign">
                                                        <input type="hidden" name="objNo" value="{{$obj->id}}">
                                                        <button class="btn btn-sm btn-danger deleteObjective"  onclick="return confirm('Deletion of objective will lead to delete all the mappings of this objective.Are you sure?')" type="submit" id="deleteObjective" > <i class="fa fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                                <td> 
                                                    {{$obj->objective}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>  
                                    @else  
                                    <div class="col-sm-3">
                                        No Objectives Entered
                                    </div>
                                @endif
                            </div>
                        </div>    
                    </div> 

                    <div class="card">
                            <div class="card-header"><h4><b>Summary Of Components</b></h4></div>
                            <div class="card-block"> <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <th></th>
                                        <th> Components</th>
                                    </tr>
                                    @foreach($components as $comp)
                                    <tr>
                                        <td>
                                                <form action="{{route('deleteComponent')}}"  method="POST"  enctype="multipart/form-data">
                                
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="page_tabs" value="plan_projectdesign">
                                                    <input type="hidden" name="CompNo" value="{{$comp->id}}">
                                                    <button class="btn btn-sm btn-danger deleteComp" onclick="return confirm('Deletion of component will lead to delete this respective component from all mapped places.Are you sure?')"  type="submit" id="deleteComp" > <i class="fa fa-trash"></i>  </button>
                                                </form>        
                                        </td>
                                        <td>
                                                {{$comp->component}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div></div>
                    </div> 
                </div>

                <div class="tab-pane" id="financial" role="tabpanel" aria-expanded="false">
                    <form class="" action="index.html" method="post">
                        <div>
                            <h5 style="padding-top:20px;padding-bottom:10px;clear:both;">Original I</h5>
                            <div class="row">
                                <h5 class="col-md-4">Gestation Period: <b><span id="t_months"></span> months</b></h5>
                                <h5 class="col-md-4">Total Cost: <b><span id="t_cost"></span> Million(s)</b></h5>
                                <h5 class="col-md-4">Start Date: <b id="f_date"></b></h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table  table-bordered nowrap" id="countit">
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
                                <h5 class="col-md-4 float-right">Total Cost: <b>
                                        <span id="ot_cost">0</span> Million(s)</b>
                                </h5>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane {{isset($innertab) && $innertab == 'userLoc' ? 'active' : ''}} userlocDiv" id="userlocDiv" role="tabpanel" aria-expanded="false">
                    <!-- headings -->
                    <div class="card">
                        <div class="card-header"><h4><b>Assign Locations to Users</b></h4></div>
                        <div class="card-block">
                            <div class="row col-md-11">
                                    <div class="col-md-3 text-center">
                                        <h4 class="form-txt-primary">User</h4>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h4 class="form-txt-primary">Location</h4>
                                    </div>
                                    <div class="col-md-2  text-center" style="">
                                        <h4 class="form-txt-primary">Site Name</h4>
                                    </div>
                                    <div class="col-md-2  text-center">
                                        <h4 class="form-txt-primary">Start Date</h4>
                                    </div>
                                    <div class="col-md-2  text-center" style="">
                                        <h4 class="form-txt-primary">End Date</h4>
                                    </div>
                                </div>
                                <!-- end heading -->
                                <!-- user Location content -->
                                <form action="{{route('saveUserLocation')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="progress_id" value="{{$projectProgressId->id}}">
                                    <input type="hidden" name="counts" value="1" id="counts_user_location">
                                    <input type="hidden" name="page_tabs" value="plan_userLoc">
                    
                                    <div class="row col-md-12">
                                        <style media="screen" scoped>
                                            .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
                                                padding: 1% !important
                                            }
                    
                                            ;
                                        </style>
                                        <div class="col-md-11" id="CloneThisUserLoc" style="margin-bottom:1% !important;display: inline-flex;">
                                            <div class="col-md-3 text-center">
                                                <div class="col-md-11 offset-md-1 delLastLocChild">
                                                    <select class="select2" id="" name="user_location_1">
                                                        @foreach($team as $t)
                                                        <option value="{{$t->User->id}}">{{$t->User->first_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <div class="col-md-11 offset-md-1 delLastLocChild">
                                                    <select class="select2" id="" name="location_user_1[]" multiple="multiple">
                                                        @foreach ($assigned_districts as $ad)
                                                        <option value="{{$ad->District->id}}">{{$ad->District->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <div class="col-md-11 offset-md-1">
                                                    <input type="text" placeholder="Site Name" name="site_name_1" class="site_name form-control" style="padding: 0.7rem !important;" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <div class="col-md-11 offset-md-1">
                                                    <input type="date" placeholder="" name="site_start_1" class="site_start form-control" style="padding: 0.6rem 0rem !important;" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <div class="col-md-11 offset-md-1">
                                                    <input type="date" placeholder="" name="site_end_1" class="site_end form-control" style="padding: 0.6rem 0rem !important;" />
                                                </div>
                                            </div>
                    
                                        </div>
                                        <div class="col-sm-1 text_center">
                                            <button class="btn btn-sm btn-info " title="Add" type="button" id="CloneUserLoc">+</button>
                                        </div>
                                    </div>
                                    <div class="row col-md-12 CloneUserLocHere">
                                    </div>
                                    <!-- end user Location content -->
                                    <div class="pull-right mr-5">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    
                    @if($projectProgressId->MAssignedKpi)
                    <div class="card">
                        <div class="card-header"><h4><b>Summary of Assigned User Locations</b></h4></div>
                        <div class="card-block">
                        <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-stripped nowrap" id="countit">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Sr #</th>
                                                <th>User</th>
                                                <th>District</th>
                                                <th>Site Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Last Modified</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach ($projectProgressId->MAssignedUserLocation as $userloc)
                                            <tr>
                                                <td>
                                                    <form action="{{route('deleteUserLoc')}}" method="POST" >
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="userloc_id" value="{{$userloc->id   }}">
                                                    <input type="hidden" name="page_tabs" value="plan_userLoc">                                                    
                                                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                                        <button class="btn btn-sm btn-danger deleteKpi"  
                                                        onclick="return confirm('Are you sure ?')" type="submit" id="deleteKpi" > <i class="fa fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                                <td>{{$i++}}</td>
                                                <td>{{$userloc->User->first_name}}</td>
                                                <td>{{$userloc->District->name}}</td>
                                                <td>
                                                    @if($userloc->site_name != Null)
                                                    {{$userloc->site_name}}
                                                    @else
                                                    <span style="color:red"><b>Not Added</b></span>
                                                    @endif
                                                </td>
                                                <td>{{$userloc->site_start_date ? $userloc->site_start_date : '-'}}</td>
                                                <td>{{$userloc->site_end_date ? $userloc->site_end_date : '-'}}</td>
                                                <td>{{$userloc->updated_at ? date('d-F-Y | H:i:s', strtotime($userloc->updated_at)) : '-'}}
                                                        
                                                    </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="Mapping" ? "active" : ""}}' id="MOBdiv" role="tabpanel" aria-expanded="false">
                    <div class="card">
                        <form class="serializeform" action="{{ route('mappingOfObj') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row col-md-12 ">
                                <div class="col-md-8 offset-md-2 ">
                                    <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                    <input type="hidden" name="page_tabs" value="plan_Mapping">
                                    <div class="row">
                                        <h5 class="textlef pd_1_2 col-md-6"><b>Objectives</b></h5>
                                        <h5 class="textlef pd_1_2 col-md-6"><b>Component</b></h5>
                                    </div>
                                    <ul class="pd_1_6" id="ObjCompHere">
                                        @php
                                        $i=0;
                                        @endphp
                                        @foreach ($objectives as $obj)
                                        <li class="row mb_2">
                                            <span id="objectiveHere" name="" class="float-left col-md-6">
                                                <input type="hidden" value="{{$obj->id}}" name="objective[]">
                                                {{$obj->objective}}
                                            </span>
                                            <span class="float-right col-md-6">
                                                <select class="select2 col-md-12" id="component"  name="mappedComp_{{$i}}[]" multiple="multiple">
                                                    @foreach ($components as $comp)
                                                    <option @foreach ($comp->MPlanObjectivecomponentMapping as $mappedComp)
                                                        @if($mappedComp->m_plan_objective_id == $obj->id)
                                                        {{"selected"}}
                                                        @endif
                                                        @endforeach
                                                        value="{{$comp->id}}" >{{$comp->component}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </li>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach
                                    </ul>
                                    {{-- <button class="btn aho col-md-3 btn btn-alert offset-md-7 " type="button" style="background: #406765;border: 1px solid; " id="ObjCompShowSum">Show Summary</button> --}}
                                    <button class="btn aho col-md-1 btn btn-primary pull-right" type="submit" id="saveCompagainstObj">Save </button>
                                    </div>
                                    <div class=" col-md-8 offset-md-2 SumObjComp nodisplay">
                    
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="KPI" ? "active" : ""}}' id="kpis" role="tabpanel" aria-expanded="false" style="">
                    <div class="col-md-12 expandheaderCustom clearfix">
                        <b class="float-left font-15 pdlfrt form-txt-primary">Custom WBS</b>
                        <b class="float-right pdlfrt CustomKPIs" style="">
                            <i class="fa fa-plus circlebtn Customkpiplus" aria-hidden="true"></i>
                            <i class="fa fa-minus circlebtn Customkpiminus nodisplay" aria-hidden="true"></i>
                        </b>
                    </div>
                    <div class="CustomKPIsDiv nodisplay clearfix">
                            <div class="card m-0 z-depth-right-0">
                                <div class="card-header">
                                    <h4 class="form-txt-primary"> Custom WBS</h4>
                                </div>
                                <form id="customForm" class="" action="{{route('customkpiComponentMapping')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                <input type="hidden" name="page_tabs" value="plan_KPI"> <div class="card-block">
                                    <div class="customeKPIsHere form-group">
                                        <div class="col-md-12">
                                            <div class="DisInlineflex mb_2 col-md-12">
                                                <label class="col-sm-1 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Level 1<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="level1" style="padding: 4%;" required="required" class="form-control" placeholder="Enter WBS">
                                                </div>
                                                <div class="col-sm-4 ml-3" style="margin-top: -2%;">
                                                    <label for="">Components <span style="color:red">*</span></label>
                                                    <select name="component_mapped[]" required="required" class="select2" multiple="multiple"> <span style="color:red">*</span>
                                                        <option value="" disabled>Choose Components</option> 
                                                        @foreach ($components as $item)
                                                            <option value="{{$item->id}}">{{$item->component}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 text_center">
                                                    <button class="btn btn-sm btn-info" type="button" id="addcustomeKPIs" tabindex="1">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="customButton"   class="btn btn-success pull-right mr-5">SAVE</button>
                                </form>
                        </div>
                    </div>
                    <div class="col-md-12 expandheader clearfix">
                        <b class="float-left font-15 pdlfrt form-txt-primary">Default WBS</b>
                        <b class="float-right pdlfrt defaultKPIs" style="">
                            <i class="fa fa-plus circlebtn defaultkpiplus" aria-hidden="true"></i>
                            <i class="fa fa-minus circlebtn defaultkpiminus nodisplay" aria-hidden="true"></i>
                        </b>
                    </div>
                    <div class="defaultKPIsDiv nodisplay clearfix">
                        <form class="serializeform" action="{{route('kpiComponentMapping')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                <input type="hidden" name="page_tabs" value="plan_KPI">

                            <div class="card m-0 z-depth-right-0">
                                <div class="card-header">
                                    <h4 class="form-txt-primary">WBS</h4>
                                </div>
                                {{-- Choose KPI New --}}
                                <div class="card-block">
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <h5 class="mb_2">Choose WBS</h4>
                                                <select id='custom-headers' class="searchable yesearch" multiple='multiple'>
                                                    {{-- <h1>here</h1> --}}
                                                    @foreach ($Kpis as $Kpi)
                                                    <option class='optiontest' data-value='{{$Kpi->id}}'>{{$Kpi->name}}</option>
                                                    @endforeach
                                                </select>

                                        </div>
                                        <div class="row col-md-1">
                                            <div class="border_right col-md-6"></div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="col-md-6" style="padding-left:3% !important;">
                                            <div class="row col-md-12">
                                                <ul class="col-md-12 row" id='addkpi'>
                                                    <h5 class=" mb_2">WBS</h5>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-3 offset-md-9">
                                        <button class="btn btn-primary btn-md" type="submit" id="">Save </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card">
                        <div class="card-header"><h4><b>Summary Of Saved WBS </b></h4></div>
                        <div class="card-block">
                                <table class="table table-stripped">
                                    <thead>
                                        <th>Action</th>
                                        <th>Id</th>
                                        <th>WBS</th>
                                        <th>Components</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($mPlanKpiComponents as $key=>$item)
                                            <tr>
                                                <td>
                                                       <form action="{{route('deleteKpi')}}" method="POST" >
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="page_tabs" value="plan_KPI">
                                                            <input type="hidden" name="kpi_id" value="{{App\MProjectKpi::find($key)->id}}">
                                                            <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                                            <button class="btn btn-sm btn-danger deleteKpi"  
                                                            onclick="return confirm('KPI : {{App\MProjectKpi::find($key)->name}}\n1: All mapped components with this Custom/Default WBS will also be deleted. \n2: After visiting respective Project Site, One must not delete the Custom/Default Wbs.It will lead to miscalculations of progresses. \n Are you sure ?')" type="submit" id="deleteKpi" > <i class="fa fa-trash"></i> </button>
                                                       </form>
                                                </td>
                                                <td>{{$key}}</td>
                                                <td>{{App\MProjectKpi::find($key)->name}}</td>
                                                <td class="text-left">
                                                    <ol>
                                                            @foreach ($item as $componentsArray)
                                                                <li>{{$componentsArray->MPlanComponent->component}}</li>
                                                            @endforeach
                                                    </ol>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="uderKPI" ? "active" : ""}}' id="userKPIDiv" role="tabpanel" aria-expanded="false" style="display:none;">
                    <!-- headings -->
                    <div class="card">
                        <div class="card-header"><h4><b>Assign User To Wbs</b></h4></div>
                        <div class="card-block"> <form action="{{route('saveUserKpi')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                <input type="hidden" name="page_tabs" value="plan_uderKPI">
                                <input type="hidden" name="counts" id="counts_user_location_id" value="1+">
                                
                                <div class="row col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="col-md-10 offset-md-1">
                                            <h4 class="form-txt-primary">User</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <div class="col-md-10 offset-md-1">
                                            <h4 class="form-txt-primary">Selected KPIs</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h4 class="form-txt-primary">Cost</h4>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h4 class="form-txt-primary">Weightage</h4>
                                    </div>
                                </div>
                                <!-- end heading -->
                                <!-- user Location content -->
                                <div class="row col-md-12">
                                    <div class="row col-md-11" id="CloneThisUserKPI" style="margin-bottom:1% !important;">
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-10 offset-md-1 delLastChild">
                                                @php $kpicount=1; @endphp
                                                <select class="form-control select2" id="" name="user_location_id[]">
                
                                                    @foreach ($projectProgressId->MAssignedUserLocation as $mUserLocation)
                
                                                    <option value="{{$mUserLocation->id}}">{{$kpicount++}} - {{$mUserLocation->User->first_name}} {{$mUserLocation->User->last_name}} - {{$mUserLocation->District->name}} -{{$mUserLocation->site_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="col-md-10 offset-md-1 delLastChild">
                                                <select class="form-control select2" id="" name="m_project_kpi_id[]">
                                                    @php
                                                    $arr=array();
                                                    @endphp
                                                    @foreach ($projectProgressId->MPlanKpicomponentMapping as $kpiComponent)
                                                    @if (!in_array($kpiComponent->MProjectKpi->name,$arr))
                                                    <option value="{{$kpiComponent->MProjectKpi->id}}">{{$kpiComponent->MProjectKpi->name}}</option>
                                                    @php
                                                    array_push($arr,$kpiComponent->MProjectKpi->name);
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input name="cost[]" id="" class="col-md-11 float-right form-control" placeholder="Cost" type="text" style="text-align:center;border: 1px solid #807d7d8a !important;padding: 7% 0% 7% 0% !important;" value="">
                                        </div>
                                        <div class="col-md-2">
                                            <input name="weightage[]" id="" type="number" class="col-md-11 float-right form-control" placeholder="Weightage" style="text-align:center;border: 1px solid #807d7d8a !important;padding: 7% 0% 7% 0% !important;" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text_center">
                                        <button class="btn btn-sm btn-info" type="button" id="CloneUserKPI">+</button>
                                    </div>
                                </div>
                                <div class="row col-md-12 CloneUserKPIHere">
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-3 offset-md-9">
                                        <button class="btn btn-primary btn-md activities" type="submit">Save </button>
                                    </div>
                                </div>
                                <!-- end user Location content -->
                
                            </form></div>
                    </div>

                    <div class="card">
                        <div class="card-header"><h4><b>Summary of User Assigned WBS</b></h4></div>
                        <div class="card-block">@if($projectProgressId->MAssignedKpi !=null)
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered nowrap" id="countit">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Sr #</th>
                                                    <th>User</th>
                                                    <th>Id - KPI </th>
                                                    <th>Cost</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($projectProgressId->MAssignedKpi as $userkpi)
                                                <tr>
                                                    <td>
                                                        <form action="{{route('deleteUserAssignedKpi')}}" method="POST" >
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="kpi_id" value="{{$userkpi->MAssignedUserKpi->MProjectKpi->id}}">
                                                            <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                                                            <input type="hidden" name="page_tabs" value="plan_uderKPI">
                                                            <button class="btn btn-sm btn-danger deleteKpi"  
                                                            onclick="return confirm('Deleting {{$userkpi->MAssignedUserKpi->MProjectKpi->name }} .... \n Deleting respective WBS will delete the assigned cost to it, but mapping will not be deleted from here.You can assign it again.\n Are you sure?')" type="submit" id="deleteKpi" > <i class="fa fa-trash"></i> </button>
                                                        </form>
                                                    </td>
                                                    <td>{{$i++}}</td>
                                                    <td>
                                                        {{$userkpi->MAssignedUserKpi->MAssignedUserLocation->User->first_name}} {{$userkpi->MAssignedUserKpi->MAssignedUserLocation->User->last_name}} - {{$userkpi->MAssignedUserKpi->MAssignedUserLocation->District->name}} -{{$userkpi->MAssignedUserKpi->MAssignedUserLocation->site_name}}
                                                    </td>                                                  
                                                    <td>
                                                        @if(isset($userkpi->MAssignedUserKpi->MProjectKpi->id))
                                                        {{$userkpi->MAssignedUserKpi->MProjectKpi->id}}
                                                        @endif
                                                        -
                                                        @if(isset($userkpi->MAssignedUserKpi->MProjectKpi->name))
                                                        {{$userkpi->MAssignedUserKpi->MProjectKpi->name}}@endif
                                                    </td>
                                                    <td>
                                                        @if($userkpi->cost)
                                                        {{round($userkpi->cost,3)}} <small>PKR in Millions</small>
                                                        @else
                                                        <span style="color:red"><b>Not Added</b></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{date('d-F-Y | H:i:s', strtotime($userkpi->created_at))}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif</div>
                    </div>         
                </div>
             
                <div class='tab-pane {{isset($innertab) && $innertab=="task" ? "active" : ""}}' id="activities" role="tabpanel" aria-expanded="false" style="display:none;">
                    <form class="serializeform" action="{{route('componentActivities')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                        <input type="hidden" name="page_tabs" value="plan_task">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-block">
                                @php
                                $j=0;
                                @endphp
                                <div class="row form-group">
                                    <div class="col-md-10 offset-md-1 planMactivities" id="planMactivities">
                                        @php
                                        $i=0;
                                        @endphp
                                        @foreach ($components as $comp)
                                        <div class="row form-group compTask">
                                            <div class="col-md-4 offset-md-1">
                                                <label for=""> <b class="headText" id="compname"> {{$comp->component}} </b></label>
                                                <input type="hidden" name="compforactivity[]" value="{{$comp->id}}" />
                                            </div>
                                            <div class="col-md-2 offset-md-4 mb_1 Taskbut" id="add_activity" data-id="{{$j}}" style="padding-top:0.6%;">
                                                <button class="btn btn-sm btn-warning float-right" type="button" name="add_activity">Add Activity + </button>
                                            </div>
                                            <div id="alltasks" class="row col-md-11 offset-md-1 form-group component_Activities">
                                                @foreach ($comp->MPlanComponentActivitiesMapping as $item)
                                                <div class="row col-md-9 offset-md-1 form-group component_Activities">
                                                    <div class="col-md-11 mb_1">
                                                        <input type="text" class="form-control" placeholder="Add Task" value="{{$item->activity}}" disabled>
                                                    </div>
                                                    <!-- <div class="col-md-1"><button class="btn btn-danger btn-sm" type="button">-</button></div> -->
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @php
                                        $j++;
                                        @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <button type="submit" class="btn btn-primary btn-md saveNnextbtn" id="saveTasks">Save & Proceed</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="time" ? "active" : ""}}' id="TimesDiv" role="tabpanel" aria-expanded="false" style="">
                    <form class="serializeform" action="{{route('activities_duration')}}" method="post">
                        {{ csrf_field() }}
                        <div class="card">
                            <input type="hidden" name="page_tabs" value="plan_time">
                            <div class="card-header"></div>
                            <div class="card-block">
                                <div class="row form-group">
                                    <h4 class="col-md-6 textlef mb_2 form-txt-primary">Activities</h4>
                                    <h4 class="col-md-4 textlef mb_2 form-txt-primary">Duration In Days <span style="color:red;">*</span> </h4>
                                    <div class="comptaskl col-md-12">
                                        @foreach ($ComponentActivities as $activities)
                                        <div id='comptaskl' class="col-md-12 row" style="margin-top:5px; padding-left:2% !important;">
                                            <div class="col-md-6">
                                                <label for=""><b>{{$activities->MPlanComponent->component}}</b> <br> - {{$activities->activity}}</label>
                                                <input type="hidden" name="componentActivityId[]" value="{{$activities->id}}">
                                            </div>
                                            <div class="col-md-4" style="">
                                                <input type="text" name="daysinduration[]" value="@if(isset($activities->MPlanComponentactivityDetailMapping->duration)) {{$activities->MPlanComponentactivityDetailMapping->duration}} @endif" class="form-control">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <button class="btn btn-primary btn-md saveNnextbtn" id="did" type="submit">Save & Proceed</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class='tab-pane {{isset($innertab) && $innertab=="costing" ? "active" : ""}}' id="CostingDiv" role="tabpanel" aria-expanded="false" style="">
                    <form class="serializeform" action="{{route('Costing')}}" method="post">
                        {{ csrf_field() }}
                        <div class="card">
                            <input type="hidden" name="page_tabs" value="plan_costing">
                            <div class="card-header"></div>
                            <div class="card-block" id='costcomp'>
                                <div class="col-md-12" style="display:inline-flex;margin-bottom:5%;">
                                    <h4 class="text_left col-md-3 form-txt-primary"><b>Activities</b></h4>
                                    <div class="col-md-2 mr_0_1">
                                        <h5 class="form-txt-primary"><b>Unit</b></h5>
                                    </div>
                                    <div class="col-md-2 mr_0_1">
                                        <h5 class="form-txt-primary"><b>Quantity</b></h5>
                                    </div>
                                    <div class="col-md-2 mr_0_1">
                                        <h5 class="form-txt-primary"><b>Cost</b></h5>
                                    </div>
                                    <div class="col-md-2 mr_0_1">
                                        <h5 class="form-txt-primary"><b>Amount</b></h5>
                                    </div>
                                </div>
                                <div class="costcomp">
                                    @foreach ($ComponentActivities as $activities)
                                    <div class="col-md-12" style="display:inline-flex;">
                                        <label class="text_left col-md-3"><b>{{$activities->MPlanComponent->component}}</b> <br> - {{$activities->activity}} </label>
                                        <input type="hidden" name="activityId[]" value="{{$activities->id}}">
                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->unit)){{$activities->MPlanComponentactivityDetailMapping->unit}} @endif" placeholder="Unit" name="Unit[]" /></div>
                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->quantity)){{$activities->MPlanComponentactivityDetailMapping->quantity}} @endif" placeholder="Quantity" name="Quantity[]" /></div>
                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->cost)){{$activities->MPlanComponentactivityDetailMapping->cost}} @endif" placeholder="Cost" name="Cost[]" /></div>
                                        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->amount)){{$activities->MPlanComponentactivityDetailMapping->amount}} @endif" placeholder="Amount" name="Amount[]" /></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <button class="btn btn-primary btn-md saveNnextbtn" type="submit">Save & Proceed</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>