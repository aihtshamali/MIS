<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedUserLocation extends Model
{
  public function MProjectProgress(){
    return $this->belongsTo('App\MProjectProgress');
  }
  public function User(){
    return $this->belongsTo('App\User');
  }
  public function District(){
    return $this->belongsTo('App\District');
  }
  public function MAssignedUserKpi(){
      return $this->hasMany('App\MAssignedUserKpi');
  }
}
