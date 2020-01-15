<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiscMom extends Model
{
   public function Financialyear(){
        return $this->belongsTo('App\financialyear');
    }
     public function HrDecision(){
        return $this->belongsTo('App\HrDecision');
    }
}
