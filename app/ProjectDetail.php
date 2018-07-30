<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
  public function project()
  {
    return $this->belongsTo('App\Project');
  }
}
