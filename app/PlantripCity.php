<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripCity extends Model
{
     public function District()
     {
        return $this->belongsTo('App\District');
    }    //
    public function plantrip_triplocations()
    {
       return $this->belongsTo('App\PlantripTriplocation');
   }  
}
