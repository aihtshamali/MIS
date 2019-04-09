<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MAssignedProjectIssue extends Resource
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
            "issue" => $this->issue,
            "m_issue_type" => $this->MIssueType->name,
            "severity" => $this->severity,
            "sponsoring_agency" => $this->when($this->sponsoring_agency_id != NULL,$this->SponsoringAgency),
            "executing_agency" => $this->when($this->executing_agency_id != NULL,$this->ExecutingAgency),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
