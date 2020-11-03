<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    //
    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }

    public function commentPost()
    {
        return $this->belongsToMany("App\Post")->withPivot('post_id');
    }
}
