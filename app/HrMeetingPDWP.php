<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrMeetingPDWP extends Model
{
    public function HrMeetingType(){
        return $this->belongsTo('App\HrMeetingType');
    }

    public function HrAgenda(){
        return $this->hasMany('App\HrAgenda');
    }
}
