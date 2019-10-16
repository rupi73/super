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

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('papers','PapersController');
Route::resource('treatments','TreatmentsController');
Route::resource('orders','OrdersController');
Route::resource('products','ProductsController');
Route::resource('quantity','QuantitiesController');
Route::resource('sizes','SizesController');
Route::resource('category','CategoriesController');
Route::resource('gsm','GsmsController');
Route::resource('paper-prices','PaperPricesController');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

/*API Calls*/
Route::get('/japi/papers','JsApiController@papers');
Route::get('/japi/categories','JsApiController@categories');
Route::get('/japi/categories/sizes-qnty','JsApiController@sizesQnties');
Route::post('/japi/save_paper_prices','JsApiController@savePaperPrices');