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
              <form class="" action="" method="post">
                <div class="tab-pane active" id="PlanDocDiv" role="tabpanel" aria-expanded="true">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="btn col-md-10 offset-md-1 btn-primary btn-block">
                        <input type="file" id="html_btn" name="planmonitoringfile" title='Click to add Files' />
                        <span>Upload File</span>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-2">
                        <input type="text" name="file_name" class="placeholder" style="height: 100%;width: 100%;padding: 2%;"
                        placeholder="File Name"/>
                    </div>
                </div>
                <div class="row ">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success pull-right" name="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
                <div class="tab-pane" id="i-dates" role="tabpanel" aria-expanded="false">
                  <form class="" action="index.html" method="post">
                  <div class="row">
                      <div class="col-md-6 objtivesNew border_right pd_1_2">
                        <div class="DisInlineflex newClass mb_2 col-md-12">
                          <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective 1</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control form-txt-primary" name="obj[]" placeholder="Objective 1">
                          </div>
                          <div class="col-sm-2 addbtn text_center">
                            <button class="btn btn-sm btn-info" type="button" id="add_more_objective"  tabindex=1>+</button>
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
                            <button class="btn btn-sm btn-info" type="button" id="add_more_compAct" tabindex=100>+</button>
                          </div>
                        </div>
                      </div>
                      <button class="btn aho col-md-2 offset-md-10" type="button" id="saveObjComp">Save & Proceed</button>
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
                <form class="" action="index.html" method="post">
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
                    <div class=" col-md-8 offset-md-2 SumObjComp nodisplay">

                    </div>
                  </div>
                </form>
                </div>
                <div class="tab-pane active" id="kpis" role="tabpanel" aria-expanded="false" style="display:none;">
                  <form class="" action="index.html" method="post">
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
                                    <option class='optiontest' value='Remaining Cost'>Remaining Cost</option>
                                    <option class='optiontest' value='Number of unresolved issues'>Number of unresolved issues</option>
                                    <option class='optiontest' value='Project Schedule (delays and variance)'>Project Schedule (delays and variance)</option>
                                    <option class='optiontest' value='Quality'>Quality</option>
                                    <option class='optiontest' value='Scope Changes'>Scope Changes</option>
                                    <option class='optiontest' value='Cost (Cost Over Sum)'>Cost (Cost Over Sum)</option>
                                    <option class='optiontest' value='Client Satisfaction'>Client Satisfaction</option>
                                    <option class='optiontest' value='Procurement'>Procurement</option>
                                </select>
                                {{-- SPECIAL KPI'S CODE --}}

                                    <h5 class="mb_2">Special KPI(s)</h4>
                                    <div id="appendspecialkpi">
                                      <div class="row col-md-12">
                                        <input type="text" class="form-control specialin col-md-11" placeholder="Type KPI here...">
                                        <button class="col-md-1 btn addspecialkpi" type="button">+</button>
                                        <button class="col-md-1 btn btn-danger btn-sm btn nodisplay delspecialkpi" type="button">-</button>
                                        </div>
                                    </div>

                                    {{-- SPECIAL KPI'S CODE END--}}
                            </div>
                            <div class="row col-md-1">
                              <div class="border_right col-md-6"></div>
                              <div class="col-md-6"></div>
                            </div>
                            <div class="col-md-6" style="padding-left:3% !important;">                                                                            <div class="row col-md-12">
                                <ul class="col-md-12 row" id='addkpi'>
                                    <h5 class=" mb_2">KPIs</h5>

c                                                                           </ul>
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-3 offset-md-9">
                                <a class="btn btn-primary btn-md activities saveNnextbtn" id="svkp" data-toggle="tab" href="#activities"
                                role="tab" aria-expanded="false">Save & Proceed</a>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="activities" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                    <form class="" action="index.html" method="post">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-block">

                            <div class="row form-group">
                                <div class="col-md-10 offset-md-1 planMactivities" id="planMactivities">

                                 </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <a class="btn btn-primary btn-md saveNnextbtn" id="saveTasks">Save & Proceed</a>
                                </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="TimesDiv" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                    <form class="" action="index.html" method="post">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-block">
                            <div class="row form-group">
                                <h5 class="col-md-3 textlef mb_2">Tasks Under Component</h5>
                                <h5 class="col-md-9 textlef mb_2">Duration In Days</h5>
                                <div id='comptaskl' class="col-md-12 row" style="padding-left:2% !important;">

                                </div>
                          </div>
                        </div>
                        <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <a class="btn btn-primary btn-md saveNnextbtn" id="did">Save & Proceed</a>
                                </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="CostingDiv" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                    <form class="" action="index.html" method="post">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-block" id='costcomp'>

                        </div>
                        <div class="card-footer">
                                <div class="col-md-3 offset-md-9">
                                    <a class="btn btn-primary btn-md saveNnextbtn" >Save & Proceed</a>
                                </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
