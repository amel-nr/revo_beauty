<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forumSeenModel extends Model
{
    protected $table = "forum_have_seen";

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function Post()
    {
        return $this->belongsTo(Forum::class,"post_id");
    }
}
