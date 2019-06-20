<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportImage extends Model
{
    public function MProjectProgess(){
        return $this->belongsTo('App\MProjectProgress');
    }

    public function MAppAttachment(){
        return $this->belongsTo( 'App\MAppAttachment');
    }
}
