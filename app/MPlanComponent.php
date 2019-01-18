<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanComponent extends Model
{
     public function MProjectProgress(){
    return $this->belongsTo('App\MProjectProgress');
    }
    public function MPlanObjectivecomponentMapping(){
        return $this->hasMany('App\MPlanObjectivecomponentMapping');
    }

  public function MPlanKpicomponentMapping(){
    return $this->hasMany('App\MPlanKpicomponentMapping');
  } 
  public function MPlanComponentActivitiesMapping(){
    return $this->hasMany('App\MPlanComponentActivitiesMapping');
  } 
}
