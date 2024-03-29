<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MProjectLevel4Kpi extends Resource
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
        // "children" => MProjectLevel4KpiResource::collection($this->MProjectLevel4Kpi),
      ];
    }
}
