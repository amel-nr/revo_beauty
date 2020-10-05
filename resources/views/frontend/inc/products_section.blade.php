<nav class="navbar navbar-expand-md">
    <div class="navbar-collapse collapse" id="main-nav-1">
        <ul class="navbar-nav pt-4">
            <li class="nav-item dropdown position-static mr-2" style="background-color: #fcf8F0; border: 1px solid #f3795c; border-radius: 5px; overflow: hidden;"><a href="#" class="nav-link nav-links dropdown-toggle filter-button" data-toggle="dropdown" data-target="#" style="background-color: #fcf8F0; border-color: #f3795c; color: black;"><i class="fa fa-sliders" aria-hidden="true"></i>Filter</a>
                <div class="dropdown-menu w-100 top-auto pb-3 pt-3 mt-2" style="background-color: #FCF8F0; border: 1px solid #f3795c;">
                    <div class="container">
                        <div class="row w-100">
                            <div class="text-left col-sm-3 brand">
                                <p class=" mb-2" style="font-weight: 700;">BRAND</p>
                                @php
                                $brand = App\Brand::all();
                                    if(Request::url() == route('local_pride')){
                                        $brand = App\Brand::where('jenis','local')->get();
                                    }

                                @endphp
                                @foreach($brand as $key => $b)
                                    <div>
                                        <label class="checkbox-container mb-2">
                                            <p class="mb-0" style="line-height: 20px; vertical-align: middle;">{{$b->name}}</p>
                                            <input type="checkbox" id="pilih-semua" value="{{$b->id}}" name="selectb[]" class="select-brands">
                                            <span class="checkbox-checkmark"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-left col-sm-3 category">
                                <p class=" mb-2" style="font-weight: 700;">BY CATEGORY</p>
                                @php
                                $category = App\Category::all();
                                @endphp
                                @foreach($category as $key => $c)
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">{{$c->name}}</p>
                                        <input type="checkbox" value="{{$c->id}}" name="select[]" class="select-categories" id="pilih-semua">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            
                        @if($category_id != 6)
                            <div class="text-left col-sm-3 skintype">
                                <p class="mb-2" style="font-weight: 700;">BY SKIN TYPE</p>
                                @php
                                $skinType = App\skinType::all();
                                @endphp
                                @foreach($skinType as $key => $st)
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">{{$st->name}}</p>
                                        <input type="checkbox" class="select-type" name="selecttype[]" value="{{$st->id}}" id="pilih-semua">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-left col-sm-3 concern">
                                <p class="mb-2" style="font-weight: 700;">BY CONCERN</p>
                                @php
                                $skinConcern = App\skinConcern::all();
                                @endphp
                                @foreach($skinConcern as $key => $sconcern)
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">{{$sconcern->name}}</p>
                                        <input type="checkbox" class="select-concern" name="selectconcern[]" value="{{$sconcern->id}}" id="pilih-semua">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="container">
                        <div class="row w-100">
                            <div class="col-sm-3 byprice">
                                <p class=" mb-2" style="font-weight: 700;">BY PRICE</p>
                                <div class="box-content">
                                    <div class="range-slider-wrapper mt-3">
                                        <!-- Range slider container -->
                                        <div id="input-slider-range" data-range-value-min="{{ filter_products(\App\Product::query())->get()->min('unit_price') }}" data-range-value-max="{{ filter_products(\App\Product::query())->get()->max('unit_price') }}"></div>

                                        <!-- Range slider values -->
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="range-slider-value value-low"
                                                    @php
                                                        //dd([$products[0]->min('unit_price'),$products[0]->max('unit_price'),'maxprice'=>$max_price,'low'=>$min_price]);
                                                    @endphp
                                                    @if (isset($min_price))
                                                        data-range-value-low="{{ $min_price }}"
                                                    @elseif($products[0] && $products[0]->min('unit_price'))
                                                        data-range-value-low="{{ $products[0]->min('unit_price') }}"
                                                    @elseif($products->min('unit_price') > 0)
                                                        data-range-value-low="{{ $products->min('unit_price') }}123"
                                                    @else
                                                        data-range-value-low="0"
                                                    @endif
                                                    id="input-slider-range-value-low"></span>
                                            </div>

                                            <div class="col-6 text-right">
                                                <span class="range-slider-value value-high"
                                                    @if (isset($max_price))
                                                        data-range-value-high="{{ $max_price }}"
                                                    @elseif($products[0] && $products[0]->max('unit_price') > 0)
                                                        data-range-value-high="{{ $products[0]->max('unit_price') }}"
                                                    @elseif($products->max('unit_price') > 0)
                                                        data-range-value-high="{{ $products->max('unit_price') }}"
                                                    @else
                                                        data-range-value-high="0"
                                                    @endif
                                                    id="input-slider-range-value-high">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 offset-2 pt-4">
                                <a name="" id="" onclick="reset()" class="btn btn-danger btn-pilih rounded px-5 mx-2" href="#" role="button"><p class="mb-0 text-center">RESET</p></a>
                                <a name="" id="filtered-button" class="btn btn-danger btn-pakai rounded px-5 mx-2" href="#" role="button"><p class="mb-0 text-center">FILTER</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item" style="background-color: #FCF8F0; border: 1px solid #f3795c; border-radius: 5px; overflow: hidden;"><a href="#" class="nav-link nav-links dropdown-toggle filter-button" data-toggle="dropdown" data-target="#" style="background-color: #fcf8F0; border-color: #f3795c; color: black;"><i class="fa fa-chevron-down" aria-hidden="true"></i>Urutkan</a>
                <div class="dropdown-menu mt-2 py-2" style="background-color: #FCF8F0; border: 1px solid #f3795c; left: auto;">
                    <a class="dropdown-item" onclick="filter_data(6)" href="#">Terlaris</a>
                    <a class="dropdown-item" onclick="filter_data(1)">Nama: A - Z</a>
                    <a class="dropdown-item" onclick="filter_data('2')">Nama: Z - A</a>
                    <a class="dropdown-item" onclick="filter_data('3')">Baru</a>
                    <a class="dropdown-item" onclick="filter_data('4')">Harga: Tinggi - Rendah</a>
                    <a class="dropdown-item" onclick="filter_data('5')">Harga: Rendah - Tinggi</a>
                </div>
            </li>
        </ul>   
    </div>
</nav>
<div class="row mt-4" id="contentp">
    @foreach ($products as $key => $product)
        
        @php
            $flash_product = \App\FlashDealProduct::where('product_id', $product->id)->first();
            $product_variant=json_decode($product->choice_options);
            $qty = 0;
            if($product->variant_product){
                foreach ($product->stocks as $key => $stock) {
                    $qty += $stock->qty;
                }
            }
            else{
                $qty = $product->current_stock;
            }
        @endphp
        <div class="col-md-3 col-6 align-items-center justify-content-center text-center card-product">
            <div class="content-product width-100" style="position: relative;">
                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                <a href="{{ route('product', ['slug' => $product->slug]) }}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                    <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}" style="width: 100%; height: 100%; object-fit: contain;">
                </a>
                <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="addToWishList({{ $product->id }});"></i>
                @if(home_price($product->id) != home_discounted_price($product->id))
                    @if($flash_product)
                        @if($flash_product->discount_type == 'percent')
                            <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">{{ __($flash_product->discount) }}%</p>
                        @elseif($flash_product->discount_type == 'amount')
                            <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp {{ __($flash_product->discount) }}</p>
                        @endif
                    @else
                        @if($product->discount_type == 'percent')
                            <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">{{ __($product->discount) }}%</p>
                        @elseif($product->discount_type == 'amount')
                            <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp {{ __($product->discount) }}</p>
                        @endif
                    @endif
                @else
                    <p class="d-none"></p>
                @endif
            <div class="content-hover">
                @if ($product->choice_options != null && count($product_variant) > 0)
                    <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                        <p>ADD TO BAG</p>
                    </div></a>
                @elseif ($qty == 0 AND $product->digital == 0)
                    <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                        <p>ADD TO BAG</p>
                    </div></a>

                @else
                    <a href="#"><div class="content-hide addtobag"  onclick="addToBag({{ $product->id }})">
                        <p>ADD TO BAG</p>
                    </div></a>
                @endif
                    <a href="#"><div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }})">
                        <p>QUICK VIEW</p>
                    </div></a>
            </div>
            </div>
            @if(isset($product->brand['name']))
                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                    {{ __($product->brand['name']) }}
                </p>
            @else
                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0; visibility: hidden;">
                    .
                </p>
            @endif
            <p style="margin: 0;">{{ __($product->name) }}</p>
            <span class="product-category" style="margin: 0;">{{ __($product->subsubcategory['name']) }}</span>
            <p style="font-weight: 700; margin: 0;">
                @if(home_price($product->id) != home_discounted_price($product->id))
                    <del class="old-product-price strong-400">
                        {{ home_price($product->id) }}
                    </del><br>
                @endif
                <span class="product-price strong-600">
                        {{ home_discounted_price($product->id) }}
                </span>
            </p>
            @php
                $total = 0;
                $total += $product->reviews->count();
            @endphp
            <p>{{ renderStarRating($product->rating) }}({{ $total }})</p>
        </div>  
    @endforeach
</div>
<div class="products-pagination p-3">
    <nav class="mt-5" aria-label="Page navigation example" style="float: right;">
        {{ $products->links() }}
    </nav>
    <p class="mb-0 mt-5 float-right" style="padding: 0.625rem 0.875rem; line-height: 1.25;">Showing <span id="showing">{{ $products->count() }}</span> of {{ $products->total() }}</p>
    <div class="mb-5" style="clear: right;"></div>
</div>

@section('script')
<script>
        
    $(document).ready(function () {


        let urL = window.location.href;
        let brandurl = "/search?brand";
        let subsubcategoryurl = "/search?subsubcategory";
        let subcategoryurl = "/search?subcategory";
        let concernurl = "/search?skinconcern";
        let typeurl = "/search?skintype";
        
        if (urL.indexOf(brandurl) >= 0 || brandurl.indexOf(urL) >= 0){
            $(".brand").hide()
            $("#filter-product-header").hide()
            brand = [$("#brandid").val()];
        }
        let q = "search?q"
        if (urL.indexOf(q) >= 0 || q.indexOf(urL) >= 0){
            $(".brand-header").hide()
            $("#filter-product-header").hide()
            $(".brand").hide()
        }
        if (urL.indexOf(subsubcategoryurl) >= 0 || subsubcategoryurl.indexOf(urL) >= 0){
            $(".category").hide()
            $(".brand-header").hide()
        }
        if (urL.indexOf(subcategoryurl) >= 0 || subcategoryurl.indexOf(urL) >= 0){
            $(".category").hide()
            $(".brand-header").hide()
            $(".skintype").hide()
            $(".concern").hide()
        }
        if (urL.indexOf(concernurl) >= 0 || concernurl.indexOf(urL) >= 0){
            $(".concern").hide()
            $(".brand-header").hide()
        }
        if (urL.indexOf(typeurl) >= 0 || typeurl.indexOf(urL) >= 0){
            $(".brand-header").hide()
            $(".skintype").hide()
        }

        $.post("{{ url('home/section/best_sell') }}", {_token:'{{ csrf_token() }}',jenis:'local'}, function(data){
                $('#section_best_selling_local_pride').html(data);
                slickInit();
                initGlobalRate();
            });
            $(".filter-button").focus(function(){
               $(this).css({"background-color": "#f3795c", "color": "white"});
            });
            $(".filter-button").blur(function(){
                $(this).css({"background-color": "#fcf8F0", "color": "black"});
            });
        
            $("#filtered-button").click(function (e) {
                e.preventDefault()
                filter_data('0');
            })
    })
    
    
    function reset() {
        $('input:checkbox').removeAttr('checked');
    }

    function filter_data(sb)
            {
                var brand = get_filter('select-brands');
                var skinconcern = get_filter("select-concern");
                var skintype = get_filter("select-type");
                console.log([skinconcern,skintype])
                var lpride = '';
                let shopsale = [0];

                let localPride = "/local-pride";
        
                if (window.location.href.indexOf(localPride) >= 0 || localPride.indexOf(window.location.href) >= 0){
                    lpride = "local"
                }

                if ($("#idp-shopsale").val()) {
                    shopsale = $("#idp-shopsale").val();
                    shopsale = JSON.parse(shopsale);
                }
                    


                if (window.location.href.indexOf("/search?brand") >= 0 || "/search?brand".indexOf(window.location.href) >= 0){
                    brand = [$("#brandid").val()];
                }
                if (window.location.href.indexOf("/search?skinconcern") >= 0 || "/search?skinconcern".indexOf(window.location.href) >= 0){
                    skinconcern = [$(".sconcern-id").val()];
                }
                if (window.location.href.indexOf("/search?skintype") >= 0 || "/search?skintype".indexOf(window.location.href) >= 0){
                    skintype = [$(".skintype-id").val()];
                }
                if (window.location.href.indexOf("/search?q=") >= 0 || "/search?q=".indexOf(window.location.href) >= 0){
                    const first = parseInt(window.location.href.indexOf("="))+1
                   const last = parseInt(window.location.href.length)
                   var q = window.location.href.slice(first,last)
                   q = q.replace("+"," ").replace("#","")
                }
                console.log(q);
                var action = 'fetch_data';
                var category = get_filter('select-categories');
                var ssc = $(".ssc").val();
                var sc = $(".sc").val();
                let high = $("#input-slider-range-value-high").html()
                let low = $("#input-slider-range-value-low").html()
                
                let data = {
                    _token:'{{csrf_token()}}',
                    category:category,
                    subsubcategory:ssc,
                    subcategory:sc,
                    brandid:brand,
                    maximum_price:high,
                    minimum_price:low,
                    skinconcern:skinconcern,
                    skintype:skintype,
                    sortby:sb,
                    localpride:lpride,
                    shopsale:shopsale,
                    q:q
                }

                // console.log(data)

                $.post("{{route('filter.product')}}",data,
                function (data) {
                    let content = '';
                    let disc = '<p class="d-none"></p>';
                    let discType = '';
                    let contlength = 0;
                    let showAddToBag = '';
                        data.forEach(function (product) {
                            console.log(product)
                            let brand = '';
                            if (product.brand != null) {
                                brand = product.brand
                            }
                            let ssc = '';
                            if (product.ssc != null) {
                                ssc = product.ssc
                            }

                            if (product.atbmodal == 1){
                                showAddToBag = `</p><a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ `+ product.id +` }})">
                                    <p>ADD TO BAG</p>
                                </div></a>`;
                                }
                            else if(product.atbmodal == 2){
                                showAddToBag = `</p><a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ `+ product.id +` }})">
                                    <p>ADD TO BAG</p>
                                </div></a>`;
                                }
                            else{
                                showAddToBag = `</p><a href="#"><div class="content-hide addtobag"  onclick="addToBag(`+ product.id +`)">
                                <form id="option-choice-form">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="id" value="{{`+product.id+`}}">
                                        <p>ADD TO BAG</p>
                                    </div>
                                </form>
                                </a>`}

                            contlength = contlength+1
                            content += `
                        <div class="col-3 align-items-center justify-content-center text-center card-product">
            <div class="content-product width-100" style="position: relative;">
                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                <a href="{{ route('product', ['slug' => `+ product.slug +`]) }}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                    <img class="img-fit m-auto  ls-is-cached lazyloaded" src="{{ asset('`+ product.thumbnail_img +`') }}" data-src="{{ asset(`+ product.thumbnail_img +`) }}" alt="`+ product.name +`" style="width: 100%; height: 100%; object-fit: contain;">
                </a>
                <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="addToWishList(`+ product.id +`);"></i>`+ product.disc +`
                <div class="content-hover">
                `+ showAddToBag +`
                    <a href="#"><div class="content-hide quickview" onclick="showAddToCartModal(`+ product.id +`)">
                        <p>QUICK VIEW</p>
                    </div></a>
                </div>
            </div>
                            <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                            `+ brand +`
                </p>
                        <p style="margin: 0;">`+ product.name +`</p>
            <span class="product-category" style="margin: 0;">`+ ssc +`</span>
            <p style="font-weight: 700; margin: 0;">
                                <span class="product-price strong-600">
                   `+ product.discounted_price +`
                </span>
            </p>
            <p>{{ renderStarRating(`+ product.rating +`) }}(`+ product.total +`)</p>
        </div>
                        `;
                    });

                $("#contentp").html(content)
                $("#showing").html(contlength)
            })
            }

            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }
</script>
@endsection