<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faqModel extends Model
{
    protected $table = "faq";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(faqCategory::class,"category_id");
    }
}
