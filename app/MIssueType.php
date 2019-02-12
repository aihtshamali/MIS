<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MIssueType extends Model
{
    public function MAssignedProjectIssue(){
      return $this->hasMany('App\MAssignedProjectIssue');
    }
}
