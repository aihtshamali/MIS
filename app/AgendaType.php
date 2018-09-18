<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaType extends Model
{
    public function HrAgenda(){
        return $this->hasOne('App\HrAgenda');
    }
}
