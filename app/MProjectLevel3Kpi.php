<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectLevel3Kpi extends Model
{
  public function MProjectLevel2Kpi(){
    return $this->belongsTo('App\MProjectLevel2Kpi');
  }

  public function MProjectLevel4Kpi(){
    return $this->hasMany('App\MProjectLevel4Kpi','m_project_level3_kpi');
  }
}
