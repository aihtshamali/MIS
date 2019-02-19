@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring Report | DGME
@endsection
@section('content')
<button class="pull-right" onclick="Export2Doc('exportContent');">Export as Doc</button>

<div class="card" id='exportContent'>
    <div class="card-header">
        <img src="" alt="">
        <label><h4><b>Report</b></h4></label>
    </div>
        {{-- Project Summary --}}
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <label><b>Project Title :</b></label>
                <span>{{$project->AssignedProject->Project->title}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label><b>Locations :</b></label>
                <span>
                    @foreach ($project->AssignedProject->Project->AssignedDistricts as $district)
                        {{$district->District->name}},
                        @endforeach
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>Project GS.No:</b></label>
                <span>{{$project->AssignedProject->Project->ADP}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>Planned Start Date :</b></label>
                <span>{{date('d-M-Y', strtotime($project->AssignedProject->Project->ProjectDetail->planned_start_date))}}</span>
            </div>
            <div class="col-md-6">
                <label><b>Planned End Date :</b></label>
                <span>{{ date('d-M-Y', strtotime($project->AssignedProject->Project->ProjectDetail->planned_end_date))}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <label><b>Actual Start Date :</b></label>
            <span>
                @if(isset($project->AssignedProject->Project->ProjectDetail->actual_start_date))
                    {{$project->AssignedProject->Project->ProjectDetail->actual_start_date}}
                   
                    @endif
            </span> 
          </div>
          <div class="col-md-6">
                <label><b>Actual End Date :</b></label>
                <span>
                        @if(isset($project->AssignedProject->Project->ProjectDetail->actual_end_date))
                    {{$project->AssignedProject->Project->ProjectDetail->actual_end_date}}
                   
                    @endif
                </span>
            </div>
        </div>      
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>Physical Progress :</b></label>
                <span style="background:#404E67; color:white; padding:5px;">
                    <b>{{round(calculateMPhysicalProgress($project->id,2),1)}}%</b>
                </span> 
            </div>
            <div class="col-md-6">
                <label for=""><b>Financial Progress :</b></label>
                <span style="background:#404E67; color:white; padding:5px;">
                    <b>{{round(calculateMFinancialProgress($project->id,2),1)}}%</b>
                </span> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>Original Approved Cost :</b></label>
                <span>
                    {{round($project->AssignedProject->Project->ProjectDetail->orignal_cost,2)}} <small> Million PKR</small>
                </span> 
            </div>
            <div class="col-md-6">
                <label for=""><b>Final Revised Cost :</b></label>
                <span>
                    @php
                    $revisedFinalCost=0;
                    @endphp
                    @foreach ($project->AssignedProject->Project->RevisedApprovedCost as $cost)
                    @php
                        $revisedFinalCost= $cost->cost;
                    @endphp
                    @endforeach
                    {{round($revisedFinalCost,2)}} <small> Million PKR</small>
                </span> 
            </div>
        </div>
    </div>
         {{-- Project Review Tab --}}
    <div class="card-block" style="margin-bottom:3%;background:ghostwhite">
         {{-- Financial Cost --}}
        <div class="row" style="margin-bottom:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Review : Financial Cost</b></h5></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>ADP Allocation of Fiscal Year :</b></label>
                <span>
                    @if(isset($project->MProjectCost->adp_allocation_of_fiscal_year))
                    {{round($project->MProjectCost->adp_allocation_of_fiscal_year,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                   
                    @endif
                </span>
            </div>
            <div class="col-md-6">
                <label for=""><b>Release To Date of Fiscal Year :</b></label>
                <span>
                    @if(isset($project->MProjectCost->release_to_date_of_fiscal_year))
                    {{round($project->MProjectCost->release_to_date_of_fiscal_year,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                    
                    @endif
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>Total Allocation by that time (Cumulative):</b></label>
                <span>
                    @if(isset($project->MProjectCost->total_allocation_by_that_time))
                     {{round($project->MProjectCost->total_allocation_by_that_time,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                   
                     @endif
                </span>
            </div>
            <div class="col-md-6">
                <label for=""><b>Utilization Against Cost Allocation :</b></label>
                <span>
                @if(isset($project->MProjectCost->utilization_against_cost_allocation))
                 {{round($project->MProjectCost->utilization_against_cost_allocation,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
               
                     @endif
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>Total Releases To Date :</b></label>
                <span> 
                    @if(isset($project->MProjectCost->total_release_to_date))
                    {{round($project->MProjectCost->total_release_to_date,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                    
                    @endif
                </span>
            </div>
            <div class="col-md-6">
                <label for=""><b>Utilization Against Releases :</b></label>
                <span> 
                    @if(isset($project->MProjectCost->utilization_against_releases))
                    {{round($project->MProjectCost->utilization_against_releases,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                    
                    @endif
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>Technical Sanction Cost :</b></label>
                <span>
                    @if(isset($project->MProjectCost->technical_sanction_cost))
                     {{round($project->MProjectCost->technical_sanction_cost,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                   
                     @endif
                    </span>
            </div>
            <div class="col-md-6">
                <label for=""><b>Contract Award Cost:</b></label>
                <span>
                    @if(isset($project->MProjectCost->contract_award_cost))
                     {{round($project->MProjectCost->contract_award_cost  ,1)}} <small> Million {{$project->AssignedProject->Project->ProjectDetail->currency}}</small>
                   
                     @endif
                    </span>
            </div>
        </div>

        {{-- Locations --}}
        <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Review : Locations</b></h5></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for=""><b>District :</b></label>
                <span>
                    @if(isset($project->MProjectLocation->district))
                    {{$project->MProjectLocation->district}}
                    
                    @endif
                </span>
            </div>
            <div class="col-md-4">
                <label for=""><b>City :</b></label>
                <span>
                    @if(isset($project->MProjectLocation->city))
                    {{$project->MProjectLocation->city}}
                    
                    @endif
                </span>
            </div>
            <div class="col-md-4">
                <label for=""><b>GPS :</b></label>
                <span>
                    @if(isset($project->MProjectLocation->gps))
                    {{$project->MProjectLocation->gps}}
                    
                    @endif
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for=""><b>Longitude :</b></label>
                <span>
                    @if(isset($project->MProjectLocation->longitude))
                    {{$project->MProjectLocation->longitude}}
                    
                    @endif
                </span>
            </div>
            <div class="col-md-4">
                <label for=""><b>Latitude :</b></label>
                <span>
                    @if(isset($project->MProjectLocation->latitude))
                    {{$project->MProjectLocation->latitude}}
                    
                    @endif
                </span>
            </div>
        </div>

        {{-- Agencies and Organizations --}}
        <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Review : Agencies and Organizations</b></h5></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for=""><b>Operations & Management :</b></label>
                <span>
                    @if(isset($project->MProjectOrganization->operation_and_management))
                    {{$project->MProjectOrganization->operation_and_management}}
                    
                    @endif
                </span>
            </div>
            <div class="col-md-6">
                <label for=""><b>Contractor or Supplier :</b></label>
                <span>
                    @if(isset($project->MProjectOrganization->contractor_or_supplier))
                    {{$project->MProjectOrganization->contractor_or_supplier}}
                    
                    @endif
                </span>
            </div>
       </div>
        {{-- Dates --}}
       <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Review : Dates</b></h5></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for=""><b>Project Approval Date :</b></label>
                <span>
                    @if(isset($project->MProjectDate->project_approval_date))
                    {{ date('d-M-Y', strtotime($project->MProjectDate->project_approval_date))}}
                    
                    @endif
                </span>
            </div>
            <div class="col-md-4">
                <label for=""><b>Admin Approval Date :</b></label>
                <span>
                    @if(isset($project->MProjectDate->admin_approval_date))
                    {{date('d-M-Y', strtotime($project->MProjectDate->admin_approval_date))}}
                    
                    @endif
                </span>
            </div>
            <div class="col-md-4">
                <label for=""><b>Actual Start Date :</b></label>
                <span>
                    @if(isset($project->MProjectDate->actual_start_date))
                    {{date('d-M-Y', strtotime($project->MProjectDate->actual_start_date))}}
                    
                    @endif
                </span>
            </div>
       </div>
    </div>
    
        {{-- Project Planning --}}
    <div class="card-block" style="margin-bottom:3%; background:beige">
         {{-- Documents --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Planning Monitoring: Documents</b></h5></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for=""><b>Documents :</b></label>
                <span>
                    @if(isset($project->MProjectAttachment))
                    @foreach ($project->MProjectAttachment as $attachments)
                    {{$attachments->attachment_name}}
                    <a href="">{{$attachments->project_attachment}}</a>  
                    @endforeach
                    
                    @endif
                </span>
            </div>  
        </div>

        {{-- Objectives --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Planning Monitoring: Objectives & Components</b></h5></div>
        </div>
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-5" style="background: ivory">
                <label for=""><b>Objectives</b></label>
                <span>
                    @php
                     $i=1;   
                    @endphp
                    @if(isset($project->MPlanObjective))
                    @foreach ($project->MPlanObjective as $obj)
                         <p><span><b>{{$i}})</b></span> {{$obj->objective}}</p>
                        @php
                        $i++;   
                        @endphp
                    @endforeach
                    
                    @endif
                </span>
            </div>
            <div class="col-md-5 offset-md-1" style="background: ivory">
                    <label for=""><b>Components</b></label>
                <span>
                    @php
                        $i=1;   
                    @endphp
                    @if(isset($project->MPlanComponent))
                    @foreach ($project->MPlanComponent as $comp)
                            <p><span><b>{{$i}})</b></span> {{$comp->component}}</p>
                        @php
                        $i++;   
                        @endphp
                    @endforeach
                    
                    @endif
                </span>
            </div>
        </div>

        {{-- Mapping of Objectives --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Planning Monitoring: Mapping of Objectives and Components</b></h5></div>
        </div>
        <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Sr.
                            </th>
                            <th> Objectives</th>
                            <th>Components</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1; 
                            $j=1;     
                        @endphp
                        @if(isset($project->MPlanObjective))
                         @foreach ($project->MPlanObjective as $obj)
                            <tr> 
                                <td>{{$i}}</td>
                                <td>{{$obj->objective}}</td>
                                <td> 
                                    @if(isset($project->MPlanComponent))
                                    @foreach ($project->MPlanObjectivecomponentMapping as $comp)
                                            @if($comp->m_plan_objective_id==$obj->id)
                                                <p  style="background: ivory"><span><b>{{$j}})</b></span> {{$comp->MPlanComponent->component}}</p>
                                            @php
                                            $j++;   
                                        @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @php
                                $i++;
                                $j=1;
                                @endphp 
                         @endforeach  
                        
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

         {{-- Mapping of Kpis&component --}}
         <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Planning Monitoring: Mapping of Kpis & Components</b></h5></div>
        </div>
        <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <label for=""><b></b></label>
                <span>
                    @php
                        $i=1; 
                        $j=1;     
                    @endphp
                    @if(isset($project->MPlanKpicomponentMapping))
                       @foreach ($project->MPlanKpicomponentMapping as $mappedKPi)
                       <p style="background:lavender;"><span><b>{{$i}})</b> {{$mappedKPi->MProjectKpi->name}}</span></p>
                            @foreach ($project->MPlanKpicomponentMapping as $comp)
                                <p><span><b>{{$j}})</b> {{$comp->MPlanComponent->component}}</span></p>
                                @php
                                $j++; 
                            @endphp 
                                @endforeach
                        @php
                            $i++;
                            $j=1; 
                        @endphp  
                       @endforeach
                       
                    
                    @endif
                </span>
            </div>
        </div>

        {{-- Mapping of component Activities --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Planning Monitoring: Components & Activities</b></h5></div>
        </div>
        <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-6">
                <label for=""><b></b></label>
                <span>
                    @if(isset($project->MPlanComponent))
                        @php
                         $i=1;
                         $j=1;   
                        @endphp
                        @foreach ($project->MPlanComponent as $comp)
                            <p style="background:lavender"><span><b>{{$i}})</b>{{$comp->component}}</span></p> 
                            @foreach ($project->MPlanComponentActivitiesMapping as $Comp_activities)
                             @if($Comp_activities->m_plan_component_id == $comp->id)
                             <p style="background: ivory"><span><b>{{$j}})</b>{{$Comp_activities->activity}}</span></p> 
                                @php
                                    $j++;   
                                @endphp
                              @endif
                            @endforeach
                            @php
                            $i++;
                            $j=1;   
                           @endphp
                        @endforeach
                    
                    @endif
                </span>
            </div>
        </div>

         {{-- Mapping of Activities --}}
         <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Planning Monitoring: Activities Time & Costing</b></h5></div>
        </div>
        <div class="row" style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Component</th>
                            <th>Activity</th>
                            <th>Duration In Days</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($project->MPlanComponentActivitiesMapping))
                        @php
                        $i=1;
                          
                       @endphp
                        @foreach ($project->MPlanComponentActivitiesMapping as $compActivity)                      
                        <tr>
                        <td>{{$i}}</td>
                            <td>{{$compActivity->MPlanComponent->component}}</td>
                            <td>{{$compActivity->activity}}</td>
                            <td> 
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->duration) && $compActivity->MPlanComponentactivityDetailMapping->duration!=null)
                                {{$compActivity->MPlanComponentactivityDetailMapping->duration}}
                              
                                @endif
                             </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->unit) && $compActivity->MPlanComponentactivityDetailMapping->unit!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->unit}}
                              
                                @endif
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->quantity) && $compActivity->MPlanComponentactivityDetailMapping->quantity!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->quantity}}
                              
                                @endif 
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->cost) && $compActivity->MPlanComponentactivityDetailMapping->cost!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->cost}}
                              
                                @endif
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->amount) && $compActivity->MPlanComponentactivityDetailMapping->amount!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->amount}}
                              
                                @endif
                            </td>
                            @php
                             $i++;   
                            @endphp
                        </tr>
                        @endforeach
                        
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
        {{-- Conduct Monitoring --}}
    <div class="card-block" style="margin-bottom:3%; background:lightyellow">
        
        {{-- Quality Assesments --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Conduct Monitoring: Quality Assesments</b></h5></div>
        </div>
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table  table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Component</th>
                                <th>Activity</th>
                                <th>Assesment</th>
                                <th>Progress</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($project->MConductQualityassesment as $qa)
                            <tr>
                            <td>{{$i}}</td>
                            <td>
                                @if(isset($qa->MPlanComponent->component) && $qa->MPlanComponent->component!=null)
                                {{$qa->MPlanComponent->component}}
                               
                                @endif
                            </td>
                            <td>
                                @if(isset($qa->MPlanComponentActivitiesMapping->activity) && $qa->MPlanComponentActivitiesMapping->activity!=null)
                                {{$qa->MPlanComponentActivitiesMapping->activity}}
                               
                                    @endif
                                </td>
                            <td>
                                @if(isset($qa->assesment) && $qa->assesment!=null)
                                {{$qa->assesment}}
                                
                                @endif
                            </td>
                            <td>
                                    @if(isset($qa->progressinPercentage) && $qa->progressinPercentage!=null)
                                    {{$qa->progressinPercentage}}
                                   
                                    @endif
                            </td>
                            <td>
                                    @if(isset($qa->remarks) && $qa->remarks!=null)
                                    {{$qa->remarks}}
                                   
                                    @endif
                            </td>
                            @php
                            $i++;
                        @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- General Feed Backs --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Conduct Monitoring: General FeedBacks</b></h5></div>
        </div>
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table  table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>General FeedBack</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($project->MAssignedProjectFeedBack as $fb)
                                    <td>{{$fb->MGeneralFeedBack->name}}</td>
                                    <td>
                                        @if($fb->answer == "yes")
                                        {{$fb->answer}}
                                        @elseif($fb->answer=="no")
                                        {{$fb->answer}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Stakeholders --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Conduct Monitoring: Stakeholders</b></h5></div>
        </div>
        @if(isset($project->MExecutingStakeholder) && $project->MExecutingStakeholder!=null)
            <div class="row"  style="margin-bottom:2%; margin-top:2%;">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Executing Stakeholder Dept.</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Contact #</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->MExecutingStakeholder as $Executing_S)
                                <tr>    
                                    <td>
                                            @if(isset($Executing_S->AssignedExecutingAgency) && $Executing_S->AssignedExecutingAgency !=null)
                                            {{$Executing_S->AssignedExecutingAgency->ExecutingAgency->name}}
                                            
                                            @endif
                                        </td>
                                    <td>
                                        @if(isset($Executing_S->name) && $Executing_S->name!=null)
                                            {{$Executing_S->name}}
                                            
                                            @endif
                                        </td>
                                    <td>
                                            @if(isset($Executing_S->designation) && $Executing_S->designation!=null)
                                            {{$Executing_S->designation}}
                                            
                                            @endif
                                        </td>    
                                    <td>
                                            @if(isset($Executing_S->contactNo) && $Executing_S->contactNo!=null)
                                            {{$Executing_S->contactNo}}
                                            
                                            @endif
                                        </td>    
                                    <td>
                                            @if(isset($Executing_S->email) && $Executing_S->email!=null)
                                            {{$Executing_S->email}}
                                            
                                            @endif
                                        </td>    
                                </tr>  
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if(isset($project->MSponsoringStakeholder) && $project->MSponsoringStakeholder!=null)
            <div class="row"  style="margin-bottom:2%; margin-top:2%;">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Sponsoring Stakeholder Dept.</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Contact #</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->MSponsoringStakeholder as $Sponsoring_S)    
                                <tr> 
                                    <td>
                                            @if(isset($Sponsoring_S->AssignedSponsoringAgency) && $Sponsoring_S->AssignedSponsoringAgency !=null)
                                            {{$Sponsoring_S->AssignedSponsoringAgency->SponsoringAgency->name}}
                                           
                                            @endif
                                        </td>
                                    <td>
                                        @if(isset($Sponsoring_S->name) && $Sponsoring_S->name!=null)
                                            {{$Sponsoring_S->name}}
                                           
                                            @endif
                                        </td>
                                    <td>
                                            @if(isset($Sponsoring_S->designation) && $Sponsoring_S->designation!=null)
                                            {{$Sponsoring_S->designation}}
                                           
                                            @endif
                                        </td>    
                                    <td>
                                            @if(isset($Sponsoring_S->contactNo) && $Sponsoring_S->contactNo!=null)
                                            {{$Sponsoring_S->contactNo}}
                                           
                                            @endif
                                        </td>    
                                    <td>
                                            @if(isset($Sponsoring_S->email) && $Sponsoring_S->email!=null)
                                            {{$Sponsoring_S->email}}
                                           
                                            @endif
                                        </td>    
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if(isset($project->MBeneficiaryStakeholder) && $project->MBeneficiaryStakeholder!=null)
            <div class="row"  style="margin-bottom:2%; margin-top:2%;">
                <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table  table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Beneficiary Stakeholder Dept.</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Contact #</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($project->MBeneficiaryStakeholder as $Beneficiary_S)    
                                        <tr> 
                                            <td>
                                                    @if(isset($Beneficiary_S->Beneficiary) && $Beneficiary_S->Beneficiary !=null)
                                                    {{$Beneficiary_S->Beneficiary}}
                                                  
                                                    @endif
                                                </td>
                                            <td>
                                                @if(isset($Beneficiary_S->name) && $Beneficiary_S->name!=null)
                                                    {{$Beneficiary_S->name}}
                                                  
                                                    @endif
                                                </td>
                                            <td>
                                                    @if(isset($Beneficiary_S->designation) && $Beneficiary_S->designation!=null)
                                                    {{$Beneficiary_S->designation}}
                                                  
                                                    @endif
                                                </td>    
                                            <td>
                                                    @if(isset($Beneficiary_S->contactNo) && $Beneficiary_S->contactNo!=null)
                                                    {{$Beneficiary_S->contactNo}}
                                                  
                                                    @endif
                                                </td>    
                                            <td>
                                                    @if(isset($Beneficiary_S->email) && $Beneficiary_S->email!=null)
                                                    {{$Beneficiary_S->email}}
                                                  
                                                    @endif
                                                </td>    
                                        </tr>
                                        @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        @endif

        {{-- issues --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Conduct Monitoring: Issues</b></h5></div>
        </div>
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table  table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Issues</th>
                                <th>Issue Type</th>
                                <th>Severity</th>
                                <th>Sponsoring Agency</th>
                                <th>Executing Agency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->MAssignedProjectIssue as $ProjectIssue)
                            <tr>    
                                <td>
                                        @if(isset($ProjectIssue->issue) && $ProjectIssue->issue !=null)
                                        {{$ProjectIssue->issue}}
                                       
                                        @endif
                                    </td>
                                <td>
                                    @if(isset($ProjectIssue->MIssueType->name) && $ProjectIssue->MIssueType->name !=null)
                                        {{$ProjectIssue->MIssueType->name}}
                                       
                                        @endif
                                    </td>
                                <td>
                                        @if(isset($ProjectIssue->severity) && $ProjectIssue->severity!=null)
                                        {{$ProjectIssue->severity}}
                                       
                                        @endif
                                    </td>    
                                <td>
                                        @if(isset($ProjectIssue->SponsoringAgency->name) && $ProjectIssue->SponsoringAgency->name!=null)
                                        {{$ProjectIssue->SponsoringAgency->name}}
                                       
                                        @endif
                                    </td>    
                                <td>
                                        @if(isset($ProjectIssue->ExecutingAgency->name) && $ProjectIssue->ExecutingAgency->name!=null)
                                        {{$ProjectIssue->ExecutingAgency->name}}
                                       
                                        @endif
                                    </td>    
                            </tr>  
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Health Safet Env --}}
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12"><h5><b style="text-decoration-line:underline">Conduct Monitoring: Health Saftey Enviornment</b></h5></div>
        </div>
        <div class="row"  style="margin-bottom:2%; margin-top:2%;">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table  table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                             $i=1;   
                            @endphp
                            @foreach($project->MAssignedProjectHealthSafety as $projecthealth)
                             <tr>   
                            <td>
                                    {{$i}}
                                </td>
                                <td>
                                    @if(isset($projecthealth->MHealthSafety->description))
                                    {{$projecthealth->MHealthSafety->description}}    
                                   
                                        @endif</td>
                                <td>@if($projecthealth->status==true)
                                    {{$projecthealth->status}}    
                                    @elseif($projecthealth->status==false)
                                    {{$projecthealth->status}}
                                   
                                    @endif</td>
                                <td>@if(isset($projecthealth->remarks) && $projecthealth->remarks!=null)
                                    {{$projecthealth->remarks}}
                                   
                                    @endif</td>
                                </tr>
                                @php
                                $i++;   
                               @endphp
                            @endforeach     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         {{--images--}}
         <div class="row"  style="margin-bottom:2%; margin-top:2%;">
                <div class="col-md-12"><h5><b style="text-decoration-line:underline">Conduct Monitoring: Images</b></h5></div>
          </div>
          <div class="col-md-6" style="margin-bottom:2%; margin-top:2%;">
                <?php $i=1; ?>
                @foreach ($project->MAppAttachment->where('type','image/jpeg') as $attachment)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="text-align: -webkit-center !important;">
                  <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                     data-image="{{'http://172.16.10.11/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">
                      <img class="img-thumbnail" src="{{'http://172.16.10.11/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">
                      <b class="float-left">#: {{$i++}}</b>
                      <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y',strtotime($attachment->created_at))}} </b>
                  </a>
              </div>
                @endforeach
          </div>

            
    <div class="card-footer"></div>

</div>
@endsection
