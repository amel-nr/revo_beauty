{{--<a href="{{ route('wishlists.index') }}" class="nav-box-link">
<i class="la la-heart-o d-inline-block nav-box-icon"></i>
<span class="nav-box-text d-none d-lg-inline-block">{{__('Wishlist')}}</span>
@if(Auth::check())
<span class="nav-box-number">{{ count(Auth::user()->wishlists)}}</span>
@else
<span class="nav-box-number">0</span>
@endif
</a>--}}
<img src="{{asset('img/wishlist.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 22px; margin-left: 15px;">
@if(Auth::check())
<span class="nav-box-number badge badge-pill badge-secondary" style="background-color: #F3795C; top: -15px; position: relative;">{{ count(Auth::user()->wishlists)}}</span>
@else
<span class="nav-box-number badge badge-pill badge-secondary" style="background-color: #F3795C; top: -15px; position: relative;">0</span>
@endif