<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSave extends Model
{
    protected $fillable = ['published', 'image', 'card', 'meta_robots', 'category_id', 'locale', 'title', 'slug', 'content', 'summary', 'post_id', 'views', 'action', 'meta_robots', 'media_id', 'alt'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function media()
    {
        return $this->belongsTo('App\Media');
    }
}
