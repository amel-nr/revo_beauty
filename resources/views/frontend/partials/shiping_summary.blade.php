
@php
    $subtotal = 0;
    $tax = 0;
    $shipping = 0;
    if (isset($curier)){
        $shipping = $curier->cost;
    }
@endphp
@foreach (Session::get('cart') as $key => $cartItem)
    @php
    $product = \App\Product::find($cartItem['id']);
    $subtotal += $cartItem['price']*$cartItem['quantity'];
    $tax += $cartItem['tax']*$cartItem['quantity'];
    $product_name_with_choice = $product->name;
    if ($cartItem['variant'] != null) {
        $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
    }
    @endphp
@endforeach
@php

    $potongan = 0;
    $subsidi = Auth::user()->user_tier;
    

    if(isset($subsidi) && $subtotal >=  $subsidi->free_shiping_min_order)
    {   
        $potongan =  $subsidi->free_shiping_cost;
        if($shipping <= $potongan){
            $potongan = $shipping;
        }
    }

    $total = $subtotal+$tax+$shipping-$potongan;
    if(Session::has('coupon_discount')){
        $total -= Session::get('coupon_discount');
    }
@endphp
<form action="{{ route('checkout.payment_info') }}" method="POST">
@csrf
<p class="mt-3 mb-1 pb-1" style="font-size: 14px; font-weight: 600; border-bottom: 1px solid #F3795C;">SUB TOTAL<span class="float-right">{{ single_price($subtotal) }}</span></p>
@if (Session::has('coupon_discount'))
<p class="mt-3 mb-1 pb-1" style="font-size: 14px; font-weight: 600; border-bottom: 1px solid #F3795C;">PROMO DISKON<span class="float-right">{{ single_price(Session::get('coupon_discount')) }}</span></p>
@endif

@if (isset($curier))
<p class="mb-1 pb-1" style="font-size: 14px; font-weight: 600; border-bottom: 1px solid #F3795C;">BIAYA PENGIRIMAN<span class="float-right" id="biaya">{{ single_price($shipping) }}</span></p>
@endif
@if ($potongan > 0)
<p class="mt-3 mb-1 pb-1" style="font-size: 14px; font-weight: 600; border-bottom: 1px solid #F3795C;">GRATIS ONGKIR<span class="float-right">{{ single_price($potongan) }}</span></p>
@endif
@php
$dapatPoint = 0;
$poin_member = Auth::user()->user_tier->poin_order/100;
$ultah = date('d-m', strtotime(Auth::user()->tgl_lahir));
$today = date('d-m');

foreach (Session::get('cart') as $key => $cartItem)
{
    $product = \App\Product::where('id',$cartItem['id'])->first();
    $dapatPoint += $product->earn_point*$cartItem['quantity'];
}
if($ultah == $today )
{
    $dapatPoint += ($subtotal*$poin_member)*2;
}else{
    $dapatPoint += $subtotal*$poin_member;
}

@endphp
<p class="mt-2 mb-1 pb-1 font-weight-bold" style="font-size: 16px;">TOTAL<span class="float-right">{{ single_price($total) }}</span></p>
<p class="mb-1 pb-1" style="font-size: 14px;">Poin yang di dapat<span class="float-right">+{{ $dapatPoint }}</span></p>
<input type="hidden" name="id_address" id="id_address">
@if (isset($curier))
<input type="hidden" name="cost" value='{{ json_encode($curier) }}'>
<input type="submit" name="submit" class="btn btn-danger text-center btn-pakai py-2 mb-3 float-right" value="LANJUT PEMBAYARAN" />
@else
<button  type="button" class="btn btn-danger text-center btn-pakai py-2 mb-3 float-right" disabled>LANJUT PEMBAYARAN</button>
@endif
</form>
