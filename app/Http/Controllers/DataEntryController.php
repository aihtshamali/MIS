<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use App\ExecutingAgency;
use App\AssigningForum;
use App\SubProjectType;
use Illuminate\Support\Str;

class DataEntryController extends Controller
{
    public function create_project()
    {
      $project_types = ProjectType::all();
      $evaluation_types = EvaluationType::all();
      $sub_sectors = SubSector::all();
      $projects = Project::all();

      // dd($project_types);
      return view('DataEntry.create',compact('project_types','evaluation_types','sub_sectors','projects'));
    }

    public function onSubSectorSelect(Request $request)
    {
      $result = $request->all();
      try{
      $data = $result['data'];
      $data_count = count($data);
      $projects = array();
      $total = array();
      $departments = Department::distinct('sub_sector_id')->select('departments.sub_sector_id','assigned_departments.project_id')
      ->leftJoin('assigned_departments','assigned_departments.department_id','departments.id')
      ->whereIn('sub_sector_id',$data)
      ->distinct()
      ->groupBy('project_id','sub_sector_id')
      ->get();
      foreach ($departments as $department) {
        array_push($projects,$department->project_id);
      }
      $projects = array_count_values($projects);
      foreach (array_keys($projects) as $project) {
        if($data_count == $projects[$project]){
          array_push($total,$project);
        }
      }
      $projects_fetched = Project::all()->whereIn('id',$total);
      return $projects_fetched;
      }
      catch(\Exception $e){
        return \Response::json(array('error' => 'No data found'));
      }
        // ->leftJoin('departments','departments.sub_sector_id','sub_sectors.id')
        // ->Where($sub_sectors)
        // ->leftJoin('projects','assigned_departments.project_id','projects.id')
        // ->groupBy('projects.id')
        // ->orWhere()
        // ->where('departments.sub_sector_id',$data)
        // ->get();
      //   foreach ($departments as $department) {
      //     $departments_total[] = $department;
      // }
      // $projects_total = array();
      // foreach ($departments_total as $dep) {
      //   $projects = AssignedDepartment::where('department_id',$dep)->get();
      //   foreach ($projects as $p) {
      //     $projects_total[] = $p['project_id'];
      //   }
      // }
      // return $sub_sectors;
      // return array_unique($departments);

    }
    public function onSectorSelect(Request $request)
    {
      $result = $request->all();
      try{
      $data = $result['data'];
      $data_count = count($data);
      $sub_sectors = array();
      $total = array();
      foreach ($data as $value) {
        $r  = Sector::find($value);
        foreach(Sector::find($value)->subsectors as $sub){
        array_push($sub_sectors,$sub);
      }
      }
      foreach ($sub_sectors as $sub_sector) {
        $sub_sector->name = $sub_sector->name . "/";
      }
      return $sub_sectors;
    }
      catch(\Exception $e){
        return \Response::json(array('error' => 'No data found'));
      }
    }

    public function store(Request $request)
    {
      $project = new Project();
      $project->title = $request->title;
      $project->project_no = $request->project_no;
      $project->ADP = $request->ADP;
      $project->project_type_id = ProjectType::where('name','Evaluation')->first()->id;
      $project->evaluation_type_id = EvaluationType::where('name','Impact Assesment')->first()->id;
      $project->status = 0;
      $project->save();
      $project_detail = new ProjectDetail();
      $project_detail->project_id = Project::latest()->first()->id;
      $project_detail->currency = $request->currency;
      $project_detail->orignal_cost = $request->original_cost;
      $project_detail->approved_cost = $request->approved_cost;
      $month = strtok($request->planned_start_date,"/");
      $day = strtok("/");
      $year = strtok("/");
      
      $project_detail->planned_start_date = $year."-".$month."-".$day;
      $month = strtok($request->planned_end_date,"/");
      $day = strtok("/");
      $year = strtok("/");
      $project_detail->planned_end_date = $year."-".$month."-".$day;
      $project_detail->district_id = $request->district;
      $project_detail->planned_start_date = $request->planned_start_date;
      $month = strtok($request->revised_start_date,"/");
      $day = strtok("/");
      $year = strtok("/");
      $project_detail->revised_start_date = $year."-".$month."-".$day;
      $project_detail->assigning_forum_id = $request->assigning_forum;
      $project_detail->sub_project_type_id = SubProjectType::where('name','New Evaluation')->first()->id;
      $project_detail->save();
      return redirect('createproject');
    }

    public function form()
    {

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
      return view('DataEntry.form',compact('districts','sectors','sponsoring_departments','executing_departments','assigning_forums','project_no'));
    }
    public function newproject(Request $request)
    {
      $result = $request->all();
      return $result['data'];
    }
}
