<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAssigned extends Model
{
    protected $table='assigned_projects';
    public function user(){
      return $this->belongsTo('App\User');
    }
}
