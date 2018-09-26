<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use App\ProjectActivity;
use App\HrMeetingPDWP;
use JavaScript;

use DB;
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
    public function getSectorWise(){
      $projects=AssignedProject::select('assigned_projects.*')
      ->leftJoin('assigned_sub_sectors','assigned_sub_sectors.project_id','assigned_projects.project_id')
      ->leftJoin('sub_sectors','assigned_sub_sectors.sub_sector_id','sub_sectors.id')
      ->leftJoin('sectors','sub_sectors.sector_id','sectors.id')
      ->orderBy('sectors.id')->get();
      // dd($projects);
      return view('executive.evaluation.allSectors',['projects'=>$projects]);
    }
    public function pems_index(){
      $activities= ProjectActivity::all();
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
        $assigned_inprogress_projects = [];
        $assigned_completed_projects = [];
        $assigned_current_projects =[];
        $projects_activities_progress =[];

          foreach($officers as $officer)
           {
            $data = DB::select(
            'getOfficersAssignedProjectById' .' '.$officer->id
            );
            $data_2 = DB::select(
            'getOfficersInProgressProjectsById' .' '.$officer->id
            );
            $data_3 = DB::select(
            'getOfficersCompletedProjectsById' .' '.$officer->id
            );
            $data_4 = DB::select(
            'getOfficersCurrentProjectProgressById' .' '.$officer->id
            );
            $sum = 0;

            array_push($assigned_projects,count($data));
            array_push($assigned_inprogress_projects,count($data_2));
            array_push($assigned_completed_projects,count($data_3));
            if(count($data_4)>0){
            foreach($data_4 as $val)
            {
              $sum += $val->current_user_progress;
            }
            array_push($assigned_current_projects, $sum / count($data_4));
            }
            else{
              array_push($assigned_current_projects, 0);
            }
          }

          foreach($activities as $act)
        {
          $activities_data = DB::select(
            'getActiviesProgress' .' '.$act->id
            );
            array_push($projects_activities_progress,count($activities_data));

        }



          \JavaScript::put([
        'total_projects' => $total_projects,
        'total_assigned_projects' => $total_assigned_projects,
        'inprogress_projects' => $inprogress_projects,
        'completed_projects' => $completed_projects,
        'officers' => $officers,
        'activities'=> $activities,
        'assigned_projects' => $assigned_projects,
        'assigned_inprogress_projects' => $assigned_inprogress_projects,
        'assigned_completed_projects' => $assigned_completed_projects,
        'assigned_current_projects'=>$assigned_current_projects,
        'projects_activities_progress'=>$projects_activities_progress
      ]);
      return view('executive.home.pems_tab');
    }
    // chart1
    public function chart_one(){
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

      \JavaScript::put([
        'total_projects' => $total_projects,
        'total_assigned_projects' => $total_assigned_projects,
        'inprogress_projects' => $inprogress_projects,
        'completed_projects' => $completed_projects,
        'officers' => $officers,

        ]);
      return view('executive.home.chart_one',['total_projects'=>$total_projects ,'total_assigned_projects'=>$total_assigned_projects ,'inprogress_projects'=>$inprogress_projects ,'completed_projects'=>$completed_projects]);
    }
    // chart2
    public function chart_two(){
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

      \JavaScript::put([
        'officers' => $officers,
        'assigned_projects' => $assigned_projects,

        ]);
      return view('executive.home.chart_two',['officers' => $officers,'assigned_projects' => $assigned_projects]);
    }

    // chart3
    public function chart_three(){
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
        $assigned_inprogress_projects = [];
        foreach($officers as $officer){

          $data_2 = DB::select(
            'getOfficersInProgressProjectsById' .' '.$officer->id
          );
          array_push($assigned_inprogress_projects,count($data_2));
        }

      \JavaScript::put([
        'officers' => $officers,
        'assigned_inprogress_projects' => $assigned_inprogress_projects,

        ]);
      return view('executive.home.chart_three',['officers' => $officers, 'assigned_inprogress_projects' => $assigned_inprogress_projects]);
    }

    // chart4
    public function chart_four(){
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
        $assigned_completed_projects = [];
        foreach($officers as $officer){

          $data_3 = DB::select(
            'getOfficersCompletedProjectsById' .' '.$officer->id
          );
          array_push($assigned_completed_projects,count($data_3));
        }

      \JavaScript::put([
        'officers' => $officers,
        'assigned_completed_projects' => $assigned_completed_projects,

        ]);
      return view('executive.home.chart_four',['officers' => $officers,'assigned_completed_projects' => $assigned_completed_projects]);
    }
    // chart5
    public function chart_five(){
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
        $assigned_current_projects = [];
        foreach($officers as $officer){
          $data_4 = DB::select(
            'getOfficersCurrentProjectProgressById' .' '.$officer->id
          );
          $sum = 0;
          if(count($data_4)>0){
            foreach($data_4 as $val)
            {
              $sum += $val->current_user_progress;
            }
            array_push($assigned_current_projects, $sum / count($data_4));
            }
            else{
              array_push($assigned_current_projects, 0);
            }
          }

      \JavaScript::put([
        'officers' => $officers,
        'assigned_current_projects'=>$assigned_current_projects
        
        ]);
      return view('executive.home.chart_five',['officers' => $officers ,'assigned_current_projects'=>$assigned_current_projects]);
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
