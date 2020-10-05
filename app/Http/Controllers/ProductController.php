<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductStock;
use App\Category;
use App\Language;
use App\FlashDealProduct;
use Auth;
use App\SubSubCategory;
use Session;
use ImageOptimizer;
use DB;
use CoreComponentRepository;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_products(Request $request)
    {
        //CoreComponentRepository::instantiateShopRepository();

        $type = 'In House';
        $col_name = null;
        $query = null;
        $sort_search = null;

        $products = Product::where('added_by', 'admin');

        if ($request->type != null){
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }
        if ($request->search != null){
            $products = $products
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('products.index', compact('products','type', 'col_name', 'query', 'sort_search'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $products = Product::where('added_by', 'seller');
        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null){
            $products = $products
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        if ($request->type != null){
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(15);
        $type = 'Seller';

        return view('products.index', compact('products','type', 'col_name', 'query', 'seller_id', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();

        $product = new Product;
        $product->name = $request->name;
        $product->tagline = $request->tagline;
        $product->added_by = $request->added_by;
        if(Auth::user()->user_type == 'seller'){
            $product->user_id = Auth::user()->id;
        }
        else{
            $product->user_id = \App\User::where('user_type', 'admin')->first()->id;
        }
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->current_stock = $request->current_stock;
        $product->barcode = $request->barcode;
        $product->is_special = $request->is_special == 'on' ? 1 : 0;


        if ($refund_request_addon != null && $refund_request_addon->activated == 1) {
            if ($request->refundable != null) {
                $product->refundable = 1;
            }
            else {
                $product->refundable = 0;
            }
        }

        $photos = array();

        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos');
                array_push($photos, $path);
                ImageOptimizer::optimize(base_path('public/').$path);
            }
            $product->photos = json_encode($photos);
        }

        if($request->hasFile('thumbnail_img')){
            $product->thumbnail_img = $request->thumbnail_img->store('uploads/products/thumbnail');
            ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }

        if($request->hasFile('featured_img')){
            $product->featured_img = $request->featured_img->store('uploads/products/featured');
            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }

        if($request->hasFile('flash_deal_img')){
            $product->flash_deal_img = $request->flash_deal_img->store('uploads/products/flash_deal');
            ImageOptimizer::optimize(base_path('public/').$product->flash_deal_img);
        }

        $product->unit = $request->unit;
        $product->tags = implode('|',$request->tags);
        $product->description = $request->description;
        $product->komposisi = $request->komposisi;
        $product->penggunaan = $request->penggunaan;
        $product->nomer_bpom = $request->nomer_bpom;
        $product->bahan_aktif = $request->bahan_aktif;
        $product->satuan_ukuran = $request->satuan_ukuran;
        $product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->unit_price = $request->unit_price;
        $product->purchase_price = $request->purchase_price;
        $product->tax = $request->tax;
        $product->tax_type = $request->tax_type;
        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->shipping_type = $request->shipping_type;
        if($request->shipping_type == 'free'){
            $product->shipping_cost = 0;
        }
        elseif ($request->shipping_type == 'flat_rate') {
            $product->shipping_cost = $request->flat_shipping_cost;
        }
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        if($request->hasFile('meta_img')){
            $product->meta_img = $request->meta_img->store('uploads/products/meta');
            ImageOptimizer::optimize(base_path('public/').$product->meta_img);
        }

        if($request->hasFile('pdf')){
            $product->pdf = $request->pdf->store('uploads/products/pdf');
        }

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str_random(5);

        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $product->colors = json_encode($request->colors);
        }
        else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_'.$no;

                $item['attribute_id'] = $no;
                $item['values'] = explode(',', implode('|', $request[$str]));

                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        }
        else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options);

        //$variations = array();

        $product->save();

        //combinations start
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|',$request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        //Generates the combinations of customer choice options
        $combinations = combinations($options);
        if(count($combinations[0]) > 0){
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination){
                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                            $color_name = \App\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }
                // $item = array();
                // $item['price'] = $request['price_'.str_replace('.', '_', $str)];
                // $item['sku'] = $request['sku_'.str_replace('.', '_', $str)];
                // $item['qty'] = $request['qty_'.str_replace('.', '_', $str)];
                // $variations[$str] = $item;

                $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
                if($product_stock == null){
                    $product_stock = new ProductStock;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_'.str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_'.str_replace('.', '_', $str)];
                $product_stock->save();
            }
        }
        //combinations end

        //$product->variations = json_encode($variations);

        // foreach (Language::all() as $key => $language) {
        //     $data = openJSONFile($language->code);
        //     $data[$product->name] = $product->name;
        //     saveJSONFile($language->code, $data);
        // }

	    $product->save();

        flash(__('Product has been inserted successfully'))->success();
        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
            return redirect()->route('products.admin');
        }
        else{
            return redirect()->route('seller.products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_product_edit($id)
    {
        $product = Product::findOrFail(decrypt($id));
        //dd(json_decode($product->price_variations)->choices_0_S_price);
        $tags = json_decode($product->tags);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seller_product_edit($id)
    {
        $product = Product::findOrFail(decrypt($id));
        //dd(json_decode($product->price_variations)->choices_0_S_price);
        $tags = json_decode($product->tags);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->tagline = $request->tagline;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->current_stock = $request->current_stock;
        $product->barcode = $request->barcode;
        $product->is_special = $request->is_special == 'on' ? 1 : 0;


        if ($refund_request_addon != null && $refund_request_addon->activated == 1) {
            if ($request->refundable != null) {
                $product->refundable = 1;
            }
            else {
                $product->refundable = 0;
            }
        }

        if($request->has('previous_photos')){
            $photos = $request->previous_photos;
        }
        else{
            $photos = array();
        }

        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos');
                array_push($photos, $path);
                ImageOptimizer::optimize(base_path('public/').$path);
            }
        }
        $product->photos = json_encode($photos);

        $product->thumbnail_img = $request->previous_thumbnail_img;
        if($request->hasFile('thumbnail_img')){
            $product->thumbnail_img = $request->thumbnail_img->store('uploads/products/thumbnail');
            ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }

        $product->featured_img = $request->previous_featured_img;
        if($request->hasFile('featured_img')){
            $product->featured_img = $request->featured_img->store('uploads/products/featured');
            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }

        $product->flash_deal_img = $request->previous_flash_deal_img;
        if($request->hasFile('flash_deal_img')){
            $product->flash_deal_img = $request->flash_deal_img->store('uploads/products/flash_deal');
            ImageOptimizer::optimize(base_path('public/').$product->flash_deal_img);
        }

        $product->unit = $request->unit;
        $product->tags = implode('|',$request->tags);
        $product->description = $request->description;
        $product->komposisi = $request->komposisi;
        $product->penggunaan = $request->penggunaan;
        $product->nomer_bpom = $request->nomer_bpom;
        $product->bahan_aktif = $request->bahan_aktif;
        $product->satuan_ukuran = $request->satuan_ukuran;
        $product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->unit_price = $request->unit_price;
        $product->purchase_price = $request->purchase_price;
        $product->tax = $request->tax;
        $product->tax_type = $request->tax_type;
        $product->discount = $request->discount;
        $product->shipping_type = $request->shipping_type;
        if($request->shipping_type == 'free'){
            $product->shipping_cost = 0;
        }
        elseif ($request->shipping_type == 'flat_rate') {
            $product->shipping_cost = $request->flat_shipping_cost;
        }
        $product->discount_type = $request->discount_type;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        $product->meta_img = $request->previous_meta_img;
        if($request->hasFile('meta_img')){
            $product->meta_img = $request->meta_img->store('uploads/products/meta');
            ImageOptimizer::optimize(base_path('public/').$product->meta_img);
        }

        if($request->hasFile('pdf')){
            $product->pdf = $request->pdf->store('uploads/products/pdf');
        }

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.substr($product->slug, -5);

        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $product->colors = json_encode($request->colors);
        }
        else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_'.$no;

                $item['attribute_id'] = $no;
                $item['values'] = explode(',', implode('|', $request[$str]));

                array_push($choice_options, $item);
            }
        }

        if($product->attributes != json_encode($request->choice_attributes)){
            foreach ($product->stocks as $key => $stock) {
                $stock->delete();
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        }
        else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options);

        // foreach (Language::all() as $key => $language) {
        //     $data = openJSONFile($language->code);
        //     unset($data[$product->name]);
        //     $data[$request->name] = "";
        //     saveJSONFile($language->code, $data);
        // }

        //$variations = array();

        //combinations start
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|',$request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        $combinations = combinations($options);
        if(count($combinations[0]) > 0){
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination){
                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                            $color_name = \App\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }
                // $item = array();
                // $item['price'] = $request['price_'.str_replace('.', '_', $str)];
                // $item['sku'] = $request['sku_'.str_replace('.', '_', $str)];
                // $item['qty'] = $request['qty_'.str_replace('.', '_', $str)];
                // $variations[$str] = $item;

                $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
                if($product_stock == null){
                    $product_stock = new ProductStock;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_'.str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_'.str_replace('.', '_', $str)];

                $product_stock->save();
            }
        }

        $product->save();

        flash(__('Product has been updated successfully'))->success();
        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
            return redirect()->route('products.admin');
        }
        else{
            return redirect()->route('seller.products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(Product::destroy($id)){
            foreach (Language::all() as $key => $language) {
                $data = openJSONFile($language->code);
                unset($data[$product->name]);
                saveJSONFile($language->code, $data);
            }
            // if($product->thumbnail_img != null){
            //     //unlink($product->thumbnail_img);
            // }
            // if($product->featured_img != null){
            //     //unlink($product->featured_img);
            // }
            // if($product->flash_deal_img != null){
            //     //unlink($product->flash_deal_img);
            // }
            // foreach (json_decode($product->photos) as $key => $photo) {
            //     //unlink($photo);
            // }
            flash(__('Product has been deleted successfully'))->success();
            if(Auth::user()->user_type == 'admin'){
                return redirect()->route('products.admin');
            }
            else{
                return redirect()->route('seller.products');
            }
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Duplicates the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duplicate($id)
    {
        $product = Product::find($id);
        $product_new = $product->replicate();
        $product_new->slug = substr($product_new->slug, 0, -5).str_random(5);

        if($product_new->save()){
            flash(__('Product has been duplicated successfully'))->success();
            if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
                return redirect()->route('products.admin');
            }
            else{
                return redirect()->route('seller.products');
            }
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function get_products_by_subsubcategory(Request $request)
    {
        $products = Product::where('subsubcategory_id', $request->subsubcategory_id)->get();
        return $products;
    }

    public function get_products_by_brand(Request $request)
    {
        $products = Product::where('brand_id', $request->brand_id)->get();
        return view('partials.product_select', compact('products'));
    }

    public function updateTodaysDeal(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->todays_deal = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function updatePublished(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->published = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function updateFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->featured = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function sku_combination(Request $request)
    {
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->name;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        $combinations = combinations($options);
        return view('partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $product_name = $request->name;
        $unit_price = $request->unit_price;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        $combinations = combinations($options);
        return view('partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }

    public function filter_product(Request $request)
    {
        // dd($request->all());

        $min_price = $request->minimum_price;
        $max_price = $request->maximum_price;
        $skinconcern_id = $request->skinconcern;
        $skintype_id = $request->skintype;
        $sort_by = $request->sortby;
        $localpride = $request->localpride;
        $shopsale = $request->shopsale;
        $bs = \App\OrderDetail::select('product_id', DB::raw('COUNT(id) as total_product'))
                ->groupBy('product_id')
                ->havingRaw('count(id) > 0')
                ->pluck("product_id")
                ->toArray();
        // dd($bs);

        $conditions = ['published' => 1];
                
                if (isset($request->subcategory)) {
                    $conditions = array_merge($conditions, ['subcategory_id' => $request->subcategory]);
                }
                if (isset($request->subsubcategory)) {
                    $conditions = array_merge($conditions, ['subsubcategory_id' => $request->subsubcategory]);
                }
                
                $products = Product::where($conditions); //dapet

                if (count($bs)>0) {
                    $bs = $product->whereIn('id',$bs);
                }

                if ($localpride != '' || $localpride != null) {
                    $brand = \App\Brand::select('id')->where('jenis',$localpride)->get();
                    $products = $products->whereIn('brand_id',$brand);
                }
                if ($shopsale[0] != 0) {
                    $products = $products->whereIn('id',$shopsale);
                }
                
                // dd($min_price);
                if ($min_price != null && $max_price != null) {
                    $products = $products->whereBetween('unit_price', [$min_price,$max_price]);
                }
                
                if(isset($request->brandid))
                {
                 $brand_id = $request->brandid;
                 $products->whereIn("brand_id", $brand_id);
                }
                if (isset($request->category)) {
                   $category_id = $request->category;
                   $products->whereIn("category_id",  $category_id);
                }
                // dd($request->all());
                

                 if (isset($skinconcern_id) || isset($skintype_id)) {
                    $logskin = new \App\log_skin;
                     if (isset($skinconcern_id)) {
                            $logskin = $logskin->whereIn("skin_concern_id", $skinconcern_id);
                        }
                        if (isset($skintype_id)) {
                            $logskin = $logskin->whereIn("skin_type_id", $skintype_id);
                        }

                    $logskin = $logskin->with('product')->get();
                    // dd($logskin[0]['product']['name']);
                    $producta = [];
                    foreach ($logskin as $ls) {
                        $idp = $ls["product"]["id"];
                        array_push($producta,$idp);
                    }
                    $products = $products->whereIn("id", $producta);
                }
                
                if (isset($request->q)) {
                    $products = $products->where('name', 'like', '%' .$request->q . '%')->orWhere('tags', 'like', '%' .$request->q . '%');
                }

                if ($sort_by != null) {
                    switch ($sort_by) {
                        case '1':
                            $products->orderBy('name', 'asc');
                        break;
                        case '2':
                            $products->orderBy('name', 'desc');
                        break;
                        case '3':
                            $products->orderBy('created_at', 'asc');
                        break;
                        case '4':
                            $products->orderBy('unit_price', 'desc');
                        break;
                        case '5':
                            $products->orderBy('unit_price', 'asc');
                        break;
                        case '6':
                            if (count($bs)==0) {
                                $products->orderBy("name");
                            }else {
                                $products->whereIn('id',$bs)->orderBy('name', 'asc');
                            }
                        break;
                        default:
                            $products->orderBy('name', 'asc');
                            break;
                    }
                }
                

        
                $data = $products->with(["brand","subsubcategory"])->get();
                // dd($request->all());
                $product = [];
                foreach ($data as $key => $val) {

                    $product[$key] = [
                        "id" => $val["id"],
                        "name" => $val["name"],
                        "thumbnail_img" => $val["thumbnail_img"],
                        "slug" => $val["slug"],
                        "brand" => $val["brand"]["name"],
                        "ssc" => $val["subsubcategory"]["name"],
                        "discounted_price" => home_discounted_price($val["id"])
                    ];

                    $flash_product = \App\FlashDealProduct::where('product_id', $val['id'])->first();
                    $product_variant=json_decode($val["choice_options"]);
                    $qty = 0;
                    if($val["variant_product"]){
                        foreach ($val["stocks"] as $stock) {
                            $qty += $stock["qty"];
                        }
                    }
                    else{
                        $qty = $val["current_stock"];
                    }
                    $disc = '<p class="d-none">';
                    $discType = "";
                    if(home_price($val["id"]) != home_discounted_price($val["id"])){
                        if(isset($flash_product)){
                            // $disc = $flash_product["discount"];
                            // $discType = $flash_product["discount_type"];
                            if($flash_product->discount_type == 'percent'){
                            $disc = '<p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">'.$flash_product->discount.'%</p>';
                            }
                            elseif($flash_product->discount_type == 'amount'){
                            $disc = '<p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp '.$flash_product->discount.'</p>';
                            }
                        }else{
                            if($val->discount_type == 'percent'){
                                $disc = '<p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">'.$val->discount.'%</p>';
                            }elseif($val->discount_type == 'amount'){
                                $disc = '<p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp '.$val->discount.'</p>';
                            }
                        }

                        $product[$key]["home_price"] = home_price($val["id"]);
                    }

                $total = 0;
                $total += count($val["reviews"]);
                $rating = $val["rating"];
                
                $product[$key]["atbmodal"] = 0;
                if ($val["choice_options"] != null && count($product_variant) > 0){
                        $product[$key]["atbmodal"] = 1;
                    }
                    elseif ($qty == 0 && $val["digital"] == 0){
                        $product[$key]["atbmodal"] = 2;
                    }

                    $product[$key]["rating"] = $rating;
                    $product[$key]["total"] = $total;
                    $product[$key]["qty"] = $qty;
                    $product[$key]["disc"] = $disc;
                    $product[$key]["disctype"] = $discType;


                }
                // dd($product);
        return $product;
    }

}
