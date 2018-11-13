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
      ->where('projects.project_type_id','2')
      ->where('assigned_project_managers.user_id',Auth::id())
      ->whereNull('assigned_projects.project_id')
      ->get();
      // dd($projects);
      // $assigned=AssignedProject::where('assigned_by',Auth::id())->get();
      // $officers = User::all();
      // $projects = AssignedProject::all();
      // $sectors = Sector::all();
      // $p=AssignedProjectManager::select('assigned_project_managers.*')
      //   ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
      //   ->where('user_id',Auth::id())
      //   ->whereNull('assigned_projects.project_id')
      //   ->get();
      // return view('Director.Monitoring.monitoring_projects.unassigned',compact('assigned','officers','projects','sectors','p'));
      return view('_Monitoring._Director.unassigned',['projects'=>$projects]);
    }

    public function monitoring_inprogressprojects()
    {
      return view('_Monitoring._Director.inprogress');
    }
    public function monitoring_completeprojects()
    {
      return view('_Monitoring._Director.completed');
    }
}
