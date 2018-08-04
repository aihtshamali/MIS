<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProjectLog extends Model
{
  public function ProjectLog(){
      return $this->hasOne('App\ProjectLog');
  }
}
