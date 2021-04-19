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

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}']
], function() {
    Route::get('/sell-my-car', "HomeController@sellMyCar");
    Route::get('/vin', "SellerController@vin");
    Route::post('/sell-car-step-one', "SellerController@stepOne");
    Route::post('/sell-car-step-two', "SellerController@stepTwo");
    Route::post('/sell-car-step-three', "SellerController@stepThree");
    Route::post('/sell-car-upload', "SellerController@stepUpload");
    Route::get('/search', 'SearchController@index');
    Route::get('/', 'HomeController@index');
    Route::get('/product/{id}', "ProductController@index");
    Route::get('/enquire/{id}', "EnquireController@index");
    Route::get('/{slug}', 'HomeController@index');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\VerificationController@logout');
Route::get('/wishlist/save', 'WishlistController@save');
Route::get('/get-models', 'MakeController@getMakeModels');
Route::get('/car-models/get-models', 'CarModelController@getModels');
Route::post('/send-enquire', 'EnquireController@send');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
