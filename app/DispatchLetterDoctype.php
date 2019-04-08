<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchLetterDoctype extends Model
{
    public function DispatchLetter()
    {
      return $this->belongsTo('App\DispatchLetter');
    }
}
