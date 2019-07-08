<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSne extends Model
{
    public function AssignedProject()
    {
        return $this->belongsTo('App\AssignedProject');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
