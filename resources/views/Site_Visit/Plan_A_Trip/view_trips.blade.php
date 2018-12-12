@extends('_Monitoring.layouts.upperNavigationSiteVisit')
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
</style>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><b>My Site Visit</b></h5>
                        {{-- <section class='rating-widget'>
  
                            <!-- Rating Stars Box -->
                            <div class='rating-stars text-center'>
                              <ul id='stars'>
                                <li class='star' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                              </ul>
                            </div>
                            
                            <div class='success-box'>
                              <div class='clearfix'></div>
                              <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
                              <div class='text-message'></div>
                              <div class='clearfix'></div>
                            </div>    
                          </section> --}}
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
                                                          <li>{{$plantripPurpose->PlantripVisitedproject->description}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b> </li>  
                                                        @elseif(isset($plantripPurpose->PlantripVisitreason->name) &&  $plantripPurpose->PlantripVisitreason->name=="Monitoring" || $plantripPurpose->PlantripVisitreason->name=="Evaluation")
                                                            @if(isset($plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title))
                                                               <li>{{$plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li> 
                                                            @endif 
                                                        @endif  
                                                        
                                                       
                                                    @endforeach
                                                </ol>
                                                <a href="{{route('visitrequestSummary',$triprequest->id)}}" style="text-decoration: underline;">Read Summary</a>
                                            </td>
                                            {{-- {{dd($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->first_name)}} --}}
                                             <td style="text-align:center;"> {{$triprequest->PlantripTriptype->name}}</td>
                                             <td style="text-align:center;">
                                                    @if(isset($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver))
                                                    @foreach ($triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver as $assignedDriver)
                                                    {{$assignedDriver->VmisDriver->User->first_name}} 
                                                    {{$assignedDriver->VmisDriver->User->last_name}}
                                                    @endforeach
                                                    @else
                                                    <p>Not Assigned</p>
                                                    @endif
                                                </td>
                                                <td style="text-align:center;">
                                                    @if(isset($triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle))
                                                   @foreach($triprequest->VmisRequestToTransportOfficer->VmisAssignedVehicle as $assignedVehicle)
                                                    {{$assignedVehicle->VmisVehicle->name}} 
                                                    @endforeach
                                                    @else
                                                    <p>Not Assigned</p>
                                                    @endif
                                                </td>
                    
                                            <td style="text-align:center;" >
                                                @if($triprequest->approval_status == 'Pending')
                                                     @if(isset($triprequest->VmisRequestToTransportOfficer->approval_status) && $triprequest->VmisRequestToTransportOfficer->approval_status=='1')
                                                    <label class="badge badge-md badge-primary">Pending At Director End</label>
                                                    @else 
                                                    <label class="badge badge-md badge-primary">Pending At TO End</label>
                                                    @endif
                                                @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='2'  && $triprequest->approval_status == 'Approved')
                                                <label class="badge badge-md badge-success">Approved by {{$triprequest->VmisRequestToTransportOfficer->User->first_name}} {{$triprequest->VmisRequestToTransportOfficer->User->last_name}} </label> 
                                                @if(isset(($triprequest->PlantripRemark)))
                                                <p><b>Remarks:</b>
                                                @foreach($triprequest->PlantripRemark as $tripR)
                                                {{$tripR->remarks}}
                                                @endforeach
                                                </p>    
                                            @endif
                                                @elseif($triprequest->VmisRequestToTransportOfficer->approval_status=='3' && $triprequest->approval_status == 'Not Approved')
                                                <label class="badge badge-md badge-danger">Dis-Approved by{{$triprequest->VmisRequestToTransportOfficer->User->first_name}} {{$triprequest->VmisRequestToTransportOfficer->User->last_name}} </label> 
                                                @endif
                                            </td>
                                            <td style="text-align:center;" >
                                                @if($triprequest->completed=='1')
                                               
                                                    <label class="badge badge-md badge-success">Complete</label> 
                                                    <div class="rating " name="driverRating" value="{{$triprequest->PlantripDriverRating->rating}}" disabled></div>
                                                    
                                                @elseif($triprequest->completed=='0' && $triprequest->approval_status == 'Approved')
                                                <button type="button" class="btn btn-sm btn-danger" id="clickToComplete" >Click To End Visit</button>
                                                  <form action="{{route('visitCompleted',$triprequest->id)}}" class="ratingsystem" method="POST" style="display:none;">
                                                        {{ csrf_field() }}
                                                            <input type="hidden" name="triprequest_id" value={{$triprequest->id}}>  
                                                            <input type="hidden" name="assigned_driver_id" value={{$triprequest->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->id}}>  
                                                            {{-- <input type="hidden" name="triprequest_id" value={{$triprequest->id}}>                                                                                                           --}}
                                                            <div class="rating " name="driverRating" value="1" required></div>
                                                            <button type="submit" class="btn btn-sm btn-warning" style="padding: 5px !important;">Done</button>
                                                    </form>
                                                @elseif($triprequest->completed=='0' && $triprequest->approval_status == 'Pending')
                                                    <label class="badge badge-md badge-danger">Incomplete</label>
                                                @elseif($triprequest->completed=='0' && $triprequest->approval_status == 'Not Approved')
                                                <label class="badge badge-md badge-danger">Not Approved Visit</label>
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
<script src="{{asset('rating/jQuery-gRating.js')}}"></script>
<script src="{{asset('rating/jQuery-gRating.min.js')}}"></script>
<script>
    $(".rating").grating({

    // Initial enabled or disabled state of the rating
    enabled: true,

    // Indicates whether to allow select the same rating value twice to toggle off the rating
    allowDeselect: true,

    // Default character to use i.e. ASCII Star, can be font-awesome fa codes i.e. fa-ambulance
    character: "&#9733;",

    // Allows switching the span type to another html element if needed
    elementType: "span",

    // How many rating objects to display
    elementCount: 5,

    // Whether to limit the number of clicks or not, a value of 0 enables no limit
    clicklimit: 0,

    // Initial rating value
    defaultValue: 0,

    // Whether validation is needed
    required: false,

    // <a href="https://www.jqueryscript.net/tags.php?/Validation/">Validation</a> pattern for the <a href="https://www.jqueryscript.net/tags.php?/Bootstrap/">Bootstrap</a> Validator is added to the class of input if required is true
    validationClass: "form-control",

    // Overrude the default error message from the Bootstrap Validator
    validationText: "Rating is required",

    // Placeholder for callback function called onclick events for when a rating is changed
    callback: null,

    // Normal display settings for stars
    ratingCss: {
    fontSize: "20px",
    color: "black",// For dark pages
    opacity: ".5",
    cursor: "pointer",
    padding: "1px",
    transition: "all 150ms",
    display: "inline-block",
    transform: "rotateX(45deg)",
    transformOrigin: "center bottom",
    textShadow: "none"
    },

    // Hover settings for stars
    ratingHoverCss: {
    color: "#ff0",
    opacity: "1",
    transform: "rotateX(0deg)",
    textShadow: "0 0 30px #ffc"
    }

    });

</script>
<script>
$('#clickToComplete').click(function(){
  $('.ratingsystem').show(1000);
});
</script>

@endsection