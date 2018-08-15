<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProjectActivity extends Model
{
    public function Project()
    {
      return $this->belongsTo('App\Project');
    }

    public function ProjectActivity()
    {
      return $this->belongsTo('App\ProjectActivity');
    }
}
