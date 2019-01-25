<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripRemark extends Model
{
    public function PlantripTriprequest(){
        return $this->belongsTo('App\PlantripTriprequest');
    }
    public function RemarksByUser(){
        return $this->belongsTo('App\User','remarksby_user_id');
    }
    
    
}
