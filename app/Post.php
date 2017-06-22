<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['published', 'image', 'meta_id', 'category_id', 'locale', 'title', 'slug', 'content', 'summary'];

    public function meta()
    {
        return $this->belongsTo('App\Meta');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function medias()
    {
        return $this->belongsToMany('App\Media');
    }
}
