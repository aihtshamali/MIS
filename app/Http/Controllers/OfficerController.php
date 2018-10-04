<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use App\AssignedProjectManager;
use App\AssignedProject;
use App\AssignedProjectActivityProgressLog;
use App\ProjectDetail;
use App\AssignedActivityAttachment;
use App\Project;
use App\AssigningForum;
use App\SponsoringAgency;
use App\AssignedSponsoringAgency;
use App\ExecutingAgency;
use App\AssignedExecutingAgency;
use App\ProjectActivity;
use App\AssignedProjectTeam;
use App\ProjectType;
use App\Notification;
use App\EvaluationType;
use App\ProblematicRemarks;
use App\AssignedProjectActivity;
use Illuminate\Support\Facades\Redirect;

class OfficerController extends Controller
{
  //  Evaluation Folder
  public function evaluation_main()
  {
    return view('officer.evaluation_projects.main');
  }

  public function activitiesSubmit(Request $request)
   {
    $data=AssignedProject::find($request->id);

    $data->complete='1';

    $data->save();
    return redirect('officer/activities_evaluation');
   }
   public function review_forms(Request $request)
   {
     // dd($request->all());
    $data=AssignedProject::find($request->assigned_project_id);
    $data->acknowledge='1';
    // dd($data);
    $data->save();
    return redirect()->route('inprogress_evaluation');
   }
   public function saveActivityAttachment(Request $request)
   {
     // dd($request->all());
    if($request->hasFile('activity_attachment')){
      $data =new AssignedActivityAttachment();
      $request->file('activity_attachment')->store('public/uploads/projects/project_activities');
      $file_name = $request->file('activity_attachment')->hashName();
      $data->project_attachements=$file_name;
      $data->assigned_project_activity_id=$request->attachment_activity;
      $data->attachment_name=$request->attachment_name;
      $data->save();
    }
    // dd($data);
    return redirect()->back();
   }

   public function evaluation_index_officersidenav()
   {
      $officer=AssignedProject::select('assigned_projects.*')
      ->where('acknowledge','0')
      ->get();
       return view('inc.officer_sidenav')->with('officer',$officer);
   }

    public function evaluation_index()
    {
      $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('acknowledge','0')
      ->where('user_id',Auth::id())
      ->count();
      $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('user_id',Auth::id())
      ->where('acknowledge','1')
      ->count();
       $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
       ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
       ->where('acknowledge','0')
       ->where('user_id',Auth::id())
       ->get();

       // dd($officer);
        return view('officer.evaluation_projects.new_assigned',['officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount,'officer'=>$officer]);
    }


    public function review_form($id)
    {
      $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('acknowledge','0')
      ->where('user_id',Auth::id())
      ->count();
      $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('user_id',Auth::id())
      ->where('acknowledge','1')
      ->count();
      $project_data=AssignedProject::where('assigned_projects.acknowledge','0')
      ->where('assigned_projects.project_id',$id)
      ->first();
      return view('officer.evaluation_projects.reviewform',['project_data'=>$project_data,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
    }


    public function evaluation_inprogress()
    {

      $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('acknowledge','0')
      ->where('complete',0)
      ->where('user_id',Auth::id())
      ->count();
      $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('user_id',Auth::id())
      ->where('acknowledge','1')
      ->where('complete',0)
      ->get();

      $progress=AssignedProject::select('assigned_projects.*','assigned_project_activities.*')
      ->leftjoin('assigned_project_activities ','assigned_project_activities.project_id','assigned_projects.project_id')
      ->where('user_id',Auth::id())
      ->get();


      return view('officer.evaluation_projects.inprogress',['progress'=> $progress,'officer'=>$officer,'officerInProgressCount'=>$officer->count(),'officerAssignedCount'=>$officerAssignedCount]);
    }


    public function evaluation_activities($id){

      $activities=Project::find($id)->AssignedProject->AssignedProjectActivity;

       //saving progress
       $assigned_progress=Project::find($id)->AssignedProject;
      //  dd($assigned_progress);
       $average_progress=round($assigned_progress->progress, 0, PHP_ROUND_HALF_UP);
      //  $assigned_progress->save();

      $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('acknowledge','0')
      ->where('user_id',Auth::id())
      ->count();
      $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('user_id',Auth::id())
      ->where('acknowledge','1')
      ->count();
      $project_data=AssignedProject::select('assigned_projects.*')
      ->leftJoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      ->where('assigned_projects.acknowledge','1')->where('assigned_projects.project_id',$id)
      ->first();

      // // $problematicRemarks=ProblematicRemarks::select('problematic_remarks.*','users.first_name','users.last_name','profile_pic')
      // // ->leftJoin('users','users.id','problematic_remarks.user_id')
      // // ->leftJoin('user_details','user_details.user_id','users.id')
      // // ->where('project_id',$id)
      // // ->orderBy('problematic_remarks.created_at','DESC')
      // // ->orderBy('problematic_remarks.assigned_project_activity_id','ASC')
      // ->get();

      $icons = [
                'pdf' => 'pdf',
                'doc' => 'word',
                'docx' => 'word',
                'xls' => 'excel',
                'xlsx' => 'excel',
                'ppt' => 'powerpoint',
                'pptx' => 'powerpoint',
                'txt' => 'text',
                'png' => 'image',
                'jpg' => 'image',
                'jpeg' => 'image',
            ];

      return view('officer.evaluation_projects.activities',['activities'=>$activities,'average_progress'=>$average_progress,'icons'=>$icons,'project_data'=>$project_data,'project_id'=>$id,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
    }
    public function projectCompleted(Request $request){
      $projectCompleted = AssignedProject::find($request->assigned_project_id);
      if($projectCompleted){
        $projectCompleted->complete= True;
        $projectCompleted->completion_date=date('Y-m-d');
        $projectCompleted->save();
      }
      return redirect()->route('completed_evaluation');
    }
    public function evaluation_completed(){

      $officer=AssignedProject::where('complete','True')->where('acknowledge','1')->get();
      // dd($officer);
      return view('officer.evaluation_projects.completed')->with('officer',$officer);
    }

    public function save_percentage(Request $request)
    {
      $data =  $request['data'];
      $percentage = strtok($data,",");
      $project_id = strtok(",");
      $activity_id = strtok(",");
      $assigned_project_activity = AssignedProjectActivity::find($activity_id);
      $assigned_project_activity->progress = $percentage;
      $assigned_project_activity->save();
      $assigned_project_activities_id = $assigned_project_activity->id;
      $assigned_project_activities_progress_log = new AssignedProjectActivityProgressLog();
      $assigned_project_activities_progress_log->assigned_project_activities_id = $assigned_project_activities_id;
      $assigned_project_activities_progress_log->progress = $percentage;
      $assigned_project_activities_progress_log->save();
      //Saving GLobal Percentage
      $project = AssignedProject::find($assigned_project_activity->project_id);
      // $project = $project->AssignedProject;
      // return $project->AssignedProjectActivity;
      $project_activities = $project->AssignedProjectActivity;
      // return $project_activities;
      $total_progress = 0;
      $percentage_array = [15.26,8.26,10.05,6.99,8.03,8.16,14.79,8.23,2.77,9.35,4.17,3.94];
      $i = 0;
      foreach($project_activities as $pa){
        $total_progress = ($total_progress  +  ( ($pa->progress/100.0) * $percentage_array[$i] ));

        // print_r( ($pa->progress/100.0) * $percentage_array[$i].' ');
        $i += 1;

      }
      // return $total_progress;
      $project->progress = $total_progress;
      $project->save();
      return 'Done';
    }






}
