<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripPurpose extends Model
{
    public function PlantripTriprequests(){
        return $this->hasMany('App\PlantripTriprequests');
    }
    public function PlantripSubcitytype(){
        return $this->hasMany('App\PlantripSubcitytype');
    }
    public function PlantripVisitreason(){
        return $this->hasMany('App\PlantripVisitreason');
    }
    public function PlantripPurposetype(){
        return $this->hasMany('App\PlantripPurposetype');
    }
}
