<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['url', 'type'];
    //

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
