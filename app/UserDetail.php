<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function sector(){
      return $this->hasMany('App\Sector');
    }
}
