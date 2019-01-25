<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripSubcitytype extends Model
{
    public function PlantripPurposes(){
        return $this->hasMany('App\PlantripPurposes');
    }
}
