<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedExecutingAgency extends Model
{
    public function ProjectDetail(){
        return $this->belongsTo('App\ProjectDetail');
      }
      public function ExecutingAgency(){
        return $this->belongsTo('App\ExecutingAgency');
      }
}
