<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrDecision extends Model
{
    public function HrProjectDescision(){
        return $this->hasMany('App\HrProjectDescision');
        }
    //
}
