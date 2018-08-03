<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovingForum extends Model
{
  public function Project(){
    return $this->hasOne('App\Project');
  }
  public function ProjectDetail(){
      return $this->hasOne('App\ProjectDetail');
    }
}
