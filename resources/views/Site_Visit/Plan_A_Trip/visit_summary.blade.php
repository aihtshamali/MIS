@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring Dashboard | Visit Request Summary
@endsection
@section('styleTags')
<!-- Select 2 css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
<!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/multiselect/css/multi-select.css')}}" />
<style>
    .fancyLable{background: #16d39a !important;padding: 0.5% !important;border-radius: 4px !important;}
    .requestedby{background:tomato !important;padding:0.2% !important;border-radius: 4px !important;}
    .black{color:#000 !important;}
    .white{color:#fff !important;}
    .form-group{margin-bottom:0px !important;}
    label{margin-bottom: 0px !important;}
    p{margin-bottom:0px !important;}
    .newPurposeHere{border-radius: 3px;background: #fff;margin-top:1%;}
    .newPurposeHere:nth-child(even){background: #77777717;}
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto
        {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
    .row{padding: 0.3% !important;margin-left: 0px !important;margin-right: 0px !important;}
    @media print
        {
            .col-md-2, .col-md-3{float: left !important;width: 18% !important;}
            .nodisprint{display: none !important;}
        }
</style>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <label for="" class="fancyLable">
                      <span class="white">  Request By :
                        <b>{{$nameofrequestee[0]->first_name}} {{$nameofrequestee[0]->last_name}} 
                            {{-- {{$triprequest->UserDetails->father_name}}  --}}
                            </b></span>
                    </label>
                </div>
                <div class="card-block">
                <div class="form-group row">
                    <p class="col-md-2"><b>Trip Type :</b></p>
                    <p class="col-md-2">{{$triprequest->PlantripTriptype->name}}</p>
                    <p class="col-md-2"><b>Purpose Type :</b></p>
                    <p class="col-md-2">@if(isset($triprequest->PlantripPurpose[0]->PlantripPurposetype->name))
                    {{$triprequest->PlantripPurpose[0]->PlantripPurposetype->name}}
                    @else
                    <span style="color:red;">Not Available</span>
                    @endif
                    </p>
                    <p class="col-md-2"><b>Sub City Type :</b></p>
                    <p class="col-md-2">
                        @if(isset($triprequest->PlantripPurpose[0]->PlantripSubcitytype->name))
                        <span>{{$triprequest->PlantripPurpose[0]->PlantripSubcitytype->name}}</span>
                        @else
                        <span style="color:red;">Not Available</span>
                        @endif
                    </p>
                </div>
                <div class="form-group row">
                    <p class="col-md-2">
                        <label for=""><b>Locations To Visit :</b></label>
                    </p>
                    <p class="col-md-2">
                            @if(isset($triprequest->PlantripRequestedcity))
                            @foreach ($triprequest->PlantripRequestedcity as $city)
                                {{$city->PlantripCity->name}}
                            @endforeach
                            @endif
                    </p>
                    <p class="col-md-2"><b>Visit Dates :</b></p>
                    <p class="col-md-2">
                        @if(isset($triprequest->fullDateoftrip))
                        {{$triprequest->fullDateoftrip}}
                        @else
                        <span style="color:red;">Not Available</span>
                        @endif
                    </p>
                </div>
                <div class="form-group row">
                        <p class="col-md-2">
                            <label for=""><b>Assigned Driver :</b></label>
                        </p>
                        <p class="col-md-2">
                                @forelse ($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver as $driver)
                                 {{$driver->VmisDriver->User->first_name}} 
                                {{$driver->VmisDriver->User->last_name}} -                                                                               
                            @empty
                                <p>Not Assigned</p>                                                                                
                            @endforelse
                        </p>
                        <p class="col-md-2">
                                <label for=""><b>Assigned Vehicle :</b></label>
                            </p>
                            <p class="col-md-2">
                                    @forelse ($triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle as $vehicle)
                                     {{$vehicle->VmisVehicle->name}} 
                                @empty
                                    <p>Not Assigned</p>                                                                              
                                @endforelse
                            </p>
                    </div>
                   
                   @foreach ($triprequest->PlantripPurpose as $plantripPurpose)               
                    <div class="col-md-10 offset-md-1 newPurposeHere">
                        <div class="col-md-12" style="margin-top:10px; margin-bottom:15px;  border:1px solid lightgrey"></div>
                        <div class="row form-group">
                            <div class="col-md-2 offset-md-2">
                                <label for=""><b>Visit Reason : </b></label>
                            </div>
                            <div class="col-md-2">
                            <p>
                                @if(isset($plantripPurpose->PlantripVisitreason->name))
                                {{$plantripPurpose->PlantripVisitreason->name}}
                                @else
                                <span style="color:red;">Noxt Available</span>
                                @endif
                            </p>
                            </div>
                            @if(isset($plantripPurpose->PlantripVisitreason->name) && $plantripPurpose->PlantripVisitreason->name == "Meeting" || $plantripPurpose->PlantripVisitreason->name == "Other")
                            <div class="col-md-3 ">
                                <label for=""><b>Reason Description : </b></label>
                            </div>
                            <div class="col-md-2">
    
                                <p>{{$plantripPurpose->PlantripVisitedproject->description}}</p>
                            </div>
                        @elseif(isset($plantripPurpose->PlantripVisitreason->name) &&  $plantripPurpose->PlantripVisitreason->name=="Monitoring" || $plantripPurpose->PlantripVisitreason->name=="Evaluation")
                        
                        <div class="col-md-1">
                                <label for=""><b>Title : </b></label>
                            </div>
                            <div class="col-md-3">
                                    @if(isset($plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title))
                                <p>{{$plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title}}</p>
                                @endif
                            </div>
                        
                        @endif
                        
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 table-responsive">
                                <table id="#" class="table table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th style="text-align:center;">Sr #.</th>
                                        <th style="text-align:center;">From Location</th>
                                        <th style="text-align:center;">To Location</th>
                                        <th style="text-align:center;">From Date</th>
                                        <th style="text-align:center;">To Date</th>
                                        <th style="text-align:center;">Duration</th>
                                        <th style="text-align:center;">Departure Time</th>
                                        <th style="text-align:center;">Members</th>
    
                                    </tr>
                                    </thead>
                                    <tbody>
                                            @php
                                            $i=0;   
                                        @endphp
                                        @if(isset($plantripPurpose->PlantripTriplocation))
                                        @foreach ($plantripPurpose->PlantripTriplocation as $triplocation)
                                            <tr>
                                                <td style="text-align:center;">
                                                        @php
                                                            echo $i++;
                                                        @endphp
                                                </td>
                                                <td> @if(isset($triplocation->plantrip_city_from))
                                                        <p>{{$triplocation->PlantripCityFrom->name}}</p>
                                                        @else
                                                        <p><span style="color:red;">Not Available</span></p>
                                                        @endif</td>
                                                <td> @if(isset($triplocation->plantrip_city_to))
                                                    {{-- {{dd($triplocation->PlantripCityTo->name)}} --}}
                                                        <p>{{$triplocation->PlantripCityTo->name}}</p>
                                                        @else
                                                        <p><span style="color:red;">Not Available</span></p>
                                                        @endif</td>
                                                <td> @if(isset($triplocation->from_Date))
                                                        <p>{{$triplocation->from_Date}}</p>
                                                        @else
                                                        <p><span style="color:red;">Not Available</span></p>
                                                        @endif</td>
                                                <td>  @if(isset($triplocation->to_Date))
                                                    <p>{{$triplocation->to_Date}}</p>
                                                    @else
                                                    <p><span style="color:red;">Not Available</span></p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($triprequest->PlantripTriptype->name=='Local')
                                                    1 Day
                                                
                                                    @elseif($triprequest->PlantripTriptype->name=='Outstation')
                                                @php
                                                        $datetime1 = date_create($triplocation->from_Date);
                                                        $datetime2 = date_create($triplocation->to_Date);
                                                        
                                                        $interval = date_diff($datetime2, $datetime1);
                                                        
                                                    echo $interval->format("%a days"); 
                                                    @endphp
                                                    @endif
                                                    {{-- @if(isset($triplocation->to_Date))
                                                    <p>{{$triplocation->to_Date}}</p>
                                                    @else
                                                    <p><span style="color:red;">Not Available</span></p>
                                                    @endif --}}
                                                </td>
                                                <td>
                                                    @if(isset($triplocation->time_to_Departure))
                                                    <p>{{$triplocation->time_to_Departure}}</p>
                                                    @else
                                                    <p><span style="color:red;">Not Available</span></p>
                                                    @endif
                                                </td>
                                                <td>
                                                
                                                {{-- {{dump($triprequest->PlantripPurpose->PlantripTriplocation[0]->PlantripMember)}} --}}
                                                @php
                                                $j=0;
                                                @endphp
                                               @if(isset($plantripPurpose->PlantripMembers))
                                               @foreach ($plantripPurpose->PlantripMembers as $PlantripMember)
                                                   @if($PlantripMember->requested_by==1)
                                                       <p class="requestedby white" style="text-align: center"> {{$PlantripMember->User->first_name}}   {{$PlantripMember->User->last_name}}<br> </p>
                                                   @else
                                                       <p style="text-align: center">{{$PlantripMember->User->first_name}}   {{$PlantripMember->User->last_name}}<br> </p>
                                                   @endif                                        
                                                   @php
                                                   $j++;
                                                   @endphp
                                               @endforeach 
                                               @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-footer">
                    <form action="#" method="POST" enctype="multipart/form-data" id="">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-2 offset-md-10">
                                <p><h6><b style="color:white;">:</b></h6></p>
                            <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Request</button>      
                            </div>    
                        </div>
                    </form>
                    
                    <form action="{{route('visitrequestDescision')}}" method="POST" enctype="multipart/form-data" id="">
                        {{csrf_field()}}
                        <div class="row">
                                <div class="col-md-5 offset-md-1">
                                    <p><h6><b>Remarks :</b></h6></p>
                                    <textarea type="text" name="remarks" ></textarea>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <p><h6><b style="color:white;"> :</b></h6></p>
                                <input type="hidden" name="request_descision" value="2">
                                <input type="hidden" name="triprequest_id" value="{{$triprequest->id}}">
                                <button type="submit" class="btn btn-success btn-sm"><b>Approve</b></button>
                                
                            </div>
                            <div class="col-md-3 ">
                                    <p><h6><b style="color:white;">:</b></h6></p>
                                <button type="button" class="btn btn-danger btn-sm" name="rejected">Rejected</button>   
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
        </div>
    @endsection
    @section('js_scripts')
    <!-- Multiselect js -->
    <script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
    <script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script>
    <script>
    $('.multipleselect').select2();
    </script>
    @endsection