<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationType extends Model
{
    public function Project(){
        return $this->hasOne('App\Project');
      }
}
