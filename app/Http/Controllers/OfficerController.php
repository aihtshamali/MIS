<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\ProjectAssigned;
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
    $data=ProjectAssigned::find($request->id);

    $data->complete='1';

    $data->save();

    return redirect('officer/activities_evaluation');
   }




  //  public function review_forms(Request $request)
  //  {
  //   $data=ProjectAssigned::find($request->id);
  //   $data->acknowledge='1';
  //   $data->save();
  //   dd($data);
  //   return redirect()->back();
  //  }

   public function evaluation_index_officersidenav()
   {
      $officer=ProjectAssigned::where('acknowledge','0')->get();
       return view('inc.officer_sidenav')->with('officer',$officer);
   }

    public function evaluation_index()
    {

       $officer=ProjectAssigned::where('acknowledge','0')->get();

        return view('officer.evaluation_projects.new_assigned')->with('officer',$officer);
    }


    public function review_form($id)
    {

      $project_data=ProjectAssigned::where('assigned_projects.acknowledge','0')
      ->where('assigned_projects.project_id',$id)
      ->first();
      
      // dd($project_data->project);
      // $projectdetails_data=ProjectDetail::select('project_details.*','projects.*')
      // ->leftJoin('projects','project_details.project_id','projects.id')
      // ->where('project_details.project_id',$id)
      // ->get();

      return view('officer.evaluation_projects.reviewform',['project_data'=>$project_data]);
    }


    public function evaluation_inprogress()
    {
      $officer=ProjectAssigned::where('acknowledge','1')->get();
      // dd($officer);
      return view('officer.evaluation_projects.inprogress')->with('officer',$officer);
    }


    public function evaluation_activities($id){

      $activities=ProjectActivity::all();
      $project_data=ProjectAssigned::select('assigned_projects.*','assigned_project_teams.*')
      ->leftJoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      ->where('assigned_projects.acknowledge','1')->where('assigned_projects.project_id',$id)
      ->get();
      // dd($project_data);
      // $team_mem= AssignedProjectTeam::where('project_id')get();

      // dd( $project_data);
      return view('officer.evaluation_projects.activities',['activities'=>$activities,'project_data'=>$project_data,'project_id'=>$id]);
    }

    public function evaluation_completed(){
      $officer=ProjectAssigned::where('complete','1')->where('acknowledge','1')->get();

      return view('officer.evaluation_projects.completed')->with('officer',$officer);
    }






}
