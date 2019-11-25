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


Route::get('/', 'FrontendController@index')->name('shop.cart.index');
Route::get('/cart/add/{id}', 'CartController@addCart')->name('cart.add');
Route::get('/cart/read', 'CartController@readCart')->name('cart.read');
Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
Route::get('/cart/remove/{rowId}', 'CartController@removeCart')->name('cart.remove');



Route::resource('/checkout','CheckoutController');
Route::get('/thank', function () {
    return view('thank.index');
})->name('thank');

Route::get('/admin', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//-----------customer---------

Route::prefix('customer')->namespace('Customer')->group(function(){


	Route::get('/home','CustomerController@index')->name('customer.home');
	Route::get('/order','CustomerController@myOrder')->name('customer.order');

	Route::get('/like/{product_id}','CustomerController@like')->name('customer.like');
	
	Route::get('/login','CustomerloginController@showLoginForm')->name('customer.login');
	Route::post('/login','CustomerloginController@login');
	Route::get('/logout','CustomerloginController@logout')->name('customer.logout');


});

















Route::group(['middleware'=>['auth']], function (){

	Route::resource('categories','CategoryController');
	Route::resource('products','ProductController');
	//==============manage route============================================
	//--------------color---------------------------------------------------
	Route::get('/color', 'ManageController@indexColor')->name('color.index');
	Route::get('/color/create', 'ManageController@createColor')->name('color.create');
	Route::post('/color/store', 'ManageController@storeColor')->name('color.store');
	Route::get('/color/edit/{id}', 'ManageController@editColor')->name('color.edit');
	Route::post('/color/update/{id}', 'ManageController@updateColor')->name('color.update');
	Route::get('/color/restore', 'ManageController@restoreColor')->name('color.restore');
	Route::get('/color/restore/info/{id?}', 'ManageController@postRestoreColor')->name('color.restore.info');
	Route::get('/color/destroy/{id}', 'ManageController@destroyColor')->name('color.destroy');
	//--------------status---------------------------------------------------
	Route::get('/status', 'ManageController@indexStatus')->name('status.index');
	Route::get('/status/create', 'ManageController@createStatus')->name('status.create');
	Route::post('/status/store', 'ManageController@storeStatus')->name('status.store');
	Route::get('/status/edit/{id}', 'ManageController@editStatus')->name('status.edit');
	Route::post('/status/update/{id}', 'ManageController@updateStatus')->name('status.update');
	Route::get('/status/destroy/{id}', 'ManageController@destroyStatus')->name('status.destroy');
});















