<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiscMom extends Model
{
   public function Financialyear(){
        return $this->belongsTo('App\financialyear');
    }
}
