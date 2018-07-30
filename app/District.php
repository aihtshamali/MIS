<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function ProjectDetail(){
        return $this->hasMany('App\ProjectDetail');
      }
}
