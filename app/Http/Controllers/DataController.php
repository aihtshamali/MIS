<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\AssignedProject;
use App\User;
use Auth;
use App\AssignedSubSector;
use App\Http\Resources\AssignedProject as AssignedResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\MProjectKpi as MProjectKpiResource;
use App\Http\Resources\MPlanKpicomponentMapping as MPlanKpicomponentMappingResource;
// use App\GeneralKpi;

class DataController extends Controller
{
        public function open()
        {
            $data = "This data is open and can be accessed without the client being authenticated";
            return response()->json(compact('data'),200);
        }

        public function closed()
        {
            $data = "Only authorized users can see this";
            return response()->json(compact('data'),200);
        }

        public function getAssignedProject(){
          return response()->json(new UserResource(User::find(Auth::id())));
          // return AssignedResource::collection(Auth::user()->AssignedProjectTeam);
        }

        // public function getProjectKpi(Request $request){
        //   // $user = Auth::user();
        //   // return $request->all();
        //   $project = AssignedProject::find($request->assigned_project_id);
        //   // return $project;
        //   $sub_sectors = $project->project->AssignedSubSectors;
        //   $sectors = [];
        //   foreach ($sub_sectors as $sub_sector) {
        //     array_push($sectors,$sub_sector->SubSector->Sector);
        //   }
        //   $sectors = array_unique($sectors);
        //   $m_project_kpis = ["m_kpi"=>["sector"=>[]],"general_kpi"=>[]];
        //   foreach ($sectors as $sector) {
        //
        //       array_push($m_project_kpis["m_kpi"]["sector"],["name"=>$sector->name,"children"=>MProjectKpiResource::collection($sector->MProjectKpis)]);
        //       // array_push($m_project_kpis["m_kpi"]["sector"]["children"],$value);
        //       // foreach (MProjectKpiResource::collection($sector->MProjectKpis) as  $value) {
        //       // }
        //     // return response()->json(MProjectKpiResource::collection($sector->MProjectKpis));
        //   }
        //   // $m_general_kpis = [];
        //   // foreach (GeneralKpi::where('status',1)->get() as $value) {
        //   //   array_push($m_project_kpis["general_kpi"],$value);
        //   // }
        //   // $m_project_kpis->push(GeneralKpi::where('status',1)->get());
        //   // return
        //   return response()->json($m_project_kpis);
        // }

        public function getProjectKpi(Request $request){
          $project = AssignedProject::find($request->assigned_project_id);
          // return $project;
          // $sub_sectors = $project->project->AssignedSubSectors;
          $index = 0;
          $project_progresses = $project->MProjectProgress->last()->MPlanKpicomponentMapping;
          $m_project_kpis = ["m_kpi"=>["sector"=>[]],"general_kpi"=>[]];

          //Removing General Kpi from Array And Adding them to final Array
          foreach ($project_progresses as $value) {
            if($value->MProjectKpi->sector_id == NULL){
              array_push($m_project_kpis["general_kpi"],new MPlanKpicomponentMappingResource($value));
              unset($project_progresses[$index]);
            }
            $index ++;
          }

          //Fetching Sectors from Array
          $sectors = [];
          foreach ($project_progresses as $value) {
            $sectors = array_merge($sectors,array($value->MProjectKpi->Sector->name=>[]));
          }
          $sectors = array_unique($sectors);
          // Placing results to corresponding Sectors Respectively
          foreach ($sectors as $key => $sector) {
            foreach ($project_progresses as $progress) {
                array_push($sectors[$progress->MProjectKpi->Sector->name],new MPlanKpicomponentMappingResource($progress));
            }
          }

          foreach ($sectors as $key => $value) {
            array_push($m_project_kpis["m_kpi"]["sector"],["name"=>$key,"children"=>$value]);
          }
          return $m_project_kpis;
          // return $m_project_kpis;
        //   foreach ($sub_sectors as $sub_sector) {
        //     array_push($sectors,$sub_sector->SubSector->Sector);
        //   }
        //   $sectors = array_unique($sectors);
        //   foreach ($sectors as $sector) {
        //
        // }
      }

}
