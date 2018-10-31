<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MFinancialKpi extends Model
{
    public function MFinancialData(){
      return $this->belongsTo('App\MFinancialData');
    }
    public function MKpi(){
      return $this->belongsTo('App\MKpi');
    }
}
