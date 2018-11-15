<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use App\ProjectActivity;
use App\AssignedProjectActivity;
use App\HrMeetingPDWP;
use JavaScript;
use App\AssignedSubSector;
use DB;
use Auth;
use App\HrSector;
use App\HrAgenda;
use App\HrMeetingType;
use App\AgendaType;
use App\HrProjectType;
use App\HrProjectDecision;
use App\ProjectDecision;
use App\ProjectDetail;
use App\AdpProject;
use App\HrDecision;
use App\SubSector;
use App\Sector;
use \DateTime;
use \DateTimeZone;
class ExecutiveController extends Controller
{
    //  HOME FOLDER
    public function conduct_pdwp_meeting(){
      $meetings = HrMeetingPDWP::where('status',1)->orderBy('updated_at', 'desc')->get();
      return view('executive.home.pdwp_meeting',compact('meetings'));
    }

    public function list_agendas(Request $req){
      $meeting = HrMeetingPDWP::find($req->meeting_no);
      $agendas = $meeting->HrAgenda;
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
     ->where('projects.project_type_id','1')
     ->get();

      $assigned=AssignedProject::select('assigned_projects.*')
      ->leftJoin('projects','assigned_projects.project_id','projects.id')
      ->where('complete',0)
      ->where('projects.status',1)
      ->where('projects.project_type_id',1)
      ->get();

      $assignedtoManager=AssignedProjectManager::select('assigned_project_managers.*')
      ->leftJoin('projects','assigned_project_managers.project_id','projects.id')
      ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
      ->whereNull('assigned_projects.project_id')
      ->where('projects.status',1)
      ->where('projects.project_type_id',1)
      ->get();

      $completed=AssignedProject::select('assigned_projects.*')
      ->leftJoin('projects','assigned_projects.project_id','projects.id')
      ->where('complete',1)
      ->where('projects.status',1)
      ->where('projects.project_type_id',1)
      ->get();

      return view('executive.home.index',['unassigned'=>$unassigned,'completed'=>$completed,'assignedtoManager'=>$assignedtoManager,'assigned'=>$assigned]);
    }
    public function getSectorWise(){
      $projects=AssignedProject::select('assigned_projects.*')
      ->leftJoin('assigned_sub_sectors','assigned_sub_sectors.project_id','assigned_projects.project_id')
      ->leftJoin('sub_sectors','assigned_sub_sectors.sub_sector_id','sub_sectors.id')
      ->leftJoin('sectors','sub_sectors.sector_id','sectors.id')
      ->leftJoin('projects','assigned_projects.project_id','projects.id')
      ->where('projects.project_type_id',1)
      ->orderBy('sectors.id')
      ->get();
      return view('executive.evaluation.allSectors',['projects'=>$projects]);
    }

    // Evaluation charts
    public function pems_index()
    {
      $activities= ProjectActivity::all();
      $sub_Sectors=SubSector::all();
      $sectors=Sector::all();

      $total_projects = count(Project::all());
      $total_assigned_projects = count(AssignedProject::all());
      $inprogress_projects = count(AssignedProject::where('complete',0)->get());
      $completed_projects = count(AssignedProject::where('complete',1)->get());
      $total_assigned_projects = ($total_projects - $total_assigned_projects) + ($total_assigned_projects - $inprogress_projects - $completed_projects);
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
        $projects_activities_progress =array_fill(0,12,0);
        $projects_wrt_sectors =[];
        $assignedprojects_wrt_sectors =[];
        $inprogressprojects_wrt_sectors =[];
        $totalprojects_wrt_sectors =[];
        $completedprojects_wrt_sectors =[];
        $time_against_activities=[];
        $min_time_against_activities=[];
        $max_time_against_activities=[];


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
              'getActiviesProgress'
              );

              $time_against_activities_data = DB::select(
              'timeAgainstActivities' .' '. $act->id
              );

              $time_sum = 0;
              $loop = 0;
              $min = 0;
              $max = 0;
              foreach($time_against_activities_data as $time){
                $CA = new DateTime(date('Y-m-d',strtotime($time->CA)));
                $OCA = new DateTime(date('Y-m-d',strtotime($time->OCA)));
                $FT = $OCA->diff($CA);
                $time_sum += $FT->format('%a');
                if($loop == 0){
                  $min = $FT->format('%a');
                  $max = $FT->format('%a');
                }
                else{
                  if($min > $FT->format('%a')){
                    $min = $FT->format('%a');
                  }
                  if($max < $FT->format('%a')){
                    $max = $FT->format('%a');
                  }
                }
                $loop++;
              }
              $ave=0;

              $ave = $time_sum/count($time_against_activities_data);
              $ave = (int)round($ave,0,PHP_ROUND_HALF_UP);
              array_push($min_time_against_activities, $min);
              array_push($max_time_against_activities, $max);
              array_push($time_against_activities,$ave);
              // array_push($projects_activities_progress,$activities_data);

          }

          $final = [];
          for ($i = 0 ; $i < count($activities_data); $i++ ) {
            array_push($final,$activities_data[$i]);
            for ($j = $i+1 ; $j < count($activities_data)-1; $j++ ) {
              if($activities_data[$j]->project_id == $activities_data[$i]->project_id){
                $i++;
              }
            }
          }
          foreach ($final as $val) {
            $projects_activities_progress[$val->project_activity_id-1]++;
          }


          foreach($sub_Sectors  as $ss)
           {
            $subsectors_data=DB::select(

              'getProjectsSector' .' '. $ss->id);

              array_push($projects_wrt_sectors,$subsectors_data);
          }

          foreach($sectors  as $sec)
           {
            $assignedsectors_data=DB::select(

            'getAllSectorProjects' .' '. $sec->id);

            $inprogresssectors_data=DB::select(

            'getAllSectorInprogressProjects' .' '. $sec->id);

            $sectors_data_totalProjects=DB::select(

            'getAllSectorProjectsTotal' .' '. $sec->id);
            $sectors_data_completedProjects=DB::select(

              'getAllSectorCompletedProjects' .' '. $sec->id);
            array_push($assignedprojects_wrt_sectors,$assignedsectors_data);
            array_push($inprogressprojects_wrt_sectors,$inprogresssectors_data);
            array_push($totalprojects_wrt_sectors,$sectors_data_totalProjects);
            array_push($completedprojects_wrt_sectors,$sectors_data_completedProjects);
          }

          //Project's Progress Wise Chart

          $projects=AssignedProject::all();
          $projectsprogressranges=array();
          array_push($projectsprogressranges,'0-25%');
          array_push($projectsprogressranges,'26-50%');
          array_push($projectsprogressranges,'51-75%');
          array_push($projectsprogressranges,'76-100%');
          $projectsprogress=array_fill(0,4,0);
          foreach ($projects as $project) {
            if($project->progress>0 && $project->progress < 25){
              $projectsprogress[0]++;
            }
            else if( $project->progress < 50){
              $projectsprogress[1]++;
            }
            else if($project->progress < 75){
              $projectsprogress[2]++;
            }
            else if($project->progress <= 100){
              $projectsprogress[3]++;
            }
          }
          // Chart 12

          $projects=ProjectDetail::all();
          $categories=array();
          array_push($categories,'NOT SET');
          array_push($categories,'NO');
          array_push($categories,'COST');
          array_push($categories,'STAFF');
          array_push($categories,'BOTH');
          $Sneprojects=array_fill(0,5,0);
          foreach ($projects as $project) {
            if(!$project->sne){
              $Sneprojects[0]++;
            }
            else if( $project->sne=="NO"){
              $Sneprojects[1]++;
            }
            else if($project->sne=="COST"){
              $Sneprojects[2]++;
            }
            else if($project->sne=="STAFF"){
              $Sneprojects[3]++;
            }
            else if($project->sne=="BOTH"){
              $Sneprojects[4]++;
            }
          }

          // dd($inprogressprojects_wrt_sectors);
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
        'projects_activities_progress'=>$projects_activities_progress,
        'projects_wrt_sectors'=>$projects_wrt_sectors,
        'sub_Sectors'=>$sub_Sectors,
        'sectors'=>$sectors,
        'assignedsectors_data' => $assignedsectors_data,
        'inprogressprojects_wrt_sectors'=>$inprogressprojects_wrt_sectors,
        'totalprojects_wrt_sectors'=>$totalprojects_wrt_sectors,
        'assignedprojects_wrt_sectors'=>$assignedprojects_wrt_sectors,
        'completedprojects_wrt_sectors'=>$completedprojects_wrt_sectors,
        'time_against_activities'=>$time_against_activities,
        'min_time_against_activities'=>$min_time_against_activities,
        'max_time_against_activities'=>$max_time_against_activities,
        'projectsprogress'=>$projectsprogress,
        'projectsprogressranges'=>$projectsprogressranges,
        'categories'=>$categories,
        'Sneprojects'=>$Sneprojects
      ]);
      return view('executive.home.pems_tab');
    }
    // chart1
    public function chart_one(){
      $actual_total_projects = Project::all();
      $total_projects = count($actual_total_projects);
      // $total_assigned_projects = count(AssignedProjectManager::all());
      $inprogress_projects = count(AssignedProject::where('complete',0)->get());
      $completed_projects = count(AssignedProject::where('complete',1)->get());
      // $total_assigned_projects = ($total_projects - $inprogress_projects)-$completed_projects;
      $actual_total_assigned_projects=Project::select('projects.*')
      ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
      ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
      ->whereNull('assigned_projects.project_id')
      ->whereNull('assigned_project_managers.project_id')
      ->get();
      $total_assigned_projects = count($actual_total_assigned_projects);
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );

      \JavaScript::put([
        'actual_total_projects' => $actual_total_projects,
        'total_projects' => $total_projects,
        'total_assigned_projects' => $total_assigned_projects,
        'actual_total_assigned_projects' => $actual_total_assigned_projects,
        'inprogress_projects' => $inprogress_projects,
        'completed_projects' => $completed_projects,
        'officers' => $officers,

        ]);
      return view('executive.home.chart_one',['actual_total_assigned_projects' => $actual_total_assigned_projects,'total_projects'=>$actual_total_projects ,'total_assigned_projects'=>$total_assigned_projects ,'inprogress_projects'=>$inprogress_projects ,'completed_projects'=>$completed_projects]);
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
          if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad" || (preg_match('#M[u|o]hammad*#i', $officer->first_name)==1))
          {
            $officer->first_name = "M.";
            // dd($officer);
          }
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
    public function chart_three()
    {
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
      );
      $assigned_inprogress_projects = [];
      $total_assigned_projects = [];
      foreach($officers as $officer){
        if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad" || (preg_match('#M[u|o]hammad*#i', $officer->first_name)==1))
        {
          $officer->first_name = "M.";
        }
          $data_2 = DB::select(
            'getOfficersInProgressProjectsById' .' '.$officer->id
          );
          $data_3 = DB::select(
            'getOfficersAssignedProjectById'.' '.$officer->id
          );
          array_push($assigned_inprogress_projects,count($data_2));
          array_push($total_assigned_projects,count($data_3));
        }

      \JavaScript::put([
        'officers' => $officers,
        'assigned_inprogress_projects' => $assigned_inprogress_projects,
        'total_assigned_projects' => $total_assigned_projects
        ]);
      return view('executive.home.chart_three');
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
          if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad" || (preg_match('#M[u|o]hammad*#i', $officer->first_name)==1))
          {
            $officer->first_name = "M.";
          }
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
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );
        $assigned_current_projects = [];
        // $officers = User::all();
      $total = [];
      $person = [];
      $sum = 0;
      foreach($officers as $officer){
        if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad" || (preg_match('#M[u|o]hammad*#i', $officer->first_name)==1))
        {
          $officer->first_name = "M.";
        }
        $sum = 0;
        if($officer->hasRole('officer')){
          if($officer->AssignedProjectTeam){
          $assigned_project = $officer->AssignedProjectTeam;
          foreach($assigned_project as $assign){
              $sum += $assign->assignedProject->project->score*($assign->assignedProject->progress/100);
            }
            $sum = round($sum,0,PHP_ROUND_HALF_UP);
            array_push($total,$sum);
            array_push($person,$officer);
          }
        }
      }
      // $maxs = array_keys($total, max($total));
      // $per = array_search(Auth::id(),$person);
      // $current_score = round($total[$per],0,PHP_ROUND_HALF_UP);
      // $max_score = round($total[$maxs[0]],0,PHP_ROUND_HALF_UP);

      // if($current_score == $max_score){
      //   $current_score = 100;
      // }
      // else{
      //   $current_score = round($current_score/$max_score*100,0,PHP_ROUND_HALF_UP);
      // }
      // $max_score = 100;
        // foreach($officers as $officer){
        //   if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad")
        // {
        //   $officer->first_name = "M.";
        // }
          // $data_4 = DB::select(
          //   'getOfficersCurrentProjectProgressById' .' '.$officer->id
          // );
          // $sum = 0;
          // if(count($data_4)>0){
          //   foreach($data_4 as $val)
          //   {
          //     $sum += $val->current_user_progress;
          //   }
          //   array_push($assigned_current_projects, $sum / count($data_4));
          //   }
          //   else{
          //     array_push($assigned_current_projects, 0);
          //   }
          // }

      \JavaScript::put([
        'officers' => $person,
        'assigned_current_projects'=>$total

        ]);
      return view('executive.home.chart_five',['officers' => $officers ,'assigned_current_projects'=>$assigned_current_projects]);
    }
    // chart 6
    public function chart_six(){
      $activities= AssignedProjectActivity::all();


      $projects_activities_progress = array_fill(0, 12, 0);

         $activities_data = DB::select(
          'getActiviesProgress'
          );

      $final = [];
      for ($i = 0 ; $i < count($activities_data); $i++ ) {
        array_push($final,$activities_data[$i]);
        for ($j = $i+1 ; $j < count($activities_data)-1; $j++ ) {
          if($activities_data[$j]->project_id == $activities_data[$i]->project_id){
            $i++;
          }
        }
      }
      foreach ($final as $val) {
        $projects_activities_progress[$val->project_activity_id-1]++;
      }

      \JavaScript::put([
        'activities' => ProjectActivity::all(),
        'projects_activities_progress'=>$projects_activities_progress

        ]);
      return view('executive.home.chart_six',[ 'activities' => $activities ,'projects_activities_progress'=>$projects_activities_progress]);
    }

    // chart7
    public function chart_seven(){
      $sub_Sectors=SubSector::all();


      $projects_wrt_sectors =[];

      foreach($sub_Sectors  as $ss)
        {
          $subsectors_data=DB::select(

            'getProjectsSector' .' '. $ss->id);

            array_push($projects_wrt_sectors,$subsectors_data);
        }

      \JavaScript::put([
        'sub_Sectors' => $sub_Sectors,
        'projects_wrt_sectors'=>$projects_wrt_sectors

        ]);
      return view('executive.home.chart_seven',['sub_Sectors' => $sub_Sectors, 'projects_wrt_sectors'=>$projects_wrt_sectors]);
    }

    // chart8
    public function chart_eight(){
      $sectors=Sector::all();
      $assignedprojects_wrt_sectors=[];
      $inprogressprojects_wrt_sectors =[];
      $totalprojects_wrt_sectors =[];
      $completedprojects_wrt_sectors =[];
      foreach($sectors  as $sec)
       {
        $assignedsectors_data=DB::select(

        'getAllSectorProjects' .' '. $sec->id);

        $inprogresssectors_data=DB::select(

        'getAllSectorInprogressProjects' .' '. $sec->id);

        $sectors_data_totalProjects=DB::select(

        'getAllSectorProjectsTotal' .' '. $sec->id);
        $sectors_data_completedProjects=DB::select(

          'getAllSectorCompletedProjects' .' '. $sec->id);


        array_push($assignedprojects_wrt_sectors,$assignedsectors_data);
        array_push($inprogressprojects_wrt_sectors,$inprogresssectors_data);
        array_push($totalprojects_wrt_sectors,$sectors_data_totalProjects);
        array_push($completedprojects_wrt_sectors,$sectors_data_completedProjects);

      }
      \JavaScript::put([
        'sectors'=>$sectors,
        'assignedprojects_wrt_sectors'=>$assignedprojects_wrt_sectors,
        'inprogressprojects_wrt_sectors'=>$inprogressprojects_wrt_sectors,
        'totalprojects_wrt_sectors'=>$totalprojects_wrt_sectors,
        'completedprojects_wrt_sectors'=>$completedprojects_wrt_sectors

        ]);
      return view('executive.home.chart_eight' ,['sectors'=> $sectors, 'assignedprojects_wrt_sectors'=>$assignedprojects_wrt_sectors,  'inprogressprojects_wrt_sectors'=>$inprogressprojects_wrt_sectors,
      'totalprojects_wrt_sectors'=>$totalprojects_wrt_sectors,'completedprojects_wrt_sectors'=>$completedprojects_wrt_sectors]);
    }

    // chart 9
    public function chart_nine(){
      $activities= ProjectActivity::all();
      $time_against_activities=[];
      foreach($activities as $act)
      {
       $time_against_activities_data = DB::select(
         'timeAgainstActivities' .' '. $act->id
         );

         // difference of times
         $time_sum = 0;
         foreach($time_against_activities_data as $time){
           $CA = new DateTime(date('Y-m-d',strtotime($time->CA)));
           $OCA = new DateTime(date('Y-m-d',strtotime($time->OCA)));
           $FT = $OCA->diff($CA);
           $time_sum += $FT->format('%a');
         }
         $ave = $time_sum/count($time_against_activities_data);
         $ave = (int)round($ave,0,PHP_ROUND_HALF_UP);
       array_push($time_against_activities,$ave);

     }
     \JavaScript::put([
      'activities'=> $activities,'time_against_activities'=>$time_against_activities

      ]);

      return view('executive.home.chart_nine' ,['activities'=> $activities,'time_against_activities'=>$time_against_activities]);
    }

    // chart 10
    public function chart_ten(){
      $activities= ProjectActivity::all();
      $time_against_activities=[];
      $min_time_against_activities=[];
      $max_time_against_activities=[];

      foreach($activities as $act)
      {
        $time_against_activities_data = DB::select(
        'timeAgainstActivities' .' '. $act->id
        );

        // $min_time_against_activities_data = DB::select(
        // 'MintimeAgainstActivities' .' '. $act->id
        // );

        // $max_time_against_activities_data = DB::select(
        // 'MaxtimeAgainstActivities' .' '. $act->id
        // );

        // difference of times
         $time_sum = 0;
         $loop = 0;
         $min = 0;
         $max = 0;
        foreach($time_against_activities_data as $time){
          $CA = new DateTime(date('Y-m-d',strtotime($time->CA)));
          $OCA = new DateTime(date('Y-m-d',strtotime($time->OCA)));
          $FT = $OCA->diff($CA);
          if($FT->format('%a') > 0){
          $time_sum += $FT->format('%a');
          if($loop == 0){
            $min = $FT->format('%a');
            $max = $FT->format('%a');
          }
          else{
            if($min > $FT->format('%a')){
              $min = $FT->format('%a');
            }
            if($max < $FT->format('%a')){
              $max = $FT->format('%a');
            }
          }
        }
          $loop++;
        }

        $ave = $time_sum/count($time_against_activities_data);
        $ave = (int)round($ave,0,PHP_ROUND_HALF_UP);

        // diffrence of minimum time

        // $min_CA = new DateTime($min_time_against_activities_data[0]->MIN_CA);
        // $min_OCA = new DateTime($min_time_against_activities_data[0]->MIN_OCA);
        // $min_diff = $min_OCA->diff($min_CA);
        // $min_time = $min_diff->format('%a');
        // difference of max time
        // $max_CA = new DateTime($max_time_against_activities_data[0]->MAX_CA);

        // $max_OCA = new DateTime($max_time_against_activities_data[0]->MAX_OCA);
        // $max_diff = $max_OCA->diff($max_CA);
        // $max_time = $max_diff->format('%a');

        array_push($min_time_against_activities, $min);
        array_push($time_against_activities,$ave);
        array_push($max_time_against_activities, $max);
      }
        \JavaScript::put([
          'activities'=> $activities,
          'time_against_activities'=>$time_against_activities,
          'min_time_against_activities'=>$min_time_against_activities,
          'max_time_against_activities'=>$max_time_against_activities
          ]);
       return view('executive.home.chart_ten',['activities'=> $activities,'time_against_activities'=>$time_against_activities,'min_time_against_activities'=>$min_time_against_activities,'max_time_against_activities'=>$max_time_against_activities]);
    }

    //chart 11
    public function GlobalProgressWiseChart(){
      $projects=AssignedProject::all();
      $ranges=array();
      array_push($ranges,'0-24.999%');
      array_push($ranges,'25-49.999%');
      array_push($ranges,'50-74.999%');
      array_push($ranges,'75-100%');
      $projectsprogress=array_fill(0,4,0);
      foreach ($projects as $project) {
        if($project->progress>0 && $project->progress < 25){
          $projectsprogress[0]++;
        }
        else if( $project->progress < 50){
          $projectsprogress[1]++;
        }
        else if($project->progress < 75){
          $projectsprogress[2]++;
        }
        else if($project->progress <= 100){
          $projectsprogress[3]++;
        }
      }
        \JavaScript::put([
          'projects'=>$projectsprogress,
          'ranges'=>$ranges
        ]);
        return view('executive.home.global_progress_wise_chart');
    }
    //chart 12
    public function SneWiseChart(){
      $projects=ProjectDetail::all();
      $categories=array();
      array_push($categories,'NOT SET');
      array_push($categories,'NO');
      array_push($categories,'COST');
      array_push($categories,'STAFF');
      array_push($categories,'BOTH');
      $Sneprojects=array_fill(0,5,0);
      foreach ($projects as $project) {
        if(!$project->sne){
          $Sneprojects[0]++;
        }
        else if( $project->sne=="NO"){
          $Sneprojects[1]++;
        }
        else if($project->sne=="COST"){
          $Sneprojects[2]++;
        }
        else if($project->sne=="STAFF"){
          $Sneprojects[3]++;
        }
        else if($project->sne=="BOTH"){
          $Sneprojects[4]++;
        }
      }
        \JavaScript::put([
          'Sneprojects'=>$Sneprojects,
          'categories'=>$categories
        ]);
        return view('executive.home.sne_wise_chart');
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
      $projects=Project::select('projects.*')
      ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
      ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
      ->whereNull('assigned_project_managers.project_id')
      ->whereNull('assigned_projects.project_id')
      ->where('projects.project_type_id','1')
      ->get();

      $assigned=AssignedProject::all();
      $managerProjects=AssignedProjectManager::select('assigned_project_managers.*')
      ->leftJoin('projects','projects.id','assigned_project_managers.project_id')
      ->where('projects.project_type_id','1')
      ->get();
      $projects=AssignedProject::all();
      // $managerProjects=AssignedProjectManager::all();
      // dd($projects);
      return view('executive.evaluation.assigned',['projects'=>$projects,'managerProjects'=>$managerProjects,'assigned'=>$assigned]);
    }
    public function evaluation_completedprojects(){
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->where('projects.project_type_id','1')
     ->where('projects.status',1)
     ->whereNull('assigned_projects.project_id')
     ->get();
      $assigned=AssignedProject::all();
      return view('executive.evaluation.completed',['assigned'=>$assigned,'unassigned'=>$unassigned]);
    }

    public function reviewed_projects()
      {
        return view('executive.evaluation.reviewed_projects');
      }

      // public function monitoring_unassigned()
      // {
      //   $unassigned=Project::select('projects.*')
      //   ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
      //   ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
      //   ->whereNull('assigned_project_managers.project_id')
      //   ->whereNull('assigned_projects.project_id')
      //   ->get();
      //   // dd($unassigned);
      //    $assigned=AssignedProject::all();
      //    $assignedtoManager=AssignedProjectManager::all();
      //    $managers=User::select('roles.*','role_user.*','users.*')
      //      ->leftJoin('role_user','role_user.user_id','users.id')
      //      ->leftJoin('roles','roles.id','role_user.role_id')
      //      ->where('roles.name','manager')
      //      ->get();
      //      $officers=User::select('roles.*','role_user.*','users.*')
      //      ->leftJoin('role_user','role_user.user_id','users.id')
      //      ->leftJoin('roles','roles.id','role_user.role_id')
      //      ->where('roles.name','officer')
      //      ->get();

      //      $users = User::select('users.*')
      //             ->leftJoin('role_user','role_user.user_id','users.id')
      //             ->leftJoin('roles','roles.id','role_user.role_id')
      //             ->where('roles.name','officer')
      //             ->get();

      //      $projects=Project::select('projects.*')
      //     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
      //     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
      //     ->whereNull('assigned_project_managers.project_id')
      //     ->whereNull('assigned_projects.project_id')
      //     ->where('projects.project_type_id','2')
      //     ->get();
      //     // dd($projects);
      //      return view('executive.monitoring.unassigned',['unassigned'=>$unassigned,'assignedtoManager'=>$assignedtoManager,'assigned'=>$assigned,'officers'=>$officers,'managers'=>$managers,'projects'=>$projects,'users'=>$users]);
      // }
      // public function monitoring_inprogress()
      // {
      //   return view('executive.monitoring.inprogress');
      // }
      // public function monitoring_completed()
      // {
      //   return view('executive.monitoring.completed');
      // }


    public function monitoring_unassigned()
    {
      $projects=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->where('projects.project_type_id',2)
     ->where('projects.status',1)
     ->whereNull('assigned_projects.project_id')
     ->whereNull('assigned_project_managers.project_id')
     ->get();
     // dd($projects);
      return view('_Monitoring._Manager.unassigned',['projects'=>$projects]);
    }
    public function monitoring_inprogress()
    {
      $projects=AssignedProjectManager::select('assigned_project_managers.*')
      ->leftJoin('projects','projects.id','assigned_project_managers.project_id')
      ->where('projects.status',1)
      ->where('projects.project_type_id','2')
      ->get();
      return view('_Monitoring._Manager.inprogress',['projects'=>$projects]);
    }
    public function monitoring_completed()
    {
      return view('_Monitoring._Manager.completed');
    }

}
