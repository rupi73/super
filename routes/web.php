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

Route::get('/', 'DashboardController@index')->middleware('auth')->name('dashboard');
Route::resource('addonproducts','AddonproductController');
Route::resource('catmargins','CategoryMarginsController');
Route::resource('papers','PapersController');
Route::resource('clients','ClientsController');
Route::resource('treatments','TreatmentsController');
Route::resource('orders','OrdersController');
Route::resource('products','ProductsController');
Route::resource('quantity','QuantitiesController');
Route::resource('sizes','SizesController');
Route::resource('category','CategoriesController');
Route::resource('gsm','GsmsController');
Route::resource('paper-prices','PaperPricesController');
Route::resource('treatments','TreatmentsController');
Route::resource('treatment-prices','TreatmentPricesController');
Route::resource('products','ProductsController');
Auth::routes();
Route::resource('roles','RolesController');
Route::resource('users','UsersController');
Route::resource('quotes','QuotesController');
Route::resource('orders','OrdersController');
Route::resource('wallets','WalletsController');
Route::post('/orders/quotestore', 'OrdersController@quoteStore')->name('orders.qstore');
Route::post('/order/pay', 'OrdersController@payOrder')->name('order.pay');
Route::get('/orders/create/{order?}', 'QuotesController@create')->name('orders.qcreate');
Route::get('/orders/edit/{order}/{record}', 'QuotesController@create')->name('orders.qedit');
Route::get('/quotes/edit/{order}/{record}', 'QuotesController@create')->name('quotes.qedit');
Route::post('/wallets/add', 'WalletsController@addPaymentRazor')->name('wallets.addRazor');
//Route::post('/wallets/franchises', 'WalletsController@franchises')->name('wallets.franchises');
Route::get('/wallets/franchise/{id?}', 'WalletsController@franchise')->name('wallets.franchise');
/*Route::get('/home', 'HomeController@index')->name('home');*/

/*API Calls*/
Route::get('/japi/papers','JsApiController@papers');
Route::get('/japi/categories','JsApiController@categories');
Route::get('/japi/categories/sizes-qnty','JsApiController@sizesQnties');
Route::post('/japi/save_paper_prices','JsApiController@savePaperPrices');
Route::get('/japi/treatments','JsApiController@treatments');
Route::get('/japi/cat-qnty','JsApiController@catQnties');
Route::post('/japi/save_treatment_prices','JsApiController@saveTreatmentPrices');
Route::get('/quotes/create','QuotesController@create')->name('quotes.create');

Route::get('/catjson/{category}','CategoriesController@createJson');