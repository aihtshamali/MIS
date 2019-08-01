<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel1 extends Model
{
  protected $table = 'm_assigned_kpi_level1';

    public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MPlanKpicomponentMapping(){
      return $this->belongsTo('App\MPlanKpicomponentMapping');
    }

    public function MProjectLevel1Kpi(){
      return $this->belongsTo('App\MProjectLevel1Kpi','m_project_level1_kpis_id');
    }
    public function MAssignedKpi(){
      return $this->belongsTo('App\MAssignedKpi');
    }
    public function MAssignedKpiLevel2(){
      return $this->hasMany('App\MAssignedKpiLevel2');
    }
    public function MAssignedKpiLevel2Log(){
      return $this->hasMany('App\MAssignedKpiLevel2Log');
    }
}
