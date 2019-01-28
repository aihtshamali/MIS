<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MProjectLevel1Kpi as MProjectLevel1KpiResource;

class MProjectKpi extends Resource
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
          // "id" => $this->id,
          "name" => $this->name,
          "children" => MProjectLevel1KpiResource::collection($this->MProjectLevel1Kpi),
          // "status" => "1",
        ];
    }
}
