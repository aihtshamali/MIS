<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrSector extends Model
{
    public function HrAgenda(){
        return $this->hasOne('App\HrAgenda');
    }
}
