<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrAgenda extends Model
{
    public function HrMeetingPDWP(){
        return $this->belongsTo('App\HrMeetingPDWP');
    }
    public function HrSector(){
        return $this->belongsTo('App\HrSector');
    }
    public function AgendaType(){
        return $this->belongsTo('App\AgendaType');
    }
}
