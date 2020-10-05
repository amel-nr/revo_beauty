@foreach (Session::get('cart') as $key => $cartItem)
@if($cartItem['id'] == $product->id && $cartItem['variant'] == $data['variant'] )
@php


$product = \App\Product::where('id',$cartItem['id'])->with('brand')->first();
@endphp
<div class="modal-body px-5 py-4">
    <div class="text-center mb-4">
        <img src="{{asset('img/cart.png')}}" class="mb-2 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 34px;">
        <h1 class="font-weight-bold h6" style="color: #F3795C;">DITAMBAHKAN KE KERANJANG</h1>
    </div>
    <div class="row px-4">
        <div class="col-md-5 col-12">
            <img src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid lazyload ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Product Image">
        </div>
        <div class="col-md-7 col-12 my-auto content-added-to-bag">
            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ __($product->brand['name']) }}</p>
            <p class="mb-0" style="font-size: 14px;">{{ __($product->name) }}</p>
            <p class="mb-0" style="font-size: 16px;">{{ $cartItem['variant'] }}</p>
        </div>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-styled btn-base-1 btn-outline mb-3 mb-sm-0" data-dismiss="modal">{{__('Back to shopping')}}</button>
        <a href="{{ route('cart') }}" class="btn btn-styled btn-base-1 mb-3 mb-sm-0">{{__('Proceed to Checkout')}}</a>
    </div>
</div>
@endif
@endforeach

{{--<div class="modal-body p-4 added-to-cart">
    <div class="text-center text-success">
        <i class="fa fa-check"></i>
        <h3>{{__('Item added to your cart!')}}</h3>
    </div>
    <div class="product-box">
        <div class="block">
            <div class="block-image">
                <img src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" class="lazyload" alt="Product Image">
            </div>
            <div class="block-body">
                <h6 class="strong-600">
                    {{ __($product->name) }}
                </h6>
                <div class="row align-items-center no-gutters mt-2 mb-2">
                    <div class="col-sm-2">
                        <div>{{__('Price')}}:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="heading-6 text-danger">
                            <strong>
                                {{ single_price(($data['price']+$data['tax'])*$data['quantity']) }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-styled btn-base-1 btn-outline mb-3 mb-sm-0" data-dismiss="modal">{{__('Back to shopping')}}</button>
        <a href="{{ route('cart') }}" class="btn btn-styled btn-base-1 mb-3 mb-sm-0">{{__('Proceed to Checkout')}}</a>
    </div>
</div>--}}
