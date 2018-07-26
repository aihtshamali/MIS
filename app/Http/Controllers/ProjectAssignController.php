<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectAssigned;
use App\AssignedProjectTeam;
use App\User;
use Auth;
use jeremykenedy\LaravelRoles\Models\Role;
use Carbon\Carbon;
class ProjectAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $projects = Project::all();
         $users = User::all();
         // dd($projects);
         return view('project_assigned.index',compact('projects','users'));
     }
     /**
      * Show a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function creates(Request $request)
    {
      if(!($request->priority && $request->project_id)){
        return redirect()->route('assignproject.index');
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
         $projects = $request->projects;
         $users = $request->users;
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
           $assignedProjectTeam->save();
         }
         // dd($assignProjectTeam);

         // foreach($request->projects as $project){
         //     $project_assigned = ProjectAssigned::where('project_id',$project)->first();
         //     if($project_assigned == null){
         //         $project_assigned = new ProjectAssigned();
         //     }
         //     $project_assigned->project_id = $project;
         //     $project_assigned->assigned_date = $current_time;
         //     $project_assigned->user_id = $users;
         //     $project_assigned->from_user_id = Auth::id();
         //     $project_assigned->completion_date = $current_time;
         //     $project_assigned->save();
         //
         //     $project_assigned_log= new ProjectAssignedLog();
         //     $project_assigned_log->project_id = $project;
         //     $project_assigned_log->assigned_date = $current_time;
         //     $project_assigned_log->to_user_id = $users;
         //     $project_assigned_log->user_id = Auth::id();
         //     $project_assigned_log->save();
         //
         //     $project_remarks = new ProjectRemarks();
         //     $project_remarks->project_id = $project;
         //     $project_remarks->remarks = $remarks;
         //     $project_remarks->to_user_id = $users;
         //     $project_remarks->user_id = Auth::id();
         //     $project_remarks->save();
         //
         //     $project_to_change = Project::find($project);
         //     $project_to_change->status = 1;
         //     $project_to_change->save();
         //
         // }
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
