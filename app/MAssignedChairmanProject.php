<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedChairmanProject extends Model
{
    public function MChairmanPendingProject(){
        return $this->belongsTo('App\MChairmanPendingProject');
    }
    public function Project(){
        return $this->belongsTo('App\Project');
    }

}
