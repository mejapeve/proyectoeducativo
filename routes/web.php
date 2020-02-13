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
})->name('home');
/*

Route::prefix('conexiones')
   ->group(function() {

       Route::namespace('Auth\Login')
           ->group(function() {
               Route::get('pruebalogin', 'AfiliadoEmpresaController@index')->name('pruebalogin');
           });
        Route::get('pruebalogin', 'PruebaController@index')->as('pruebalogin');
    });*/
Route::get('{empresa}/loginform', ['as' => 'loginform', 'uses' => 'PruebaController@index']);
Route::prefix('employee')
    ->as('employee.')
    ->group(function() {

        Route::get('home', 'Home\AfiliadoHomeController@index')->name('home');

        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login/{empresa?}', 'AfiliadoEmpresaController@showLoginForm')->name('login');
                Route::post('login/{rol?}', 'AfiliadoEmpresaController@login')->name('login');
                Route::post('logout', 'AfiliadoEmpresaController@logout')->name('logout');
            });

        Route::get('redirectfacebook/{rol}', 'Auth\LoginController@redirectToProvider')->name('redirectfacebook');
        Route::get('callback', 'Auth\LoginController@handleProviderCallback')->name('callback');
        Route::get('redirectgmail/{rol}', 'Auth\LoginController@redirectToProviderGmail')->name('redirectgmail');
        Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');
    });

Route::group(['middleware' =>['auth:afiliadoempresa', 'companyaffiliated'] ], function() {
    Route::get('/profile', function () {
        return 'esta loggeado';
    });
    Route::get('teacher', 'TeacherController@index')->middleware('role:teacher')->name('teacher');
    Route::get('tutor', 'TutorController@index')->middleware('role:tutor')->name('tutor');
    Route::get('student', 'StudentController@index')->middleware('role:student')->name('student');
});

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');

Route::get('testangular', 'HomeController@testangular')->name('testangular');



