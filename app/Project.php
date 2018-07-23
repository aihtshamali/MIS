<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function ProjectType(){
      return $this->belongsTo('App\ProjectType');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
}
