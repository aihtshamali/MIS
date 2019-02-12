<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedProjectIssue extends Model
{
    public function MIssueType(){
      return $this->belongsTo('App\MIssueType');
    }
    public function SponsoringAgency(){
      return $this->belongsTo('App\SponsoringAgency');
    }
    public function ExecutingAgency(){
      return $this->belongsTo('App\ExecutingAgency');
    }
}
