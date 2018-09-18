<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use App\HrMeetingPDWP;
use App\HrSector;
use App\HrAgenda;
use App\HrMeetingType;
use App\AgendaType;
use App\HrProjectType;
use App\HrProjectDecision;
use App\ProjectDecision;
use App\AdpProject;
use App\HrDecision;
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
      $adp = AdpProject::orderBy('gs_no')->get();
      $sectors = HrSector::all();
      $hr_decisions=HrDecision::where('status',1)->get();
      $meeting_types = HrMeetingType::all();
      $agenda_types = AgendaType::all();
      $agenda_statuses = HrProjectType::all();
      \JavaScript::put([
          'projects' => $adp
      ]);

      return view('executive.home.pdwp_meeting_agendas',compact('meeting','agendas','hr_decisions','sectors','meeting_types','agenda_types','agenda_statuses','adp'));

    }
    public function CommentAgenda(Request $req ){
      // dd($req->all());
      $i=0;
      foreach ($req->agenda_id as $agenda_id) {
        $agenda= HrAgenda::find($agenda_id);
        if(isset($req->actual_start_time[$i]) && $req->actual_start_time[$i]!=""){
          $agenda->agenda_actual_start_time=$req->actual_start_time[$i];
        }
        if(isset($req->actual_end_time[$i]) && $req->actual_end_time[$i]){
          $agenda->agenda_actual_end_time=$req->actual_end_time[$i];
        }
        $agenda->save();
        if(isset($req->agenda_decision[$i]) && $req->agenda_decision[$i]!=""){
          $agendaDecision= new HrProjectDecision();
          $agendaDecision->hr_meeting_p_d_w_p_id=$req->hr_meeting_id;
          $agendaDecision->hr_decision_id=$req->agenda_decision[$i];
          $agendaDecision->comments=$req->agenda_comments[$i];
          $agendaDecision->hr_agenda_id=$agenda_id;
          $agendaDecision->save();
        }
        $i++;
      }
      return redirect()->route('Conduct_PDWP_Meeting');
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

    public function pems_index(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      $assignedtoManager=AssignedProjectManager::all();
      return view('executive.home.pems_tab',['assigned'=>$assigned,'assignedtoManager'=>$assignedtoManager,'unassigned'=>$unassigned]);
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
