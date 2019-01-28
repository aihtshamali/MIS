<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\AssigningForum as AssigningForumResource;
use App\Http\Resources\ApprovingForum as ApprovingForumResource;
use App\Http\Resources\District as DistrictResource;

class ProjectDetail extends Resource
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
          // "project_id" => "1037",
          "currency" => $this->currency,
          "orignal_cost" => $this->orignal_cost,
          "planned_start_date" => $this->planned_start_date,
          "planned_end_date" => $this->planned_end_date,
          "gestation_period" => date_diff(date_create($this->planned_start_date),date_create($this->planned_end_date))->format('%y years %m months %d days'),
          // "revised_start_date" => "1970-01-01",
          "attachment_type" => $this->attachment_type,
          "assigning_forum_id" => new AssigningForumResource($this->AssigningForum),
          "approving_forum_id" => new ApprovingForumResource($this->ApprovingForum),
          // "sub_project_type_id" => "1",
          "created_at" => $this->created_at,
          "updated_at" => $this->updated_at,
          "sne" => $this->sne,
          // "attachment" => null,
          "sne_cost" => $this->sne_cost,
          "sne_staff_positions" => $this->sne_staff_positions,
          "project_approval_date" => $this->project_approval_date,
          "admin_approval_date" => $this->admin_approval_date,
          "online_funds_date" => $this->online_funds_date,
          "actual_start_date" => $this->actual_start_date,
          "operation_and_maintainence_agency" => $this->operation_and_maintainence_agency,
          "contractor" => $this->contractor,
          "design_consultant" => $this->design_consultant,
          "supervisory_consultant" => $this->supervisory_consultant,
          "number_of_procurement_packages" => $this->number_of_procurement_packages
        ];;
    }
}
