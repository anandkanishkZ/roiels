<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Backend')->prefix('v1')->group(function () {
    Route::get('/category', 'ApiController@categoryIndex')->name('backend.category.index');
    Route::get('/category/{id}/show', 'ApiController@categoryShow')->name('backend.category.show');
    Route::get('/products', 'ApiController@productIndex')->name('backend.product.index');

});

Route::get('slider/create', 'API\SliderController@create')->name('backend.slider.create');
Route::post('slider', 'API\SliderController@store')->name('backend.slider.store');
Route::get('slider', 'API\SliderController@index')->name('backend.slider.index');
Route::get('slider/{id}/edit', 'API\SliderController@edit')->name('backend.slider.edit');
Route::put('slider/{id}/update', 'API\SliderController@update')->name('backend.slider.update');
Route::delete('slider/{id}/delete', 'API\SliderController@destroy')->name('backend.slider.destroy');
Route::get('slider/{id}/show', 'API\SliderController@show')->name('backend.slider.show');
