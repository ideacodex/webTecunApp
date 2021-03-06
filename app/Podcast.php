<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Commentpodcast;
use App\ReactionPodcast;

class Podcast extends Model
{
    //
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
        return $this->hasMany('App\CommentPodcast', 'podcast_id');
    }

    public function likes()
    {
        return $this->hasMany('App\ReactionPodcast', 'podcast_id')->where('active', 1);
    }

    public function userLikesNew()
    {
        return $this->hasOne('App\ReactionPodcast', 'podcast_id')->where('active', 1)->where('user_id', auth()->user()->id);
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
