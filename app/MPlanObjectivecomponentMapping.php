<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanObjectivecomponentMapping extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
    }

    public function MPlanObjective(){
        return $this->belongsTo('App\MPlanObjective');
    }

    public function MPlanComponent(){
        return $this->belongsTo('App\MPlanComponent');
    }
}
