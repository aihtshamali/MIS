<style>
.ms-selection ul li{background: #119e36 !important;color: #fff !important;}
.ms-container .ms-selectable li.ms-hover{background-color: #119e36;}
/* 01a9ac */
</style>
<div class="tab-pane {{isset($maintab) && $maintab=='plan' ? 'active' : ''}}" id="p_monitoring" role="tabpanel">
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12  planNavBar">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs p_tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{isset($innertab) && $innertab=='documents' ? 'active' : ''}} PlanDoc" data-toggle="tab" href="#PlanDocDiv"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Documents</b></a>
                </li>
                <!-- {{-- <li class="nav-item">
                    <a class="nav-link financialphase" data-toggle="tab" href="#financial" id="fpli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial Phasing</b></a>
                </li> --}} -->
                <li class="nav-item">
                    <a class="nav-link {{isset($innertab) && $innertab == 'projectdesign' ? 'active' : ''}} i-dates" data-toggle="tab" href="#i-dates" id="pdli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Project Design</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{isset($innertab) && $innertab == 'userLoc' ? 'active' : ''}} userlocTab" data-toggle="tab" href="#userlocDiv" id=""
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">User Location</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="Mapping" ? "active" : ""}} MOBtab' id="MOBtab" data-toggle="tab" href="#MOBdiv"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Mapping Of objectives</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="KPI" ? "active" : ""}} kpis' data-toggle="tab" href="#kpis" role="tab" id="kpisss"
                        aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan ( KPI's)</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link userKPITab" data-toggle="tab" href="#userKPIDiv" id=""
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">User KPI</b></a>
                </li>
                <!-- {{-- <li class="nav-item">
                    <a class="nav-link proloc" data-toggle="tab" href="#prolocDiv" role="tab" id="proloc"
                        aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Project Location</b></a>
                </li> --}} -->
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="task" ? "active" : ""}} activities' data-toggle="tab" href="#activities" id="tali"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Tasks</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="time" ? "active" : ""}} TimeTab' data-toggle="tab" href="#TimesDiv" id="tili"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Time</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="Costing" ? "active" : ""}} CostingTab' data-toggle="tab" href="#CostingDiv" id="cosli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Costing</b></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link PAT" data-toggle="tab" href="#PAT"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan A Trip</b></a>
                </li> --}}
            </ul>
            <div class="tab-content tabs card-block {{isset($maintab) && $maintab=='plan' ? 'active' : ''}}">
                <div class="tab-pane {{isset($innertab) && $innertab=='documents' ? 'active' : ''}}" id="PlanDocDiv" role="tabpanel" aria-expanded="true">
                <div class="row" style="margin-top:5%; margin-bottom: 10%;">
                        @if(isset($project_documents))
                        <div class="col-md-3">
                            <label for=""><h6><b>Documents</b></h6></label>
                        </div>
                        <div class="col-md-6">
                            @foreach ($project_documents as $project_document)
                            <label for=""> <b>{{$project_document->attachment_name}}, </b></label>
                            @endforeach
                        </div>
                        @else
                            <div class="col-md-12"><h3 style="text-align: center;">No Documents Attached </h3></div>
                        @endif
                    </div>
                  <form class="serializeform" action="{{route('saveMonitoringAttachments')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3 ">
                        <div class="btn col-md-10 offset-md-2 btn-primary btn-block">
                            <input type="file" id="html_btn" name="planmonitoringfile" title='Click to add Files' />
                            <input type="hidden" name="page_tabs" value="plan_projectdesign">
                            <span>Upload File</span>
                        </div>
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <input type="text" name="file_name" class="placeholder" style="width: 100%;padding: 2%;"
                            placeholder="Type File Name"/>
                        </div>
                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                    </div>
                    <div class="row ">
                    <div class="col-md-3 offset-md-6">
                        <button type="submit" class="btn btn-success pull-right" name="submit">Submit</button>
                    </div>
                    </div>
                 </form>

                </div>
                <div class="tab-pane {{isset($innertab) && $innertab=='projectdesign' ? 'active' : ''}}" id="i-dates" role="tabpanel" aria-expanded="false">
                  <form class="serializeform" action="{{ route('projectDesignMonitoring') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                            <input type="hidden" name="page_tabs" value="plan_userLoc">
                            <input type="hidden" name="objct" id="objct" value="{{count($objectives)}}">
                            <input type="hidden" name="compAct" id="compAct" value="{{count($components)}}">
                            <div class="col-md-6 objtivesNew border_right pd_1_2">
                                @php
                            $i=1;
                        @endphp
                        @forelse ($objectives as $obj)
                            <div class="DisInlineflex newClass{{$i}} mb_2 col-md-12">
                                <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective {{$i}}</label>
                                    <div class="col-sm-7">
                                    <input type="text" disabled class="form-control" placeholder="Objective {{$i}}" value="{{$obj->objective}}">
                                    </div>
                                    @if($i==1)
                                        <div class="col-sm-2 addbtn text_center">
                                                <button class="btn btn-sm btn-info" type="button" id="add_more_objective"  tabindex=1>+</button>
                                        </div>
                                    @else
                                        {{-- <div class="col-sm-2 removeObjective text_center">
                                                <button class="btn btn-sm btn-danger" title="Delete Objective {{$i}}" type="button" id="" tabindex={{$i}}>-</button>
                                            </div> --}}
                                    @endif
                                </div>
                                @php
                                $i++;
                                @endphp
                        @empty
                            <div class="DisInlineflex newClass1 mb_2 col-md-12">
                                <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective 1</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="obj[]" placeholder="Objective 1">
                                </div>
                                <div class="col-sm-2 addbtn text_center">
                                    <button class="btn btn-sm btn-info" type="button" id="add_more_objective"  tabindex=1>+</button>
                                </div>
                            </div>
                        @endforelse
                      </div>
                      <div class="col-md-6 compActNew border_left pd_1_2">
                            @php
                            $j=1;
                        @endphp
                        @forelse ($components as $comp)
                        <div class="DisInlineflex newClasscompAct{{$j}} mb_2 col-md-12">
                                <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component {{$j}}</label>
                                <div class="col-sm-7">
                                <input type="text" disabled class="form-control" value="{{$comp->component}}" placeholder="Component {{$j}}">
                                </div>
                                @if($j==1)
                                <div class="col-sm-2 addbtn text_center">
                                        <button class="btn btn-sm btn-info" type="button" id="add_more_compAct" tabindex=100>+</button>
                                </div>
                                @else
                                {{-- <div class="col-sm-2 removecompAct text_center">
                                     <button class="btn btn-sm btn-danger" title="Delete Component {{$j}}" type="button" id=""  tabindex=101>-</button>
                                </div> --}}
                                @endif
                            </div>
                            @php
                                $j++;
                            @endphp
                        @empty
                            <div class="DisInlineflex newClasscompAct mb_2 col-md-12">
                                    <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component 1</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="comp[]" class="form-control" placeholder="Component 1">
                                    </div>
                                    <div class="col-sm-2 addbtn text_center">
                                        <button class="btn btn-sm btn-info" type="button" id="add_more_compAct" tabindex=100>+</button>
                                    </div>
                            </div>
                        @endforelse

                      </div>
                      <button class="btn aho col-md-2 offset-md-10" type="submit" id="saveObjComp">Save & Proceed</button>
                  </div>
                  </form>
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
                  </form>
                </div>
                <div class="tab-pane {{isset($innertab) && $innertab == 'userLoc' ? 'active' : ''}} userlocDiv" id="userlocDiv" role="tabpanel" aria-expanded="false">
                  <!-- headings -->
                  <div class="row col-md-12">
                    <div class="col-md-4 text-center">
                      <h4>User</h4>
                    </div>
                    <div class="col-md-4 text-center">
                      <h4>Location</h4>
                    </div>
                    <div class="col-md-2 text-center">
                      <h4>Site Name</h4>
                    </div>
                  </div>
                  <!-- end heading -->
                  <!-- user Location content -->
                <form action="{{route('saveUserLocation')}}" method="POST" >
                    {{ csrf_field() }}
                <input type="hidden" name="progress_id" value="{{$projectProgressId->id}}">
                <input type="hidden" name="counts" value="1" id="counts_user_location">
                <input type="hidden" name="page_tabs" value="plan_Mapping">
                  <div class="row col-md-12">
                    <style media="screen" scoped>
                      .select2-container--default .select2-selection--multiple .select2-selection__rendered li{padding: 1% !important};
                    </style>
                    <div class="row col-md-10" id="CloneThisUserLoc" style="margin-bottom:1% !important;">
                      <div class="col-md-5 text-center">
                        <div class="col-md-10 offset-md-1 delLastLocChild">
                        <select class="select2" id="" name="user_location_1">
                            @foreach($team as $t)
                                    <option value="{{$t->User->id}}">{{$t->User->first_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="col-md-5 text-center">
                        <div class="col-md-10 offset-md-1 delLastLocChild">
                        <select class="select2" id="" name="location_user_1[]" multiple="multiple">
                            @foreach ($assigned_districts as $ad)
                                <option value="{{$ad->District->id}}">{{$ad->District->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 text-center">
                    <div class="col-md-12">
                        <input type="text" placeholder="Site Name" name="site_name_1" class="site_name form-control">
                    </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text_center">
                      <button class="btn btn-sm btn-info" type="button" id="CloneUserLoc">+</button>
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
                <div class='tab-pane {{isset($innertab) && $innertab=="Mapping" ? "active" : ""}}' id="MOBdiv" role="tabpanel" aria-expanded="false">
                   <form class="serializeform" action="{{ route('mappingOfObj') }}" method="post">
                        {{ csrf_field() }}
                    <div class="row col-md-12 border">
                        <div class="col-md-8 offset-md-2 ">
                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                        <input type="hidden" name="page_tabs" value="plan_KPI">
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
                                    <span id="objectiveHere" name=""  class="float-left col-md-6">
                                        <input type="hidden" value="{{$obj->id}}" name="objective[]">
                                        {{$obj->objective}}
                                    </span>
                                    <span class="float-right col-md-6">
                                        <select class="select2 col-md-12" id="component" name="mappedComp_{{$i}}[]" multiple="multiple">
                                        @foreach ($components as $comp)
                                        <option
                                                @foreach ($comp->MPlanObjectivecomponentMapping as $mappedComp)
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
                <div class='tab-pane {{isset($innertab) && $innertab=="KPI" ? "active" : ""}}' id="kpis" role="tabpanel" aria-expanded="false" style="">
                <form class="serializeform" action="{{route('kpiComponentMapping')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                    <input type="hidden" name="page_tabs" value="plan_task">

                    <div class="card m-0 z-depth-right-0">
                        <div class="card-header">
                            <h4>KPI(s)</h4>
                        </div>
                        <div class="card-block">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <h5 class="mb_2">Previous Mapped Kpis</h5>
                                    {{-- {{dump($mPlanKpiComponents)}} --}}
                                    <div class="col-md-12 row">
                                         <div class="col-md-4 text-center">
                                             <h5>KPIs</h5>
                                         </div>
                                         <div class="col-md-4 text-center">
                                             <h5>Component</h5>
                                         </div>
                                         <div class="col-md-4 text-center">
                                             <h5>Weightage</h5>
                                         </div>
                                    </div>
                                    @foreach ($mPlanKpiComponents as $item)
                                    <div class="col-md-12 row">
                                         <div class="col-md-4 text-center">
                                             {{$item->MProjectKpi->name}}
                                         </div>
                                         <div class="col-md-4 text-center">
                                             {{$item->MPlanComponent->component}}
                                         </div>
                                         <div class="col-md-4 text-center">
                                             {{$item->weightage}}
                                         </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- Choose KPI New --}}
                        <div class="card-block">
                          <div class="row form-group">
                              <div class="col-md-5">
                                  <h5 class="mb_2">Choose KPI(s)</h4>
                                <select id='custom-headers' class="searchable yesearch"
                                    multiple='multiple'>
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
                                    <h5 class=" mb_2">KPIs</h5>

                                </ul>
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-3 offset-md-9">
                            <button class="btn btn-primary btn-md activities saveNnextbtn" type="submit" id="svkp">Save </button>

                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="userKPIDiv" role="tabpanel" aria-expanded="false" style="display:none;">
                  <!-- headings -->
                <form action="{{route('saveUserKpi')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                    <input type="hidden" name="page_tabs" value="plan_task">
                    <input type="hidden" name="counts" id="counts_user_location_id" value="1+">
                  <div class="row col-md-12">
                    <div class="col-md-4 text-center">
                      <h4>User</h4>
                    </div>
                    <div class="col-md-4 text-center">
                      <h4>Selected KPIs</h4>
                    </div>
                    <div class="col-md-2 text-center">
                      <h4>Weightage</h4>
                    </div>
                  </div>
                  <!-- end heading -->
                  <!-- user Location content -->
                  <div class="row col-md-12">
                    <div class="row col-md-10" id="CloneThisUserKPI" style="margin-bottom:1% !important;">
                      <div class="col-md-4 text-center">
                        <div class="col-md-10 offset-md-1 delLastChild">
                            <select class="select2" id="" name="user_location_id_1">
                                @foreach ($projectProgressId->MAssignedUserLocation as $mUserLocation)
                            <option  value="{{$mUserLocation->id}}">{{$mUserLocation->User->first_name}} {{$mUserLocation->User->last_name}} - {{$mUserLocation->District->name}} -{{$mUserLocation->site_name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4 text-center">
                        <div class="col-md-10 offset-md-1 delLastChild">
                        <select class="select2" id="" name="m_project_kpi_id_1[]" multiple="multiple">
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
                            <input name="weightage[]" id="" class="col-md-11 float-right form-control" placeholder="Weightage" type="text" style="text-align:center;border: 1px solid #807d7d8a !important;" value="">
                        </div>
                        <div class="col-md-2">
                            <input name="cost[]" id="" class="col-md-11 float-right form-control" placeholder="Cost" type="text" style="text-align:center;border: 1px solid #807d7d8a !important;" value="">
                        </div>
                    </div>
                    <div class="col-sm-2 text_center">
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
               
                </form>
                </div>
                {{-- <div class="tab-pane " id="prolocDiv" role="tabpanel" aria-expanded="false" style="display:none;">
                  prolocDiv
                </div> --}}
                <div class='tab-pane {{isset($innertab) && $innertab=="task" ? "active" : ""}}' id="activities" role="tabpanel" aria-expanded="false" style="display:none;">
                <form class="serializeform" action="{{route('componentActivities')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                    <input type="hidden" name="page_tabs" value="plan_time">
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
                                            <button class="btn btn-sm btn-warning float-right"  type="button" name="add_activity" >Add Activity + </button>
                                        </div>
                                        <div id="alltasks" class="row col-md-11 offset-md-1 form-group component_Activities">
                                            @foreach ($comp->MPlanComponentActivitiesMapping as $item)
                                            <div class="row col-md-9 offset-md-1 form-group component_Activities">
                                                <div class="col-md-11 mb_1">
                                                     <input type="text" class="form-control" placeholder="Add Task" value="{{$item->activity}}" name="c_activity_{{$j}}[]">
                                                </div>
                                                <div class="col-md-1"><button class="btn btn-danger btn-sm" name="remove_activity[]" onclick="removerow(this)" type="button">-</button></div>
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
                                    <button type="submit"class="btn btn-primary btn-md saveNnextbtn" id="saveTasks">Save & Proceed</button>
                                </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class='tab-pane {{isset($innertab) && $innertab=="time" ? "active" : ""}}' id="TimesDiv" role="tabpanel" aria-expanded="false"
                    style="">
                <form class="serializeform" action="{{route('activities_duration')}}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                      <input type="hidden" name="page_tabs" value="plan_Costing">
                        <div class="card-header"></div>
                        <div class="card-block">
                            <div class="row form-group">
                                <h5 class="col-md-6 textlef mb_2">Activities</h5>
                                <h5 class="col-md-4 textlef mb_2">Duration In Days</h5>
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
                <div class='tab-pane {{isset($innertab) && $innertab=="costing" ? "active" : ""}}' id="CostingDiv" role="tabpanel" aria-expanded="false"
                    style="">
                 <form class="serializeform" action="{{route('Costing')}}" method="post">
                  {{ csrf_field() }}
                    <div class="card">
                      <input type="hidden" name="page_tabs" value="conduct_QA">
                        <div class="card-header"></div>
                        <div class="card-block" id='costcomp'>
                            <div class="col-md-12" style="display:inline-flex;margin-bottom:5%;">
                                <h5 class="text_left col-md-3 form-txt-primary">
                                <b>Activities</b>
                                </h5>
                                <div class="col-md-2 mr_0_1"><h5 class="form-txt-primary"><b>Unit</b></h5></div>
                                <div class="col-md-2 mr_0_1"><h5 class="form-txt-primary"><b>Quantity</b></h5></div>
                                <div class="col-md-2 mr_0_1"><h5 class="form-txt-primary"><b>Cost</b></h5></div>
                                <div class="col-md-2 mr_0_1"><h5 class="form-txt-primary"><b>Amount</b></h5></div>
                            </div>
                            <div class="costcomp">
                            @foreach ($ComponentActivities as $activities)
                            <div class="col-md-12" style="display:inline-flex;">
                                    <label  class="text_left col-md-3"><b>{{$activities->MPlanComponent->component}}</b> <br> - {{$activities->activity}} </label>
                                    <input type="hidden" name="activityId[]" value="{{$activities->id}}">
                                    <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->unit)){{$activities->MPlanComponentactivityDetailMapping->unit}} @endif" placeholder="Unit" name="Unit[]" /></div>
                                    <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->quantity)){{$activities->MPlanComponentactivityDetailMapping->quantity}} @endif"  placeholder="Quantity" name="Quantity[]" /></div>
                                    <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->cost)){{$activities->MPlanComponentactivityDetailMapping->cost}} @endif"  placeholder="Cost" name="Cost[]" /></div>
                                    <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" @if(isset($activities->MPlanComponentactivityDetailMapping->amount)){{$activities->MPlanComponentactivityDetailMapping->amount}} @endif"  placeholder="Amount" name="Amount[]" /></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <button class="btn btn-primary btn-md saveNnextbtn"  type="submit">Save & Proceed</button>
                                </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
