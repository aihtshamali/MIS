<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUserVisitlocation extends Model
{
  
    
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function PlantripCity(){
        return $this->belongsTo('App\PlantripCity');
    }
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
    }
    public function MProjectKpi(){
        return $this->hasMany('App\MProjectKpi');
    }
    public function MAppAttachment(){
        return $this->hasMany('App\MAppAttachment');
    }
}
