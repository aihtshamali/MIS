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
    public function HrAttachment(){
        return $this->hasOne('App\HrAttachment');
    }
    public function HrMomAttachment(){
        return $this->hasOne('App\HrMomAttachment');
    }
}
