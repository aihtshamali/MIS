<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    public function MQuestionnaire(){
        return $this->hasMany('App\MQuestionnaire');
    }
}
