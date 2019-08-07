<style scopped>
 .district .select2-container--default .select2-selection--multiple .select2-selection__rendered li{padding: 0% !important;margin:0px !important;}
 .district .select2-container--default .select2-selection--multiple{border: 1px solid #aaaaaa73 !important;}
</style>
<div class="tab-pane {{isset($maintab) && $maintab=='review' ? 'active' : ''}}"      id="reviewDiv" role="tabpanel">
<div class="col-md-12 reviewNavBar">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs tabs" role="tablist">
      <li class="nav-item ">
          <a class="nav-link {{isset($innertab) && $innertab=='cost' ? 'active' : ''}} costTab" data-toggle="tab" href="#costDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Cost</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link {{isset($innertab) && $innertab=='location' ? 'active' : ''}} LocationTab"  data-toggle="tab" href="#locationDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Location</b></a>
      </li>
      <li class="nav-item">
          <a class='nav-link {{isset($innertab) && $innertab=="agencies" ? "active" : ""}} AgeOrgTab' data-toggle="tab" href="#AgeOrgDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Agencies & Organization</b></a>
      </li>
      <li class="nav-item">
          <a class='nav-link {{isset($innertab) && $innertab=="dates" ? "active" : ""}} datestabrev' data-toggle="tab" href="#DatesDiv" role="tab"><b style="font-size:14px; font-weight:bold;">Dates</b></a>
      </li>
  </ul>
  <!-- Tab panes -->
  {{-- {{ dd(Session::get('tab')) }} --}}
  <div class="tab-content tabs card-block">
      <div class="tab-pane {{isset($innertab) && $innertab=='cost' ? 'active' : ''}}" id="costDiv" role="tabpanel">
        <form class="review serializeform" action="{{ route('Monitoring_inprogressCostSaved') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="assigned_project_id" value="{{$project->id}}">
          <div class="costDiv pd_1 clearfix">
              <div class="card-header">
                <input type="hidden" name="page_tabs" value="review_location">
                  <h4>FINANCIAL COST</h4>
                  <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Sunt similique totam harum sit. Quibusdam libero, harum rem
                  quam repellendus adipisci. Repellat sapiente asperiores
                  numquam beatae at distinctio quaerat reiciendis
                  repudiandae. -->
              </div>
              {{-- {{ dd($costs) }} --}}
        <div class="card-block">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="col-md-5 float-left form-group">
                        <label for="" class="col-form-label"><b>ADP Allocation of Fiscal Year :</b></label>
                        <br>
                        <input type="number" step="0.001" class="form-control" name="adp_allocation_of_fiscal_year" id="ADP_allocation_cost"
                        @if ($costs)
                          value="{{ round($costs->adp_allocation_of_fiscal_year,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                        />
                    </div>
                    <div class="col-md-5 offset-md-1 float-left form-group">
                        <label for="" class="col-form-label"><b>Total Releases To Date :</b></label>
                        <br>
                        <input type="number" step="0.001" class="form-control" name="total_release_to_date" id="total_release_to_date"
                        @if ($costs)
                          value="{{ round($costs->total_release_to_date,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                        />
                    </div>
                    <div class="col-md-5 float-left form-group">
                        <label for="" class="col-form-label"><b>Release To Date of Fiscal Year :</b></label>
                        <br>
                        <input type="number" step="0.001" class="form-control" name="release_to_date_of_fiscal_year" id="release_to_date"
                        @if ($costs)
                          value="{{ round($costs->release_to_date_of_fiscal_year,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                        />
                    </div>
                    <div class="col-md-5 offset-md-1 float-left form-group">                        
                        <label for="" class="col-form-label"><b>Total Utilization :</b></label>
                        <br>
                        <input type="number" step="0.001" class="form-control" name="utilization_against_releases" id="u_against_rel"
                        @if ($costs)
                          value="{{ round($costs->utilization_against_releases,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                        />
                    </div>
                    <div class="col-md-5 float-left form-group">
                        <label for="" class="col-form-label"><b>Total Allocation by that time (Cumulative):</b></label>
                        <br>
                        <input type="number" step="0.001" class="form-control" name="total_allocation_by_that_time" id="ADP_allocation_cost"
                        @if ($costs)
                          value="{{ round($costs->total_allocation_by_that_time,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                         />
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="divider col-md-12"></div>
                <div class="col-md-12 row">
                   <div class="col-md-8 offset-md-2">
                      <div class="form-group">
                        <label for="" class="col-form-label"><b>Technical Sanction Cost ( CAPITAL ONLY ) :</b></label>
                        <br>
                        <input class="form-control" step="0.001" type="number" name="technical_sanction_cost" placeholder="TS Cost"
                        @if ($costs)
                          value="{{ round($costs->technical_sanction_cost,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                        />
                      </div>
                      <div class="form-group">
                        <label for="" class="col-form-label"><b>Contract Award Cost :</b></label>
                        <br>
                        <input class="form-control" step="0.001" type="number" name="contract_award_cost"  placeholder="Contract Cost"
                        @if ($costs)
                          value="{{ round($costs->contract_award_cost,3,PHP_ROUND_HALF_UP) }}"
                        @else
                          value=""
                        @endif
                        />
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pull-right">
          <input type="submit" class="btn btn-primary btn-sm primaryClr" value="Save & Proceed"/>
        </div>
      </div>
    </form>
      </div>
      <div class="tab-pane {{isset($innertab) && $innertab=='location' ? 'active' : ''}}"  id="locationDiv" role="tabpanel">
        <form class="serializeform" action="{{ route('Monitoring_inprogressLocationSaved') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="assigned_project_id" value="{{$project->id}}">
          <input type="hidden" name="page_tabs" value="review_agencies">

          <div class="TimeDiv pd_1 clearfix">
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">District</label>
              <div class="col-sm-9 district">
                <select name="district[]" id="" class="select2" multiple>
                  <option value="">Select District</option>
                  @foreach ($project->Project->AssignedDistricts as $district)
                    <option value="{{$district->District->name}}" >{{$district->District->name}}</option>
                  @endforeach
                </select> 
                <!-- <input type="text" name="district" class="form-control" placeholder="District"
                @if ($location)
                  value="{{ $location->district }}"
                @else
                  value=""
                @endif 
                />-->
              </div>
          </div>
          <!-- <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">City</label>
              <div class="col-sm-9">
                   <select name="city" id="" class="form-control">
                      <option value="">Select City</option>
                      @foreach ($cities as $city)
                        @if (isset($location->city))
                        <option value="{{$city->name}}" {{($city->name==$location->city) ? 'selected' : ''}}>{{$city->name}}</option>
                        @else
                        <option value="{{$city->name}}">{{$city->name}}</option>
                        @endif
                      @endforeach
                  </select> 
                {{-- <input type="text" name="city" class="form-control" placeholder="City"
                @if ($location)
                  value="{{ $location->city }}"
                @else
                  value=""
                @endif
                /> --}}
              </div>
          </div> -->
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">GPS</label>
              <div class="col-sm-9">
                <input type="text" disabled name="gps" class="form-control" placeholder="GPS"
                @if ($location)
                  value="{{ $location->gps }}"
                @else
                  value=""
                @endif
                />
              </div>
          </div>
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">Longitude</label>
              <div class="col-sm-9">
                <input type="text" disabled  name="longitude" class="form-control" placeholder="Longitude"
                @if ($location)
                  value="{{ $location->longitude }}"
                @else
                  value=""
                @endif
                />
              </div>
          </div>
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">Latitude</label>
              <div class="col-sm-9">
                <input type="text" disabled name="latitiude" class="form-control" placeholder="Latitude"
                @if ($location)
                  value="{{ $location->latitude }}"
                @else
                  value=""
                @endif
                />
              </div>
          </div>
        </div>
        <input type="submit" class="btn btn-primary btn-sm primaryClr" value="Save & Proceed"/>
      </form>
      </div>
      <div class="tab-pane {{isset($innertab) && $innertab=='agencies' ? 'active' : ''}}" id="AgeOrgDiv" role="tabpanel">
        <form class="" action="{{ route('Monitoring_inprogressOrganizationSaved') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="assigned_project_id" value="{{$project->id}}">
          <input type="hidden" name="page_tabs" value="review_dates">

          <div class="age_orgDiv pd_1 clearfix">
            <div class="form-group row mb_2">
                <label class="col-sm-3 font-15">Operation & Maintenance</label>
                <div class="col-sm-9">
                  <input type="text" name="operation_and_management" class="form-control" placeholder="Operation & Management"
                  @if ($organization)
                    value="{{ $organization->operation_and_management }}"
                  @else
                    value=""
                  @endif
                  />
                </div>
            </div>
            <div class="form-group row mb_2">
                <label class="col-sm-3 font-15">Contractor/Supplier</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="contractor_or_supplier" placeholder="Contractor/Supplier"
                  @if ($organization)
                    value="{{ $organization->contractor_or_supplier }}"
                  @else
                    value=""
                  @endif
                  />
                </div>
            </div>   
           </div>
        <input type="submit" class="btn btn-primary btn-sm primaryClr" value="Save & Proceed"/>
      </form>
      </div>
      <div class="tab-pane {{isset($innertab) && $innertab=='dates' ? 'active' : ''}}" id="DatesDiv" role="tabpanel">
        <form class="" action="{{ route('Monitoring_inprogressDateSaved') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="assigned_project_id" value="{{$project->id}}">
                <input type="hidden" name="page_tabs" value="plan_documents">
          <div class="dates pd_1 clearfix">
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">Project Approval Date</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="project_approval_date" placeholder="Project Approval Date"
                @if ($dates)
                  value="{{ $dates->project_approval_date }}"
                @else
                  value=""
                @endif
                />
              </div>
          </div>
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">Admin Approval Date</label>
              <div class="col-sm-9">
                <input type="date" name="admin_approval_date" class="form-control" placeholder="Admin Approval Date"
                @if ($dates)
                  value="{{ $dates->admin_approval_date }}"
                @else
                  value=""
                @endif
                />
              </div>
          </div>
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">Actual Start Date</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="actual_start_date" placeholder="Actual Start Date"
                @if ($dates)
                  value="{{ $dates->actual_start_date }}"
                @else
                  value=""
                @endif
                />
              </div>
          </div>
          <div class="form-group row mb_2">
              <label class="col-sm-3 font-15">Date Of Visit</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="Date_Of_Visit" placeholder="Date Of Visit"
                @if ($dates)
                value="{{$dates->first_visit_date }}"
              @else
                value=""
              @endif
                />
              </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm float-right" name="submit">Submit</button>
        </div>
       </form>

       <form action="{{ route('Monitoring_PlannedDates') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="assigned_project_id" value="{{$project->id}}">
        <div class="form-group row mb_2">
          <label class="col-sm-3 font-15">Planned Start Date</label>
          <div class="col-sm-9">
            <input type="date" class="form-control" name="planned_start_date" placeholder="Actual Start Date"
            @if ($progresses->AssignedProject->Project->ProjectDetail->planned_start_date)
            value="{{$progresses->AssignedProject->Project->ProjectDetail->planned_start_date}}"
          @else
              value=""
            @endif
            />
          </div>
        </div>
        <div class="form-group row mb_2">
          <label class="col-sm-3 font-15">Planned End Date</label>
          <div class="col-sm-9">
            <input type="date" class="form-control" name="planned_end_date" placeholder="Actual Start Date"
            @if ($progresses->AssignedProject->Project->ProjectDetail->planned_end_date)
              value="{{$progresses->AssignedProject->Project->ProjectDetail->planned_end_date}}"
            @else
              value=""
            @endif
            />
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm float-right" name="dates_submit">Submit</button>
       </form>
      </div>

  </div>
</div>
</div>
