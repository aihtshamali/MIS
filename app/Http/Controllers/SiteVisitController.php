<?php

namespace App\Http\Controllers;
use Auth;
use App\site_visit;
use App\PlantripTriptype;
use App\PlantripTriptypeLog;
use App\PlantripCity;
use App\PlantripMember;
use App\PlantripMemberLog;
use App\PlantripPurpose;
use App\PlantripPurposeLog;
use App\PlantripPurposetype;
use App\PlantripSubcitytype;
use App\PlantripTriplocation;
use App\PlantripTriplocationLog;
use App\PlantripTriprequest;
use App\PlantripTriprequestLog;
use App\Project;
use App\PlantripVisitedproject;
use App\PlantripVisitedprojectLog;
use App\PlantripVisitreason;
use App\AssignedProject;
use App\PlantripRequestedcity;
use App\PlantripRequestedcityLog;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateInterval;
use DatePeriod;
use App\VmisVehicle;
use App\VmisDriver;
use App\PlantripRemark;
use App\VmisRequestToTransportOfficer;
use App\VmisRequestToTransportOfficersLog;
use App\PlantripDriverRating;
class SiteVisitController extends Controller
{
  
    public function visitCompleted(Request $request)
    {

        // dd($request);
        $triprequestlog = PlantripTriprequestLog::where('plantrip_triprequest_id',$request->triprequest_id)->latest()->first();
        $triprequestlog->completed = true;
        $triprequestlog->save();

        $triprequest = PlantripTriprequest::where('id',$request->triprequest_id)->first();
        $triprequest->completed = true;
        $triprequest->save();

        $assignedDriverRating = new PlantripDriverRating();
        $assignedDriverRating->plantrip_triprequest_id=$request->triprequest_id;
        $assignedDriverRating->vmis_driver_id=$request->assigned_driver_id;
        $assignedDriverRating->rating=$request->gRating_validation_input_for_driverRating;
        $assignedDriverRating->save();

        $assignedDriver = VmisDriver::where('id',$request->assigned_driver_id)->first();
        $assignedDriver->rating=$assignedDriverRating->rating;
        $assignedDriver->save();

        // dd($assignedDriver);
        return redirect()->back()->with('success','Visit Completed!!');

    }

    public function create()
    {
        $triptypes=PlantripTriptype::all();

        $visitreasons=PlantripVisitreason::all();

        $purposetypes=PlantripPurposetype::all();

        $subcitytypes=PlantripSubcitytype::all();

        $cities= PlantripCity::all();
        $citylahore= PlantripCity::where('name','LAHORE CITY')->first();

        $projects=AssignedProject::select('assigned_project_teams.*','assigned_projects.*')
        ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
        ->where('user_id',Auth::id())
        ->get();

        $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
        ->leftJoin('user_details','user_details.user_id','users.id')
        ->leftJoin('role_user','role_user.user_id','users.id')
        ->leftJoin('roles','roles.id','role_user.role_id')
        ->orderBy('roles.name','ASC')
        ->where('roles.name','officer')
        ->get();
        return view('Site_Visit.Plan_A_Trip.new_trip',['cities'=>$cities,'officers'=>$officers,'triptypes'=>$triptypes,
                                                      'visitreasons'=>$visitreasons,'purposetypes'=>$purposetypes,
                                                      'subcitytypes'=>$subcitytypes,'projects'=>$projects,'citylahore'=>$citylahore ,'check'=>'1']);
    }
    public function index()
    {
        // $triprequests = PlantripTriprequest::where('status',0)
        // ->where('approval_status','Pending')
        // ->orWhere('approval_status','Approved')
        // ->orWhere('approval_status','Not Approved')
        // ->get();

        $triprequests=PlantripTriprequest::select('plantrip_triprequests.*')
        ->leftjoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
        ->leftjoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
        ->where('plantrip_members.user_id',Auth::id())
        ->distinct()
        ->get();
          $tripcounts=$triprequests->count();
        //   dd($triprequests);
        // dd($triprequests[0]->approval_status);
        return view('Site_Visit.Plan_A_Trip.view_trips',['triprequests'=>$triprequests,'tripcounts'=>$tripcounts,'check'=>'1']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function visitRequestDescision(Request $request)
    {
        // dd($request);
        if($request->request_descision=='2')
        {
        //   $triprequest = PlantripTriprequest::where('id',$request->triprequest_id)->first(); 
        //   $triprequest->approval_status='Approved';
        //   $triprequest->save();

        $triprequestToTransportofficerLog = VmisRequestToTransportOfficersLog::where('plantrip_triprequest_id',$request->triprequest_id)->first();
        $triprequestToTransportofficerLog->recommendedby_user_id=Auth::id();
        $triprequestToTransportofficerLog->approval_status='2';
        $triprequestToTransportofficerLog->recommended='Recommended';
        $triprequestToTransportofficerLog->save();

          $triprequestToTransportofficer = VmisRequestToTransportOfficer::where('plantrip_triprequest_id',$request->triprequest_id)->first();
          $triprequestToTransportofficer->recommendedby_user_id=Auth::id();
          $triprequestToTransportofficer->approval_status='2';
          $triprequestToTransportofficer->recommended='Recommended';
          $triprequestToTransportofficer->save();

          if(isset($request->remarks) && $request->remarks!=null)
          {

            $tripremarks = new PlantripRemark();
            $tripremarks->plantrip_triprequest_id=$request->triprequest_id;
            $tripremarks->remarksby_user_id=Auth::id();
            $tripremarks->remarks=$request->remarks;
            $tripremarks->save();

          }
<<<<<<< HEAD
          return redirect()->route('monitoring_dashboard')->with('success','Request Recommended!!');
          
        }
        elseif($request->request_descision=='3')
        {
            // $triprequest = PlantripTriprequest::where('id',$request->triprequest_id)->first(); 
            // $triprequest->approval_status='Not Approved';
            // $triprequest->save();
            $triprequestToTransportofficerLog = VmisRequestToTransportOfficersLog::where('plantrip_triprequest_id',$request->triprequest_id)->first();
            $triprequestToTransportofficerLog->recommendedby_user_id=Auth::id();
            $triprequestToTransportofficerLog->approval_status='3';
            $triprequestToTransportofficerLog->recommended='Not Recommended';
            $triprequestToTransportofficerLog->save();

            $triprequestToTransportofficer = VmisRequestToTransportOfficer::where('plantrip_triprequest_id',$request->triprequest_id)->first();
            $triprequestToTransportofficer->recommendedby_user_id=Auth::id();
            $triprequestToTransportofficer->approval_status='3';
            $triprequestToTransportofficer->recommended='Not Recommended';
            $triprequestToTransportofficer->save();
  
            if(isset($request->remarks) && $request->remarks!=null)
            {
              
              $tripremarks = new PlantripRemark();
              $tripremarks->plantrip_triprequest_id=$request->triprequest_id;
              $tripremarks->remarksby_user_id=Auth::id();
              $tripremarks->remarks=$request->remarks;
              $tripremarks->save();
                
            }
            return redirect()->route('monitoring_dashboard')->with('error','Request Not Recommended!!');
        }
        elseif($request->request_descision=='4')
        {
            $triprequestLog = PlantripTriprequestLog::where('plantrip_triprequest_id',$request->triprequest_id)->first(); 
            $triprequestLog->approval_status='Approved';
            $triprequestLog->save();

            $triprequest = PlantripTriprequest::where('id',$request->triprequest_id)->first(); 
            $triprequest->approval_status='Approved';
            $triprequest->save();

            $triprequestToTransportofficerLog = VmisRequestToTransportOfficersLog::where('plantrip_triprequest_id',$request->triprequest_id)->first();
            $triprequestToTransportofficerLog->approvedby_user_id=Auth::id();
            $triprequestToTransportofficerLog->approval_status='4';
            $triprequestToTransportofficerLog->save();

            $triprequestToTransportofficer = VmisRequestToTransportOfficer::where('plantrip_triprequest_id',$request->triprequest_id)->first();
            $triprequestToTransportofficer->approvedby_user_id=Auth::id();
            $triprequestToTransportofficer->approval_status='4';
            $triprequestToTransportofficer->save();
         
          if(isset($request->remarks) && $request->remarks!=null)
          {
            
            $tripremarks = new PlantripRemark();
            $tripremarks->plantrip_triprequest_id=$request->triprequest_id;
            $tripremarks->remarksby_user_id=Auth::id();
            $tripremarks->remarks=$request->remarks;
            $tripremarks->save();
              
          }
          return redirect()->route('monitoring_dashboard')->with('success','Request Accepted!!');
          
        }
        elseif($request->request_descision=='5')
        {
            $triprequestLog = PlantripTriprequestLog::where('plantrip_triprequest_id',$request->triprequest_id)->first(); 
            $triprequestLog->approval_status='Not Approved';
            $triprequestLog->save();

            $triprequest = PlantripTriprequest::where('id',$request->triprequest_id)->first(); 
            $triprequest->approval_status='Not Approved';
            $triprequest->save();
            
            $triprequestToTransportofficerLog = VmisRequestToTransportOfficersLog::where('plantrip_triprequest_id',$request->triprequest_id)->first();
            $triprequestToTransportofficerLog->approvedby_user_id=Auth::id();
            $triprequestToTransportofficerLog->approval_status='5';
            $triprequestToTransportofficerLog->save();
            
=======
          return redirect()->route('monitoring_dashboard')->with('success','Request Accepted!!');

        }
        elseif($request->request_descision=='3')
        {
            $triprequest = PlantripTriprequest::where('id',$request->triprequest_id)->first();
            $triprequest->approval_status='Not Approved';
            $triprequest->save();

>>>>>>> 3e19d06831d6d0ceea02c424db744149c3cb209b
            $triprequestToTransportofficer = VmisRequestToTransportOfficer::where('plantrip_triprequest_id',$request->triprequest_id)->first();
            $triprequestToTransportofficer->approvedby_user_id=Auth::id();
            $triprequestToTransportofficer->approval_status='5';
            $triprequestToTransportofficer->save();

            if(isset($request->remarks) && $request->remarks!=null)
            {

              $tripremarks = new PlantripRemark();
              $tripremarks->plantrip_triprequest_id=$request->triprequest_id;
              $tripremarks->remarksby_user_id=Auth::id();
              $tripremarks->remarks=$request->remarks;
              $tripremarks->save();

            }
            return redirect()->route('monitoring_dashboard')->with('error','Request Rejected!!');
        }

    }

    public function storeLog(Request $request,$id)
    {


             $tripRequest = new PlantripTriprequestLog();
                $tripRequest->plantrip_triptype_id=$request->triptype_id;
                $tripRequest->editedby_user_id=Auth::id();
                $tripRequest->plantrip_triprequest_id=$id;
                $tripRequest->status='1';
                $tripRequest->approval_status='Pending';

                $tripRequest->save();

                $tripRequest_id=$tripRequest->id;

                if($request->citytype=='2')
                {
                    if(isset($request->outstation_multicitylocationto))
                    $citycount=count($request->outstation_multicitylocationto);
                    for($number=0 ;$number<$citycount; $number++)
                    {
                    $tripRequestedCities= new PlantripRequestedcityLog();
                    $tripRequestedCities->plantrip_triprequest_log_id=$tripRequest_id;
                    $tripRequestedCities->requestedCity_id=$request->outstation_multicitylocationto[$number];
                    $tripRequestedCities->save();
                    }
                }

            if($request->triptype_id=='1')
            {
                $tripRequest=PlantripTriprequestLog::find($tripRequest_id);
                if(isset($request->local_date) && $request->local_date!=null)
                $tripRequest->fullDateoftrip=$request->local_date;
                $tripRequest->save();

                $tripRequestedCities= new PlantripRequestedcityLog();
                $tripRequestedCities->plantrip_triprequest_log_id=$tripRequest_id;
                $tripRequestedCities->requestedCity_id=$request->local_location;
                $tripRequestedCities->save();

                $i; $number=1;
                for($i=0 ; $i<$request->purposecount; $i++ )
                   {
                    $tripRequest_purpose= new PlantripPurposeLog();
                    $tripRequest_purpose->plantrip_triprequest_log_id=$tripRequest_id;
                    $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeid;
                    $tripRequest_purpose->plantrip_visitreason_id=$request->LocalVisitReason[$i];
                    $tripRequest_purpose->save();


                    $tripRequest_visitpurpose= new PlantripVisitedprojectLog();
                    if(isset($request->projectnameForLocal[$i]) && $request->projectnameForLocal[$i]!=null)
                    $tripRequest_visitpurpose->assigned_project_id=$request->projectnameForLocal[$i];
                    $tripRequest_visitpurpose->plantrip_purpose_log_id=$tripRequest_purpose->id;
                    if(isset($request->local_description[$i]) && $request->local_description[$i]!=null)
                    $tripRequest_visitpurpose->description=$request->local_description[$i];
                    $tripRequest_visitpurpose->save();


                    $tripRequest_location= new PlantripTriplocationLog();
                    $tripRequest_location->plantrip_purpose_log_id=$tripRequest_purpose->id;
                    $tripRequest_location->plantrip_city_to=$request->local_location;
                    $tripRequest_location->to_Date=$request->local_date;
                    if(isset($request->departureTimeforlocal[$i]) && $request->departureTimeforlocal[$i]!=null )
                    $tripRequest_location->time_to_Departure=$request->departureTimeforlocal[$i];
                    $tripRequest_location->save();
                    //  dd($_POST['local_members_'.$i]);
                     // Requested By Entry
                     $tripRequest_members = new PlantripMemberLog();
                     $tripRequest_members->user_id=Auth::id();
                     $tripRequest_members->requested_by=true;
                     $tripRequest_members->plantrip_purpose_log_id=$tripRequest_purpose->id;
                     $tripRequest_members->save();
                     if(isset($_POST['local_members_'.$i]) && $_POST['local_members_'.$i]!=null)
                      {
                          foreach($_POST['local_members_'.$i] as $eachMember)
                        {
                            $tripRequest_members = new PlantripMemberLog();
                            $tripRequest_members->user_id=$eachMember;
                            $tripRequest_members->plantrip_purpose_log_id=$tripRequest_purpose->id;
                            $tripRequest_members->save();

                        }
                    }
                }
            }

            else if($request->triptype_id=='2')
            {


                $i; $number=1;
                for($i=0 ; $i<$request->purposecount; $i++ )
                   {
                        // $daterange=$_POST['daterange_'.$j];
                        // $dates=explode(' - ', $daterange);
                        // $dateFrom=$dates[0];
                        // $dateTo=$dates[1];
                        if($request->citytype=='1')
                        {
                            $tripRequest=PlantripTriprequestLog::where('id',$tripRequest_id)->first();

                            if(isset($request->daterange[$i]) && $request->daterange[$i]!=null)
                            $tripRequest->fullDateoftrip=$request->daterange;
                            $tripRequest->save();

                            $tripRequestedCities= new PlantripRequestedcityLog();
                            $tripRequestedCities->plantrip_triprequest_log_id=$tripRequest_id;
                            $tripRequestedCities->requestedCity_id=$request->outstation_roundtriplocationto;
                            $tripRequestedCities->save();

                            $tripRequest_purpose= new PlantripPurposeLog();
                            $tripRequest_purpose->plantrip_triprequest_log_id=$tripRequest_id;

                            if(isset($request->RoundtripVisitReason[$i]) && $request->RoundtripVisitReason[$i]!=null)
                            $tripRequest_purpose->plantrip_visitreason_id=$request->RoundtripVisitReason[$i];

                            if(isset($request->citytype) && $request->citytype!=null)
                            $tripRequest_purpose->plantrip_subcitytype_id=$request->citytype;

                            if(isset($request->purposetypeidoutstationid) && $request->purposetypeidoutstationid !=null)
                            $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeidoutstationid;
                            $tripRequest_purpose->save();


                            $tripRequest_visitpurpose= new PlantripVisitedprojectLog();

                            if(isset($request->projectnameForRoundtrip[$i]) && $request->projectnameForRoundtrip[$i] !=null)
                            $tripRequest_visitpurpose->assigned_project_id=$request->projectnameForRoundtrip[$i];

                            $tripRequest_visitpurpose->plantrip_purpose_log_id=$tripRequest_purpose->id;

                            if(isset($request->Roundtrip_description[$i]) && $request->Roundtrip_description[$i] !=null)
                            $tripRequest_visitpurpose->description=$request->Roundtrip_description[$i];
                            $tripRequest_visitpurpose->save();



                            $tripRequest_location= new PlantripTriplocationLog();
                            $tripRequest_location->plantrip_purpose_log_id=$tripRequest_purpose->id;

                            $tripRequest_location->plantrip_city_from=$request->outstation_roundtriplocationfrom;

                            if(isset($request->outstation_roundtriplocationto) && $request->outstation_roundtriplocationto !=null)
                            $tripRequest_location->plantrip_city_to=$request->outstation_roundtriplocationto;

                            if(isset($request->selectedSDateroundtrip[$i]) && $request->selectedSDateroundtrip[$i] !=null)
                            $tripRequest_location->from_Date=$request->selectedSDateroundtrip[$i];

                            if(isset($request->selectedEDateroundtrip[$i]) && $request->selectedEDateroundtrip[$i] !=null)
                            $tripRequest_location->to_Date=$request->selectedEDateroundtrip[$i];

                            if(isset($request->departureTimeforRoundtrip[$i]) && $request->departureTimeforRoundtrip[$i] !=null)
                            $tripRequest_location->time_to_Departure=$request->departureTimeforRoundtrip[$i];
                            $tripRequest_location->save();
                            // Requested By Entry
                            $tripRequest_members = new PlantripMemberLog();
                            $tripRequest_members->user_id=Auth::id();
                            $tripRequest_members->requested_by=true;
                            $tripRequest_members->plantrip_purpose_log_id=$tripRequest_purpose->id;
                            $tripRequest_members->save();

                            if(isset($_POST['roundtrip_members_'.$i]) && $_POST['roundtrip_members_'.$i]!=null)
                            {
                                foreach($_POST['roundtrip_members_'.$i] as $eachMember)
                                    {
                                        $tripRequest_members = new PlantripMemberLog();
                                        $tripRequest_members->user_id=$eachMember;
                                        $tripRequest_members->plantrip_purpose_log_id=$tripRequest_purpose->id;
                                        $tripRequest_members->save();

                                    }
                            }
                        }
                        elseif($request->citytype=='2')
                        {


                            $tripRequest=PlantripTriprequestLog::where('id',$tripRequest_id)->first();

                            if(isset($request->outstation_multicitydate[$i]) && $request->outstation_multicitydate[$i]!=null)
                            $tripRequest->fullDateoftrip=$request->outstation_multicitydate;
                            $tripRequest->save();

                            foreach($request->multicity_location as $multicity_location)
                            {
                             $tripRequestedCities= new PlantripRequestedcityLog();
                             $tripRequestedCities->plantrip_triprequest_log_id=$tripRequest_id;
                             $tripRequestedCities->requestedCity_id=$request->$multicity_location;
                             $tripRequestedCities->save();
                            }


                            $tripRequest_purpose= new PlantripPurposeLog();
                            $tripRequest_purpose->plantrip_triprequest_log_id=$tripRequest_id;

                            if(isset($request->multicityVisitReason[$i]) && $request->multicityVisitReason[$i]!=null)
                            $tripRequest_purpose->plantrip_visitreason_id=$request->multicityVisitReason[$i];

                            if(isset($request->citytype) && $request->citytype!=null)
                            $tripRequest_purpose->plantrip_subcitytype_id=$request->citytype;

                            $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeidoutstationid;
                            $tripRequest_purpose->save();


                            $tripRequest_visitpurpose= new PlantripVisitedprojectLog();
                            if(isset($request->projectnameFormulticity[$i]) && $request->projectnameFormulticity[$i]!=null)
                            $tripRequest_visitpurpose->assigned_project_id=$request->projectnameFormulticity[$i];

                            $tripRequest_visitpurpose->plantrip_purpose_log_id=$tripRequest_purpose->id;
                            if(isset($request->multicity_description[$i]) && $request->multicity_description[$i]!=null)
                            $tripRequest_visitpurpose->description=$request->multicity_description[$i];
                            $tripRequest_visitpurpose->save();



                            $tripRequest_location= new PlantripTriplocationLog();
                            $tripRequest_location->plantrip_purpose_log_id=$tripRequest_purpose->id;

                            if(isset($request->outstation_multicitylocationfrom) && $request->outstation_multicitylocationfrom!=null)
                                {
                                    if($i==0)
                                    {
                                        $tripRequest_location->plantrip_city_from=$request->outstation_multicitylocationfrom;

                                    }
                                    else
                                    {
                                        if(isset($request->multicity_location[$i-1]) && $request->multicity_location[$i-1]!=null)
                                        $tripRequest_location->plantrip_city_from=$request->multicity_location[$i-1];
                                    }
                                }

                            if(isset($request->multicity_location[$i]) && $request->multicity_location[$i]!=null)
                            $tripRequest_location->plantrip_city_to=$request->multicity_location[$i];

                            if(isset($request->selectedSDatemulticity[$i]) && $request->selectedSDatemulticity[$i]!=null)
                            $tripRequest_location->from_Date=$request->selectedSDatemulticity[$i];

                            if(isset($request->selectedEDatemulticity[$i]) && $request->selectedEDatemulticity[$i]!=null)
                            $tripRequest_location->to_Date=$request->selectedEDatemulticity[$i];

                            if(isset($request->departureTimeformulticity[$i]) && $request->departureTimeformulticity[$i]!=null)
                            $tripRequest_location->time_to_Departure=$request->departureTimeformulticity[$i];

                            $tripRequest_location->save();
                             // Requested By Entry
                             $tripRequest_members = new PlantripMemberLog();
                             $tripRequest_members->user_id=Auth::id();
                             $tripRequest_members->requested_by=true;
                             $tripRequest_members->plantrip_purpose_log_id=$tripRequest_purpose->id;
                             $tripRequest_members->save();

                            if(isset($_POST['multicity_members_'.$i]) && $_POST['multicity_members_'.$i]!=null)
                            {
                                foreach($_POST['multicity_members_'.$i] as $eachMember)
                                    {
                                        $tripRequest_members = new PlantripMemberLog();
                                        $tripRequest_members->user_id=$eachMember;
                                        $tripRequest_members->plantrip_purpose_log_id=$tripRequest_purpose->id;
                                        $tripRequest_members->save();

                                    }
                            }
                        }
                    }
            }
    }

    public function store(Request $request)
<<<<<<< HEAD
    { 
        // dd($request);
=======
    {
>>>>>>> 3e19d06831d6d0ceea02c424db744149c3cb209b
                 $tripRequest = new PlantripTriprequest();

                $tripRequest->plantrip_triptype_id=$request->triptype_id;
                $tripRequest->status='1';
                $tripRequest->approval_status='Pending';
                $tripRequest->save();
                $tripRequest_id=$tripRequest->id;

                    //               storing logs
                   $this->storeLog($request, $tripRequest_id);



                if($request->citytype=='2')
                {
                    if(isset($request->outstation_multicitylocationto))
                    $citycount=count($request->outstation_multicitylocationto);
                    for($number=0 ;$number<$citycount; $number++)
                    {

                        $tripRequestedCities= new PlantripRequestedcity();
                        $tripRequestedCities->plantrip_triprequest_id=$tripRequest_id;
                        $tripRequestedCities->requestedCity_id=$request->outstation_multicitylocationto[$number];
                        $tripRequestedCities->save();
                    }
                }

            if($request->triptype_id=='1')
            {
                $tripRequest=PlantripTriprequest::where('id',$tripRequest_id)->first();
                if(isset($request->local_date) && $request->local_date!=null)
                $tripRequest->fullDateoftrip=$request->local_date;
                $tripRequest->save();

                $tripRequestedCities= new PlantripRequestedcity();
                $tripRequestedCities->plantrip_triprequest_id=$tripRequest_id;
                $tripRequestedCities->requestedCity_id=$request->local_location;
                $tripRequestedCities->save();

                $i; $number=1;
                for($i=0 ; $i<$request->purposecount; $i++ )
                   {
                    $tripRequest_purpose= new PlantripPurpose();
                    $tripRequest_purpose->plantrip_triprequest_id=$tripRequest_id;
                    $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeid;
                    $tripRequest_purpose->plantrip_visitreason_id=$request->LocalVisitReason[$i];
                    $tripRequest_purpose->save();


                    $tripRequest_visitpurpose= new PlantripVisitedproject();
                    if(isset($request->projectnameForLocal[$i]) && $request->projectnameForLocal[$i]!=null)
                    $tripRequest_visitpurpose->assigned_project_id=$request->projectnameForLocal[$i];
                    $tripRequest_visitpurpose->plantrip_purpose_id=$tripRequest_purpose->id;
                    if(isset($request->local_description[$i]) && $request->local_description[$i]!=null)
                    $tripRequest_visitpurpose->description=$request->local_description[$i];
                    $tripRequest_visitpurpose->save();


                    $tripRequest_location= new PlantripTriplocation();
                    $tripRequest_location->plantrip_purpose_id=$tripRequest_purpose->id;
                    $tripRequest_location->plantrip_city_to=$request->local_location;
                    $tripRequest_location->to_Date=$request->local_date;
                    if(isset($request->departureTimeforlocal[$i]) && $request->departureTimeforlocal[$i]!=null )
                    $tripRequest_location->time_to_Departure=$request->departureTimeforlocal[$i];
                    $tripRequest_location->save();
                    //  dd($_POST['local_members_'.$i]);
                     // Requested By Entry
                     $tripRequest_members = new PlantripMember();
                     $tripRequest_members->user_id=Auth::id();
                     $tripRequest_members->requested_by=true;
                     $tripRequest_members->plantrip_purpose_id=$tripRequest_purpose->id;
                     $tripRequest_members->save();
                     if(isset($_POST['local_members_'.$i]) && $_POST['local_members_'.$i]!=null)
                      {
                          foreach($_POST['local_members_'.$i] as $eachMember)
                        {
                            $tripRequest_members = new PlantripMember();
                            $tripRequest_members->user_id=$eachMember;
                            $tripRequest_members->plantrip_purpose_id=$tripRequest_purpose->id;
                            $tripRequest_members->save();

                        }
                    }
                }
            }

            else if($request->triptype_id=='2')
            {

                $i; $number=1;
                for($i=0 ; $i<$request->purposecount; $i++ )
                   {
                        // $daterange=$_POST['daterange_'.$j];
                        // $dates=explode(' - ', $daterange);
                        // $dateFrom=$dates[0];
                        // $dateTo=$dates[1];
                        if($request->citytype=='1')
                        {
                            $tripRequest=PlantripTriprequest::where('id',$tripRequest_id)->first();

                            if(isset($request->daterange[$i]) && $request->daterange[$i]!=null)
                            $tripRequest->fullDateoftrip=$request->daterange;
                            $tripRequest->save();

                            $tripRequestedCities= new PlantripRequestedcity();
                            $tripRequestedCities->plantrip_triprequest_id=$tripRequest_id;
                            $tripRequestedCities->requestedCity_id=$request->outstation_roundtriplocationto;
                            $tripRequestedCities->save();

                            $tripRequest_purpose= new PlantripPurpose();
                            $tripRequest_purpose->plantrip_triprequest_id=$tripRequest_id;

                            if(isset($request->RoundtripVisitReason[$i]) && $request->RoundtripVisitReason[$i]!=null)
                            $tripRequest_purpose->plantrip_visitreason_id=$request->RoundtripVisitReason[$i];

                            if(isset($request->citytype) && $request->citytype!=null)
                            $tripRequest_purpose->plantrip_subcitytype_id=$request->citytype;

                            if(isset($request->purposetypeidoutstationid) && $request->purposetypeidoutstationid !=null)
                            $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeidoutstationid;
                            $tripRequest_purpose->save();


                            $tripRequest_visitpurpose= new PlantripVisitedproject();

                            if(isset($request->projectnameForRoundtrip[$i]) && $request->projectnameForRoundtrip[$i] !=null)
                            $tripRequest_visitpurpose->assigned_project_id=$request->projectnameForRoundtrip[$i];

                            $tripRequest_visitpurpose->plantrip_purpose_id=$tripRequest_purpose->id;

                            if(isset($request->Roundtrip_description[$i]) && $request->Roundtrip_description[$i] !=null)
                            $tripRequest_visitpurpose->description=$request->Roundtrip_description[$i];
                            $tripRequest_visitpurpose->save();



                            $tripRequest_location= new PlantripTriplocation();
                            $tripRequest_location->plantrip_purpose_id=$tripRequest_purpose->id;

                            $tripRequest_location->plantrip_city_from=$request->outstation_roundtriplocationfrom;

                            if(isset($request->outstation_roundtriplocationto) && $request->outstation_roundtriplocationto !=null)
                            $tripRequest_location->plantrip_city_to=$request->outstation_roundtriplocationto;

                            if(isset($request->selectedSDateroundtrip[$i]) && $request->selectedSDateroundtrip[$i] !=null)
                            $tripRequest_location->from_Date=$request->selectedSDateroundtrip[$i];

                            if(isset($request->selectedEDateroundtrip[$i]) && $request->selectedEDateroundtrip[$i] !=null)
                            $tripRequest_location->to_Date=$request->selectedEDateroundtrip[$i];

                            if(isset($request->departureTimeforRoundtrip[$i]) && $request->departureTimeforRoundtrip[$i] !=null)
                            $tripRequest_location->time_to_Departure=$request->departureTimeforRoundtrip[$i];
                            $tripRequest_location->save();
                            // Requested By Entry
                            $tripRequest_members = new PlantripMember();
                            $tripRequest_members->user_id=Auth::id();
                            $tripRequest_members->requested_by=true;
                            $tripRequest_members->plantrip_purpose_id=$tripRequest_purpose->id;
                            $tripRequest_members->save();

                            if(isset($_POST['roundtrip_members_'.$i]) && $_POST['roundtrip_members_'.$i]!=null)
                            {
                                foreach($_POST['roundtrip_members_'.$i] as $eachMember)
                                    {
                                        $tripRequest_members = new PlantripMember();
                                        $tripRequest_members->user_id=$eachMember;
                                        $tripRequest_members->plantrip_purpose_id=$tripRequest_purpose->id;
                                        $tripRequest_members->save();

                                    }
                            }
                        }
                        elseif($request->citytype=='2')
                        {

                            $tripRequest=PlantripTriprequest::where('id',$tripRequest_id)->first();

                            if(isset($request->outstation_multicitydate[$i]) && $request->outstation_multicitydate[$i]!=null)
                            $tripRequest->fullDateoftrip=$request->outstation_multicitydate;
                            $tripRequest->save();

                            $tripRequest_purpose= new PlantripPurpose();
                            $tripRequest_purpose->plantrip_triprequest_id=$tripRequest_id;

                            if(isset($request->multicityVisitReason[$i]) && $request->multicityVisitReason[$i]!=null)
                            $tripRequest_purpose->plantrip_visitreason_id=$request->multicityVisitReason[$i];

                            if(isset($request->citytype) && $request->citytype!=null)
                            $tripRequest_purpose->plantrip_subcitytype_id=$request->citytype;

                            $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeidoutstationid;
                            $tripRequest_purpose->save();


                            $tripRequest_visitpurpose= new PlantripVisitedproject();
                            if(isset($request->projectnameFormulticity[$i]) && $request->projectnameFormulticity[$i]!=null)
                            $tripRequest_visitpurpose->assigned_project_id=$request->projectnameFormulticity[$i];

                            $tripRequest_visitpurpose->plantrip_purpose_id=$tripRequest_purpose->id;
                            if(isset($request->multicity_description[$i]) && $request->multicity_description[$i]!=null)
                            $tripRequest_visitpurpose->description=$request->multicity_description[$i];
                            $tripRequest_visitpurpose->save();



                            $tripRequest_location= new PlantripTriplocation();
                            $tripRequest_location->plantrip_purpose_id=$tripRequest_purpose->id;

                            if(isset($request->outstation_multicitylocationfrom) && $request->outstation_multicitylocationfrom!=null)
                                {
                                    if($i==0)
                                    {
                                        $tripRequest_location->plantrip_city_from=$request->outstation_multicitylocationfrom;

                                    }
                                    else
                                    {
                                        if(isset($request->multicity_location[$i-1]) && $request->multicity_location[$i-1]!=null)
                                        $tripRequest_location->plantrip_city_from=$request->multicity_location[$i-1];
                                    }
                                }

                            if(isset($request->multicity_location[$i]) && $request->multicity_location[$i]!=null)
                            $tripRequest_location->plantrip_city_to=$request->multicity_location[$i];

                            if(isset($request->selectedSDatemulticity[$i]) && $request->selectedSDatemulticity[$i]!=null)
                            $tripRequest_location->from_Date=$request->selectedSDatemulticity[$i];

                            if(isset($request->selectedEDatemulticity[$i]) && $request->selectedEDatemulticity[$i]!=null)
                            $tripRequest_location->to_Date=$request->selectedEDatemulticity[$i];

                            if(isset($request->departureTimeformulticity[$i]) && $request->departureTimeformulticity[$i]!=null)
                            $tripRequest_location->time_to_Departure=$request->departureTimeformulticity[$i];

                            $tripRequest_location->save();
                             // Requested By Entry
                             $tripRequest_members = new PlantripMember();
                             $tripRequest_members->user_id=Auth::id();
                             $tripRequest_members->requested_by=true;
                             $tripRequest_members->plantrip_purpose_id=$tripRequest_purpose->id;
                             $tripRequest_members->save();

                            if(isset($_POST['multicity_members_'.$i]) && $_POST['multicity_members_'.$i]!=null)
                            {
                                foreach($_POST['multicity_members_'.$i] as $eachMember)
                                    {
                                        $tripRequest_members = new PlantripMember();
                                        $tripRequest_members->user_id=$eachMember;
                                        $tripRequest_members->plantrip_purpose_id=$tripRequest_purpose->id;
                                        $tripRequest_members->save();

                                    }
                            }
                        }
                    }
            }

        return redirect()->back()->with('success','Request Has Been Sent To Transport Officer!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function show(site_visit $site_visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $currentvisit=PlantripTriprequest::find($id);
        // dd($currentvisit);
        $triptypes=PlantripTriptype::all();

        $visitreasons=PlantripVisitreason::all();

        $purposetypes=PlantripPurposetype::all();

        $subcitytypes=PlantripSubcitytype::all();

        $cities= PlantripCity::all();
        $citylahore= PlantripCity::where('name','LAHORE CITY')->first();
<<<<<<< HEAD
  
        $projects=AssignedProject::all();
     
     
=======

        $projects=AssignedProject::select('assigned_project_teams.*','assigned_projects.*')
        ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
        ->where('user_id',Auth::id())
        ->get();
>>>>>>> 3e19d06831d6d0ceea02c424db744149c3cb209b

        $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
        ->leftJoin('user_details','user_details.user_id','users.id')
        ->leftJoin('role_user','role_user.user_id','users.id')
        ->leftJoin('roles','roles.id','role_user.role_id')
        ->orderBy('roles.name','ASC')
        ->where('roles.name','officer')
        ->get();
        //  dd($currentvisit->PlantripPurpose[0]->PlantripVisitedproject->AssignedProject->project_id)    ;
        return view('Site_Visit.Plan_A_Trip.edit_visit',['trip'=>$currentvisit,'cities'=>$cities,'officers'=>$officers,'triptypes'=>$triptypes,
                                                      'visitreasons'=>$visitreasons,'purposetypes'=>$purposetypes,
                                                      'subcitytypes'=>$subcitytypes,'projects'=>$projects,'citylahore'=>$citylahore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, site_visit $site_visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(site_visit $site_visit)
    {
        //
    }
}
