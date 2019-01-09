<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectLevel1Kpi extends Model
{
  public function MProjectKpi(){
    return $this->belongsTo('App\MProjectKpi');
  }
  public function MProjectLevel2Kpis(){
    return $this->hasMany('App\MProjectLevel2Kpi');
  }
}
