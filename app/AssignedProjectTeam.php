<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProjectTeam extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }
    public function projectAssigned(){
        return $this->belongsTo('App/ProjectAssigned');
    }
        
    
}
