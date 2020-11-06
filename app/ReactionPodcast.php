<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReactionPodcast extends Model
{
    //
    protected $table = 'reactionpodcast';

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }
}
