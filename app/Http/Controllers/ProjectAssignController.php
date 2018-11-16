<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectTeam;
use App\AssignedProjectTeamLog;
use App\AssignedProjectManager;
use App\User;
use App\Notification;
use Auth;
use App\Events\ProjectAssignedEvent;
use App\Events\ProjectAssignedManagerEvent;
use jeremykenedy\LaravelRoles\Models\Role;
use Carbon\Carbon;
use DB;
use App\ProjectActivity;
use App\AssignedProjectActivity;
class ProjectAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $unassigned=Project::select('projects.*')
      ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
      ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
      ->whereNull('assigned_project_managers.project_id')
      ->whereNull('assigned_projects.project_id')
      ->get();
      // dd($unassigned);
       $assigned=AssignedProject::all();
       $assignedtoManager=AssignedProjectManager::all();
       $managers=User::select('roles.*','role_user.*','users.*')
         ->leftJoin('role_user','role_user.user_id','users.id')
         ->leftJoin('roles','roles.id','role_user.role_id')
         ->where('roles.name','manager')
         ->get();
         $officers=User::select('roles.*','role_user.*','users.*')
         ->leftJoin('role_user','role_user.user_id','users.id')
         ->leftJoin('roles','roles.id','role_user.role_id')
         ->where('roles.name','officer')
         ->get();

         $users = User::select('users.*')
                ->leftJoin('role_user','role_user.user_id','users.id')
                ->leftJoin('roles','roles.id','role_user.role_id')
                ->where('roles.name','officer')
                ->get();
         // $projects = Project::select('projects.*')
         // ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
         // // ->where('assigned_projects.project_id','!=','projects.id')
         // ->get();
         $projects=Project::select('projects.*')
        ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
        ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
        ->whereNull('assigned_project_managers.project_id')
        ->whereNull('assigned_projects.project_id')
        ->where('projects.project_type_id','1')
        ->get();
        // dd($projects);
         return view('project_assigned.index',['unassigned'=>$unassigned,'assignedtoManager'=>$assignedtoManager,'assigned'=>$assigned,'officers'=>$officers,'managers'=>$managers,'projects'=>$projects,'users'=>$users]);
     }
     /**
      * Show a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function create(Request $request)
    {

      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();

      $assigned=AssignedProject::all();
      // $assignedtoManager=AssignedProjectManager::all();

      if(!( $request->project_id)){
        return redirect()->back()->with('error','Project is not Selected');
      }
      $priority = 'low_priority';
      if(isset($request->priority))
        $priority = $request->priority;
      $managers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->Where('roles.name','directorevaluation')
      ->orWhere('roles.name','directormonitoring')
      ->where('users.status',1)
      ->get();
      $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->orWhere('roles.name','officer')
      ->orWhere('roles.name','evaluator')
      ->where('users.status',1)
      ->get();
      return view('executive.evaluation.consultant_assign',['priority'=>$priority,'project_id'=>$request->project_id,'officers'=>$officers,'managers'=>$managers,'assigned'=>$assigned,'unassigned'=>$unassigned]);
    }


    public function create_from_director(Request $request)
    {
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();

      $assigned=AssignedProject::all();
      $assignedtoManager=AssignedProjectManager::all();

      if(!( $request->project_id)){
        return redirect()->back()->with('error','Project is not Selected');
      }
      $priority = 'low_priority';
      if(isset($request->priority))
        $priority = $request->priority;
      if(!$request->priority){
          if($request->inheritPriority==3)
            $priority='high_priority';
          elseif($request->inheritPriority==2)
            $priority='normal_priority';
          elseif($request->inheritPriority==1)
            $priority='low_priority';

        }
      $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->orWhere('roles.name','officer')
      ->orWhere('roles.name','evaluator')
      ->where('users.status',1)
      ->get();
      return view('Director.Evaluation.Evaluation_projects.consultant_assign',['priority'=>$priority,'project_id'=>$request->project_id,'officers'=>$officers,'assigned'=>$assigned,'unassigned'=>$unassigned,'assignedtoManager'=>$assignedtoManager]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_from_director(Request $request)
    {
      $check = AssignedProject::where('project_id',$request->project_id)->first();
      if(isset($check)){
        $team = $check->AssignedProjectTeam;
        foreach ($team as $t) {
          $team_log = new AssignedProjectTeamLog();
          $team_log->assigned_project_id=$t->assigned_project_id;
          $team_log->user_id=$t->user_id;
          $team_log->team_lead=$t->team_lead;
          $team_log->save();
          $t->delete();
        }
        foreach ($request->officer_id as $officer) {
          $assignedProjectTeam = new AssignedProjectTeam();
          $assignedProjectTeam->assigned_project_id=$check->id;
          $assignedProjectTeam->user_id=$officer;
          $notif_officers='';
          if($notif_officers!=''){
            $notif_officers=$notif_officers.' , ';
          }
          $notif_officers= $notif_officers . $assignedProjectTeam->user->first_name ;
          if($officer==$request->team_lead){
            $assignedProjectTeam->team_lead=true;
            $notif_officers= $notif_officers. ' as Team Lead';
          }
          $assignedProjectTeam->save();
        }
      }
      else{

       if($request->priority=='high_priority'){
         $priority=3;
       }
       else if($request->priority=='normal_priority'){
         $priority=2;
       }
       else if($request->priority=='low_priority'){
         $priority=1;
       }

       $current_time = Carbon::now()->toDateString();
       $projects = $request->projects;
       if($request->assign_to=="officer"){
         $users = $request->users;
        // dd($request->all());
        $assignProject= new AssignedProject();
        $assignProject->project_id=$request->project_id;
        $assignProject->assigned_date=$current_time;
        $assignProject->priority=$priority;
        $assignProject->assigned_by=Auth::id();
        $assignProject->save();
        $table_name='assigned_projects';
        $table_id=$assignProject->id;
        $notif_officers='';
        foreach ($request->officer_id as $officer) {
          $assignedProjectTeam = new AssignedProjectTeam();
          $assignedProjectTeam->assigned_project_id=$assignProject->id;
          $assignedProjectTeam->user_id=$officer;
          if($notif_officers!=''){
            $notif_officers=$notif_officers.' , ';
          }
          $notif_officers= $notif_officers . $assignedProjectTeam->user->first_name ;
          if($officer==$request->team_lead){
            $assignedProjectTeam->team_lead=true;
            $notif_officers= $notif_officers. ' as Team Lead';
          }
          $assignedProjectTeam->save();
        }

        $project_activities = ProjectActivity::all();
        foreach ($project_activities as $project_activity) {
          $assigned_project_activity = new AssignedProjectActivity();
          if($project_activity->id==1){
            $assigned_project_activity->start_date=date('Y-m-d');
          }
         $assigned_project_activity->project_activity_id = $project_activity->id;
         $assigned_project_activity->project_id = $assignProject->id;
          if(count($request->officer_id) > 1){
            foreach ($request->officer_id as $officer) {
                if($officer==$request->team_lead){
                  $assigned_project_activity->user_id = $officer;
                  break;
                }
            }
          }
            else{
              foreach ($request->officer_id as $officer) {
                    $assigned_project_activity->user_id = $officer;
              }
            }
            $assigned_project_activity->assigned_by = Auth::id();
            // dd($assigned_project_activity);
            $assigned_project_activity->save();
        }

      }else if($request->assign_to=='manager'){
        foreach ($request->manager_id as $manager) {
          $assignedProjectManager = new AssignedProjectManager();

          $assignedProjectManager->project_id=$request->project_id;
          $assignedProjectManager->priority=$priority;
          $assignedProjectManager->user_id=$manager;
          $assignedProjectManager->save();
        }
        $table_name='assigned_project_managers';
        $table_id=$assignedProjectManager->id;

      }
    }


        return redirect()->route('Evaluation_evaluation_assigned');
    }

    public function create_from_Mdirector(Request $request)
    {
      $unassigned=Project::select('projects.*')
     ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
     ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
     ->whereNull('assigned_project_managers.project_id')
     ->whereNull('assigned_projects.project_id')
     ->get();

      $assigned=AssignedProject::all();
      $assignedtoManager=AssignedProjectManager::all();

      if(!( $request->project_id)){
        return redirect()->back()->with('error','Project is not Selected');
      }
      $priority = 'low_priority';
      if(isset($request->priority))
        $priority = $request->priority;
      if(!$request->priority){
          if($request->inheritPriority==3)
            $priority='high_priority';
          elseif($request->inheritPriority==2)
            $priority='normal_priority';
          elseif($request->inheritPriority==1)
            $priority='low_priority';

        }
      $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->where('roles.name','officer')
      ->get();
      return view('Director.Evaluation.Evaluation_projects.consultant_assign',['priority'=>$priority,'project_id'=>$request->project_id,'officers'=>$officers,'assigned'=>$assigned,'unassigned'=>$unassigned,'assignedtoManager'=>$assignedtoManager]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_from_Mdirector(Request $request)
    {
      $check = AssignedProject::where('project_id',$request->project_id)->first();
      if(isset($check)){
        $team = $check->AssignedProjectTeam;
        foreach ($team as $t) {
          $team_log = new AssignedProjectTeamLog();
          $team_log->assigned_project_id=$t->assigned_project_id;
          $team_log->user_id=$t->user_id;
          $team_log->team_lead=$t->team_lead;
          $team_log->save();
          $t->delete();
        }
        foreach ($request->officer_id as $officer) {
          $assignedProjectTeam = new AssignedProjectTeam();
          $assignedProjectTeam->assigned_project_id=$check->id;
          $assignedProjectTeam->user_id=$officer;
          $notif_officers='';
          if($notif_officers!=''){
            $notif_officers=$notif_officers.' , ';
          }
          $notif_officers= $notif_officers . $assignedProjectTeam->user->first_name ;
          if($officer==$request->team_lead){
            $assignedProjectTeam->team_lead=true;
            $notif_officers= $notif_officers. ' as Team Lead';
          }
          $assignedProjectTeam->save();
        }
      }
      else{

       if($request->priority=='high_priority'){
         $priority=3;
       }
       else if($request->priority=='normal_priority'){
         $priority=2;
       }
       else if($request->priority=='low_priority'){
         $priority=1;
       }

       $current_time = Carbon::now()->toDateString();
       $projects = $request->projects;
       if($request->assign_to=="officer"){
         $users = $request->users;
        // dd($request->all());
        $assignProject= new AssignedProject();
        $assignProject->project_id=$request->project_id;
        $assignProject->assigned_date=$current_time;
        $assignProject->priority=$priority;
        $assignProject->assigned_by=Auth::id();
        $assignProject->save();
        $table_name='assigned_projects';
        $table_id=$assignProject->id;
        $notif_officers='';
        foreach ($request->officer_id as $officer) {
          $assignedProjectTeam = new AssignedProjectTeam();
          $assignedProjectTeam->assigned_project_id=$assignProject->id;
          $assignedProjectTeam->user_id=$officer;
          if($notif_officers!=''){
            $notif_officers=$notif_officers.' , ';
          }
          $notif_officers= $notif_officers . $assignedProjectTeam->user->first_name ;
          if($officer==$request->team_lead){
            $assignedProjectTeam->team_lead=true;
            $notif_officers= $notif_officers. ' as Team Lead';
          }
          $assignedProjectTeam->save();
        }

        $project_activities = ProjectActivity::all();
        foreach ($project_activities as $project_activity) {
          $assigned_project_activity = new AssignedProjectActivity();
          if($project_activity->id==1){
            $assigned_project_activity->start_date=date('Y-m-d');
          }
         $assigned_project_activity->project_activity_id = $project_activity->id;
         $assigned_project_activity->project_id = $assignProject->id;
          if(count($request->officer_id) > 1){
            foreach ($request->officer_id as $officer) {
                if($officer==$request->team_lead){
                  $assigned_project_activity->user_id = $officer;
                  break;
                }
            }
          }
            else{
              foreach ($request->officer_id as $officer) {
                    $assigned_project_activity->user_id = $officer;
              }
            }
            $assigned_project_activity->assigned_by = Auth::id();
            // dd($assigned_project_activity);
            $assigned_project_activity->save();
        }

      }else if($request->assign_to=='manager'){
        foreach ($request->manager_id as $manager) {
          $assignedProjectManager = new AssignedProjectManager();

          $assignedProjectManager->project_id=$request->project_id;
          $assignedProjectManager->priority=$priority;
          $assignedProjectManager->user_id=$manager;
          $assignedProjectManager->save();
        }
        $table_name='assigned_project_managers';
        $table_id=$assignedProjectManager->id;

      }
    }


        return redirect()->route('Evaluation_evaluation_assigned');
    }
    public function DPM_AssignToConsultant(Request $request)
    {

      $directors=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->Where('roles.name','directorevaluation')
      ->orWhere('roles.name','directormonitoring')
      ->where('users.status',1)
      ->get();
      $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->orWhere('roles.name','officer')
      ->orWhere('roles.name','monitor')
      ->where('users.status',1)
      ->get();
      return view('_Monitoring._Director.assignToConsultant',['officers'=>$officers,'directors'=>$directors]);

    }

    // monitoring
    public function assignToConsultant(Request $request)
    {
      $priority = 'low_priority';
      if(isset($request->priority))
        $priority = $request->priority;
       $directors=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
       ->leftJoin('user_details','user_details.user_id','users.id')
       ->leftJoin('role_user','role_user.user_id','users.id')
       ->leftJoin('roles','roles.id','role_user.role_id')
       ->orderBy('roles.name','ASC')
       ->Where('roles.name','directorevaluation')
       ->orWhere('roles.name','directormonitoring')
       ->where('users.status',1)
       ->get();
       $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
       ->leftJoin('user_details','user_details.user_id','users.id')
       ->leftJoin('role_user','role_user.user_id','users.id')
       ->leftJoin('roles','roles.id','role_user.role_id')
       ->orderBy('roles.name','ASC')
       ->orWhere('roles.name','officer')
       ->orWhere('roles.name','monitor')
       ->where('users.status',1)
       ->get();
       return view('_Monitoring._Manager.assignToConsultant',['priority'=>$priority,'project_id'=>$request->project_id,'officers'=>$officers,'directors'=>$directors]);
    }
    public function DPM_StoreProjectData(Request $request)
    {
    }
     public function store(Request $request)
     {
       // dd($request->all());
        if($request->priority=='high_priority'){
          $priority=3;
        }
        else if($request->priority=='normal_priority'){
          $priority=2;
        }
        else if($request->priority=='low_priority'){
          $priority=1;
        }
        $current_time = Carbon::now()->toDateString();
        $projects = $request->projects;
        if($request->assign_to=="officer"){
          $users = $request->users;
         $assignProject= new AssignedProject();
         $assignProject->project_id=$request->project_id;
         $assignProject->assigned_date=$current_time;
         $assignProject->priority=$priority;
         $assignProject->assigned_by=Auth::id();
         // dd($assignProject->project);
         $assignProject->save();
         $table_name='assigned_projects';
         $table_id=$assignProject->id;
         $notif_officers='';
         foreach ($request->officer_id as $officer) {
           $assignedProjectTeam = new AssignedProjectTeam();
           $assignedProjectTeam->assigned_project_id=$assignProject->id;
           $assignedProjectTeam->user_id=$officer;
           if($notif_officers!=''){
             $notif_officers=$notif_officers.' , ';
           }
           $notif_officers= $notif_officers . $assignedProjectTeam->user->first_name ;
           if($officer==$request->team_lead){
             $assignedProjectTeam->team_lead=true;
             $notif_officers= $notif_officers. ' as Team Lead';
           }
           $assignedProjectTeam->save();
         }

         $project_activities = ProjectActivity::all();
         foreach ($project_activities as $project_activity) {
           $assigned_project_activity = new AssignedProjectActivity();
           $assigned_project_activity->project_id = $request->project_id;
           if($project_activity->id==1){
             $assigned_project_activity->start_date=date('Y-m-d');
           }
          $assigned_project_activity->project_activity_id = $project_activity->id;
           if(count($request->officer_id) > 1){
             foreach ($request->officer_id as $officer) {
                 if($officer==$request->team_lead){
                   $assigned_project_activity->user_id = $officer;
                   break;
                 }
             }
           }
             else{
               foreach ($request->officer_id as $officer) {
                     $assigned_project_activity->user_id = $officer;
               }
             }
             $assigned_project_activity->assigned_by = Auth::id();
             // dd($assigned_project_activity);
             $assigned_project_activity->save();
         }


       }else if($request->assign_to=='manager'){
         $notif_manager='';
         foreach ($request->manager_id as $manager) {
           $assignedProjectManager = new AssignedProjectManager();

           $assignedProjectManager->project_id=$request->project_id;
           $assignedProjectManager->priority=$priority;
           $assignedProjectManager->assigned_by=Auth::id();
           $assignedProjectManager->user_id=$manager;
           if($notif_manager!='')
              $notif_manager= $notif_manager . ', ';
           $notif_manager= $notif_manager . $assignedProjectManager->user->first_name ;

           $assignedProjectManager->save();
         }
         $table_name='assigned_project_managers';
         $table_id=$assignedProjectManager->id;

       }
       // dd($request->gotoroute)
       if(isset($request->gotoroute))
          return redirect()->route($request->gotoroute);
         return redirect('manager/assignproject');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function AddScore($id){
      // return $req->id;
      $assigned_project = Project::find($id);
      if($assigned_project == null)
        return 0;
      $cost_constant = 0.272483627;
      $effort_constant = 0.183131766;
      $distance_constant = 0.152764717;
      $coverage_constant = 0.190562889;
      $priority_constant = 0.201057001;

      $cost = $assigned_project->ProjectDetail->orignal_cost;
      $assigned_districts = $assigned_project->AssignedDistricts;
      $assigning_forum = $assigned_project->ProjectDetail->AssigningForum;
      $coverage = count($assigned_districts);

      $cost_total = 0;
      $effort_total = 0;
      $distance_total = 0;
      $coverage_total = 0;
      $priority_total = 0;

      //Cost Calculation
      if($cost < 200){
        $cost_total = 0.3;
      }
      else if($cost < 400){
        $cost_total = 0.5;
      }
      else if($cost < 2000){
        $cost_total = 0.6;
      }
      else if($cost < 10000){
        $cost_total = 0.8;
      }
      else{
        $cost_total = 1.0;
      }
      $cost_total *= $cost_constant;

      //Effort Calculation
      if($cost < 200){
        $effort_total = 0.37;
      }
      else if($cost < 400){
        $effort_total = 0.5;
      }
      else if($cost < 2000){
        $effort_total = 0.62;
      }
      else if($cost < 10000){
        $effort_total = 0.76;
      }
      else{
        $effort_total = 1.0;
      }
      $effort_total *= $effort_constant;

      //Distance Calculation
      $max = $assigned_districts[0]->District->distance;
      if($assigned_districts[0]->District->name == "ALL")
        $coverage = 8;
      foreach ($assigned_districts as $district) {
        if($district->District->distance > $max){
          $max = $district->District->distance;
          if($assigned_districts[0]->District->name == "ALL")
            $coverage = 8;
        }
      }
      if($max < 200){
        $distance_total = 0.4;
      }
      else if($max < 400){
        $distance_total = 0.7;
      }
      else{
        $distance_total = 1.0;
      }

      $distance_total *= $distance_constant;

      //Coverage Calculation
      if($coverage < 2){
        $coverage_total = 0.2;
      }
      else if($coverage < 4){
        $coverage_total = 0.35;
      }
      else if($coverage < 6){
        $coverage_total = 0.5;
      }
      else if($coverage < 8){
        $coverage_total = 0.75;
      }
      else{
        $coverage_total = 1.0;
      }

      $coverage_total *= $coverage_constant;

      //Priority Calculation
      $priority_total = $assigning_forum->score;
      $priority_total *= $priority_constant;

      //Sum
      $score = $cost_total + $effort_total + $distance_total + $coverage_total + $priority_total;
      $score *= 100;
      return $score;
    }
}
