<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripMembers extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
      }
      public function PlantripTriplocation(){
        return $this->belongsTo('App\PlantripTriplocation');
      }
}
