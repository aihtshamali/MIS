<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel2 extends Model
{

  protected $table = 'm_assigned_kpi_level2';

  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MAssignedKpiLevel1(){
        return $this->belongsTo('App\MAssignedKpiLevel1');
      }

      public function MProjectLevel2Kpi(){
        return $this->belongsTo('App\MProjectLevel2Kpi','m_project_level2_kpis_id');
      }

      public function MAssignedKpiLevel3(){
        return $this->hasMany('App\MAssignedKpiLevel3');
      }
}
