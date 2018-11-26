<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedProjectComponent extends Model
{
    public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }
    public function User(){
      return $this->belongsTo('App\User');
    }
    public function MProjectKpis(){
      return $this->belongsTo('App\MProjectKpis');
    }
    public function MAssignedProjectMappingObjective(){
      return $this->hasMany('App\MAssignedProjectMappingObjective');
    }
}
