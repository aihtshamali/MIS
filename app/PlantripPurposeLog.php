<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripPurposeLog extends Model
{
    public function PlantripTriprequestLog(){
        return $this->belongsTo('App\PlantripTriprequestLog','plantrip_triprequest_log_id');
    }
    public function PlantripSubcitytype(){
        return $this->belongsTo('App\PlantripSubcitytype');
    }
    public function PlantripVisitreason(){
        return $this->belongsTo('App\PlantripVisitreason');
    }
    public function PlantripPurposetype(){
        return $this->belongsTo('App\PlantripPurposetype');
    }
    public function PlantripTriplocationLog(){
        return $this->hasMany('App\PlantripTriplocationLog');
    }
    public function PlantripMemberLog(){
        return $this->hasMany('App\PlantripMemberLog','plantrip_purpose_log_id');
    }
    public function PlantripVisitedprojectLog(){
        return $this->hasOne('App\PlantripVisitedprojectLog','plantrip_purpose_log_id');
    }
}
