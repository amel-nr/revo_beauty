<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log_skin extends Model
{
    protected $table = "log_skin";
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,"product_id");
    }
    public function skintype()
    {
        return $this->belongsToMany(skinType::class,"skin_type_id");
    }
    public function skinconcern()
    {
        return $this->belongsToMany(skinConcern::class,"skin_concern_id");
    }
}
