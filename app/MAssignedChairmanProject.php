<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedChairmanProject extends Model
{
    public function MChairmanPendingProject(){
        return $this->belongsTo('App\MChairmanPendingProject');
    }
}
