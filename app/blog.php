<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = "blogs";

    public function category()
    {
        return $this->belongsTo(categoryblog::class,'categoryblog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
