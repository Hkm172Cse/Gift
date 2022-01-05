<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/mypayment','mypayment_Controller@payment_view_method');
Route::get('/', 'frontend\frontendController@index') -> name('/');
Route::get('/about', 'frontend\frontendController@about') -> name('about');
Route::get('/contact', 'frontend\frontendController@contact') -> name('contact');


Auth::routes(['verify' => true]);

Route::get('/dashboard', 'HomeController@index')->name('admin')->middleware('verified');

/*===========================Backend routes starts here=================================*/

Route::group(['middleware'=>['auth','admin',]],function(){

	Route::prefix('users')->group (function(){
		Route::get('/view', 'backend\UserController@view')->name('users.view');
		Route::get('/add', 'backend\UserController@add')->name('users.add');
		Route::get('/delete/{id}', 'backend\UserController@delete')->name('users.delete');
		Route::get('/edit/{id}', 'backend\UserController@edit')->name('users.edit');
		Route::POST('/update/{id}', 'backend\UserController@update')->name('users.update');
		Route::POST('/store', 'backend\UserController@store')->name('users.store');
	});

	Route::prefix('categories')->group (function(){
		Route::get('/view', 'backend\CategoryController@view')->name('categories.view');
		Route::get('/add', 'backend\CategoryController@add')->name('categories.add');
		Route::get('/delete/{id}', 'backend\CategoryController@delete')->name('categories.delete');
		Route::get('/edit/{id}', 'backend\CategoryController@edit')->name('categories.edit');
		Route::POST('/update/{id}', 'backend\CategoryController@update')->name('categories.update');
		Route::POST('/store', 'backend\CategoryController@store')->name('categories.store');
	});

	Route::prefix('colors')->group (function(){
		Route::get('/view', 'backend\colorsController@view')->name('colors.view');
		Route::get('/add', 'backend\colorsController@add')->name('colors.add');
		Route::get('/delete/{id}', 'backend\colorsController@delete')->name('colors.delete');
		Route::get('/edit/{id}', 'backend\colorsController@edit')->name('colors.edit');
		Route::POST('/update/{id}', 'backend\colorsController@update')->name('colors.update');
		Route::POST('/store', 'backend\colorsController@store')->name('colors.store');
	});
	Route::prefix('size')->group (function(){
		Route::get('/view', 'backend\SizeController@view')->name('size.view');
		Route::get('/add', 'backend\SizeController@add')->name('size.add');
		Route::get('/delete/{id}', 'backend\SizeController@delete')->name('size.delete');
		Route::get('/edit/{id}', 'backend\SizeController@edit')->name('size.edit');
		Route::POST('/update/{id}', 'backend\SizeController@update')->name('size.update');
		Route::POST('/store', 'backend\SizeController@store')->name('size.store');
	});

	Route::prefix('products')->group (function(){
		Route::get('/view', 'backend\ProductController@view')->name('products.view');
		Route::get('/add', 'backend\ProductController@add')->name('products.add');
		Route::get('/delete/{id}', 'backend\ProductController@delete')->name('products.delete');
		Route::get('/edit/{id}', 'backend\ProductController@edit')->name('products.edit');
		Route::POST('/update/{id}', 'backend\ProductController@update')->name('products.update');
		Route::POST('/store', 'backend\ProductController@store')->name('products.store');
		Route::get('/details/{id}', 'backend\ProductController@details')->name('products.details');
	});

	Route::prefix('order')->group (function(){
		Route::get('/view', 'backend\OrderController@view')->name('orders.view');
		Route::POST('/status-update/{id}', 'backend\OrderController@UpdateStatus')->name('update.order.status');
		Route::get('/upcoming', 'backend\OrderController@UpcomingOrderView')->name('upcoming.orders.view');
		Route::get('/upcoming/filter', 'backend\OrderController@StatusUpcomingOrderView')->name('upcoming.orders.view.filter');
		Route::get('/upcoming/3-days', 'backend\OrderController@ThreeUpcomingOrderView')->name('threedays.upcoming.orders.view');
		Route::get('/upcoming/3-days/status', 'backend\OrderController@UpcomingOrderViewStatus')->name('threedays.upcoming.orders.view.status');
		
	});


});




/*===========================frontend routes starts here=================================*/

Route::prefix('my')->group (function(){
	Route::get('/products/view', 'frontend\frontendController@productsView')->name('customer.products.view');
	Route::get('/product-category/{category_id}', 'frontend\frontendController@CategoryMenu')->name('category.menu');
	Route::get('/product-details/{id}', 'frontend\frontendController@productDetails')->name('customer.products.details');
	Route::get('/view-profile', 'frontend\frontendController@viewProfile')->name('customer.view.profile');
	Route::get('/edit-profile/{id}', 'frontend\frontendController@editProfile')->name('customer.edit.profile');
	Route::POST('/update-profile', 'frontend\frontendController@updateProfile')->name('customer.update.profile');
	Route::get('/password-change', 'frontend\frontendController@changePass')->name('customer.change.pass');
	Route::POST('/update-password', 'frontend\frontendController@updatePass')->name('customer.update.pass');
	
});

Route::prefix('my/shipping')->group(function(){
	Route::get('/create','frontend\ShippingController@create')->name('customer.shipping.create');
	Route::post('/store','frontend\ShippingController@store')->name('customer.shipping.store');
	Route::get('/details/{id}','frontend\ShippingController@details')->name('customer.shipping.details');
	Route::get('/delete/{id}','frontend\ShippingController@ShippingDestroy')->name('customer.shipping.delete');
	Route::get('/edit/{id}','frontend\ShippingController@edit')->name('customer.shipping.edit');
	Route::POST('/update/{id}','frontend\ShippingController@update')->name('customer.shipping.update');
});

Route::prefix('my/cart/product')->group(function(){
	Route::get('/view','frontend\CartController@view')->name('customer.cart.create');
	Route::POST('/add','frontend\CartController@store')->name('customer.cart.store');
	Route::POST('/add-receiver','frontend\CartController@session_set')->name('customer.cart.receiver');
	Route::get('/add-product','frontend\CartController@session_shipping')->name('customer.cart.add');
	Route::POST('/edit','frontend\CartController@additem')->name('customer.cart.additem');
	Route::get('/delete/{id}','frontend\CartController@delete')->name('customer.cart.deleteitem');
	Route::get('/delete/all/{id}','frontend\CartController@alldelete')->name('customer.cart.alldelete');
});
Route::prefix('my/order')->group(function(){
	
	Route::POST('/payment/add','frontend\OrderController@paymentStore')->name('customer.payment.store');
	Route::get('/details/{id}','frontend\OrderController@OrderDetails')->name('customer.order.details');
	//Route::get('/summary/{id}','frontend\OrderController@OrderSummary')->name('customer.order.summary');
	Route::POST('/invoice/{id}','frontend\ShippingController@invoice')->name('customer.invoice.print');

	
});




