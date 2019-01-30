<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel4 extends Model
{

  protected $table = 'm_assigned_kpi_level4';

  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MAssignedKpiLevel3(){
        return $this->belongsTo('App\MAssignedKpiLevel3');
      }
      public function MProjectLevel4Kpi(){
        return $this->belongsTo('App\MProjectLevel4Kpi','m_project_level4_kpis_id');
      }
}
