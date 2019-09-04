<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\AssignedProject;
use App\ProjectActivity;
use App\Project;
use App\AssignedProjectActivity;
use Auth;
use App\HrMomAttachment;
use App\HrAttachment;
use App\HrMeetingPDWP;
use Illuminate\Support\Facades\Schema;
use App\Imports\AdpProjectImport;
use App\Exports\ProjectExport;
use Maatwebsite\Excel\Facades\Excel;
use App\PlantripTriprequest;
use App\MPlanKpicomponentMapping;
use Illuminate\Support\Collection;
use \DateTime;
use \DateTimeZone;
use App\MProjectLocation;
use App\MAssignedKpiLevel1Log;
use App\MAssignedKpiLevel2Log;
use App\MAssignedKpiLevel3Log;
use App\MAssignedKpiLevel4Log;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\MAssignedChairmanProject;
use App\MChairmanProjectSubSector;
use App\Sector;

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


     // Download Excel file
     public function ExportProjectDataSNEWise(){
       return Excel::download(new ProjectExport , 'ProjectSNEData.xlsx');
     }

     public function deleteProject(Request $request){
        $p = Project::find($request->p);
        // $assigned_projects = AssignedProject::select('project_id')
        // ->leftJoin('projects','projects.id','assigned_projects.project_id')
        // ->where('projects.project_type_id',2)
        // ->get();
        $ap = AssignedProject::find($request->ap);
        // dd($assigned_projects);
        // dd($assigned_projects);
        // MProjectLocation::truncate();
        // MAssignedKpiLevel4Log::truncate();
        // MAssignedKpiLevel3Log::truncate();
        // MAssignedKpiLevel2Log::truncate();
        // MAssignedKpiLevel1Log::truncate();
        // foreach($assigned_projects as $ap){
          if($ap->Project->project_type_id == 2){
            if(count($ap->MProjectProgress)){
              foreach($ap->MProjectProgress as $mp){
                if($mp->MProjectCost !=NULL){
                  $mp->MProjectCost->delete();
                }
                if($mp->MPlanObjectivecomponentMapping !=NULL){
                  foreach($mp->MPlanObjectivecomponentMapping as $mpoc){
                    $mpoc->delete();
                  }
                }
                if($mp->MPlanKpicomponentMapping !=NULL){
                  foreach($mp->MPlanKpicomponentMapping as $mpkcm){
                    $mpkcm->delete();
                  }
                }
                if($mp->MAssignedKpi !=NULL){
                  foreach($mp->MAssignedKpi as $mak){
                    foreach($mak->MAssignedKpiLevel1 as $mak1){
                      foreach($mak1->MAssignedKpiLevel2 as $mak2){
                        foreach($mak2->MAssignedKpiLevel3 as $mak3){
                          foreach($mak3->MAssignedKpiLevel4 as $mak4){
                            $mak4->delete();
                          }
                          $mak3->delete();
                        }
                        $mak2->delete();
                      }
                      $mak1->delete();
                    }
                    $mak->delete();
                  }
                }
                if($mp->ReportImage !=NULL){
                  foreach($mp->ReportImage as $ri){
                    $ri->delete();
                  }
                }
                // if($mp->ReportData !=NULL){
                //   foreach($mp->ReportData as $rd){
                //     $rd->delete();
                //   }
                // }
                if($mp->MAssignedProjectHealthSafety !=NULL){
                  foreach($mp->MAssignedProjectHealthSafety as $maphs){
                    $maphs->delete();
                  }
                }
                if($mp->MProjectAttachment !=NULL){
                  foreach($mp->MProjectAttachment as $mpa){
                    $mpa->delete();
                  }
                }
                if($mp->MAssignedUserKpi !=NULL){
                  foreach($mp->MAssignedUserKpi as $mauk){
                    $mauk->delete();
                  }
                }
                if($mp->MAssignedUserLocation !=NULL){
                  foreach($mp->MAssignedUserLocation as $maul){
                    $maul->delete();
                  }
                }
                if($mp->MConductQualityassesment !=NULL){
                  foreach($mp->MConductQualityassesment as $mcqa){
                    $mcqa->delete();
                  }
                }
                if($mp->MExecutingStakeholder !=NULL){
                  foreach($mp->MExecutingStakeholder as $mes){
                    $mes->delete();
                  }
                }
                if($mp->MSponsoringStakeholder !=NULL){
                  foreach($mp->MSponsoringStakeholder as $mss){
                    $mss->delete();
                  }
                }
                if($mp->MProjectDate !=NULL){
                  $mp->MProjectDate->delete();
                }
                // if($mp->MProjectLocation != NULL){
                //   $mp->MProjectLocation->delete();
                // }
                if($mp->MAppAttachment !=NULL){
                  foreach($mp->MAppAttachment as $maa){
                    $maa->delete();
                  }
                }
                if($mp->MProjectOrganization !=NULL){
                    $mp->MProjectOrganization->delete();
                }
                if($mp->MPlanComponentActivitiesMapping !=NULL){
                  foreach($mp->MPlanComponentActivitiesMapping as $mpcam){
                    // dd($mpcam->MPlanComponentactivityDetailMapping);
                    if($mpcam->MPlanComponentactivityDetailMapping != NULL)
                      $mpcam->MPlanComponentactivityDetailMapping->delete();
                    $mpcam->delete();
                  }
                }
                if($mp->MAssignedProjectFeedBack !=NULL){
                  foreach($mp->MAssignedProjectFeedBack as $mapf){
                    $mapf->delete();
                  }
                }
                if($mp->MAssignedProjectIssue !=NULL){
                  foreach($mp->MAssignedProjectIssue as $mapi){
                    $mapi->delete();
                  }
                }
                if($mp->MPlanObjective !=NULL){
                  foreach($mp->MPlanObjective as $mpo){
                    $mpo->delete();
                  }
                }
                if($mp->MPlanComponent !=NULL){
                  foreach($mp->MPlanComponent as $mpc){
                    $mpc->delete();
                  }
                }
                if($mp->ReportData !=NULL){
                  $mp->ReportData->delete();
                }
                $mp->delete();
              }
            }
            $ap->delete();
          }
        // }
        // foreach($projects as $p){
          foreach($p->ProjectLog as $pl)
            $pl->delete();
          $p->delete();
        // }
        dd('deleted');
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
      // $triprequests = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      // ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      // ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      // ->leftJoin('users','plantrip_members.user_id','users.id')
      // ->where('plantrip_triprequests.status',0)
      // ->where('plantrip_members.requested_by',1)
      // ->where('plantrip_triprequests.approval_status','Pending')
      // ->distinct()
      // ->with('VmisRequestToTransportOfficer')
      // ->get();
      // $triprequestsrecommended = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      // ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      // ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      // ->leftJoin('vmis_request_to_transport_officers','vmis_request_to_transport_officers.plantrip_triprequest_id','plantrip_triprequests.id')
      // ->leftJoin('users','plantrip_members.user_id','users.id')
      // ->where('plantrip_triprequests.status',0)
      // ->where('plantrip_members.requested_by',1)
      // ->where('vmis_request_to_transport_officers.recommended','Recommended')
      // ->where('plantrip_triprequests.approval_status','Pending')
      // ->distinct()
      // ->with('VmisRequestToTransportOfficer')
      // ->get();

      //  $tripcountsFordg =$triprequestsrecommended->count();      
      // $tripcounts=$triprequests->count();
      // dd($tripcounts);
        // return view('home',['tripcountsFordg'=> $tripcountsFordg ,'tripcounts'=>$tripcounts]);

        //Monitoring Project Deletion Code
        return view('home');

    }

    public function reset_password()
    {
      return view('profile.reset');
    }
    public function visitRequest_dashboard()
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

      $triprequestsrecommended = PlantripTriprequest::select('plantrip_triprequests.*','users.first_name','users.last_name')
      ->leftJoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->leftJoin('vmis_request_to_transport_officers','vmis_request_to_transport_officers.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftJoin('users','plantrip_members.user_id','users.id')
      ->where('plantrip_triprequests.status',0)
      ->where('plantrip_members.requested_by',1)
      ->where('vmis_request_to_transport_officers.recommended','Recommended')
      ->where('plantrip_triprequests.approval_status','Pending')
      ->distinct()
      ->with('VmisRequestToTransportOfficer')
      ->get();

       $tripcountsFordg =$triprequestsrecommended->count();
      $tripcounts=$triprequests->count();
        return view('visitrequest_dashboard',['tripcountsFordg'=> $tripcountsFordg,'triprequestsrecommended'=> $triprequestsrecommended,'triprequests'=>$triprequests,'tripcounts'=>$tripcounts]);
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
      //for officers
      $officer=PlantripTriprequest::select('plantrip_triprequests.*')
      ->leftjoin('plantrip_purposes','plantrip_purposes.plantrip_triprequest_id','plantrip_triprequests.id')
      ->leftjoin('plantrip_members','plantrip_members.plantrip_purpose_id','plantrip_purposes.id')
      ->where('plantrip_members.user_id',Auth::id())
      ->distinct()
      ->latest()
      ->get();
      $officercount= $officer->count();
      $tripcounts=$triprequests->count();
    // dd($officer[0]->PlantripRemark[0]->remarks);
    // dd($officer[0]->PlantripDriverRating->rating);
        return view('monitoring_dashboard',['officer'=>$officer ,'officercount'=>$officercount,'triprequests'=>$triprequests,'tripcounts'=>$tripcounts]);
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
      $officers = User::where('status',1)->get();
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


        // Chart two

          $projects=AssignedProject::select('assigned_projects.*')
          ->leftJoin('projects','projects.id','assigned_projects.project_id')
          ->leftJoin('assigned_project_teams','assigned_project_teams.id','assigned_projects.project_id')
          ->where('projects.project_type_id',1)
          ->where('assigned_project_teams.user_id',Auth::id())
          ->where('projects.status',1)
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

          // Chart three
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
            'actual_total_projects' => $actual_total_projects,
            'total_projects' => $total_projects,
            'inprogress_projects' => $inprogress_projects,
            'completed_projects' => $completed_projects,
            'officers' => $officers,
            // Chart two
            'projectsprogress'=>$projectsprogress,
            'projectsprogressranges'=>$ranges,
            // Chart Three
            'activities' => ProjectActivity::all(),
            'projects_activities_progress'=>$projects_activities_progress
            ]);

      return view('dashboard',['activities' => $activities ,'projects_activities_progress'=>$projects_activities_progress,'projectsprogress'=>$projectsprogress,'projectsprogressranges'=>$ranges,'total_projects'=>$actual_total_projects ,'inprogress_projects'=>$inprogress_projects ,'completed_projects'=>$completed_projects],compact('max_score','current_score','actual_max_score','actual_current_score','rank','person'));
    }
    //chart 11
    public function GlobalProgressWiseChart(){
      $projects=AssignedProject::select('assigned_projects.*')
      ->leftJoin('projects','projects.id','assigned_projects.project_id')
      ->where('project_type_id',1)
      ->where('projects.status',1)
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
        return view('executive.home.global_progress_wise_chart');
    }
  public function PDWBforDC()
  {
    return view( 'PDWBforDC.PDWBforDC');
    }
  public function FinancialYearPDWP()
  {
    return view( 'PDWBforDC.FinancialYearPDWP');
    }
  public function summarytable()
  {
    return view( 'summarytable');
    }
  public function summarytableEvaluation()
  {
    // $sector = Session::get('sector');
    return view('summarytableEvaluation');
  }
  public function summarytableMonitoring(Request $r)
  {
    if(Auth::user()->hasRole('chairman|manager'))
      $sectors = Sector::where('status',1)->get();
    
    else if(Auth::user()->hasRole('member|chief'))
    {
      $sec = collect();
      $sectors = Auth::user()->UserSector;
      foreach ($sectors as $userSector) {
        $sec->push($userSector->Sector);
      }
      $sectors = $sec;
    }    
    $arr = array();
    $global_critical = 0;

    $global_need_consideration = 0;
    $global_within_limits = 0;
    
    foreach($sectors as $s){
      if(Auth::user()->hasRole('chief'))
      {
        $sec = collect();
        $subsectors = Auth::user()->UserSector;
        foreach ($subsectors as $userSector) {
          $sec->push($userSector->SubSector);
        }
        $sub_sectors = $sec;
      }else
        $sub_sectors = $s->subsectors()->get();
      $arr[$s->name]['sub_sectors'] = $sub_sectors->toArray();
      $arr[$s->name]["projects"] = [];
      $arr[$s->name]["divisions"] = [];
      $j = 0;
      $l = [];
      $c = 0;
      $d = [];
      $critical = 0;
      $need_consideration = 0;
      $within_limits = 0;
      foreach($sub_sectors as $ss){
        $sub_s = $ss->toArray();
        // $sub_s["projects"] = [];
        // dd($arr);
        //Fetching All Sub Sectors
        $m_chairman_projects_s = $ss->MChairmanProjectSubSector;
        // dd($m_chairman_projects_s);
        //Fetching first Project
        if(count($m_chairman_projects_s) > 0){
          $p_id = $m_chairman_projects_s[0]->m_chairman_project_id;
          $sector_id = $m_chairman_projects_s[0]->SubSector->Sector->id;
          $i = 0;
          foreach($m_chairman_projects_s as $m_chairman_project_sub_sectors){
            if($i > 0 && $p_id == $m_chairman_project_sub_sectors->m_chairman_project_id){
              if($m_chairman_project_sub_sectors->SubSector->Sector->id == $sector_id)
                continue;
            }
            if($m_chairman_project_sub_sectors->sub_sector_id == $sub_s['id']){
              // dd($m_chairman_project_sub_sectors->MChairmanProject->toArray());
              $arr[$s->name]["sub_sectors"][$j]["SHOW"] = 1;
              // array_push($l,$m_chairman_project_sub_sectors->MChairmanProject->toArray());

              if(!array_key_exists($m_chairman_project_sub_sectors->MChairmanProject->id,$l)){
                $c+= $m_chairman_project_sub_sectors->MChairmanProject->final_pc1_approved_cost;
              }
              $l[$m_chairman_project_sub_sectors->MChairmanProject->id] = $m_chairman_project_sub_sectors->MChairmanProject;
              
              $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->critical = $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_planned - $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_actual > 20 ? 1 : 0;
              $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->need_consideration = $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_planned - $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_actual >= 10 && $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_planned - $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_actual <= 20 ? 1 : 0;
              $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->within_limits = $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_planned - $l[$m_chairman_project_sub_sectors->MChairmanProject->id]->physical_progress_actual < 10 ? 1: 0;
              
              if (!array_key_exists($m_chairman_project_sub_sectors->MChairmanProject->id, $arr[$s->name]["projects"])) {
                if($l[$m_chairman_project_sub_sectors->MChairmanProject->id]->critical == 1)
                $critical++;
                else if($l[$m_chairman_project_sub_sectors->MChairmanProject->id]->need_consideration == 1)
                $need_consideration++;
                else
                $within_limits++;
              }
                
              foreach($m_chairman_project_sub_sectors->MChairmanProject->AssignedDistricts as $assigned_districts){
                $d[$assigned_districts->District->Division->name] = $assigned_districts->District->Division;
              }
            }
            $i++;
          }
      }
        $arr[$s->name]["projects"] = $l;
        $arr[$s->name]["cost"] = $c;
        $arr[$s->name]["divisions"] = $d;
        $arr[$s->name]['critical'] = $critical;
        $arr[$s->name]['need_consideration'] = $need_consideration;
        $arr[$s->name]['within_limits'] = $within_limits;
        $j++;
        
      }
      $global_critical+= $arr[$s->name]['critical'];
      $global_need_consideration+= $arr[$s->name]['need_consideration'];
      $global_within_limits+= $arr[$s->name]['within_limits'];
    }
// dd($r->name);
    $second_table = $r->name;
    return view('summarytableMonitoring',compact('arr','global_critical','global_need_consideration','global_within_limits','second_table'));
    }
}
