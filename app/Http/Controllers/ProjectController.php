<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\ProjectRemark;
use App\ProjectType;
use App\EvaluationType;
use App\SubSector;
use App\Project;
use App\ProjectDetail;
use App\Department;
use App\AssignedDepartment;
use App\District;
use App\Sector;
use App\SponsoringAgency;
use App\AssignedSponsoringAgency;
use App\ExecutingAgency;
use App\AssignedExecutingAgency;
use App\AssigningForum;
use App\SubProjectType;
use App\ApprovingForum;
use App\RevisedApprovedCost;
use App\RevisedEndDate;
use App\AssignedDistrict;
use Illuminate\Support\Str;
use App\User;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();

        $projects=Project::
        // ->leftJoin('project_details','project_details.project_id','projects.id')
        // ->leftJoin('users','users.id','user_id')
        where('user_id',Auth::id())
        ->orderBy('projects.created_at')
        ->get();
        // dd(Auth::user()->roles()->get());
        // dd($projects);
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $project_types = ProjectType::all();
      $evaluation_types = EvaluationType::all();
      $sub_sectors = SubSector::all();
      $projects = Project::all();
      $evaluation_types = EvaluationType::all();
      $districts = District::all();
      $sectors  = Sector::all();
      $sponsoring_departments = SponsoringAgency::all();
      $executing_departments = ExecutingAgency::all();
      $assigning_forums = AssigningForum::all();
      // $project_no = Str::random();
      $current_year = date('Y');
      $approving_forums = ApprovingForum::all();
      $sub_project_types = SubProjectType::all();
      $projectfor_no=Project::select('projects.project_no')->latest()->first();
      if($projectfor_no){
      $projectNo=explode('-',$projectfor_no->project_no);
      $project_no=$projectNo[0].'-'.($projectNo[1]+1);
      }
      else {
        $project_no = "PRO-1";
      }
      foreach ($districts as $district) {
        $district->name = $district->name . "/";
      }
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
      return view('projects.create',compact('sub_project_types','districts','sectors','sponsoring_departments','executing_departments','assigning_forums','project_no','current_year','approving_forums','evaluation_types','project_types','evaluation_types','sub_sectors','projects'));
        // $sponosoring_agencies=SponsoringAgency::all();
        // $executing_agencies=ExecutingAgency::all();
        // $users=User::all();
        // return view('projects.create',['users'=>$users,'sponosoring_agencies'=>$sponosoring_agencies,'executing_agencies'=>$executing_agencies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $projectfor_no=Project::select('projects.project_no')->latest()->first();
      if($projectfor_no){
      $project_no=explode('-',$projectfor_no->project_no);
      $projectNo=$project_no[0].'-'.($project_no[1]+1);
      }
      else {
        $projectNo = "PRO-1";
      }
      $project = new Project();
      $project->title = $request->title;
      $project->project_no = $projectNo;
      $project->evaluation_type_id = $request->evaluation_type;
      $project->ADP = $request->ADP;
      $project->project_type_id = $request->type_of_project;
      $project->status = 0;
      $project->user_id = Auth::id();
      $project->save();
      $project_id = Project::latest()->first()->id;
      $project_detail = new ProjectDetail();
      $project_detail->project_id = $project_id;
      $project_detail->currency = $request->currency;
      $project_detail->orignal_cost = $request->original_cost;
      $day = strtok($request->planned_start_date,"/");
      $month = strtok("/");
      $year = strtok("/");
      $project_detail->planned_start_date = $year."-".$month."-".$day;
      $day = strtok($request->planned_end_date,"/");
      $month = strtok("/");
      $year = strtok("/");
      $project_detail->planned_end_date = $year."-".$month."-".$day;
      $day = strtok($request->revised_start_date,"/");
      $month = strtok("/");
      $year = strtok("/");
      $project_detail->revised_start_date = $project_detail->planned_start_date;//change
      $project_detail->assigning_forum_id = $request->assigning_forum;
      $project_detail->approving_forum_id = $request->approving_forum;
      $project_detail->sub_project_type_id = 1;//change
      if($request->hasFile('attachments')){
        $request->file('attachments')->store('public/uploads/projects/');
        $file_name = $request->file('attachments')->hashName();
        $project_detail->project_attachements=$file_name;
      }
      $project_detail->save();
      foreach($request->departments as $department_id){
        $assigned_department = new AssignedDepartment();
        $assigned_department->project_id = $project_id;
        $assigned_department->department_id = $department_id;
        $assigned_department->save();
      }
      foreach($request->sponsoring_departments as $sponsoring_department_id){
        $sponosoring_agency = new AssignedSponsoringAgency();
        $sponosoring_agency->project_id = $project_id;
        $sponosoring_agency->sponsoring_agency_id = $sponsoring_department_id;
        $sponosoring_agency->save();
      }
      foreach($request->executing_departments as $executing_department_id){
        $executing_agency = new AssignedExecutingAgency();
        $executing_agency->project_id = $project_id;
        $executing_agency->executing_agency_id = $executing_department_id;
        $executing_agency->save();
      }
      foreach($request->revised_approved_costs as $revised_approved_cost){
        $revised_approved_cost_save = new RevisedApprovedCost();
        $revised_approved_cost_save->project_id = $project_id;
        $revised_approved_cost_save->cost = $revised_approved_cost;
        $revised_approved_cost_save->save();
      }
      foreach($request->revised_end_dates as $revised_end_date){
        $day = strtok($revised_end_date,"/");
        $month = strtok("/");
        $year = strtok("/");
        $revised_end_date = new RevisedEndDate();
        $revised_end_date->project_id = $project_id;
        $revised_end_date->end_date = $year."-".$month."-".$day;
        $revised_end_date->save();
      }
      foreach($request->districts as $district){
        $assigned_district = new AssignedDistrict();
        $assigned_district->project_id = $project_id;
        $assigned_district->district_id = $district;
        $assigned_district->save();
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
      $project = Project::find($id);
      return view('projects.show',compact('project'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


      $project_types = ProjectType::all();
      $evaluation_types = EvaluationType::all();
      $sub_sectors = SubSector::all();
      $projects = Project::all();
      $evaluation_types = EvaluationType::all();
      $districts = District::all();
      $sectors  = Sector::all();
      $sponsoring_departments = SponsoringAgency::all();
      $executing_departments = ExecutingAgency::all();
      $assigning_forums = AssigningForum::all();
      // $project_no = Str::random();
      $current_year = date('Y');
      $approving_forums = ApprovingForum::all();
      $sub_project_types = SubProjectType::all();
      $projectfor_no=Project::select('projects.project_no')->latest()->first();
      if($projectfor_no){
      $projectNo=explode('-',$projectfor_no->project_no);
      $project_no=$projectNo[0].'-'.($projectNo[1]+1);
      }
      else {
        $project_no = "PRO-1";
      }
      foreach ($districts as $district) {
        $district->name = $district->name . "/";
      }
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
      return view('projects.edit',compact('sub_project_types','districts','sectors','sponsoring_departments','executing_departments','assigning_forums','project_no','current_year','approving_forums','evaluation_types','project_types','evaluation_types','sub_sectors','projects'));
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
