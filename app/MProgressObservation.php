<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProgressObservation extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id','m_project_progress_id','observation'];
}
