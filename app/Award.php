<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //
    public function getType()
    {
        if ($this->type_id == 1) {
            return "Nuevo Puesto";
        } else {
            return "Empleado Nuevo";
        }
    }

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }

    public function category()
    {
        return $this->hasOne("App\Category", 'id', 'category_id');
    }
}
