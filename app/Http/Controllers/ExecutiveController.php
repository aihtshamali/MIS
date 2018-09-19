<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use App\HrMeetingPDWP;
use JavaScript;
use DB;
class ExecutiveController extends Controller
{
  //  HOME FOLDER
    public function conduct_pdwp_meeting(){
      $meetings = HrMeetingPDWP::where('status',1)->orderBy('updated_at', 'desc')->get();
      return view('executive.home.pdwp_meeting',compact('meetings'));
    }

    public function list_agendas(Request $req){
      // dd($req->all());
      $meeting = HrMeetingPDWP::find($req->meeting_no);
      // dd($meeting);
      $agendas = $meeting->HrAgenda;
      // dd($agendas);
      return view('executive.home.pdwp_meeting_agendas',compact('agendas'));

    }

    public function index(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      $assignedtoManager=AssignedProjectManager::all();
      return view('executive.home.index',['unassigned'=>$unassigned,'assignedtoManager'=>$assignedtoManager,'assigned'=>$assigned]);
    }
    public function evms_tabs(){
      return view('executive.home.evaluation_tabs');
    }

    public function pems_index(){
      $total_projects = count(Project::all());
      $total_assigned_projects = count(AssignedProject::all());
      $inprogress_projects = count(AssignedProject::where('acknowledge',1)->get());
      $completed_projects = count(AssignedProject::where('complete',1)->get());
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );
        $assigned_projects = [];
        foreach($officers as $officer){
          
      $data = DB::select(
        'getOfficersAssignedProjectById' .' '.$officer->id
      );
          array_push($assigned_projects,count($data));
        }
        // dd($assigned_projects);
      // $officers=count();
      \JavaScript::put([
        'total_projects' => $total_projects,
        'total_assigned_projects' => $total_assigned_projects,
        'inprogress_projects' => $inprogress_projects,
        'completed_projects' => $completed_projects,
        'officers' => $officers,
        'assigned_projects' => $assigned_projects
    ]);
      return view('executive.home.pems_tab');
    }

    public function pmms_index(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      $assignedtoManager=AssignedProjectManager::all();
      return view('executive.home.pmms_tab',['assigned'=>$assigned,'assignedtoManager'=>$assignedtoManager,'unassigned'=>$unassigned]);
    }

    public function tpv_index(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=$projects=AssignedProject::all();
      return view('executive.home.tpv_tab',['assigned'=>$assigned,'unassigned'=>$unassigned]);
    }

    public function specialassign_index(){
      return view('executive.home.specialassign_tab',['assigned'=>$assigned,'unassigned'=>$unassigned]);
    }

    public function inquiry_index(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      return view('executive.home.inquiry_tab',['assigned'=>$assigned,'unassigned'=>$unassigned]);
    }

    public function other_index(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=$projects=AssignedProject::all();
      return view('executive.home.other_tab',['assigned'=>$assigned,'unassigned'=>$unassigned]);
    }
// EVALUATION FOLDER
    // public function evaluation_index(){
    //   $managers=User::select('roles.*','role_user.*','users.*')
    //   ->leftJoin('role_user','role_user.user_id','users.id')
    //   ->leftJoin('roles','roles.id','role_user.role_id')
    //   ->where('roles.name','manager')
    //   ->get();
    //   $officers=User::select('roles.*','role_user.*','users.*')
    //   ->leftJoin('role_user','role_user.user_id','users.id')
    //   ->leftJoin('roles','roles.id','role_user.role_id')
    //   ->where('roles.name','officer')
    //   ->get();
    //   $projects = Project::select('projects.*')
    //   ->rightJoin('assigned_projects','assigned_projects.project_id','projects.id')
    //   ->get();
    //   dd($projects);
    //   $users = User::all();
    //   return view('project_assigned.index',['officers'=>$officers,'managers'=>$managers,'projects'=>$projects,'users'=>$users]);
    // }

    public function evaluation_assignedprojects(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      $assignedtoManager=AssignedProjectManager::all();
      $projects=AssignedProject::all();
      $managerProjects=AssignedProjectManager::all();
      // dd($projects);
      return view('executive.evaluation.assigned',['projects'=>$projects,'managerProjects'=>$managerProjects,'assignedtoManager'=>$assignedtoManager,'assigned'=>$assigned,'unassigned'=>$unassigned]);
    }
    public function evaluation_completedprojects(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      return view('executive.evaluation.completed',['assigned'=>$assigned,'unassigned'=>$unassigned]);
    }

    public function reviewed_projects()
    {
      return view('executive.evaluation.reviewed_projects');
    }


}
