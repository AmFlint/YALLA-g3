<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['published', 'image', 'card', 'meta_robots', 'category_id', 'locale', 'title', 'slug', 'content', 'summary', 'media_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function media()
    {
        return $this->belongsTo('App\Media');
    }

    public function setSlugAttribute($value)
    {
        if(empty($value)) {
            $this->attributes['slug'] = Str::slug($this->title);
        } else {
            $this->attributes['slug'] = $value;
        }
    }
}
