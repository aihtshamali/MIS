<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\AssignedProject;

class MonitoringChartController extends Controller
{
    public function index(){
        $actual_total_projects = Project::where('project_type_id',2)->where('status',1)->get();
        $total_projects = $actual_total_projects->count();

        $inprogress_projects = AssignedProject::select('assigned_projects.*')
        ->leftJoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',2)
        ->where('projects.status',1)
        ->where('complete',0)->count();

        $completed_projects = AssignedProject::select('assigned_projects.*')
        ->leftJoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',2)
        ->where('projects.status',1)
        ->where('complete',1)->count();

        \JavaScript::put([
            // 'actual_total_projects' => $actual_total_projects,
            'total_projects' => $total_projects,
            // 'total_assigned_projects' => $total_assigned_projects,
            // 'actual_total_assigned_projects' => $actual_total_assigned_projects,
            'inprogress_projects' => $inprogress_projects,
            'completed_projects' => $completed_projects,
            // 'officers' => $officers,

            ]);
        return view('_Monitoring/analytics/analytics');
    }

    public function m_chart_one(){
        $actual_total_projects = Project::where('project_type_id',2)->where('status',1)->get();
        $total_projects = $actual_total_projects->count();

        $inprogress_projects = AssignedProject::select('assigned_projects.*')
        ->leftJoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',2)
        ->where('projects.status',1)
        ->where('complete',0)->count();

        $completed_projects = AssignedProject::select('assigned_projects.*')
        ->leftJoin('projects','projects.id','assigned_projects.project_id')
        ->where('project_type_id',2)
        ->where('projects.status',1)
        ->where('complete',1)->count();

        \JavaScript::put([
            // 'actual_total_projects' => $actual_total_projects,
            'total_projects' => $total_projects,
            // 'total_assigned_projects' => $total_assigned_projects,
            // 'actual_total_assigned_projects' => $actual_total_assigned_projects,
            'inprogress_projects' => $inprogress_projects,
            'completed_projects' => $completed_projects,
            // 'officers' => $officers,

            ]);
        return view('_Monitoring/analytics/chart_one',compact('total_projects','inprogress_projects','completed_projects'));
    }
}
