<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['views', 'created_at'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function postSaves()
    {
        return $this->belongsToMany('App\PostSave');
    }
}
