<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedExecutingAgency extends Model
{
      public function project(){
        return $this->belongsTo('App\Project');
      }
      public function ExecutingAgency(){
        return $this->belongsTo('App\ExecutingAgency');
      }
}
