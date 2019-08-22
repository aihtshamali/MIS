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
          ->where('projects.status',1)
          ->get()->count();
            $role='executive';

        }

        elseif($request->user()->hasRole('directorevaluation')){
          $unassigned= AssignedProjectManager::select('assigned_project_managers.*')
          ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
          ->leftJoin('projects','assigned_project_managers.project_id','projects.id')
          ->where('projects.project_type_id',1)
          ->where('assigned_project_managers.user_id',Auth::id())
          ->whereNull('assigned_projects.project_id')
          ->where('projects.status',1)
          ->get()
          ->count();

          $role='directorE';
        }
        return response()->json(['unassigned' => $unassigned,'role'=>$role]);

    }
    public function getAssignedProjectCounter(Request $request){
      $assigned=0;$assignedtoManager=0;$role='';
        if($request->user()->hasRole('directorevaluation')){

          $assigned=AssignedProject::select('assigned_projects.*')
          ->leftJoin('projects','assigned_projects.project_id','projects.id')
          ->where('assigned_by',$request->user()->id)
          ->where('complete',0)
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->get()
          ->count();

          $role='directorE';

        }

        elseif($request->user()->hasRole('officer|evaluator')){
          $assigned=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
          ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
          ->leftjoin('projects','assigned_projects.project_id','projects.id')
          ->where('acknowledge','0')
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->where('complete',0)
          ->where('assigned_project_teams.user_id',$request->user()->id)
          ->count();
          $role='officer';

        }

      return response()->json(['assigned' => $assigned,'role'=>$role,'manager' => $assignedtoManager]);
    }

    public function getInProgressCounter(Request $request){
      $assigned=0;$assignedtoManager=0;$role='';
        if($request->user()->hasRole('manager')){

          $assigned=AssignedProject::select('assigned_projects.*')
          ->leftJoin('projects','assigned_projects.project_id','projects.id')
          ->where('complete',0)
          ->where('stopped',0)
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->get()
          ->count();

          $assignedtoManager=AssignedProjectManager::select('assigned_project_managers.*')
          ->leftJoin('projects','assigned_project_managers.project_id','projects.id')
          ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
          ->whereNull('assigned_projects.project_id')
          ->where('projects.status',1)
          ->where('projects.project_type_id',1)
          ->get()->count();

          $role='executive';
        }

        elseif($request->user()->hasRole('directorevaluation')){

          $assigned=AssignedProject::select('assigned_projects.*')
          ->leftJoin('projects','assigned_projects.project_id','projects.id')
          ->where('assigned_by',$request->user()->id)
          ->where('complete',0)
          ->where('stopped',0)
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->get()
          ->count();

          $role='directorE';
        }
        elseif($request->user()->hasRole('officer|evaluator')){

          $assigned=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
          ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
          ->leftjoin('projects','assigned_projects.project_id','projects.id')
          ->where('assigned_project_teams.user_id',$request->user()->id)
          ->where('acknowledge','1')
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->where('complete',0)
          ->where('stopped',0)
          ->count();
          $role='officer';
        }
      return response()->json(['assigned' => $assigned,'role'=>$role,'manager' => $assignedtoManager]);
    }

    public function getCompletedCounter(Request $request){
      $assigned=0;$assignedtoManager=0;$role='';
        if($request->user()->hasRole('manager')){

          $assigned=AssignedProject::select('assigned_projects.*')
          ->leftJoin('projects','assigned_projects.project_id','projects.id')
          ->where('complete',1)
          ->where('stopped',0)
          ->where('projects.status',1)
          ->where('projects.project_type_id',1)
          ->get()->count();

          $role='executive';

          }
        elseif($request->user()->hasRole('directorevaluation')){

          $assigned=AssignedProject::where('assigned_by',$request->user()->id)
          ->leftJoin('projects','assigned_projects.project_id','projects.id')
          ->where('acknowledge','1')
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->where('complete',1)
          ->get()
          ->count();

          $role='directorE';
        }
        elseif($request->user()->hasRole('officer|evaluator')){

          $assigned=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
          ->leftJoin('projects','assigned_projects.project_id','projects.id')
          ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
          ->where('assigned_project_teams.user_id',$request->user()->id)
          ->where('projects.project_type_id',1)
          ->where('projects.status',1)
          ->where('complete',1)
          ->count();
          $role='officer';
        }

      return response()->json(['assigned' => $assigned,'role'=>$role,'manager' => $assignedtoManager]);
    }
}
