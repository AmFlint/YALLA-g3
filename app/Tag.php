<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'views', 'locale', 'color'];
    //

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function postSaves()
    {
        return $this->belongsToMany('App\PostSave');
    }

    public function setSlugAttribute($value)
    {
        if(empty($value)) {
            $this->attributes['slug'] = Str::slug($this->name);
        } else {
            $this->attributes['slug'] = $value;
        }
    }
}
