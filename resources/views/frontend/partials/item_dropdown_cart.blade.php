
@if(Session::has('cart') && count(Session::get('cart')) > 0)
@php
$total =0;
$totalitemCart= 0;
foreach (Session::get('cart') as $key => $value){
   $totalitemCart +=$value['quantity'];
}             
@endphp
<p style="font-weight: 700; font-size: 14px;">{{ $totalitemCart }} BARANG DI KERANJANG</p>
  @foreach (Session::get('cart') as $key => $cartItem)
    @php
    $product = \App\Product::where('id',$cartItem['id'])->with('brand')->first();
    $flash_product = \App\FlashDealProduct::where('product_id', $product->id)->first();
    $total = $total + $cartItem['price']*$cartItem['quantity'];

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
    <div class="row mt-3 py-2" style="border-bottom: 1px solid #F3795C;">
        <div class="col-3">
            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>
        <div class="col-5 pl-0">
            @if (isset($product->brand->name))
            <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $product->brand->name }}</p>
            @endif
            <p class="mb-0" style="font-size: 10px; line-height: 12px;">{{ $product_name_with_choice }}</p>
            <p class="mb-0 font-weight-bold" style="font-size: 12px;">{{ single_price($cartItem['price']) }}</p>
            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                <p class="mb-0" style="font-size: 14px;">
                    <s></s>
                </p>
                <p class="mb-0" style="font-size: 10px; line-height: 12px;">
                    <s>{{ home_base_price($product->id) }}</s>
                    @if($flash_product)
                        @if($flash_product->discount_type == 'percent')
                            <span style="color: #F3795C;"> {{ __($flash_product->discount) }}%</span>
                        @elseif($flash_product->discount_type == 'amount')
                            <span style="color: #F3795C;"> Potongan Rp {{ __($flash_product->discount) }}</span>
                        @endif
                    @else
                        @if($product->discount_type == 'percent')
                            <span style="color: #F3795C;"> {{ __($product->discount) }}%</span>
                        @elseif($product->discount_type == 'amount')
                            <span style="color: #F3795C;"> Potongan Rp {{ __($product->discount) }}</span>
                        @endif
                    @endif
                </p>
            @endif
        </div>
        <div class="col-4 pl-0 text-right">
            @if($cartItem['digital'] != 1)
                <div class="input-group input-group--style-2 pr-4" style="width: 135px;">
                    <span class="input-group-btn">
                        <button class="btn btn-number" type="button" data-type="minus" data-field="quantity[{{ $key }}]">
                            <i class="la la-minus"></i>
                        </button>
                    </span>
                        <input type="text" name="quantity[{{ $key }}]" class="form-control input-number" placeholder="1" value="{{ $cartItem['quantity'] }}" min="1" max="10" onchange="updateQuantity({{ $key }}, this)">
                        <span class="input-group-btn">
                        <button class="btn btn-number" type="button" data-type="plus" data-field="quantity[{{ $key }}]">
                            <i class="la la-plus"></i>
                        </button>
                    </span>
                </div>
            @endif
            <a href="#" onclick="removeFromCartView(event, {{ $key }});" type="button"><i class="fa fa-trash-o mt-3" aria-hidden="true" style="font-size: 18px; color: #F3795C;"></i></a>
        </div>
    </div>

@endforeach
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
<p class="mb-0 mt-3" style="font-weight: 700; font-size: 14px;">TOTAL : {{ single_price($subtotal) }}</p>
<a href="{{ route('cart') }}" type="button" class="btn btn-danger text-center btn-keluar" style="margin-top: 20px;">CHECKOUT</a>
<script type="text/javascript">
    cartQuantityInitialize();
</script>
@else
<div style="text-align: center;">
    Tidak ada barang dikeranjang belanja.
</div>
@endif