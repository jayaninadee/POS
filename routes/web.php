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

Route::get('/','IndexController@index');

Route::get('/index.html','IndexController@index');

Route::get('/customer.html','CustomerController@index');
Route::post('/cusadd','CustomerController@addCustomer');
Route::delete('/cusdelete','CustomerController@deleteCustomer');
Route::put('/cusupdate','CustomerController@updateCustomer');
Route::get('/cussearch','CustomerController@searchCustomer');
Route::get('/cusgetall','CustomerController@getAll');



Route::get('/item.html','ItemController@index');
Route::get('/additem','ItemController@addItem');
Route::get('/deleteitem','ItemController@deleteItem');
Route::get('/searchitem','ItemController@searchItem');
Route::get('/updateitem','ItemController@updateItem');
Route::get('/getallitem','ItemController@getAll');


Route::get('/order.html','OrdersController@index');
Route::get('/purchaseorder','OrdersController@purchase');



//Route::get('/customer.html/{id}', function ($id) {
//    return $id;
//});
