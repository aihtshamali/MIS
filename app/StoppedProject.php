<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoppedProject extends Model
{
    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
