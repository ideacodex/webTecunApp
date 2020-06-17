<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

use App\Comment;

class Post extends Model
{
    //
    use HasTrixRichText;

    public function trixRender($field)
    {
        return $this->trixRichText->where('field', $field)->first()->content;
    }

    public function status()
    {
        return $this->hasOne("App\Status", 'id');
    }

    public function user()
    {
        return $this->hasOne("App\User", 'id', 'user_id');
    }

    public function comments()
    {
        return Comment::where('post_id', $this->id)->count();
    }

    function getType()
    {
        if($this->type_id==1){
            return "Noticias";
        }else{
            return "Podcast";
        }
    }
}
