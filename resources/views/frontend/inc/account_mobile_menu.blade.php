<div id="account-mobile-menu" class="mb-5">
    <div class="category-name-mobile-container">
        <a href="{{ route('dashboard') }}" class="rounded {{ areActiveRoutesHome(['dashboard'])}}">
            <span>
                {{__('Dashboard')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('profile') }}" class="rounded {{ areActiveRoutesHome(['profile'])}}">
            <span>
                {{__('Detail Akun')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('address') }}" class="rounded {{ areActiveRoutesHome(['address'])}}">
            <span>
                {{__('Alamat')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('purchase_history.index') }}" class="rounded {{ areActiveRoutesHome(['purchase_history.index'])}}">
            <span>
                {{__('Pesanan')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('reviews.review') }}" class="rounded {{ areActiveRoutesHome(['reviews.review'])}}">
            <span>
                {{__('Review')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('wishlists.index') }}" class="rounded {{ areActiveRoutesHome(['wishlists.index'])}}">
            <span>
                {{__('Daftar Keinginan')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('beauty_profile') }}" class="rounded {{ areActiveRoutesHome(['beauty_profile'])}}">
            <span>
                {{__('Beauty Profile')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('user_affiliate') }}" class="rounded {{ areActiveRoutesHome(['user_affiliate'])}}">
            <span>
                {{__('Affiliate')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('happy_skin') }}" class="rounded {{ areActiveRoutesHome(['happy_skin'])}}">
            <span>
                {{__('Keuntungan Happy Skin Reward')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('rewards') }}" class="rounded {{ areActiveRoutesHome(['rewards'])}}">
            <span>
                {{__('Rewards')}}
            </span>
        </a>
    </div>
    <div class="category-name-mobile-container">
        <a href="{{ route('point_history') }}" class="rounded {{ areActiveRoutesHome(['point_history'])}}">
            <span>
                {{__('Point History')}}
            </span>
        </a>
    </div>
</div>