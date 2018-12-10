<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripMemberLog extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
      }
      public function PlantripPurposeLog(){
        return $this->belongsTo('App\PlantripPurposeLog','plantrip_purpose_log_id');
      }
}
