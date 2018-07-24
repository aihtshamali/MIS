<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }
    public function projectAssigned(){
        return $this->belongsTo('App/ProjectAssigned');
    }
    public function ProjectType(){
      return $this->belongsTo('App\ProjectType');
    }
    
}
