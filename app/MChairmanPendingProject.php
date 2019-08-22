<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanPendingProject extends Model
{
    public function AssignedBy(){
        return $this->belongsTo('App\User','assigned_by');
    }
    public function Project(){
        return $this->belongsTo('App\Project');
    }
}
