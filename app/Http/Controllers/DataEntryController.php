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
// use App\AssignedDepartment;
use App\AssignedSubSector;
use App\District;
use App\Sector;
use App\SponsoringAgency;
use App\AssignedSponsoringAgency;
use App\ExecutingAgency;
use App\AssignedExecutingAgency;
use App\AssigningForum;
use App\AssigningForumSubList;
use App\SubProjectType;
use App\ApprovingForum;
use App\RevisedApprovedCost;
use App\RevisedEndDate;
use App\AssignedDistrict;
use Illuminate\Support\Str;

class DataEntryController extends Controller
{
    // public function onSubSectorSelect(Request $request)
    // {
    //   $result = $request->all();
    //   try{
    //   $data = $result['data'];
    //   $data_count = count($data);
    //   $projects = array();
    //   $total = array();
    //   $sub = SubSector::distinct('sub_sector_id')->select('departments.sub_sector_id','assigned_departments.project_id')
    //   ->leftJoin('assigned_departments','assigned_subsectors.subsector_id','departments.id')
    //   ->whereIn('sub_sector_id',$data)
    //   ->distinct()
    //   ->groupBy('project_id','sub_sector_id')
    //   ->get();
    //   foreach ($departments as $department) {
    //     array_push($projects,$department->project_id);
    //   }
    //   $projects = array_count_values($projects);
    //   foreach (array_keys($projects) as $project) {
    //     if($data_count == $projects[$project]){
    //       array_push($total,$project);
    //     }
    // //   }
    //   $projects_fetched = Project::all()->whereIn('id',$total);
    //   return $projects_fetched;
    //   }
    //   catch(\Exception $e){
    //     return \Response::json(array('error' => 'No data found'));
    //   }
    //
    // }
    public function onSectorSelect(Request $request)
    {
      $result = $request->all();
      try{
      $data = $result['data'];
      $data_count = count($data);
      $sub_sectors = array();
      $total = array();
      foreach ($data as $value) {
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
    public function onAssigningForumselect(Request $request)
    {
      $result = $request->all();
      try{
      $data = $result['data'];
      $assigning_forums = array();
        foreach(AssigningForum::find($data)->AssigningForumSubList as $sub){
          array_push($assigning_forums,$sub);
        }
      foreach ($assigning_forums as $assigning_form) {
        $assigning_form->name = $assigning_form->name . "/";
      }
      return $assigning_forums;
    }
      catch(\Exception $e){
        return \Response::json(array('error' => 'No data found'));
      }
    }
    public function onSub_SectorSelect(Request $request)
    {
      $result = $request->all();
      try{
      $data = $result['data'];
      $data_count = count($data);
      $sponsoring_departments = array();
      $departments = array();
      $total = array();
      foreach ($data as $value) {
        foreach(SubSector::find($value)->sponsoring_departments as $sub){
        array_push($sponsoring_departments,$sub);
      }
        array_push($departments,SubSector::find($value)->departments);
      }
      foreach ($sponsoring_departments as $sponsoring_department) {
        $sponsoring_department->name = $sponsoring_department->name . "/";
      }
      array_push($total,$sponsoring_departments);
      array_push($total,$departments);
      return $total;
    }
      catch(\Exception $e){
        return \Response::json(array('error' => 'No data found'));
      }
    }

    public function newproject(Request $request)
    {
      $result = $request->all();
      return $result['data'];
    }
}
