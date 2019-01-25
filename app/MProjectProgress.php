<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectProgress extends Model
{
    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
    }

    public function MPlanObjectivecomponentMapping(){
      return $this->hasMany('App\MPlanObjectivecomponentMapping');
    }
    
    public function MPlanKpicomponentMapping(){
      return $this->hasMany('App\MPlanKpicomponentMapping');
    } 
    public function MProjectDate(){
      return $this->hasOne('App\MProjectDate');
    }

    public function MProjectOrganization(){
      return $this->hasOne('App\MProjectOrganization');
    }

    public function MProjectCost(){
      return $this->hasOne('App\MProjectCost');
    }

    public function MProjectLocation(){
      return $this->hasOne('App\MProjectLocation');
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
    public function  MPlanObjective(){
      return $this->hasMany('App\MPlanObjective');
    }
    public function  MPlanComponent(){
      return $this->hasMany('App\MPlanComponent');
    }
    
}
