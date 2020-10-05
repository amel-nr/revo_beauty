@php
$brand = App\Brand::where('slug',Request::get('brand'))->first();
$ssc = App\SubSubCategory::where('slug',Request::get('subsubcategory'))->first();
$sconcern = App\skinConcern::where('slug',Request::get('skinconcern'))->first();
$title = "Title";
$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui offcia deserunt mollit anim id est laborum.";
@endphp

<div class="brand-header">
    @if($brand != null)
        @php
            $description = $brand->meta_description;
            $title = $brand->name;
        @endphp
            <img class="d-block w-100 lazyload" src="{{ asset($brand->logo)}}" alt="">
    @elseif($ssc != null)
        @php
            $title = $ssc->name;
        @endphp
    @elseif($sconcern != null)
        @php
        $title = $sconcern->name;
        @endphp
    @endif

    <h4 class="pt-3" style="font-weight: 700;">{{$title}}</h4>

    <input type="hidden" name="brandid" id="brandid" value="{{$brand ? $brand->id : 0}}">
    <div class="row">
        <div class="col-9 text-justify">
            <p style="font-size: 14px;">{{$description}}</p>
        </div>
    </div>
</div>