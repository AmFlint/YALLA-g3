<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['url', 'type'];
    //

    public function post()
    {
        return $this->hasOne('App\Post');
    }

    public function postSave()
    {
        return $this->hasOne('App\PostSave');
    }
}
