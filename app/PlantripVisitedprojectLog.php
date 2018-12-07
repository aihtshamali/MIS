<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripVisitedprojectLog extends Model
{
    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
      }
      public function PlantripPurposeLog(){
        return $this->belongsTo('App\PlantripPurposeLog','plantrip_purpose_log_id');
      }
}
