<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faqCategory extends Model
{
    protected $table = "faq_category";
    protected $guarded = [];

    public function faq()
    {
        return $this->hasMany(faqModel::class,"category_id");
    }


}
