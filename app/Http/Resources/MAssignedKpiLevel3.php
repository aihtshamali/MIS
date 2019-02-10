<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\MAssignedKpiLevel4 as MAssignedKpiLevel4Resource;


class MAssignedKpiLevel3 extends Resource
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
          "name" => $this->MProjectLevel3Kpi->name,
          "completed" => $this->completed,
          "remarks" => $this->remarks,
          "weightage" => $this->MProjectLevel3Kpi->weightage,
          "current_weightage" => $this->current_weightage,
          "children" => MAssignedKpiLevel4Resource::collection($this->MAssignedKpiLevel4),
          "status" => $this->status,
        ];
    }
}
