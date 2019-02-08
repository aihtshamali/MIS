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
use App\MAssignedKpiLevel1;
use App\MAssignedKpiLevel2;
use App\MAssignedKpiLevel3;
use App\MAssignedKpiLevel4;
use App\MAppAttachments;
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

      public function setProjectKpi(Request $request){
        $data =  json_decode($request->data, true);
        foreach ($data['m_kpi']['sector'] as $value) {
          foreach ($value['children'] as $value2) {
            foreach ($value2['children'] as $value3) {
              $m_assigned_kpi_level1 = MAssignedKpiLevel1::find($value3['id']);
              if($m_assigned_kpi_level1){
                $m_assigned_kpi_level1->completed = $value3['completed'];
                $m_assigned_kpi_level1->remarks = $value3['remarks'];
                $m_assigned_kpi_level1->save();
                foreach ($value3['children'] as $value4) {
                  $m_assigned_kpi_level2 = MAssignedKpiLevel2::find($value4['id']);
                  if($m_assigned_kpi_level2){
                    $m_assigned_kpi_level2->completed = $value4['completed'];
                    $m_assigned_kpi_level2->remarks = $value4['remarks'];
                    $m_assigned_kpi_level2->save();
                    foreach ($value4['children'] as $value5) {
                      $m_assigned_kpi_level3 = MAssignedKpiLevel3::find($value5['id']);
                      if($m_assigned_kpi_level3){
                        $m_assigned_kpi_level3->completed = $value5['completed'];
                        $m_assigned_kpi_level3->remarks = $value5['remarks'];
                        $m_assigned_kpi_level3->save();
                        foreach ($value5['children'] as $value6) {
                          $m_assigned_kpi_level4 = MAssignedKpiLevel4::find($value6['id']);
                          if($m_assigned_kpi_level4){
                            $m_assigned_kpi_level4->completed = $value6['completed'];
                            $m_assigned_kpi_level4->remarks = $value6['remarks'];
                            $m_assigned_kpi_level4->save();
                          }
                        }
                      }
                    }
                  }
                }
              }
            };
          };
        };
        // foreach ($data as $key => $value) {
        //   return $value;
        // }
        return response()->json(["message" => "Saved"]);
      }

      public function setProjectData(Request $request){
        // return response()->json($request->location);
        // return response()->json($request->file('ionicfile')->getClientOriginalName()) ;
        // return response()->json(["hello"=>"hi"]);

        // $i = 0;
        // while($request->hasFile('ionicfile'.$i)){
          $data = new MAppAttachments();
          $file_path = $request->file('ionicfile')->path();
          $file_extension = $request->file('ionicfile')->getMimeType();
          if (!is_dir('storage/uploads/monitoring/')) {
            // dir doesn't exist, make it
            mkdir('storage/uploads/monitoring/');
          }
          $request->file('ionicfile')->store('public/uploads/monitoring/'.$request->m_project_progress_id.'/');
          $data->project_attachement=$request->file('ionicfile')->hashName();
          // $data->project_attachement=base64_encode(file_get_contents($file_path));
          $data->user_id=$request->user_id;
          $data->m_project_progress_id = $request->m_project_progress_id;
          $data->type = $file_extension;
          $data->attachment_name=$request->file('ionicfile')->getClientOriginalName();
          $data->longitude=$request->longitude;
          $data->latitude=$request->latitude;
          $data->save();
          // $i++;
        // }
        return "Done";
        //
        //
        // $path = $request->file('ionicfile')->store('newImage.png');
        // return response()->json(["response" => "true"]);
        // $data =  json_decode($request->data, true);
        // return $data;
      }

}
