<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportData extends Model
{
    public function MProjectProgess(){
        return $this->belongsTo('App\MProjectProgress');
    }
}
