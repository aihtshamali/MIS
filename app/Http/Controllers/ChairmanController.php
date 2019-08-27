<?php

namespace App\Http\Controllers;

use App\MAssignedChairmanProject;
use App\AssignedProject;
use Illuminate\Http\Request;
use App\MProjectProgress;
use App\MChairmanPendingProject;
use App\MChairmanProject;
use App\AssignedProjectManager;
use App\MChairmanProjectDistrict;
use App\MChairmanProjectSubSector;
use Auth;

class ChairmanController extends Controller
{
    // For Director
    public function assignToExecutive(Request $request){
        $mProjectProgress = MProjectProgress::findOrFail($request->m_project_progress_id);
        if($mProjectProgress){
            $chairmanProject = new MChairmanProject();
            
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
            
            $chairmanProject->m_project_progress_id = $mProjectProgress->id;
            $chairmanProject->project_id = $mProjectProgress->AssignedProject->Project->id;
            $chairmanProject->status=0;
            $chairmanProject->save();
            
            foreach($mProjectProgress->AssignedProject->Project->AssignedSubSectors as $subsector){
                $mChairmanSubSector = new MChairmanProjectSubSector();
                $mChairmanSubSector->sub_sector_id = $subsector->SubSector->id;
                $mChairmanSubSector->m_chairman_project_id = $chairmanProject->id;
                $mChairmanSubSector->save();
            }
            
            foreach($mProjectProgress->AssignedProject->Project->AssignedDistricts as $district){
                $districts = new MChairmanProjectDistrict();
                $districts->district_id = $district->District->id;
                $districts->m_chairman_project_id = $chairmanProject->id;
                $districts->save();
            }
            
            $chairmanPendingProject = new MChairmanPendingProject();
            $chairmanPendingProject->m_project_progress_id = $mProjectProgress->id;
            $chairmanPendingProject->project_id = $mProjectProgress->AssignedProject->Project->id;
            $chairmanPendingProject->assigned_by = Auth::id();
            $chairmanPendingProject->m_chairman_project_id = $chairmanProject->id;
            $chairmanPendingProject->save();
            
            return redirect()->back()->withMessage(['msg','Assigned Successfully']);

        }else
            return redirect()->back()->withErrors(['error','Not Found']);
    }
    public function MonitoringAssignToDC(){
            $projects = AssignedProject::select('assigned_projects.*')->where('assigned_by', Auth::id())
                ->leftjoin('projects', 'projects.id', 'assigned_projects.project_id')
                ->where('projects.status', 1)
                ->where('complete', 0)
                ->get();
            // dd($projects[0]->Project->ProjectDetail);
            return view('_Monitoring._Chairman.DirectorAssignProject.MonitoringAssignToExecutive', ['projects' => $projects]);
    }
    public function MonitoringAssignedToDC(){
            $projects = AssignedProject::select('assigned_projects.*')->where('assigned_by', Auth::id())
                ->leftjoin('projects', 'projects.id', 'assigned_projects.project_id')
                ->where('projects.status', 1)
                ->where('complete', 0)
                ->get();
            // dd($projects[0]->Project->ProjectDetail);
            return view('_Monitoring._Chairman.DirectorAssignProject.MonitoringAssignedToExecutive', ['projects' => $projects]);
    }


    // For Executive
    public function AssignedToExecutive()
    {
        $projects = MChairmanPendingProject::where('status','0')->get();
        return view('_Monitoring._Chairman.ManagerAssignProject.AssignedToExecutive', ['projects' => $projects]);
    }
    // Store (Assign to Chairman)
    public function assignToChairman(Request $request){
        $chairmanProject = MChairmanPendingProject::findOrFail($request->m_chairman_project);
        $assignedChairmanProject = MAssignedChairmanProject::where('project_id',$chairmanProject->project_id)->first();
        if(!$assignedChairmanProject){
            $assignedChairmanProject = new MAssignedChairmanProject();
        }
        $assignedChairmanProject->project_id = $chairmanProject->project_id;
        $assignedChairmanProject->m_chairman_pending_project_id = $chairmanProject->id;
        $assignedChairmanProject->save();

        $chairmanProject->status = 1;
        $chairmanProject->save();
        return redirect()->back();
    }
    public function AssignedToChairman()
    {
        $projects = MAssignedChairmanProject::where('status',1)->get();
        return view('_Monitoring._Chairman.ManagerAssignProject.AssignedToChairman', ['projects' => $projects]);
    }
}
