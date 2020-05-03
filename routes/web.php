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

use App\Http\Controllers\ProductCategoryController;

Route::get('/', function () {
    $data = 'Data';
    return view('index', ['data' => $data]);
});

// Route::get('/product-category', function () {
//     return view('master.product-category');
// });

// Route::get('/product-category', 'ProductCategoryController@index');
// Route::get('/product-category/create', 'ProductCategoryController@create');
// Route::post('/product-category', 'ProductCategoryController@store');
// Route::get('/product-category/{productCategory}/edit', 'ProductCategoryController@edit');
// Route::patch('/product-category/{productCategory}', 'ProductCategoryController@update');
// Route::delete('/product-category/{productCategory}', 'ProductCategoryController@destroy');
//Change that many route above into one line if using resources
Route::resource('product-category', 'ProductCategoryController');
Route::resource('product', 'ProductController');
Route::resource('delivery-note', 'DeliveryNoteController');
Route::resource('production-order', 'ProductionOrderController');
Route::resource('delivery-request', 'DeliveryRequestController');

