<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProgressRecommendation extends Model
{
    protected $fillable = ['user_id', 'm_project_progress_id', 'recommendation'];

    public function MProjectProgress()
    {
        return $this->belongsTo('App\MProjectProgress');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
