<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
use App\MProjectProgress;
use App\MProjectCost;
use App\MProjectLocation;
use App\MProjectDate;
use App\MProjectOrganization;
use App\MGeneralFeedBack;
use App\MAssignedProjectFeedBack;
use App\MIssueType;
use App\GeneralKpi;
use App\MAssignedProjectIssue;
use App\MAssignedProjectHealthSafety;
use App\MHealthSafety;
use App\MPlanObjective;
use App\MPlanComponent;
use App\MPlanObjectivecomponentMapping;
use App\MPlanComponentActivitiesMapping;
use App\MPlanComponentactivityDetailMapping;
use App\MPlanKpicomponentMapping;
use App\MProjectAttachment;
use App\MProjectKpi;
use App\MConductQualityassesment;
use App\MSponsoringStakeholder;
use App\MExecutingStakeholder;
use App\MBeneficiaryStakeholder;
use App\MAssignedKpiLevel1;
use App\MAssignedKpiLevel2;
use App\MAssignedKpiLevel3;
use App\MAssignedKpiLevel4;
use App\District;
use App\PlantripCity;

use App\MAppAttachment;
use Illuminate\Support\Facades\Redirect;
use DB;
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
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.status',1)
        ->where('acknowledge','0')
        ->get();
        return view('inc.officer_sidenav')->with('officer',$officer);
      }

      public function evaluation_index()
      {
        $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',1)
        ->where('projects.status',1)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','0')
        ->count();
        $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.status',1)
        ->where('project_type_id',1)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','1')
        ->count();
        $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',1)
        ->where('projects.status',1)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','0')
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

      public function getProjectComponents(Request $request)
      {
        // return response()->json($request->all());
        $projectcomponents =MPlanComponent::where('status',1)
        ->where('m_project_progress_id',$request->MProjectProgressId)
        ->get();
        return response()->json($projectcomponents);

      }

      public function getAssignedExecutingAgency(Request $request)
      {
        $exeagency = AssignedExecutingAgency::where('project_id',$request->originalProjectId)->get();
        $size= count($exeagency);
        // return response()->json($size);
        // $sa=[];
        return response()->json($exeagency);
      }

      public function getAssignedSponsoringAgency(Request $request)
      {

        $sponsoringagency = AssignedSponsoringAgency::where('project_id',$request->originalProjectId)->get();
        $size= count($sponsoringagency);
        // return response()->json($size);
        $sa=[];
        return response()->json($sponsoringagency);
        for($i=0; $i<$size ; $i++)
        {
        array_push($sa, $sponsoringagency->SponsoringAgency);
        }
          // return response()->json($sa);

      }

      public function getProjectActivities(Request $request)
      {
        // return response()->json($request->all());
        $projectactivities =MPlanComponentActivitiesMapping::where('status',1)
        ->where('m_project_progress_id',$request->MProjectProgressId)
        ->get();
        return response()->json($projectactivities);

      }

      public function evaluation_inprogress()
      {
        $officerAssignedCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.status','1')
        ->where('acknowledge','0')
        ->where('complete',0)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->count();
        $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.status','1')
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','1')
        ->where('complete',0)
        ->get();

        // $progress=AssignedProject::select('assigned_projects.*','assigned_project_activities.*')
        // ->leftjoin('assigned_project_activities ','assigned_project_activities.project_id','assigned_projects.project_id')
        // ->where('user_id',Auth::id())
        // ->get();
          // Progress Variable Commented
        return view('officer.evaluation_projects.inprogress',['officer'=>$officer,'officerInProgressCount'=>$officer->count(),'officerAssignedCount'=>$officerAssignedCount]);
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
     public function AssignActivityDocument(Request $request)
      {
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
      public function saveDocAttachments(Request $request)
      {
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
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('complete','True')->where('acknowledge','1')
        ->where('projects.status',1)
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
      public function save_dates(Request $request)
      {
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
        ->where('acknowledge',0)
        ->where('status',1)
        ->get();
        return view('_Monitoring._Officer.projects.newAssignments',['projects'=>$projects]);
      }

      public function monitoring_inprogressAssignments()
      {
        $projects= Project::select('projects.*')
        ->leftjoin('assigned_projects','projects.id','assigned_projects.project_id')
        ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('project_type_id',2)
        ->where('acknowledge',1)
        ->where('status',1)
        ->get();
        return view('_Monitoring._Officer.projects.inprogress',['projects'=>$projects]);
      }

      public function monitoring_completedAssignments()
      {
        return view('_Monitoring._Officer.projects.completed');
      }

      public function monitoring_inprogress_costs_saved(Request $request)
      {

        $total_progresses = AssignedProject::find($request->assigned_project_id)->MProjectProgress;
        $m_project_costs = MProjectCost::where('m_project_progress_id',$total_progresses[count($total_progresses)-1]->id)->first();
        if(!$m_project_costs){
          $m_project_costs = new MProjectCost();
        }
        $m_project_costs->user_id= Auth::id();
        $m_project_costs->m_project_progress_id = $total_progresses[count($total_progresses)-1]->id;
        $m_project_costs->adp_allocation_of_fiscal_year = (float)$request->adp_allocation_of_fiscal_year;
        $m_project_costs->release_to_date_of_fiscal_year = $request->release_to_date_of_fiscal_year;
        $m_project_costs->total_allocation_by_that_time = $request->total_allocation_by_that_time;
        $m_project_costs->total_release_to_date = $request->total_release_to_date;
        $m_project_costs->utilization_against_cost_allocation = $request->utilization_against_cost_allocation;
        $m_project_costs->utilization_against_releases = $request->utilization_against_releases;
        $m_project_costs->technical_sanction_cost = $request->technical_sanction_cost;
        $m_project_costs->contract_award_cost = $request->contract_award_cost;
        $m_project_costs->save();
        $msg='Saved';
        return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        // return redirect()->back();
      }

      public function monitoring_inprogress_dates_saved(Request $request)
      {
        $total_progresses = AssignedProject::find($request->assigned_project_id)->MProjectProgress;
        $m_project_dates = MProjectDate::where('m_project_progress_id',$total_progresses[count($total_progresses)-1]->id)->first();
        if(!$m_project_dates){
          $m_project_dates = new MProjectDate();
        }
        $m_project_dates->user_id= Auth::id();
        $m_project_dates->m_project_progress_id = $total_progresses[count($total_progresses)-1]->id;
        $m_project_dates->project_approval_date = $request->project_approval_date;
        $m_project_dates->admin_approval_date = $request->admin_approval_date;
        $m_project_dates->actual_start_date = $request->actual_start_date;
        $m_project_dates->save();
        $msg='Saved';
        return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        // return redirect()->back();
      }

      public function monitoring_inrogress_organizations_saved(Request $request)
      {
        $total_progresses = AssignedProject::find($request->assigned_project_id)->MProjectProgress;
        $m_project_organizations = MProjectOrganization::where('m_project_progress_id',$total_progresses[count($total_progresses)-1]->id)->first();
        if(!$m_project_organizations){
          $m_project_organizations = new MProjectOrganization();
        }
        $m_project_organizations->user_id= Auth::id();
        $m_project_organizations->m_project_progress_id = $total_progresses[count($total_progresses)-1]->id;
        $m_project_organizations->operation_and_management = $request->operation_and_management;
        $m_project_organizations->contractor_or_supplier = $request->contractor_or_supplier;
        $m_project_organizations->save();
        $msg='Saved';
        return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        // return redirect()->back();
      }

      public function monitoring_inprogress_location_saved(Request $request)
      {
        $total_progresses = AssignedProject::find($request->assigned_project_id)->MProjectProgress;
        $m_project_location = MProjectLocation::where('m_project_progress_id',$total_progresses[count($total_progresses)-1]->id)->first();
        if(!$m_project_location){
          $m_project_location = new MProjectLocation();
        }
        $m_project_location->user_id= Auth::id();
        $m_project_location->m_project_progress_id = $total_progresses[count($total_progresses)-1]->id;
        $m_project_location->district = $request->district;
        $m_project_location->city = $request->city;
        $m_project_location->gps = $request->gps;
        $m_project_location->longitude = $request->longitude;
        $m_project_location->latitude = $request->latitude;
        $m_project_location->save();
        $msg='Saved';
        return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        // return redirect()->back();
      }

      public function monitoring_inprogressSingle(Request $request)
      {

        if($request->project_id==null)
        return redirect()->back();

        $project=AssignedProject::where('project_id',$request->project_id)->orderBy('created_at','desc')->first();
        $total_previousProject = MProjectProgress::where('assigned_project_id',$project->id)->orderBy('created_at', 'desc')->get();
        $previousProject = null;
        $projectProgress = null;

        if(isset($request->status) && $request->status=="conductMonitoring"){
          $first=$total_previousProject->first();
          $first->project_status="ONGOING";
          $first->save();
        }

        if($total_previousProject->count())
        {
          // One New Monitoring (it shouldn't be here)
          $previousProject = $total_previousProject->first();
          // It will change
          //TODO
          // $previousProject->quarter = $previousProject->quarter + 1;
          // $previousProject->save();
          $projectProgress=$previousProject;
        }
        else
        {
          //Moving Project Progress from New Attachment to Inprogress
          $project->acknowledge = 1;
          $project->save();

          $projectProgress = new MProjectProgress();
          $projectProgress->quarter = 1;
          $projectProgress->assigned_project_id = $project->id;
          $projectProgress->project_status = 'ACTIVE';
          $projectProgress->status = 1;
          $projectProgress->user_id = Auth::id();
          $projectProgress->save();

        }

        $progresses = $projectProgress;
        $costs = null;
        $costs = $progresses->MProjectCost;

        $location = null;
        $location = $progresses->MProjectLocation;

        $organization = null;
        $organization = $progresses->MProjectOrganization;

        $dates = null;
        $dates = $progresses->MProjectDate;

        $sectors  = Sector::where('status','1')->get();
        $sub_sectors = SubSector::where('status','1')->get();
        $tab = 'cost';

        // ConductMonitoring
        $generalFeedback=MGeneralFeedBack::where('status',1)->get();

        $issue_types=MIssueType::where('status',1)->get();

        $healthsafety=MHealthSafety::where('status',1)->get();

        $projectProgressId=$progresses;
        $monitoringProjectId=$projectProgressId->id;

        $objectives =MPlanObjective::where('status',1)
        ->where('m_project_progress_id',$projectProgressId->id)
        ->get();

        $components =MPlanComponent::where('status',1)
        ->where('m_project_progress_id',$projectProgressId->id)
        ->get();

        $projectWithRevised=$project->Project->with(
          ['RevisedEndDate' => function ($query) use ($project) {
            $query->where('project_id', $project->project_id);
           },'RevisedApprovedCost' => function ($query) use ($project) {
            $query->where('project_id', $project->project_id);
           },'ProjectDetail' => function ($query) use ($project) {
            $query->where('project_id', $project->project_id);
           }
          ])->find($project->project_id);

        $ComponentActivities = MPlanComponentActivitiesMapping::where('status',1)
        ->where('m_project_progress_id',$projectProgressId->id)
        ->get();

        // dd($ComponentActivities);
        $Kpis =MProjectKpi::where('status',1)->get();

        $mPlanKpiComponents=$projectProgressId->MPlanKpicomponentMapping;
        $cities=PlantripCity::orderBy('name')->get();
        $districts=District::orderBy('name')->get();
        $org_project=Project::where('id',$request->project_id)->first();
        $org_projectId=$org_project->id;

        $result_from_app = MAppAttachment::where('m_project_progress_id',$projectProgressId->id)->get();
        $financial_cost=MProjectCost::where('m_project_progress_id',$projectProgressId->id)->first();

       $project_documents= MProjectAttachment::where('m_project_progress_id',$projectProgressId->id)->get();

       //stakeholders
       $executingStakeholders= MExecutingStakeholder::where('m_project_progress_id',$projectProgressId->id)->get();
       $sponsoringStakeholders= MSponsoringStakeholder::where('m_project_progress_id',$projectProgressId->id)->get();
       $B_Stakeholders= MBeneficiaryStakeholder::where('m_project_progress_id',$projectProgressId->id)->get();

       $qualityassesments=MConductQualityassesment::where('m_project_progress_id',$projectProgressId->id)->get();
       $m_assigned_issues = MAssignedProjectIssue::where('m_project_progress_id',$projectProgressId->id)->get();
       
        \JavaScript::put([
          'projectWithRevised'=>$projectWithRevised,
         'components'=> $components,
         'monitoringProjectId'=> $monitoringProjectId
        ]);
        // dd($generalFeedback[0]u->MAssignedProjectFeedBack->answer);
        // dd($components[0]->MPlanObjectivecomponentMapping[0]->m_plan_objective_id);
        return view('_Monitoring._Officer.projects.inprogressSingle'
        ,compact('m_assigned_issues','qualityassesments','B_Stakeholders','sponsoringStakeholders','executingStakeholders',
        'project_documents','result_from_app','org_project','districts','cities',
        'org_projectId','projectProgressId','mPlanKpiComponents','ComponentActivities',
        'monitoringProjectId','Kpis','components','objectives','sectors','sub_sectors','project','costs','location','organization','dates','progresses','generalFeedback','issue_types','healthsafety'));
      }
      public function monitoring_review_form(Request $request)
      {
        // print_r(json_decode($request->data));
        return response()->json($request->data);
      }

      // ---- Officers Charts --------

      // Total Projects
      public function officer_chart_one()
      {
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

        \JavaScript::put([
          'actual_total_projects' => $actual_total_projects,
          'total_projects' => $total_projects,
          // 'total_assigned_projects' => $total_assigned_projects,
          // 'actual_total_assigned_projects' => $actual_total_assigned_projects,
          'inprogress_projects' => $inprogress_projects,
          'completed_projects' => $completed_projects,
          'officers' => $officers,
          ]);
          return view('officer.charts.officer_chart_one',['total_projects'=>$actual_total_projects ,'inprogress_projects'=>$inprogress_projects ,'completed_projects'=>$completed_projects]);
      }

      public function calculateMFinancialProgress($m_project_progress_id)
      {
        $financial_cost=MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first();
        $financial_progress=0.0;
        if($financial_cost)
            $financial_progress=($financial_cost->utilization_against_releases/$financial_cost->total_release_to_date)*100;
      }
      public function calculateMPhysicalProgress($m_project_progress_id)
      {
          $kpiCompMapping=MPlanKpicomponentMapping::where('m_project_progress_id',$m_project_progress_id)->get();
          $arr=array_fill(0,$kpiCompMapping->count(),0);
          $i=0;
          foreach($kpiCompMapping as $main)
          {
            foreach($main->MAssignedKpiLevel1 as $lv1){
              foreach($lv1->MAssignedKpiLevel2 as $lv2){
                foreach($lv2->MAssignedKpiLevel3 as $lv3){
                  foreach($lv3->MAssignedKpiLevel4 as $lv4){
                    $we=$lv4->current_weightage;
                    if(!$we)
                      $we=0;
                    $arr[$i]+=$we;
                  }
                  $we=$lv3->current_weightage;
                  if(!$we)
                    $we=0;
                  $arr[$i]+=$we;
                }
                $we=$lv2->current_weightage;
                if(!$we)
                  $we=0;
                $arr[$i]+=$we;
              }
              $we=$lv1->current_weightage;
              if(!$we)
                $we=0;
              $arr[$i]+=$we;
            }
            $i++;
          }
      }
      public function officer_chart_two()
      {
        $projects=AssignedProject::select('assigned_projects.*')
        ->leftJoin('projects','projects.id','assigned_projects.project_id')
        ->leftJoin('assigned_project_teams','assigned_project_teams.id','assigned_projects.project_id')
        ->where('project_type_id',1)
        ->where('projects.status',1)
        ->where('assigned_project_teams.user_id',Auth::id())
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
          return view('officer.charts.officer_chart_two');
      }
      public function officer_chart_three()
      {
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
          'activities' => ProjectActivity::all(),
          'projects_activities_progress'=>$projects_activities_progress
          ]);
        return view('officer.charts.officer_chart_three',[ 'activities' => $activities ,'projects_activities_progress'=>$projects_activities_progress]);
      }
      public function saveGeneralFeedBack(Request $request)
      {
        foreach ($request->generalFeedback as $gf) {
          $temp=explode("_",$gf);
          $m_general_feed_back_id=$temp[0];
          $answer=$temp[1];
          $res=MAssignedProjectFeedBack::where('m_general_feed_back_id',$m_general_feed_back_id)
                ->where('m_project_progress_id',$request->m_project_progress_id)
                ->first();
          if($res && $res->count())
            $generalFeedback=$res;
          else
            $generalFeedback=new MAssignedProjectFeedBack();
          $generalFeedback->m_general_feed_back_id=$m_general_feed_back_id;
          $generalFeedback->user_id=Auth::id();
          $generalFeedback->answer=$answer;
          $generalFeedback->m_project_progress_id=$request->m_project_progress_id;
          $generalFeedback->save();
        }
      }
      public function saveMissues(Request $request)
      {
        foreach($request->issue as $key=>$issue){
          $project_issue = new MAssignedProjectIssue();
          $project_issue->issue=$issue;
          $project_issue->user_id=Auth::id();
          $project_issue->m_issue_type_id=$request->issuetype[$key];
          $project_issue->severity=$request->severity[$key];
          if($request->sponsoring_department[$key])
          $project_issue->sponsoring_agency_id=$request->sponsoring_department[$key];
          if($request->executing_department[$key])
          $project_issue->executing_agency_id=$request->executing_department[$key];
          $project_issue->m_project_progress_id=$request->m_project_progress_id;
          $project_issue->save();
        }
      }

      public function savehealthsafety(Request $request)
      {
        foreach ($request->status as $key=>$healthsafety) {
          $temp=explode("_",$healthsafety);
          $hs=$temp[0];
          $answer=$temp[1];
          $res=MAssignedProjectHealthSafety::where('m_health_safety_id',$hs)
                ->where('m_project_progress_id',$request->m_project_progress_id)
                ->first();
          if($res && $res->count())
            $healthSafety=$res;
          else
            $healthSafety=new MAssignedProjectHealthSafety();
          $healthSafety->m_health_safety_id=$hs;
          $healthSafety->user_id=Auth::id();
          $healthSafety->status=$answer;
          $healthSafety->remarks=$request->comments[$key];
          $healthSafety->m_project_progress_id=$request->m_project_progress_id;
          $healthSafety->save();
        }
      }

      public function projectDesignMonitoring(Request $request)
      {
        // $projectProgressId= MProjectProgress::where('assigned_project_id',$request->project_progress_no)->get();
        $msg="Saved";
        if(MPlanObjective::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
         {
          //  MPlanObjective::where('m_project_progress_id',$request->m_project_progress_id)->delete();
           $msg="Updated";
         }
        foreach($request->obj as $objective)
          {
            $objectives= new MPlanObjective();
            $objectives->m_project_progress_id = $request->m_project_progress_id;
            $objectives->user_id=Auth::id();
            $objectives->objective=$objective;
            $objectives->status= true;
            $objectives->save();
          }
          if(MPlanComponent::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
            {
              // MPlanComponent::where('m_project_progress_id',$request->m_project_progress_id)->delete();
              $msg="Updated";
            }
          foreach($request->comp as $component)
          {
            $components=new MPlanComponent();
            $components->m_project_progress_id = $request->m_project_progress_id;
            $components->user_id=Auth::id();
            $components->component=$component;
            $components->status= true;
            $components->save();
          }

          $objectives=MPlanObjective::where('m_project_progress_id',$request->m_project_progress_id)->get();
          $components=MPlanComponent::where('m_project_progress_id',$request->m_project_progress_id)->get();

          return response()->json(["type"=>"success","msg"=>$msg." Successfully","data"=>["objectives"=>$objectives,"components"=>$components],"resType"=>"ObjectiveAndComponents"]);

      }

      public function mappingOfObj(Request $request)
      {
        // $projectProgressId= MProjectProgress::where('assigned_project_id',$request->project_progress_no)->get();
        // $objectives =MPlanObjective::where('status',1)->count();
        $i=0;
        foreach($request->objective as $objective)
        {
          if(isset($_POST['mappedComp_'.$i]))
          foreach($_POST['mappedComp_'.$i] as $mappComp)
          {
            $objCompMapping=new MPlanObjectivecomponentMapping();
            $objCompMapping->m_project_progress_id = $request->m_project_progress_id;
            $objCompMapping->user_id=Auth::id();
            $objCompMapping->m_plan_objective_id=$objective;
            $objCompMapping->m_plan_component_id=$mappComp;
            $objCompMapping->status= true;
            $objCompMapping->save();
          }
          $i++;
        }

        return response()->json(["type"=>"success","msg"=>"Saved Successfully"]);
      }
      public function kpiComponentMapping(Request $request)
      {
        // return response()->json($request->all());
        // $projectProgressId= MProjectProgress::where('assigned_project_id',$request->project_progress_no)->get();
        $i=0;
        foreach($request->kpinamesId as $kpi)
        {
          // return response()->json($mappComp);
          if(isset($_POST['mappedKpicomponent_'.$i]))
          foreach($_POST['mappedKpicomponent_'.$i] as $mappComp)
          {
            $kpiCompMapping= new MPlanKpicomponentMapping();

            $kpiCompMapping->m_project_progress_id = $request->m_project_progress_id;
            $kpiCompMapping->m_project_kpi_id=$kpi;
            $kpiCompMapping->user_id=Auth::id();
            $kpiCompMapping->m_plan_component_id=$mappComp;
            $kpiCompMapping->status= true;
            $kpiCompMapping->save();
            foreach ($kpiCompMapping->MProjectKpi->MProjectLevel1Kpi as $lev1) {
              $kpiCompMapping1= new MAssignedKpiLevel1();
              $kpiCompMapping1->m_project_progress_id= $request->m_project_progress_id;
              $kpiCompMapping1->m_plan_kpicomponent_mappings_id= $kpiCompMapping->id;
              $kpiCompMapping1->m_project_level1_kpis_id= $lev1->id;
              $kpiCompMapping1->save();

              foreach ($kpiCompMapping1->MProjectLevel1Kpi->MProjectLevel2Kpi as $lev2) {
                $kpiCompMapping2= new MAssignedKpiLevel2();
                $kpiCompMapping2->m_project_progress_id= $request->m_project_progress_id;
                $kpiCompMapping2->m_assigned_kpi_level1_id= $kpiCompMapping1->id;
                $kpiCompMapping2->m_project_level2_kpis_id= $lev2->id;
                $kpiCompMapping2->save();

                foreach ($kpiCompMapping2->MProjectLevel2Kpi->MProjectLevel3Kpi as $lev3) {
                  $kpiCompMapping3= new MAssignedKpiLevel3();
                  $kpiCompMapping3->m_project_progress_id= $request->m_project_progress_id;
                  $kpiCompMapping3->m_assigned_kpi_level2_id= $kpiCompMapping2->id;
                  $kpiCompMapping3->m_project_level3_kpis_id= $lev3->id;
                  $kpiCompMapping3->save();

                  foreach ($kpiCompMapping3->MProjectLevel3Kpi->MProjectLevel4Kpi as $lev4) {
                    $kpiCompMapping4= new MAssignedKpiLevel4();
                    $kpiCompMapping4->m_project_progress_id= $request->m_project_progress_id;
                    $kpiCompMapping4->m_assigned_kpi_level3_id= $kpiCompMapping3->id;
                    $kpiCompMapping4->m_project_level4_kpis_id= $lev4->id;
                    $kpiCompMapping4->save();
                  }
                }
              }
            }
          }
          $i++;
        }

        return response()->json(["type"=>"success","msg"=>"Saved Successfully"]);
      }

      public function componentActivities(Request $request)
      {
        // return response()->json($request->all());
       $msg="Saved";
        if(MPlanComponentActivitiesMapping::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
        {
          // MPlanComponentActivitiesMapping::where('m_project_progress_id',$request->m_project_progress_id)->delete();
          $msg="Updated";
        }
        $i=0;
        foreach($request->compforactivity as $compActivity)
        {
          if(isset($_POST['c_activity_'.$i]))
          foreach($_POST['c_activity_'.$i] as $act)
          {
            // return response()->json($mappComp);
            $CompActivityMapping=new MPlanComponentActivitiesMapping();
            $CompActivityMapping->m_project_progress_id = $request->m_project_progress_id;
            $CompActivityMapping->user_id=Auth::id();
            $CompActivityMapping->m_plan_component_id=$compActivity;
            $CompActivityMapping->activity=$act;
            $CompActivityMapping->status= true;
            $CompActivityMapping->save();
          }
          $i++;
        }
        $CompActivityMapping=MPlanComponentActivitiesMapping::select('m_plan_component_activities_mappings.*')
        ->with('MPlanComponent')
        ->where('m_plan_component_activities_mappings.m_project_progress_id',$request->m_project_progress_id)
        ->get();
        return response()->json(["type"=>"success","msg"=>$msg." Successfully", "resType"=>"forTime","data"=>["CompActivityMapping"=>$CompActivityMapping]]);
      }


      public function activities_duration(Request $request)
      {
        // return response()->json($request->all());
        // $msg="Saved";
        // if(MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
        // {
        //   MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->delete();
        //   $msg="Updated";
        // }

        $size=count($request->componentActivityId);
        for($i=0 ; $i < $size ; $i++ )
        {
            $CompActivityDetails = new MPlanComponentactivityDetailMapping();
            $CompActivityDetails->m_plan_component_activities_mapping_id =$request->componentActivityId[$i];
            $CompActivityDetails->duration=$request->daysinduration[$i];
            $CompActivityDetails->save();

        }
        // $CompActivityDetails=MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->get();
        return response()->json(["type"=>"success","msg"=>" Successfully"]);

      }

      public function Costing(Request $request)
      {
        $msg="Saved";
        // if(MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
        // {
        //   MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->delete();
        //   $msg="Updated";
        // }
        $size=count($request->activityId);
        for($i=0 ; $i < $size ; $i++ )
        {
            $CompActivityDetails = MPlanComponentactivityDetailMapping::find($request->activityId[$i]);
            $CompActivityDetails->user_id=Auth::id();
            $CompActivityDetails->unit =$request->Unit[$i];
            $CompActivityDetails->quantity=$request->Quantity[$i];
            $CompActivityDetails->cost=$request->Cost[$i];
            $CompActivityDetails->amount=$request->Amount[$i];
            $CompActivityDetails->save();

        }
        // $CompActivityDetails=MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->get();
        return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);

      }
      public function saveMonitoringAttachments(Request $request)
      {
        // return response()->json($request->all());

        if($request->hasFile('planmonitoringfile')){
          $file_path = $request->file('planmonitoringfile')->path();
          $file_extension = $request->file('planmonitoringfile')->getClientOriginalExtension();

          $data =new MProjectAttachment();
          $data->project_attachement=base64_encode(file_get_contents($file_path));
          $data->m_project_progress_id=$request->m_project_progress_id;
          $data->type = $file_extension;
          $data->user_id = Auth::id();
          $data->attachment_name=$request->file_name;
          if($data->save())
          {
            return response()->json(["type"=>"success","msg"=>"Saved Successfully"]);
          }else{
            return response()->json(["type"=>"error","msg"=>"Something went wrong1!"]);
          }
        }
        return response()->json(["type"=>"error","msg"=>"Something went wrong2!"]);
      }
     public function saveQualityAssesment(Request $request)
     {

      // return dd($request->all());
      // return response()->json($request->all());

      $i=0;

         while(1)
         {


           if(isset($_POST['activitiesforconduct_'.$i]))
           {
             $k=0;
             foreach($_POST['activitiesforconduct_'.$i] as $activity)
            {

            $qualityassesment = new MConductQualityassesment();

            $qualityassesment->m_project_progress_id = $request->m_project_progress_id;
            $qualityassesment->user_id= Auth::id();
            $qualityassesment->m_plan_component_id=$_POST['compforconduct_'.$i];

            if(isset($_POST['activitiesforconduct_'.$i][$k]))
            $qualityassesment->m_plan_component_activities_mapping_id=$activity;
              // dd($activity);
            if(isset($_POST['qualityassesment_'.$i][$k]))
            $qualityassesment->assesment=$_POST['qualityassesment_'.$i][$k];

            if(isset($_POST['progresspercentage_'.$i][$k]))
            $qualityassesment->progressinPercentage=$_POST['progresspercentage_'.$i][$k];

            if(isset($_POST['qa_remarks_'.$i][$k]))
            $qualityassesment->remarks=$_POST['qa_remarks_'.$i][$k];
            $qualityassesment->save();
            $k++;
          }
         $i++;
        }
        else
          break;
      }

      return redirect()->back();


     }

     public function savestakeholders(Request $request)
     {
      //  dd($request);
        $i =0;
        $j=0;
        $k=0;
        // return response()->json($request->all());
       if(isset($request->stakeholderExecuting[$i]))
       foreach($request->stakeholderExecuting as $exe_stakeholder)
       {
         $executing_st= new MExecutingStakeholder();
         $executing_st->m_project_progress_id = $request->m_project_progress_id;
         $executing_st->user_id= Auth::id();
         if(isset($request->stakeholderExecuting[$i]))
         $executing_st->assigned_executing_agency_id=$exe_stakeholder;
         $executing_st->name=$request->Executingstakeholder_name[$i];
         $executing_st->designation=$request->Executingstakeholder_designation[$i];
         $executing_st->email=$request->Executingstakeholder_email[$i];
         $executing_st->contactNo=$request->Executingstakeholder_number[$i];
         $executing_st->save();
        //  return response()->json($executing_st);

         $i++;
       }

       if(isset($request->Sponsoringstakeholder[$j]))
       foreach($request->Sponsoringstakeholder as $sp_stakeholder)
       {
        $sponsoring_st= new MSponsoringStakeholder();
        $sponsoring_st->m_project_progress_id = $request->m_project_progress_id;
         $sponsoring_st->user_id= Auth::id();
         if(isset($request->Sponsoringstakeholder[$j]))
         $sponsoring_st->assigned_sponsoring_agency_id=$sp_stakeholder;
         $sponsoring_st->name=$request->Sponsoringstakeholder_name[$j];
         $sponsoring_st->designation=$request->Sponsoringstakeholder_designation[$j];
         $sponsoring_st->email=$request->Sponsoringstakeholder_email[$j];
         $sponsoring_st->contactNo=$request->Sponsoringstakeholder_number[$j];
        //  return response()->json($sponsoring_st);
        $sponsoring_st->save();
        $j++;
       }

       if(isset($request->Beneficiarystakeholder[$k]))
       foreach($request->Beneficiarystakeholder as $Ben_stakeholder)
       {
        $benef_st= new MBeneficiaryStakeholder();
        $benef_st->m_project_progress_id = $request->m_project_progress_id;
         $benef_st->user_id= Auth::id();
         if(isset($request->Beneficiarystakeholder[$k]))
         $benef_st->Beneficiary=$Ben_stakeholder;
         $benef_st->name=$request->Beneficiarystakeholder_name[$k];
         $benef_st->designation=$request->Beneficiarystakeholder_designation[$k];
         $benef_st->email=$request->Beneficiarystakeholder_email[$k];
         $benef_st->contactNo=$request->Beneficiarystakeholder_number[$k];
        $benef_st->save();
        $k++;

       }
       return redirect()->back();
     }


    //  CM DASHBOARD
    public function DetailedDashboard()
    {
      $projects= Project::select('projects.*')
      ->leftjoin('assigned_projects','projects.id','assigned_projects.project_id')
      ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      ->where('assigned_project_teams.user_id',Auth::id())
      ->where('assigned_projects.complete',0)
      ->where('project_type_id',2)
      ->where('acknowledge',1)
      ->where('status',1)
      ->get();

      // $projects=Auth::user()->AssignedProjectTeam
      return view('_Monitoring.monitoringDashboard.index',compact('projects'));
    }

    }
