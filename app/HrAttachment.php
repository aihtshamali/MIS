<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrAttachment extends Model
{
    public function Agenda(){
        return $this->belongsTo('App\Agenda');
    }
}
