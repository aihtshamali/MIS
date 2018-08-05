<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProjectManager extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function Project(){
      return $this->belongsTo('App\Project');
    }
}
