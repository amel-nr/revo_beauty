<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_rooms extends Model
{
    protected $table = "forum_rooms";
    protected $guarded = [];

    public function topics()
    {
        return $this->belongsTo(Forum_topics::class,"topics_id");
    }

    public function post()
    {
       return $this->hasMany(Forum::class,"room_id");
    }
    public function user()
    {
        return $this->hasMany(Forum_user_room::class,"room_id");
    }
}
