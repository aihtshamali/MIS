<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripMember extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
      }
      public function PlantripTriplocation(){
        return $this->belongsTo('App\PlantripTriplocation');
      }
}
