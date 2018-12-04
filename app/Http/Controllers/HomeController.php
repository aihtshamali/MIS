<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\AssignedProject;
use App\Project;
use App\AssignedProjectActivity;
use Auth;
use App\HrMomAttachment;
use App\HrAttachment;
use App\HrMeetingPDWP;
use Illuminate\Support\Facades\Schema;
use App\Imports\AdpProjectImport;
use Maatwebsite\Excel\Facades\Excel;
use App\PlantripTriprequest;

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


      return view('home');
    }

    public function reset_password()
    {
      return view('profile.reset');
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

      
      $tripcounts=$triprequests->count();
      // dd($tripcounts);
      $officer=PlantripTriprequest::select('plantrip_triprequests.*')
      ->leftjoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftjoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->where('plantrip_members.user_id',Auth::id())
      // ->where('plantrip_triprequests.status',0)
      ->where('plantrip_triprequests.approval_status','Pending')
      ->orWhere('approval_status','Approved')
      ->orWhere('approval_status','Not Approved')
      ->distinct()
      ->get();
      // dd($officer[1]->VmisRequestToTransportOfficer->VmisAssignedDriver);
        // dd($triprequests);
        return view('monitoring_dashboard',['triprequests'=>$triprequests,'tripcounts'=>$tripcounts,'officer'=>$officer]);
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
      $officers = User::all();
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
      return view('dashboard',compact('max_score','current_score','actual_max_score','actual_current_score','rank','person'));
    }
}
