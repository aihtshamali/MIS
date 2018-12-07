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
use App\AdpProject;
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

        $projects=Project::where('user_id',Auth::id())
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

     public function financial_year(Request $request){
       $adp = AdpProject::where('financial_year',$request->financial_year)->orderBy('gs_no')->get();
       $data = [];
       $keys = [];
       foreach ($adp as $val) {
         array_push($keys,$val->gs_no);
         array_push($data,$val);
       }
       $final = array_combine($keys,$data);
       return $final;
     }

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
      $approving_forums = ApprovingForum::where('status','1')->get();
      $sub_project_types = SubProjectType::where('project_type_id',1)->where('status','1')->get();
      $m_sub_project_types = SubProjectType::where('project_type_id',2)->where('status','1')->get();
      $projectfor_no=Project::select('projects.project_no')->latest()->first();
      $adp = AdpProject::where('financial_year','2017-18')->orderBy('gs_no')->get();
      $data = [];
      $keys = [];
      foreach ($adp as $val) {
        array_push($keys,$val->gs_no);
        array_push($data,$val);
      }
      $final = array_combine($keys,$data);
      // dd($final);
      // if($projectfor_no){
      // $projectNo=explode('-',$projectfor_no->project_no);
      // $project_no=$projectNo[0].'-'.($projectNo[1]+1);
      // }
      // else {
      //   $project_no = "PRO-1";
      // }
      $project_no=Project::latest()->first()->project_no;
      if($project_no){
      $projectNo=explode('-',$project_no);
      $project_no=$projectNo[0].'-'.($projectNo[1]+1);
      }
      else {
        $project_no = "PRO-1";
      }
      foreach ($districts as $district) {
        $district->name = $district->name;
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
      \JavaScript::put([
        'projects' => $final
    ]);
      return view('projects.create',compact('sub_project_types','m_sub_project_types','adp','districts','sectors','sponsoring_departments','executing_departments','assigning_forums','project_no','current_year','approving_forums','evaluation_types','project_types','evaluation_types','sub_sectors','projects'));
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
      // dd($request->all());
      $project_no=Project::latest()->first()->project_no;
      if($project_no){
      $project_no=explode('-',$project_no);
      // dd($project_no);
      $projectNo=$project_no[0].'-'.($project_no[1]+1);
      }
      else {
        $projectNo = "PRO-1";
      }
      // $projectNo=$request->project_no;
      $project = new Project();
      $project->title = $request->title;
      $project->project_no = $projectNo;
      if(isset($request->evaluation_type) && $request->evaluation_type)
        $project->evaluation_type_id = $request->evaluation_type;
      $project->ADP = $request->adp_no;
      $project->financial_year = $request->financial_year;
      $project->project_type_id = $request->type_of_project;
      if($request->assigning_forumSubList!='undefined' && $request->assigning_forumSubList!=null)
        $project->assigning_forum_sub_list_id = $request->assigning_forumSubList;
      else {
        $project->assigning_forum_sub_list_id = null;
      }
      $project->status = 1;
      $project->user_id = Auth::id();
      $project->save();
      // dd($request->all());

      $project_id = Project::latest()->first()->id;
      $project_detail = new ProjectDetail();
      if(isset($request->sne) && $request->sne){
        $project_detail->sne = $request->sne;
      }
      if(isset($request->sne_cost)){
        $project_detail->sne_cost = $request->sne_cost;
      }
      if(isset($request->sne_staff_positions)){
        $project_detail->sne_staff_positions = $request->sne_staff_positions;
      }
      $project_detail->project_id = $project_id;
      $project_detail->currency = $request->currency;
      $project_detail->orignal_cost = $request->original_cost;
      if($request->planned_start_date)
        $project_detail->planned_start_date = date('Y-m-d',strtotime($request->planned_start_date));
      if($request->planned_end_date)
        $project_detail->planned_end_date = date('Y-m-d',strtotime($request->planned_end_date));
      if($request->revised_start_date)
      $project_detail->revised_start_date = date('Y-m-d',strtotime($request->revised_start_date));

      $project_detail->assigning_forum_id = $request->assigning_forum;
      $project_detail->approving_forum_id = $request->approving_forum;
      // TODO:
      if($request->phase_of_project!='' && $request->phase_of_project!=NULL)
      {
        // dd('as');
          $project_detail->sub_project_type_id = $request->phase_of_project;
      }
      else
        $project_detail->sub_project_type_id = $request->phase_of_monitoring;
      if($request->hasFile('attachments')){
        $file_path = $request->file('attachments')->path();
        $file_extension = $request->file('attachments')->getClientOriginalExtension();
        $project_detail->attachment=$file_path;
        $project_detail->attachment_type=$file_extension;
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
      if(isset($request->revised_end_dates[0]) && $request->revised_end_dates[0]!=null && $request->revised_end_dates[0]!='')
      foreach($request->revised_end_dates as $revised_end_date){
        $revised_end_dat = new RevisedEndDate();
        $revised_end_dat->project_id = $project_id;
        $revised_end_dat->end_date = date('Y-m-d',strtotime($revised_end_date));
        $revised_end_dat->save();
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

      $score = app('App\Http\Controllers\ProjectAssignController')->AddScore($project->id);
      $project->score = $score;
      $project->save();

      //Project Log Entry


      $project = new ProjectLog();
      // $project->assigned_project_id=AssignedProject::where('project_id',$id)->first()->id;
      if($request->title != NULL)
        $project->title = $request->title;
      if(isset($request->evaluation_type) &&$request->evaluation_type != NULL )
        $project->evaluation_type_id = $request->evaluation_type;
      if($request->adp_no != NULL)
      $project->ADP = $request->adp_no;
      $project->user_id = Auth::id();
      $project->status = 1;

      if($request->currency)
        $project->currency = $request->currency;
      if($request->original_cost != NULL)
        $project->orignal_cost = $request->original_cost;
      if($request->assigning_forumSubList != NULL && $request->assigning_forumSubList != "undefined")
        $project->assigning_forum_sub_list_id = $request->assigning_forumSubList;
      if($request->planned_start_date != NULL)
        $project->planned_start_date = date('Y-m-d',strtotime($request->planned_start_date));
      if($request->planned_end_date != NULL)
        $project->planned_end_date = date('Y-m-d',strtotime($request->planned_end_date));
        if($request->revised_start_date)
        $project->revised_start_date = date('Y-m-d',strtotime($request->revised_start_date));
      if($request->assigning_forum != NULL)
        $project->assigning_forum_id = $request->assigning_forum;
      if($request->phase_of_project != NULL)
        $project->sub_project_type_id = $request->phase_of_project;
      if($request->approving_forum != NULL)
        $project->approving_forum_id = $request->approving_forum;
      if($request->hasFile('attachments')){
        $file_path = $request->file('attachments')->path();
        $file_extension = $request->file('attachments')->getClientOriginalExtension();
        $project->project_attachements=$file_path;
        $project->attachment_type=$file_extension;
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
      if(isset($request->revised_end_dates[0]) && count($request->revised_end_dates) > 0)
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

      if(isset($request->evaluation_type) && $request->evaluation_type)
        return redirect()->route('projects.index');
      else
        return redirect()->route('viewMonitoringForm');
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
      $sponsoring_departments = SponsoringAgency::where('status','1')->get();
      $executing_departments = ExecutingAgency::where('status','1')->get();
      $assigning_forums = AssigningForum::where('status','1')->get();
      $current_year = date('Y');
      $approving_forums = ApprovingForum::where('status','1')->get();
      $sub_project_types = SubProjectType::all();
      $project_no=$project->project_no;
      foreach ($districts as $district) {
        $district->name = $district->name;
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
      $adp = AdpProject::where('financial_year','2017-18')->orderBy('gs_no')->get();
      $data = [];
      $keys = [];
      foreach ($adp as $val) {
        array_push($keys,$val->gs_no);
        array_push($data,$val);
      }
      $final = array_combine($keys,$data);

      \JavaScript::put([
        'projects' => $final
      ]);

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
      if(isset($request->sne) && $request->sne){
        $project_original->ProjectDetail->sne = $request->sne;
        $project_original->ProjectDetail->save();
      }
      if(isset($request->sne) && $request->sne){
        $project_original->ProjectDetail->sne = $request->sne;
        $project_original->ProjectDetail->save();
      }
      if(isset($request->sne_cost)){
        $project_original->ProjectDetail->sne_cost = $request->sne_cost;
        $project_original->ProjectDetail->save();
      }
      if(isset($request->sne_staff_positions)){
        $project_original->ProjectDetail->sne_staff_positions = $request->sne_staff_positions;
        $project_original->ProjectDetail->save();
      }
      if($request->evaluation_type != NULL){
        $project->evaluation_type_id = $request->evaluation_type;
        $project_original->evaluation_type_id = $request->evaluation_type;
      }
      if($request->adp_no != NULL){
        $project->ADP = $request->adp_no;
        $project_original->ADP = $request->adp_no;
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
        $file_path = $request->file('attachments')->path();
        $file_extension = $request->file('attachments')->getClientOriginalExtension();
        $project->project_attachements=$file_path;
        $project->attachment_type=$file_extension;
        $project_original_detail->attachment=$file_path;
        $project_original_detail->attachment_type=$file_extension;
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
        foreach($request->revised_end_dates as $end_date){
            if($end_date != NULL){
              $RevisedEndDate = new RevisedEndDate();
              $revised_end_date = new RevisedEndDateProjectLog();
              $revised_end_date->project_log_id = ProjectLog::latest()->first()->id;
              $RevisedEndDate->project_id = $id;
              $revised_end_date->end_date = date('Y-m-d',strtotime($end_date));
              $RevisedEndDate->end_date = $revised_end_date->end_date;
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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Monitoring Module
// //////////////////////////////////////////////////////
  public function createMonitoringEntryForm()
  {
    $project_no=Project::latest()->first()->project_no;
    if($project_no){
    $projectNo=explode('-',$project_no);
    $project_no=$projectNo[0].'-'.($projectNo[1]+1);
    }
    else {
      $project_no = "PRO-1";
    }
    // dd($project_no);
    $sub_project_types = SubProjectType::where('project_type_id','2')->where('status','1')->get();
    $project_types = ProjectType::where('name','Monitoring')->where('status','1')->first();
    $districts = District::where('status','1')->get();
    $sectors  = Sector::where('status','1')->get();
    $sub_sectors = SubSector::where('status','1')->get();
    $sponsoring_departments = SponsoringAgency::where('status','1')->get();
    $executing_departments = ExecutingAgency::where('status','1')->get();
    $assigning_forums = AssigningForum::where('status','1')->get();
    // $assigning_forumList = AssigningForumSubList::where('status','1')->get();
    // $project_no = Str::random();
    $current_year = date('Y');
    $approving_forums = ApprovingForum::where('status','1')->get();
    $adp = AdpProject::where('financial_year','2017-18')->orderBy('gs_no')->get();
    $data = [];
    $keys = [];
    foreach ($adp as $val) {
      array_push($keys,$val->gs_no);
      array_push($data,$val);
    }
    $final = array_combine($keys,$data);
    foreach ($districts as $district) {
      $district->name = $district->name;
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
    \JavaScript::put([
      'projects' => $final
  ]);
    return view('_Monitoring._Dataentry.create',compact('project_no','project_types','adp','sub_project_types','districts','sectors','sponsoring_departments','executing_departments','assigning_forums','current_year','approving_forums','sub_sectors','projects'));
  }

  public function viewMonitoringForm()
  {
    $projects=Project::where('project_type_id','2')->get();
    return view('_Monitoring._Dataentry.view',compact('projects'));
  }
}
