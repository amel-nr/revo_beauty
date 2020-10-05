<a href="#" id="navbarDropdownCart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{asset('img/cart.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 22px; margin-left: 15px; margin-top: 35px;">
    @if(Session::has('cart'))
        <span class="badge  badge badge-pill badge-secondary" id="cart_items_sidenav" style="background-color: #F3795C;">{{ count(Session::get('cart'))}}</span>
    @else
        <span class="badge  badge badge-pill badge-secondary" id="cart_items_sidenav" style="background-color: #F3795C;">0</span>
    @endif
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdownCart" style="border-color: #F3795C; border-radius: 5px; margin-top: 50px; margin-right: 100px; width: 350px; background-color: #FEF6E8;">
    <div class="container" style="padding: 20px 30px;">
         @include('frontend.partials.item_dropdown_cart')
    </div>
</div>