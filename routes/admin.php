<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', 'HomeController@admin_dashboard')->name('admin.dashboard')->middleware(['auth', 'admin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
	Route::resource('categories', 'CategoryController');
	Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
	Route::post('/categories/featured', 'CategoryController@updateFeatured')->name('categories.featured');

	Route::resource('subcategories', 'SubCategoryController');
	Route::get('/subcategories/destroy/{id}', 'SubCategoryController@destroy')->name('subcategories.destroy');

	Route::resource('subsubcategories', 'SubSubCategoryController');
	Route::get('/subsubcategories/destroy/{id}', 'SubSubCategoryController@destroy')->name('subsubcategories.destroy');

	Route::resource('brands', 'BrandController');
	Route::get('/brands/destroy/{id}', 'BrandController@destroy')->name('brands.destroy');

	Route::resource('skin', 'skinTypeConcernController');
	Route::get('/skintype/create', 'skinTypeConcernController@createskintype')->name('skinType.create');
	Route::get('/skinconcern/create', 'skinTypeConcernController@createskinconcern')->name('skinConcern.create');

	Route::get('/products/admin', 'ProductController@admin_products')->name('products.admin');
	Route::get('/products/seller', 'ProductController@seller_products')->name('products.seller');
	Route::get('/products/create', 'ProductController@create')->name('products.create');
	Route::get('/products/admin/{id}/edit', 'ProductController@admin_product_edit')->name('products.admin.edit');
	Route::get('/products/seller/{id}/edit', 'ProductController@seller_product_edit')->name('products.seller.edit');
	Route::post('/products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
	Route::post('/products/get_products_by_subsubcategory', 'ProductController@get_products_by_subsubcategory')->name('products.get_products_by_subsubcategory');

	Route::get("/product/phoebechoice", function () {
		return view("products.phoebe_choice");
	})->name("admin.phoebechoice");
	Route::get("/product/get/phoebechoice", "PhoebeChoiceController@index")->name("admin.get_phoebechoice");
	Route::post("/product/add/phoebechoice", "PhoebeChoiceController@store")->name("admin.add_phoebechoice");
	Route::get("/product/delete/phoebechoice/{id}", "PhoebeChoiceController@destroy")->name("admin.del_phebechoice");
	// Route::get("/membership", function (){ return view("membership.index"); })->name("membership.index");

	Route::resource('sellers', 'SellerController');
	Route::get('/sellers/destroy/{id}', 'SellerController@destroy')->name('sellers.destroy');
	Route::get('/sellers/view/{id}/verification', 'SellerController@show_verification_request')->name('sellers.show_verification_request');
	Route::get('/sellers/approve/{id}', 'SellerController@approve_seller')->name('sellers.approve');
	Route::get('/sellers/reject/{id}', 'SellerController@reject_seller')->name('sellers.reject');
	Route::post('/sellers/payment_modal', 'SellerController@payment_modal')->name('sellers.payment_modal');
	Route::get('/seller/payments', 'PaymentController@payment_histories')->name('sellers.payment_histories');
	Route::get('/seller/payments/show/{id}', 'PaymentController@show')->name('sellers.payment_history');

	Route::resource('customers', 'CustomerController');
	Route::get('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');

	Route::get('/newsletter', 'NewsletterController@index')->name('newsletters.index');
	Route::post('/newsletter/send', 'NewsletterController@send')->name('newsletters.send');

	Route::resource('profile', 'ProfileController');

	Route::post('/business-settings/update', 'BusinessSettingsController@update')->name('business_settings.update');
	Route::post('/business-settings/update/activation', 'BusinessSettingsController@updateActivationSettings')->name('business_settings.update.activation');
	Route::get('/activation', 'BusinessSettingsController@activation')->name('activation.index');
	Route::get('/payment-method', 'BusinessSettingsController@payment_method')->name('payment_method.index');
	Route::get('/social-login', 'BusinessSettingsController@social_login')->name('social_login.index');
	Route::get('/smtp-settings', 'BusinessSettingsController@smtp_settings')->name('smtp_settings.index');
	Route::get('/google-analytics', 'BusinessSettingsController@google_analytics')->name('google_analytics.index');
	Route::get('/facebook-chat', 'BusinessSettingsController@facebook_chat')->name('facebook_chat.index');
	Route::post('/env_key_update', 'BusinessSettingsController@env_key_update')->name('env_key_update.update');
	Route::post('/payment_method_update', 'BusinessSettingsController@payment_method_update')->name('payment_method.update');
	Route::post('/google_analytics', 'BusinessSettingsController@google_analytics_update')->name('google_analytics.update');
	Route::post('/facebook_chat', 'BusinessSettingsController@facebook_chat_update')->name('facebook_chat.update');
	Route::post('/facebook_pixel', 'BusinessSettingsController@facebook_pixel_update')->name('facebook_pixel.update');
	Route::get('/currency', 'CurrencyController@currency')->name('currency.index');
	Route::post('/currency/update', 'CurrencyController@updateCurrency')->name('currency.update');
	Route::post('/your-currency/update', 'CurrencyController@updateYourCurrency')->name('your_currency.update');
	Route::get('/currency/create', 'CurrencyController@create')->name('currency.create');
	Route::post('/currency/store', 'CurrencyController@store')->name('currency.store');
	Route::post('/currency/currency_edit', 'CurrencyController@edit')->name('currency.edit');
	Route::post('/currency/update_status', 'CurrencyController@update_status')->name('currency.update_status');
	Route::get('/verification/form', 'BusinessSettingsController@seller_verification_form')->name('seller_verification_form.index');
	Route::post('/verification/form', 'BusinessSettingsController@seller_verification_form_update')->name('seller_verification_form.update');
	Route::get('/vendor_commission', 'BusinessSettingsController@vendor_commission')->name('business_settings.vendor_commission');
	Route::post('/vendor_commission_update', 'BusinessSettingsController@vendor_commission_update')->name('business_settings.vendor_commission.update');

	Route::resource('/languages', 'LanguageController');
	Route::post('/languages/update_rtl_status', 'LanguageController@update_rtl_status')->name('languages.update_rtl_status');
	Route::get('/languages/destroy/{id}', 'LanguageController@destroy')->name('languages.destroy');
	Route::get('/languages/{id}/edit', 'LanguageController@edit')->name('languages.edit');
	Route::post('/languages/{id}/update', 'LanguageController@update')->name('languages.update');
	Route::post('/languages/key_value_store', 'LanguageController@key_value_store')->name('languages.key_value_store');

	Route::get('/frontend_settings/home', 'HomeController@home_settings')->name('home_settings.index');
	Route::post('/frontend_settings/home/top_10', 'HomeController@top_10_settings')->name('top_10_settings.store');
	Route::get('/sellerpolicy/{type}', 'PolicyController@index')->name('sellerpolicy.index');
	Route::get('/returnpolicy/{type}', 'PolicyController@index')->name('returnpolicy.index');
	Route::get('/supportpolicy/{type}', 'PolicyController@index')->name('supportpolicy.index');
	Route::get('/terms/{type}', 'PolicyController@index')->name('terms.index');
	Route::get('/privacypolicy/{type}', 'PolicyController@index')->name('privacypolicy.index');

	//Policy Controller
	Route::post('/policies/store', 'PolicyController@store')->name('policies.store');

	Route::group(['prefix' => 'frontend_settings'], function () {
		Route::resource('sliders', 'SliderController');
		Route::get('/sliders/destroy/{id}', 'SliderController@destroy')->name('sliders.destroy');

		Route::resource('home_banners', 'BannerController');
		Route::get('/home_banners/create/{position}', 'BannerController@create')->name('home_banners.create');
		Route::post('/home_banners/update_status', 'BannerController@update_status')->name('home_banners.update_status');
		Route::get('/home_banners/destroy/{id}', 'BannerController@destroy')->name('home_banners.destroy');
		Route::post("/home_banners/add/faq", "BannerController@banner_faq")->name("add.banner.faq");

		Route::resource('home_categories', 'HomeCategoryController');
		Route::get('/home_categories/destroy/{id}', 'HomeCategoryController@destroy')->name('home_categories.destroy');
		Route::post('/home_categories/update_status', 'HomeCategoryController@update_status')->name('home_categories.update_status');
		Route::post('/home_categories/get_subsubcategories_by_category', 'HomeCategoryController@getSubSubCategories')->name('home_categories.get_subsubcategories_by_category');

		Route::put('local-pride-banner', 'BannerController@localpride_update')->name("local_pride_banner_settings");

		Route::put('shop-sale-banner', 'BannerController@shopsale')->name("shopsale.banner");
	});

	Route::resource('roles', 'RoleController');
	Route::get('/roles/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');

	Route::resource('staffs', 'StaffController');
	Route::get('/staffs/destroy/{id}', 'StaffController@destroy')->name('staffs.destroy');

	Route::resource('flash_deals', 'FlashDealController');
	Route::get('/flash_deals/destroy/{id}', 'FlashDealController@destroy')->name('flash_deals.destroy');
	Route::post('/flash_deals/update_status', 'FlashDealController@update_status')->name('flash_deals.update_status');
	Route::post('/flash_deals/update_featured', 'FlashDealController@update_featured')->name('flash_deals.update_featured');
	Route::post('/flash_deals/product_discount', 'FlashDealController@product_discount')->name('flash_deals.product_discount');
	Route::post('/flash_deals/product_discount_edit', 'FlashDealController@product_discount_edit')->name('flash_deals.product_discount_edit');

	Route::get('/orders', 'OrderController@admin_orders')->name('orders.index.admin');
	Route::get('/orders/{id}/show', 'OrderController@show')->name('orders.show');
	Route::get('/sales/{id}/show', 'OrderController@sales_show')->name('sales.show');
	Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
	Route::get('/sales', 'OrderController@sales')->name('sales.index');

	Route::resource('links', 'LinkController');
	Route::get('/links/destroy/{id}', 'LinkController@destroy')->name('links.destroy');

	Route::resource('generalsettings', 'GeneralSettingController');
	Route::get('/logo', 'GeneralSettingController@logo')->name('generalsettings.logo');
	Route::post('/logo', 'GeneralSettingController@storeLogo')->name('generalsettings.logo.store');
	Route::get('/color', 'GeneralSettingController@color')->name('generalsettings.color');
	Route::post('/color', 'GeneralSettingController@storeColor')->name('generalsettings.color.store');

	Route::resource('seosetting', 'SEOController');

	Route::group(["prefix" => "/blog"], function () {
		Route::get('/', 'BlogController@index')->name('admin.blog');
		Route::get('/create', 'BlogController@create')->name('admin.blog.create');
		Route::get('/{id}/edit', 'BlogController@edit')->name('admin.blog.edit');
		Route::put('/update/{id}', 'BlogController@update')->name('admin.blog.update');
		Route::post('/store', 'BlogController@store')->name('admin.blog.store');
		Route::get('/manageblog', 'BlogController@manageBlog')->name('admin.blog.manage');
		Route::get('/{id}/delete', 'BlogController@delete')->name('admin.blog.delete');
		Route::post('/showhide', 'BlogController@showhide')->name('admin.blog.showhide');
		Route::post('/uploadajax', 'BlogController@upload_ajx')->name('admin.imgUpload.ajax');
		Route::post('/removeajax', 'BlogController@remove_ajx')->name('admin.deleteImg.ajax');
		Route::post("/add/category", "BlogController@add_ctg")->name("admin.add.category");
		Route::get("/delete/category/{id}", "BlogController@delete_ctg")->name("admin.delete.category");
		Route::get("/edit/category/{id}", "BlogController@edit_ctg")->name("admin.edit.category");
		Route::post("/update/category", "BlogController@update_ctg")->name("admin.update.category");
		Route::get("/name-ctg/{ctgblog}", "BlogController@ctg_name")->name("get.name.ctg");
	});

	Route::group(["prefix" => "/forum"], function () {
		Route::view('forum', "forum.formroom")->name('admin.forum.room');
		Route::put('/update-room', "ForumController@updateRoom")->name('admin.update.room');
		Route::post('/', 'ForumController@storeRoom')->name('admin.forum.room.store');
	});

	Route::post('/pay_to_seller', 'CommissionController@pay_to_seller')->name('commissions.pay_to_seller');

	//Reports
	Route::get('/stock_report', 'ReportController@stock_report')->name('stock_report.index');
	Route::get('/in_house_sale_report', 'ReportController@in_house_sale_report')->name('in_house_sale_report.index');
	Route::get('/seller_report', 'ReportController@seller_report')->name('seller_report.index');
	Route::get('/seller_sale_report', 'ReportController@seller_sale_report')->name('seller_sale_report.index');
	Route::get('/wish_report', 'ReportController@wish_report')->name('wish_report.index');

	//Coupons
	Route::resource('coupon', 'CouponController');
	Route::post('/coupon/get_form', 'CouponController@get_coupon_form')->name('coupon.get_coupon_form');
	Route::post('/coupon/get_form_edit', 'CouponController@get_coupon_form_edit')->name('coupon.get_coupon_form_edit');
	Route::get('/coupon/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');
	Route::get('/coupons/ultah', 'CouponController@ultah')->name('coupon.ultah');
	Route::post('/coupons/ultah_store', 'CouponController@ultah_store')->name('coupon.ultah_store');


	//Reviews
	Route::get('/reviews', 'ReviewController@index')->name('reviews.index');
	Route::post('/reviews/published', 'ReviewController@updatePublished')->name('reviews.published');

	//Support_Ticket
	Route::get('support_ticket/', 'SupportTicketController@admin_index')->name('support_ticket.admin_index');
	Route::get('support_ticket/{id}/show', 'SupportTicketController@admin_show')->name('support_ticket.admin_show');
	Route::post('support_ticket/reply', 'SupportTicketController@admin_store')->name('support_ticket.admin_store');

	//Pickup_Points
	Route::resource('pick_up_points', 'PickupPointController');
	Route::get('/pick_up_points/destroy/{id}', 'PickupPointController@destroy')->name('pick_up_points.destroy');


	Route::get('orders_by_pickup_point', 'OrderController@order_index')->name('pick_up_point.order_index');
	Route::get('/orders_by_pickup_point/{id}/show', 'OrderController@pickup_point_order_sales_show')->name('pick_up_point.order_show');

	Route::get('invoice/admin/{order_id}', 'InvoiceController@admin_invoice_download')->name('admin.invoice.download');

	//conversation of seller customer
	Route::get('conversations', 'ConversationController@admin_index')->name('conversations.admin_index');
	Route::get('conversations/{id}/show', 'ConversationController@admin_show')->name('conversations.admin_show');
	Route::get('/conversations/destroy/{id}', 'ConversationController@destroy')->name('conversations.destroy');


	Route::post('/sellers/profile_modal', 'SellerController@profile_modal')->name('sellers.profile_modal');
	Route::post('/sellers/approved', 'SellerController@updateApproved')->name('sellers.approved');

	Route::resource('attributes', 'AttributeController');
	Route::get('/attributes/destroy/{id}', 'AttributeController@destroy')->name('attributes.destroy');

	Route::resource('addons', 'AddonController');
	Route::post('/addons/activation', 'AddonController@activation')->name('addons.activation');

	Route::get('/customer-bulk-upload/index', 'CustomerBulkUploadController@index')->name('customer_bulk_upload.index');
	Route::post('/bulk-user-upload', 'CustomerBulkUploadController@user_bulk_upload')->name('bulk_user_upload');
	Route::post('/bulk-customer-upload', 'CustomerBulkUploadController@customer_bulk_file')->name('bulk_customer_upload');
	Route::get('/user', 'CustomerBulkUploadController@pdf_download_user')->name('pdf.download_user');
	//Customer Package
	Route::resource('customer_packages', 'CustomerPackageController');
	Route::get('/customer_packages/destroy/{id}', 'CustomerPackageController@destroy')->name('customer_packages.destroy');
	//Classified Products
	Route::get('/classified_products', 'CustomerProductController@customer_product_index')->name('classified_products');
	Route::post('/classified_products/published', 'CustomerProductController@updatePublished')->name('classified_products.published');

	Route::get("/membership", function () {
		return view("membership.index");
	})->name("membership.index");
	Route::post("/membership/store", "MembershipController@store")->name("admin.membership.store");
	Route::get("/membership/get/{id}", "MembershipController@edit")->name("admin.getMembership.tier");
	Route::post("/membership/update", "MembershipController@update")->name("admin.tier.update");
	Route::get("/membership/get", "MembershipController@index")->name("admin.member.get");

	Route::resource('recomendation', 'ProductRekomendasiController');
	Route::get("recomendation/{pid}", 'ProductRekomendasiController@show');
	Route::get("recomendation/{id}/{val}/filter", 'ProductRekomendasiController@filter')->name('recomendation.update.filter');
	Route::get("recomendation/get-brand/filter", "ProductRekomendasiController@brands")->name("get_brand.rekom");
	Route::post("recomendation/add-brand/filter", "ProductRekomendasiController@add_brand")->name("add_brand.rekom");
	Route::post("recomendation/add-category/filter", "ProductRekomendasiController@add_category")->name("add_category.rekom");
	Route::get("recomendation/get-categories/filter", "ProductRekomendasiController@categories")->name("get_categories.rekom");
	Route::get("recomendation/add-best-sell/filter", "ProductRekomendasiController@addBestSell")->name("add_best_sell.rekom");
	Route::get("recomendation/get-best-sell/filter", "ProductRekomendasiController@getBestSell")->name("get_best_sell.rekom");
	Route::post("recomendation/add-product", "ProductRekomendasiController@addProductManual")->name("add_product.rekom");
	Route::get("recomendation/get-product/filter", "ProductRekomendasiController@getProductManual")->name("get_product.rekom");

	Route::get("best-sell", function () {
		return view("admin-best-sell.create");
	})->name("admin.bestsell");
	Route::get("best-sell/{id}/{val}/filter", 'prodctBestSellController@filter')->name('best-sell.update.filter');
	Route::get("best-sell/get-brand/filter", "prodctBestSellController@brands")->name("get_brand.bestsell");
	Route::post("best-sell/add-brand/filter", "prodctBestSellController@add_brand")->name("add_brand.bestsell");
	Route::post("best-sell/add-category/filter", "prodctBestSellController@add_category")->name("add_category.bestsell");
	Route::get("best-sell/get-categories/filter", "prodctBestSellController@categories")->name("get_categories.bestsell");
	Route::get("best-sell/add-best-sell/filter", "prodctBestSellController@addBestSell")->name("add_best_sell.bestsell");
	Route::get("best-sell/get-best-sell/filter", "prodctBestSellController@getBestSell")->name("get_best_sell.bestsell");
	Route::post("best-sell/add-product", "prodctBestSellController@addProductManual")->name("add_product.bestsell");
	Route::get("best-sell/get-product/filter", "prodctBestSellController@getProductManual")->name("get_product.bestsell");

	Route::get("/skinlopedia", "skinlopediaController@page")->name("admin.skinlopedia");
	Route::get("/skinlopedia/get/{id}", "skinlopediaController@get")->name("admin.skinlopedia.get");
	Route::get("/skinlopedia/list", "skinlopediaController@index")->name("admin.skinlopedia.list");
	Route::post("/skinlopedia/store", "skinlopediaController@store")->name("admin.skinlopedia.store");
	Route::get("/skinlopedia/delete/{id}", "skinlopediaController@delete")->name("admin.skinlopedia.delete");
	Route::get("/skinlopedia/edit/{id}", "skinlopediaController@edit")->name("admin.skinlopedia.edit");
	Route::put("/skinlopedia/update/{id}", "skinlopediaController@update")->name("admin.skinlopedia.update");

	Route::get("/transfer-manual", function () {
		return view("transfermanual");
	})->name("admin.get.tf.manual");
	Route::post("/transfer-manual/update", "HomeController@manual_transfer")->name("admin.transfer.manual");

	Route::get("/promotion", function () {
		return view("promotion/manage");
	})->name("admin.promotion");
	Route::post("/add/promotion", "HomeController@admin_promotion")->name("admin.add.promo");
	Route::get("/get/promotion", "HomeController@get_promotion")->name("admin.get.promo");
	ROute::post("/promosi", "HomeController@gbpromosi")->name("admin.gbpromosi");

	Route::get("/faq", function () {
		return view("faq.manage");
	})->name("admin.faq.land");
	Route::post("/faq/store", "faqController@store")->name("admin.faq.store");
	Route::post("/faq/update", "faqController@update")->name("admin.faq.update");
	Route::get("/faq/{id}/delete", "faqController@destroy")->name("admin.faq.delete");
	Route::post("/faq/category/store", "faqController@store_category")->name("admin.add.faq.category");
	Route::put("/faq/update/category", "faqController@update_category")->name("admin.update.faq.category");
	Route::get("/faq/delete/{id}/category", "faqController@delete_category")->name("admin.delete.faq.category");
});
