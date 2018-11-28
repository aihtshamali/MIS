<?php

namespace App\Http\Controllers;
use Auth;
use App\site_visit;
use App\PlantripTriptype;
use App\PlantripCity;
use App\PlantripMember;
use App\PlantripPurpose;
use App\PlantripPurposetype;
use App\PlantripSubcitytype;
use App\PlantripTriplocation;
use App\PlantripTriprequest;
use App\Project;
use App\PlantripVisitedproject;
use App\PlantripVisitreason;
use App\AssignedProject;
use App\PlantripRequestedcity;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateInterval;
use DatePeriod;
class SiteVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $triptypes=PlantripTriptype::all();
      
        $visitreasons=PlantripVisitreason::all();
       
        $purposetypes=PlantripPurposetype::all();
     
        $subcitytypes=PlantripSubcitytype::all();
   
        $cities= PlantripCity::all();
        $citylahore= PlantripCity::where('name','LAHORE CITY')->first();
  
        $projects=AssignedProject::where('complete',0)->get();
        $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
        ->leftJoin('user_details','user_details.user_id','users.id')
        ->leftJoin('role_user','role_user.user_id','users.id')
        ->leftJoin('roles','roles.id','role_user.role_id')
        ->orderBy('roles.name','ASC')
        ->where('roles.name','officer')
        ->get();
        return view('Site_Visit.Plan_A_Trip.new_trip',['cities'=>$cities,'officers'=>$officers,'triptypes'=>$triptypes,
                                                      'visitreasons'=>$visitreasons,'purposetypes'=>$purposetypes,
                                                      'subcitytypes'=>$subcitytypes,'projects'=>$projects,'citylahore'=>$citylahore]);
    }
    public function view()
    {
        return view('Site_Visit.Plan_A_Trip.view_trips');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        // dd($request->all());

        $tripRequest = new PlantripTriprequest();
                $tripRequest->user_id=Auth::id();
                $tripRequest->plantrip_triptype_id=$request->triptype_id;
                $tripRequest->status='1';
                $tripRequest->approval_status='Pending';
                $tripRequest->save();
                $tripRequest_id=$tripRequest->id; 

            if($request->triptype_id=='1')
            {   
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
                    
                     if(isset($_POST['local_members_'.$i]) && $_POST['local_members_'.$i]!=null)
                      {  
                          foreach($_POST['local_members_'.$i] as $eachMember)
                        {    
                            $tripRequest_members = new PlantripMember();
                            $tripRequest_members->user_id=$eachMember;
                            $tripRequest_members->plantrip_triplocation_id=$tripRequest_location->id;
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
                            
                            if(isset($_POST['roundtrip_members_'.$i]) && $_POST['roundtrip_members_'.$i]!=null)
                            {  
                                foreach($_POST['roundtrip_members_'.$i] as $eachMember)
                                    {    
                                        $tripRequest_members = new PlantripMember();
                                        $tripRequest_members->user_id=$eachMember;
                                        $tripRequest_members->plantrip_triplocation_id=$tripRequest_location->id;
                                        $tripRequest_members->save();

                                    } 
                            }
                        }
                        elseif($request->citytype=='2')
                        { 
                            if(isset($request->outstation_multicitylocationto))
                             $citycount=count($request->outstation_multicitylocationto);

                            $tripRequest=PlantripTriprequest::where('id',$tripRequest_id)->first();

                            if(isset($request->outstation_multicitydate[$i]) && $request->outstation_multicitydate[$i]!=null)                            
                            $tripRequest->fullDateoftrip=$request->outstation_multicitydate;
                            $tripRequest->save();
                            // $cities='';
                            // for($number=0 ;$number<$citycount; $number++)
                            // {
                            //     $cities+=$request->outstation_multicitylocationto[$number] .'-';
                            // }
                            // $tripRequest->requestedCities=$cities;
                            
                            $tripRequestedCities= new PlantripRequestedcity();
                            for($number=0 ;$number<$citycount; $number++)
                            {
                            $tripRequestedCities->plantrip_triprequest_id=$tripRequest_id;
                            $tripRequestedCities->requestedCity_id=$request->outstation_multicitylocationto[$number];
                            }
                            $tripRequestedCities->save();

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
                            $tripRequest_location->plantrip_city_from=$request->outstation_multicitylocationfrom; 

                            if(isset($request->multicity_location[$i]) && $request->multicity_location[$i]!=null)                            
                            $tripRequest_location->plantrip_city_to=$request->multicity_location[$i];
                            
                            if(isset($request->selectedSDatemulticity[$i]) && $request->selectedSDatemulticity[$i]!=null)                                                            
                            $tripRequest_location->from_Date=$request->selectedSDatemulticity[$i];                        
                            
                            if(isset($request->selectedEDatemulticity[$i]) && $request->selectedEDatemulticity[$i]!=null)                            
                            $tripRequest_location->to_Date=$request->selectedEDatemulticity[$i];
                            
                            if(isset($request->departureTimeformulticity[$i]) && $request->departureTimeformulticity[$i]!=null)                            
                            $tripRequest_location->time_to_Departure=$request->departureTimeformulticity[$i];
                            
                            $tripRequest_location->save();
                            
                            if(isset($_POST['multicity_members_'.$i]) && $_POST['multicity_members_'.$i]!=null)
                            {  
                                foreach($_POST['multicity_members_'.$i] as $eachMember)
                                    {    
                                        $tripRequest_members = new PlantripMember();
                                        $tripRequest_members->user_id=$eachMember;
                                        $tripRequest_members->plantrip_triplocation_id=$tripRequest_location->id;
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
    public function edit(site_visit $site_visit)
    {
        //
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
