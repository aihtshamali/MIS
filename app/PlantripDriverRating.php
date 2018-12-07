<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripDriverRating extends Model
{
    public function PlantripTriptype(){
        return $this->belongsTo('App\PlantripTriptype');
    }
    public function VmisDriver(){
        return $this->belongsTo('App\VmisDriver');
    }
}
