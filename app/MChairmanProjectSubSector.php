<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanProjectSubSector extends Model
{
    public function MChairmanPendingProject()
    {
        return $this->belongsTo('App\MChairmanPendingProject');
    }
    public function SubSector()
    {
        return $this->belongsTo('App\SubSector');
    }
}
