<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanComponentactivityDetailMapping extends Model
{
    public function MPlanComponentActivitiesMapping(){
        return $this->belongsTo('App\MPlanComponentActivitiesMapping');
      } 
}
