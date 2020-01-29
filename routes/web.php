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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('company', 'InventoryController@company');
Route::get('supplier', 'InventoryController@supplier');
Route::post('deliver', ['as' => 'supplier.deliver', 'uses' => 'InventoryController@deliver']);


//Route::get('insert', function () {
//    DB::table('products')->insert([
//       ['name' => 'product_01'],
//       ['name' => 'product_02'],
//       ['name' => 'product_03'],
//       ['name' => 'product_04'],
//    ]);
//});
