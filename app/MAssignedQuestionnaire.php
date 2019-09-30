<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedQuestionnaire extends Model
{
    public function MQuestionnaire(){
        return $this->belongsTo('App\MQuestionnaire');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function MProjectProgress()
    {
        return $this->belongsTo('App\MProjectProgress');
    }
}
