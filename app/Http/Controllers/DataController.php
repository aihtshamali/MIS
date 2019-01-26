<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignedProject;
use App\User;
use Auth;
use App\AssignedSubSector;
use App\Http\Resources\AssignedProject as AssignedResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\MProjectKpi as MProjectKpiResource;

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

        public function getProjectKpi(Request $request){
          // $user = Auth::user();
          // return $request->all();
          $project = AssignedProject::find($request->assigned_project_id);
          // return $project;
          $sub_sectors = $project->project->AssignedSubSectors;
          $sectors = [];
          foreach ($sub_sectors as $sub_sector) {
            array_push($sectors,$sub_sector->SubSector->Sector);
          }
          $m_project_kpis = [];
          foreach ($sectors as $sector) {
            array_push($m_project_kpis,MProjectKpiResource::collection($sector->MProjectKpis));
          }
          return response()->json($m_project_kpis);
        }

}
