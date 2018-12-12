<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripTriprequest extends Model
{
   
    public function PlantripTriptype(){
        return $this->belongsTo('App\PlantripTriptype');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function PlantripPurpose(){
        return $this->hasMany('App\PlantripPurpose');
    }
    public function VmisRequestToTransportOfficer()
    {   
        return $this->hasOne('App\VmisRequestToTransportOfficer','plantrip_triprequest_id');
    }
    public function PlantripTriprequestLog()
    {   
        return $this->hasMany('App\PlantripTriprequestLog','plantrip_triprequest_id');
    }
    public function PlantripRequestedcity(){
        return $this->hasMany('App\PlantripRequestedcity');
    }
    public function PlantripRemark(){
        return $this->hasMany('App\PlantripRemark');
    }
    public function PlantripDriverRating(){
        return $this->hasOne('App\PlantripDriverRating');
    }
    
}
