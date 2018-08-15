<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedSubSector extends Model
{
  public function Project(){
    return $this->belongsTo('App\Project');
  }
  public function SubSector(){
    return $this->belongsTo('App\SubSector');
  }
}
