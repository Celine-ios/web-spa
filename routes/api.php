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

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');
Route::post('/add_tags', 'ApiRest\ApiController@add_tags');
Route::post('/add_caracteristics', 'ApiRest\ApiController@add_caracteristics');
Route::post('/carga_board/{board}', 'ApiRest\ApiController@carga_board');
Route::post('/carga_procesador/{procesador}', 'ApiRest\ApiController@carga_procesador');
Route::post('/carga_ram/{ram}', 'ApiRest\ApiController@carga_ram');
Route::post('/search_product', 'ApiRest\ApiController@search_product');
Route::get('get_brands', 'ApiRest\ApiController@get_brands');
Route::get('get_products', 'ApiRest\ApiController@get_products');
Route::post('getcaracteristics','ApiRest\ApiController@getcaracteristics');
Route::post('geteachcaracteristic','ApiRest\ApiController@geteachcaracteristic');
Route::post('push_post',[
	'as'   => 'push_post',
	'uses' => 'ApiRest\ApiController@push_post'
	]);
