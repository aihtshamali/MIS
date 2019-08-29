<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSector extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Sector(){
        return $this->belongsTo('App\Sector');
    }
}
