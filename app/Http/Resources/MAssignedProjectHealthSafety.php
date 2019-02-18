<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MAssignedProjectHealthSafety extends Resource
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
            "m_health_safety_id" => $this->MHealthSafety->name,
            "status" => ($this->status == 'yes' ? true : false),
            "remarks" => $this->remarks,
            // "m_project_progress_id" => "3",
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
            // "user_id" => "3036"
        ];
    }
}
