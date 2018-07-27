<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectAssigned;
use App\AssignedProjectTeam;
use App\AssignedProjectManager;
use App\User;
use Auth;
use jeremykenedy\LaravelRoles\Models\Role;
use Carbon\Carbon;
use DB;
class ProjectAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
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
        ->whereNull('assigned_projects.project_id')
        ->get();
         // dd($projects);
         // $users = User::all();
         // dd($projects);
         return view('project_assigned.index',['officers'=>$officers,'managers'=>$managers,'projects'=>$projects,'users'=>$users]);
     }
     /**
      * Show a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function create(Request $request)
    {
      if(!($request->priority && $request->project_id)){
        return redirect()->route('assignproject.index')->withMessage('Please select the Priority');
      }
      $managers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->where('roles.name','manager')
      ->get();
      $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
      ->leftJoin('user_details','user_details.user_id','users.id')
      ->leftJoin('role_user','role_user.user_id','users.id')
      ->leftJoin('roles','roles.id','role_user.role_id')
      ->orderBy('roles.name','ASC')
      ->where('roles.name','officer')
      ->get();
      // dd($officers);
      // $Officers=
      return view('executive.evaluation.consultant_assign',['priority'=>$request->priority,'project_id'=>$request->project_id,'officers'=>$officers,'managers'=>$managers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        dd($request->all());
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
         // dd($current_time);
         $assignProject= new ProjectAssigned();
         $assignProject->project_id=$request->project_id;
         $assignProject->assigned_date=$current_time;
         $assignProject->priority=$priority;
         $assignProject->assigned_by=Auth::id();
         $assignProject->save();

         foreach ($request->officer_id as $officer) {
           $assignedProjectTeam = new AssignedProjectTeam();
           $assignedProjectTeam->assigned_project_id=$assignProject->id;
           $assignedProjectTeam->user_id=$officer;
           if($officer==$request->team_lead){
             $assignedProjectTeam->team_lead=true;
           }
           $assignedProjectTeam->save();
         }
       }else if($request->assign_to=='manager'){
         foreach ($request->manager_id as $manager) {
           $assignedProjectManager = new AssignedProjectManager();
           $assignedProjectManager->project_id=$request->project_id;
           $assignedProjectManager->user_id=$manager;
           $assignedProjectManager->save();
         }
       }
         return redirect('/executive');
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
}
