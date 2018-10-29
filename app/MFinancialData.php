<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MFinancialData extends Model
{
    public function AssignedProject(){
      return $this->belongsTo('App\AssignedProject');
    }

    public function MFinancialKpi(){
      return $this->hasMany('App\MFinancialKpi');
    }
}
