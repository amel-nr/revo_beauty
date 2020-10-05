<div id="side-nav-container" class="container py-3">
    <div class="row">
        <div class="col-2">
            <a href="#" class="float-left mb-2 back-side-nav"><i class="fa fa-arrow-left" aria-hidden="true" style="color: #F3795C; font-size: 20px;"></i></a>
        </div>
        <div class="col-8">
            <p class="text-center font-weight-bold title-side-nav" style="font-size: 18px;">TITLE</p>
        </div>
        <div class="col-2">
            <a href="#" class="dismiss-mobile-nav float-right mb-2"><i class="fa fa-times" aria-hidden="true" style="color: #F3795C; font-size: 20px;"></i></a>
        </div>
    </div>
    <div style="clear: right;"></div>
    @auth
    <div class="profile-side-menu mb-3 pb-2">
        <div class="accordion md-accordion" id="accordionMobile" role="tablist" aria-multiselectable="true">
            <a data-toggle="collapse" data-parent="#accordionMobile" href="#collapseMobileProfile" aria-expanded="false"
                aria-controls="collapseMobileProfile" style="text-decoration: none; color: black !important;">  
                <div class="row mx-0" role="tab" id="headingMobileProfile">
                    <div class="col-4 text-right" style="padding: 10px;">
                        <div class="rounded-circle" style="border: 2px solid black; background-image: url('{{ isset(Auth::user()->avatar_original) ? asset(Auth::user()->avatar_original) : image_avatar(Auth::user()->gender) }}'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 70px; height: 70px;"></div>
                    </div>
                    <div class="col-8 text-left my-auto" style="padding: 10px;">
                        <p class="name-profile-mobile-nav" style="font-weight: 700; font-size: 16px; margin-bottom: 0; margin-top: 10px;">Hi, {{ Auth::user()->name }}!<span class="float-right"><i class="fa fa-chevron-down" aria-hidden="true" style="color: #f3795c;"></i></span></p>
                        <p style="font-weight: 700; font-size: 12px; margin-bottom: 0;">{{ Auth::user()->point }} POINTS</p>
                    </div>
                </div>
            </a>
            <div id="collapseMobileProfile" class="collapse" role="tabpanel" aria-labelledby="headingMobileProfile"
                data-parent="#accordionMobile">
                <ul class="list-group text-center">
                    <a href="{{ route('dashboard') }}"><li class="list-group-item" style="background-color: #FCF8F0; padding: 0.5rem !important; border: none !important; color: #F3795C;">AKUN SAYA</li></a>
                    <a href="{{ route('purchase_history.index') }}"><li class="list-group-item" style="background-color: #FCF8F0; padding: 0.5rem !important; border: none !important; color: #F3795C;">PESANAN</li></a>
                    <a href="{{ route('reviews.review') }}"><li class="list-group-item" style="background-color: #FCF8F0; padding: 0.5rem !important; border: none !important; color: #F3795C;">ULASAN</li></a>
                    <a href="{{ route('happy_skin') }}"><li class="list-group-item" style="background-color: #FCF8F0; padding: 0.5rem !important; border: none !important; color: #F3795C;">HAPPY SKIN REWARDS</li></a>
                </ul>
            </div>
        </div>
    </div>
    @endauth
    <div class="list-group main-side-menu">
        <a href="#" class="list-group-item list-side-menu brands-side-menu">BRANDS<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu skin-side-menu">SKIN CARE<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu hair-side-menu">HAIR & MAKE UP<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu tools-side-menu">TOOLS<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu skinconcern-side-menu">SKIN CONCERN<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="{{ route('skinklopedia') }}" class="list-group-item list-side-menu diff-menu">SKINKLOPEDIA</a>
        <a href="{{ route('local_pride') }}" class="list-group-item list-side-menu diff-menu">LOCAL PRIDE</a>
        <a href="{{ route('shop_sale') }}" class="list-group-item list-side-menu diff-menu">SHOP SALE</a>
    </div>
    <div class="list-group brand-filter-alphabet">
        <a href="#" class="list-group-item list-side-menu filter-alphabet-side-nav" onclick="sideNavBrand('A', 'B')">A - B<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu filter-alphabet-side-nav" onclick="sideNavBrand('C', 'G')">C - G<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu filter-alphabet-side-nav" onclick="sideNavBrand('H', 'K')">H - K<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu filter-alphabet-side-nav" onclick="sideNavBrand('L', 'R')">L - R<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <a href="#" class="list-group-item list-side-menu filter-alphabet-side-nav" onclick="sideNavBrand('S', 'Z')">S - Z<span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
        <div id="filtersidenav"></div>
    </div>
    <div class="list-group skincare-filter">
        @php
            $skincare = \App\SubCategory::where('category_id', 5)->get();
        @endphp
        @foreach ($skincare as $skin_category)
            <a href="#" class="list-group-item list-side-menu filter-skincare-side-nav" onclick="sideNavSkinCare({{ $skin_category->id }}, '{{ $skin_category->name }}')">{{ strtoupper($skin_category->name) }}
                @if(\App\SubSubCategory::where('sub_category_id', $skin_category->id)->count() != null)
                <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                @endif
            </a>
        @endforeach
        <div id="filterskincaresidenav"></div>
    </div>
    <div class="list-group hair-filter">
        @php
            $hair = \App\SubCategory::with('subsubcategories')->where('category_id', 6)->get();
        @endphp
        @foreach ($hair as $hair_category)
            <a href="#" class="list-group-item list-side-menu sc">{{ strtoupper($hair_category->name) }}</a>
            @foreach ($hair_category->subsubcategories as $sub_hair_category)
                <a href="{{route('products.subsubcategory',['subsubcategory_slug' => $sub_hair_category->slug])}}" class="list-group-item list-side-menu ssc">{{ strtoupper($sub_hair_category->name) }}</a>
            @endforeach
        @endforeach
    </div>
    <div class="list-group tools-filter">
        @php
            $tools = \App\SubCategory::where('category_id', 7)->get();
        @endphp
        @foreach ($tools as $tools_category)
            <a href="{{route('products.subcategory',['subcategory_slug' => $tools_category->slug])}}" class="list-group-item list-side-menu">{{ strtoupper($tools_category->name) }}
                @if(\App\SubSubCategory::where('sub_category_id', $tools_category->id)->count() != null)
                <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                @endif
            </a>
        @endforeach
    </div>
    <div class="list-group skinconcern-filter">
        @php
            $skinconcern = \App\skinConcern::all();
        @endphp
        @foreach ($skinconcern as $skinconcern_category)
            <a href="{{route('products.skinconcern',['skinconcern' => $skinconcern_category->slug])}}" class="list-group-item list-side-menu">{{ strtoupper($skinconcern_category->name) }}</a>
        @endforeach
    </div>
    @auth
    <a href="{{ route('logout') }}" type="button" class="w-100 btn btn-danger btn-keluar mt-2">KELUAR</a>
    @else
    <div class="row mx-0 width-100 loginregister-side-menu">
        <div class="col-6 pl-0 pr-2">
            <a href="#modalLogin" data-target="#modalLogin" data-toggle="modal" role="button" id="login-button" class="w-100 btn btn-danger btn-loginregister-mobile dismiss-mobile-nav">LOGIN</a>
        </div>
        <div class="col-6 pl-2 pr-0">
            <a href="#modalRegister" data-target="#modalRegister" data-toggle="modal"  role="button" id="register-button" class="w-100 btn btn-danger btn-loginregister-mobile dismiss-mobile-nav">REGISTER</a>
        </div>
    </div>
    @endauth
</div>