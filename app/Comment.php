<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Agregamos la tabla pivote para utilizarlo con eloquent
    public function commentPost()
    {
        return $this->belongsToMany("App\Post")->withPivot('post_id');
    }
    //Agregamos la tabla pivote para utilizarlo con eloquent

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }

    /*public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }*/
}
