<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_comment_reply extends Model
{
    protected $table = "forum_comment_reply";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comment()
    {
        return $this->belongsTo(Forum_Post_reply::class, "reply_id");
    }
}
