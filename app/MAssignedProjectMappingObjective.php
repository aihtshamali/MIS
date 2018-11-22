<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedProjectMappingObjective extends Model
{
  public function MProjectProgress(){
    return $this->belongsTo('App\MProjectProgress');
  }
  public function MAssignedProjectObjective(){
    return $this->belongsTo('App\MAssignedProjectObjective');
  }
  public function MAssignedProjectComponent(){
    return $this->belongsTo('App\MAssignedProjectComponent');
  }
}
