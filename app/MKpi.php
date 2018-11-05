<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MKpi extends Model
{
    public function Sector(){
      return $this->belongsTo('App\Sector');
    }

    public function MFinancialKpi(){
      return $this->hasMany('App\MFinancialKpi');
    }
}
