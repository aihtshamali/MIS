<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\MAssignedKpiLevel2 as MAssignedKpiLevel2Resource;

class MAssignedKpiLevel1 extends Resource
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
          "name" => $this->MProjectLevel1Kpi->name,
          "completed" => $this->completed,
          "remarks" => $this->remarks,
          "weightage" => $this->MProjectLevel1Kpi->weightage,
          "current_weightage" => $this->current_weightage,
          "title" => $this->current_weightage.' %',
          "children" => MAssignedKpiLevel2Resource::collection($this->MAssignedKpiLevel2),
          "status" => $this->status,
          // "created_at" => null,
          // "updated_at" => null
        ];
    }
}
