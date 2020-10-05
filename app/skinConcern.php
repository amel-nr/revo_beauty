<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skinConcern extends Model
{
    protected $table = "skin_concern";
    protected $guarded = [];
    

    public function products()
    {
        return $this->hasMany(Product::class,"skinconcern_id");
    }
}
