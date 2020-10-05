<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_notif_email extends Model
{
    protected $table = "forum_notif_email";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function post()
    {
        return $this->belongsTo(Forum_Post_reply::class, "post_id");
    }

    public function comment()
    {
        return $this->belongsTo(Forum_Post_reply::class, "comment_id");
    }
}
