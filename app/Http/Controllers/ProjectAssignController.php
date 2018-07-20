<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Auth;
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
         return view('project_assigned.index',compact('projects','users'));
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
       dd($request);
         $projects = $request->projects;
         $users = $request->users;
         $remarks = $request->remarks;
         $current_time = Carbon::now();
         foreach($request->projects as $project){
             $project_assigned = ProjectAssigned::where('project_id',$project)->first();
             if($project_assigned == null){
                 $project_assigned = new ProjectAssigned();
             }
             $project_assigned->project_id = $project;
             $project_assigned->assigned_date = $current_time;
             $project_assigned->user_id = $users;
             $project_assigned->from_user_id = Auth::id();
             $project_assigned->completion_date = $current_time;
             $project_assigned->save();

             $project_assigned_log= new ProjectAssignedLog();
             $project_assigned_log->project_id = $project;
             $project_assigned_log->assigned_date = $current_time;
             $project_assigned_log->to_user_id = $users;
             $project_assigned_log->user_id = Auth::id();
             $project_assigned_log->save();

             $project_remarks = new ProjectRemarks();
             $project_remarks->project_id = $project;
             $project_remarks->remarks = $remarks;
             $project_remarks->to_user_id = $users;
             $project_remarks->user_id = Auth::id();
             $project_remarks->save();

             $project_to_change = Project::find($project);
             $project_to_change->status = 1;
             $project_to_change->save();

         }
         return redirect()->route('projects.index');
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
