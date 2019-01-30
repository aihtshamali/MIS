<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel2 extends Model
{
  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MAssignedKpiLevel1(){
        return $this->belongsTo('App\MAssignedKpiLevel1');
      }

      public function MProjectLevel2Kpi(){
        return $this->belongsTo('App\MProjectLevel2Kpi');
      }
}
