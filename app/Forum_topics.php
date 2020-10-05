<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_topics extends Model
{
    protected $table = "forum_topics";
    protected $guarded = [];

    public function room()
    {
        return $this->hasMany(Forum_rooms::class,"topics_id");
    }
}
