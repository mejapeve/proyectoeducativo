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
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
/*
Route::view('/login', 'prueba', ['name' => 'Taylor']);
Route::get('{nombre?}/loginparam', 'LoginController@index')->name('login');*/
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {

        Route::get('home', 'Home\AfiliadoHomeController@index')->name('home');

        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login/{empresa?}', 'AfiliadoEmpresaController@showLoginForm')->name('login');
                Route::post('login', 'AfiliadoEmpresaController@login')->name('login');
                Route::post('logout', 'AfiliadoEmpresaController@logout')->name('logout');
                //Route::get('redirect', 'AfiliadoEmpresaController@redirect')->name('redirect');
                //Route::get('callback', 'AfiliadoEmpresaController@callback')->name('callback');

            });
        Route::get('redirectfacebook', 'Auth\LoginController@redirectToProvider')->name('redirectfacebook');
        Route::get('callback', 'Auth\LoginController@handleProviderCallback')->name('callback');
        Route::get('redirectgmail', 'Auth\LoginController@redirectToProviderGmail')->name('redirectgmail');
        Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');
    });

Route::group(['middleware' => 'auth:afiliadoempresa'], function() {
    Route::get('/profile', function () {
        return 'esta loggeado';
    });
});


Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
