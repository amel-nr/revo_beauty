<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryblog extends Model
{
    protected $table = 'categoryblog';

    public function blog()
    {
        return $this->hasMany(blog::class)->orderBy('created_at','desc');
    }
}
