<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanKpicomponentMapping extends Model
{

    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
      }
      public function MPlanComponent(){
        return $this->belongsTo('App\MPlanComponent');
      }
      public function MProjectKpi(){
        return $this->belongsTo('App\MProjectKpi');
      }

      public function MAssignedKpiLevel1(){
          return $this->hasMany('App\MAssignedKpiLevel1','m_plan_kpicomponent_mappings_id');
      }
}
