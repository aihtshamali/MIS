<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrMeetingType extends Model
{
    public function HrMeetingPDWP(){
        $this->hasMany('App\HrMeetingPDWP');
    }
}
