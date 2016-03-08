<?php

Route::group(['middleware' => ['web']], function () {


        Route::get('contact', ['as'=>'store.contact', 'uses'=>'StoreController@contact']);


        // Authentication Routes
        Route::get('login', ['as' => 'loginform', 'uses' => 'Auth\AuthController@showLoginForm']);
        Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

        // Cart Routes
        Route::get('cart', ['as' => 'store.cart', 'uses' => 'CartController@cart']);
        Route::post('cart', ['as' => 'store.cart.add', 'uses' => 'CartController@addToCart']);
        Route::put('cart', ['as' => 'store.cart.update', 'uses' => 'CartController@updateCart']);
        Route::delete('cart', ['as' => 'store.cart.remove', 'uses' => 'CartController@removeFromCart']);


        // Admin Routes
        Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'auth.admin']], function() {
            Route::resource('categories', 'Admin\CategoriesController', ['only' => ['index', 'store', 'destroy']]);

            Route::resource('products', 'Admin\ProductsController', ['only' => ['index', 'store', 'destroy']]);
        });

        // Registration Routes
        Route::get('register', ['as' => 'registerform', 'uses' => 'Auth\AuthController@showRegistrationForm']);
        Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@register']);

        Route::get('search', ['as' => 'store.search', 'uses' => 'StoreController@search']);

        Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);

        Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
        Route::get('product/{id}', ['as' => 'store.show', 'uses' => 'StoreController@show']);


        Route::post('products/toggle-availability',
            [
                'as' => 'admin.products.toggle',
                'uses' => 'Admin\ProductsController@toggleAvailability'
            ]
        );

});
