<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectProgress extends Model
{
    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
    }
    public function MAssignedProjectComponent(){
      return $this->hasMany('App\MAssignedProjectComponent');
    }
    public function MAssignedProjectObjective(){
      return $this->hasMany('App\MAssignedProjectObjective');
    }
    public function MFinancialPhase(){
      return $this->hasMany('App\MFinancialPhase');
    }
    public function MAssignedProjectMappingObjective(){
      return $this->hasMany('App\MAssignedProjectMappingObjective');
    }
}
