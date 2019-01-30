<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\MAssignedKpiLevel3 as MAssignedKpiLevel3Resource;


class MAssignedKpiLevel2 extends Resource
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
          "name" => $this->MProjectLevel2Kpi->name,
          "completed" => $this->completed,
          "remarks" => $this->remarks,
          "weightage" => $this->MProjectLevel2Kpi->weightage,
          "children" => MAssignedKpiLevel3Resource::collection($this->MAssignedKpiLevel3),
          "status" => $this->status,
        ];
    }
}
