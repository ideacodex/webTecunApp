<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Commentposts;
use App\ReactionsPost;

use DB;

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
        return $this->hasMany('App\CommentPost', 'post_id');
    }

    //Prueba Solo para el API Borrar despues
    public function commentsApi(){
        return $this->hasMany('App\CommentPost', 'post_id') and $this->hashMany('App\CommentPost', 'user_id');
    }
    //Prueba Solo para el API Borrar despues

    public function likes()
    {
        return $this->hasMany('App\ReactionsPost', 'post_id');
    }

    public function userLikesNew()
    {
        return $this->hasMany('App\ReactionsPost', 'post_id')->where('user_id', auth()->user()->id);
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
