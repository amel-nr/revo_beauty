<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skinType extends Model
{
    protected $table = "skin_type";
    protected $guarded = [];
    

    public function products()
    {
        return $this->hasMany(Product::class,"skintype_id");
    }
}
