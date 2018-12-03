<?php

namespace App\Exports;

use App\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $projects=Project::where('projects.project_type_id',1)->where('projects.status','1')->get();

    $data=collect();
    $i=0;
    foreach ($projects as $value) {
      $i++;
      $projectTitle=$value->title;
      $sector= '';$officers= '';$districts= '';$sne= '';
      foreach ($value->AssignedSubSectors as $subsect) {
        $sector=$sector . $subsect->SubSector->Sector->name . ' , ';
      }
      if(isset($value->AssignedProject))
      {
        foreach ($value->AssignedProject->AssignedProjectTeam as $team) {
        $officers=$officers . $team->User->first_name .' '.$team->User->last_name. ' , ';
        }
        $progress=$value->AssignedProject->progress.'%';
      }
      else{
        $officers='Not Assigned Yet';
      }

      foreach ($value->AssignedDistricts as $district) {
        $districts=$districts . $district->District->name.' , ';
      }

      $progress=$value->ProjectDetail->orignal_cost;
      $data->push(['Serial#'=>$i,'Project Title'=>$projectTitle,'Sectors'=>$sector,' Officers' => $officers , 'Districts'=>$districts,'Progress'=>$progress,'Sne'=>$value->ProjectDetail->sne]);
      // dump($data);
    }
    return $data;
    }
}
