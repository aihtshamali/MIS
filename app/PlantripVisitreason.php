<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripVisitreason extends Model
{
    public function PlantripPurposes(){
        return $this->belongsTo('App\PlantripPurposes');
    }
}
