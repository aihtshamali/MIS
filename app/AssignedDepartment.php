<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedDepartment extends Model
{
  public function Project(){
    return $this->belongsTo('App\Project');
  }
  public function Department(){
    return $this->belongsTo('App\Department');
  }
}
