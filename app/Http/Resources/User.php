<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\AssignedProjectTeam;

class User extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
          'id' => $this->id,
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'username' => $this->username,
          'email' => $this->email,
          'api_token' => $this->api_token,
          'status' => $this->status,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
          'ip_address' => $this->ip_address,
          'assigned_project_team' => AssignedProjectTeam::collection($this->AssignedProjectTeam),
        ];
    }

    // public function with($request){
      // return [
        // 'assigned_project_team' => ['new' => AssignedProjectTeam::collection($this->AssignedProjectTeam),]
      // ];
    // }
}
