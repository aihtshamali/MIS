<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MHealthSafety extends Model
{
  public function MAssignedProjectHealthSafety(){
    return $this->hasOne('App\MAssignedProjectHealthSafety');
  }
}
