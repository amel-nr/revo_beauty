@php
    $subtotal = 0;
    $tax = 0;
    $shipping = 0;
@endphp
@foreach (Session::get('cart') as $key => $cartItem)
    @php
    $product = \App\Product::find($cartItem['id']);
    $subtotal += $cartItem['price']*$cartItem['quantity'];
    $tax += $cartItem['tax']*$cartItem['quantity'];
    $shipping += $cartItem['shipping']*$cartItem['quantity'];
    $product_name_with_choice = $product->name;
    if ($cartItem['variant'] != null) {
        $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
    }
    // if(isset($cartItem['color'])){
    //     $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
    // }
    // foreach (json_decode($product->choice_options) as $choice){
    //     $str = $choice->name; // example $str =  choice_0
    //     $product_name_with_choice .= ' - '.$cartItem[$str];
    // }
    @endphp
@endforeach



<div class="container rounded py-3" style="border: 1px solid #F3795C; overflow: auto;">
    @if (Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1)
        @if (Session::has('coupon_discount'))
        <form  action="{{ route('checkout.remove_coupon_code') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="font-weight-bold mb-2" style="font-size: 14px;">KODE PROMO</p>
        <div class="row">
            <div class="col-8 pr-1">
                <div class="form-control bg-gray w-100">{{ \App\Coupon::find(Session::get('coupon_id'))->code }}</div>
            </div>
            <div class="col-4 pl-1">
                <button  type="submit" class="btn btn-danger text-center btn-pakai py-2 width-100">GANTI</button>
            </div>
        </div>
        </form>
        @else
            <form  action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="font-weight-bold mb-2" style="font-size: 14px;">KODE PROMO</p>
            <div class="row">
                <div class="col-8 pr-1">
                    <input type="text" class="form-control rounded p-2" name="code" id="kode_voucher" aria-describedby="voucherHelpId" placeholder="Kode voucher" style="border-color: #F3795C; background-color: #FCF8F0; vertical-align: middle;">
                </div>
                <div class="col-4 pl-1">
                    <button  type="submit" class="btn btn-danger text-center btn-pakai py-2 width-100">PAKAI</button>
                </div>
            </div>
            </form>
        @endif
    @endif
    @php
        

        

        $total = $subtotal+$tax+$shipping;
        if(Session::has('coupon_discount')){
            $total -= Session::get('coupon_discount');
        }
    @endphp
    <p class="mt-3 mb-1 pb-1" style="font-size: 14px; font-weight: 600; border-bottom: 1px solid #F3795C;">SUB TOTAL<span class="float-right">{{ single_price($subtotal) }}</span></p>
    @if (Session::has('coupon_discount'))
    <p class="mt-3 mb-1 pb-1" style="font-size: 14px; font-weight: 600; border-bottom: 1px solid #F3795C;">PROMO DISKON<span class="float-right">{{ single_price(Session::get('coupon_discount')) }}</span></p>
    @endif
    <p class="mb-1 pb-1 font-weight-bold" style="font-size: 14px; border-bottom: 1px solid #F3795C;">TOTAL<span class="float-right">{{ single_price($total) }}</span></p>
    @php

    $dapatPoint = 0;

    if(Auth::check())
    {
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
    }
    

    @endphp
    <p class="mb-1 pb-1" style="font-size: 14px; border-bottom: 1px solid #F3795C;">Poin yang di dapat<span class="float-right">+{{ $dapatPoint }}</span></p>
    @if(Auth::check())

    <p style="font-size: 10px; color: #F3795C;">Gratis ongkir dengan pembelian minimal {{ single_price(Auth::user()->user_tier->free_shiping_min_order) }}</p>
    @endif
    @if(Auth::check())
        <a href="{{ route('checkout.shipping_info') }}" type="button" class="btn btn-danger text-center btn-pakai py-2 float-right">BELI SEKARANG</a>
    @else
        <a href="#modalLogin" data-target="#modalLogin" data-toggle="modal" type="button" class="btn btn-danger text-center btn-pakai py-2 float-right">BELI SEKARANG</a>
    @endif
    
</div>