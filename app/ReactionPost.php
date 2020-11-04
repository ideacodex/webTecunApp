<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReactionsPost extends Model
{
    //
    protected $table = 'reactionposts';

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }
}
