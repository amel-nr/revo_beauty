<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

use Session;
use Auth;
use Hash;
use App\Category;
use App\GeneralSetting;
use App\FlashDeal;
use App\Brand;
use App\Mail\contact_us;
use App\SubCategory;
use App\SubSubCategory;
use App\skinConcern;
use App\skinType;
use App\Product;
use App\Coupon;
use App\PickupPoint;
use App\CustomerPackage;
use App\CustomerProduct;
use App\User;
use App\Seller;
use App\Shop;
use App\Color;
use App\Order;
use App\BusinessSetting;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BusinessSettingsController;
use ImageOptimizer;
use Cookie;

class HomeController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }

    public function login_otp()
    {

        return view('frontend.otp.index');
    }

    public function is_user(Request $request)
    {

        if ($request->ajax()) {
            # code...
            $user = User::where('email', $request->email)->firstOrFail();
            if (isset($user)) {
                # code...
                return \Response::json(['status' => '1', 'email' => $user->email], 200);
            }
            return \Response::json(['status' => '0', 'email' => ''], 200);
        }
    }


    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        if ($request->has('referral_code')) {
            Cookie::queue('referral_code', $request->referral_code, 43200);
        }
        return view('frontend.user_registration_referal');
    }


    public function referalregister($id = null)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $userReferral = User::where('referral_code', $id)->first();

        if (isset($userReferral) && !Auth::check()) {
            Cookie::queue('referral_code', $id, 43200);
            return view('frontend.user_registration_referal');
        }
        return redirect()->route('home');
    }

    public function registrationOtp(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $existingUser = User::where('provider_id', $request->uid)->first();

        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
            return redirect()->route('dashboard');
        } else {
            return view('frontend.user_registration', ['nomor_hp' => $request->nomor_hp, 'uid' => $request->uid]);
        }
    }

    // public function user_login(Request $request)
    // {
    //     $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
    //     if($user != null){
    //         if(Hash::check($request->password, $user->password)){
    //             if($request->has('remember')){
    //                 auth()->login($user, true);
    //             }
    //             else{
    //                 auth()->login($user, false);
    //             }
    //             return redirect()->route('dashboard');
    //         }
    //     }
    //     return back();
    // }

    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if ($user != null) {
            updateCartSetup();
            if (Hash::check($request->password, $user->password)) {
                if ($request->has('remember')) {
                    auth()->login($user, true);
                } else {
                    auth()->login($user, false);
                }
            }
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::user()->user_type == 'seller') {
            return view('frontend.seller.dashboard');
        } elseif (Auth::user()->user_type == 'customer') {
            return view('frontend.customer.dashboard');
        } else {
            abort(404);
        }
    }

    public function profile(Request $request)
    {
        if (Auth::user()->user_type == 'customer') {
            return view('frontend.customer.profile');
        } elseif (Auth::user()->user_type == 'seller') {
            return view('frontend.seller.profile');
        }
    }

    public function address(Request $request)
    {
        return view('frontend.customer.address');
    }

    public function beauty_profile(Request $request)
    {
        return view('frontend.customer.beauty_profile');
    }

    public function user_affiliate(Request $request)
    {
        if (Auth::user()->affiliate_user && Auth::user()->affiliate_user->jenis != 'user') {
            return redirect()->route('new_affiliate_home');
        }
        return view('frontend.customer.user_affiliate');
    }

    public function happy_skin(Request $request)
    {
        return view('frontend.customer.happy_skin');
    }

    public function rewards(Request $request)
    {
        return view('frontend.customer.rewards');
    }

    public function point_history(Request $request)
    {
        return view('frontend.customer.point_history');
    }

    public function customer_update_profile(Request $request)
    {
        $datetime = new \DateTime();
        $user = Auth::user();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->tgl_lahir = $datetime->createFromFormat('m/d/Y H:i:s', $request->tgl_lahir . '00:00:00');

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('photo')) {
            $user->avatar_original = $request->photo->store('uploads/users');
        }

        if ($user->save()) {
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function customer_update_avatar(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('photo')) {
            $user->avatar_original = $request->photo->store('uploads/users');
        }

        if ($user->save()) {
            flash(__('Your Avatar has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();
        // dd(Hash::make($request->old_password));

        if ($request->new_password != null && ($request->new_password == $request->confirm_password) && Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            if ($user->save()) {
                flash(__('Your password has been updated successfully!'))->success();
                return back();
            }
        }
        flash(__('Sorry! Something went wrong. Kata sandi lama salah atau password baru dan konfirmasi sandi tidak cocok'))->error();
        return back();
    }

    public function update_beauty_profile(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->jenis_kulit = $request->jenis_kulit;
        $user->warna_kulit = $request->warna_kulit;
        $user->kondisi_kulit = $request->kondisi_kulit;
        $user->kondisi_rambut = $request->kondisi_rambut;
        $user->preferensi_product = $request->preferensi_produk;
        if ($user->save()) {
            // dd($user);
            if ($user->completed_profile == 0 && isset($user->jenis_kulit) && isset($user->warna_kulit) && isset($user->kondisi_kulit) && isset($user->kondisi_rambut) && isset($user->preferensi_product)) {
                $point_profile = \App\BusinessSetting::where('type', 'club_point_user_profile')->first();
                if ($point_profile != null) {
                    $user->point += (int) $point_profile->value;
                    $user->completed_profile = 1;
                    $user->save();
                    $club_point = new \App\ClubPoint;
                    $club_point->user_id = $user->id;
                    $club_point->points = (int) $point_profile->value;
                    $club_point->keterangan = 'COMPLETED PROFILE POINT';
                    $club_point->save();
                }
            }

            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }
        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }


    public function seller_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('photo')) {
            $user->avatar_original = $request->photo->store('uploads');
        }

        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->bank_payment_status = $request->bank_payment_status;
        $seller->bank_name = $request->bank_name;
        $seller->bank_acc_name = $request->bank_acc_name;
        $seller->bank_acc_no = $request->bank_acc_no;
        $seller->bank_routing_no = $request->bank_routing_no;

        if ($user->save() && $seller->save()) {
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'admin') {
            return redirect('/admin');
        }
        return view('frontend.index');
    }

    public function contact_us()
    {
        return view('frontend.contact_us');
    }

    public function contact_us_email()
    {
        return view('frontend.contact_us_email');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function forum_ruang_detail()
    {
        return view('frontend.forum_ruang_detail');
    }

    public function forum_ruang_detail_selengkapnya()
    {
        return view('frontend.forum_ruang_detail_selengkapnya');
    }

    public function promotion()
    {
        $coupon = Coupon::where('status_code', 'promo')->where('start_date', '<=', strtotime(date('d-m-Y')))->where('end_date', '>=', strtotime(date('d-m-Y')))->orderBy('updated_at', 'desc')->get();
        $coupons = collect($coupon)->chunk(4);
        $coupons_mobile = collect($coupon)->chunk(2);
        // dd($coupons);
        return view('frontend.promotion', compact('coupons', 'coupons_mobile'));
    }

    public function showCouponModal(Request $request)
    {
        $coupon = Coupon::where('id', $request->id)->first();
        return view('frontend.partials.addCoupon', compact('coupon'));
    }

    public function artikel()
    {
        return view('frontend.artikel');
    }

    public function new_affiliate()
    {

        if (Auth::check()) {
            if (isset(Auth::user()->affiliate_user) &&  Auth::user()->affiliate_user == 'user') {
                # code...
                Auth::logout();
            } else if (Auth::user()->affiliate_user != null) {
                # code...
                if (Auth::user()->affiliate_user->jenis == 'company' || Auth::user()->affiliate_user->jenis == 'influencer')
                    return redirect()->route('new_affiliate_home');
            }
        }
        return view('frontend.affiliate');
    }



    public function new_affiliate_home()
    {
        // dd(Auth::user()->affiliate_user);
        if (Auth::check() && Auth::user()->affiliate_user->jenis == 'company' || Auth::user()->affiliate_user->jenis == 'influencer') {
            return view('frontend.affiliate_home');
        } else {
            Auth::logout();
            return view('frontend.affiliate');
        }
    }

    public function consultation()
    {
        return view('frontend.consultation');
    }

    public function consultation_buy()
    {
        return view('frontend.consultation_buy');
    }

    public function consultation_voucher()
    {
        return view('frontend.consultation_voucher');
    }

    public function consultation_start()
    {
        return view('frontend.consultation_start');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function metode_pembayaran()
    {
        return view('frontend.metode_pembayaran');
    }

    public function return_exchange()
    {
        return view('frontend.return_exchange');
    }

    public function delivery()
    {
        return view('frontend.delivery');
    }

    public function syarat_ketentuan()
    {
        return view('frontend.syarat_ketentuan');
    }

    public function kebijakan_privasi()
    {
        return view('frontend.kebijakan_privasi');
    }

    public function about_us()
    {
        return view('frontend.about_us');
    }

    public function sendEmail(Request $request)
    {
        if ($request->title == "") {
            $request->title = "komplain";
        }
        $data = [
            'email' => $request->emailfrom,
            'name' => $request->name,
            'subject' => $request->subject,
            'text' => $request->text
        ];

        // $mailto = GeneralSetting::first()->email;
        $mailto = "csponny.test@gmail.com";

        if (Mail::to($mailto)->send(new contact_us($data))) {
            return "success";
        }
    }

    public function paginate($items, $perPage, $baseUrl, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ?
            $items : Collection::make($items);

        $lap = new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            $options
        );

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
    }

    public function flash_deal_details($slug)
    {
        $flash_deal = FlashDeal::where('slug', $slug)->first();
        if ($flash_deal != null) {
            // @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
            // $product = \App\Product::find($flash_deal_product->product_id);
            $products_flash = collect();
            foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product) {
                $flash_products = \App\Product::find($flash_deal_product->product_id);
                $products_flash->push($flash_products);
            }
            $products = $this->paginate($products_flash, 20, $slug);
            //dd($flash_products);
            return view('frontend.flash_deal_details', compact('flash_deal', 'products'));
        } else {
            abort(404);
        }
    }

    public function load_featured_section()
    {
        return view('frontend.partials.featured_products_section');
    }

    public function load_best_selling_section()
    {
        return view('frontend.partials.best_selling_section');
    }

    public function load_best_sell(Request $request)
    {
        $bs = DB::table("product_best_sell")->first();
        if (isset($bs)) {

            $con = '';
            if ($bs->filter == 1) {
                $con = "id";
            } elseif ($bs->filter == 2) {
                $con = "brand_id";
            } elseif ($bs->filter == 3) {
                $con = "subcategory_id";
            } else {
                $con = "id";
            }

            // dd([$bs->filter,$con]);
            $id = json_decode($bs->filtered);
            $products = Product::where(['published' => 1])->whereIn($con, $id);

            if (isset($request->jenis)) {
                $brand = \App\Brand::select('id')->where('jenis', $request->jenis)->get();
                $products = $products->whereIn('brand_id', $brand);
            }
            $product = filter_products($products->with('brand')->orderBy('num_of_sale', 'desc'))->limit(20)->get();
            $products = collect(collect($product))->chunk(4);
            $products_mobile = collect(collect($product))->chunk(2);
        } else {
            $fd = \App\OrderDetail::select('product_id', DB::raw('COUNT(id) as total_product'))
                ->groupBy('product_id')
                ->havingRaw('count(id) > 0')
                ->pluck("product_id")
                ->toArray();
            $products = Product::where(['published' => 1])->whereIn("id", $fd);
            $product = filter_products($products->with('brand')->orderBy('num_of_sale', 'desc'))->limit(20)->get();
            $products = collect(collect($product))->chunk(4);
            $products_mobile = collect(collect($product))->chunk(2);
        }
        // $test = Product::whereRaw("name regexp '^[A-H]'")->orderBy('name')->get();
        // dd($test);

        return view('frontend.partials.best_sell_section', ['products' => $products, 'products_mobile' => $products_mobile, 'localpride' => 0]);
    }
    public function load_news()
    {
        $product = filter_products(\App\Product::where('published', 1)->with('brand')->orderBy('created_at', 'desc'))->limit(20)->get();

        $products = collect(collect($product))->chunk(4);


        $products_mobile = collect(collect($product))->chunk(2);
        return view('frontend.partials.new_sell_section', ['products' => $products, 'products_mobile' => $products_mobile]);
    }

    public function load_flash_deal()
    {
        $flash_deal = \App\FlashDeal::where('status', 1)->first();
        $products_flash = collect();
        foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product) {
            $flash_products = \App\Product::find($flash_deal_product->product_id);
            $products_flash->push($flash_products);
        }
        // $products = filter_products(\App\Product::where('published', 1)->with('brand'))->get();
        $products = collect(collect($products_flash))->chunk(4);
        $products_mobile = collect(collect($products_flash))->chunk(2);
        // dd($products);
        return view('frontend.partials.flash_deal_section', ['products' => $products], ['products_mobile' => $products_mobile], ['flash_deal' => $flash_deal]);
    }

    public function load_home_categories_section()
    {

        return view('frontend.partials.home_categories_section');
    }

    public function load_best_sellers_section()
    {
        return view('frontend.partials.best_sellers_section');
    }

    public function trackOrder(Request $request)
    {
        if ($request->has('order_code')) {
            $order = Order::where('code', $request->order_code)->first();
            if ($order != null) {
                return view('frontend.track_order', compact('order'));
            }
        }
        return view('frontend.track_order');
    }

    public function trackingOrder(Request $request, $id)
    {
        $order = Order::findOrFail(decrypt($id));
        $resi = $order->confrim_resi;
        $jenis = $order->confrim_courier;
        $param = "waybill=$resi&courier=$jenis";
        $tracking = global_request_raja_ongkir('waybill', 'POST', $param);
        return view('frontend.tracking_order', compact('tracking', 'resi', 'jenis'));
    }

    public function product(Request $request, $slug)
    {
        $detailedProduct  = Product::where('slug', $slug)->first();
        if ($detailedProduct != null && $detailedProduct->published) {
            updateCartSetup();
            if ($request->has('product_referral_code')) {
                Cookie::queue('product_referral_code', $request->product_referral_code, 43200);
                Cookie::queue('referred_product_id', $detailedProduct->id, 43200);
            }
            if ($detailedProduct->digital == 1) {
                return view('frontend.digital_product_details', compact('detailedProduct'));
            } else {
                return view('frontend.product_details', compact('detailedProduct'));
            }
            // return view('frontend.product_details', compact('detailedProduct'));
        }
        abort(404);
    }

    public function shop($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if ($shop != null) {
            $seller = Seller::where('user_id', $shop->user_id)->first();
            if ($seller->verification_status != 0) {
                return view('frontend.seller_shop', compact('shop'));
            } else {
                return view('frontend.seller_shop_without_verification', compact('shop', 'seller'));
            }
        }
        abort(404);
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if ($shop != null && $type != null) {
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        abort(404);
    }

    public function listing(Request $request)
    {
        // $products = filter_products(Product::orderBy('created_at', 'desc'))->paginate(12);
        // return view('frontend.product_listing', compact('products'));
        return $this->search($request);
    }

    public function all_categories(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_category', compact('categories'));
    }

    public function all_brands(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_brand', compact('categories'));
    }

    public function skinlopedia(Request $request)
    {
        return view('frontend.skinklopedia');
    }

    public function local_pride(Request $request)
    {
        $query = $request->q;
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $subcategory_id = (SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if ($category_id != null) {
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if ($subcategory_id != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if ($subsubcategory_id != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if ($seller_id != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);

        if ($min_price != null && $max_price != null) {
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%');
        }

        if ($sort_by != null) {
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if ($request->has('attribute_' . $attribute['id'])) {
                foreach ($request['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($request->has('color')) {
            $str = '"' . $request->color . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $request->color;
        }

        // if (isset($request->top)) {
        $brand = \App\Brand::select('id')->where('jenis', 'local')->get();
        $products = $products->whereIn('brand_id', $brand);
        // }
        // dd($products);

        $products = filter_products($products)->paginate(20)->appends(request()->query());
        $banner = \App\Banner::where('url', "#localpride")->first();
        $banner = asset($banner->photo);

        return view('frontend.local_pride', compact('products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id', 'min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color', 'banner'));
    }

    public function shop_sale(Request $request)
    {
        $query = $request->q;
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $subcategory_id = (SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if ($category_id != null) {
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if ($subcategory_id != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if ($subsubcategory_id != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if ($seller_id != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $preproducts = Product::all();

        $idp = [];
        foreach ($preproducts as $key => $value) {
            $flash_product = \App\FlashDealProduct::select('product_id')->where('product_id', $value->id)->first();
            if ($flash_product != null) {
                $idp = array_merge($idp, [$key => $flash_product["product_id"]]);
            } elseif (home_price($value["id"]) != home_discounted_price($value["id"])) {
                $idp = array_merge($idp, [$key => $value->id]);
            }
        }
        // dd($idp);

        $products = Product::whereIn('id', $idp)->where($conditions);

        // $products = Product::where($conditions);

        if ($min_price != null && $max_price != null) {
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%');
        }

        if ($sort_by != null) {
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if ($request->has('attribute_' . $attribute['id'])) {
                foreach ($request['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($request->has('color')) {
            $str = '"' . $request->color . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $request->color;
        }


        $products = filter_products($products)->paginate(20)->appends(request()->query());
        $shopsale = \App\Banner::where('url', "#shopsale")->get();

        return view('frontend.shop_sale', compact('products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id', 'min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color', 'idp', 'shopsale'));
    }

    public function show_product_upload_form(Request $request)
    {
        $categories = Category::all();
        return view('frontend.seller.product_upload', compact('categories'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.product_edit', compact('categories', 'product'));
    }

    public function seller_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.seller.products', compact('products'));
    }

    public function ajax_search(Request $request)
    {
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%' . $request->search . '%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',', $product->tags) as $key => $tag) {
                if (stripos($tag, $request->search) !== false) {
                    if (sizeof($keywords) > 5) {
                        break;
                    } else {
                        if (!in_array(strtolower($tag), $keywords)) {
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%' . $request->search . '%'))->get()->take(3);

        $subsubcategories = SubSubCategory::where('name', 'like', '%' . $request->search . '%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%' . $request->search . '%')->get()->take(3);

        if (sizeof($keywords) > 0 || sizeof($subsubcategories) > 0 || sizeof($products) > 0 || sizeof($shops) > 0) {
            return view('frontend.partials.search_content', compact('products', 'subsubcategories', 'keywords', 'shops'));
        }
        return '0';
    }

    public function search(Request $request)
    {
        $query = $request->q;
        // dd($query);
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $subcategory_id = (SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;
        $skintype_id = (skinType::where('slug', $request->skintype)->first() != null) ? skinType::where('slug', $request->skintype)->first()->id : null;
        $skinconcern_id = (skinConcern::where('slug', $request->skinconcern)->first() != null) ? skinConcern::where('slug', $request->skinconcern)->first()->id : null;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if ($category_id != null) {
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if ($subcategory_id != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if ($subsubcategory_id != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if ($seller_id != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);

        $idp = [];
        if ($skinconcern_id != null || $skintype_id != null) {
            $con = [];
            if ($skinconcern_id != null) {
                $con = array_merge($con, ['skin_concern_id' => $skinconcern_id]);
            }
            if ($skintype_id != null) {
                $con = array_merge($con, ['skin_type_id' => $skintype_id]);
            }
            $logskin = \App\log_skin::where($con)->with("product")->get();
            foreach ($logskin as $key => $ls) {
                array_push($idp, $ls["product"]['id']);
            }
            $products = Product::whereIn('id', $idp);
        }


        if ($min_price != null && $max_price != null) {
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%');
        }

        if ($sort_by != null) {
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if ($request->has('attribute_' . $attribute['id'])) {
                foreach ($request['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($request->has('color')) {
            $str = '"' . $request->color . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $request->color;
        }


        $products = filter_products($products)->paginate(20)->appends(request()->query());

        // dd($subcategory_id);

        return view('frontend.product_listing', compact('products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id', 'min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color', 'skintype_id', 'skinconcern_id'));
    }

    public function product_content(Request $request)
    {
        $connector  = $request->connector;
        $selector   = $request->selector;
        $select     = $request->select;
        $type       = $request->type;
        productDescCache($connector, $selector, $select, $type);
    }

    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if (in_array($category->id, $request->top_categories)) {
                $category->top = 1;
                $category->save();
            } else {
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if (in_array($brand->id, $request->top_brands)) {
                $brand->top = 1;
                $brand->save();
            } else {
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(__('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if ($request->has('color')) {
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if (json_decode(Product::find($request->id)->choice_options) != null) {
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if ($str != null) {
                    $str .= '-' . str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                } else {
                    $str .= str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                }
            }
        }



        if ($str != null && $product->variant_product) {
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        } else {
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }

        //discount calculation
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if ($flash_deal_product->discount_type == 'percent') {
                    $price -= ($price * $flash_deal_product->discount) / 100;
                } elseif ($flash_deal_product->discount_type == 'amount') {
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        if ($product->tax_type == 'percent') {
            $price += ($price * $product->tax) / 100;
        } elseif ($product->tax_type == 'amount') {
            $price += $product->tax;
        }
        return array('price' => single_price($price * $request->quantity), 'quantity' => $quantity, 'digital' => $product->digital);
    }

    public function sellerpolicy()
    {
        return view("frontend.policies.sellerpolicy");
    }

    public function returnpolicy()
    {
        return view("frontend.policies.returnpolicy");
    }

    public function supportpolicy()
    {
        return view("frontend.policies.supportpolicy");
    }

    public function terms()
    {
        return view("frontend.policies.terms");
    }

    public function privacypolicy()
    {
        return view("frontend.policies.privacypolicy");
    }

    public function get_pick_ip_points(Request $request)
    {
        $pick_up_points = PickupPoint::all();
        return view('frontend.partials.pick_up_points', compact('pick_up_points'));
    }

    public function get_category_items(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return view('frontend.partials.category_elements', compact('category'));
    }

    public function premium_package_index()
    {
        $customer_packages = CustomerPackage::all();
        return view('frontend.partials.customer_packages_lists', compact('customer_packages'));
    }

    public function seller_digital_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.seller.digitalproducts.products', compact('products'));
    }
    public function show_digital_product_upload_form(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
        $categories = Category::where('digital', 1)->get();
        return view('frontend.seller.digitalproducts.product_upload', compact('categories'));
    }

    public function show_digital_product_edit_form(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.digitalproducts.product_edit', compact('categories', 'product'));
    }

    public function manual_transfer(Request $request)
    {
        $tm = DB::table("transfer_manual");

        BusinessSettingsController::overWriteEnvFile('MANUAL_LAIN_BANK', $request->nama_bank);
        BusinessSettingsController::overWriteEnvFile('MANUAL_LAIN_REK', $request->rek_bank);
        BusinessSettingsController::overWriteEnvFile('MANUAL_LAIN_AN', $request->an_bank);

        if ($tm->first() != null) {
            $tm->where('id', $request->id)->update(["step" => $request->step]);
            flash("berhasil update cara manual transfer")->success();
            return redirect()->back();
        } else {
            $tm->insert(["step" => $request->step]);
            flash("berhasil update cara manual transfer")->success();
            return redirect()->back();
        }
    }

    public function admin_promotion(Request $request)
    {
        // dd($request->all());
        // $data = {};
        $data['caption'] = $request->caption;
        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('/img/promotion');
            $data['banner'] = $path;
        }
        DB::table("promotion")->insert($data);
        flash("berhasil menyimpan banner promosi")->success();
        return redirect()->back();
    }

    public function gbpromosi(Request $request)
    {
        // dd($request->all());
        $gbpromosi = DB::table('banners');
        $photo = $gbpromosi->where('url', '#promosi')->first();
        // dd($gbpromosi);
        if ($request->hasFile('photo')) {
            if ($photo != null) {
                $path = public_path() . '/' . $photo->photo;
                $banner['photo'] = $request->photo->store('uploads/banners');
                $gbpromosi->where('url', '#promosi')->update($banner);
                unlink($path);
                flash(__('Banner has been updated successfully'))->success();
            } else {
                $banner['photo'] = $request->photo->store('uploads/banners');
                $banner['url'] = "#promosi";
                $banner['position'] = 1;
                $gbpromosi->insert($banner);
                flash(__('Banner has been inserted successfully'))->success();
            }
        }
        return redirect()->back();
    }

    public function edit_promotion(Request $request)
    {
        # code...
    }

    public function delete_promotion($id)
    {
        # code...
    }

    public function get_promotion()
    {
        # code...
    }

    public function email_order()
    {
        return view('emails.pesanan_diterima', ['order_id' => 20]);
    }
}
