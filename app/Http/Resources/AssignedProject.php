<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\User as UserResource;


class AssignedProject extends Resource
{

    // protected $collects =
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
          "project" => $this->when($this->project->project_type_id == 2,new ProjectResource($this->project)),
          "assigned_date" => $this->assigned_date,
          "completion_date" => $this->completion_date,
          "priority" => $this->priority,
          "acknowledge" => $this->acknowledge,
          "complete" => $this->complete,
          // "assumed_completion_date" => $this->ass,
          "assigned_by" => new UserResource($this->user),
          // "system_generated_problem" => "0",
          "created_at" => $this->created_at,
          "updated_at" => $this->updated_at,
          "progress" => $this->progress,
        ];
    }
}
