<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_produk_rekomendasi extends Model
{
    protected $table = "forum_produk_rekomendasi";
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class,"product_id");
    }
}
