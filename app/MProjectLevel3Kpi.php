<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectLevel3Kpi extends Model
{
  public function MProjectLevel2Kpi(){
    return $this->hasMany('App\MProjectLevel2Kpi');
  }
}
