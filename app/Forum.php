<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = "forum_posts";
    protected $guarded = [];

    public function room()
    {
       return $this->belongsTo(Forum_rooms::class,"room_id");
    }

    public function user()
    {
       return $this->belongsTo(User::class,"user_id");
    }

    public function reply()
    {
        return $this->hasMany(Forum_Post_reply::class,'post_id')->orderBy('created_at','desc');
    }

    public function like()
    {
        return $this->hasMany(Forum_like::class,"post_id");
    }

    public function seen()
    {
        return $this->hasMany(forumSeenModel::class,"post_id");
    }
    public function rekomendasi()
    {
        return $this->hasMany(forum_produk_rekomendasi::class,"post_id");
    }

}
