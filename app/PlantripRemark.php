<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripRemark extends Model
{
    public function PlantripTriprequest(){
        return $this->belongsTo('App\PlantripTriprequest');
    }
}
