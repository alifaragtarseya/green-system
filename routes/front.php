<?php

// Home Route

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    $controller = 'HomeController@';
    Route::get('/', $controller . 'index');
    Route::get('home', $controller . 'index');
    Route::post('request', $controller . 'store');
});

// About Route
Route::group(['prefix' => 'about/'], function () {
    $controller = 'AboutController@';
    Route::get('/', $controller . 'index')->name('front.about');
});

// Services Route
Route::group(['prefix' => 'services/'], function () {
    $controller = 'ServicesController@';
    Route::get('/', $controller . 'index')->name('front.services');
    Route::get('{id}', $controller . 'view')->name('front.show.services');
});


// products Route
Route::group(['prefix' => 'products/'], function () {
    $controller = 'ProductController@';
    Route::get('/', $controller . 'index')->name('front.products');
    Route::get('{id}', $controller . 'view')->name('front.show.products');
});

// blogs Route
Route::group(['prefix' => 'blogs/'], function () {
    $controller = 'BlogController@';
    Route::get('/', $controller . 'index')->name('front.blogs');
    Route::get('{id}', $controller . 'view')->name('front.show.blogs');
});

// Contact Route
Route::group(['prefix' => 'contact/'], function () {
    $controller = 'ContactController@';
    Route::get('/', $controller . 'index')->name('front.contact');
    // Route::post('/', $controller . 'store')->name('front.contact');
});

// lang Route
Route::get('lang', 'LangController@changeLang')->name('front.lang');
