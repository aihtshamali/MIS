<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanProjectDistrict extends Model
{
    public function MChairmanProject(){
        return $this->belongsTo('App\MChairmanProject');
    }
    public function District(){
        return $this->belongsTo('App\District');
    }
}
