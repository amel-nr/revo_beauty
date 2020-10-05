<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliatePayment extends Model
{
    //
    public function user(){
    	return $this->belongsTo(User::class,'affiliate_user_id');
    }

    public function userAffiliate(){
    	return $this->belongsTo(AffiliateUser::class,'affiliate_user_id','user_id');
    }
}
