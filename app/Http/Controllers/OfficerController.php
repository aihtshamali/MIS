<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use App\Sector;
use App\SubSector;
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
use App\ActivityDocument;
use App\AssignedActivityDocument;
use Illuminate\Support\Facades\Redirect;

class OfficerController extends Controller
{

      // Methods below are for Evaluation Module
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
        if($request->hasFile('activity_attachment')){
        $data =new AssignedActivityAttachment();
        $file_path = $request->file('activity_attachment')->path();
        $file_extension = $request->file('activity_attachment')->getClientOriginalExtension();
        $data->project_attachements=base64_encode(file_get_contents($file_path));
        $data->assigned_project_activity_id=$request->attachment_activity;
        $data->type = $file_extension;
        $data->attachment_name=$request->attachment_name;
        $data->save();
        }
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


      public function evaluation_activities($id)
       {
        if (!is_dir('storage/uploads/projects/project_activities/'.Auth::user()->username)) {
        // dir doesn't exist, make it
        mkdir('storage/uploads/projects/project_activities/'.Auth::user()->username);
        }
        //storing files of current project in folder
        $activities=Project::find($id)->AssignedProject->AssignedProjectActivity;
        foreach ($activities as $act) {
        foreach ($act->AssignedActivityAttachments as $attachment) {
          file_put_contents('storage/uploads/projects/project_activities/'.Auth::user()->username.'/'.$attachment->attachment_name.'.'.$attachment->type,base64_decode($attachment->project_attachements));
        }
        }
       //saving progress
       $assigned_progress=Project::find($id)->AssignedProject;
       $average_progress=round($assigned_progress->progress, 0, PHP_ROUND_HALF_UP);
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

      return view('officer.evaluation_projects.activities',['assignedDocuments'=>$assignedDocuments,'activity_documents'=>$activity_documents,'activities'=>$activities,'average_progress'=>$average_progress,'icons'=>$icons,'project_data'=>$project_data,'project_id'=>$id,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
    }
    public function AssignActivityDocument(Request $request){
      // dd($request->all());
      $PreassignedDocumentsCount=AssignedActivityDocument::where('assigned_project_id',$request->assigned_project_id)->count(); //

      foreach ($request->activity_document_id as $docs) {
        $assignedDocuments=new AssignedActivityDocument();
        $assignedDocuments->assigned_project_activity_id=$request->assigned_activity_id;
        $assignedDocuments->activity_document_id=$docs;
        $assignedDocuments->assigned_project_id=$request->assigned_project_id;
        $assignedDocuments->save();
      }
      if($PreassignedDocumentsCount)
      {
        for ($i=0; $i <3 ; $i++) {
          $assigned_project_activity = AssignedProjectActivity::find($request->assigned_activity_id+$i);
          $prev_prog=$assigned_project_activity->progress;
          $LatestassignedDocumentsCount=AssignedActivityDocument::where('assigned_project_id',$request->assigned_project_id)->count(); //
          $temp=$prev_prog/(100/$PreassignedDocumentsCount);
          $New=100/($LatestassignedDocumentsCount);
          $newprogress=($New*$temp);
          $assigned_project_activity->progress=round($newprogress,0,PHP_ROUND_HALF_UP );
          $assigned_project_activity->save();
        }
      }
      return redirect()->back();
    }
    public function saveDocAttachments(Request $request){
      // print_r($request->hasFile('activity_attachment'));
      if($request->activity_attachment){
        $data =  $request['data'];
        $percentage = strtok($data,",");
        $project_id = strtok(",");
        $activity_id = strtok(",");
        $assigned_project_activity = AssignedProjectActivity::find($activity_id);
        $assigned_project_activity->progress = $percentage;
        $assigned_project_activity1 = AssignedProjectActivity::find(($activity_id+1));
        if($assigned_project_activity->start_date && !$assigned_project_activity1->start_date ){
          // $assigned_project_activity->start_date=date('Y-m-d');
          $assigned_project_activity1->start_date=date('Y-m-d');
          $assigned_project_activity1->save();
        }
        if($percentage==100)
          $assigned_project_activity->end_date=date('Y-m-d');
        $assigned_project_activity->save();
        //

        // $document= new AssignedActivityDocument();
        // $document->activity_document_id=$request->activity_document_id;
        // $document->assigned_project_activity_id=$request->assigned_project_activity_id;
        // $document->assigned_project_id=$assigned_project_activity->project_id;
        // $document->save();
        //
        // print_r($request->all());
        $attach=ActivityDocument::find($request->activity_document_id);
        $data =new AssignedActivityAttachment();
        $file_path = $request->file('activity_attachment')->path();
        $file_extension = $request->file('activity_attachment')->getClientOriginalExtension();
        $data->project_attachements=base64_encode(file_get_contents($file_path));
        $data->assigned_project_activity_id=$request->attachment_activity;
        $data->type = $file_extension;
        $data->attachment_name=$attach->name;
        $data->assigned_project_activity_id=$request->assigned_project_activity_id;
        $data->assigned_activity_document_id=$request->assigned_activity_document_id;
        $data->save();
      //
        $assigned_project_activities_id = $assigned_project_activity->id;
        $assigned_project_activities_progress_log = new AssignedProjectActivityProgressLog();
        $assigned_project_activities_progress_log->assigned_project_activities_id = $assigned_project_activities_id;
        $assigned_project_activities_progress_log->progress = $percentage;
        $assigned_project_activities_progress_log->save();
        //Saving GLobal Percentage
        $project = AssignedProject::find($assigned_project_activity->project_id);
        $project_activities = $project->AssignedProjectActivity;
        $total_progress = 0;
        $percentage_array = [15.26,8.26,10.05,6.99,8.03,8.16,14.79,8.23,2.77,9.35,4.17,3.94];
        $i = 0;
        foreach($project_activities as $pa){
          $total_progress = ($total_progress  +  ( ($pa->progress/100.0) * $percentage_array[$i] ));
          $i += 1;
        }
        // return $total_progress;
        $project->progress = $total_progress;
        $project->save();
        return 'Done';
      }
    }
      public function projectCompleted(Request $request)
      {
        $projectCompleted = AssignedProject::find($request->assigned_project_id);
        if($projectCompleted){
        $projectCompleted->complete= True;
        $projectCompleted->completion_date=date('Y-m-d');
        $projectCompleted->save();
        }
        return redirect()->route('completed_evaluation');
      }
      public function evaluation_completed()
      {
        // dd(Auth::user()->AssignedProjectTeam);
        $officer=AssignedProject::select('assigned_projects.*')
        ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('complete','True')->where('acknowledge','1')
        ->get();
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
        if($assigned_project_activity->ProjectActivity->id==2 ){
          $ass =  AssignedProjectActivity::find($activity_id+1);
          if($ass && $ass->start_dat==NULL)
            {
              $ass->start_date=date('Y-m-d');
              $ass->save();
            }
          $ass =  AssignedProjectActivity::find($activity_id+4);
          $assignedDocuments=AssignedActivityDocument::where('assigned_project_id',$ass->project_id)->count();
          $tempprog=round((100/$assignedDocuments)*($assignedDocuments/2),0,PHP_ROUND_HALF_UP);
          if($ass && $ass->start_date==NULL && $percentage==$tempprog){
              $ass->start_date=date('Y-m-d');
              $ass->save();
          }
        }
        else if($assigned_project_activity->ProjectActivity->id==3){
          $ass = AssignedProjectActivity::find($activity_id+1);
          // $assignedDocuments=AssignedActivityDocument::where('assigned_project_id',$assigned_project_activity1->project_id)->count();
          // $tempprog=round((100/$assignedDocuments)*($assignedDocuments/2),0,PHP_ROUND_HALF_UP);
          if($assigned_project_activity->progress >= 100 && $ass->start_date==NULL)
            {
              $ass->start_date=date('Y-m-d');
              $ass->save();
            }
        }

        else if($assigned_project_activity->ProjectActivity->id==4){
          $ass = AssignedProjectActivity::find($activity_id+1);
          if($assigned_project_activity->progress >= 100 && $ass->start_date==NULL)
            {
              $ass->start_date=date('Y-m-d');
              $ass->save();
            }
        }
        else if($assigned_project_activity->ProjectActivity->id > 5 ){
          $ass = AssignedProjectActivity::find($activity_id+1);
          // print_r($ass);
          // TODO
          if(isset($ass->start_date) && $assigned_project_activity->progress >= 100 && $ass->start_date==NULL)
          {
             $ass->start_date=date('Y-m-d');
             $ass->save();
          }
        }
        if($percentage >= 100)
          $assigned_project_activity->end_date = date('Y-m-d');
        $assigned_project_activity->save();
        $assigned_project_activities_id = $assigned_project_activity->id;
        $assigned_project_activities_progress_log = new AssignedProjectActivityProgressLog();
        $assigned_project_activities_progress_log->assigned_project_activities_id = $assigned_project_activities_id;
        $assigned_project_activities_progress_log->progress = $percentage;
        $assigned_project_activities_progress_log->save();
        //Saving GLobal Percentage
        $project = AssignedProject::find($assigned_project_activity->project_id);
        $project_activities = $project->AssignedProjectActivity;
        $total_progress = 0;
        $percentage_array = [15.26,8.26,10.05,6.99,8.03,8.16,14.79,8.23,2.77,9.35,4.17,3.94];
        $i = 0;
        foreach($project_activities as $pa){
        $total_progress = ($total_progress  +  ( ($pa->progress/100.0) * $percentage_array[$i] ));
        $i += 1;
        }
        // return $total_progress;
        $project->progress = $total_progress;
        $project->save();
        return 'Done';
      }
      public function save_dates(Request $request){
        $assigned_project=AssignedProjectActivity::find($request->assigned_project_activity_id);
        $assigned_project->start_date=$request->start_date;
        $assigned_project->end_date=$request->end_date;
        $assigned_project->save();
        return 'Done';

      }

      // Methods below are for Monitoring Module

      public function monitoring_newAssignments()
      {
        $projects= Project::select('projects.*')
        ->leftjoin('assigned_projects','projects.id','assigned_projects.project_id')
        ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('project_type_id',2)
        ->get();
        return view('_Monitoring._Officer.projects.newAssignments',['projects'=>$projects]);
      }

      public function monitoring_inprogressAssignments()
      {

        // $sub_sectors = SubSector::where('status','1')->get();
        return view('_Monitoring._Officer.projects.inprogress');
      }

      public function monitoring_completedAssignments()
      {
        return view('_Monitoring._Officer.projects.completed');
      }
      public function monitoring_inprogressSingle($id)
      {
        if($id==null)
          return redirect()->back();
        $project=AssignedProject::where('project_id',$id)->first();
        $sectors  = Sector::where('status','1')->get();
        $sub_sectors = SubSector::where('status','1')->get();
        return view('_Monitoring._Officer.projects.inprogressSingle',compact('sectors','sub_sectors','project'));
      }
      public function monitoring_review_form(Request $request)
      {
        // print_r(json_decode($request->data));
        return response()->json($request->data['assigned_project_id']);
      }

      // public function monitoring_Stages()
      // {
      //   // if (!is_dir('storage/uploads/projects/project_activities/'.Auth::user()->username)) {
      //   //   // dir doesn't exist, make it
      //   //   mkdir('storage/uploads/projects/project_activities/'.Auth::user()->username);
      //   //   }
      //     //storing files of current project in folder
      //     // TODO
      //     // dd(Project::first()->AssignedProject);
      //     $activities=Project::first()->AssignedProject->AssignedProjectActivity;
      //     // foreach ($activities as $act) {
      //     // foreach ($act->AssignedActivityAttachments as $attachment) {
      //     // file_put_contents('storage/uploads/projects/project_activities/'.Auth::user()->username.'/'.$attachment->attachment_name.'.'.$attachment->type,base64_decode($attachment->project_attachements));
      //     // }
      //     // }
      //     //saving progress
      //     // TODO
      //     $assigned_progress=Project::first()->AssignedProject;
      //     $average_progress=round($assigned_progress->progress, 0, PHP_ROUND_HALF_UP);
      //     $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      //     ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      //     ->where('acknowledge','0')
      //     ->where('user_id',Auth::id())
      //     ->count();
      //     $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
      //     ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
      //     ->where('user_id',Auth::id())
      //     ->where('acknowledge','1')
      //     ->count();
      //     $project_data=AssignedProject::select('assigned_projects.*')
      //     ->leftJoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      //     ->where('assigned_projects.acknowledge','1')->where('assigned_projects.project_id',Project::first()->id)
      //     ->first();
      //     $icons = [
      //     'pdf' => 'pdf',
      //     'doc' => 'word',
      //     'docx' => 'word',
      //     'xls' => 'excel',
      //     'xlsx' => 'excel',
      //     'ppt' => 'powerpoint',
      //     'pptx' => 'powerpoint',
      //     'txt' => 'text',
      //     'png' => 'image',
      //     'jpg' => 'image',
      //     'jpeg' => 'image',
      //     ];
      //   return view('officer.monitoring_projects.monitoringStages',['activities'=>$activities,'average_progress'=>$average_progress,'icons'=>$icons,'project_data'=>$project_data,'project_id'=>Project::first()->id,'officerInProgressCount'=>$officerInProgressCount,'officerAssignedCount'=>$officerAssignedCount]);
      // }




}
