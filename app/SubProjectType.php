<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProjectType extends Model
{
    public function ProjectDetail(){
        return $this->hasOne('App\ProjectDetail');
    }
}
