<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanComponentactivityDetailMapping extends Model
{
    public function MPlanComponentActivitiesMapping(){
        return $this->belongsTo('App\MPlanComponentActivitiesMapping','m_plan_component_activities_mapping_id');
      } 
    
      
}
