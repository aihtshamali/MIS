<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanProjectDistrict extends Model
{
    public function MChairmanPendingProject(){
        return $this->belongsTo('App\MChairmanPendingProject');
    }
    public function District(){
        return $this->belongsTo('App\District');
    }
}
