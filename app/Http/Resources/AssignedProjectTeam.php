<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\AssignedProject as AssignedProjectResource;

class AssignedProjectTeam extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // return response()->json(AssignedProject::find($this->assigned_project_id));
        // return parent::toArray($request);
        return [
          "id" => $this->id,
          "user_id" => $this->user_id,
          "team_lead" => $this->team_lead,
          // "assigned_project_id" => $this->assigned_project_id,
          "created_at" => $this->created_at,
          "updated_at" => $this->created_at,
          "assigned_project" => new AssignedProjectResource($this->assignedProject),
        ];
    }

    // public function with($request){
    //   return [
    //     'AssignedProject' => $this->AssignedProject
    //   ];
    // }
}
