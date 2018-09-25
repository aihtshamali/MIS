<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrMomAttachment extends Model
{
    //
    public function HrAgenda(){
        return $this->belongsTo('App\HrAgenda');
    }
}
