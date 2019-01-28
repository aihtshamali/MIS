<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanComponentActivitiesMapping extends Model
{
    public function MPlanComponent(){
        return $this->belongsTo('App\MPlanComponent');
      } 
      public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
      } 
      public function MPlanComponentActivitiesMapping(){
        return $this->hasMany('App\MPlanComponentActivitiesMapping');
      } 
}
