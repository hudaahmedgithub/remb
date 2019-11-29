<?php


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
	
	Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function(){
		
	Route::get('/', 'WelcomeController@index')->name('welcome');
		
//Route::get('/', 'HomeController@index')->name('home');
		
	Route::resource('/clients','ClientController')->except(['show']);
	
	Route::resource('/orders','OrderController');
	Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');
		
	Route::resource('/clients.orders','Client\OrderController')->except(['show']);
		
		
	Route::resource('/users','UserController')->except(['show']);
		
   Route::resource('/categories','CategoryController')->except(['show']);
		
	Route::resource('/operation','OperationController')->except(['show']);
	
	Route::resource('/types','TypeController')->except(['show']);
		
	Route::resource('/status','StatusController')->except(['show']);
		
			
		Route::resource('/products','ProductController')->except(['show']);
		//Route::get('/', 'HomeController@index')->name('home');
		Route::get('/adminPanel', 'AdminController@index');
	
	//Route::resource('/adminPanel/user', 'UsersController');
	
	//Route::resource('/adminPanel/sitesetting', 'SiteSettingController');
	
	
	Route::resource('/bu', 'BuController');

	Route::resource('/mu', 'MuController');

   Route::get('/bu/{id}/delete','BuController@destroy');
	
	Route::get('/adminPanel/contact','ContactController@index');
	
    Route::get('/adminPanel/contact/{id}/show','ContactController@showContact');
		Route::get('/adminPanel/contact/{id}/delete','ContactController@destroy');
});

});

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::resource('messages','MessageController');

Route::get('/k', 'BuController@showAll');

//Route::get('/i', 'BuController@showAll');

Route::get('/showb/{id}', 'BuController@showOne')->name('showb');

Route::get('/show/{id}', 'MuserController@showOne')->name('show');
Route::get('/wishlist', 'HomeController@view_wishlist');

Route::post('/addWishlist','HomeController@addWishlist')->name('addWishlist');

Route::get('/removeWishList/{id}','HomeController@removeWishList');
Route::get('/productDetail/{id}','HomeController@detailPro');
Route::get('/shop', 'HomeController@shop')->name('shop');

Route::get('/category/{id}','HomeController@showCates');

Route::get('/type/{id}','HomeController@showTypes');
