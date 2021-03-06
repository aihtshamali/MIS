<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use PDF;
use App\Sector;
use App\SubSector;
use App\AssignedProjectManager;
use App\AssignedProject;
use App\AssignedDistrict;
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
use App\MAssignedKpi;
use App\MAppAttachment;
use App\MAssignedUserLocation;
use App\MAssignedUserKpi;
use App\DispatchLetterDoctype;
use App\DispatchLetterPriority;
use App\DispatchLetter;
use App\DispatchLetterCc;
use App\AssignedProjectTeam;
use App\RevisedApprovedCost;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\MProjectLevel1Kpi;
use App\MProjectLevel2Kpi;
use App\MProjectLevel3Kpi;
use App\MProjectLevel4Kpi;
use App\ReportData;
use App\PostSne;
use App\MAssignedKpiLevel2Log;
use App\MAssignedKpiLevel1Log;
use App\MAssignedQuestionnaire;
use App\MProgressContractSummary;
use App\MProgressFinancialSummary;
use App\MProgressObservation;
use App\MProgressPictorialDetail;
use App\MProgressRecommendation;
use App\MProjectProgressRisk;
use App\MQuestionnaire;

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
      return redirect()->back();
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
        ->where('assigned_projects.stopped',0)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','0')
        ->count();
        $officerInProgressCount=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.status',1)
        ->where('project_type_id',1)
              ->where('assigned_projects.stopped',0)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','1')
        ->count();
        $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',1)
        ->where('projects.status',1)
              ->where('assigned_projects.stopped',0)
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
        $exeagency = AssignedExecutingAgency::where('project_id',$request->originalProjectId)->with('ExecutingAgency')->get();
        return response()->json($exeagency);
      }

      public function getAssignedSponsoringAgency(Request $request)
      {

        $sponsoringagency = AssignedSponsoringAgency::where('project_id',$request->originalProjectId)->with('SponsoringAgency')->get();
        return response()->json($sponsoringagency);
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
        ->where('projects.project_type_id','1')
        ->where('acknowledge','0')
        ->where('complete',0)
        ->where('stopped',0)
        ->where('assigned_project_teams.user_id',Auth::id())
        ->count();
        $officer=AssignedProject::select('assigned_projects.*','assigned_project_teams.user_id')
        ->leftjoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->leftjoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.status','1')
        ->where('projects.project_type_id','1')
        ->where('assigned_project_teams.user_id',Auth::id())
        ->where('acknowledge','1')
        ->where('complete',0)
        ->where('stopped',0)
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
          if (!is_dir('storage/uploads/projects/project_activities')) {
          // dir doesn't exist, make it
          mkdir('storage/uploads/projects/project_activities');
          }
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

//-------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------//
//------------- Methods below are for Monitoring Module--------------------------//
//-------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------//


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
        // $start_Date=date_create($project->Project->ProjectDetail->planned_start_date);
        // $end_date=date_create($project->Project->ProjectDetail->planned_end_date);
        // $interval_period=date_diff($start_Date,$end_date);
        // $gestation_period=$interval_period->format('%y Year , %m month , %d days');
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
        // Copy from here
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
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
        $m_project_dates->first_visit_date=$request->Date_Of_Visit;
        $m_project_dates->save();
        $msg='Saved';
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
        // return redirect()->back();
        // return redirect()->back();
      }

      public function Monitoring_PlannedDates(Request $request)
      {
        
        $project=AssignedProject::find($request->assigned_project_id)->MProjectProgress->first()->AssignedProject->Project->ProjectDetail;
        $project->planned_start_date=$request->planned_start_date;
        $project->planned_end_date=$request->planned_end_date;
        $project->save();
         $tabs=explode("_",$request->page_tabs);
          $maintab=$tabs[0];
          $innertab=$tabs[1];
          return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);

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

        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);        // return redirect()->back();
      }

      public function monitoring_inprogress_location_saved(Request $request)
      {
        $total_progresses = AssignedProject::find($request->assigned_project_id)->MProjectProgress;
        // $m_project_location = MProjectLocation::where('m_project_progress_id',$total_progresses[count($total_progresses)-1]->id)->first();
        // if(!$m_project_location){
        //   $m_project_location = new MProjectLocation();
        // }
        foreach ($request->district as $district) {
          $m_project_location = new MProjectLocation();
          $m_project_location->user_id= Auth::id();
          $m_project_location->m_project_progress_id = $total_progresses[count($total_progresses)-1]->id;
          $m_project_location->district = $district;
          // $m_project_location->city = $request->city;
          $m_project_location->city = null;
          $m_project_location->gps = $request->gps;
          $m_project_location->longitude = $request->longitude;
          $m_project_location->latitude = $request->latitude;
          $m_project_location->save();
        }
        $msg='Saved';
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
        // return redirect()->back();
      }

      public function monitoring_inprogressSingle(Request $request)
      {
        if($request->project_id==null)
        return redirect()->back();

        $project=AssignedProject::where('project_id',$request->project_id)->orderBy('created_at','desc')->first();
        $team = $project->AssignedProjectTeam;
        $team_lead_check = false;
        if($team->count() > 1){
          foreach($team as $t){
            if($t->User->id == Auth::id() && $t->team_lead == 1){
              $team_lead_check = true;
            }
          }
        }
        else{
          $team_lead_check = true;
        }
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
        // dd($dates);
        $sectors  = Sector::where('status','1')->get();
        $sub_sectors = SubSector::where('status','1')->get();
        // $maintab = 'review';
        // $innertab = 'location';

        // ConductMonitoring
        $generalFeedback=MGeneralFeedBack::where('status',1)->get();

        $issue_types=MIssueType::where('status',1)->get();

        $healthsafety=MHealthSafety::where('status',1)->get();

        $projectProgressId=$progresses;
        $monitoringProjectId=$projectProgressId->id;

        $assignedHealthSafeties = MAssignedProjectHealthSafety::where('m_project_progress_id',$progresses->id)->get();
       
        $assignedGeneralFeedbacks= MAssignedProjectFeedBack::where('m_project_progress_id',$progresses->id)->get();
        // dd($generalFeedback[0]->MAssignedProjectFeedBack);
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
        $Kpis =MProjectKpi::where('status',1)->where('standard',1)->get();

        $mPlanKpiComponents=$projectProgressId->MPlanKpicomponentMapping->groupBy('m_project_kpi_id');

        $cities=PlantripCity::orderBy('name')->get();
        $districts=District::orderBy('name')->get();
        $org_project=Project::where('id',$request->project_id)->first();
        $org_projectId=$org_project->id;

        $result_from_app = MAppAttachment::where('m_project_progress_id',$projectProgressId->id)->get();
        $financial_cost=MProjectCost::where('m_project_progress_id',$projectProgressId->id)->first();

       $project_documents= MProjectAttachment::where('m_project_progress_id',$projectProgressId->id)->get();
      //  dd($project_documents[0]);
        if (!is_dir('storage/uploads/projects/monitoring_attachments')) 
        {
          mkdir('storage/uploads/projects/monitoring_attachments');
        }
      //  foreach($project_documents as $p_doc)
      //   {
      //     if($p_doc->attachment_name)
      //     {
      //       file_put_contents('storage/uploads/projects/monitoring_attachments/'.$p_doc->attachment_name.'.'.$p_doc->type,base64_decode($p_doc->project_attachment));
      //     }
      //   }
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
       //stakeholders
       $executingStakeholders= MExecutingStakeholder::where('m_project_progress_id',$projectProgressId->id)->get();
       $sponsoringStakeholders= MSponsoringStakeholder::where('m_project_progress_id',$projectProgressId->id)->get();
       $B_Stakeholders= MBeneficiaryStakeholder::where('m_project_progress_id',$projectProgressId->id)->get();

       $qualityassesments=MConductQualityassesment::where('m_project_progress_id',$projectProgressId->id)->get();
       $m_assigned_issues = MAssignedProjectIssue::where('m_project_progress_id',$projectProgressId->id)->get();

        $physical_progress=0.0;
        $phy_progress_Sum=[];

        $level_1=MAssignedKpiLevel1::where('m_project_progress_id',$projectProgressId->id)->get();
        $team = AssignedProjectTeam::where('assigned_project_id',$project->id)->get();
        $assigned_districts = AssignedDistrict::where('project_id',$request->project_id)->get();

        $user_locations=$projectProgressId->MAssignedUserLocation;


        $start_Date=date_create($project->Project->ProjectDetail->planned_start_date);
        $end_date=date_create($project->Project->ProjectDetail->planned_end_date);
        $interval_period=date_diff($start_Date,$end_date);
        $gestation_period=$interval_period->format('%y Year , %m month , %d days');
        
        $first_visit_date=MProjectDate::where('m_project_progress_id',$projectProgressId->id)->first();
        
        $m_observations = $projectProgressId->MProgressObservation;
        $m_recommendation = $projectProgressId->MProgressRecommendation;
        
        // Questionaire
        $questionnaire = MQuestionnaire::where('status',1)->get();
        
        $assigned_questionnaire = MAssignedQuestionnaire::where('m_project_progress_id', $projectProgressId->id)->get();
        $pictorial_files = MProgressPictorialDetail::where('m_project_progress_id', $projectProgressId->id)->get();

      //Financial Summary
       $financial_summary = MProgressFinancialSummary::where('m_project_progress_id', $projectProgressId->id)->get();

      // Contract Summary
       $contract_summary = MProgressContractSummary::where('m_project_progress_id', $projectProgressId->id)->get();


        \JavaScript::put([
          'projectWithRevised'=>$projectWithRevised,
         'components'=> $components,
         'monitoringProjectId'=> $monitoringProjectId,
         'team_lead_check' => $team_lead_check,
         'assigned_user_locations'=>$user_locations
        ]);
    
        return view('_Monitoring._Officer.projects.inprogressSingle'
        ,compact('first_visit_date','gestation_period','m_assigned_issues',
        'questionnaire','assigned_questionnaire',
        'financial_summary','contract_summary',
        'm_recommendation',
        'pictorial_files',
        'qualityassesments','B_Stakeholders','sponsoringStakeholders'
        ,'executingStakeholders','assignedGeneralFeedbacks',
        'project_documents','result_from_app','org_project','districts','cities',
        'org_projectId','projectProgressId','mPlanKpiComponents','ComponentActivities',
        'monitoringProjectId','Kpis','components','objectives','sectors','sub_sectors','project'
        ,'costs','location','icons',
        'organization','dates','progresses','generalFeedback','issue_types','healthsafety','team'
        ,'assigned_districts','m_observations'));
      }

      public function monitoring_review_form(Request $request)
      {
        // print_r(json_decode($request->data));
        return response()->json($request->data);
      }

     //----------------------------------------------------------//
     //------------------Charts----------------------------------//
  
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

      
     //----------------------------------------------------------//
     //------------------Charts ended----------------------------------//


      public function saveGeneralFeedBack(Request $request)
      {
        foreach ($request->generalFeedback as $gf) 
        {
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
          // Copy from here
          
        }
        $tabs=explode("_",$request->page_tabs);
          $maintab=$tabs[0];
          $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
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
        // Copy from here
        $tabs=explode("_",$request->page_tabs);
        // dd($request->all());
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
      }

      public function savehealthsafety(Request $request)
      {
        // dd($request->all());
        foreach ($request->status as $key=>$healthsafety) 
        {
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
          $tabs=explode("_",$request->page_tabs);
          $maintab=$tabs[0];
          $innertab=$tabs[1];
          return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
          // return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
      }

      public function deleteObjective(Request $request)
      {
        // dd($request);
        if(MPlanObjectivecomponentMapping::where('m_plan_objective_id',$request->objNo)->count())
        {
          $del_objcomponent=MPlanObjectivecomponentMapping::where('m_plan_objective_id',$request->objNo)->delete();
          $del_obj=MPlanObjective::where('id',$request->objNo)->delete();
        }
        else
        {
          $del_obj=MPlanObjective::where('id',$request->objNo)->delete();
        }

            
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);

      }

      public function deleteComponent(Request $request)
      {
        if(MPlanObjectivecomponentMapping::where('m_plan_component_id',$request->CompNo)->count())
        { 
          if(MPlanKpicomponentMapping::where('m_plan_component_id',$request->CompNo)->count())
          {

            if(MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->count())
            {
          // dump('ok-');

              $activityid=MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->get();
              
            
              foreach($activityid as $act_id)
              {  
                //  dd($act_id->MPlanComponentactivityDetailMapping || $act_id->MPlanComponentactivityDetailMapping == null);
                if($act_id->MPlanComponentactivityDetailMapping )
                $act_id->MPlanComponentactivityDetailMapping->delete();
                // dd('delete hogya');
              }
               
                 $delactivitymapping = MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->delete();
              }
              $delkpicompMapping =MPlanKpicomponentMapping::where('m_plan_component_id',$request->CompNo)->delete();
            }

            $del_objcomponent=MPlanObjectivecomponentMapping::where('m_plan_component_id',$request->CompNo)->delete();

        }
          elseif(MPlanKpicomponentMapping::where('m_plan_component_id',$request->CompNo)->count())
          {
            // dump('done');
            if(MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->count())
            {
              
              $activityid=MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->get();
              foreach($activityid as $act_id)
              {
                if($act_id->MPlanComponentactivityDetailMapping){
                  $act_id->MPlanComponentactivityDetailMapping->delete();

                }
                 
                }
                MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->delete();
                
              }
              MPlanKpicomponentMapping::where('m_plan_component_id',$request->CompNo)->delete();  
            }
            
        elseif(MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->count())
        {
           
          $activityid=MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->get();
             foreach($activityid as $act_id)
              { 
                
                if($act_id->MPlanComponentactivityDetailMapping)
                    $act_id->MPlanComponentactivityDetailMapping->delete(); 
                  }
            
           $delactivitymapping = MPlanComponentActivitiesMapping::where('m_plan_component_id',$request->CompNo)->delete();
         }

          MPlanComponent::where('id',$request->CompNo)->delete();
         
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);


      }

      public function deleteKpi(Request $request)
      {
     
          $kpi = MProjectKpi::find($request->kpi_id);

          if($kpi->standard== 1)
          {
            if(MAssignedUserKpi::where('m_project_kpi_id',$request->kpi_id)->where('m_project_progress_id',$request->m_project_progress_id)->count())
            {
              $MAssignedUserKpi_id =MAssignedUserKpi::where('m_project_kpi_id',$request->kpi_id)
              ->where('m_project_progress_id',$request->m_project_progress_id)->first();
              $Massignedkpi=MAssignedKpi::where('m_assigned_user_kpi_id',$MAssignedUserKpi_id->id)->first();
            
              $level_1 = $Massignedkpi->MAssignedKpiLevel1->first();
            // dd($level_1);
                if(MAssignedKpiLevel1Log::where('m_project_level1_kpis_id',$level_1->m_project_level1_kpis_id)
                ->where('m_project_progress_id',$request->m_project_progress_id)
                ->count())
                {
                  return redirect()->back()->with('This cant be deleted.');
                }
                else 
                {
                  if($Massignedkpi->MAssignedKpiLevel1->count())
                  { 
                      foreach($Massignedkpi->MAssignedKpiLevel1 as $l1)
                      {
                        //  dd($l1);
                          if($l1->MAssignedKpiLevel2->count())
                          {
                            $Massignedkpi_l2=MAssignedKpiLevel2::where('m_assigned_kpi_level1_id',$l1->id)->get();
                            foreach($Massignedkpi_l2 as $l2)
                            {
                              if($l2->MAssignedKpiLevel3->count())
                              {
                                foreach($l2->MAssignedKpiLevel3 as $l3)
                                {
                                  if($l3->MAssignedKpiLevel4->count())
                                  {
                                    
                                    $l3->MAssignedKpiLevel4()->delete();
                                  }
                                }
                                
                                $l2->MAssignedKpiLevel3()->delete();
                              }
                            }
                            
                            $l1->MAssignedKpiLevel2()->delete();
                          }
                      }
                        $Massignedkpi->MAssignedKpiLevel1()->delete();
                  }
                  MAssignedKpi::where('m_assigned_user_kpi_id',$MAssignedUserKpi_id->id)->delete();
                  MAssignedUserKpi::where('m_project_kpi_id',$request->kpi_id)
                  ->where('m_project_progress_id',$request->m_project_progress_id)
                  ->delete();
                }             
                // dump('i am in1');
                MPlanKpicomponentMapping::where('m_project_kpi_id',$kpi->id)->delete();  
            }
            else
            {
              // dump('i am in 2');
              MPlanKpicomponentMapping::where('m_project_kpi_id',$kpi->id)->delete();  
            }
          }
          elseif($kpi->standard == 0)
          {
            if(MAssignedUserKpi::where('m_project_kpi_id',$request->kpi_id)->where('m_project_progress_id',$request->m_project_progress_id)->count())
            {
              $MAssignedUserKpi_id =MAssignedUserKpi::where('m_project_kpi_id',$request->kpi_id)
              ->where('m_project_progress_id',$request->m_project_progress_id)->first();
              $Massignedkpi=MAssignedKpi::where('m_assigned_user_kpi_id',$MAssignedUserKpi_id->id)->first();
            
              $level_1 = $Massignedkpi->MAssignedKpiLevel1->first();
              // dd($level_1);
            // dd(MAssignedKpiLevel1Log::where('m_project_level1_kpis_id',$level_1->m_project_level1_kpis_id)
            // ->where('m_project_progress_id',$request->m_project_progress_id)
            // ->count());
                if(isset($level_1) && MAssignedKpiLevel1Log::where('m_project_level1_kpis_id',$level_1->m_project_level1_kpis_id)
                ->where('m_project_progress_id',$request->m_project_progress_id)
                ->count())
                {
               
                  return redirect()->back()->with('This cant be deleted.');
                }
                else 
                {
                  if($Massignedkpi->MAssignedKpiLevel1->count())
                  { 
                      foreach($Massignedkpi->MAssignedKpiLevel1 as $l1)
                      {
                        //  dd($l1);
                          if($l1->MAssignedKpiLevel2->count())
                          {
                            $Massignedkpi_l2=MAssignedKpiLevel2::where('m_assigned_kpi_level1_id',$l1->id)->get();
                            foreach($Massignedkpi_l2 as $l2)
                            {
                              if($l2->MAssignedKpiLevel3->count())
                              {
                                foreach($l2->MAssignedKpiLevel3 as $l3)
                                {
                                  if($l3->MAssignedKpiLevel4->count())
                                  {
                                    
                                    $l3->MAssignedKpiLevel4()->delete();
                                  }
                                }
                                
                                $l2->MAssignedKpiLevel3()->delete();
                              }
                            }
                            
                            $l1->MAssignedKpiLevel2()->delete();
                          }
                      }
                        $Massignedkpi->MAssignedKpiLevel1()->delete();
                  }
                    MAssignedKpi::where('m_assigned_user_kpi_id',$MAssignedUserKpi_id->id)->delete();
                    MAssignedUserKpi::where('m_project_kpi_id',$request->kpi_id)
                    ->where('m_project_progress_id',$request->m_project_progress_id)
                    ->delete();
                    // dd('i am in');
                    return redirect()->back();
                }

                foreach($kpi->MProjectLevel1Kpi as $pro_l1)
                {
                  if($pro_l1->MProjectLevel2Kpi->count())
                  {
                    foreach($pro_l1->MProjectLevel2Kpi as $pro_l2)
                    {
                      if($pro_l2->MProjectLevel3Kpi->count())
                      {
                        foreach($pro_l2->MProjectLevel3Kpi as $pro_l3)
                        {
                          if($pro_l3->MProjectLevel4Kpi->count())
                          {
                            $pro_l3->MProjectLevel4Kpi()->delete();
                          }
                        }
                        $pro_l2->MProjectLevel3Kpi()->delete();
                      }
                    }
                    $pro_l1->MProjectLevel2Kpi()->delete();
                  }
                } 
              
                $kpi->MProjectLevel1Kpi()->delete();              
                MPlanKpicomponentMapping::where('m_project_kpi_id',$kpi->id)->delete();  
                MProjectKpi::where('id',$kpi->id)->delete();
              
            }
            else
            {
              foreach($kpi->MProjectLevel1Kpi as $pro_l1)
              {
                if($pro_l1->MProjectLevel2Kpi->count())
                {
                  foreach($pro_l1->MProjectLevel2Kpi as $pro_l2)
                  {
                    if($pro_l2->MProjectLevel3Kpi->count())
                    {
                      foreach($pro_l2->MProjectLevel3Kpi as $pro_l3)
                      {
                        if($pro_l3->MProjectLevel4Kpi->count())
                        {
                          $pro_l3->MProjectLevel4Kpi()->delete();
                        }
                      }
                      $pro_l2->MProjectLevel3Kpi()->delete();
                    }
                  }
                  $pro_l1->MProjectLevel2Kpi()->delete();
                }
              } 
                MPlanKpicomponentMapping::where('m_project_kpi_id',$kpi->id)->delete();  
                MProjectKpi::where('id',$kpi->id)->delete(); 
            }  
          }
            // dump('done');
          
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);

      }

      public function deleteUserLoc(Request $request)
      {
        MAssignedUserLocation::where('m_project_progress_id',$request->m_project_progress_id)->where('id',$request->userloc_id)->delete();

        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Deleted Successfully']);

      }
    
      public function deleteAttachment(Request $request)
      {
         MProjectAttachment::where('id',$request->document_id)->where('m_project_progress_id',$request->m_project_progress_id)->delete();
       
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);



      }   

      public function deleteUserAssignedKpi(Request $request)
      {
    
        $this->delUserWbs($request->kpi_id , $request->m_project_progress_id);
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);


      }

      public function delUserWbs($kpi_id , $project_id)
      {
        if(MAssignedUserKpi::where('m_project_kpi_id',$kpi_id)->where('m_project_progress_id',$project_id)->count())
        {
          $MAssignedUserKpi_id =MAssignedUserKpi::where('m_project_kpi_id',$kpi_id)->where('m_project_progress_id',$project_id)->first();
          $Massignedkpi=MAssignedKpi::where('m_assigned_user_kpi_id',$MAssignedUserKpi_id->id)->first();
        
          $level_1 = $Massignedkpi->MAssignedKpiLevel1->first();
        
            if(isset($level_1) && MAssignedKpiLevel1Log::where('m_project_level1_kpis_id',$level_1->m_project_level1_kpis_id)
            ->where('m_project_progress_id',$project_id)
            ->count())
            {
              return redirect()->back()->with('This cant be deleted.');
            }
            else 
            {
              if($Massignedkpi->MAssignedKpiLevel1->count())
              { 
                  foreach($Massignedkpi->MAssignedKpiLevel1 as $l1)
                  {
                    //  dd($l1);
                      if($l1->MAssignedKpiLevel2->count())
                      {
                        $Massignedkpi_l2=MAssignedKpiLevel2::where('m_assigned_kpi_level1_id',$l1->id)->get();
                        foreach($Massignedkpi_l2 as $l2)
                        {
                          if($l2->MAssignedKpiLevel3->count())
                          {
                            foreach($l2->MAssignedKpiLevel3 as $l3)
                            {
                              if($l3->MAssignedKpiLevel4->count())
                              {
                                
                                $l3->MAssignedKpiLevel4()->delete();
                              }
                            }
                            
                            $l2->MAssignedKpiLevel3()->delete();
                          }
                        }
                        
                        $l1->MAssignedKpiLevel2()->delete();
                      }
                  }
                    $Massignedkpi->MAssignedKpiLevel1()->delete();
              }
                MAssignedKpi::where('m_assigned_user_kpi_id',$MAssignedUserKpi_id->id)->delete();
                MAssignedUserKpi::where('m_project_kpi_id',$kpi_id)
                ->where('m_project_progress_id',$project_id)
                ->delete();
                // dd('i am in');
                return redirect()->back();
            }

        }
        else
        {
          return redirect()->back();
        }
      }

      public function projectDesignMonitoring(Request $request)
      {
        // dd($request->obj[0]);
        // $projectProgressId= MProjectProgress::where('assigned_project_id',$request->project_progress_no)->get();
        $msg="Saved";
        if(MPlanObjective::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
         {
          //  MPlanObjective::where('m_project_progress_id',$request->m_project_progress_id)->delete();
           $msg="Updated";
         }
        if(isset($request->obj[0]))
         {
           foreach($request->obj as $objective)
          {
            $objectives= new MPlanObjective();
            $objectives->m_project_progress_id = $request->m_project_progress_id;
            $objectives->user_id=Auth::id();
            $objectives->objective=$objective;
            $objectives->status= true;
            $objectives->save();
          }
        }
          if(MPlanComponent::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
            {
              // MPlanComponent::where('m_project_progress_id',$request->m_project_progress_id)->delete();
              $msg="Updated";
            }
          if(isset($request->comp[0]))
          {
            foreach($request->comp as $component)
          {
            $components=new MPlanComponent();
            $components->m_project_progress_id = $request->m_project_progress_id;
            $components->user_id=Auth::id();
            $components->component=$component;
            $components->status= true;
            $components->save();
          }
        }
          $objectives=MPlanObjective::where('m_project_progress_id',$request->m_project_progress_id)->get();
          $components=MPlanComponent::where('m_project_progress_id',$request->m_project_progress_id)->get();

          $tabs=explode("_",$request->page_tabs);
          $maintab=$tabs[0];
          $innertab=$tabs[1];
          // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
          return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);

          // return response()->json(["type"=>"success","msg"=>$msg." Successfully","data"=>["objectives"=>$objectives,"components"=>$components],"resType"=>"ObjectiveAndComponents"]);

      }

      public function mappingOfObj(Request $request)
      {
       
        MPlanObjectivecomponentMapping::where('m_project_progress_id',$request->m_project_progress_id)->delete();
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
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
        // return response()->json(["type"=>"success","msg"=>"Saved Successfully"]);
      }
      public function kpiComponentMapping(Request $request)
      {
        // dd($request->all());
        // $projectProgressId= MProjectProgress::where('assigned_project_id',$request->project_progress_no)->get();
        $i=0;
        foreach($request->kpinamesId as $kpi)
        {
          // dd($request->all());
          // return response()->json($mappComp);
          if(isset($_POST['mappedKpicomponent_'.$i]))
          foreach($_POST['mappedKpicomponent_'.$i] as $mappComp)
          {
            $kpiCompMapping= new MPlanKpicomponentMapping();

            $kpiCompMapping->m_project_progress_id = $request->m_project_progress_id;
            $kpiCompMapping->m_project_kpi_id=$kpi;
            $kpiCompMapping->user_id=Auth::id();
            $kpiCompMapping->m_plan_component_id=$mappComp;
            // $kpiCompMapping->weightage=$request->weightage[$i];
            $kpiCompMapping->status= true;
            $kpiCompMapping->save();
          }
          $i++;
        }
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
        // return response()->json(["type"=>"success","msg"=>"Saved Successfully"]);
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
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully", "resType"=>"forTime","data"=>["CompActivityMapping"=>$CompActivityMapping]]);
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
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
        // $CompActivityDetails=MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->get();
        // return response()->json(["type"=>"success","msg"=>" Successfully"]);

      }

      public function Costing(Request $request)
      {
        // dd($request->all());
        $msg="Saved";
        // if(MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->count()>0)
        // {
        //   MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->delete();
        //   $msg="Updated";
        // }
        // dd($request->activityId[0]);
        $size=count($request->activityId);
        // dump($request->Amount);
        // dump(MPlanComponentactivityDetailMapping::where('m_plan_component_activities_mapping_id',$request->activityId[40])->first());
        // dd("HERRE");
        for($i=0 ; $i < $size ; $i++ )
        {
            $CompActivityDetails = MPlanComponentactivityDetailMapping::where('m_plan_component_activities_mapping_id',$request->activityId[$i])->first();
            $CompActivityDetails->user_id=Auth::id();
            $CompActivityDetails->unit =$request->Unit[$i];
            $CompActivityDetails->quantity=$request->Quantity[$i];
            $CompActivityDetails->cost=$request->Cost[$i];
            $CompActivityDetails->amount=$request->Amount[$i];
            $CompActivityDetails->save();
            // dd($CompActivityDetails);

        }
        // dd("HERE");            
        // $CompActivityDetails=MPlanComponentactivityDetailMapping::where('m_project_progress_id',$request->m_project_progress_id)->get();
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        // Copy from here
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
      }
      public function saveMonitoringAttachments(Request $request)
      {
        
        if($request->hasFile('planmonitoringfile')){
          $file_path = $request->file('planmonitoringfile')->path();
          $file_extension = $request->file('planmonitoringfile')->getClientOriginalExtension();
          $data =new MProjectAttachment();
          $planmonitoringfile = $request->file('planmonitoringfile');
          $planmonitoringfile->store('public/uploads/monitoring/'.$request->m_project_progress_id.'/');
          $data->project_attachement= $planmonitoringfile->hashName();

          $data->m_project_progress_id=$request->m_project_progress_id;
          $data->type = $file_extension;
          $data->user_id = Auth::id();
          $data->attachment_name=$request->file_name;
          $data->save();
        }
        $tabs=explode("_",$request->page_tabs);
        $maintab=$tabs[0];
        $innertab=$tabs[1];
        // dd($maintab,$innertab);
        // return response()->json(["type"=>"success","msg"=>$msg." Successfully"]);
        return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
      }
     public function saveQualityAssesment(Request $request)
     {
      // return dd($request->all());

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
       // return redirect()->back();
       // Copy from here
       $tabs=explode("_",$request->page_tabs);
       $maintab=$tabs[0];
       $innertab=$tabs[1];
       return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
     }
     public function saveRisks(Request $request){
       MProjectProgressRisk::where('m_project_progress_id',$request->m_project_progress_id)->delete();
       foreach ($request->risk_constraint as $key => $value) {
         $risk = new MProjectProgressRisk();
         $risk->risk_and_constraint = $value;
         $risk->impact = $request->impact[$key];
         $risk->probable_results = $request->results[$key];
         $risk->m_project_progress_id = $request->m_project_progress_id;
         $risk->user_id = Auth::id();
         $risk->save();
       }
      $tabs = explode("_", $request->page_tabs);
      $maintab = $tabs[0];
      $innertab = $tabs[1];
      return redirect()->back()->with(["maintab" => $maintab, "innertab" => $innertab, 'success' => 'Saved Successfully']);
     }
     public function generate_monitoring_report(Request $request)
     {
        $original_project=AssignedProject::where('id',$request->project_id)->orderBy('created_at','desc')->first();
        $revisions=RevisedApprovedCost::where('project_id',$original_project->project_id)->get();
        // dd($revisions);

       $project=MProjectProgress::where('assigned_project_id',$request->project_id)->orderBy('created_at','desc')->first();
       $report_data = ReportData::where('m_project_progress_id',$project->id)->first();
      
        $start_Date=date_create($original_project->Project->ProjectDetail->planned_start_date);
        $end_date=date_create($original_project->Project->ProjectDetail->planned_end_date);
        $interval_period=date_diff($start_Date,$end_date);
        $gestation_period=$interval_period->format('%y Year , %m month , %d days');
        // dd($project->id);
        // dd($project->MPlanObjective);
        // dd($project->MProgressPictorialDetail);
        // dd($project->MAssignedQuestionnaire);
        $mPlanKpiComponents=$project->MPlanKpicomponentMapping->groupBy('m_project_kpi_id');
        \JavaScript::put([
          'project_id'=>$project->id
        ]);
          return view('_Monitoring._Officer.projects.report',compact('project','gestation_period','revisions','report_data','mPlanKpiComponents'));
     }

    //  
     //saving report Data
     public function save_report_data(Request $request)
     {
       $report_data = ReportData::where('m_project_progress_id',$request->project)->first();
       if(!$report_data){
        $report_data = new ReportData();
        $report_data->m_project_progress_id = $request->project;
        $report_data->user_id = Auth::id();
        $report_data[$request->block]= $request->data;
        $report_data->save();
      }
      else{
        $report_data->m_project_progress_id = $request->project;
        $report_data->user_id = Auth::id();
        $report_data[$request->block]= $request->data;
        $report_data->save();
      }
       return "Data Saved";
     }

    //  CM DASHBOARD
    public function DetailedDashboard(Request $request)
    {
      $project = Project::find($request->project_id);
      $assigned_project = $project->AssignedProject;
      $financial_progress = 0;
      $physical_progress = 0;
      $progress_divided = 0;
      $actual_progress = 0;
      $count_progress = 0;
      $gestation = 0;
      $result_from_app=null;
      $physical_progress_values = [];
      $financial_progress_values = [];
      if($assigned_project){
        $progress = $assigned_project->MProjectProgress->last();
        $total_progress = $assigned_project->MProjectProgress;
        $count_progress = $total_progress->count();
        if($count_progress > 0){
          foreach($total_progress as $tp){
            array_push($physical_progress_values,round(calculateMPhysicalProgress($tp->id,2)));
            array_push($financial_progress_values,round(calculateMFinancialProgress($tp->id,2)));
          }
        }
        if($progress){
          $financial_progress = round(calculateMFinancialProgress($progress->id,2));
          $physical_progress = round(calculateMPhysicalProgress($progress->id,2));
          $result_from_app = MAppAttachment::where('m_project_progress_id',$progress->id)->get();
          if($progress->MProjectDate)
          $actual_progress = date_diff(date_create($progress->MProjectDate->actual_start_date),date_create($project->ProjectDetail->planned_end_date));
          else
          $actual_progress = date_diff(date_create(date('Y-m-d')),date_create($project->ProjectDetail->planned_end_date));
          $gestation = ($actual_progress->format('%a')/365);

          $progress_divided = round(100/$gestation,2);
          if(date_create(date('d-m-Y')) > date_create($project->ProjectDetail->planned_end_date)){
            $actual_progress = 100;
          }
          else
            $actual_progress = $progress_divided*($gestation - date_diff(date_create(date('d-m-Y')),date_create($project->ProjectDetail->planned_end_date))->format('%y'));
        }
      }
      // $projects= Project::select('projects.*')
      // ->leftjoin('assigned_projects','projects.id','assigned_projects.project_id')
      // ->leftjoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      // ->where('assigned_project_teams.user_id',Auth::id())
      // ->where('assigned_projects.complete',0)
      // ->where('project_type_id',2)
      // ->where('acknowledge',1)
      // ->where('status',1)
      // ->get();
      \JavaScript::put([
        'financial_progress' => $financial_progress,
        'physical_progress' => $physical_progress,
        'actual_progress' => $actual_progress,
        'count_progress' => $count_progress,
        'physical_progress_values' => $physical_progress_values,
        'financial_progress_values' => $financial_progress_values
      ]);
      // $projects=Auth::user()-> 
      return view('_Monitoring.monitoringDashboard.index',compact('progress','result_from_app','project','gestation'));
    }

    public function saveUserLocation(Request $request)
    {
      // dd($request->all());
      $counter = 1;
      $user = "user_location_";
      $location = "location_user_";
      $site = "site_name_";
      $siteSDate = "site_start_";
      $siteEDate = "site_end_";
      $date="dateLoc_";
      while($counter <= $request->counts){
        if($request[$user.$counter])
        {
          // $inner_counter = 1;
          foreach($request[$location.$counter] as $d)
          {
            $m_assigned_user_location = new MAssignedUserLocation();
            $m_assigned_user_location->user_id = $request[$user.$counter];
            $m_assigned_user_location->site_name = $request[$site.$counter];
            $m_assigned_user_location->site_start_date = $request[$siteSDate.$counter];
            $m_assigned_user_location->site_end_date = $request[$siteEDate.$counter];
            $m_assigned_user_location->district_id = $d;
            // $m_assigned_user_location->planned_visit_date=$request[$date.$counter];
            $m_assigned_user_location->assigned_by = Auth::id();
            $m_assigned_user_location->m_project_progress_id = $request->progress_id;
            $m_assigned_user_location->save();
            // dd($m_assigned_user_location);
            // $inner_counter++; 
          }
        }
        $counter++;
      }
      // return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
      // Copy from here
      $tabs=explode("_",$request->page_tabs);
      $maintab=$tabs[0];
      $innertab=$tabs[1];
      return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
    }
    public function saveUserKpi(Request $request)
    {
      $i=0;
      foreach($request->user_location_id as $d)
      {
        $mAssignedUserkpi = new MAssignedUserKpi();
        $mAssignedUserkpi->m_assigned_user_location_id = $d;
        $mAssignedUserkpi->m_project_kpi_id = $request->m_project_kpi_id[$i];
        $mAssignedUserkpi->m_project_progress_id = $request->m_project_progress_id;
        $mAssignedUserkpi->save();

        // Assigned Kpi
        $assignedKpi= new MAssignedKpi();
        $assignedKpi->m_assigned_user_kpi_id=$mAssignedUserkpi->id;
        $assignedKpi->m_project_progress_id=$request->m_project_progress_id;
        $assignedKpi->user_id=Auth::id();
        $assignedKpi->weightage=($request->weightage[$i] == NULL ? 1 : $request->weightage[$i]);
        $assignedKpi->cost=$request->cost[$i] == NULL ? 0 : $request->cost[$i];
        $assignedKpi->save();
        foreach ($assignedKpi->MAssignedUserKpi->MProjectKpi->MProjectLevel1Kpi as $lev1) 
        {
          $kpiCompMapping1= new MAssignedKpiLevel1();
          $kpiCompMapping1->m_project_progress_id= $request->m_project_progress_id;
          $kpiCompMapping1->m_assigned_kpi_id=$assignedKpi->id;
          $kpiCompMapping1->m_project_level1_kpis_id= $lev1->id;
          $kpiCompMapping1->save();

            foreach ($kpiCompMapping1->MProjectLevel1Kpi->MProjectLevel2Kpi as $lev2) 
            {
              $kpiCompMapping2= new MAssignedKpiLevel2();
              $kpiCompMapping2->m_project_progress_id= $request->m_project_progress_id;
              $kpiCompMapping2->m_assigned_kpi_level1_id= $kpiCompMapping1->id;
              $kpiCompMapping2->m_project_level2_kpis_id= $lev2->id;
              $kpiCompMapping2->save();

              foreach ($kpiCompMapping2->MProjectLevel2Kpi->MProjectLevel3Kpi as $lev3) 
              {
                $kpiCompMapping3= new MAssignedKpiLevel3();
                $kpiCompMapping3->m_project_progress_id= $request->m_project_progress_id;
                $kpiCompMapping3->m_assigned_kpi_level2_id= $kpiCompMapping2->id;
                $kpiCompMapping3->m_project_level3_kpis_id= $lev3->id;
                $kpiCompMapping3->save();

              foreach ($kpiCompMapping3->MProjectLevel3Kpi->MProjectLevel4Kpi as $lev4)
                {
                  $kpiCompMapping4= new MAssignedKpiLevel4();
                  $kpiCompMapping4->m_project_progress_id= $request->m_project_progress_id;
                  $kpiCompMapping4->m_assigned_kpi_level3_id= $kpiCompMapping3->id;
                  $kpiCompMapping4->m_project_level4_kpis_id= $lev4->id;
                  $kpiCompMapping4->save();
                }
              }
            }
        }
        $i++;
      }       
         // Copy from here
       $tabs=explode("_",$request->page_tabs);
       $maintab=$tabs[0];
       $innertab=$tabs[1];
       return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
    }

    public function dispatchLetterView()
    {

      // dd(DispatchLetter::all());
      $letters=DispatchLetter::select('dispatch_letters.*')
      ->leftjoin('dispatch_letter_ccs','dispatch_letter_ccs.dispatch_letter_id','dispatch_letters.id')
      ->orWhere('dispatch_letter_ccs.user_id',Auth::id())
      ->orWhere('dispatch_letters.sender_id',Auth::id())
      ->distinct()
      ->get();
      // dd($letters);
      return view('admin_hr.dispatch.readOnlyviews.view',compact('letters'));
    }
    public function customkpiComponentMapping(Request $request)
    {
      // dd($request->all());
      $m_project_kpi = new MProjectKpi();
      $m_project_kpi->name = $request->level1;
      $m_project_kpi->standard = 0;
      $m_project_kpi->status = 1;
      
      //Mapping Components
      if(isset($request->component_mapped))
      {
        $m_project_kpi->save();
        foreach($request->component_mapped as $comp){
          $component_mapping = new MPlanKpicomponentMapping();
          $component_mapping->m_project_progress_id = $request->m_project_progress_id;
          $component_mapping->m_plan_component_id = $comp;
          $component_mapping->user_id = Auth::id();
          $component_mapping->status = 1;
          $component_mapping->m_project_kpi_id = $m_project_kpi->id;
          $component_mapping->save();
        }
      }
      else
      {
        return redirect()->back();
      }

      $level1 = 1;
      while(isset($request['level1_'.$level1])){
        $level2 = 0;
        $m_project_level1_kpi = new MProjectLevel1Kpi();
        $m_project_level1_kpi->name = $request['level1_'.$level1];
        $m_project_level1_kpi->weightage = $request['weightage_level1_' . $level1];
        $m_project_level1_kpi->status = 1;
        $m_project_level1_kpi->m_project_kpi_id = $m_project_kpi->id;
        $m_project_level1_kpi->save();
        while(isset($request['level1_'.$level1.'_'.$level2])){
          $level3 = 0;
          $m_project_level2_kpi = new MProjectLevel2Kpi();
          $m_project_level2_kpi->name = $request['level1_'.$level1.'_'.$level2];
          $m_project_level2_kpi->weightage = $request['weightage_level1_'.$level1.'_'.$level2];
          $m_project_level2_kpi->status = 1;
          $m_project_level2_kpi->m_project_level1_kpi_id = $m_project_level1_kpi->id;
          $m_project_level2_kpi->save();
          while(isset($request['level1_'.$level1.'_'.$level2.'_'.$level3])){
            $level4 = 0;
            $m_project_level3_kpi = new MProjectLevel3Kpi();
            $m_project_level3_kpi->name = $request['level1_'.$level1.'_'.$level2.'_'.$level3];
            $m_project_level3_kpi->weightage = $request['weightage_level1_'.$level1.'_'.$level2.'_'.$level3];
            $m_project_level3_kpi->status = 1;
            $m_project_level3_kpi->m_project_level2_kpi = $m_project_level2_kpi->id;
          $m_project_level3_kpi->save();
            while(isset($request['level1_'.$level1.'_'.$level2.'_'.$level3.'_'.$level4])){
              $m_project_level4_kpi = new MProjectLevel4Kpi();
              $m_project_level4_kpi->name = $request['level1_'.$level1.'_'.$level2.'_'.$level3.'_'.$level4];
              $m_project_level4_kpi->weightage = $request['weightage_level1_'.$level1.'_'.$level2.'_'.$level3.'_'.$level4];
              $m_project_level4_kpi->status = 1;
              $m_project_level4_kpi->m_project_level3_kpi = $m_project_level3_kpi->id;
            $m_project_level4_kpi->save();
              $level4++;
            }
            $level3++;
          }
          $level2++;
        }
        $level1++;
      }

      $tabs=explode("_",$request->page_tabs);
      $maintab=$tabs[0];
      $innertab=$tabs[1];
      return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
    }

    public function saveManualImages(Request $request)
    {
      // dd($request->all());
      foreach($request->file('imgs') as $imgs)
      {
        // dd($imgs);
        $data = new MAppAttachment();
        $file_path =$imgs->path();
        $file_extension =$imgs->getMimeType();
        if (!is_dir('storage/uploads/monitoring/')) {
          // dir doesn't exist, make it
          mkdir('storage/uploads/monitoring/');
        }
        if (!is_dir('storage/uploads/monitoring/'.$request->m_project_progress_id.'/')) {
          // dir doesn't exist, make it
          mkdir('storage/uploads/monitoring/'.$request->m_project_progress_id.'/');
        }
        $imgs->store('public/uploads/monitoring/'.$request->m_project_progress_id.'/');
          $data->project_attachement=$imgs->hashName();
          // $data->project_attachement=base64_encode(file_get_contents($file_path));
        $data->user_id=Auth::id();
        $data->m_project_progress_id = $request->m_project_progress_id;
        $data->type = $file_extension;
        $data->attachment_name=$imgs->getClientOriginalName();
        $data->longitude=0;
        $data->latitude=0;
        $data->save();
      }
      $maintab = null;
      $innertab = null;
       $tabs=explode("_",$request->page_tabs);
      $maintab=$tabs[0];
      $innertab=$tabs[1];
      return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);

    }

    public function SavePostSne(Request $request)
    {
      
      $post_sne= PostSne::where('assigned_project_id', $request->assigned_project)->first();
      if($post_sne!=null){ //Update Existing
        if($request->post_sne=="With SNE")
          {
            $post_sne->sne=1;
            if($request->sne_type== "staff_nums"){
              $post_sne->num_of_staff = $request->num_of_staff;
              
            }else{
              $dates=explode("-",$request->sne_daterange);
              $post_sne->conditioned_start_date = $dates[0];
              $post_sne->conditioned_end_date = $dates[1];
            }
          }else{
              $post_sne->recommendation = $request->recommendation;
              $post_sne->future_lessson = $request->future_lessson;
            
          }

      }else{  //CREATE NEW
        $post_sne= new PostSne();
        if ($request->post_sne == "With SNE") {
          $post_sne->sne = 1;
          $post_sne->assigned_project_id = $request->assigned_project;
          if ($request->sne_type == "staff_nums") {
            $post_sne->num_of_staff = $request->num_of_staff;
          } else {
            $dates = explode("-", $request->sne_daterange);
            $post_sne->conditioned_start_date = $dates[0];
            $post_sne->conditioned_end_date = $dates[1];
          }
        } else {
          $post_sne->recommendation = $request->recommendation;
          $post_sne->future_lessson = $request->future_lessson;
        }
      }
      $post_sne->save();
      return redirect()->back(); 

    }

    public function save_m_observations(Request $r)
    {
      $m_observations = MProgressObservation::updateOrCreate(
        ['m_project_progress_id' => $r->m_project_progress_id],
        ['user_id' => Auth::id(),'observation' => $r->observation]);
      $m_recommendation = MProgressRecommendation::updateOrCreate(
        ['m_project_progress_id' => $r->m_project_progress_id],
        ['user_id' => Auth::id(), 'recommendation' => $r->recommendation]
      );
      if($r->hasFile('stored_file')){
        if (!is_dir('storage/uploads/monitoring/' . $r->m_project_progress_id)) {
          // dir doesn't exist, make it
          mkdir('storage/uploads/monitoring/' . $r->m_project_progress_id);
        }
        if (!is_dir('storage/uploads/monitoring/'.$r->m_project_progress_id.'/pictorial_detail/')) {
          // dir doesn't exist, make it
          mkdir('storage/uploads/monitoring/' . $r->m_project_progress_id . '/pictorial_detail/');
        }
        foreach($r->file('stored_file') as $key=>$fil){
          $pictorial_detail = new MProgressPictorialDetail();
          if(isset($r->pictorial_id[$key]))
          $pictorial_detail = MProgressPictorialDetail::find($r->pictorial_id[$key]);
           $fil->store('public/uploads/monitoring/' . $r->m_project_progress_id . '/pictorial_detail/');
           $pictorial_detail->stored_file = $fil->hashName();
           $pictorial_detail->caption = $r->caption[$key];
           $pictorial_detail->description = $r->description[$key];
           $pictorial_detail->m_project_progress_id = $r->m_project_progress_id;
           $pictorial_detail->user_id = Auth::id();
           $pictorial_detail->save();
        }

      }
      // $m_observations->user_id = Auth::id();
      // $m_observations->m_project_progress_id = $r->m_project_progress_id;
      // $m_observations->observation = $r->observation;
      // $m_observations->save();
     $tabs=explode("_",$r->page_tabs);
      $maintab=$tabs[0];
      $innertab=$tabs[1];
      return redirect()->back()->with(["maintab"=>$maintab,"innertab"=>$innertab,'success'=>'Saved Successfully']);
    }

    //Questionnaire
    public function storeQuestionnaire(Request $request){
      //$key is index & $value is the value
      foreach ($request->answer as $key => $value) {
        
        $assignedQuestionnaire = new MAssignedQuestionnaire();
        if(isset($request->m_assigned_questionnaire[$key])){
          $assignedQuestionnaire = MAssignedQuestionnaire::find($request->m_assigned_questionnaire[$key]);
        }
         $ans = explode("_",$value);
        $assignedQuestionnaire->m_questionnaire_id =$ans[0];
        $assignedQuestionnaire->answer = $ans[1] == 'yes' ? 1 : 0;
        $assignedQuestionnaire->remarks = $request->comments[$key];
        $assignedQuestionnaire->m_project_progress_id = $request->m_project_progress_id;
        $assignedQuestionnaire->user_id = Auth::id();
        $assignedQuestionnaire->save();
      }
      return redirect()->route('monitoring_inprogressSingle');
    }
    public function storeFinancialSummary(Request $request){
      if(count(MProgressFinancialSummary::where('m_project_progress_id',$request->m_project_progress_id)->get()) > 0){
          MProgressFinancialSummary::where('m_project_progress_id', $request->m_project_progress_id)->delete();
      }
      foreach($request->FinancialSummaryYear as $key=>$value){
        $financial_summary = new MProgressFinancialSummary();
        $financial_summary->m_project_progress_id = $request->m_project_progress_id;
        $financial_summary->year = $request->FinancialSummaryYear[$key];
        $financial_summary->allocation = $request->FinancialSummaryAllocation[$key];
        $financial_summary->releases = $request->FinancialSummaryReleases[$key];
        $financial_summary->expenditure = $request->FinancialSummaryExpenditure[$key];
        $financial_summary->user_id = Auth::id();
        $financial_summary->save();
      }
    $tabs = explode("_", $request->page_tabs);
    $maintab = $tabs[0];
    $innertab = $tabs[1];
    return redirect()->back()->with(["maintab" => $maintab, "innertab" => $innertab, 'success' => 'Saved Successfully']);      
  }
  public function storeContractSummary(Request $request){
      if(count(MProgressContractSummary::where('m_project_progress_id',$request->m_project_progress_id)->get()) > 0){
          MProgressContractSummary::where('m_project_progress_id', $request->m_project_progress_id)->delete();
      }
      foreach($request->description_of_scope as $key=>$value){
        $financial_summary = new MProgressContractSummary();
        $financial_summary->m_project_progress_id = $request->m_project_progress_id;
        $financial_summary->description_of_scope = $request->description_of_scope[$key];
        $financial_summary->agreement_amount = $request->agreement_amount[$key];
        $financial_summary->name_of_supplier = $request->name_of_supplier[$key];
        $financial_summary->start_date = $request->start_date[$key];
        $financial_summary->expected_completion_date = $request->expected_completion_date[$key];
        $financial_summary->user_id = Auth::id();
        $financial_summary->save();
      }
    $tabs = explode("_", $request->page_tabs);
    $maintab = $tabs[0];
    $innertab = $tabs[1];
    return redirect()->back()->with(["maintab" => $maintab, "innertab" => $innertab, 'success' => 'Saved Successfully']);      
  }

  //Result Monitoring Tab

  function saveWbsRemarks(Request $request){
    switch($request->level){
      case '1':
      $kpi = MAssignedKpiLevel1::findOrFail($request->id);
      $kpi->remarks = $request->remarks;
      return response()->json($kpi->update());
        break;

      case '2':
        $kpi = MAssignedKpiLevel2::findOrFail($request->id);
        $kpi->remarks = $request->remarks;
        return response()->json($kpi->update());
        break;

      case '3':
        $kpi = MAssignedKpiLevel3::findOrFail($request->id);
        $kpi->remarks = $request->remarks;
        return response()->json($kpi->update());
        break;

      case '4':
        $kpi = MAssignedKpiLevel4::findOrFail($request->id);
        $kpi->remarks = $request->remarks;
        return response()->json($kpi->update());
        break;
      default:
        return false;
    }
    return false;
  }
}
