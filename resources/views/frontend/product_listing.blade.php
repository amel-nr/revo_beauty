@extends('frontend.layouts.app')

@if(isset($subsubcategory_id))
    @php
        $ssc = \App\SubSubCategory::where('id',$subsubcategory_id)->with(['subcategory','subcategory.category'])->first();
        $meta_title = $ssc->meta_title;
        $meta_description = $ssc->meta_description;
        $category_id = $ssc->subcategory->category->id;
    @endphp
@elseif (isset($subcategory_id))
    @php
        $meta_title = \App\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\SubCategory::find($subcategory_id)->meta_description;
    @endphp
@elseif (isset($category_id))
    @php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title = env('APP_NAME');
        $meta_description = \App\SeoSetting::first()->description;
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('style')
    <style>
        .dropdown-toggle::after{
            display: none;
        }
        @media (min-width: 992px) {
            .navbar .navbar-nav .nav-links {
                padding: .5rem 1rem;
                margin-top: 0;
                margin-bottom: 0;
            }
        }
    </style>
@endsection

@section('content')

    {{--<div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('products') }}">{{__('All Categories')}}</a></li>
                        @if(isset($category_id))
                            <li class="active"><a href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">{{ \App\Category::find($category_id)->name }}</a></li>
                        @endif
                        @if(isset($subcategory_id))
                            <li ><a href="{{ route('products.category', \App\SubCategory::find($subcategory_id)->category->slug) }}">{{ \App\SubCategory::find($subcategory_id)->category->name }}</a></li>
                            <li class="active"><a href="{{ route('products.subcategory', \App\SubCategory::find($subcategory_id)->slug) }}">{{ \App\SubCategory::find($subcategory_id)->name }}</a></li>
                        @endif
                        @if(isset($subsubcategory_id))
                            <li ><a href="{{ route('products.category', \App\SubSubCategory::find($subsubcategory_id)->subcategory->category->slug) }}">{{ \App\SubSubCategory::find($subsubcategory_id)->subcategory->category->name }}</a></li>
                            <li ><a href="{{ route('products.subcategory', \App\SubsubCategory::find($subsubcategory_id)->subcategory->slug) }}">{{ \App\SubsubCategory::find($subsubcategory_id)->subcategory->name }}</a></li>
                            <li class="active"><a href="{{ route('products.subsubcategory', \App\SubSubCategory::find($subsubcategory_id)->slug) }}">{{ \App\SubSubCategory::find($subsubcategory_id)->name }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>--}}


    <section class="gry-bg" style="background-color: #FCF8F0;">
        @include('frontend.inc.filter_product_header')
        <div class="container py-5">
            {{--<form class="" id="search-form" action="{{ route('search') }}" method="GET">
                <div class="row">
                <div class="col-xl-3 side-filter d-xl-block" style="border-right: 1px solid #F3795C;">
                    <div class="filter-overlay filter-close"></div>
                    <div class="filter-wrapper c-scrollbar">
                        <div class="filter-title d-flex d-xl-none justify-content-between pb-3 align-items-center">
                            <h3 class="h6">Filters</h3>
                            <button type="button" class="close filter-close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="bg-white sidebar-box mb-3" style="border: none;">
                            <div class="box-title text-center" style="border: none; background-color: #F3795C; color: white;">
                                {{__('Categories')}}
                            </div>
                            <div class="box-content">
                                <div class="category-filter">
                                    <ul>
                                        @if(!isset($category_id) && !isset($category_id) && !isset($subcategory_id) && !isset($subsubcategory_id))
                                            @foreach(\App\Category::all() as $category)
                                                <li class=""><a href="{{ route('products.category', $category->slug) }}">{{ __($category->name) }}</a></li>
                                            @endforeach
                                        @endif
                                        @if(isset($category_id))
                                            <li class="active"><a href="{{ route('products') }}">{{__('All Categories')}}</a></li>
                                            <li class="active"><a href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">{{ __(\App\Category::find($category_id)->name) }}</a></li>
                                            @foreach (\App\Category::find($category_id)->subcategories as $key2 => $subcategory)
                                                <li class="child"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{ __($subcategory->name) }}</a></li>
                                            @endforeach
                                        @endif
                                        @if(isset($subcategory_id))
                                            <li class="active"><a href="{{ route('products') }}">{{__('All Categories')}}</a></li>
                                            <li class="active"><a href="{{ route('products.category', \App\SubCategory::find($subcategory_id)->category->slug) }}">{{ __(\App\SubCategory::find($subcategory_id)->category->name) }}</a></li>
                                            <li class="active"><a href="{{ route('products.subcategory', \App\SubCategory::find($subcategory_id)->slug) }}">{{ __(\App\SubCategory::find($subcategory_id)->name) }}</a></li>
                                            @foreach (\App\SubCategory::find($subcategory_id)->subsubcategories as $key3 => $subsubcategory)
                                                <li class="child"><a href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{ __($subsubcategory->name) }}</a></li>
                                            @endforeach
                                        @endif
                                        @if(isset($subsubcategory_id))
                                            <li class="active"><a href="{{ route('products') }}">{{__('All Categories')}}</a></li>
                                            <li class="active"><a href="{{ route('products.category', \App\SubsubCategory::find($subsubcategory_id)->subcategory->category->slug) }}">{{ __(\App\SubSubCategory::find($subsubcategory_id)->subcategory->category->name) }}</a></li>
                                            <li class="active"><a href="{{ route('products.subcategory', \App\SubsubCategory::find($subsubcategory_id)->subcategory->slug) }}">{{ __(\App\SubsubCategory::find($subsubcategory_id)->subcategory->name) }}</a></li>
                                            <li class="current"><a href="{{ route('products.subsubcategory', \App\SubsubCategory::find($subsubcategory_id)->slug) }}">{{ __(\App\SubsubCategory::find($subsubcategory_id)->name) }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white sidebar-box mb-3" style="border: none;">
                            <div class="box-title text-center" style="border: none; background-color: #F3795C; color: white;">
                                {{__('Price range')}}
                            </div>
                            <div class="box-content">
                                <div class="range-slider-wrapper mt-3">
                                    <!-- Range slider container -->
                                    <div id="input-slider-range" data-range-value-min="{{ filter_products(\App\Product::query())->get()->min('unit_price') }}" data-range-value-max="{{ filter_products(\App\Product::query())->get()->max('unit_price') }}"></div>

                                    <!-- Range slider values -->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="range-slider-value value-low"
                                                @if (isset($min_price))
                                                    data-range-value-low="{{ $min_price }}"
                                                @elseif($products->min('unit_price') > 0)
                                                    data-range-value-low="{{ $products->min('unit_price') }}"
                                                @else
                                                    data-range-value-low="0"
                                                @endif
                                                id="input-slider-range-value-low">
                                        </div>

                                        <div class="col-6 text-right">
                                            <span class="range-slider-value value-high"
                                                @if (isset($max_price))
                                                    data-range-value-high="{{ $max_price }}"
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

                        <div class="bg-white sidebar-box mb-3">
                            <div class="box-title text-center">
                                {{__('Filter by color')}}
                            </div>
                            <div class="box-content">
                                <!-- Filter by color -->
                                <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                                    @foreach ($all_colors as $key => $color)
                                        <li>
                                            <input type="radio" id="color-{{ $key }}" name="color" value="{{ $color }}" @if(isset($selected_color) && $selected_color == $color) checked @endif onchange="filter()">
                                            <label style="background: {{ $color }};" for="color-{{ $key }}" data-toggle="tooltip" data-original-title="{{ \App\Color::where('code', $color)->first()->name }}"></label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        @foreach ($attributes as $key => $attribute)
                            @if (\App\Attribute::find($attribute['id']) != null)
                                <div class="bg-white sidebar-box mb-3">
                                    <div class="box-title text-center">
                                        Filter by {{ \App\Attribute::find($attribute['id'])->name }}
                                    </div>
                                    <div class="box-content">
                                        <!-- Filter by others -->
                                        <div class="filter-checkbox">
                                            @if(array_key_exists('values', $attribute))
                                                @foreach ($attribute['values'] as $key => $value)
                                                    @php
                                                        $flag = false;
                                                        if(isset($selected_attributes)){
                                                            foreach ($selected_attributes as $key => $selected_attribute) {
                                                                if($selected_attribute['id'] == $attribute['id']){
                                                                    if(in_array($value, $selected_attribute['values'])){
                                                                        $flag = true;
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" value="{{ $value }}" @if ($flag) checked @endif onchange="filter()">
                                                        <label for="attribute_{{ $attribute['id'] }}_value_{{ $value }}">{{ $value }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <button type="submit" class="btn btn-styled btn-block btn-base-4">Apply filter</button>
                    </div>
                </div>
                <div class="col-xl-9">
                    <!-- <div class="bg-white"> -->
                        @isset($category_id)
                            <input type="hidden" name="category" value="{{ \App\Category::find($category_id)->slug }}">
                        @endisset
                        @isset($subcategory_id)
                            <input type="hidden" name="subcategory" value="{{ \App\SubCategory::find($subcategory_id)->slug }}">
                        @endisset
                        @isset($subsubcategory_id)
                            <input type="hidden" name="subsubcategory" value="{{ \App\SubSubCategory::find($subsubcategory_id)->slug }}">
                        @endisset

                        <div class="sort-by-bar row no-gutters mb-3 px-3 pt-2">
                            <div class="col-xl-5 d-flex d-xl-block justify-content-between align-items-end pr-2">
                                <div class="sort-by-box flex-grow-1">
                                    <div class="form-group">
                                        <label>{{__('Search')}}</label>
                                        <div class="search-widget">
                                            <input class="form-control input-lg rounded" type="text" name="q" placeholder="{{__('Search products')}}" @isset($query) value="{{ $query }}" @endisset style="border-color: #F3795C;">
                                            <button type="submit" class="btn-inner">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-xl-none ml-3 form-group">
                                    <button type="button" class="btn p-1 btn-sm" id="side-filter">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <div class="sort-by-box pr-1">
                                            <div class="form-group">
                                                <label>{{__('Sort by')}}</label>
                                                <select class="form-control sortSelect" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()">
                                                    <option value="1" @isset($sort_by) @if ($sort_by == '1') selected @endif @endisset>{{__('Newest')}}</option>
                                                    <option value="2" @isset($sort_by) @if ($sort_by == '2') selected @endif @endisset>{{__('Oldest')}}</option>
                                                    <option value="3" @isset($sort_by) @if ($sort_by == '3') selected @endif @endisset>{{__('Price low to high')}}</option>
                                                    <option value="4" @isset($sort_by) @if ($sort_by == '4') selected @endif @endisset>{{__('Price high to low')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sort-by-box pl-1">
                                            <div class="form-group">
                                                <label>{{__('Brands')}}</label>
                                                <select class="form-control sortSelect" data-placeholder="{{__('All Brands')}}" name="brand" onchange="filter()">
                                                    <option value="">{{__('All Brands')}}</option>
                                                    @foreach (\App\Brand::all() as $brand)
                                                        <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="sort-by-box px-1">
                                            <div class="form-group">
                                                <label>{{__('Sellers')}}</label>
                                                <select class="form-control sortSelect" data-placeholder="{{__('All Sellers')}}" name="seller_id" onchange="filter()">
                                                    <option value="">{{__('All Sellers')}}</option>
                                                    @foreach (\App\Seller::all() as $key => $seller)
                                                        @if ($seller->user != null && $seller->user->shop != null)
                                                            <option value="{{ $seller->id }}" @isset($seller_id) @if ($seller_id == $seller->id) selected @endif @endisset>{{ $seller->user->shop->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">--}}
                        <!-- <hr class=""> -->
                        @include('frontend.inc.brand_header')
                        
                        @include('frontend.inc.products_section')

                    <!-- </div> -->
                {{--</div>
            </div>
            </form>--}}
        </div>
    </section>

    @if(isset($subsubcategory_id))
    <input type="hidden" name="" class="ssc" value="{{$subsubcategory_id}}">
    @endif
    @if(isset($subcategory_id))
    <input type="hidden" class="sc" value="{{$subcategory_id}}">
    @endif

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
        $(document).ready(function(){
            $(".filter-button").focus(function(){
               $(this).css({"background-color": "#f3795c", "color": "white"});
            });
            $(".filter-button").blur(function(){
                $(this).css({"background-color": "#fcf8F0", "color": "black"});
            });
        });
    </script>
@endsection
