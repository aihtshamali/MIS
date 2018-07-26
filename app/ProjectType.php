<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
  public function Project(){
    return $this->hasOne('App\Project');
  }
}
