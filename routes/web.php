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
    return redirect()->route('profile');
});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'middleware' => 'guest'], function($router) {
    $router->get('login', 'LoginController@index')->name('login');
    $router->post('login', 'LoginController@login')->name('login.post');
    $router->get('registration', 'RegistrationController@index')->name('registration');
    $router->post('registration', 'RegistrationController@create')->name('registration.post');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth', 'namespace' => 'Profile'], function ($router) {
    $router->get('/', 'ProfileController@index')->name('profile');
});
