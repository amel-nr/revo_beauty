<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_user_room extends Model
{
    protected $table = "forum_room_user_log";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function room()
    {
        return $this->belongsTo(Forum_rooms::class,"room_id");
    }


}
