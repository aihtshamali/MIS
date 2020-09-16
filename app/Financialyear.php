<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financialyear extends Model
{
    protected $table= 'financialyear';
     public function MiscMom(){
        return $this->hasMany('App\MiscMom');
    }
}
