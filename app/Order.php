<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersPaymentTf;
use App\Models\OrderSample;
use App\Models\OrderProductPoints;


class Order extends Model
{
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function orderDetailSample()
    {
        return $this->hasMany(OrderSample::class,'order_id');
    }

    public function orderDetailPoint()
    {
        return $this->hasMany(OrderProductPoints::class,'order_id');
    }

    public function refund_requests()
    {
        return $this->hasMany(RefundRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_confrim()
    {
        return $this->hasOne(OrdersPaymentTf::class,'order_id');
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function coupon_order()
    {
        return $this->belongsTo(CouponUsage::class,'order_id');
    }
}
