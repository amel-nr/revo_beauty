<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_produk_rekomendasi_balasan extends Model
{
    protected $table = "forum_produk_rekomendasi_balasan";
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,"product_id");
    }
}
