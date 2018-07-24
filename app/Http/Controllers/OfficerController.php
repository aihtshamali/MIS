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
    return redirect()->back();  
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
        return view('officer.evaluation_projects.new_assigned')->with('officer',$officer);
    }

    public function evaluation_inprogress()
    {
      $officer=ProjectAssigned::where('acknowledge','1')->get();
      return view('officer.evaluation_projects.inprogress')->with('officer',$officer);
    }
    
    
    public function evaluation_activities(){

      $activities=ProjectActivity::all();
      $project_data=ProjectAssigned::where('acknowledge','1')->get();
      $team_mem= AssignedProjectTeam::all();
     
      // dd( $project_data);
      return view('officer.evaluation_projects.activities',['team_mem'=>$team_mem,'activities'=>$activities,'project_data'=>$project_data]);
    }

    public function evaluation_completed(){
      $officer=ProjectAssigned::where('complete','1')->get();
     
      return view('officer.evaluation_projects.completed')->with('officer',$officer);
    }
    

   

   

}
