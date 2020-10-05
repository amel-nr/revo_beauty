<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\AffiliateUserCode;

class Coupon extends Model
{
    //
    public function userAffiliate()
    {
        return $this->belongsTo(AffiliateUserCode::class,'code','kode_id');
    } 
}
