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
use Auth;
use DB;
use App\AssignedProjectTeam;
use Illuminate\Database\Eloquent\Collection;
use jeremykenedy\LaravelRoles\Models\Role;
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

        return view('Director.Evaluation.home.pems_tab');
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
        $projects=AssignedProjectManager::select('assigned_project_managers.*')
        ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
        ->where('user_id',Auth::id())
        ->whereNull('assigned_projects.project_id')
        ->get();

        return view('Director.Evaluation.Evaluation_projects.project_assigned_by_manager',['projects'=>$projects]);
      }

      public function evaluation_Inprogressprojects(){
         $assigned=AssignedProject::where('assigned_by',Auth::id())->get();
         $officers = User::all();
         $projects = AssignedProject::all();
         $sectors = Sector::all();
         return view('Director.Evaluation.Evaluation_projects.assigned',compact('assigned','officers','projects','sectors'));
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
         $officers = User::all();
         $projects = AssignedProject::all();
         $sectors = Sector::all();
         return view('Director.Evaluation.Evaluation_projects.search',compact('assigned','officers','projects','sectors'));
      }

      public function re_assign(){
        $projects = AssignedProject::all();
        return view('Director.Evaluation.Evaluation_projects.re_assign',compact('projects'));
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
