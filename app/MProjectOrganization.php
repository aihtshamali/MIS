<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectOrganization extends Model
{
    public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }
}
