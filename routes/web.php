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
Auth::routes(['register' => false]);

Route::prefix('customer')->name('frontend.customer.')->namespace('Frontend')->group(function () {
    Route::get('/', 'CustomerController@index')->name('dashboard');
    Route::get('dashboard', 'CustomerController@index')->name('dashboard');
    Route::post('order/store', 'CustomerController@orderStore')->name('order.store');
    Route::post('login', 'CustomerLoginController@loginCustomer')->name('loginCustomer');
    Route::get('logout', 'CustomerLoginController@logout')->name('logout');

    //reset
    Route::get('/forgot', 'PasswordRestController@forgot')->name('forgot');
    Route::post('/forgot/sendemail', 'PasswordRestController@sendForgotEmail')->name('forgot.sendemail');
    Route::get('/reset/{token}', 'PasswordRestController@reset')->name('reset');
    Route::post('/resetpassword', 'PasswordRestController@resetpassword')->name('resetpassword');

    //dashboard
    Route::post('/password/update', 'CustomerDashboardController@passwordUpdate')->name('password.update');
    Route::post('/info/update', 'CustomerDashboardController@infoUpdate')->name('info.update');
    Route::get('/wishlist/delete/{id}', 'CustomerDashboardController@removeWishList')->name('cart.deleteWishLIst');
    Route::post('/cart/store', 'CustomerDashboardController@cartStore')->name('cart.store');


});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

Route::get('/', 'Frontend\HomePageController@homepage')->name('frontend.home.index');
Route::post('ajax/getProductById', 'Frontend\HomePageController@getProductById')->name('frontend.home.getProductById');
Route::get('subcategory/product/{slug}', 'Frontend\HomePageController@productList')->name('frontend.home.products');
Route::get('productline/product/{slug}', 'Frontend\HomePageController@productListByProductLine')->name('frontend.productLine.products');
Route::get('category/products', 'Frontend\HomePageController@productListByCategory')->name('frontend.category.product');
Route::get('category/products/{slug}', 'Frontend\HomePageController@productListByCategorySLug')->name('frontend.category.products');
Route::get('product/search', 'Frontend\HomePageController@productListBySearchKey')->name('frontend.home.products.search');
Route::get('detail/{slug}', 'Frontend\HomePageController@productDetail')->name('frontend.home.product.detail');
Route::post('cart/store', 'Frontend\CartController@CartStore')->name('frontend.cart.store');
Route::post('wish/store', 'Frontend\CartController@wishStore')->name('frontend.wish.store');
Route::get('/cart/', 'Frontend\CartController@index')->name('frontend.cart.index');
Route::get('/wishlist/', 'Frontend\CartController@wishList')->name('frontend.wishlist.index');
Route::get('/cart/delete/{id}', 'Frontend\CartController@removeCart')->name('frontend.cart.deleteCart');
Route::get('/wishlist/delete/{id}', 'Frontend\CartController@removeWishListCart')->name('frontend.wishlist.delete');
Route::post('/cart/update', 'Frontend\CartController@updateCart')->name('frontend.cart.updateCart');
Route::post('/cart/coupon', 'Frontend\CartController@applyCoupon')->name('frontend.cart.applyCoupon');
Route::get('/cart/checkout', 'Frontend\CartController@checkOut')->name('frontend.cart.checkout');
Route::get('/customer/invoice', 'Frontend\CartController@invoice')->name('frontend.cart.invoice');
Route::get('/customer/print1/{id}','Frontend\CustomerController@downloadPDF')->name('frontend.customer.downloadPdf');
Route::get('/customer/print2/{id}','Frontend\CustomerController@print2')->name('frontend.customer.print2');
Route::get('/customer/print3/{id}','Frontend\CustomerController@print3')->name('frontend.customer.print3');
Route::get('policy', 'Frontend\HomePageController@policy')->name('frontend.page.policy');
Route::get('page/detail/{slug}', 'Frontend\HomePageController@pageDetail')->name('frontend.page.detail');
Route::get('contact-us', 'Frontend\HomePageController@contactUs')->name('frontend.page.contact');
Route::get('customer/login', 'Frontend\CustomerController@login')->name('frontend.customer.login');
Route::get('customer/register', 'Frontend\CustomerController@register')->name('frontend.customer.register');
Route::post('customer/register/store', 'Frontend\CustomerController@store')->name('frontend.customer.register.store');
Route::get('customer/register/verify/{key}', 'Frontend\CustomerController@registerVerify')->name('frontend.customer.verify_email_register');

Route::post('contact-us/store', 'Frontend\HomePageController@contactUsStore')->name('frontend.page.contact.store');
Route::get('black/friday', 'Frontend\HomePageController@blackFriday')->name('frontend.black.friday');
Route::get('order/track', 'Frontend\HomePageController@orderTrack')->name('frontend.order.track');
Route::post('order/track/check', 'Frontend\HomePageController@orderTrackCheck')->name('frontend.order.track.check');
Route::post('ajax/product/sortByValue', 'Frontend\HomePageController@sortByValue')->name('backend.product.sortByValue');
Route::post('ajax/product/limit', 'Frontend\HomePageController@limitData')->name('backend.product.limitData');
Route::post('ajax/product/productFilterByPriceRange', 'Frontend\HomePageController@productFilterByPriceRange')->name('frontend.home.productFilterByPriceRange');
Route::post('ajax/product/wholesalePrice', 'Frontend\HomePageController@wholesalePrice')->name('frontend.wholesale.price');

Route::post('customer/review/store', 'Frontend\HomePageController@reviewStore')->name('frontend.customer.review.store');


Route::get('/roiels_login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/roiels_login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::namespace('Backend')->middleware('web')->group(function () {
    Route::get('/home', 'dashboardController@index')->name('home');

    Route::get('slider/create', 'SliderController@create')->name('backend.slider.create');
    Route::post('slider/store', 'SliderController@store')->name('backend.slider.store');
    Route::get('slider', 'SliderController@index')->name('backend.slider.index');
    Route::get('slider/{id}/edit', 'SliderController@edit')->name('backend.slider.edit');
    Route::put('slider/{id}/update', 'SliderController@update')->name('backend.slider.update');
    Route::delete('slider/{id}/delete', 'SliderController@destroy')->name('backend.slider.destroy');
    Route::get('slider/{id}/show', 'SliderController@show')->name('backend.slider.show');

    Route::get('category/create', 'CategoryController@create')->name('backend.category.create');
    Route::post('category/store', 'CategoryController@store')->name('backend.category.store');
    Route::get('category', 'CategoryController@index')->name('backend.category.index');
    Route::get('category/{id}/edit', 'CategoryController@edit')->name('backend.category.edit');
    Route::put('category/{id}/update', 'CategoryController@update')->name('backend.category.update');
    Route::delete('category/{id}/delete', 'CategoryController@destroy')->name('backend.category.destroy');
    Route::get('category/{id}/show', 'CategoryController@show')->name('backend.category.show');

    Route::get('subcategory/create', 'SubCategoryController@create')->name('backend.subcategory.create');
    Route::post('subcategory/store', 'SubCategoryController@store')->name('backend.subcategory.store');
    Route::get('subcategory', 'SubCategoryController@index')->name('backend.subcategory.index');
    Route::get('subcategory/{id}/edit', 'SubCategoryController@edit')->name('backend.subcategory.edit');
    Route::put('subcategory/{id}/update', 'SubCategoryController@update')->name('backend.subcategory.update');
    Route::delete('subcategory/{id}/delete', 'SubCategoryController@destroy')->name('backend.subcategory.destroy');
    Route::get('subcategory/{id}/show', 'SubCategoryController@show')->name('backend.subcategory.show');

    Route::get('productline/create', 'ProductLineController@create')->name('backend.productline.create');
    Route::post('productline/store', 'ProductLineController@store')->name('backend.productline.store');
    Route::get('productline', 'ProductLineController@index')->name('backend.productline.index');
    Route::get('productline/{id}/edit', 'ProductLineController@edit')->name('backend.productline.edit');
    Route::put('productline/{id}/update', 'ProductLineController@update')->name('backend.productline.update');
    Route::delete('productline/{id}/delete', 'ProductLineController@destroy')->name('backend.productline.destroy');
    Route::get('productline/{id}/show', 'ProductLineController@show')->name('backend.productline.show');

    Route::get('product/create', 'ProductController@create')->name('backend.product.create');
    Route::post('product/store', 'ProductController@store')->name('backend.product.store');
    Route::get('product', 'ProductController@index')->name('backend.product.index');
    Route::get('product/{id}/edit', 'ProductController@edit')->name('backend.product.edit');
    Route::put('product/{id}/update', 'ProductController@update')->name('backend.product.update');
    Route::delete('product/{id}/delete', 'ProductController@destroy')->name('backend.product.destroy');
    Route::get('product/{id}/show', 'ProductController@show')->name('backend.product.show');
    Route::delete('deleteProductSpecificationByID', 'ProductController@deleteProductSpecificationByID')->name('backend.product.deleteProductSpecificationByID');
    Route::delete('deleteImageGalleryBYID', 'ProductController@deleteImageGalleryBYID')->name('frontend.product.deleteImageGalleryBYID');
    Route::delete('deleteProductWholesaleByID', 'ProductController@deleteProductWholesaleByID')->name('backend.product.deleteProductWholesaleByID');


    Route::get('color/create', 'ColorController@create')->name('backend.color.create');
    Route::post('color/store', 'ColorController@store')->name('backend.color.store');
    Route::get('color', 'ColorController@index')->name('backend.color.index');
    Route::get('color/{id}/edit', 'ColorController@edit')->name('backend.color.edit');
    Route::put('color/{id}/update', 'ColorController@update')->name('backend.color.update');
    Route::delete('color/{id}/delete', 'ColorController@destroy')->name('backend.color.destroy');
    Route::get('color/{id}/show', 'ColorController@show')->name('backend.color.show');

    Route::get('size/create', 'SizeController@create')->name('backend.size.create');
    Route::post('size/store', 'SizeController@store')->name('backend.size.store');
    Route::get('size', 'SizeController@index')->name('backend.size.index');
    Route::get('size/{id}/edit', 'SizeController@edit')->name('backend.size.edit');
    Route::put('size/{id}/update', 'SizeController@update')->name('backend.size.update');
    Route::delete('size/{id}/delete', 'SizeController@destroy')->name('backend.size.destroy');
    Route::get('size/{id}/show', 'SizeController@show')->name('backend.size.show');

    Route::get('coupon/create', 'CouponController@create')->name('backend.coupon.create');
    Route::post('coupon/store', 'CouponController@store')->name('backend.coupon.store');
    Route::get('coupon', 'CouponController@index')->name('backend.coupon.index');
    Route::get('coupon/{id}/edit', 'CouponController@edit')->name('backend.coupon.edit');
    Route::put('coupon/{id}/update', 'CouponController@update')->name('backend.coupon.update');
    Route::delete('coupon/{id}/delete', 'CouponController@destroy')->name('backend.coupon.destroy');
    Route::get('coupon/{id}/show', 'CouponController@show')->name('backend.coupon.show');

    Route::get('order/create', 'OrderController@create')->name('backend.order.create');
    Route::post('order/store', 'OrderController@store')->name('backend.order.store');
    Route::get('order', 'OrderController@index')->name('backend.order.index');
    Route::get('order/{id}/edit', 'OrderController@edit')->name('backend.order.edit');
    Route::put('order/{id}/update', 'OrderController@update')->name('backend.order.update');
    Route::put('order/status/{id}/update', 'OrderController@statusUpdate')->name('backend.order.status.update');
    Route::delete('order/{id}/delete', 'OrderController@destroy')->name('backend.order.destroy');
    Route::get('order/{id}/show', 'OrderController@show')->name('backend.order.show');
    Route::get('order/{id}/detail', 'OrderController@detail')->name('backend.order.detail');
    Route::get('order/{id}/status', 'OrderController@status')->name('backend.order.status');
    Route::post('order/ajax/orderStatusUpdateOrderId', 'OrderController@orderStatusUpdateOrderId')->name('backend.order.orderStatusUpdateOrderId');

    Route::get('page/create', 'PageController@create')->name('backend.page.create');
    Route::post('page/store', 'PageController@store')->name('backend.page.store');
    Route::get('page', 'PageController@index')->name('backend.page.index');
    Route::get('page/{id}/edit', 'PageController@edit')->name('backend.page.edit');
    Route::put('page/{id}/update', 'PageController@update')->name('backend.page.update');
    Route::delete('page/{id}/delete', 'PageController@destroy')->name('backend.page.destroy');
    Route::get('page/{id}/show', 'PageController@show')->name('backend.page.show');

    Route::get('status/create', 'StatusController@create')->name('backend.status.create');
    Route::post('status/store', 'StatusController@store')->name('backend.status.store');
    Route::get('status', 'StatusController@index')->name('backend.status.index');
    Route::get('status/{id}/edit', 'StatusController@edit')->name('backend.status.edit');
    Route::put('status/{id}/update', 'StatusController@update')->name('backend.status.update');
    Route::delete('status/{id}/delete', 'StatusController@destroy')->name('backend.status.destroy');
    Route::get('status/{id}/show', 'StatusController@show')->name('backend.status.show');


    Route::post('getSubcategoryByCategoryID', 'PackageController@getSubcategoryByCategoryID')->name('frontend.home.getSubcategoryByCategoryID');
    Route::post('getPackageByPackageID', 'PackageController@getPackageByPackageID')->name('backend.product.getPackageByPackageID');
    Route::post('getPackageCostExcludeByID', 'PackageController@getPackageCostExcludeByID')->name('backend.product.getPackageCostExcludeByID');
    Route::post('getPriceByID', 'PackageController@getPriceByID')->name('backend.product.getPriceByID');
    Route::post('getPackageItineryByID', 'PackageController@getPackageItineryByID')->name('backend.product.getPackageItineryByID');
    Route::post('getPackageImageByID', 'PackageController@getPackageImageByID')->name('backend.product.getPackageImageByID');



    Route::get('team/create', 'TeamController@create')->name('backend.team.create');
    Route::post('team/store', 'TeamController@store')->name('backend.team.store');
    Route::get('team', 'TeamController@index')->name('backend.team.index');
    Route::get('team/{id}/edit', 'TeamController@edit')->name('backend.team.edit');
    Route::put('team/{id}/update', 'TeamController@update')->name('backend.team.update');
    Route::delete('team/{id}/delete', 'TeamController@destroy')->name('backend.team.destroy');
    Route::get('team/{id}/show', 'TeamController@show')->name('backend.team.show');

    Route::get('blog/create', 'BlogController@create')->name('backend.blog.create');
    Route::post('blog/store', 'BlogController@store')->name('backend.blog.store');
    Route::get('blog', 'BlogController@index')->name('backend.blog.index');
    Route::get('blog/{id}/edit', 'BlogController@edit')->name('backend.blog.edit');
    Route::put('blog/{id}/update', 'BlogController@update')->name('backend.blog.update');
    Route::delete('blog/{id}/delete', 'BlogController@destroy')->name('backend.blog.destroy');
    Route::get('blog/{id}/show', 'BlogController@show')->name('backend.blog.show');

    Route::get('configuration', 'ConfigurationController@index')->name('backend.configuration.index');
    Route::get('configuration/{id}/edit', 'ConfigurationController@edit')->name('backend.configuration.edit');
    Route::put('configuration/{id}/update', 'ConfigurationController@update')->name('backend.configuration.update');

    Route::get('user/create', 'UserController@create')->name('backend.user.create');
    Route::post('user/store', 'UserController@store')->name('backend.user.store');
    Route::get('user', 'UserController@index')->name('backend.user.index');
    Route::get('user/{id}/edit', 'UserController@edit')->name('backend.user.edit');
    Route::put('user/{id}/update', 'UserController@update')->name('backend.user.update');
    Route::delete('user/{id}/delete', 'UserController@destroy')->name('backend.user.destroy');
    Route::get('user/{id}/show', 'UserController@show')->name('backend.user.show');


    Route::get('review/create', 'ReviewController@create')->name('backend.review.create');
    Route::post('review/store', 'ReviewController@store')->name('backend.review.store');
    Route::get('review/list', 'ReviewController@index')->name('backend.review.index');
    Route::get('review/{id}/edit', 'ReviewController@edit')->name('backend.review.edit');
    Route::put('review/{id}/update', 'ReviewController@update')->name('backend.review.update');
    Route::delete('review/{id}/delete', 'ReviewController@destroy')->name('backend.review.destroy');
    Route::get('review/{id}/show', 'ReviewController@show')->name('backend.review.show');
    Route::get('review/{id}/deactive', 'ReviewController@deActive')->name('backend.review.deActive');
    Route::get('review/{id}/active', 'ReviewController@active')->name('backend.review.active');

    Route::get('vendor/create', 'VendorController@create')->name('backend.vendor.create');
    Route::post('vendor/store', 'VendorController@store')->name('backend.vendor.store');
    Route::get('vendor/list', 'VendorController@index')->name('backend.vendor.index');
    Route::get('vendor/{id}/edit', 'VendorController@edit')->name('backend.vendor.edit');
    Route::put('vendor/{id}/update', 'VendorController@update')->name('backend.vendor.update');
    Route::delete('vendor/{id}/delete', 'VendorController@destroy')->name('backend.vendor.destroy');
    Route::get('vendor/{id}/show', 'VendorController@show')->name('backend.vendor.show');

    Route::get('advertise/create', 'AdvertiseController@create')->name('backend.advertise.create');
    Route::post('advertise/store', 'AdvertiseController@store')->name('backend.advertise.store');
    Route::get('advertise', 'AdvertiseController@index')->name('backend.advertise.index');
    Route::get('advertise/{id}/edit', 'AdvertiseController@edit')->name('backend.advertise.edit');
    Route::put('advertise/{id}/update', 'AdvertiseController@update')->name('backend.advertise.update');
    Route::delete('advertise/{id}/delete', 'AdvertiseController@destroy')->name('backend.advertise.destroy');
    Route::get('advertise/{id}/show', 'AdvertiseController@show')->name('backend.advertise.show');

    Route::get('brand/create', 'BrandController@create')->name('backend.brand.create');
    Route::post('brand/store', 'BrandController@store')->name('backend.brand.store');
    Route::get('brand', 'BrandController@index')->name('backend.brand.index');
    Route::get('brand/{id}/edit', 'BrandController@edit')->name('backend.brand.edit');
    Route::put('brand/{id}/update', 'BrandController@update')->name('backend.brand.update');
    Route::delete('brand/{id}/delete', 'BrandController@destroy')->name('backend.brand.destroy');
    Route::get('brand/{id}/show', 'BrandController@show')->name('backend.brand.show');

    Route::get('customer/create', 'CustomerController@create')->name('backend.customer.create');
    Route::post('customer/store', 'CustomerController@store')->name('backend.customer.store');
    Route::get('customer/list', 'CustomerController@index')->name('backend.customer.index');
    Route::get('customer/{id}/edit', 'CustomerController@edit')->name('backend.customer.edit');
    Route::put('customer/{id}/update', 'CustomerController@update')->name('backend.customer.update');
    Route::delete('customer/{id}/delete', 'CustomerController@destroy')->name('backend.customer.destroy');
    Route::get('customer/{id}/show', 'CustomerController@show')->name('backend.customer.show');



    Route::get('user/password', 'UserController@passwordForm')->name('backend.user.passwordForm');
    Route::put('password/update', 'UserController@updatePassword')->name('backend.user.updatePassword');
    Route::get('contact/list', 'ContactUsController@index')->name('backend.contact.index');
    Route::get('vehicle/booking', 'VehicleBookingController@index')->name('backend.vehicle.booking.index');
    Route::post('vehicle/booking/store', 'VehicleBookingController@store')->name('frontend.vehicle.booking.store');
    Route::delete('contact/delete/{id}', 'ContactUsController@destroy')->name('backend.contact.destroy');

    Route::post('ajax/getSubcategoryByCategoryID', 'ProductLineController@getSubcategoryByCategoryID')->name('backend.productline.getSubcategoryByCategoryID');
    Route::post('ajax/getproductLineBySubCategoryID', 'ProductController@getproductLineBySubCategoryID')->name('backend.product.getproductLineBySubCategoryID');

});
