<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBeneficiaryStakeholder extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
    }
    public function User(){
        return $this->belongsTo('App\User');
      }
}
