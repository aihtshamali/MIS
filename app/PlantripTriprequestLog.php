<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripTriprequestLog extends Model
{
   
    public function PlantripTriptype(){
        return $this->belongsTo('App\PlantripTriptype');
    }
    public function User(){
        return $this->belongsTo('App\User','editedby_user_id');
    }
    public function PlantripPurposeLog(){
        return $this->hasMany('App\PlantripPurposeLog','plantrip_triprequest_log_id');
    }
    public function VmisRequestToTransportOfficer()
    {   
        return $this->hasOne('App\VmisRequestToTransportOfficer','plantrip_triprequest_id');
    }
    public function PlantripRequestedcityLog(){
        return $this->hasMany('App\PlantripRequestedcityLog','plantrip_triprequest_log_id');
    }
    public function PlantripRemark(){
        return $this->hasMany('App\PlantripRemark');
    }
    public function PlantripDriverRating(){
        return $this->hasOne('App\PlantripDriverRating');
    }
    
}
