<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectLevel2Kpi extends Model
{
  public function MProjectLevel1Kpi(){
    return $this->belongsTo('App\MProjectLevel1Kpi');
  }
  public function MProjectLevel3Kpi(){
    return $this->hasMany('App\MProjectLevel3Kpi');
  }
}
