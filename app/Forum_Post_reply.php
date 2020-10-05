<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_Post_reply extends Model
{
    protected $table = "forum_post_replys";
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Forum::class, "post_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(forum_comment_like::class, "reply_id");
    }

    public function comment()
    {
        return $this->hasMany(forum_comment_reply::class, "reply_id")->orderBy("created_at", "desc");
    }

    public function rekomendasi()
    {
        return $this->hasMany(forum_produk_rekomendasi_balasan::class, "reply_id");
    }
}
