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

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');


Route::get('{empresa}/loginform', ['as' => 'loginform', 'uses' => 'DataAffiliatedCompanyController@index']);
Route::get('conexiones/loginform/admin', ['as' => 'loginformadmin', 'uses' => 'DataAffiliatedCompanyController@index_admin']);

Route::prefix('user')
    ->as('user.')
    ->group(function() {
        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login/{empresa?}', 'AffiliatedCompanyController@showLoginForm')->name('login');
                Route::post('login/{rol?}', 'AffiliatedCompanyController@login')->name('login');
                Route::post('logout', 'AffiliatedCompanyController@logout')->name('logout');
            });
        Route::get('home', 'Home\AfiliadoHomeController@index')->name('home');

        Route::get('redirectfacebook/{rol}', 'Auth\LoginController@redirectToProvider')->name('redirectfacebook');
        Route::get('callback', 'Auth\LoginController@handleProviderCallback')->name('callback');
        Route::get('redirectgmail/{rol}', 'Auth\LoginController@redirectToProviderGmail')->name('redirectgmail');
        Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');
    });

Route::group(['middleware' =>['auth:afiliadoempresa', 'companyaffiliated'] ], function() {
    Route::get('/profile', function () {
        return 'esta loggeado';
    });
    Route::get('{empresa}/teacher', 'TeacherController@index')->middleware('role:teacher')->name('teacher');
    Route::get('{empresa}/tutor', 'TutorController@index')->middleware('role:tutor')->name('tutor');
    Route::get('{empresa}/student/', 'StudentController@index')->middleware('role:student')->name('student');
    Route::get('{empresa}/admin/', 'AdminController@index')->middleware('role:admin')->name('admin');


});

/*
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');
*/
Auth::routes();
Route::get('testangular', 'HomeController@testangular')->name('testangular');

Route::get('shoppingcard', ['as' => 'shoppingcard', 'uses' => 'Shopping\ShoppingCardController@index']);


