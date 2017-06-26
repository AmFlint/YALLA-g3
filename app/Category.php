<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'views', 'locale', 'parent_id'];
    //

    public function posts()
    {
        return $this->hasMany('App\Post');
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
