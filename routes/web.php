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
Route::get('/','FrontControler@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contect', 'FrontControler@contect');
Route::get('add/to/cart/{product_id}', 'FrontControler@addtocart');
Route::get('add/product/view', 'ProductControler@p_controler');

Route::post('add/product/insert', 'ProductControler@p_insert');

Route::get('/delete/product/{product_id}','ProductControler@delete_product');
Route::get('/edit/product/{product_id}','ProductControler@edit_product');
Route::post('edit/product/insert','ProductControler@edit_product_insert');
Route::get('/restore/product/{product_id}','ProductControler@restore_product');
Route::get('/permanent/delete/product/{product_id}','ProductControler@parmanentdelete_product');
Route::get('add/category/view','CategoryController@addcategoryview');
Route::get('change/menu/status/{category_id}','HomeController@changemenustatus');

//message

Route::get('contact/message/view','HomeController@contactmessageview');



Route::post('/add/category/insert','CategoryController@addcategoryinsert');


//frontend controler route
Route::get('product/details/{product_id}','FrontControler@productditails' );

Route::get('cart','FrontControler@cart' );

Route::get('category/wise/produdcts/{category_id}','FrontControler@categorywiseprodudcts');

Route::post('contact/insert','FrontControler@contactinsert');

Route::get('delete/from/cart/{cart_id}','FrontControler@deletefromcart');

Route::get('clear/cart','FrontControler@clearcart');

Route::get('checkout/shipping','FrontControler@checkoutshipping');

Route::get('add/address/view','AddContegoryController@addaddressview');

Route::post('add/insert','AddContegoryController@addinsert');



///dynamic_dependent control er
/*Route::get('/FrontControler', 'FrontControler@frontcontroler');

Route::get('/checkout/shipping', 'FrontControler@indexx');

Route::post('/checkout/shipping', 'FrontControler@fetch')->name('dynamicdependent.fetch');*/


///dynamic_dependent control er

Route::get('/FrontControler', 'DynamicDependent@frontcontroler');

Route::get('/dynamic_dependent', 'DynamicDependent@index');

Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');

Route::post('add/city/insert', 'DynamicDependent@addcityinsert');
