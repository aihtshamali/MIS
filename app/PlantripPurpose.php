<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripPurpose extends Model
{
    public function PlantripTriprequest(){
        return $this->belongsTo('App\PlantripTriprequest');
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
    public function PlantripTriplocation(){
        return $this->hasMany('App\PlantripTriplocation');
    }
    public function PlantripVisitedproject(){
        return $this->hasOne('App\PlantripVisitedproject');
    }
}
