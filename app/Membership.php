<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = "membership_tier";
    protected $guarded=[];

    public function unitperiod()
    {
        return $this->belongsTo(Membership_period::class,"period_unit");
    }
}
