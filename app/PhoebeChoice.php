<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoebeChoice extends Model
{
    protected $table = "phoebe_choice";
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(product::class,"product_id");
    }
}
