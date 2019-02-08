<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAppAttachments extends Model
{
    public function MUserVisitlocation(){
        return $this->belongsTo('App\MUserVisitlocation');
    }
}
