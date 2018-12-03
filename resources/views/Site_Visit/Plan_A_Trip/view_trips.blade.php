@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring Dashboard | DGME
@endsection
@section('styleTags')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}">
<style>
td{white-space: unset !important;}
.tw-w{min-width: 215px !important;}
ol{padding: 0px 0px 0px 13px !important;}
/* li{margin: 0px !important;padding: 0px !important;} */
</style>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><b>My Site Visit</b></h5>
                    </div>
                    <div class="card-block">
                            <div class="col-md-12 table-responsive">
                                    <table id="#" class="table table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th style="text-align:center;">Sr #.</th>
                                            <th class="tw-w" style="text-align:center;" >Visit Request Name</th>
                                            <th style="text-align:center;">Trip Type</th>
                                            <th style="text-align:center;">Assigned Driver</th>
                                            <th style="text-align:center;">Assigned Vehicle</th>
                                            <th style="text-align:center;">Approval Status</th>
                                            <th style="text-align:center;">Completion Status</th>

                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                             $i=1;   
                                            @endphp
                                            @foreach ($triprequests as $triprequest)
                                            <tr >
                                               <td style="text-align:center;">
                                                @php
                                                    echo $i++;
                                                @endphp
                                               </td>
                                               <td style="" >
                                                    <ol>
                                                    @foreach ($triprequest->PlantripPurpose as $plantripPurpose) 
                                                       
                                                            @if(isset($plantripPurpose->PlantripVisitreason->name) && $plantripPurpose->PlantripVisitreason->name == "Meeting" || $plantripPurpose->PlantripVisitreason->name == "Other")
                                                          <li>{{$plantripPurpose->PlantripVisitedproject->description}}</li>  
                                                        @elseif(isset($plantripPurpose->PlantripVisitreason->name) &&  $plantripPurpose->PlantripVisitreason->name=="Monitoring" || $plantripPurpose->PlantripVisitreason->name=="Evaluation")
                                                            @if(isset($plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title))
                                                               <li>{{$plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title}}</li> 
                                                            @endif 
                                                        @endif  
                                                        
                                                       
                                                    @endforeach
                                                </ol>
                                            </td>
                                            {{-- {{dd($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->first_name)}} --}}
                                             <td style="text-align:center;"> {{$triprequest->PlantripTriptype->name}}</td>
                                             <td style="text-align:center;">
                                                    @if(isset($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver))
                                                    {{$triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->first_name}} 
                                                    {{$triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->last_name}}
                                                    @else
                                                    <p>Not Assigned</p>
                                                    @endif
                                                </td>
                                                <td style="text-align:center;">
                                                    @if(isset($triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle[0]->VmisVehicle->name))
                                                    {{$triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle[0]->VmisVehicle->name}} 
                    
                                                    @else
                                                    <p>Not Assigned</p>
                                                    @endif
                                                </td>
                    
                                            <td style="text-align:center;" >
                                                @if($triprequest->VmisRequestToTransportOfficer->approval_status=='1')
                                                <label class="badge badge-md badge-primary">Waiting For Approval</label> 
                                                @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='2')
                                                <label class="badge badge-md badge-success">Approved</label> 
                                                @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='3')
                                                <label class="badge badge-md badge-danger">Not Approved</label> 
                                                @endif
                                            </td>
                                            <td style="text-align:center;" >
                                                @if($triprequest->completed=='1')
                                                <label class="badge badge-md badge-success">Completed</label> 
                                                {{$triprequest->completed}}
                                                @elseif($triprequest->completed=='0')
                                                <label class="badge badge-md badge-danger">Not Completed</label>
                                                @endif 
                                            </td>
                                            </tr>
                    
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('js_scripts')
  <!-- data-table js -->
  @endsection