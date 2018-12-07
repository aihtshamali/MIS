<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripRequestedcityLog extends Model
{
    public function PlantripTriprequestLog(){
        return $this->belongsTo('App\PlantripTriprequestLog','plantrip_triprequest_log_id');
    }
    public function PlantripCity(){
        return $this->belongsTo('App\PlantripCity','requestedCity_id');
    }
}
