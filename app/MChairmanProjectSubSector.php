<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanProjectSubSector extends Model
{
    public function MChairmanProject()
    {
        return $this->belongsTo('App\MChairmanProject');
    }
    public function SubSector()
    {
        return $this->belongsTo('App\SubSector');
    }
}
