<?php

namespace App\Http\Middleware;

use Closure;
use App\AssignedProject;
use Auth;
use Illuminate\Http\Response;

class CheckProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $project_data=AssignedProject::select('assigned_projects.*')
      ->leftJoin('assigned_project_teams','assigned_projects.id','assigned_project_teams.assigned_project_id')
      ->where('assigned_projects.acknowledge','1')->where('assigned_projects.project_id',$request->route('project_id'))
      ->where('assigned_project_teams.user_id',Auth::id())
      ->first();
      if($project_data!=null)
        return $next($request);
      else {
        return new Response(view('403'));
      }
    }
}
