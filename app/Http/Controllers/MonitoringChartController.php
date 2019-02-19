<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\AssignedProject;
use App\User;
use DB;
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

        //Chart TWO
        $model = new User();
        $officers = $model->hydrate(
            DB::select(
            'getAllOfficers'
            )
        );
        $assigned_projects = [];
        $actual_assigned_projects = [];
        $team_lead=[];
        $individual_projects=[];
        foreach($officers as $officer){
            if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad" || (preg_match('#M[u|o]hammad*#i', $officer->first_name)==1))
            {
                $officer->first_name = "M.";
                // dd($officer);
            }

            $data = DB::select(
                'MgetOfficersAssignedProjectById' .' '.$officer->id
            );

            $team_member = DB::select(
                'MgetOfficersInProgressAsTeamMemberProjectsById' .' '.$officer->id
            );
            $team_l = DB::select(
                'MgetOfficersInProgressAsTeamLeadProjectsById' .' '.$officer->id
            );
            $individual = DB::select(
                'MgetOfficersInProgressAsIndividualProjectsById' .' '.$officer->id
            );
            array_push($actual_assigned_projects,$data);
            // dd($data);
            array_push($assigned_projects,count($team_member));
            array_push($team_lead,count($team_l));
            array_push($individual_projects,count($individual));
        }

        \JavaScript::put([
            'total_projects' => $total_projects,
            'inprogress_projects' => $inprogress_projects,
            'completed_projects' => $completed_projects,
            // chart two
            'officers' => $officers,
            'team_lead' => $team_lead,
            'assigned_projects' => $assigned_projects,
            'individual_projects' => $individual_projects

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
            'total_projects' => $total_projects,
            'inprogress_projects' => $inprogress_projects,
            'completed_projects' => $completed_projects,
            ]);
        return view('_Monitoring/analytics/chart_one',compact('total_projects','inprogress_projects','completed_projects'));
    }

    public function m_chart_two(){
        $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );
        $assigned_projects = [];
        $actual_assigned_projects = [];
        $team_lead=[];
        $individual_projects=[];
        foreach($officers as $officer){
          if($officer->first_name == "Muhammad" || $officer->first_name == "Mohammad" || (preg_match('#M[u|o]hammad*#i', $officer->first_name)==1))
          {
            $officer->first_name = "M.";
            // dd($officer);
          }

          $data = DB::select(
            'MgetOfficersAssignedProjectById' .' '.$officer->id
          );

          $team_member = DB::select(
            'MgetOfficersInProgressAsTeamMemberProjectsById' .' '.$officer->id
          );
          $team_l = DB::select(
            'MgetOfficersInProgressAsTeamLeadProjectsById' .' '.$officer->id
          );
          $individual = DB::select(
            'MgetOfficersInProgressAsIndividualProjectsById' .' '.$officer->id
          );
          array_push($actual_assigned_projects,$data);
          // dd($data);
          array_push($assigned_projects,count($team_member));
          array_push($team_lead,count($team_l));
          array_push($individual_projects,count($individual));
        }
        // dd($actual_assigned_projects);
      \JavaScript::put([
        'officers' => $officers,
        'team_lead' => $team_lead,
        'assigned_projects' => $assigned_projects,
        'individual_projects' => $individual_projects
        ]);
        return view('_Monitoring/analytics/chart_two',['officers' => $officers,'assigned_projects' => $assigned_projects,'actual_assigned_projects' => $actual_assigned_projects]);

    }
}
