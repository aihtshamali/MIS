<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAppAttachment extends Model
{
    public function MUserVisitlocation(){
        return $this->belongsTo('App\MUserVisitlocation');
    }
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
    }
}
