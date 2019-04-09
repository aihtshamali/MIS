<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchLetterPriority extends Model
{
    public function DispatchLetter()
    {
      return $this->belongsTo('App\DispatchLetter');
    }
}
