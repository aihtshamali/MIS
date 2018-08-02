<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExecutingAgency extends Model
{
    public function AssignedExecutingAgencies(){
        return $this->hasMany('App\AssignedExecutingAgency');
    }

}
