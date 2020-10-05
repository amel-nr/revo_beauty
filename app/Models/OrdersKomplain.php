<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersKomplain extends Model
{
    //
    protected $table = 'orders_komplain';
    protected $primaryKey = 'id';

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function masalah()
    {
        return $this->belongsTo(Mvariable::class,'problem_id','param_3')->where('param_1','masalah');
    }

    public function solusiKomplain()
    {
        return $this->belongsTo(Mvariable::class,'solusi','param_3')->where('param_1','solusi');
    }

    public function statusKomplain()
    {
    	
    	return $this->belongsTo(Mvariable::class,'admin_aprove','param_3')->where('param_1','status');
    }
}
