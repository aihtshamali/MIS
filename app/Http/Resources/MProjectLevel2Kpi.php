<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MProjectLevel3Kpi as MProjectLevel3KpiResource;

class MProjectLevel2Kpi extends Resource
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
        "name" => $this->name,
        "weightage" => $this->weightage,
        "children" => MProjectLevel3KpiResource::collection($this->MProjectLevel3Kpi),
      ];
    }
}
