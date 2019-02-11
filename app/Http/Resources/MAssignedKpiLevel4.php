<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;



class MAssignedKpiLevel4 extends Resource
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
          "name" => $this->MProjectLevel4Kpi->name,
          "completed" => $this->completed,
          "remarks" => $this->remarks,
          "weightage" => $this->MProjectLevel4Kpi->weightage,
          "current_weightage" => $this->current_weightage,
          "title" => $this->current_weightage.' %',
          "status" => $this->status,
        ];
    }
}
