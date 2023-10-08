<?php

use Illuminate\Support\Facades\Route;


// Before Login Dashboard Routes
Route::group(['middleware' => 'adminGuest:admin'], function () {
    $controller = 'AuthController@';
    // Route Login
    Route::get('login', $controller . 'view');
    Route::post('login', $controller . 'login');
});

// After Login Dashboard Routes
Route::group(['middleware' => 'adminWeb:admin'], function () {

    // Route Logout
    Route::post('logout', 'AuthController@logout');

    // lang Route
    Route::get('lang', 'LangController@changeLang')->name('dashboard.lang');

    // Route Home
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('home', 'HomeController@index')->name('dashboard/home');

    // Profile Route
    Route::group(['prefix' => 'profile/'], function () {
        $controller = 'ProfileController@';
        Route::get('/', $controller . 'index');
        Route::get('edit', $controller . 'edit');
        Route::post('update', $controller . 'update');
    });

    // Setting Route
    Route::group(['prefix' => 'setting'], function () {
        $controller = 'SettingController@';
        Route::get('/', $controller . 'index')->name('setting');
        Route::post('/', $controller . 'update')->name('update-setting');
        Route::get('/mission', $controller . 'getMission')->name('dashboard.setting.mission');
        Route::get('/goal', $controller . 'getGoal')->name('dashboard.setting.goal');
        Route::get('/about-images', $controller . 'getAboutImages')->name('dashboard.setting.about-images');
        Route::get('/vision', $controller . 'getVision')->name('dashboard.setting.vision');
        Route::get('/principle', $controller . 'getPrinciple')->name('dashboard.setting.principle');
        Route::get('/mission', $controller . 'getMission')->name('dashboard.setting.mission');
        Route::post('/update-mySetting', $controller . 'updateMySetting')->name('dashboard.setting.update');

    });

    // Icons Route
    Route::get('icons', 'IconsController@index')->name('icons');

    // Slider Route
    Route::group(['prefix' => 'slider'], function () {
        $controller = 'SliderController@';
        $route = 'dashboard.slider.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::post('{id}/delete', $controller . 'destroy')->name($route . 'delete');
        Route::post('deletes', $controller . 'deletes')->name($route . 'deletes');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');

    });

    // About Route
    Route::group(['prefix' => 'about'], function () {
        $controller = 'AboutController@';
        $route = 'dashboard.about.';
        Route::get('{id}/view', $controller . 'index')->name(substr($route, 0, -1));
        Route::post('{id}/view', $controller . 'update')->name($route . 'update');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // Services Route
    Route::group(['prefix' => 'services'], function () {
        $controller = 'ServicesController@';
        $route = 'dashboard.services.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // Feature Route
    Route::group(['prefix' => 'features'], function () {
        $controller = 'FeatureController@';
        $route = 'dashboard.features.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // Category Route
    Route::group(['prefix' => 'categories'], function () {
        $controller = 'CategoryController@';
        $route = 'dashboard.categories.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
    });

    // Services Route
    Route::group(['prefix' => 'blogs'], function () {
        $controller = 'BlogController@';
        $route = 'dashboard.blogs.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // our work Route
    Route::group(['prefix' => 'our_works'], function () {
        $controller = 'OurWorkController@';
        $route = 'dashboard.our_works.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // Customer Review Route
    Route::group(['prefix' => 'customer_reviews'], function () {
        $controller = 'CustomerReviewController@';
        $route = 'dashboard.customer_reviews.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // our customer Route
    Route::group(['prefix' => 'our_customers'], function () {
        $controller = 'OurCustomerController@';
        $route = 'dashboard.our_customers.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // Projects Route
    Route::group(['prefix' => 'projects'], function () {
        $controller = 'ProjectsController@';
        $route = 'dashboard.projects.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
        // Images Project Route
        Route::group(['prefix' => '{id}/images'], function () use ($controller, $route) {
            Route::get('/', $controller . 'images')->name($route . 'images');
            Route::post('/', $controller . 'imagesStore')->name($route . 'images.update');
            Route::post('{img}/delete', $controller . 'imagesDelete')->name($route . 'images.delete');
        });
    });

    // Products Route
    Route::group(['prefix' => 'products'], function () {
        $controller = 'ProductController@';
        $route = 'dashboard.products.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');

        Route::get('{id}/features', $controller . 'features')->name($route . 'features');
        Route::get('{id}/features/create', $controller . 'featuresCreate')->name($route . 'features.create');
        Route::post('{id}/features/store', $controller . 'featureStore')->name($route . 'features.store');
        Route::post('{id}/features/delete/{featureId}', $controller . 'featureDelete')->name($route . 'feature.delete');

        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('{id}/status', $controller . 'status')->name($route . 'status');
        // Images Product Route
        Route::group(['prefix' => '{id}/images'], function () use ($controller, $route) {
            Route::get('/', $controller . 'images')->name($route . 'images');
            Route::post('/', $controller . 'imagesStore')->name($route . 'images.update');
            Route::post('{img}/delete', $controller . 'imagesDelete')->name($route . 'images.delete');
        });
    });

    // Contact Route
    Route::group(['prefix' => 'contact'], function () {
        $controller = 'ContactController@';
        $route = 'dashboard.contact.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::get('meta', $controller . 'meta')->name($route . 'meta');
        Route::post('meta', $controller . 'metaUpdate')->name($route . 'meta.update');
    });

    // Requests Route
    Route::group(['prefix' => 'requests'], function () {
        $controller = 'ContactController@';
        $route = 'dashboard.requests.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('{id}/view', $controller . 'view')->name($route . 'view');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
    });


});
