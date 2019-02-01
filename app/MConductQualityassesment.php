<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MConductQualityassesment extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
      }
      public function User(){
        return $this->belongsTo('App\User');
      }
      public function MPlanComponent(){
        return $this->belongsTo('App\MPlanComponent');
      } 
      public function MPlanComponentActivitiesMapping(){
        return $this->belongsTo('App\MPlanComponentActivitiesMapping');
      } 
}
