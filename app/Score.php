<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    public function points()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
