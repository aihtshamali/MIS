<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectKpi extends Model
{
  public function Sector()
  {
    return $this->belongsTo('App\Sector');
  }
  public function CreatedBy()
  {
    return $this->belongsTo('App\User','created_by');
  }
  public function MPlanKpicomponentMapping(){
    return $this->hasMany('App\MPlanKpicomponentMapping');
  } 
  public function MProjectLevel1Kpi(){
    return $this->hasMany('App\MProjectLevel1Kpi');
  }
}
