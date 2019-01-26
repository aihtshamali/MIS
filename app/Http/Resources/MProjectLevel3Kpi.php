<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MProjectLevel4Kpi as MProjectLevel4KpiResource;

class MProjectLevel3Kpi extends Resource
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
          "m_project_level4_kpi" => MProjectLevel4KpiResource::collection($this->MProjectLevel4Kpi),
        ];
    }
}
