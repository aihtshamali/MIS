<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripRequestedcity extends Model
{
    public function PlantripTriprequest(){
        return $this->belongsTo('App\PlantripTriprequest');
    }
    public function PlantripCity(){
        return $this->belongsTo('App\PlantripCity','requestedCity_id');
    }
}
