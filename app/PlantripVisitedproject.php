<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripVisitedproject extends Model
{
    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
      }
}
