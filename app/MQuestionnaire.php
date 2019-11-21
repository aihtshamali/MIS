<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MQuestionnaire extends Model
{
    public function MAssignedQuestionnaire(){
        return $this->hasMany('App\MAssignedQuestionnaire');
    }
    public function QuestionType(){
        return $this->belongsTo('App\QuestionType');
    }
}
