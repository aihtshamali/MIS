<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\District as DistrictResource;
use Auth;

class MAssignedUserLocation extends Resource
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
            "id"=> $this->id,
            "district" => $this->when($this->user_id == Auth::id(),new DistrictResource($this->District)),
        ];
    }
}
