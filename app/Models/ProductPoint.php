<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPoint extends Model
{
    //
    protected $table = 'product_point';
    protected $primaryKey = 'id';


    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
