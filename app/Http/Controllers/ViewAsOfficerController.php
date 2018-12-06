<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AssignedProject;
use App\Project;
use App\ActivityDocument;
use App\AssignedActivityDocument;
class ViewAsOfficerController extends Controller
{
    public function ViewAsOfficerNewAssignments($userid){
      // dd($userid);
      $user=User::findOrFail($userid);
      $NewAssignedprojects=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('acknowledge','0')
      ->where('user_id',$userid)
      ->get();

      $InProgressProjects=AssignedProject::select('assigned_projects.*')
      ->leftjoin('assigned_project_teams ','assigned_project_teams.assigned_project_id','assigned_projects.id')
      ->where('assigned_project_teams.user_id',$userid)
      ->where('acknowledge','1')
      ->where('complete','0')
      ->get();

      $completedProjects=AssignedProject::select('assigned_projects.*')
      ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      ->where('assigned_project_teams.user_id',$userid)
      ->where('complete','True')
      ->where('acknowledge','1')
      ->get();

      return view('officerLevelViews.index',['user'=>$user,'NewAssignedprojects'=>$NewAssignedprojects,'inProgressProjects'=>$InProgressProjects,'CompletedProjects'=>$completedProjects]);
    }

    // Activities Page

    public function ViewOfficerActivities($id,$user_id){
      if (!is_dir('storage/uploads/projects/project_activities/'.User::find($user_id)->username)) {
      // dir doesn't exist, make it
        mkdir('storage/uploads/projects/project_activities/'.User::find($user_id)->username);
      }
      //storing files of current project in folder
      $activities=Project::find($id)->AssignedProject->AssignedProjectActivity;
      foreach ($activities as $act) {
      foreach ($act->AssignedActivityAttachments as $attachment) {
        file_put_contents('storage/uploads/projects/project_activities/'.User::find($user_id)->username.'/'.$attachment->attachment_name.'.'.$attachment->type,base64_decode($attachment->project_attachements));
      }
      }
     //saving progress
     $assigned_progress=Project::find($id)->AssignedProject;
     $average_progress=round($assigned_progress->progress, 0, PHP_ROUND_HALF_UP);

     $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
     ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
     ->where('acknowledge','0')
     ->where('user_id',$user_id)
     ->count();
     $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
     ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
     ->where('user_id',$user_id)
     ->where('acknowledge','1')
     ->count();
    $project_data=AssignedProject::select('assigned_projects.*')
     ->leftJoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
     ->where('assigned_projects.acknowledge','1')->where('assigned_projects.project_id',$id)
     ->first();

    $activity_documents=ActivityDocument::where('status',1)->get();
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
      $assignedDocuments=AssignedActivityDocument::where('assigned_project_id',$project_data->id)->get();

      return view('officerLevelViews.activities',['assignedDocuments'=>$assignedDocuments,'activity_documents'=>$activity_documents,'activities'=>$activities,'average_progress'=>$average_progress,'icons'=>$icons,'project_data'=>$project_data,'project_id'=>$id,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
    }
}
