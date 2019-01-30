<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel3 extends Model
{
  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MAssignedKpiLevel2(){
        return $this->belongsTo('App\MAssignedKpiLevel2');
      }
      public function MProjectLevel3Kpi(){
        return $this->belongsTo('App\MProjectLevel3Kpi');
      }
}
