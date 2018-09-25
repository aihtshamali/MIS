<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrProjectDecision extends Model
{
    
    public function HrAgenda(){
        return $this->belongsTo('App\HrAgenda');
    }
    public function HrDecision(){
        return $this->belongsTo('App\HrDecision');
    }
    public function HrMeetingPDWP(){
        return $this->belongsTo('App\HrMeetingPDWP');
    }
    //
}
