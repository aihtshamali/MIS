<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\AssignedProject;
use App\ProjectActivity;
use App\Project;
use App\AssignedProjectActivity;
use Auth;
use App\HrMomAttachment;
use App\HrAttachment;
use App\HrMeetingPDWP;
use Illuminate\Support\Facades\Schema;
use App\Imports\AdpProjectImport;
use App\Exports\ProjectExport;
use Maatwebsite\Excel\Facades\Excel;
use App\PlantripTriprequest;
use Illuminate\Support\Collection;
use \DateTime;
use \DateTimeZone;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function upload(Request $r){
       Excel::import(new AdpProjectImport,$r->file('upload_file'));
       return view('home');
     }


     // Download Excel file
     public function ExportProjectDataSNEWise(){
       return Excel::download(new ProjectExport , 'ProjectSNEData.xlsx');
     }


    public function index()
    {

      // dd($_SERVER['DOCUMENT_ROOT'].'\Original.xlsx');
            // $activities = AssignedProjectActivity::all();
      // foreach ($activities as $activity) {
      //   // dd($activity->AssignedProject);
      //   if(isset($activity->AssignedProjectActivityProgressLog[0]))
      //   {
      //     if($activity->ProjectActivity->id == 1)
      //     {
      //       $activity->start_date = date('Y-m-d',strtotime($activity->AssignedProject->created_at));
      //       if($activity->progress==100){
      //           $activity->end_date = $activity->start_date;
      //         }
      //     }
      //     else{
      //     foreach ($activity->AssignedProjectActivityProgressLog as $progress) {
      //       if($activity->start_date == NULL){
      //         $activity->start_date = date('Y-m-d',strtotime($progress->created_at));
      //       }
      //       if($progress->progress == 100){
      //         $activity->end_date = date('Y-m-d',strtotime($progress->created_at));
      //         break;
      //       }
      //     }
      //   }
      //   $activity->save();
      //   }
      // }
      // dd("Done");
      // Converting Mom To Base64
      // $files = scandir('C:\\xampp\\htdocs\\DGME_TEST\\storage\\app\\public\\uploads\\projects\\project_agendas\\');
      // // dd($files);
      // foreach($files as $file) {
      //   $file_path  = "C:\\xampp\\htdocs\\DGME_TEST\\storage\\app\\public\\uploads\\projects\\project_agendas\\".$file;
      //   if($file != '.' && $file != '..'){
      //     $row = HrAttachment::where('attachments',$file)->first();
      //     if($row){
      //   // dd($row);
      //     $row->attachment_file = base64_encode(file_get_contents($file_path));
      //     $row->save();
      //     }
      //   }
      //   //do your work here
      // }


      // $score = app('App\Http\Controllers\ProjectAssignController')->AddScore(1025);

        // $projects = Project::all();
        // foreach($projects as $project){
        //   $score = app('App\Http\Controllers\ProjectAssignController')->AddScore($project->id);
        //   $project->score = $score;
        //   $project->save();
        // }
      // $project = AssignedProject::find($assigned_project_activity->project_id);
      // $percentage_array = [15.26,8.26,10.05,6.99,8.03,8.16,14.79,8.23,2.77,9.35,4.17,3.94];
      // $projects = AssignedProject::all();
      // $i = 0;
      // foreach ($projects as $pro) {
      //   $i=0;
      //   $total_progress = 0;
      //   foreach ($pro->AssignedProjectActivity as $activity) {
      //     $total_progress = ($total_progress  +  ( ($activity->progress/100.0) * $percentage_array[$i] ));
      //     $i+=1;
      //   }
      //   $pro->progress = $total_progress;
      //   $pro->save();
      // }
      // $project_activities = $project->AssignedProjectActivity;
      // return $project_activities;
      // foreach($project_activities as $pa){

        // print_r( ($pa->progress/100.0) * $percentage_array[$i].' ');
      //   $i += 1;
      //
      // }
      // return $total_progress;
      $triprequests = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->leftJoin('users','plantrip_members.user_id','users.id')
      ->where('plantrip_triprequests.status',0)
      ->where('plantrip_members.requested_by',1)
      ->where('plantrip_triprequests.approval_status','Pending')
      ->distinct()
      ->with('VmisRequestToTransportOfficer')
      ->get();

      $triprequestsrecommended = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->leftJoin('vmis_request_to_transport_officers','vmis_request_to_transport_officers.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('users','plantrip_members.user_id','users.id')
      ->where('plantrip_triprequests.status',0)
      ->where('plantrip_members.requested_by',1)
      ->where('vmis_request_to_transport_officers.recommended','Recommended')
      ->where('plantrip_triprequests.approval_status','Pending')
      ->distinct()
      ->with('VmisRequestToTransportOfficer')
      ->get();

       $tripcountsFordg =$triprequestsrecommended->count();      
      $tripcounts=$triprequests->count();
      // dd($tripcounts);
        return view('home',['tripcountsFordg'=> $tripcountsFordg ,'tripcounts'=>$tripcounts]);

  
    }

    public function reset_password()
    {
      return view('profile.reset');
    }
    public function visitRequest_dashboard()
    {
      $triprequests = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->leftJoin('users','plantrip_members.user_id','users.id')
      ->where('plantrip_triprequests.status',0)
      ->where('plantrip_members.requested_by',1)
      ->where('plantrip_triprequests.approval_status','Pending')
      ->distinct()
      ->with('VmisRequestToTransportOfficer')
      ->get();

      $triprequestsrecommended = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->leftJoin('vmis_request_to_transport_officers','vmis_request_to_transport_officers.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('users','plantrip_members.user_id','users.id')
      ->where('plantrip_triprequests.status',0)
      ->where('plantrip_members.requested_by',1)
      ->where('vmis_request_to_transport_officers.recommended','Recommended')
      ->where('plantrip_triprequests.approval_status','Pending')
      ->distinct()
      ->with('VmisRequestToTransportOfficer')
      ->get();

       $tripcountsFordg =$triprequestsrecommended->count();      
      $tripcounts=$triprequests->count();
        return view('visitrequest_dashboard',['tripcountsFordg'=> $tripcountsFordg,'triprequestsrecommended'=> $triprequestsrecommended,'triprequests'=>$triprequests,'tripcounts'=>$tripcounts]);
    }
    public function monitoringDashboard()
    {
      $triprequests = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->leftJoin('users','plantrip_members.user_id','users.id')
      ->where('plantrip_triprequests.status',0)
      ->where('plantrip_members.requested_by',1)
      ->where('plantrip_triprequests.approval_status','Pending')
      ->distinct()
      ->with('VmisRequestToTransportOfficer')
      ->get();
      //for officers
      $officer=PlantripTriprequest::select('plantrip_triprequests.*')
      ->leftjoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftjoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->where('plantrip_members.user_id',Auth::id())
      ->distinct()
      ->latest()
      ->get();
      $officercount= $officer->count();
      $tripcounts=$triprequests->count();
    // dd($officer[0]->PlantripRemark[0]->remarks);
    // dd($officer[0]->PlantripDriverRating->rating);
        return view('monitoring_dashboard',['officer'=>$officer ,'officercount'=>$officercount,'triprequests'=>$triprequests,'tripcounts'=>$tripcounts]);
    }
    public function reset_store(Request $request)
    {
      // dd($request->all());
      $result = $request->validate([
             'password' => 'required|string|min:6|confirmed',
         ]);
      $user=Auth::user();
      $user->password=bcrypt($request->password);
      // dd($user);
      $user->save();

      return redirect('/dashboard');
    }

    public function dashboard(){
      $officers = User::where('status',1)->get();
      $total = [];
      $person = [];
      $sum = 0;
      foreach($officers as $officer){
        $sum = 0;
        if($officer->hasRole('officer')){
          if($officer->AssignedProjectTeam){
          $assigned_project = $officer->AssignedProjectTeam;
          foreach($assigned_project as $assign){
            if($assign->assignedProject->project->project_type_id == 1)
              $sum += $assign->assignedProject->project->score*($assign->assignedProject->progress/100);
            }
            array_push($total,$sum);
            array_push($person,$officer->id);
          }
        }
      }
      $maxs = array_keys($total, max($total));
      $per = array_search(Auth::id(),$person);
      $current_score = round($total[$per],0,PHP_ROUND_HALF_UP);
      $actual_current_score = round($total[$per],0,PHP_ROUND_HALF_UP);
      $max_score = round($total[$maxs[0]],0,PHP_ROUND_HALF_UP);
      $actual_max_score = round($total[$maxs[0]],0,PHP_ROUND_HALF_UP);

      if($current_score == $max_score){
        $current_score = 100;
      }
      else{
        $current_score = round($current_score/$max_score*100,0,PHP_ROUND_HALF_UP);
      }

      $rank = 1;
      foreach ($total as $number) {
        $number = round($number/$max_score*100,0,PHP_ROUND_HALF_UP);
        if($current_score < $number){
          $rank++;
        }
      }

      $max_score = 100;

      // Charts
      $actual_total_projects = Project::select('projects.*')
      ->leftJoin('assigned_projects','projects.id','assigned_projects.project_id')
      ->leftJoin('assigned_project_teams','assigned_project_teams.id','assigned_projects.project_id')
      ->where('assigned_project_teams.user_id',Auth::id())
      ->where('projects.project_type_id',1)
      ->where('projects.status',1)
      ->get();

      $total_projects = $actual_total_projects->count();
      // $total_assigned_projects = count(AssignedProjectManager::all());
      $inprogress_projects = AssignedProject::select('assigned_projects.*')
      ->leftJoin('projects','projects.id','assigned_projects.project_id')
      ->leftJoin('assigned_project_teams','assigned_project_teams.id','assigned_projects.project_id')
      ->where('projects.project_type_id',1)
      ->where('projects.status',1)
      ->where('assigned_projects.complete',0)
      ->where('assigned_project_teams.user_id',Auth::id())
      ->count();

      $completed_projects = AssignedProject::select('assigned_projects.*')
      ->leftJoin('projects','projects.id','assigned_projects.project_id')
      ->leftJoin('assigned_project_teams','assigned_project_teams.id','assigned_projects.project_id')
      ->where('project_type_id',1)
      ->where('projects.status',1)
      ->where('assigned_projects.complete',1)
      ->where('assigned_project_teams.user_id',Auth::id())
      ->count();
      // $total_assigned_projects = ($total_projects - $inprogress_projects)-$completed_projects;
      // $actual_total_assigned_projects=Project::select('projects.*')
      // ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
      // ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
      // ->whereNull('assigned_projects.project_id')
      // ->whereNull('assigned_project_managers.project_id')
      // ->where('projects.project_type_id',1)
      // ->where('projects.status',1)
      // ->get();
      // $total_assigned_projects = $actual_total_assigned_projects->count();
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );


        // Chart two

          $projects=AssignedProject::select('assigned_projects.*')
          ->leftJoin('projects','projects.id','assigned_projects.project_id')
          ->leftJoin('assigned_project_teams','assigned_project_teams.id','assigned_projects.project_id')
          ->where('projects.project_type_id',1)
          ->where('assigned_project_teams.user_id',Auth::id())
          ->where('projects.status',1)
          ->get();
          $ranges=array();
          array_push($ranges,'0-25%');
          array_push($ranges,'26-50%');
          array_push($ranges,'51-75%');
          array_push($ranges,'76-99.99');
          array_push($ranges,'100%');
          $projectsprogress=array_fill(0,5,0);
          foreach ($projects as $project) {
            if($project->progress >=0 && $project->progress < 25){
              $projectsprogress[0]++;
            }
            else if( $project->progress < 50){
              $projectsprogress[1]++;
            }
            else if($project->progress < 75){
              $projectsprogress[2]++;
            }
            else if($project->progress < 100){
              $projectsprogress[3]++;
            }
            else{
              if($project->complete == 1){
                $projectsprogress[4]++;
              }
              else{
                $projectsprogress[3]++;
              }
            }
          }
          
          // Chart three
          $activities= AssignedProjectActivity::all();
          $projects_activities_progress = array_fill(0, 12, 0);
           $activities_data = DB::select(
            'getActiviesProgress '.Auth::id().''
            );
            // dd($activities_data);
          $final = [];
          for ($i = 0 ; $i < count($activities_data); $i++ ) {
            array_push($final,$activities_data[$i]);
            for ($j = $i+1 ; $j < count($activities_data)-1; $j++ ) {
              if($activities_data[$j]->project_id == $activities_data[$i]->project_id){
                $i++;
              }
            }
          }
          // dd($final);
          foreach ($final as $val) {
            $projects_activities_progress[$val->project_activity_id-1]++;
          }
          // dd($projects_activities_progress);

          \JavaScript::put([
            'actual_total_projects' => $actual_total_projects,
            'total_projects' => $total_projects,
            'inprogress_projects' => $inprogress_projects,
            'completed_projects' => $completed_projects,
            'officers' => $officers,
            // Chart two
            'projectsprogress'=>$projectsprogress,
            'projectsprogressranges'=>$ranges,
            // Chart Three
            'activities' => ProjectActivity::all(),
            'projects_activities_progress'=>$projects_activities_progress
            ]);

      return view('dashboard',['activities' => $activities ,'projects_activities_progress'=>$projects_activities_progress,'projectsprogress'=>$projectsprogress,'projectsprogressranges'=>$ranges,'total_projects'=>$actual_total_projects ,'inprogress_projects'=>$inprogress_projects ,'completed_projects'=>$completed_projects],compact('max_score','current_score','actual_max_score','actual_current_score','rank','person'));
    }
    //chart 11
    public function GlobalProgressWiseChart(){
      $projects=AssignedProject::select('assigned_projects.*')
      ->leftJoin('projects','projects.id','assigned_projects.project_id')
      ->where('project_type_id',1)
      ->where('projects.status',1)
      ->get();
      $ranges=array();
      array_push($ranges,'0-25%');
      array_push($ranges,'26-50%');
      array_push($ranges,'51-75%');
      array_push($ranges,'76-99.99');
      array_push($ranges,'100%');
      $projectsprogress=array_fill(0,5,0);
      foreach ($projects as $project) {
        if($project->progress >=0 && $project->progress < 25){
          $projectsprogress[0]++;
        }
        else if( $project->progress < 50){
          $projectsprogress[1]++;
        }
        else if($project->progress < 75){
          $projectsprogress[2]++;
        }
        else if($project->progress < 100){
          $projectsprogress[3]++;
        }
        else{
          if($project->complete == 1){
            $projectsprogress[4]++;
          }
          else{
            $projectsprogress[3]++;
          }
        }
      }
        \JavaScript::put([
          'projects'=>$projectsprogress,
          'ranges'=>$ranges
        ]);
        return view('executive.home.global_progress_wise_chart');
    }
}
