<?php

use App\Models\Companies;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('welcome');
})->name('home');

Route::get('/acercade', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/contactenos', function () {
    return view('contactus');
})->name('contactus');

Route::get('/guias_de_aprendizaje', function () {
    return view('sequences.search');
})->name('sequences.search');

Route::get('/guia_de_aprendizaje/{sequence_name}', function () {
    return view('sequences.get');
})->name('sequences.get');

Route::get('/implementos_de_laboratorio', function () {
    return view('elementsKits');
})->name('elementsKits');

Route::get('{empresa}/loginform', 'DataAffiliatedCompanyController@index')->middleware('company')->name('loginform');
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
    Route::get('{empresa}/teacher', 'TeacherController@index')->middleware('role:teacher','company')->name('teacher');
    Route::get('{empresa}/tutor', 'TutorController@index')->middleware('role:tutor','company')->name('tutor');
	Route::get('{empresa}/tutor/profile', 'TutorController@showProfile')->middleware('role:tutor','company')->name('tutorProfile');
    Route::get('{empresa}/student/', 'StudentController@index')->middleware('role:student','company')->name('student');
    Route::get('{empresa}/admin/', 'AdminController@index')->middleware('role:admin','company')->name('admin');
    Route::get('{empresa}/student/avatar', 'AvatarController@index')->middleware('role:student','company')->name('avatar');
});

Route::get('{empresa}/tutor/registry_student/', 'TutorController@showRegisterStudentForm')->middleware('company')->name('registerStudent');
Route::post('register_student', 'TutorController@register_student')->name('register_student');

Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');
/*
Route::get('login/github', 'Auth\LoginController@redirectToProvider');


*/

Route::get('testangular', 'HomeController@testangular')->name('testangular');

Route::get('shoppingcard', ['as' => 'shoppingcard', 'uses' => 'Shopping\ShoppingCardController@index']);
Route::get('/conexiones/admin/fileupload', ['as' => 'fileupload', 'uses' => 'Admin\FileUploadController@index']);
Route::get('/conexiones/admin/fileuploadlogs', ['as' => 'fileuploadlogs', 'uses' => 'Admin\FileUploadLogsController@index']);
Route::post('/fileupload/action', ['as' => 'fileuploadAction', 'uses' => 'Admin\FileUploadController@store']);

Route::get('get_companies', 'CompanyController@get_companies')->name('get_companies');
Route::get('get_departments', 'DepartmentController@get_departments')->name('get_departments');
Route::get('get_cities', 'CityController@getCitiesList')->name('get_cities');
Route::get('get_countries', 'CountryController@getCountriesList')->name('get_countries');
Route::get('get_company_sequences/{company_id?}', 'CompanyController@get_company_sequences')->name('get_company_sequences');

Route::get('get_company_groups/{company_id?}', 'CompanyController@get_company_groups')->name('get_company_groups');
Route::get('get_teachers_company/{company_id?}', 'CompanyController@get_teachers_company')->name('get_teachers_company');

Route::get('get_students_tutor', 'TutorController@get_students_tutor')->name('get_students_tutor');


Route::get('list_files', 'BulkLoadController@list_files')->name('list_files');
Route::get('read_file', 'BulkLoadController@read_file')->name('read_file');
Route::get('import', ['as' => 'import', 'uses'=> 'Admin\UsersController@import']);
Route::get('error', ['as' => 'error', 'uses'=> 'Admin\UsersController@import']);

Route::get('{empresa}/password/sendlink', 'Auth\ForgotPasswordController@showLinkRequestForm')->middleware('company')->name('password.sendlink');
Route::post('{empresa}/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->middleware('company')->name('password.email');
Route::get('{empresa}/password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->middleware('company')->name('password.reset');
Route::post('{empresa}/password/reset', 'Auth\ResetPasswordController@reset')->middleware('company')->name('password.update');

Route::post('/send_email_contactus', 'ContactusController@send_email_contactus')->name('send_email_contactus');

Route::get('get_kit_elements', 'KitElementController@get_kit_elements')->name('get_kit_elements');
Route::get('get_rating_plans', 'RatingPlanController@get_rating_plans')->name('get_rating_plans');
//servicios secuencias
Route::get('get_sequence/{sequence_id}', 'SequencesController@get')->name('get_sequence');
Route::post('create_sequence', 'SequencesController@create')->name('create_sequence');
Route::post('update_sequence', 'SequencesController@update')->name('update_sequence');
Route::post('update_sequence_section', 'SequencesController@update_sequence_section')->name('update_sequence_section');



Route::get('page500', function(){
    return view('page500',['companies'=>Companies::all()]);
})->name('page500');