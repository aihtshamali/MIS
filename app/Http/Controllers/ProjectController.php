<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\ProjectRemark;
use App\Notification;
use App\ProjectType;
use App\EvaluationType;
use App\SubSector;
use App\Project;
use App\ProjectLog;
use App\ProjectDetail;
use App\Department;
use App\AssignedSubSector;

// use App\AssignedDepartment;
use App\AssignedSubSectorLog;
// use App\AssignedDepartmentProjectLog;
use App\District;
use App\Sector;
use App\SponsoringAgency;
use App\AssignedSponsoringAgencyProjectLog;
use App\AssignedSponsoringAgency;
use App\ExecutingAgency;
use App\AssignedExecutingAgencyProjectLog;
use App\AssignedExecutingAgency;
use App\AssigningForumProjectLog;
use App\AssigningForum;
use App\SubProjectType;
use App\ApprovingForum;
use App\RevisedApprovedCost;
use App\RevisedEndDate;
use App\AssignedDistrictProjectLog;
use App\AssignedProject;
use App\AssignedDistrict;
use Illuminate\Support\Str;
use App\User;
use App\RevisedApprovedCostProjectLog;
use App\RevisedEndDateProjectLog;
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
      $project_types = ProjectType::where('status','1')->get();
      $evaluation_types = EvaluationType::where('status','1')->get();
      $sub_sectors = SubSector::where('status','1')->get();
      $projects = Project::where('status','1')->get();
      $evaluation_types = EvaluationType::where('status','1')->get();
      $districts = District::where('status','1')->get();
      $sectors  = Sector::where('status','1')->get();
      $sponsoring_departments = SponsoringAgency::where('status','1')->get();
      $executing_departments = ExecutingAgency::where('status','1')->get();
      $assigning_forums = AssigningForum::where('status','1')->get();
      // $assigning_forumList = AssigningForumSubList::where('status','1')->get();
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
      // dd($plan_end_date);
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
      $project->assigning_forum_sub_list_id = $request->assigning_forumSubList;
      $project->status = 0;
      $project->user_id = Auth::id();
      $project->save();
      $project_id = Project::latest()->first()->id;
      $project_detail = new ProjectDetail();
      $project_detail->project_id = $project_id;
      $project_detail->currency = $request->currency;
      $project_detail->orignal_cost = $request->original_cost;
      $project_detail->planned_start_date = date('Y-m-d',strtotime($request->planned_start_date));
      $project_detail->planned_end_date = date('Y-m-d',strtotime($request->planned_end_date));
      if($request->revised_start_date != NULL)
        $project_detail->revised_start_date = date('Y-m-d',strtotime($request->revised_start_date));
      $project_detail->assigning_forum_id = $request->assigning_forum;
      $project_detail->approving_forum_id = $request->approving_forum;
      $project_detail->sub_project_type_id = $request->phase_of_evaluation;//change
      if($request->hasFile('attachments')){
        $request->file('attachments')->store('public/uploads/projects/');
        $file_name = $request->file('attachments')->hashName();
        $project_detail->project_attachements=$file_name;
      }
      $project_detail->save();
      // foreach($request->departments as $department_id){
      //   $assigned_department = new AssignedDepartment();
      //   $assigned_department->project_id = $project_id;
      //   $assigned_department->department_id = $department_id;
      //   $assigned_department->save();
      // }
      foreach($request->sub_sectors as $sub_sector){
        $Assignedsub_sector = new AssignedSubSector();
        $Assignedsub_sector->project_id = $project_id;
        $Assignedsub_sector->sub_sector_id = $sub_sector;
        $Assignedsub_sector->save();
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
      if($request->revised_approved_costs[0])
      foreach($request->revised_approved_costs as $revised_approved_cost){
        $revised_approved_cost_save = new RevisedApprovedCost();
        $revised_approved_cost_save->project_id = $project_id;
        $revised_approved_cost_save->cost = $revised_approved_cost;
        $revised_approved_cost_save->save();
      }
      if($request->revised_end_dates[0])
      foreach($request->revised_end_dates as $revised_end_date){
        $revised_end_date = new RevisedEndDate();
        $revised_end_date->project_id = $project_id;
        $revised_end_date->end_date = date('Y-m-d',strtotime($revised_end_date));
        $revised_end_date->save();
      }
      foreach($request->districts as $district){
        $assigned_district = new AssignedDistrict();
        $assigned_district->project_id = $project_id;
        $assigned_district->district_id = $district;
        $assigned_district->save();
      }

      $notification = new Notification();
      $notification->user_id=Auth::id();
      $notification->text= $project->title.' has been created by '.$project->user->first_name;
      $notification->table_name='projects';
      $notification->table_id=$project->id;
      $notification->save();

      //Project Log Entry


      $project = new ProjectLog();
      // $project->assigned_project_id=AssignedProject::where('project_id',$id)->first()->id;
      if($request->title != NULL)
        $project->title = $request->title;
      if($request->evaluation_type != NULL)
        $project->evaluation_type_id = $request->evaluation_type;
      if($request->ADP != NULL)
        $project->ADP = $request->ADP;
      $project->user_id = Auth::id();
      $project->status = 0;

      if($request->currency)
        $project->currency = $request->currency;
      if($request->original_cost != NULL)
        $project->orignal_cost = $request->original_cost;
      if($request->assigning_forumSubList != NULL)
        $project->assigning_forum_sub_list_id = $request->assigning_forumSubList;
      if($request->planned_start_date != NULL)
        $project->planned_start_date = date('Y-m-d',strtotime($request->planned_start_date));
      if($request->planned_end_date != NULL)
        $project->planned_end_date = date('Y-m-d',strtotime($request->planned_end_date));
        if($request->revised_start_date != NULL)
          $project->revised_start_date = date('Y-m-d',strtotime($request->revised_start_date));
      if($request->assigning_forum != NULL)
        $project->assigning_forum_id = $request->assigning_forum;
      if($request->approving_forum != NULL)
        $project->approving_forum_id = $request->approving_forum;
      if($request->hasFile('attachments')){
        $request->file('attachments')->store('public/uploads/projects/');
        $file_name = $request->file('attachments')->hashName();
        $project->project_attachements=$file_name;
      }
      if($project!=NULL){
        $project->save();
      }
      // if($request->departments)
      // foreach($request->departments as $department_id){
      //   if($department != NULL){
      //   $assigned_department = new AssignedDepartmentProjectLog();
      //   $assigned_department->assproject_id = $id;
      //   $assigned_department->project_id = $id;
      //   $assigned_department->department_id = $department_id;
      //   $assigned_department->save();
      // }
      // }
      if($request->sub_sectors){
      foreach($request->sub_sectors as $sub_sector){
        $Assignedsub_sector = new AssignedSubSectorLog();
        $Assignedsub_sector->project_log_id = ProjectLog::latest()->first()->id;
        $Assignedsub_sector->sub_sector_id = $sub_sector;
        $Assignedsub_sector->save();
      }
    }

      if($request->sponsoring_departments){
      foreach($request->sponsoring_departments as $sponsoring_department_id){
        if($sponsoring_department_id != NULL){
        $sponosoring_agency = new AssignedSponsoringAgencyProjectLog();
        $sponosoring_agency->project_log_id = ProjectLog::latest()->first()->id;
        $sponosoring_agency->sponsoring_agency_id = $sponsoring_department_id;
        $sponosoring_agency->save();
      }
      }
    }
      if($request->executing_departments)
      foreach($request->executing_departments as $executing_department_id){
        if($executing_department_id != NULL){
        $executing_agency = new AssignedExecutingAgencyProjectLog();
        $executing_agency->project_log_id = ProjectLog::latest()->first()->id;
        $executing_agency->executing_agency_id = $executing_department_id;
        $executing_agency->save();
      }
      }
      if(count($request->revised_approved_costs) > 0)
      foreach($request->revised_approved_costs as $revised_approved_cost){
        if($revised_approved_cost != NULL){
        $revised_approved_cost_save = new RevisedApprovedCostProjectLog();
        $revised_approved_cost_save->project_log_id = ProjectLog::latest()->first()->id;
        $revised_approved_cost_save->cost = $revised_approved_cost;
        $revised_approved_cost_save->save();
      }
      }
      if(count($request->revised_end_dates) > 0)
        foreach($request->revised_end_dates as $revised_end_date){
            if($revised_end_date != NULL){
              $revised_end_date = new RevisedEndDateProjectLog();
              $revised_end_date->project_log_id = ProjectLog::latest()->first()->id;
      $revised_end_date->end_date = date('Y-m-d',strtotime($revised_end_date));
              $revised_end_date->save();
          }
        }

      if($request->districts)
      foreach($request->districts as $district){
        if($district != NULL){
          $assigned_district = new AssignedDistrictProjectLog();
          $assigned_district->project_log_id = ProjectLog::latest()->first()->id;
          $assigned_district->district_id = $district;
          $assigned_district->save();
      }
      }
      // $notification = new Notification();
      // $notification->user_id=Auth::id();
      //   $proje_title=Project::find($project_id);
      // if($proje_title!= NULL){
      //     $proje_title=$proje_title->title;
      // }
      // $notification->text= 'Requested generated for edit a project : Title '.$proje_title;
      // $notification->table_name='project_logs';
      // $notification->table_id=$project->id;
      // $notification->save();
      // return redirect()->route('new_evaluation');

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
      $project = Project::find($id);
      // dd($project);
      $project_types = ProjectType::where('status','1')->get();
      $evaluation_types = EvaluationType::where('status','1')->get();
      $sub_sectors = SubSector::where('status','1')->get();

      $evaluation_types = EvaluationType::where('status','1')->get();
      $districts = District::where('status','1')->get();
      $sectors  = Sector::where('status','1')->get();
      // $departments  = Department::where('status','1')->get();
      $sponsoring_departments = SponsoringAgency::all();
      $executing_departments = ExecutingAgency::all();
      $assigning_forums = AssigningForum::all();
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
      // foreach ($departments as $department) {
      //   $department->name = $department->name . "/";
      // }

      return view('projects.edit',compact('sub_project_types','districts','sectors','sponsoring_departments','executing_departments','assigning_forums','project_no','current_year','approving_forums','evaluation_types','project_types','evaluation_types','sub_sectors','project'));
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
      // $plan_end_date = explode('/', $request->planned_end_date);
      // dd($plan_end_date);
      // dd($request->all());
      $project = new ProjectLog();
      $project_original = Project::find($id);
      // dd($project_original->AssignedDistricts);
      $project->assigned_project_id=AssignedProject::where('project_id',$id)->first()->id;
      if($request->title != NULL){
        $project->title = $request->title;
        $project_original->title = $request->title;
      }
      if($request->evaluation_type != NULL){
        $project->evaluation_type_id = $request->evaluation_type;
        $project_original->evaluation_type_id = $request->evaluation_type;
      }
      if($request->ADP != NULL){
        $project->ADP = $request->ADP;
        $project_original->ADP = $request->ADP;
      }
      $project->user_id = Auth::id();
      $project->status = 1;

      $project_original_detail = $project_original->ProjectDetail;

      if($request->currency){
        $project->currency = $request->currency;
        $project_original_detail->currency = $request->currency;
      }
      if($request->original_cost != NULL){
        $project->orignal_cost = $request->original_cost;
        $project_original_detail->orignal_cost = $request->original_cost;
      }
      if($request->assigning_forumSubList != NULL){
        $project->assigning_forum_sub_list_id = $request->assigning_forumSubList;
        $project_original->assigning_forum_sub_list_id = $request->assigning_forumSubList;
      }
      if($request->planned_start_date != NULL){
        $project->planned_start_date = date('Y-m-d',strtotime($request->planned_start_date));
        $project_original_detail->planned_start_date = date('Y-m-d',strtotime($request->planned_start_date));
      }
      if($request->planned_end_date != NULL){
        $project->planned_end_date = date('Y-m-d',strtotime($request->planned_end_date));
        $project_original_detail->planned_end_date = date('Y-m-d',strtotime($request->planned_end_date));
      }
      if($request->revised_start_date != NULL){
        $project->revised_start_date = date('Y-m-d',strtotime($request->revised_start_date));
        $project_original_detail->revised_start_date = date('Y-m-d',strtotime($request->revised_start_date));
      }
      if($request->assigning_forum != NULL){
        $project->assigning_forum_id = $request->assigning_forum;
        $project_original_detail->assigning_forum_id = $request->assigning_forum;
      }
      if($request->approving_forum != NULL){
        $project->approving_forum_id = $request->approving_forum;
        $project_original_detail->approving_forum_id = $request->approving_forum;
      }
      if($request->hasFile('attachments')){
        $request->file('attachments')->store('public/uploads/projects/');
        $file_name = $request->file('attachments')->hashName();
        $project->project_attachements=$file_name;
        $project_original_detail->project_attachements=$file_name;
      }
      if($project!=NULL)
        $project->save();
      $project_original->save();
      $project_original_detail->save();
      // if($request->departments)
      // foreach($request->departments as $department_id){
      //   if($department != NULL){
      //   $assigned_department = new AssignedDepartmentProjectLog();
      //   $assigned_department->assproject_id = $id;
      //   $assigned_department->project_id = $id;
      //   $assigned_department->department_id = $department_id;
      //   $assigned_department->save();
      // }
      // }
      if($request->sub_sectors){
        foreach ($project_original->AssignedSubSectors as $AssignedSubSector) {
          $AssignedSubSector->delete();
        }
        foreach($request->sub_sectors as $sub_sector){
          $AssignedSubSector = new AssignedSubSector();
          $Assignedsub_sector = new AssignedSubSectorLog();
          $Assignedsub_sector->project_log_id = ProjectLog::latest()->first()->id;
          $AssignedSubSector->project_id = $id;
          $Assignedsub_sector->sub_sector_id = $sub_sector;
          $AssignedSubSector->sub_sector_id = $sub_sector;
          $Assignedsub_sector->save();
          $AssignedSubSector->save();
        }
      }

      if($request->sponsoring_departments){
        foreach ($project_original->AssignedSponsoringAgencies as $AssignedSponsoringAgency) {
          $AssignedSponsoringAgency->delete();
        }
        foreach($request->sponsoring_departments as $sponsoring_department_id){
          if($sponsoring_department_id != NULL){
            $AssignedSponsoringAgency = new AssignedSponsoringAgency();
            $sponosoring_agency = new AssignedSponsoringAgencyProjectLog();
            $sponosoring_agency->project_log_id = ProjectLog::latest()->first()->id;
            $AssignedSponsoringAgency->project_id = $id;
            $sponosoring_agency->sponsoring_agency_id = $sponsoring_department_id;
            $AssignedSponsoringAgency->sponsoring_agency_id = $sponsoring_department_id;
            $sponosoring_agency->save();
            $AssignedSponsoringAgency->save();
          }
        }
      }
      if($request->executing_departments){
        foreach ($project_original->AssignedExecutingAgencies as $AssignedExecutingAgency) {
          $AssignedExecutingAgency->delete();
        }
        foreach($request->executing_departments as $executing_department_id){
          if($executing_department_id != NULL){
            $AssignedExecutingAgency = new AssignedExecutingAgency();
            $executing_agency = new AssignedExecutingAgencyProjectLog();
            $executing_agency->project_log_id = ProjectLog::latest()->first()->id;
            $AssignedExecutingAgency->project_id = $id;
            $executing_agency->executing_agency_id = $executing_department_id;
            $AssignedExecutingAgency->executing_agency_id = $executing_department_id;
            $executing_agency->save();
            $AssignedExecutingAgency->save();
          }
        }
      }
      if($request->revised_approved_costs[0] != NULL){
        foreach ($project_original->RevisedApprovedCost as $RevisedApprovedCostSingle) {
          $RevisedApprovedCostSingle->delete();
        }
        foreach($request->revised_approved_costs as $revised_approved_cost){
          if($revised_approved_cost != NULL){
            $RevisedApprovedCost = new RevisedApprovedCost();
            $revised_approved_cost_save = new RevisedApprovedCostProjectLog();
            $revised_approved_cost_save->project_log_id = ProjectLog::latest()->first()->id;
            $RevisedApprovedCost->project_id = $id;
            $revised_approved_cost_save->cost = $revised_approved_cost;
            $RevisedApprovedCost->cost = $revised_approved_cost;
            $revised_approved_cost_save->save();
            $RevisedApprovedCost->save();
          }
        }
      }
      if($request->revised_end_dates[0] != NULL){
        foreach ($project_original->RevisedEndDate as $RevisedEndDateSingle) {
          $RevisedEndDateSingle->delete();
        }
        foreach($request->revised_end_dates as $revised_end_date){
            if($revised_end_date != NULL){
              $RevisedEndDate = new RevisedEndDateSingle();
              $revised_end_date = new RevisedEndDateProjectLog();
              $revised_end_date->project_log_id = ProjectLog::latest()->first()->id;
              $RevisedEndDate->project_id = $id;
              $revised_end_date->end_date = date('Y-m-d',strtotime($revised_end_date));
              $RevisedEndDate->end_date = date('Y-m-d',strtotime($revised_end_date));
              $revised_end_date->save();
              $RevisedEndDate->save();
          }
        }
      }

      if($request->districts){
        foreach ($project_original->AssignedDistricts as $AssignedDistrict) {
          $AssignedDistrict->delete();
        }
        foreach($request->districts as $district){
          if($district != NULL){
              $AssignedDistrict = new AssignedDistrict();
              $assigned_district = new AssignedDistrictProjectLog();
              $assigned_district->project_log_id = ProjectLog::latest()->first()->id;
              $AssignedDistrict->project_id = $id;
              $assigned_district->district_id = $district;
              $AssignedDistrict->district_id = $district;
              $assigned_district->save();
              $AssignedDistrict->save();
          }
        }
      }


      $notification = new Notification();
      $notification->user_id=Auth::id();
        $proje_title=Project::find($id);
      if($proje_title!= NULL){
          $proje_title=$proje_title->title;
      }
      $notification->text= 'Updated project : Title '.$proje_title;
      $notification->table_name='project_logs';
      $notification->table_id=$project->id;
      $notification->save();
      return redirect()->route('new_evaluation');
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
