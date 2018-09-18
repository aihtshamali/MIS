<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrMoms extends Model
{
    public function HrMeetingPDWP(){
    return $this->belongsTo('App\HrMeetingPDWP');
}
}
