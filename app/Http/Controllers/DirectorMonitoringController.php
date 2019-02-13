<?php

namespace App\Http\Controllers;


use App\DirectorEvaluation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use App\Sector;
use Auth;
use DB;
use App\AssignedProjectTeam;
use Illuminate\Database\Eloquent\Collection;
use jeremykenedy\LaravelRoles\Models\Role;

class DirectorMonitoringController extends Controller
{
    public function index()
     {

        return view('Director.Monitoring.home.index');
     }
    public function pems_index()
     {
      return view('Director.Monitoring.home.pems_tab');
    }

    public function pmms_index(){

      return view('Director.Monitoring.home.pmms_tab');
    }

    public function tpv_index(){
      return view('Director.Monitoring.home.tpv_tab');
    }

    public function inquiry_index(){
      return view('Director.Monitoring.home.inquiry_tab');
    }

    public function monitoring_unassignedprojects()
    {
      $projects=AssignedProjectManager::select('assigned_project_managers.*')
      ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
      ->leftJoin('projects','assigned_project_managers.project_id','projects.id')
      ->where('assigned_project_managers.user_id',Auth::id())
      ->where('projects.project_type_id',2)
      ->where('projects.status',1)
      ->whereNull('assigned_projects.project_id')
      ->get();
      // TODO
      $priority='low_priority';
      // dd($projects);
      return view('_Monitoring._Director.unassigned',['projects'=>$projects,'priority'=>$priority]);
    }

    public function monitoring_inprogressprojects()
    {
      $projects=AssignedProject::select('assigned_projects.*')->where('assigned_by',Auth::id())
         ->leftjoin('projects','projects.id','assigned_projects.project_id')
         ->where('projects.status',1)
         ->where('complete',0)
         ->get();
      // dd($projects[0]->Project->ProjectDetail);
      return view('_Monitoring._Director.inprogress',['projects'=>$projects]);
    }
    public function monitoring_completeprojects()
    {
      return view('_Monitoring._Director.completed');
    }
}
