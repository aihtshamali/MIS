<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedUserKpi extends Model
{
  public function MProjectProgress(){
    return $this->belongsTo('App\MProjectProgress');
  }
  public function MAssignedUserLocation(){
    return $this->belongsTo('App\MAssignedUserLocation');
  }
  public function MProjectKpi(){
    return $this->belongsTo('App\MProjectKpi');
  }
  public function MAssignedKpi(){
    return $this->hasMany('App\MAssignedKpi');
  }
}
