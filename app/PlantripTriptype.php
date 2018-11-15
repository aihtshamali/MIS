<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripTriptype extends Model
{
    public function PlantripTriprequest(){
        return $this->hasMany('App\PlantripTriprequest');
    }
}
