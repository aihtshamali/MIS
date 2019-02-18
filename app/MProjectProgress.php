<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectProgress extends Model
{
    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
    }

    public function MAssignedProjectHealthSafety(){
        return $this->hasMany('App\MAssignedProjectHealthSafety');
    }

    public function MPlanObjectivecomponentMapping(){
      return $this->hasMany('App\MPlanObjectivecomponentMapping');
    }

    public function MPlanKpicomponentMapping(){
      return $this->hasMany('App\MPlanKpicomponentMapping');
    }

    public function MAssignedKpiLevel1(){
      return $this->hasMany('App\MAssignedKpiLevel1');
    }

    public function MAssignedKpiLevel2(){
      return $this->hasMany('App\MAssignedKpiLevel2');
    }

    public function MAssignedKpiLevel3(){
      return $this->hasMany('App\MAssignedKpiLevel3');
    }

    public function MAssignedKpiLevel4(){
      return $this->hasMany('App\MAssignedKpiLevel4');
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
    public function  MPlanComponentActivitiesMapping(){
      return $this->hasMany('App\MPlanComponentActivitiesMapping');
    }
    public function MConductQualityassesment(){
      return $this->hasMany('App\MConductQualityassesment');
    } 
    public function MBeneficiaryStakeholder(){
      return $this->hasMany('App\MBeneficiaryStakeholder');
    } 
    public function MSponsoringStakeholder(){
      return $this->hasMany('App\MSponsoringStakeholder');
    } 
    public function MExecutingStakeholder(){
      return $this->hasMany('App\MExecutingStakeholder');
    } 
    public function MUserVisitlocation(){
      return $this->hasMany('App\MUserVisitlocation');
    }
    public function MAppAttachment(){
      return $this->hasMany('App\MAppAttachment');
    }

}
