<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrDecision extends Model
{
    public function HrProjectDescision(){
        return $this->hasMany('App\HrProjectDescision','hr_decision_id');
        }
          public function MiscMom(){
        return $this->hasOne('App\MiscMom');
        }
    //
}
