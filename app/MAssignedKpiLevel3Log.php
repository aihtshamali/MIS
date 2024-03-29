<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel3Log extends Model
{

  protected $table = 'm_assigned_kpi_level3_logs';

  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MAssignedKpiLevel2(){
      return $this->belongsTo('App\MAssignedKpiLevel2');
    }

    public function MAssignedKpiLevel2Log(){
      return $this->belongsTo('App\MAssignedKpiLevel2Log');
    }

    public function MProjectLevel3Kpi(){
      return $this->belongsTo('App\MProjectLevel3Kpi','m_project_level3_kpis_id');
    }

    public function MAssignedKpiLevel4(){
      return $this->hasMany('App\MAssignedKpiLevel4');
    }

    public function MAssignedKpiLevel4Log(){
      return $this->hasMany('App\MAssignedKpiLevel4Log');
    }
}
