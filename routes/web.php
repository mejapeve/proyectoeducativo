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

Route::post('register_student', 'TutorController@register_student')->name('register_student');

/*
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');
*/

Auth::routes();
Route::get('testangular', 'HomeController@testangular')->name('testangular');

Route::get('shoppingcard', ['as' => 'shoppingcard', 'uses' => 'Shopping\ShoppingCardController@index']);
Route::get('/fileupload', ['as' => 'fileupload', 'uses' => 'Admin\FileUploadController@index']);

Route::get('get_companies', 'CompanyController@get_companies')->name('get_companies');
Route::get('get_departments', 'DepartmentController@get_departments')->name('get_departments');
Route::get('get_cities', 'CityController@get_cities')->name('get_cities');
Route::get('get_company_sequences/{company_id?}', 'CompanyController@get_company_sequences')->name('get_company_sequences');
Route::get('get_company_groups/{company_id?}', 'CompanyController@get_company_groups')->name('get_company_groups');



Route::get('list_files', 'BulkLoadController@list_files')->name('list_files');
Route::get('read_file', 'BulkLoadController@read_file')->name('read_file');
