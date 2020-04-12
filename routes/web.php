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

Route::get('/guia_de_aprendizaje/{sequence_id}/{sequence_name}', function () {
    return view('sequences.get');
})->name('sequences.get');

Route::get('/implementos_de_laboratorio', function () {
    return view('elementsKits.search');
})->name('elementsKits.search');

Route::get('/kit_de_laboratorio/{kit_id}/{kit_name}', function () {
    return view('elementsKits.getKit');
})->name('elementsKits.getKit');

Route::get('/elemento_de_laboratorio/{element_id}/{element_name}', function () {
    return view('elementsKits.getElement');
})->name('elementsKits.getElement');

Route::get('/planes_de_acceso', function () {
    return view('ratingPlan.list');
})->name('ratingPlan.list');

Route::get('/plan_de_acceso/{rating_plan_id}/{rating_name}', function () {
    return view('ratingPlan.detail');
})->name('ratingPlan.detailSequence');

Route::get('registro_afiliado/{ratingPlanId}', 'RatingPlanController@validate_free_plan')->name('validate_free_plan');
Route::get('registro_afiliado/', 'Auth\RegisterController@show_register')->name('registerForm');


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


Route::group(['middleware' =>['auth:afiliadoempresa', 'companyaffiliated', 'company'] ], function() {
    Route::get('/profile', function () {
        return 'esta loggeado';
    });
    Route::get('{empresa}/teacher', 'TeacherController@index')->middleware('role:teacher')->name('teacher');
    Route::get('{empresa}/tutor', 'TutorController@index')->middleware('role:tutor')->name('tutor');
    Route::get('{empresa}/tutor/profile', 'TutorController@showProfile')->middleware('role:tutor')->name('tutorProfile');
    Route::get('{empresa}/student/', 'StudentController@index')->middleware('role:student')->name('student');
    Route::get('{empresa}/admin/', 'AdminController@index')->middleware('role:admin')->name('admin');
    Route::get('{empresa}/student/avatar', 'AvatarController@index')->middleware('role:student','company')->name('avatar');
    Route::post('{empresa}/student/update_avatar', 'AvatarController@update_avatar')->middleware('role:student')->name('update_avatar');
    Route::get('{empresa}/student/secuencias', 'StudentController@show_available_sequences')->middleware('role:student')->name('student.available_sequences');
    Route::get('{empresa}/student/secuencia/{sequence_id}/situacion_generadora', 'StudentController@show_sequences_section_1')->middleware('role:student')->name('student.sequences_section_1');
    Route::get('{empresa}/student/secuencia/{sequence_id}/Mapa_de_ruta', 'StudentController@show_sequences_section_2')->middleware('role:student')->name('student.sequences_section_2');
    Route::get('{empresa}/student/secuencia/{sequence_id}/Guia_de_saberes', 'StudentController@show_sequences_section_3')->middleware('role:student')->name('student.sequences_section_3');
    Route::get('{empresa}/student/secuencia/{sequence_id}/Punto_de_encuentro', 'StudentController@show_sequences_section_4')->middleware('role:student')->name('student.sequences_section_4');
                                                                                                                                                                                      
    
    Route::get('{empresa}/student/momento/{sequence_id}/{order_moment_id}/{section}', 'StudentController@show_moment_section')->middleware('role:student')->name('student.show_moment_section');
    
    Route::get('{empresa}/tutor/registry_student/', 'TutorController@showRegisterStudentForm')->middleware('role:tutor')->name('registerStudent');
});

//servcios carrito de comprar
Route::group([],function (){
        Route::get('carrito_de_compras', 'Shopping\ShoppingCartController@index')->name('shoppingCart');
        Route::get('get_shopping_cart/{user}', 'Shopping\ShoppingCartController@get_shopping_cart')->name('get_shopping_cart');//->middleware('auth:afiliadoempresa');
        Route::get('checkout', ['as' => 'checkout', 'uses' => 'Shopping\CheckoutController@index']);
        Route::post('update_shopping_cart', 'Shopping\ShoppingCartController@update')->name('update_shopping_cart');//->middleware('auth:afiliadoempresa');
        Route::post('create_shopping_cart', 'Shopping\ShoppingCartController@create')->name('create_shopping_cart');//->middleware('auth:afiliadoempresa');

    }
);

Route::get('{empresa}/tutor/registry_student/', 'TutorController@showRegisterStudentForm')->middleware('company')->name('registerStudent');
Route::post('register_student', 'TutorController@register_student')->name('register_student');

Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('callbackgmail', 'Auth\LoginController@handleProviderCallbackGmail')->name('callbackgmail');

Route::get('testangular', 'HomeController@testangular')->name('testangular');


Route::get('/conexiones/admin/fileupload', ['as' => 'fileupload', 'uses' => 'Admin\FileUploadController@index']);
Route::get('/conexiones/admin/fileuploadlogs', ['as' => 'fileuploadlogs', 'uses' => 'Admin\FileUploadLogsController@index']);
Route::post('/fileupload/action', ['as' => 'fileuploadAction', 'uses' => 'Admin\FileUploadController@store']);

Route::get('get_companies', 'CompanyController@get_companies')->name('get_companies');
Route::get('get_departments', 'DepartmentController@get_departments')->name('get_departments');
Route::get('get_cities', 'CityController@getCitiesList')->name('get_cities');
Route::get('get_countries', 'CountryController@getCountriesList')->name('get_countries');
Route::get('get_company_sequences/{company_id?}', 'CompanyController@get_company_sequences')->name('get_company_sequences');

Route::get('get_company_groups/{company_id?}', 'CompanyController@get_company_groups')->name('get_company_groups');
Route::get('get_teachers_company/{company_id?}', 'CompanyController@get_teachers_company')->    name('get_teachers_company');

Route::get('get_students_tutor', 'TutorController@get_students_tutor')->name('get_students_tutor');


Route::get('list_files', 'BulkLoadController@list_files')->name('list_files');
Route::get('read_file', 'BulkLoadController@read_file')->name('read_file');
Route::get('import', ['as' => 'import', 'uses'=> 'Admin\UsersController@import']);
Route::get('error', ['as' => 'error', 'uses'=> 'Admin\UsersController@import']);

Route::get('{empresa}/password/sendlink', 'Auth\ForgotPasswordController@showLinkRequestForm')->middleware('company')->name('password.sendlink');
Route::post('{empresa}/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->middleware('company')->name('password.email');
Route::get('{empresa}/password/reset/{token}/{rol}', 'Auth\ForgotPasswordController@showResetForm')->middleware('company')->name('password.reset');
Route::post('{empresa}/password/reset/{rol}', 'Auth\ResetPasswordController@reset')->middleware('company')->name('password.update');

Route::post('/send_email_contactus', 'ContactusController@send_email_contactus')->name('send_email_contactus');

Route::get('get_kit_elements', 'KitElementController@get_kit_elements')->name('get_kit_elements');
Route::get('get_kit_element/kit/{kid_id}', 'KitElementController@get_kit')->name('get_kit_by_id');
Route::get('get_kit_element/element/{element_id}', 'KitElementController@get_element')->name('get_element_by_id');

//servcio planes
Route::get('get_rating_plans', 'RatingPlanController@get_rating_plans')->name('get_rating_plans');
Route::get('get_rating_plan/{rating_plan_id}', 'RatingPlanController@get_rating_plan_detail')->name('get_rating_plan');
Route::post('create_rating_plan', 'RatingPlanController@create')->name('create_rating_plan');

//servicios secuencias
Route::get('get_sequence/{sequence_id}', 'SequencesController@get')->name('get_sequence');
Route::post('create_sequence', 'SequencesController@create')->name('create_sequence');
Route::post('update_sequence', 'SequencesController@update')->name('update_sequence');
Route::post('update_sequence_section', 'SequencesController@update_sequence_section')->name('update_sequence_section');
//servicios momentos
Route::post('update_moment', 'MomentController@update')->name('update_moment');
Route::post('update_moment_section', 'MomentController@update_moment_section')->name('update_moment_section');
//servicios momentos
Route::post('update_experience', 'ExperienceController@update')->name('update_experience');
Route::post('update_experience_section', 'ExperienceController@update_experience_section')->name('update_experience_section');


//servicio para consultar cursos asignados // cambiar por varibale de sesion company_id
Route::get('get_available_sequences/{company_id}', 'StudentController@get_available_sequences')->name('get_available_sequences');
//servicio para consultar servicios contratados
Route::get('get_account_services/{affiliated_id}', 'AffiliatedAccountServiceController@get')->name('get_account_services');


Route::get('page500', function(){
    return view('page500',['companies'=>Companies::all()]);
})->name('page500');