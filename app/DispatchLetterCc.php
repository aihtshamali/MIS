<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchLetterCc extends Model
{
    public function User()
    {
      return $this->belongsTo('App\User');
    }
    public function DispatchLetter()
    {
      return $this->belongsTo('App\DispatchLetter');
    }
}
