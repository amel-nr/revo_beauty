<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recomendasi extends Model
{
    //
    protected $table = 'recomendasi';
    protected $primaryKey = 'id';

    public function recom()
    {
        return $this->hasMany(Product::class,"recommendations");
    }

    public function product()
    {
        return $this->hasOne(Product::class,"product");
    }
}
