<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\ProjectAssigned;
use App\Project;
use App\ProjectActivity;
use App\AssignedProjectTeam;
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
    return redirect('officer/inprogress_evaluation');  
   }




   public function assignProjectAcknowledged(Request $request)
   {
    $data=ProjectAssigned::find($request->id);
    $data->acknowledge='1';
    $data->save();
    
    return redirect()->back();  
   }
    
   public function evaluation_index_officersidenav()
   {
      $officer=ProjectAssigned::where('acknowledge','0')->get();
       return view('inc.officer_sidenav')->with('officer',$officer);
   }

    public function evaluation_index()
    {
       $officer=ProjectAssigned::where('acknowledge','0')->get();
      //  dd($officer);
        return view('officer.evaluation_projects.new_assigned')->with('officer',$officer);
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
      return view('officer.evaluation_projects.activities',['activities'=>$activities,'project_data'=>$project_data]);
    }

    public function evaluation_completed(){
      $officer=ProjectAssigned::where('complete','1')->where('acknowledge','1')->get();
     
      return view('officer.evaluation_projects.completed')->with('officer',$officer);
    }
    

   

   

}
