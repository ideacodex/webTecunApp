<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentPodcast extends Model
{
    //
    protected $table = 'commentpodcast';
    
    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }
}
