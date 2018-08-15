<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationType extends Model
{
    public function Project(){
        return $this->hasOne('App\Project');
      }

      public function ProjectLog(){
          return $this->hasOne('App\ProjectLog');
        }
}
