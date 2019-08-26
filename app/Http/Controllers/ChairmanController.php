<?php

namespace App\Http\Controllers;

use App\MAssignedChairmanProject;
use Illuminate\Http\Request;
use App\MProjectProgress;
use App\MChairmanPendingProject;
use App\Project;
use Auth;
class ChairmanController extends Controller
{
    public function assignToExecutive(Request $request){
        $mProjectProgress = MProjectProgress::findOrFail($request->m_project_progress_id);
        if($mProjectProgress){
            $chairmanProject =  MChairmanPendingProject::where('m_project_progress_id',$mProjectProgress->id)->first() ? MChairmanPendingProject::where('m_project_progress_id', $mProjectProgress->id)->first() : new MChairmanPendingProject();
            $chairmanProject->gs_num = $mProjectProgress->AssignedProject->Project->ADP;
            $chairmanProject->project_name = $mProjectProgress->AssignedProject->Project->title;
            $chairmanProject->final_pc1_approved_cost = round($mProjectProgress->AssignedProject->Project->ProjectDetail->orignal_cost,2);
            $chairmanProject->final_released_cost = round($mProjectProgress->MProjectCost->total_release_to_date,2);
            $chairmanProject->final_utilized_cost = round($mProjectProgress->MProjectCost->utilization_against_releases,2);
            $chairmanProject->financial_progress_against_pc1_cost = $request->financial_progress;
            $chairmanProject->planned_start_date = $mProjectProgress->AssignedProject->Project->ProjectDetail->planned_start_date;
            $chairmanProject->planned_end_date = $mProjectProgress->AssignedProject->Project->ProjectDetail->planned_end_date;
            $chairmanProject->actual_start_date = $mProjectProgress->MProjectDate->actual_start_date;

            $chairmanProject->physical_progress_planned = $request->planned_physical_progress;
            $chairmanProject->physical_progress_actual = $request->total_physical_progress;
           
            $chairmanProject->assigned_by = Auth::id();
            $chairmanProject->m_project_progress_id = $mProjectProgress->id;
            $chairmanProject->project_id = $mProjectProgress->AssignedProject->Project->id;
            if(isset($chairmanProject->id) && $chairmanProject->id){
                $chairmanProject->status=0;
                $assignedChairman = MAssignedChairmanProject::where('m_chairman_prnding_projects', $chairmanProject->id)->first();
                if($assignedChairman->count()){
                    $assignedChairman->status =0;
                    $assignedChairman->update();
                }
            }
            $chairmanProject->save();
            return redirect()->back()->withMessage(['msg','Assigned Successfully']);

        }else
            return redirect()->back()->withErrors(['error','Not Found']);
        dd($mProjectProgress);
    }
public function MonitoringAssignToDC(){
        $projects = AssignedProject::select('assigned_projects.*')->where('assigned_by', Auth::id())
            ->leftjoin('projects', 'projects.id', 'assigned_projects.project_id')
            ->where('projects.status', 1)
            ->where('complete', 0)
            ->get();
        // dd($projects[0]->Project->ProjectDetail);
        return view('_Monitoring._Chairman.MonitoringAssignToExacutive', ['projects' => $projects]);
}
}
