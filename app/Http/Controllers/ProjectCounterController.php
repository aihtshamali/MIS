<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use Auth;
class ProjectCounterController extends Controller
{
    public function getUnassignedProjectCounter(Request $request){
      $unassigned=0;$role='';
        if($request->user()->hasRole('manager')){
            $unassigned=Project::select('projects.*')
          ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
          ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
          ->whereNull('assigned_project_managers.project_id')
          ->whereNull('assigned_projects.project_id')
          ->where('projects.project_type_id','1')
          ->get()->count();
            $role='executive';

        }
        elseif($request->user()->hasRole('directorevaluation')){
          $unassigned= AssignedProjectManager::select('assigned_project_managers.*')
          ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
          ->whereNull('assigned_projects.project_id')
          ->where('projects.project_type_id','1')
          ->where('assigned_project_managers.user_id',Auth::id())
          ->get()->count();


          // $unassigned=Project::select('projects.*','assigned_project_managers.user_id as manager_id')
          // ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
          // ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
          // ->whereNull('assigned_project_managers.project_id')
          // ->whereNull('assigned_projects.project_id')
          // ->where('assigned_project_managers.user_id',$request->user()->id)
          // ->get()->count();
          $role='directorE';
        }
        return response()->json(['unassigned' => $unassigned,'role'=>$role]);

    }
    public function getAssignedProjectCounter(Request $request){
      $assigned=0;$assignedtoManager=0;$role='';
        if($request->user()->hasRole('directorevaluation')){
          $assigned=AssignedProject::where('assigned_by',$request->user()->id)->get()->count();
          $role='directorE';
        }
        elseif($request->user()->hasRole('officer')){
          $assigned=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
          ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
          ->where('acknowledge','0')
          ->where('complete',0)
          ->where('user_id',$request->user()->id)
          ->count();
          $role='officer';
        }
      return response()->json(['assigned' => $assigned,'role'=>$role,'manager' => $assignedtoManager]);
    }
    public function getInProgressCounter(Request $request){
      $assigned=0;$assignedtoManager=0;$role='';
        if($request->user()->hasRole('manager')){
          $assigned=AssignedProject::where('complete','0')->count();
          $role='executive';
          $assignedtoManager=AssignedProjectManager::all()->count();
          $assignedtoOfficer=AssignedProject::select('assigned_project_managers.*')
          ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','assigned_projects.project_id')
          ->get()->count();
          $assignedtoManager = $assignedtoManager-$assignedtoOfficer;
        }
        elseif($request->user()->hasRole('directorevaluation')){
          $assigned=AssignedProject::where('assigned_by',$request->user()->id)->where('complete',0)->get()->count();

          $role='directorE';
        }
        elseif($request->user()->hasRole('officer')){
          $assigned=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
          ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
          ->where('user_id',$request->user()->id)
          ->where('acknowledge','1')
          ->where('complete',0)
          ->count();
          $role='officer';
        }
      return response()->json(['assigned' => $assigned,'role'=>$role,'manager' => $assignedtoManager]);
    }
    public function getCompletedCounter(Request $request){
      $assigned=0;$assignedtoManager=0;$role='';
        if($request->user()->hasRole('manager')){
          $assigned=AssignedProject::where('complete','1')->count();
          $role='executive';
          }
        elseif($request->user()->hasRole('directorevaluation')){
          $assigned=AssignedProject::where('assigned_by',$request->user()->id)
          ->where('acknowledge','1')
          ->where('complete',1)
          ->get()->count();
          $role='directorE';
        }
        elseif($request->user()->hasRole('officer')){
          $assigned=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
          ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
          ->where('user_id',$request->user()->id)
          ->where('acknowledge','1')
          ->where('complete',1)
          ->count();
          $role='officer';
        }
      return response()->json(['assigned' => $assigned,'role'=>$role,'manager' => $assignedtoManager]);
    }
}
