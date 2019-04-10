<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel2Log extends Model
{

  protected $table = 'm_assigned_kpi_level2_logs';

  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MAssignedKpiLevel1(){
      return $this->belongsTo('App\MAssignedKpiLevel1');
    }

    public function MAssignedKpiLevel1Log(){
      return $this->belongsTo('App\MAssignedKpiLevel1Log');
    }

    public function MProjectLevel2Kpi(){
      return $this->belongsTo('App\MProjectLevel2Kpi','m_project_level2_kpis_id');
    }

    public function MAssignedKpiLevel3(){
      return $this->hasMany('App\MAssignedKpiLevel3');
    }

    public function MAssignedKpiLevel3Log(){
      return $this->hasMany('App\MAssignedKpiLevel3Log');
    }
}
