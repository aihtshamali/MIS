<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSeverity extends Model
{
  public function MAssignedProjectIssue(){
    return $this->hasMany('App\MAssignedProjectIssue');
  }
}
