<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['type','image','card','meta_robots'];


    public function post()
    {
        return $this->hasOne('App\Post');
    }
}
