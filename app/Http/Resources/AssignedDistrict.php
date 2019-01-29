<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\District as DistrictResource;

class AssignedDistrict extends Resource
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
        // "project_id" => ,
        "district" => new DistrictResource($this->District),
        "created_at" => $this->created_at,
        "updated_at" => $this->updated_at
      ];
        // return parent::toArray($request);
    }
}
