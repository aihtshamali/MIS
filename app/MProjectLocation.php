<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectLocation extends Model
{
    public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }
}
