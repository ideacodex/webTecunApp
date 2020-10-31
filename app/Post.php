<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;

class Post extends Model
{
    public function status()
    {
        return $this->belongsTo("App\Status", 'status_id');
    }

    //Agregamos la tabla pivote para utilizarlo con eloquent
    public function category()
    {
        return $this->belongsToMany("App\Category")->withPivot('category_id');
    }
    //Agregamos la tabla pivote para utilizarlo con eloquent

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }

    public function comments()
    {
        return $this->belongsToMany("App\Comment")->withPivot('comment_id');
    }

    function type()
    {
        if($this->type_id==1){
            return "Noticias";
        }
        if($this->type_id==2){
            return "Podcast";
        }
        if($this->type_id==3){
            return "Comunicado";
        }
        if($this->type_id==4){
            return "Arte";
        }
    }
}
