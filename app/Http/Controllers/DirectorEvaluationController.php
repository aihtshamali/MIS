<?php

namespace App\Http\Controllers;

use App\DirectorEvaluation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use App\Sector;
use App\StoppedProject;
use Auth;
use DB;
use App\AssignedProjectTeam;
use Illuminate\Database\Eloquent\Collection;
use jeremykenedy\LaravelRoles\Models\Role;
use JavaScript;
class DirectorEvaluationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Director.Evaluation.home.index');

    }
    public function pems_index(){
      $total_assigned_projects = count(AssignedProject::all());
      $inprogress_projects = count(AssignedProject::where('acknowledge',1)->get());
      $completed_projects = count(AssignedProject::where('complete',1)->get());
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );

        $assigned_projects = [];
        $assigned_completed_projects = [];
        foreach($officers as $officer){

          $data = DB::select(
            'getOfficersAssignedProjectById' .' '.$officer->id
          );
          $data_3 = DB::select(
            'getOfficersCompletedProjectsById' .' '.$officer->id
            );
          array_push($assigned_projects,count($data));
          array_push($assigned_completed_projects,count($data_3));
        }

      // \JavaScript::put([
      //   'officers' => $officers,
      //   'assigned_projects' => $assigned_projects,

      //   ]);


      return view('Director.Evaluation.home.pems_tab',['officers' => $officers,'assigned_projects' => $assigned_projects,'assigned_completed_projects'=>$assigned_completed_projects]);
      }

      public function pmms_index(){

        return view('Director.Evaluation.home.pmms_tab');
      }

      public function tpv_index(){
        return view('Director.Evaluation.home.tpv_tab');
      }


      public function inquiry_index(){
        return view('Director.Evaluation.home.inquiry_tab');
      }

      public function evaluation_assignedprojects(){

        $projects= AssignedProjectManager::select('assigned_project_managers.*')
          ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
          ->leftJoin('projects','assigned_project_managers.project_id','projects.id')
          ->where('projects.project_type_id',1)
          ->where('assigned_project_managers.user_id',Auth::id())
          ->where('projects.status',1)
          ->whereNull('assigned_projects.project_id')
          ->get();

        return view('Director.Evaluation.Evaluation_projects.project_assigned_by_manager',['projects'=>$projects]);
      }

      public function evaluation_Inprogressprojects(){
         $assigned=AssignedProject::select('assigned_projects.*')
         ->where('assigned_by',Auth::id())
         ->leftjoin('projects','projects.id','assigned_projects.project_id')
         ->where('projects.status',1)
         ->where('complete',0)
         ->where('stopped',false)
         ->get();

         $stoppedProjects=AssignedProject::select('assigned_projects.*')
         ->where('assigned_by',Auth::id())
         ->leftjoin('projects','projects.id','assigned_projects.project_id')
         ->where('projects.status',1)
         ->where('complete',0)
         ->where('stopped',true)
         ->get();

         $officers = User::where('users.status',1)->get();
         $projects = $assigned;
         $sectors = Sector::where('status',1)->get();
         return view('Director.Evaluation.Evaluation_projects.assigned',compact('stoppedProjects','assigned','officers','projects','sectors'));
      } 

      public function stopAssignedProject(Request $request)
      {
          
          $assigned_project=AssignedProject::find($request->assigned_project_id);
          $assigned_project->stopped=true;
          $assigned_project->save();
          $StoppedProject=new StoppedProject();
         
          $StoppedProject->assigned_project_id=$assigned_project->id;
          $StoppedProject->user_id=Auth::id();
          $StoppedProject->remarks=$request->remarks;
          $StoppedProject->save();
          return redirect()->back();
      } 

      public function evaluation_Completedprojects(){
         $projects = AssignedProject::where('complete',1)->get();
         return view('Director.Evaluation.Evaluation_projects.completed',compact('projects'));
      }

      public function searchOfficer(Request $request){
        // dd($request->all());
        $assigned = Collection::make(new AssignedProject);
        if(isset($request->officer_id)){
          $model = new AssignedProject();
          $assigned = $model->hydrate(
            DB::select(
              'getOfficersAssignedProjectById'.' '.$request->officer_id
              )
          );
        }
        if(isset($request->project_id)){
          $result1 = Project::find($request->project_id)->AssignedProject;

          if(!$assigned->contains($result1))
            $assigned->add($result1);
        }
        if(isset($request->sector_id)){
          $projects_model = new AssignedProject();
          $result2 = $projects_model->hydrate(
              DB::select(
                  'getAllSectorProjectsDirector'.' '.$request->sector_id
                )
            );
            foreach ($result2 as $pro) {
              if(!$assigned->contains($pro))
              $assigned->add($pro);
            }
        }
        if(isset($request->starting_cost)){
          $cost_model = new AssignedProject();
          if(!isset($request->ending_cost)){
            $ending_cost = $starting_cost + 1000;
          }
          else{
            $ending_cost = $request->ending_cost;
          }
          $result3 = $cost_model->hydrate(
              DB::select(
                  'costFilter'.' '.$request->starting_cost.','.$ending_cost
                )
            );
            foreach ($result3 as $cost) {
              if(!$assigned->contains($cost))
              $assigned->add($cost);
            }
        }
         $officers = User::where('status',1)->get();
         $projects = AssignedProject::select('assigned_projects.*')
         ->leftJoin('projects','projects.id','assigned_projects.project_id')
         ->where('projects.project_type_id',1)
         ->where('complete',0)
         ->get();
         $sectors = Sector::where('status',1)->get();
         return view('Director.Evaluation.Evaluation_projects.search',compact('assigned','officers','projects','sectors'));
      }

      public function re_assign(){
        $projects = AssignedProject::select('assigned_projects.*')
        ->leftJoin('projects','projects.id','assigned_projects.project_id')
        ->where('projects.project_type_id',1)
        ->get();
        return view('Director.Evaluation.Evaluation_projects.re_assign',compact('projects'));
      }

    public function getAssignedProjects(Request $request){

      $projects = DB::select(
          'getOfficersAssignedProjectById'.' '.$request->data
        );

        return response($projects);
    }
    public function getCompletedProjects(Request $request){

      $projects = DB::select(
        'getOfficersCompletedProjectsById' .' '.$request->data
        );
        return $projects;
    }
      // projects asigned to officers
      public function totalProjectAssigned()
      {
      $total_assigned_projects = count(AssignedProject::all());
      $inprogress_projects = count(AssignedProject::where('acknowledge',1)->get());
      $completed_projects = count(AssignedProject::where('complete',1)->get());
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );
        $assigned_completed_projects = [];
        $assigned_projects = [];
        foreach($officers as $officer){

          $data = DB::select(
            'getOfficersAssignedProjectById' .' '.$officer->id
          );
          $data_3 = DB::select(
            'getOfficersCompletedProjectsById' .' '.$officer->id
            );
          array_push($assigned_projects,count($data));
          array_push($assigned_completed_projects,count($data_3));
        }

      \JavaScript::put([
        'officers' => $officers,
        'assigned_projects' => $assigned_projects,
        'assigned_completed_projects'=>$assigned_completed_projects

        ]);

      // dd($assigned_projects);

      return view('Director.Evaluation.home.pems_tab',['officers' => $officers,'assigned_projects' => $assigned_projects,
      'assigned_completed_projects'=>$assigned_completed_projects
      ]);
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
