<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedProjectHealthSafety extends Model
{
  public function AssignedProject(){
    return $this->belongsTo('App\AssignedProject');
  }
  public function MHealthSafety(){
    return $this->belongsTo('App\MHealthSafety');
  }
}
