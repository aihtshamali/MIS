@extends('_Monitoring.layouts.upperNavigationSiteVisit')
@section('title')
 VisitRequests Dashboard | DGME
@endsection
<style>
td{white-space: unset !important;}
    .tw-w{min-width: 215px !important;}
    ol{padding: 0px 0px 0px 13px !important;}
</style>
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-12">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    {{-- <i class="feather icon-home bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600 pointer"> <span style="color:black">Welcome</span>
                        @auth
                          {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                        @endauth <span style="color:black;">to Monitoring dashboard.</span>
                    </span>
                    <div class="progress clearfix mt2 clrornge">
                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                    </div> --}}
                    @if(Auth::id()=='2012')
                    @role("manager")
                    <div class="col-md-12 mt2">
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item visitRequests">
                                <a class="nav-link active" data-toggle="tab" href="#visitrequests" role="tab" aria-expanded="false">Pending Visit Requests</a>
                            </li>
                            
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content tabs card-block ">
                            <div class="tab-pane visitRequests active" id="visitrequests" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-md-12">
                                            @if($tripcounts==0)
                                            <p><h5 style="text-align :center;">No Visit Requests</h5></p>
                                            @else
                                          
                                                <div class="card">
                                                    <div class="card-block">
                                                      <div class="table-responsive ">
                                                          <table id="#" class="table table-bordered nowrap">
                                                              <thead>
                                                              <tr>
                                                                  <th style="text-align:center;">Sr #.</th>
                                                                  <th style="text-align:center;">Requestee Name</th>
                                                                  <th style="text-align:center;">Request Purpose</th>
                                                                  <th style="text-align:center;">Trip Type</th>
                                                                  <th style="text-align:center;">Assigned Driver</th>
                                                                  <th style="text-align:center;">Assigned Vehicle</th>
                                                                  <th style="text-align:center;">Status</th>
                                                                  <th style="text-align:center;"></th>
                                                                  {{-- <th style="text-align:center;"></th> --}}
                                                                
                                                                  
                                                              </tr>
                                                              </thead>
                                                              <tbody>
                                                                  @php
                                                                   $i=1;   
                                                                  @endphp
                                                            @foreach ($triprequests as $triprequest)
                                                                <tr>
                                                                    <td>
                                                                         @php
                                                                   echo $i++;
                                                                    @endphp
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                            {{$triprequest->first_name}}   {{$triprequest->last_name}}
                                                                    </td>
                                                                    <td>
                                                                        <ol>
                                                                        @foreach ($triprequest->PlantripPurpose as $plantripPurpose) 
                                                                           
                                                                                @if(isset($plantripPurpose->PlantripVisitreason->name) && $plantripPurpose->PlantripVisitreason->name == "Meeting" || $plantripPurpose->PlantripVisitreason->name == "Other")
                                                                        <li>{{$plantripPurpose->PlantripVisitedproject->description}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li>  
                                                                            @elseif(isset($plantripPurpose->PlantripVisitreason->name) &&  $plantripPurpose->PlantripVisitreason->name=="Monitoring" || $plantripPurpose->PlantripVisitreason->name=="Evaluation")
                                                                                @if(isset($plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title))
                                                                        <li>{{$plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li> 
                                                                                @endif 
                                                                            @endif  
                                                                            
                                                                           
                                                                        @endforeach
                                                                    </ol>
                                                                </td>
                                                                    <td style="text-align:center;"> {{$triprequest->PlantripTriptype->name}}</td>
                                                                    <td style="text-align:center;">
                                                                        {{-- $triprequests[0]->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->first_name) --}}
                                                                        @forelse ($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver as $driver)
                                                                            {{$driver->VmisDriver->User->first_name}} 
                                                                            {{$driver->VmisDriver->User->last_name}},                                                                                
                                                                        @empty
                                                                            <p>Not Assigned</p>                                                                                
                                                                        @endforelse
                                                                    </td>
                                                                        <td style="text-align:center;">
                                                                          @forelse ($triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle as $vehicle)
                                                                              {{$vehicle->VmisVehicle->name}} ,
                                                                          @empty
                                                                              <p>Not Assigned</p>                                                                              
                                                                          @endforelse
                                                                    </td>
                                                                <td style="text-align:center;" >
                                                                    @if($triprequest->approval_status == 'Pending')
                                                                    @if(isset($triprequest->VmisRequestToTransportOfficer->recommended) && $triprequest->VmisRequestToTransportOfficer->recommended=="Recommended" && $triprequest->VmisRequestToTransportOfficer->approval_status=='1')
                                                                   <label class="badge badge-md badge-success">Recommended</label>
                                                                 
                                                                   @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='2')
                                                                        <label class="badge badge-md badge-success">Waiting For DG's Approval</label> 
                                                                            @if(isset($off->PlantripRemark))
                                                                                <p><b>Remarks:</b>
                                                                                @foreach($off->PlantripRemark as $tripR)
                                                                                {{$tripR->remarks}}
                                                                                @endforeach
                                                                                </p>    
                                                                            @endif
                                                                   @if(isset($triprequest->PlantripRemark))
                                                                   {{-- {{dd($triprequest->PlantripRemark)}} --}}
                                                                        @foreach($triprequest->PlantripRemark as $tripR)
                                                                        <p><b>Remarks by {{$tripR->RemarksByUser->first_name}}:</b>
                                                                        
                                                                        {{$tripR->remarks}}
                                                                        @endforeach
                                                                        </p>    
                                                                     @endif
                                                                   @endif
                                                                @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='3' && $triprequest->approval_status == 'Approved')
                                                            <label class="badge badge-md badge-success">Approved by {{$triprequest->VmisRequestToTransportOfficer->User->first_name}} {{$triprequest->VmisRequestToTransportOfficer->User->last_name}} </label> 
                                                                @if(isset($triprequest->PlantripRemark))
                                                                <p>
                                                                    @foreach($triprequest->PlantripRemark as $tripR)
                                                                    <p><b>Remarks by {{$tripR->RemarksByUser->User->first_name}}:</b>
                                                                
                                                                    {{$tripR->remarks}}
                                                                    @endforeach
                                                                    </p>    
                                                                @endif
                                                            @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='4' && $triprequest->approval_status == 'Not Approved')
                                                            <label class="badge badge-md badge-danger">Disapproved By  {{$triprequest->VmisRequestToTransportOfficer->User->first_name}} {{$triprequest->VmisRequestToTransportOfficer->User->last_name}} </label> 
                                                            @if(isset($triprequest->PlantripRemark))
                                                            <p><b>Remarks:</b>
                                                            @foreach($triprequest->PlantripRemark as $tripR)
                                                            {{$tripR->remarks}}
                                                            @endforeach
                                                            </p>    
                                                        @endif    
                                                            @endif
                                                            </td>
                                                                    <td> 
                                                                    <a href="{{route('visitrequestSummary',$triprequest->id)}}" class="btn btn-primary btn-sm"><b>View Full Summary</b></a></td>
                                                                    {{-- <td> 
                                                                    <form action="{{route('visitrequestDescision')}}" method="POST" enctype="multipart/form-data" id="">
                                                                        {{ csrf_field() }}                                                                            
                                                                        <input type="hidden" name="request_descision" value="2">
                                                                    <input type="hidden" name="triprequest_id" value="{{$triprequest->id}}">
                                                                            <button type="submit" class="btn btn-success btn-sm"><b>Approve</b></button>
                                                                       </form>
                                                                       <br>
                                                                       <form action="{{route('visitrequestDescision')}}" method="POST" enctype="multipart/form-data" id="">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="request_descision" value="3">    
                                                                <input type="hidden" name="triprequest_id" value="{{$triprequest->id}}">
                                                                        <button type="button" class="btn btn-danger btn-sm"><b>Dis Approve</b></button>
                                                                    </form>
                                                                    </td>
                                                                     --}}
                                                                </tr>
                                                                @endforeach
                                          
                                                               
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                      </div>
                                            </div>
                                       
                                        @endif
                                    </div>
                                </div>
                            </div>
                           </div>
                    </div>
                    @endrole
                    @endif
                    @if(Auth::id()=='2011')
                    @role("manager")
                    <div class="col-md-12 mt2">
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item visitRequests">
                                <a class="nav-link active" data-toggle="tab" href="#visitrequests" role="tab" aria-expanded="false">Recommended Visit Requests</a>
                            </li>
                            
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content tabs card-block ">
                            <div class="tab-pane visitRequests active" id="visitrequests" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-md-12">
                                            @if($tripcountsFordg==0)
                                            <p><h5 style="text-align :center;">No Visit Requests</h5></p>
                                            @else
                                          
                                                <div class="card">
                                                    <div class="card-block">
                                                      <div class="table-responsive ">
                                                          <table id="#" class="table table-bordered nowrap">
                                                              <thead>
                                                              <tr>
                                                                  <th style="text-align:center;">Sr #.</th>
                                                                  <th style="text-align:center;">Requestee Name</th>
                                                                  <th style="text-align:center;">Request Purpose</th>
                                                                  <th style="text-align:center;">Trip Type</th>
                                                                  <th style="text-align:center;">Assigned Driver</th>
                                                                  <th style="text-align:center;">Assigned Vehicle</th>
                                                                  <th style="text-align:center;">Recommendation</th>
                                                                  <th style="text-align:center;"></th>
                                                                  <th style="text-align:center;"></th>
                                                                
                                                                  
                                                              </tr>
                                                              </thead>
                                                              <tbody>
                                                                  @php
                                                                   $i=1;   
                                                                  @endphp
                                                            @foreach ($triprequestsrecommended as $triprequest)
                                                                <tr>
                                                                    <td>
                                                                         @php
                                                                   echo $i++;
                                                                    @endphp
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                            {{$triprequest->first_name}}   {{$triprequest->last_name}}
                                                                    </td>
                                                                    <td style="">
                                                                        <ol>
                                                                        @foreach ($triprequest->PlantripPurpose as $plantripPurpose) 
                                                                           
                                                                                @if(isset($plantripPurpose->PlantripVisitreason->name) && $plantripPurpose->PlantripVisitreason->name == "Meeting" || $plantripPurpose->PlantripVisitreason->name == "Other")
                                                                        <li>{{$plantripPurpose->PlantripVisitedproject->description}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li>  
                                                                            @elseif(isset($plantripPurpose->PlantripVisitreason->name) &&  $plantripPurpose->PlantripVisitreason->name=="Monitoring" || $plantripPurpose->PlantripVisitreason->name=="Evaluation")
                                                                                @if(isset($plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title))
                                                                        <li>{{$plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li> 
                                                                                @endif 
                                                                            @endif  
                                                                            
                                                                           
                                                                        @endforeach
                                                                    </ol>
                                                                </td>
                                                                    <td style="text-align:center;"> {{$triprequest->PlantripTriptype->name}}</td>
                                                                    <td style="text-align:center;">
                                                                        {{-- $triprequests[0]->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->first_name) --}}
                                                                        @forelse ($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver as $driver)
                                                                            {{$driver->VmisDriver->User->first_name}} 
                                                                            {{$driver->VmisDriver->User->last_name}},                                                                                
                                                                        @empty
                                                                            <p>Not Assigned</p>                                                                                
                                                                        @endforelse
                                                                    </td>
                                                                        <td style="text-align:center;">
                                                                          @forelse ($triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle as $vehicle)
                                                                              {{$vehicle->VmisVehicle->name}} ,
                                                                          @empty
                                                                              <p>Not Assigned</p>                                                                              
                                                                          @endforelse
                                                                    </td>
                                                                    <td>
                                                                        {{-- {{dd($triprequest->VmisRequestToTransportOfficer->recommended)}} --}}
                                                                        @if(isset($triprequest->VmisRequestToTransportOfficer->recommended) && $triprequest->VmisRequestToTransportOfficer->recommended=="Recommended" && $triprequest->VmisRequestToTransportOfficer->approval_status==2)
                                                                            <label class="badge badge-md badge-success">Recommended </label>
                                                                            @if(isset($triprequest->PlantripRemark))
                                                                            <p>
                                                                                @foreach($triprequest->PlantripRemark as $tripR)
                                                                                <p><b>{{$tripR->RemarksByUser->first_name}} {{$tripR->RemarksByUser->last_name}}:</b>
                                                                            
                                                                                {{$tripR->remarks}}
                                                                                @endforeach
                                                                                </p>    
                                                                            @endif
                                                                            @endif
                                                                        </td>
                                                                    <td> 
                                                                    <a href="{{route('visitrequestSummary',$triprequest->id)}}" class="btn btn-primary btn-sm"><b>View Full Summary</b></a></td>
                                                                    <td> 
                                                                    <form action="{{route('visitrequestDescision')}}" method="POST" enctype="multipart/form-data" id="">
                                                                        {{ csrf_field() }}                                                                            
                                                                        <input type="hidden" name="request_descision" value="2">
                                                                    <input type="hidden" name="triprequest_id" value="{{$triprequest->id}}">
                                                                            <button type="submit" class="btn btn-success btn-sm"><b>Approve</b></button>
                                                                       </form>
                                                                       <br>
                                                                       <form action="{{route('visitrequestDescision')}}" method="POST" enctype="multipart/form-data" id="">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="request_descision" value="3">    
                                                                <input type="hidden" name="triprequest_id" value="{{$triprequest->id}}">
                                                                        <button type="button" class="btn btn-danger btn-sm"><b>Dis Approve</b></button>
                                                                    </form>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                @endforeach
                                          
                                                               
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                      </div>
                                            </div>
                                       
                                        @endif
                                    </div>
                                </div>
                            </div>
                           </div>
                    </div>
                    @endrole
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection