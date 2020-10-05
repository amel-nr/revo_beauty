@php
$category = App\Category::where('slug',Request::get('category'))->first();
$subcategory = App\SubCategory::where('slug',Request::get('subcategory'))->first();
$subsubcategory = App\SubSubCategory::where('slug',Request::get('subsubcategory'))->first();
$sconcern = App\skinConcern::where('slug',Request::get('skinconcern'))->first();
$stype = App\skinType::where('slug',Request::get('skintype'))->first();
$classname = "";
$value = "";


$title = 'Header Title';
$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui offcia deserunt mollit anim id est laborum.";

if(isset($category)){
    $title = $category->name;
    $description = $category->meta_description;
}
elseif(isset($subcategory)){
    $title = $subcategory->name;
    $description = $subcategory->meta_description;
}
elseif(isset($subsubcategory)){
    $title = $subsubcategory->name;
    $description = $subsubcategory->meta_description;
}
elseif(isset($sconcern)){
    $classname = 'sconcern-id';
    $value = $sconcern->id;
    $title = $sconcern->name;
}
elseif(isset($stype)){
    $classname = 'skintype-id';
    $value = $stype->id;
    $title = $stype->name;
}
@endphp
<input type="hidden" class="{{ $classname }}" value="{{ $value }}">
<div class="py-5" style="background-color: #FACAC3;" id="filter-product-header">
    <h1 class="mb-0 text-center" style="color: black; font-weight: 700;">{{$title}}</h1>
    <span class ="mx-auto">
        <p class="mb-0 text-center" style="color: black; font-weight: 600; font-size: 14px;">{{$description}}</p>
    </span>
</div>