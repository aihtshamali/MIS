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
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
                                                      'subcitytypes'=>$subcitytypes,'projects'=>$projects]);
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
        // print_r($request->all()) ;exit();
         
        
        if($request->triptype_id=='1')
        {
                $tripRequest = new PlantripTriprequest();
                $tripRequest->user_id=Auth::id();
                $tripRequest->plantrip_triptype_id=$request->triptype_id;
                $tripRequest->status='1';
                $tripRequest->approval_status='Pending';
                $tripRequest->save();
                
                $i; $number=1;
                $tripRequest_purpose= new PlantripPurpose();
                $tripRequest_purpose->plantrip_triprequest_id=$tripRequest->id;
                $tripRequest_purpose->plantrip_visitreason_id=$request->visit_reasonForLocal;
                $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeforLocal;
                $tripRequest_purpose->save();
        

                $tripRequest_visitpurpose= new PlantripVisitedproject();
                // if(isset($_POST['project_nameForLocal_'.$number]))  
                $tripRequest_visitpurpose->assigned_project_id=$request->project_nameForLocal;
                $tripRequest_visitpurpose->plantrip_purpose_id=$tripRequest_purpose->id;
                $tripRequest_visitpurpose->description=$request->local_description;
                $tripRequest_visitpurpose->save();


                $tripRequest_location= new PlantripTriplocation();
                $tripRequest_location->plantrip_purpose_id=$tripRequest_purpose->id;
                $tripRequest_location->plantrip_city_to=$request->local_loc;
                $tripRequest_location->to_Date=$request->local_date;
                $tripRequest_location->time_to_Departure=$request->expectd_TimeForlocal;
                
                $tripRequest_location->save();

                foreach($request->local_members as $eachMember)
                {    
                    $tripRequest_members = new PlantripMember();
                    $tripRequest_members->user_id=$eachMember;
                    $tripRequest_members->plantrip_triplocation_id=$tripRequest_location->id;
                    // dd($tripRequest_members);
                    $tripRequest_members->save();

                }      
        }
        else if($request->triptype_id=='2')
         {
            //  dd($dateFrom);
            $tripRequest = new PlantripTriprequest();
            $tripRequest->user_id=Auth::id();
            $tripRequest->plantrip_triptype_id=$request->triptype_id;
            $tripRequest->status='1';
            $tripRequest->approval_status='Pending';
            $tripRequest->save();
            
            $i; $number=1; $j=1;
            $tripRequest_purpose= new PlantripPurpose();
            $tripRequest_purpose->plantrip_triprequest_id=$tripRequest->id;
            $tripRequest_purpose->plantrip_visitreason_id=$request->outstationVisitReason;
            $tripRequest_purpose->plantrip_subcitytype_id=$request->subcity;
            $tripRequest_purpose->plantrip_purposetype_id=$request->purposetypeForOutstation;
            $tripRequest_purpose->save();
    

            $tripRequest_visitpurpose= new PlantripVisitedproject();
            $tripRequest_visitpurpose->assigned_project_id=$request->project_nameForOutstation;
            $tripRequest_visitpurpose->plantrip_purpose_id=$tripRequest_purpose->id;
            $tripRequest_visitpurpose->description=$request->outstation_description;
            $tripRequest_visitpurpose->save();

            for($j=1 ; $j<=$request->counterForCity; $j++ )
                {
                    if(isset($_POST['outstation_Fromloc_'.$j]))
                    {
                        $daterange=$_POST['daterange_'.$j];
                        $dates=explode(' - ', $daterange);
                        $dateFrom=$dates[0];
                        $dateTo=$dates[1];
                        $tripRequest_location= new PlantripTriplocation();
                        $tripRequest_location->plantrip_purpose_id=$tripRequest_purpose->id;
                        if(isset($_POST['outstation_Fromloc_'.$j]))
                        $tripRequest_location->plantrip_city_from=$_POST['outstation_Fromloc_'.$j];                        
                        if(isset($_POST['outstation_Toloc_'.$j]))                        
                        $tripRequest_location->plantrip_city_to=$_POST['outstation_Toloc_'.$j];
                            
                        $tripRequest_location->from_Date=$dateFrom;                        
                        $tripRequest_location->to_Date=$dateTo;
                        if(isset($_POST['expectd_TimeForOutstation_'.$j]))
                        $tripRequest_location->time_to_Departure=$_POST['expectd_TimeForOutstation_'.$j];
                        
                        $tripRequest_location->save();

                        if(isset($_POST['outstation_members_'.$j]))
                        {   
                            foreach($_POST['outstation_members_'.$j] as $eachMember)
                            {    
                                $tripRequest_members = new PlantripMember();
                                $tripRequest_members->user_id=$eachMember;
                                $tripRequest_members->plantrip_triplocation_id=$tripRequest_location->id;
                                // dd($tripRequest_members);
                                $tripRequest_members->save();

                            }
                        }
                        
                }
                // $number++;                       
            } 


    
        return redirect()->back()->with('success','Request Has Been Sent To Transport Officer!!');
    }
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
