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
.pointer{cursor: pointer;}
.mt2{margin-top: 2%;}
.clrornge{color: #fe986c;}
p{text-align: left !important;}
.tab-pane{text-align: left !important;}
.persontagetiQ{color: #fff;font-weight: 900;}
li{text-transform: capitalize;}
.headings{text-transform: capitalize;}
.nav-tabs .nav-item.show .nav-link, .nav-tabs {font-weight: 900;}
.nav-link {display: block;}
/* padding: .5rem 6rem !important; */
.nodisplay{display: none;}
td{white-space: unset !important;}
    .tw-w{min-width: 215px !important;}
    ol{padding: 0px 0px 0px 13px !important;}
/* .scrollbar{background: #F5F5F5;overflow-x: scroll;} */
/* .force-overflow{min-height: 450px;} */
/* #wrapper{text-align: center;margin: auto;}
#style-3::-webkit-scrollbar-track{-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5;}
#style-3::-webkit-scrollbar{width: 6px;background-color: #F5F5F5;}
#style-3::-webkit-scrollbar-thumb{background-color: #000000;} */
.New_Assignments a{color : #FE8A7D !important;}
.Monitoring_Projects{color : #FE8A7D !important;}
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-12">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="feather icon-home bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600 pointer"> <span style="color:black">Welcome</span>
                        @auth
                          {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                        @endauth <span style="color:black;">to Monitoring dashboard.</span>
                    </span>
                    <div class="progress clearfix mt2 clrornge">
                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                    </div>
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
                                                                  <th style="text-align:center;"></th>
                                                                  <th style="text-align:center;"></th>


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
                    @role("monitor|officer|evaluator")
                    <div class="col-md-12 mt2">
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item officerVisitRequests">
                                <a class="nav-link active" data-toggle="tab" href="#officervisitrequests" role="tab" aria-expanded="false">My Visits</a>
                            </li>
                            <li class="nav-item inProgress">
                                <a class="nav-link" data-toggle="tab" href="#!" role="tab" aria-expanded="false">inprogress</a>
                            </li>
                            <li class="nav-item quarterlyComp">
                                <a class="nav-link" data-toggle="tab" href="#!" role="tab" aria-expanded="false">quarterly complete</a>
                            </li>
                            <li class="nav-item finished">
                                <a class="nav-link" data-toggle="tab" href="#!" role="tab" aria-expanded="false">finished</a>
                            </li>
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content tabs card-block ">
                                <div class="tab-pane officervisitrequests active" id="officervisitrequests" role="tabpanel" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    @if($officercount==0)
                                                    <p><h5 style="text-align :center;">No Visit Requests</h5></p>
                                                    @else
                                                    <div class="card">
                                                        <div class="card-block">
                                                                <div class="col-md-12 table-responsive">
                                                                        <table id="#" class="table table-bordered nowrap">
                                                                            <thead>
                                                                            <tr>
                                                                                <th style="text-align:center;">Sr #.</th>

                                                                                <th style="text-align:center;">Pupose Title</th>
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
                                                                                @foreach ($officer as $off)
                                                                                <tr>
                                                                                   <td style="text-align:center;">
                                                                                    @php
                                                                                        echo $i++;
                                                                                    @endphp
                                                                                   </td>

                                                                                <td style="">
                                                                                    <ol>
                                                                                    @foreach ($off->PlantripPurpose as $plantripPurpose)

                                                                                            @if(isset($plantripPurpose->PlantripVisitreason->name) && $plantripPurpose->PlantripVisitreason->name == "Meeting" || $plantripPurpose->PlantripVisitreason->name == "Other")
                                                                                    <li>{{$plantripPurpose->PlantripVisitedproject->description}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li>
                                                                                        @elseif(isset($plantripPurpose->PlantripVisitreason->name) &&  $plantripPurpose->PlantripVisitreason->name=="Monitoring" || $plantripPurpose->PlantripVisitreason->name=="Evaluation")
                                                                                            @if(isset($plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title))
                                                                                    <li>{{$plantripPurpose->PlantripVisitedproject->AssignedProject->Project->title}} - <b>{{$plantripPurpose->PlantripVisitreason->name}}</b></li>
                                                                                            @endif
                                                                                        @endif


                                                                                    @endforeach
                                                                                </ol>
                                                                                    <a href="{{route('visitrequestSummary',$off->id)}}" style="text-decoration: underline;">Read Summary</a>

                                                                            </td>
                                                                                {{-- {{dd($off->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->User->first_name)}} --}}
                                                                                 <td style="text-align:center;"> {{$off->PlantripTriptype->name}}</td>
                                                                                 <td style="text-align:center;">
                                                                                        @if(isset($off->VmisRequestToTransportOfficer->VmisAssignedDriver))
                                                                                        @foreach ($off->VmisRequestToTransportOfficer->VmisAssignedDriver as $assignedDriver)
                                                                                        {{$assignedDriver->VmisDriver->User->first_name}}
                                                                                        {{$assignedDriver->VmisDriver->User->last_name}}
                                                                                        @endforeach
                                                                                        @else
                                                                                        <p>Not Assigned</p>
                                                                                        @endif
                                                                                    </td>
                                                                                        <td style="text-align:center;">
                                                                                            @if(isset($off->VmisRequestToTransportOfficer->VmisAssignedVehicle ))
                                                                                            @forelse ($off->VmisRequestToTransportOfficer->VmisAssignedVehicle as $vehicle)
                                                                                                {{$vehicle->VmisVehicle->name}} ,
                                                                                            @empty
                                                                                                <p>Not Assigned</p>
                                                                                            @endforelse
                                                                                            @endif
                                                                                        </td>
                                                                                <td style="text-align:center;" >
                                                                                        @if($off->approval_status == 'Pending')
                                                                                        @if(isset($off->VmisRequestToTransportOfficer->approval_status) && $triprequest->VmisRequestToTransportOfficer->approval_status=='1')
                                                                                       <label class="badge badge-md badge-primary">Pending At Director End</label>
                                                                                       @else
                                                                                       <label class="badge badge-md badge-primary">Pending At TO End</label>
                                                                                       @endif
                                                                                    @elseif($off->VmisRequestToTransportOfficer->approval_status=='2' && $off->approval_status == 'Approved')
                                                                                <label class="badge badge-md badge-success">Approved by {{$off->VmisRequestToTransportOfficer->User->first_name}} {{$off->VmisRequestToTransportOfficer->User->last_name}} </label>
                                                                                    @if(isset($off->PlantripRemark))
                                                                                        <p><b>Remarks:</b>
                                                                                        @foreach($off->PlantripRemark as $tripR)
                                                                                        {{$tripR->remarks}}
                                                                                        @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                @elseif($off->VmisRequestToTransportOfficer->approval_status=='3' && $off->approval_status == 'Not Approved')
                                                                                <label class="badge badge-md badge-danger">Disapproved By  {{$off->VmisRequestToTransportOfficer->User->first_name}} {{$off->VmisRequestToTransportOfficer->User->last_name}} </label>
                                                                                @if(isset($off->PlantripRemark))
                                                                                <p><b>Remarks:</b>
                                                                                @foreach($off->PlantripRemark as $tripR)
                                                                                {{$tripR->remarks}}
                                                                                @endforeach
                                                                                </p>
                                                                            @endif
                                                                                @endif
                                                                                </td>


                                                                                <td style="text-align:center;" >
                                                                                        @if($off->completed=='1')

                                                                                            <label class="badge badge-md badge-success">Complete</label>
                                                                                            <div class="rating " name="driverRating" value="{{$off->PlantripDriverRating->rating}}" disabled></div>

                                                                                        @elseif($off->completed=='0' && $off->approval_status == 'Approved')
                                                                                        <button type="button" class="btn btn-sm btn-danger" id="clickToComplete" >Click To End Visit</button>
                                                                                          <form action="{{route('visitCompleted',$off->id)}}" class="ratingsystem" method="POST" style="display:none;">
                                                                                                {{ csrf_field() }}
                                                                                                    <input type="hidden" name="triprequest_id" value={{$off->id}}>
                                                                                                    <input type="hidden" name="assigned_driver_id" value={{$off->VmisRequestToTransportOfficer->VmisAssignedDriver[0]->VmisDriver->id}}>
                                                                                                    {{-- <input type="hidden" name="triprequest_id" value={{$off->id}}>                                                                                                           --}}
                                                                                                    <div class="rating " name="driverRating" value="1" required></div>
                                                                                                    <button type="submit" class="btn btn-sm btn-warning" style="padding: 5px !important;">Done</button>
                                                                                            </form>
                                                                                        @elseif($off->completed=='0' && $off->approval_status == 'Pending')
                                                                                            <label class="badge badge-md badge-danger">Incomplete</label>
                                                                                        @elseif($off->completed=='0' && $off->approval_status == 'Not Approved')
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
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                            <div class="tab-pane inProgressDiv " id="home1" role="tabpanel" aria-expanded="false">
                                <div class="card">
                                  <div class="card-block">
                                  <div class="dt-responsive table-responsive">
                                      <table id="simpletable1"
                                             class="table table-striped table-bordered nowrap">
                                          <thead>
                                          <tr>
                                              <th>S#1</th>
                                              <th>id#</th>
                                              <th>GS#</th>
                                              <th>project name</th>
                                              <th>cost</th>
                                              <th>district</th>
                                              <th>duration</th>
                                              <th>progress</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1.</td>
                                                  <td>12</td>
                                                  <td>3</td>
                                                  <td>61</td>
                                                  <td>2011/04/25</td>
                                                  <td>$320,800</td>
                                                  <td>2011/04/25</td>
                                                  <td>
                                                    <div class="progress clearfix mt2 clrornge">
                                                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                                                    </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>15</td>
                                                  <td>4</td>
                                                  <td>63</td>
                                                  <td>2011/07/25</td>
                                                  <td>$170,750</td>
                                                  <td>2011/07/25</td>
                                                  <td>
                                                    <div class="progress clearfix mt2 clrornge">
                                                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                                                    </div>
                                                  </td>
                                              </tr>
                                      </table>
                                  </div>
                                </div>
                              </div>
                              </div>
                              <div class="tab-pane quarterlyCompDiv" id="profile1" role="tabpanel" aria-expanded="false">
                                <div class="card">
                                  <div class="card-block">
                                      <div class="dt-responsive table-responsive">
                                    <table id="simpletable2"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                      <tr>
                                        <th>S#2</th>
                                        <th>id#</th>
                                        <th>GS#</th>
                                        <th>project name</th>
                                        <th>cost</th>
                                        <th>district</th>
                                        <th>duration</th>
                                        <th>next tentative monitoring</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                        <td>____________</td>
                                      </tr>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                        <td>___________</td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            </div>
                              <div class="tab-pane finishedDiv" id="messages1" role="tabpanel" aria-expanded="false">
                              <div class="card">
                                <div class="card-block">
                                  <div class="dt-responsive table-responsive">
                                    <table id="simpletable3"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                      <tr>
                                        <th>S#3</th>
                                        <th>id#</th>
                                        <th>GS#</th>
                                        <th>project name</th>
                                        <th>cost</th>
                                        <th>district</th>
                                        <th>duration</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                      </tr>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            </div>

                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
</div>
@endsection
@section('js_scripts')
  <!-- data-table js -->
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/vfs_fonts.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/pdfmake.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/vfs_fonts.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
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
<script type="text/javascript">
    $('#simpletable1').DataTable();
    $('#simpletable2').DataTable();
    $('#simpletable3').DataTable();


    $(document).ready(function(){
     $(".officerVisitRequests").click(function(){
        $("#officervisitrequests").show();
        $(".inProgressDiv").hide();
        $(".quarterlyCompDiv").hide();
        $(".finishedDiv").hide();

    });
    $(".inProgress").click(function(){
        $(".inProgressDiv").show();
        $(".quarterlyCompDiv").hide();
        $(".finishedDiv").hide();
        $("#officervisitrequests").hide();
    });
    $(".quarterlyComp").click(function(){
        $(".quarterlyCompDiv").show();
        $(".inProgressDiv").hide();
        $(".finishedDiv").hide();
        $("#officervisitrequests").hide();

    });
    $(".finished").click(function(){

        $(".finishedDiv").show();
        $("#officervisitrequests").hide();

        $(".inProgressDiv").hide();
        $(".quarterlyCompDiv").hide();
    });
    });


     $(document).ready(function(){
    $(".visitRequests").click(function(){
        $(".visitrequests").show();
    });
     });

//     $(document).ready(function () {
//           if (!$.browser.webkit) {
//               $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
//           }
//       });
// </script>
@endsection
