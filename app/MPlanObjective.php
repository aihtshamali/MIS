<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanObjective extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
      }
      public function MPlanObjectivecomponentMapping(){
        return $this->hasMany('App\MPlanObjectivecomponentMapping');
      }
}
