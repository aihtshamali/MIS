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

    public function MAssignedKpi(){
      return $this->hasMany('App\MAssignedKpi');
    }

    public function MAssignedKpiLevel1(){
      return $this->hasMany('App\MAssignedKpiLevel1');
    }
    public function MAssignedProjectIssue(){
      return $this->hasMany('App\MAssignedProjectIssue');
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
    public function MProjectAttachment(){
      return $this->hasMany('App\MProjectAttachment');
    }
    public function MAssignedProjectFeedBack(){
      return $this->hasMany('App\MAssignedProjectFeedBack');
    }
    public function MAssignedProjectHealthSafety(){
      return $this->hasMany('App\MAssignedProjectHealthSafety');
    }
    public function MAssignedUserLocation(){
      return $this->hasMany('App\MAssignedUserLocation');
    }
    public function MAssignedUserKpi(){
      return $this->hasMany('App\MAssignedUserKpi');
    }

    public function ReportImage(){
      return $this->hasMany('App\ReportImage');
    }
    public function ReportData(){
      return $this->hasOne('App\ReportData');
    }

    public function MProgressObservation(){
      return $this->hasOne('App\MProgressObservation');
    }



}
