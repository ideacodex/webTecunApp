<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    //
    protected $table = 'commentposts';
    
    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo("App\Post", 'post_id');
    }

}

