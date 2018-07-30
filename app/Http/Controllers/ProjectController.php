<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
use App\ProjectType;
use App\EvaluationType;
use App\Subsector;
use App\ProjectDetail;
use App\SponsoringAgency;
use App\ExecutingAgency;
use App\Department;
use App\AssignedDepartment;
use App\District;
use App\Sector;
use App\AssigningForum;
use App\SubProjectType;
use DB;
use Auth;
use Illuminate\Support\Str;
use App\ProjectRemarks;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects=Project::select('projects.*','assigned_projects.user_id','project_details.attachments')
        ->leftJoin('project_details','project_details.project_id','projects.id')
        ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
        ->orderBy('projects.status')
        ->get();
        // dd(Auth::user()->roles()->get());
        // dd($projects);
        return view('projects.index',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sponosoring_agencies=SponsoringAgency::all();
        $executing_agencies=ExecutingAgency::all();
        $users=User::all();
        return view('projects.create',['users'=>$users,'sponosoring_agencies'=>$sponosoring_agencies,'executing_agencies'=>$executing_agencies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectfor_no=Project::select('projects.proj_no')->latest()->first();
        if($projectfor_no){
        $project_no=explode('-',$projectfor_no);
        // dd($project_no);
        $projectNo=intval($project_no[2])+1;
      }
      else {
        $projectNo = 1;
      }
        $project= new Project();

        $project->title=$request->title;
        $project->project_type_id=$request->project_type;
        $project->proj_no='Project-No-'.$projectNo;
        $project->starting_date=$request->starting_date;
        $project->ending_date=$request->ending_date;
        $project->sponsor_agency_id=$request->sponsor_agency_id;
        $project->executing_agency_id=$request->executing_agency_id;
        $project->planned_start_date=$request->planned_start_date;
        $project->created_by=Auth::id();
        $project->save();
        if($project->id){
        $project_detail=new ProjectDetail();
        $project_detail->project_id = $project->id;
        $project_detail->revenue_cost = $request->revenue_cost;
        $project_detail->capital_cost = $request->capital_cost;
        $project_detail->total_cost = $request->capital_cost+$request->revenue_cost;
        $project_detail->country = $request->country;
        $project_detail->city = $request->city;
        $project_detail->address = $request->address;
        $project_detail->SNE_cost = $request->SNE_cost;
        $project_detail->SNE_staff = $request->SNE_staff;
        $project_detail->SNE_both = $request->SNE_both;
        if($request->hasFile('attachments')){
            $request->file('attachments')->store('public/uploads/projects/');
            $file_name = $request->file('attachments')->hashName();
            $project_detail->attachments=$file_name;
        }

            $project_detail->save();
        }
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $projects=Project::select('projects.*','project_assigned.*','project_details.*')
      ->leftJoin('project_details','project_details.project_id','projects.id')
      ->leftJoin('project_assigned','project_assigned.project_id','projects.id')
      ->where('projects.id',$id)
      ->first();
      $remarks=ProjectRemarks::where('project_id',$id)->orderBy('created_at','DESC')->get();
      // dd($projects);
      return view('projects.show',compact('projects','remarks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   
    
    $project=Project::where('id',$id)->first();
  
    $projectdetails=ProjectDetail::where('project_id',$id)->first();
   
    //dd($projectdetails);
    $districts = District::all();
      $sectors  = Sector::all();
      $sponsoring_departments = SponsoringAgency::all();
      $executing_departments = ExecutingAgency::all();
      $assigning_forums = AssigningForum::all();
      $project_no = Str::random();
      foreach ($sectors as $sector) {
        $sector->name = $sector->name . "/";
      }
      foreach ($sponsoring_departments as $sponsoring_department) {
        $sponsoring_department->name = $sponsoring_department->name . "/";
      }
      foreach ($executing_departments as $executing_department) {
        $executing_department->name = $executing_department->name . "/";
      }
      foreach ($assigning_forums as $assigning_forum) {
        $assigning_forum->name = $assigning_forum->name . "/";
      }
      
     return view('projects.edit',compact('districts','projectdetails','project','sectors','sponsoring_departments','executing_departments','assigning_forums','project_no'));
    //   // return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
