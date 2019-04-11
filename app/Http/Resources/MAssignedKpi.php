<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MAssignedKpiLevel1 as MAssignedKpiLevel1Resource;

class MAssignedKpi extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          "id" => $this->id,
          // "m_project_progress_id" => "1",
          "name" => $this->MAssignedUserKpi->MProjectKpi->name,
          "children" => MAssignedKpiLevel1Resource::collection($this->MAssignedKpiLevel1),
          "title" => $this->MAssignedUserKpi->MAssignedUserLocation->site_name
          // "m_plan_component_id" => "2",
          // "status" => "1",
          // "created_at" => "2019-01-30 13:06:44.737",
          // "updated_at" => "2019-01-30 13:06:44.737",
        ];
    }
}
