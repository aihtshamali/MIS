<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\District as DistrictResource;
use App\Http\Resources\ProjectType as ProjectTypeResource;
use App\Http\Resources\EvaluationType as EvaluationTypeResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\AssigningForumSubList as AssigningForumSubListResource;
use App\Http\Resources\ProjectDetail as ProjectDetailResource;
use App\Http\Resources\AssignedDistrict as AssignedDistrictResource;
use App\Http\Resources\MAssignedUserLocation as MAssignedUserLocationResource;


class Project extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // return response()->json($request->all());
        return [
          "id" => $this->id,
          "title" => $this->title,
          "project_no" => $this->project_no,
          "ADP" => $this->ADP,
          "project_type" => new ProjectType($this->ProjectType),
          "evaluation_type" => new EvaluationType($this->EvaluationType),
          "user_id" => new UserResource($this->user),
          "created_at" => $this->created_at,
          "updated_at" => $this->updated_at,
          "assigning_forum_sub_list" => new AssigningForumSubListResource($this->AssigningForumSubList),
          "score" => $this->score,
          "financial_year" => $this->financial_year,
          "status" => $this->status,
          "district" => AssignedDistrict::collection($this->AssignedDistricts),
          "mdistrict" => $this->when($this->AssignedProject->MProjectProgress->last()->MAssignedUserLocation != NULL,MAssignedUserLocationResource::collection($this->AssignedProject->MProjectProgress->last()->MAssignedUserLocation)),
          "project_detail" => new ProjectDetailResource($this->ProjectDetail),
          // "district" => DistrictResource::collection($this->AssignedDistricts->District),
        ];
    }
}
