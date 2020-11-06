<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    public function status()
    {
        return $this->belongsTo("App\Status", 'status_id');
    }
}
