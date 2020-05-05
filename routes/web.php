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

// Home route goes here
Route::get('/', 'HomeController@index')->name('home');

// Auth routes goes here
Auth::routes(['verify' => true]);

// User routes goes here
Route::put('users/{id}', 'User\UserController@update');
Route::put('updatePass', 'User\UserController@updatePass');
Route::post('billings', 'User\UserController@store_billings');
Route::post('payment_store', 'User\UserController@payment_store');
Route::post('shippings', 'User\UserController@store_shippings');
Route::get('dashboard', 'User\UserController@index')->name('dashboard');
Route::get('users', 'User\UserController@users')->name('users');

// Admin routes goes here
Route::get('all_admins', 'Admin\AdminController@admins')->name('admin.index');
Route::get('admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
Route::get('admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\Auth\LoginController@login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
Route::post('admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
Route::get('admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('admin/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'Admin\Auth\RegisterController@register');
Route::delete('admin/{id}', 'Admin\AdminController@destroy');

// Role routes goes here
Route::resource('roles', 'Admin\RoleController');

// Vendor routes goes here
Route::resource('vendors', 'Vendor\VendorController');
Route::get('vendor/dashboard', 'Vendor\VendorController@dashboard')->name('vendor.dashboard');
Route::get('vendor', 'Vendor\Auth\LoginController@showLoginForm')->name('vendor.login');
Route::post('vendor', 'Vendor\Auth\LoginController@login');
Route::post('vendor/logout', 'Vendor\Auth\LoginController@logout')->name('vendor.logout');
Route::post('vendor/password/email', 'Vendor\Auth\ForgotPasswordController@sendResetLinkEmail')->name('vendor.password.email');
Route::get('vendor/password/reset', 'Vendor\Auth\ForgotPasswordController@showLinkRequestForm')->name('vendor.password.request');
Route::post('vendor/password/reset', 'Vendor\Auth\ResetPasswordController@reset')->name('vendor.password.update');
Route::get('vendor/password/reset/{token}', 'Vendor\Auth\ResetPasswordController@showResetForm')->name('vendor.password.reset');

// About routes here
Route::get('about', 'Siteinfo\AboutController@about')->name('about');
Route::resource('abouts', 'Siteinfo\AboutController');

// Brand routes here
Route::get('brand', 'Product\BrandController@brand')->name('brand');
Route::resource('brands', 'Product\BrandController');

// Category routes here
Route::resource('categories', 'Product\CategoryController');

// Country routes here
Route::get('country', 'Product\CountryController@country')->name('country');
Route::resource('countries', 'Product\CountryController');

// Slider routes here
Route::resource('sliders', 'Siteinfo\SliderController');

// Contact routes here
Route::get('contact', 'Siteinfo\ContactController@contact')->name('contact');
Route::resource('contacts', 'Siteinfo\ContactController');

// Message routes here
Route::resource('messages', 'Mail\MessageController');

// Product routes here
Route::post('productreviews', 'Product\ProductreviewController@store');
Route::get('shop', 'Product\ProductController@shop');
Route::get('offers/{type}', 'Product\ProductController@offers');
Route::get('hotDeals', 'Product\ProductController@hotDeals');
Route::get('seasonals', 'Product\ProductController@seasonals');
Route::get('stockClearences', 'Product\ProductController@stockClearences');
Route::get('buyOneGetOnes', 'Product\ProductController@buyOneGetOnes');
Route::get('emis', 'Product\ProductController@emis');
Route::get('productsByCat/{id}', 'Product\ProductController@productsByCat');
Route::get('productsByBrand/{id}', 'Product\ProductController@productsByBrand');
Route::get('productsByCountry/{id}', 'Product\ProductController@productsByCountry');
Route::get('getSuggestedProducts/{key}', 'Product\ProductController@getSuggestedProducts');
Route::get('searchedProduct', 'Product\ProductController@searchedProduct');
Route::resource('products', 'Product\ProductController');

// Image routes here
Route::delete('images/{id}', 'Product\ImageController@destroy');

// Product Review routes here
Route::post('productreviews', 'Product\ProductreviewController@store');

// Partner routes here
Route::resource('partners', 'Siteinfo\PartnerController');

// Siteinfo routes here
Route::get('faq', function (){
    return view('siteinfo.faq');
});
Route::get('term-condition', function (){
    return view('siteinfo.term-condition');
});
Route::resource('siteinfos', 'Siteinfo\SiteinfoController');

// Color routes here
Route::resource('colors', 'Product\ColorController');

// Size routes here
Route::resource('sizes', 'Product\SizeController');

// Tag routes here
Route::resource('tags', 'Product\TagController');

// Wishlist routes here
Route::get('wishlists', 'User\WishlistController@index');
Route::post('wishlists', 'User\WishlistController@store');
Route::delete('wishlists/{id}', 'User\WishlistController@destroy');

// Order routes here
Route::get('order-tracking', 'User\OrderController@orderTracking');
Route::post('tracked-order', 'User\OrderController@showOrder');
Route::resource('orders', 'User\OrderController');

// Coupon routes here
Route::post('applyCoupon', 'Product\CouponController@applyCoupon');
Route::resource('coupons', 'Product\CouponController');

// MembershipType routes here
Route::resource('membership_types', 'User\MembershipTypeController');

// Cart routes here
Route::get('carts', 'Product\CartController@index');
Route::post('carts', 'Product\CartController@store');
Route::put('carts/{id}', 'Product\CartController@update');
Route::delete('carts/{id}', 'Product\CartController@destroy');

// Mail routes here
Route::post('sendMail', 'Mail\MailController@sendMail');

// Subscription routes here
Route::post('subscribes', 'Siteinfo\SubscriptionController@store');

// Banner routes here
Route::resource('banners', 'Siteinfo\BannerController');

// Draft routes here
Route::resource('drafts', 'Mail\DraftController');

// Sent routes here
Route::get('sents', 'Mail\SentController@index');
Route::get('sents/{id}', 'Mail\SentController@show');
Route::delete('sents/{id}', 'Mail\SentController@destroy');
Route::delete('sents', 'Mail\SentController@destroyBulk');

// Blog routes here
Route::get('blog', 'Siteinfo\BlogController@blog');
Route::post('blogcomments', 'Siteinfo\BlogCommentController@store');
Route::resource('blogs', 'Siteinfo\BlogController');

// Auction routes here
Route::get('auctionapplications', 'Product\AuctionapplicationController@index');
Route::post('auctionapplications', 'Product\AuctionapplicationController@store');
Route::get('auction', 'Product\AuctionController@auction');
Route::resource('auctions', 'Product\AuctionController');

// Bid routes here
Route::get('bidapplications', 'Product\BidapplicationController@index');
Route::post('bidapplications', 'Product\BidapplicationController@store');
Route::get('bid', 'Product\BidController@bid');
Route::resource('bids', 'Product\BidController');