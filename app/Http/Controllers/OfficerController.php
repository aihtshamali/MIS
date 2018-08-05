<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use App\AssignedProject;
use App\ProjectDetail;
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
     // dd($request->assigned_project_id);
    $data=AssignedProject::find($request->assigned_project_id);
    $data->acknowledge='1';
    // dd($data);
    $data->save();
    return redirect()->route('inprogress_evaluation');
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

      // dd($project_data);
      // $projectdetails_data=ProjectDetail::select('project_details.*','projects.*')
      // ->leftJoin('projects','project_details.project_id','projects.id')
      // ->where('project_details.project_id',$id)
      // ->get();

      return view('officer.evaluation_projects.reviewform',['project_data'=>$project_data,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
    }


    public function evaluation_inprogress()
    {
      $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('acknowledge','0')
      ->where('user_id',Auth::id())
      ->count();
      $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('user_id',Auth::id())
      ->where('acknowledge','1')
      ->get();
      // dd($officer);
      return view('officer.evaluation_projects.inprogress',['officer'=>$officer,'officerInProgressCount'=>$officer->count(),'officerAssignedCount'=>$officerAssignedCount]);
    }


    public function evaluation_activities($id){

      $activities=ProjectActivity::all();
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

      $project_data=AssignedProject::select('assigned_projects.*','assigned_project_teams.*')
      ->leftJoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      ->where('assigned_projects.acknowledge','1')->where('assigned_projects.project_id',$id)
      ->get();
      // dd($project_data);
      // $team_mem= AssignedProjectTeam::where('project_id')get();

      // dd( $project_data);
      return view('officer.evaluation_projects.activities',['activities'=>$activities,'project_data'=>$project_data,'project_id'=>$id,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
    }

    public function evaluation_completed(){
      $officer=AssignedProject::where('complete','1')->where('acknowledge','1')->get();

      return view('officer.evaluation_projects.completed')->with('officer',$officer);
    }






}
