<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpiLevel1 extends Model
{
  public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MPlanKpicomponentMapping(){
      return $this->belongsTo('App\MPlanKpicomponentMapping');
    }

    public function MProjectLevel1Kpi(){
      return $this->belongsTo('App\MProjectLevel1Kpi');
    }
}
