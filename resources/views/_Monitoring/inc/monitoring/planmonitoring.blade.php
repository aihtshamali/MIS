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
                    <a class="nav-link financialphase" data-toggle="tab" href="#financial" id="fpli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial Phasing</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link i-dates" data-toggle="tab" href="#i-dates" id="pdli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Project Design</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link MOBtab" id="MOBtab" data-toggle="tab" href="#MOBdiv"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Mapping Of objectives</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  kpis" data-toggle="tab" href="#kpis" role="tab" id="kpisss"
                        aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan ( KPI's)</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link activities" data-toggle="tab" href="#activities" id="tali"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Tasks</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link TimeTab" data-toggle="tab" href="#TimesDiv" id="tili"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Time</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link CostingTab" data-toggle="tab" href="#CostingDiv" id="cosli"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Costing</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link PAT" data-toggle="tab" href="#PAT"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Plan A Trip</b></a>
                </li>
            </ul>
            <div class="tab-content tabs card-block active">
            <form class="serializeform" action="{{route('saveMonitoringAttachments')}}" method="post" enctype="multipart/form-data">
                <div class="tab-pane active" id="PlanDocDiv" role="tabpanel" aria-expanded="true">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                        <div class="btn col-md-10 offset-md-1 btn-primary btn-block">
                            <input type="file" id="html_btn" name="planmonitoringfile" title='Click to add Files' />
                            <span>Upload File</span>
                        </div>
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <input type="text" name="file_name" class="placeholder" style="width: 100%;padding: 2%;"
                            placeholder="Type File Name"/>
                        </div>
                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                    </div>
                    <div class="row ">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right" name="submit">Submit</button>
                    </div>
                    </div>
                </div>
            </form>
                <div class="tab-pane" id="i-dates" role="tabpanel" aria-expanded="false">
                  <form class="serializeform" action="{{ route('projectDesignMonitoring') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
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
                                    <input type="text" class="form-control form-txt-primary" name="obj[]" placeholder="Objective {{$i}}" value="{{$obj->objective}}">
                                    </div>
                                    @if($i==1)
                                        <div class="col-sm-2 addbtn text_center">
                                                <button class="btn btn-sm btn-info" type="button" id="add_more_objective"  tabindex=1>+</button>
                                        </div>
                                    @else
                                        <div class="col-sm-2 removeObjective text_center">
                                                <button class="btn btn-sm btn-danger" title="Delete Objective {{$i}}" type="button" id="" tabindex={{$i}}>-</button>
                                            </div>
                                    @endif
                                </div>
                                @php
                                $i++;
                                @endphp
                        @empty
                            <div class="DisInlineflex newClass1 mb_2 col-md-12">
                                <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective 1</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-txt-primary" name="obj[]" placeholder="Objective 1">
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
                                <input type="text" name="comp[]"  class="form-control form-txt-primary" value="{{$comp->component}}" placeholder="Component {{$j}}">
                                </div>
                                @if($j==1)
                                <div class="col-sm-2 addbtn text_center">
                                        <button class="btn btn-sm btn-info" type="button" id="add_more_compAct" tabindex=100>+</button>
                                </div>    
                                @else
                                <div class="col-sm-2 removecompAct text_center">
                                     <button class="btn btn-sm btn-danger" title="Delete Component {{$j}}" type="button" id=""  tabindex=101>-</button>
                                </div>
                                @endif
                            </div>
                            @php
                                $j++;
                            @endphp        
                        @empty
                            <div class="DisInlineflex newClasscompAct mb_2 col-md-12">
                                    <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component 1</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="comp[]" class="form-control form-txt-primary" placeholder="Component 1">
                                    </div>
                                    <div class="col-sm-2 addbtn text_center">
                                        <button class="btn btn-sm btn-info" type="button" id="add_more_compAct" tabindex=100>+</button>
                                    </div>
                            </div>
                        @endforelse
                        
                      </div>
                      <input type="hidden" value="{{$project->Project->AssignedProject->id}}" name="project_progress_no">
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
                <div class="tab-pane" id="MOBdiv" role="tabpanel" aria-expanded="false">
                   <form class="serializeform" action="{{ route('mappingOfObj') }}" method="post">
                        {{ csrf_field() }}
                    <div class="row col-md-12 border">
                        <div class="col-md-8 offset-md-2 ">
                        <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">
                        <div class="row">
                            <h5 class="textlef pd_1_2 col-md-6"><b>Objectives</b></h5>
                            <h5 class="textlef pd_1_2 col-md-6"><b>Component</b></h5>
                        </div>
                        <ul class="pd_1_6" id="ObjCompHere">
                            <li class="row mb_2">
                                @php
                                 $i=0;
                                @endphp
                                    @foreach ($objectives as $obj)

                                    <span id="objectiveHere" name=""  class="float-left col-md-6">
                                        <input type="hidden" value="{{$obj->id}}" name="objective[]">
                                        {{$obj->objective}}
                                    </span>
                                    <span class="float-right col-md-6">
                                    <select class="select2 col-md-12" id="component" name="mappedComp_{{$i}}[]" multiple="multiple">
                                       @foreach ($components as $comp)
                                       <option value={{$comp->id}}>{{$comp->component}}</option>
                                       @endforeach
                                    </select>
                                    </span>
                                    @php
                                    $i++;
                                   @endphp
                                    @endforeach
                                    </li>
                        </ul>
                        <input type="hidden" value="{{$project->Project->AssignedProject->id}}" name="project_progress_no">
                        {{-- <button class="btn aho col-md-3 btn btn-alert offset-md-7 " type="button" style="background: #406765;border: 1px solid; " id="ObjCompShowSum">Show Summary</button> --}}
                        <button class="btn aho col-md-1 btn btn-primary pull-right" type="submit" id="saveCompagainstObj">Save </button>
                        </div>
                        <div class=" col-md-8 offset-md-2 SumObjComp nodisplay">

                        </div>
                    </div>
                   </form>
                </div>
                <div class="tab-pane active" id="kpis" role="tabpanel" aria-expanded="false" style="display:none;">
                <form class="serializeform" action="{{route('kpiComponentMapping')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="m_project_progress_id" value="{{$monitoringProjectId}}">

                    <div class="card m-0 z-depth-right-0">
                        <div class="card-header">
                            <h4>KPI(s)</h4>
                        </div>
                        <div class="card-block">
                          <div class="row form-group">
                            <div class="col-md-5">
                                <h5 class="mb_2">Choose KPI(s)</h4>
                                <select id='custom-headers' class="searchable yesearch"
                                    multiple='multiple'>
                                    {{-- <h1>here</h1> --}}
                                     @foreach ($Kpis as $Kpi)
                                        @php
                                            $flag=true;
                                        @endphp
                                        @foreach ($mPlanKpiComponents as $item)
                                            @if($item->m_project_kpi_id == $Kpi->id)
                                                <option class='optiontest' data-value='{{$Kpi->id}}' selected >{{$Kpi->name}}</option> 
                                                @php
                                                    $flag=false;
                                                @endphp
                                            @endif
                                        @endforeach
                                      @if($flag)
                                        <option class='optiontest' data-value='{{$Kpi->id}}'>{{$Kpi->name}}</option> 
                                      @endif
                                     @endforeach
                                </select>

                            </div>
                            <div class="row col-md-1">
                              <div class="border_right col-md-6"></div>
                              <div class="col-md-6"></div>
                            </div>
                            <div class="col-md-6" style="padding-left:3% !important;">                                                                            <div class="row col-md-12">
                                <ul class="col-md-12 row" id='addkpi'>
                                    <h5 class=" mb_2">KPIs</h5>

                                </ul>
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-3 offset-md-9">
                        <input type="hidden" value="{{$monitoringProjectId}}" name="project_progress_no">
                            <button class="btn btn-primary btn-md activities saveNnextbtn" type="submit" id="svkp">Save </button>

                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="activities" role="tabpanel" aria-expanded="false" style="display:none;">
                <form class="serializeform" action="{{route('componentActivities')}}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-block">
                           @php
                           $j=0;
<<<<<<< HEAD
                           
                           @endphp 
                            <div class="row form-group">
                                <div class="col-md-10 offset-md-1 planMactivities" id="planMactivities">
                                 @foreach ($components as $comp)    
=======
                           @endphp
                            <div class="row form-group">
                                <div class="col-md-10 offset-md-1 planMactivities" id="planMactivities">
                                  @foreach ($components as $comp)
>>>>>>> 01b2d58cdc287c671ec1520730451a201c556cff
                                    <div class="row form-group compTask">
                                        <div class="col-md-4 offset-md-1">
                                         <label for=""> <b class="headText form-txt-primary" id="compname"> {{$comp->component}} </b></label>
                                        <input type="hidden" name="compforactivity[]" value="{{$comp->id}}" />
                                        </div>
                                        <div class="col-md-2 offset-md-4 mb_1 Taskbut" id="add_activity" data-id="{{$j}}" style="padding-top:0.6%;">
                                            <button class="btn btn-sm btn-warning float-right"  type="button" name="add_activity" >Add Activity + </button>
                                        </div>
<<<<<<< HEAD
                                        @php
                                        $activity=1;   
                                       @endphp 
                                         @forelse($comp->MPlanComponentActivitiesMapping as $cact) 
                                        
                                            <div id="alltasks" class="row col-md-11 offset-md-1 form-group component_Activities">
                                                <div class="row col-md-9 offset-md-1 form-group component_Activities">
                                                <div class="col-md-11 mb_1">
                                                <input type="text" class="form-control" placeholder="" value="{{$cact->activity}}" name="c_activity_{{$j}}[]"> 
                                                </div>
                                            <div class="col-md-1"><button class="btn btn-danger btn-sm" name="remove_activity[]" tabindex={{$j}} onclick="removerow(this)"  type="button">-</button></div>
                                                </div>
                                            </div>
                                            @php
                                          $activity++;   
                                         @endphp 
                                            @empty
                                            <div class="row form-group compTask">
                                                    <input type="hidden" name="compforactivity[]" value="{{$comp->id}}"/>
                                                {{-- <div class="col-md-4 offset-md-1">
                                               <label for=""> <b class="headText form-txt-primary" id="compname"> {{$comp->component}} </b></label>
                                                <input type="hidden" name="compforactivity[]" value="{{$comp->id}}" />
                                            </div> --}}
                                            {{-- <div class="col-md-2 offset-md-4 mb_1 Taskbut" id="add_activity" data-activitycount="{{$activity}}" data-id="{{$j}}" style="padding-top:0.6%;">
                                            <button class="btn btn-sm btn-warning float-right"  type="button" name="add_activity" >Add Activity + </button>
                                            </div> --}}
                                            <div id="alltasks" class="row col-md-11 offset-md-1 form-group component_Activities">
    
                                            </div>
=======
                                        <div id="alltasks" class="row col-md-11 offset-md-1 form-group component_Activities">

>>>>>>> 01b2d58cdc287c671ec1520730451a201c556cff
                                        </div>
                                        @endforelse
                                    </div>
<<<<<<< HEAD
                                       @php
                                        $j++;
                                        @endphp
=======
                                    @php
                                    $j++;
                                    @endphp
>>>>>>> 01b2d58cdc287c671ec1520730451a201c556cff
                                    @endforeach
                                 </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <input type="hidden" value="{{$monitoringProjectId}}" name="project_progress_no">
                                    <button type="submit"class="btn btn-primary btn-md saveNnextbtn" id="saveTasks">Save & Proceed</button>
                                </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="TimesDiv" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                <form class="serializeform" action="{{route('activities_duration')}}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-block">
                            <div class="row form-group">
                                <h5 class="col-md-6 textlef mb_2">Activities</h5>
                                <h5 class="col-md-4 textlef mb_2">Duration In Days</h5>
                                {{-- {{dd($ComponentActivities)}} --}}
                                @foreach ($ComponentActivities as $activities)
                                <div id='comptaskl' class="col-md-12 row" style="margin-top:5px; padding-left:2% !important;">
                                    <div class="col-md-6">
                                    <label for=""><b>{{$activities->MPlanComponent->component}}</b> <br> - {{$activities->activity}}</label>
                                    <input type="hidden" name="componentActivityId[]" value={{$activities->id}}>
                                    </div>
                                    <div class="col-md-4" style="">
                                    <input type="text" name="daysinduration[]" value="@if(isset($activities->MPlanComponentactivityDetailMapping->duration)) {{$activities->MPlanComponentactivityDetailMapping->duration}} @endif" class="form-control">
                                    </div>
                                </div>
                                @endforeach
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
                <div class="tab-pane " id="CostingDiv" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                 <form class="serializeform" action="{{route('Costing')}}" method="post">
                  {{ csrf_field() }}
                    <div class="card">
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
