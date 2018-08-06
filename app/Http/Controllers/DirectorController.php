<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\AssignedProjectManager;
use App\User;
use Auth;
class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('Director.SSR_D.home.index');
    }
    public function pems_index(){
        return view('Director.SSR_D.home.pems_tab');
      }
  
      public function pmms_index(){
        return view('Director.SSR_D.home.pmms_tab');
      }
  
      public function tpv_index(){
        return view('Director.SSR_D.home.tpv_tab');
      }
  
    
      public function inquiry_index(){
        return view('Director.SSR_D.home.inquiry_tab');
      }

      public function evaluation_assignedprojects(){
        $projects=AssignedProjectManager::select('assigned_project_managers.*')
        ->leftJoin('assigned_projects','assigned_projects.project_id','assigned_project_managers.project_id')
        ->where('user_id',Auth::id())
        ->whereNull('assigned_projects.project_id')
        ->get();
        
        return view('Director.SSR_D.Evaluation_projects.project_assigned_by_manager',['projects'=>$projects]);
      }

      public function evaluation_Inprogressprojects(){
        $unassigned=Project::select('projects.*','assigned_project_managers.user_id as manager_id')
        ->leftJoin('assigned_projects','assigned_projects.project_id','projects.id')
        ->leftJoin('assigned_project_managers','assigned_project_managers.project_id','projects.id')
        ->whereNull('assigned_project_managers.project_id')
        ->whereNull('assigned_projects.project_id')
        ->where('assigned_project_managers.user_id',Auth::id())
        ->get();
        
         $assigned=AssignedProject::where('assigned_by',Auth::id())->get();
         $assignedtoManager=AssignedProjectManager::all();   
         return view('Director.SSR_D.Evaluation_projects.assigned',['assigned'=>$assigned,'unassigned'=>$unassigned]);
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
