<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//demo
Route::get('/demo/cron_1', 'DemoController@cron_1');
Route::get('/demo/cron_2', 'DemoController@cron_2');

Route::get('/email_order', 'HomeController@email_order');

Auth::routes(['verify' => true]);
// Route::match(['get'], '/login', function(){
//     return redirect('/');
// });
// Route::get('/login', function () {
//     return redirect('/');
// });
Route::get('login', array('as' => 'login', function () {
	return redirect('/');
}));

Route::get('home', ['as' => 'home', function () {
	if (Auth::check() && Auth::user()->user_type == 'admin') {
		return redirect('/admin');
	}
	return redirect('/');
}]);
Route::get('/referral/{id}', 'HomeController@referalregister')->name('referal.register');

Route::post('login_admin', '\App\Http\Controllers\Auth\LoginController@login_admin')->name('login.admin');
Route::get(env('URL_ADMIN'), '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name(env('URL_ADMIN'));
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');
Route::post('/verify_captcha', '\App\Http\Controllers\Auth\LoginController@handleCaptcha')->name('verify_captcha');

Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
Route::get('/users/login', 'HomeController@login')->name('user.login');
Route::get('/users/registration', 'HomeController@registration')->name('user.registration');
Route::get('/users/registrationOtp', 'HomeController@registrationOtp')->name('user.registration.otp');
Route::post('/user/registrationOtp', 'Auth\LoginController@handleProviderCallbackOtp')->name('otp.register');

//Route::post('/users/login', 'HomeController@user_login')->name('user.login.submit');
Route::post('/users/login/cart', 'HomeController@cart_login')->name('cart.login.submit');

Route::post('/subcategories/get_subcategories_by_category', 'SubCategoryController@get_subcategories_by_category')->name('subcategories.get_subcategories_by_category');
Route::post('/subsubcategories/get_subsubcategories_by_subcategory', 'SubSubCategoryController@get_subsubcategories_by_subcategory')->name('subsubcategories.get_subsubcategories_by_subcategory');
Route::post('/subsubcategories/get_brands_by_subsubcategory', 'SubSubCategoryController@get_brands_by_subsubcategory')->name('subsubcategories.get_brands_by_subsubcategory');
Route::post('/subsubcategories/get_attributes_by_subsubcategory', 'SubSubCategoryController@get_attributes_by_subsubcategory')->name('subsubcategories.get_attributes_by_subsubcategory');

//Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact-us', 'HomeController@contact_us')->name('contact_us');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/metode-pembayaran', 'HomeController@metode_pembayaran')->name('metode_pembayaran');
Route::get('/return-exchange', 'HomeController@return_exchange')->name('return_exchange');
Route::get('/delivery', 'HomeController@delivery')->name('delivery');
Route::get('/syarat-ketentuan', 'HomeController@syarat_ketentuan')->name('syarat_ketentuan');
Route::get('/kebijakan-privasi', 'HomeController@kebijakan_privasi')->name('kebijakan_privasi');
Route::get('/about-us', 'HomeController@about_us')->name('about_us');
Route::get('/contact-us-email', 'HomeController@contact_us_email')->name('contact_us_email');
Route::get('/new-affiliate', 'HomeController@new_affiliate')->name('new_affiliate');
Route::get('/new-affiliate/home', 'HomeController@new_affiliate_home')->name('new_affiliate_home');
Route::get('/consultation', 'HomeController@consultation')->name('consultation');
Route::get('/consultation/buy', 'HomeController@consultation_buy')->name('consultation_buy');
Route::get('/consultation/voucher', 'HomeController@consultation_voucher')->name('consultation_voucher');
Route::get('/consultation/start', 'HomeController@consultation_start')->name('consultation_start');
Route::post('/sendEmail', 'HomeController@sendEmail')->name('sendEmail');

Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/all/{all}/blog', 'BlogController@index')->name('all.blog');
Route::get('/filter/{id}/{other}/blog', 'BlogController@filter')->name('filter.blog');
Route::get('/blog/artikel/{id}', 'BlogController@show')->name('artikel');
Route::get('/blog-section', 'BlogController@landingpage')->name('blog.section');

Route::get('/forum', function () {
	return view("frontend.forum");
})->name('forum');
Route::get('/post-forum', 'ForumController@index')->name('forum.posts');
Route::get('/forum-room/{filter}/{sortby}/{myroom}/{query}', 'ForumController@getfilteredRoom')->name('forum.rooms.filter');
Route::get('/forum/room/{id}', 'ForumController@getRoom')->name('forum.rooms.id');
Route::post('/forum/reply', 'ForumController@reply_forum')->name('reply.forum');
Route::post('/forum/create-post', 'ForumController@create_post')->name('create.post');

Route::get('/forum/reply/all/{id}', 'ForumController@fetch_reply')->name('fetch.replys');
Route::get('/forum/post/{id}', 'ForumController@fetch_post')->name('fetch.post');
Route::get('/forum/refetch/posts/{id}/{query}', 'ForumController@getPosts')->name('refetch.post');
Route::get('/forum/post/{id}/{room_id}/related', 'ForumController@related_post')->name('fetch.related.post');
Route::post('/forum/like/post', 'ForumController@post_like')->name('like.post');
Route::post('/forum/unlike/post', 'ForumController@unlike')->name('unlike.post');

Route::post('/forum/like/comment', 'ForumController@comment_like')->name('like.comment');
Route::post('/forum/unlike/comment', 'ForumController@comment_unlike')->name('unlike.comment');
Route::post('/forum/add/comment', 'ForumController@add_comment_reply')->name('add.c.reply');
Route::get("/forum/get/reply/{id}", "ForumController@getReply")->name("getReply");
Route::post("/forum/join/ruang", "ForumController@join_room")->name("join.room");

Route::get("forum/popular-topics", "ForumController@popular_topics")->name("topics.popular");

Route::post("/recom-product-balasan", "ForumController@product_recom")->name("recom.product");
Route::post("/forum/leave/ruang", "ForumController@leave_room")->name("leave.room");
Route::get('/forum/ruang-saya', 'ForumController@myroom')->name('forum.myroom');
Route::get('/forum/sort-room/{s}', 'ForumController@sortroom')->name('forum.sortRoom');
Route::get('/forum/ruang', 'HomeController@forum_ruang')->name('forum_ruang');
Route::get('/forum/detail', 'HomeController@forum_ruang_detail')->name('forum_ruang_detail');
Route::get('/forum/ruang/detail/{id}', 'ForumController@get_post')->name('forum.detail');



Route::get('/promotion', 'HomeController@promotion')->name('promotion');

Route::post('/home/section/featured', 'HomeController@load_featured_section')->name('home.section.featured');
Route::post('/home/section/best_selling', 'HomeController@load_best_selling_section')->name('home.section.best_selling');
Route::post('/home/section/best_sell', 'HomeController@load_best_sell');
Route::get("/home/section/phoebe_choice", "PhoebeChoiceController@load_pc")->name("lpc");
Route::post('/home/section/news_sell', 'HomeController@load_news');
Route::post('/home/section/flash_deal', 'HomeController@load_flash_deal');

Route::post('/home/section/home_categories', 'HomeController@load_home_categories_section')->name('home.section.home_categories');
Route::post('/home/section/best_sellers', 'HomeController@load_best_sellers_section')->name('home.section.best_sellers');
//category dropdown menu ajax call
Route::post('/category/nav-element-list', 'HomeController@get_category_items')->name('category.elements');

//Flash Deal Details Page
Route::get('/flash-deal/{slug}', 'HomeController@flash_deal_details')->name('flash-deal-details');

Route::get('/sitemap.xml', function () {
	return base_path('sitemap.xml');
});


Route::get('/customer-products', 'CustomerProductController@customer_products_listing')->name('customer.products');
Route::get('/customer-products?subsubcategory={subsubcategory_slug}', 'CustomerProductController@search')->name('customer_products.subsubcategory');
Route::get('/customer-products?subcategory={subcategory_slug}', 'CustomerProductController@search')->name('customer_products.subcategory');
Route::get('/customer-products?category={category_slug}', 'CustomerProductController@search')->name('customer_products.category');
Route::get('/customer-products?city={city_id}', 'CustomerProductController@search')->name('customer_products.city');
Route::get('/customer-products?q={search}', 'CustomerProductController@search')->name('customer_products.search');
Route::get('/customer-product/{slug}', 'CustomerProductController@customer_product')->name('customer.product');
Route::get('/customer-packages', 'HomeController@premium_package_index')->name('customer_packages_list_show');

Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/products', 'HomeController@listing')->name('products');
Route::get('/search?category={category_slug}', 'HomeController@search')->name('products.category');
Route::get('/search?subcategory={subcategory_slug}', 'HomeController@search')->name('products.subcategory');
Route::get('/search?subsubcategory={subsubcategory_slug}', 'HomeController@search')->name('products.subsubcategory');
Route::get('/search?skinconcern={skinconcern_slug}', 'HomeController@search')->name('products.skinconcern');
Route::get('/search?skintype={skintype_slug}', 'HomeController@search')->name('products.skintype');
Route::post('/product/variant_price', 'HomeController@variant_price')->name('products.variant_price');
Route::get('/shops/visit/{slug}', 'HomeController@shop')->name('shop.visit');
Route::get('/shops/visit/{slug}/{type}', 'HomeController@filter_shop')->name('shop.visit.type');
Route::get('/product/subsubcategory/{subcategory}', 'SubSubCategoryController@sidenavskincare')->name('product.sidenavskincare');

Route::get('/search?brand={brand_slug}', 'HomeController@search')->name('products.brand');
Route::get("/show-all/brands", 'BrandController@showAll')->name('show.all.brand');
Route::post("/filter-product", 'ProductController@filter_product')->name('filter.product');
Route::get('/product/brand/{hp}/{hk}', 'BrandController@sidenavbrand')->name('product.sidenavbrand');


Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/nav-cart-items', 'CartController@updateNavCart')->name('cart.nav_cart');
Route::post('/cart/show-cart-modal', 'CartController@showCartModal')->name('cart.showCartModal');
Route::post('/cart/show-bag-modal', 'CartController@showBagModal')->name('cart.showBagModal');
Route::post('/cart/addtocart', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/cart/{id}/addtocart-all', 'CartController@addToCartAll')->name('cart.addToCartAll');
Route::post('/cart/removeFromCart', 'CartController@removeFromCart')->name('cart.removeFromCart');
Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.updateQuantity');
Route::post('/cart/updateSummary', 'CartController@updateSummary')->name('cart.updateSummary');
Route::post('/cart/addSample', 'CartController@addSampleToCard')->name('cart.addSample');
Route::post('/cart/removeSampleFromCart', 'CartController@removeSampleFromCart')->name('cart.removeSampleFromCart');
Route::post('/cart/updateQuantitydropdown', 'CartController@updateQuantitydropdown')->name('cart.updateQuantitydropdown');
Route::post('/cart/addProductPointToCard', 'CartController@addProductPointToCard')->name('cart.addProductPointToCard');
Route::post('/cart/removeSampleFromTukarPoin', 'CartController@removeSampleFromTukarPoin')->name('cart.removeSampleFromTukarPoin');
Route::post('/cart/redeemPoint', 'CartController@redeemPoint')->name('cart.redeemPoint');


//Checkout Routes
Route::group(['middleware' => ['checkout']], function () {
	Route::get('/checkout', 'CheckoutController@get_shipping_info')->name('checkout.shipping_info');
	Route::any('/checkout/delivery_info', 'CheckoutController@store_shipping_info')->name('checkout.store_shipping_infostore');
	Route::post('/checkout/payment_select', 'CheckoutController@store_delivery_info')->name('checkout.store_delivery_info');
	Route::get('/checkout/credit_card', 'CheckoutController@credit_card')->name('checkout.credit_card');
});

Route::get('/checkout/order-confirmed/{id}', 'CheckoutController@order_confirmed')->name('order_confirmed');
Route::get('/checkout/confirmation-payment/{id}', 'CheckoutController@confirmation_payment')->name('confirmation_payment');
Route::get('/checkout/thank-you', 'CheckoutController@thank_you')->name('thank_you');
Route::post('/checkout/payment', 'CheckoutController@checkout')->name('payment.checkout');
Route::post('/get_pick_ip_points', 'HomeController@get_pick_ip_points')->name('shipping_info.get_pick_ip_points');
Route::post('/checkout/payment_select', 'CheckoutController@get_payment_info')->name('checkout.payment_info');
Route::post('/checkout/apply_coupon_code', 'CheckoutController@apply_coupon_code')->name('checkout.apply_coupon_code');
Route::post('/checkout/remove_coupon_code', 'CheckoutController@remove_coupon_code')->name('checkout.remove_coupon_code');

Route::post('/coupon/show-coupon-modal', 'HomeController@showCouponModal')->name('cart.showCouponModal');

//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END

// SSLCOMMERZ Start
Route::get('/sslcommerz/pay', 'PublicSslCommerzPaymentController@index');
Route::POST('/sslcommerz/success', 'PublicSslCommerzPaymentController@success');
Route::POST('/sslcommerz/fail', 'PublicSslCommerzPaymentController@fail');
Route::POST('/sslcommerz/cancel', 'PublicSslCommerzPaymentController@cancel');
Route::POST('/sslcommerz/ipn', 'PublicSslCommerzPaymentController@ipn');
//SSLCOMMERZ END

//Stipe Start
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
//Stripe END

Route::get('/compare', 'CompareController@index')->name('compare');
Route::get('/compare/reset', 'CompareController@reset')->name('compare.reset');
Route::post('/compare/addToCompare', 'CompareController@addToCompare')->name('compare.addToCompare');

Route::resource('subscribers', 'SubscriberController');

Route::get('/brands', 'HomeController@all_brands')->name('brands.all');
// Route::get('/skinlopedia', 'HomeController@skinlopedia')->name('skinklopedia');
Route::get('/local-pride', 'HomeController@local_pride')->name('local_pride');
Route::get('/shop-sale', 'HomeController@shop_sale')->name('shop_sale');
Route::get('/categories', 'HomeController@all_categories')->name('categories.all');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search?q={search}', 'HomeController@search')->name('suggestion.search');
Route::post('/ajax-search', 'HomeController@ajax_search')->name('search.ajax');
Route::post('/config_content', 'HomeController@product_content')->name('configs.update_status');

Route::get('/sellerpolicy', 'HomeController@sellerpolicy')->name('sellerpolicy');
Route::get('/returnpolicy', 'HomeController@returnpolicy')->name('returnpolicy');
Route::get('/supportpolicy', 'HomeController@supportpolicy')->name('supportpolicy');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacypolicy', 'HomeController@privacypolicy')->name('privacypolicy');

Route::group(['middleware' => ['user', 'verified']], function () {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::get('/profile', 'HomeController@profile')->name('profile');
	Route::get('/address', 'HomeController@address')->name('address');
	Route::get('/beauty-profile', 'HomeController@beauty_profile')->name('beauty_profile');
	Route::get('/user-affiliate', 'HomeController@user_affiliate')->name('user_affiliate');
	Route::get('/happy-skin', 'HomeController@happy_skin')->name('happy_skin');
	Route::get('/rewards', 'HomeController@rewards')->name('rewards');
	Route::get('/point-history', 'HomeController@point_history')->name('point_history');
	Route::get('/review', 'ReviewController@review')->name('reviews.review');
	Route::post('/customer/update-profile', 'HomeController@customer_update_profile')->name('customer.profile.update');
	Route::post('/seller/update-profile', 'HomeController@seller_update_profile')->name('seller.profile.update');
	Route::post('/customer/update-avatar', 'HomeController@customer_update_avatar')->name('customer.update_avatar');
	Route::post('/customer/update-password', 'HomeController@update_password')->name('customer.update_password');
	Route::post('/customer/update-beaute', 'HomeController@update_beauty_profile')->name('customer.update_beauty_profile');

	Route::resource('purchase_history', 'PurchaseHistoryController');
	Route::post('/purchase_history/details', 'PurchaseHistoryController@purchase_history_details')->name('purchase_history.details');
	Route::get('/purchase_history/destroy/{id}', 'PurchaseHistoryController@destroy')->name('purchase_history.destroy');

	Route::resource('/wishlists', 'WishlistController');
	Route::post('/wishlists/remove', 'WishlistController@remove')->name('wishlists.remove');
	Route::post('/wishlists/destroy', 'WishlistController@destroy')->name('wishlists.destroy');

	Route::get('/wallet', 'WalletController@index')->name('wallet.index');
	Route::post('/recharge', 'WalletController@recharge')->name('wallet.recharge');

	Route::resource('support_ticket', 'SupportTicketController');
	Route::post('support_ticket/reply', 'SupportTicketController@seller_store')->name('support_ticket.seller_store');

	Route::post('/customer_packages/purchase', 'CustomerPackageController@purchase_package')->name('purchase_package');
	Route::resource('customer_products', 'CustomerProductController');
	Route::post('/customer_products/published', 'CustomerProductController@updatePublished')->name('customer_products.published');
	Route::post('/customer_products/status', 'CustomerProductController@updateStatus')->name('customer_products.update.status');

	Route::get('digital_purchase_history', 'PurchaseHistoryController@digital_index')->name('digital_purchase_history.index');
});

Route::get('/customer_products/destroy/{id}', 'CustomerProductController@destroy')->name('customer_products.destroy');

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'verified']], function () {
	Route::get('/products', 'HomeController@seller_product_list')->name('seller.products');
	Route::get('/product/upload', 'HomeController@show_product_upload_form')->name('seller.products.upload');
	Route::get('/product/{id}/edit', 'HomeController@show_product_edit_form')->name('seller.products.edit');
	Route::resource('payments', 'PaymentController');

	Route::get('/shop/apply_for_verification', 'ShopController@verify_form')->name('shop.verify');
	Route::post('/shop/apply_for_verification', 'ShopController@verify_form_store')->name('shop.verify.store');

	Route::get('/reviews', 'ReviewController@seller_reviews')->name('reviews.seller');


	//digital Product
	Route::get('/digitalproducts', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts');
	Route::get('/digitalproducts/upload', 'HomeController@show_digital_product_upload_form')->name('seller.digitalproducts.upload');
	Route::get('/digitalproducts/{id}/edit', 'HomeController@show_digital_product_edit_form')->name('seller.digitalproducts.edit');
});

Route::group(['middleware' => ['auth']], function () {
	Route::post('/products/store/', 'ProductController@store')->name('products.store');
	Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
	Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
	Route::get('/products/duplicate/{id}', 'ProductController@duplicate')->name('products.duplicate');
	Route::post('/products/sku_combination', 'ProductController@sku_combination')->name('products.sku_combination');
	Route::post('/products/sku_combination_edit', 'ProductController@sku_combination_edit')->name('products.sku_combination_edit');
	Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
	Route::post('/products/published', 'ProductController@updatePublished')->name('products.published');
	Route::post('/products/detailFordata', 'PointproductController@detailProduct');
	Route::get('/products/rekom', 'ProductRekomendasiController@getProduct')->name("produk.rekom");

	Route::get('/sample', 'SampleController@index')->name('sample');
	Route::get('/sample/create', 'SampleController@create')->name('sample.create');
	Route::post('/sample/store', 'SampleController@store')->name('sample.store');
	Route::post('/sample/published', 'SampleController@updatePublished')->name('sample.published');
	Route::get('/sample/destroy/{id}', 'SampleController@destroy')->name('sample.destroy');
	Route::get('/sample/edit/{id}', 'SampleController@edit')->name('sample.edit');
	Route::post('/sample/update/{id}', 'SampleController@update')->name('sample.update');

	Route::get('/pointproduct', 'PointproductController@index')->name('pointproduct');
	Route::get('/pointproduct/create', 'PointproductController@create')->name('pointproduct.create');
	Route::post('/pointproduct/store', 'PointproductController@store')->name('pointproduct.store');
	Route::get('/pointproduct/edit/{id}', 'PointproductController@edit')->name('pointproduct.edit');
	Route::post('/pointproduct/update/{id}', 'PointproductController@update')->name('pointproduct.update');
	Route::post('/pointproduct/published', 'PointproductController@updatePublished')->name('pointproduct.published');
	Route::get('/pointproduct/destroy/{id}', 'PointproductController@destroy')->name('pointproduct.destroy');

	Route::get('invoice/customer/{order_id}', 'InvoiceController@customer_invoice_download')->name('customer.invoice.download');
	Route::get('invoice/seller/{order_id}', 'InvoiceController@seller_invoice_download')->name('seller.invoice.download');

	// Route::resource('orders','OrderController');
	Route::get('/orders/index', 'HomeController@index')->name('orders.index');
	Route::post('/orders/store', 'OrderController@store');
	Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
	Route::post('/orders/details', 'OrderController@order_details')->name('orders.details');
	Route::post('/orders/update_delivery_status', 'OrderController@update_delivery_status')->name('orders.update_delivery_status');
	Route::post('/orders/update_payment_status', 'OrderController@update_payment_status')->name('orders.update_payment_status');
	Route::post('/orders/confrim_courier', 'OrderController@confrim_courier')->name('order.confrim_courier');
	Route::get('/orders/qr/{id}', 'OrderController@showQr')->name('order.qr');
	Route::post('/orders/confrim_user', 'OrderController@confrim_order_complete')->name('order.complete');
	Route::post('/orders/upload_bayar', 'OrderController@upload_bayar')->name('order.upload_pembayaran');

	Route::get('/setting/ongkir', 'BusinessSettingsController@gratis_ongkir')->name('setting.ongkir');

	Route::resource('/reviews', 'ReviewController');

	Route::resource('/withdraw_requests', 'SellerWithdrawRequestController');
	Route::get('/withdraw_requests_all', 'SellerWithdrawRequestController@request_index')->name('withdraw_requests_all');
	Route::post('/withdraw_request/payment_modal', 'SellerWithdrawRequestController@payment_modal')->name('withdraw_request.payment_modal');
	Route::post('/withdraw_request/message_modal', 'SellerWithdrawRequestController@message_modal')->name('withdraw_request.message_modal');

	Route::resource('conversations', 'ConversationController');
	Route::post('conversations/refresh', 'ConversationController@refresh')->name('conversations.refresh');
	Route::resource('messages', 'MessageController');

	//Product Bulk Upload
	Route::get('/product-bulk-upload/index', 'ProductBulkUploadController@index')->name('product_bulk_upload.index');
	Route::post('/bulk-product-upload', 'ProductBulkUploadController@bulk_upload')->name('bulk_product_upload');
	Route::get('/product-csv-download/{type}', 'ProductBulkUploadController@import_product')->name('product_csv.download');
	Route::get('/vendor-product-csv-download/{id}', 'ProductBulkUploadController@import_vendor_product')->name('import_vendor_product.download');
	Route::group(['prefix' => 'bulk-upload/download'], function () {
		Route::get('/category', 'ProductBulkUploadController@pdf_download_category')->name('pdf.download_category');
		Route::get('/sub_category', 'ProductBulkUploadController@pdf_download_sub_category')->name('pdf.download_sub_category');
		Route::get('/sub_sub_category', 'ProductBulkUploadController@pdf_download_sub_sub_category')->name('pdf.download_sub_sub_category');
		Route::get('/brand', 'ProductBulkUploadController@pdf_download_brand')->name('pdf.download_brand');
		Route::get('/seller', 'ProductBulkUploadController@pdf_download_seller')->name('pdf.download_seller');
	});

	//Product Export
	Route::get('/product-bulk-export', 'ProductBulkUploadController@export')->name('product_bulk_export.index');

	Route::resource('digitalproducts', 'DigitalProductController');
	Route::get('/digitalproducts/destroy/{id}', 'DigitalProductController@destroy')->name('digitalproducts.destroy');
	Route::get('/digitalproducts/download/{id}', 'DigitalProductController@download')->name('digitalproducts.download');

	Route::get('/forum-notif-email/{postid}', 'ForumController@adduserNotif')->name("forum.notif.email");
});

Route::resource('shops', 'ShopController');
Route::get('/track_your_order', 'HomeController@trackOrder')->name('orders.track');
Route::get('/tracking-order/{id}', 'HomeController@trackingOrder')->name('orders.tracking');

Route::get('/instamojo/payment/pay-success', 'InstamojoController@success')->name('instamojo.success');

Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');

Route::get('/paystack/payment/callback', 'PaystackController@handleGatewayCallback');


Route::get('/vogue-pay', 'VoguePayController@showForm');
Route::get('/vogue-pay/success/{id}', 'VoguePayController@paymentSuccess');
Route::get('/vogue-pay/failure/{id}', 'VoguePayController@paymentFailure');

Route::get('/login-otp', 'HomeController@login_otp');
Route::post('/existinguser', 'HomeController@is_user')->name('existinguser');


Route::get('/get_provinsi', 'CustomerAddressController@getDataProvisi')->name("rajaongkir.provinsi");
Route::get('/get_kabupaten', 'CustomerAddressController@getDataKabupaten')->name("rajaongkir.kabupaten");
Route::get('/get_kecamatan', 'CustomerAddressController@getDataKecamatan')->name("rajaongkir.kecamatan");
Route::post('/get_detai_city', 'CustomerAddressController@getCityDetail')->name("rajaongkir.detail");
Route::post('/addres/store', 'CustomerAddressController@store')->name('addres.store');
Route::post('/cost', "CustomerAddressController@getCostDestination")->name('rajaongkir.cost');
Route::post('/shiping_summary', 'CustomerAddressController@shiping_summary')->name('shiping.summary');
Route::get('/addres/destroy', 'CustomerAddressController@destroy')->name('addres.destroy');
Route::post('/save-fbtoken', 'CustomerController@saveTokenToSession');

Route::get('/komplain', 'OrderKomplainController@index')->name('komplain.show');
Route::post('/komplain-create', 'OrderKomplainController@create')->name('komplain.create');
Route::post('/revies-show', 'ReviewController@reviewShow')->name('reviews.show');
Route::post('/komplain-detail', 'OrderKomplainController@komplain_view')->name('komplain.form');
Route::get('/komplain/{id}', 'OrderKomplainController@show')->name('komplain.detail');
Route::post('/komplain-status/{id}', 'OrderKomplainController@setStatusKomplain')->name('komplain.status');
Route::post('/komplain-resi', 'OrderKomplainController@userResiKomplain')->name('komplain.resi');
Route::post('/komplain-selesai', 'OrderKomplainController@setSelesaiKomplain')->name('komplain.selesai');

Route::get('/banner/localpride', 'BannerController@bannerlocalpride')->name("banner.localpride");

Route::get('/user-membership', 'MembershipController@page_user')->name("membership");
Route::get("/userlog-membership", "MembershipController@update_user_log");
Route::get("/getOrderU", "MembershipController@getMember")->name('get.order.u');
Route::post("/partial_review", "ReviewController@partialReview")->name('partial.review');

Route::get("/skinlopedia", "skinlopediaController@getSkinlo")->name("skinklopedia");
Route::get('/skinlopedia/fetch_data', 'skinlopediaController@fetch_data')->name("fetch_sl");
Route::get("/skinlopedia/search/{keyword}", "skinlopediaController@search")->name("search.sl");
Route::get("/skinlopedia/{filt}/filter", "skinlopediaController@filter")->name("filt.sl");

Route::get("/test-agora", "AgoraController@index");
Route::get("/test-agora-show", "AgoraController@show");

Route::get("/siaran-index", "SiaranController@index")->name("siaran");
