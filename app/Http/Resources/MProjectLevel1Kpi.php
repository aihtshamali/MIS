<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MProjectLevel2Kpi as MProjectLevel2KpiResource;


class MProjectLevel1Kpi extends Resource
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
          "weightage" => $this->weightage,
          "children" => MProjectLevel2KpiResource::collection($this->MProjectLevel2Kpi),
        ];
    }
}
