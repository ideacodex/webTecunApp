<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersDevice extends Model
{
    //

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }
}
