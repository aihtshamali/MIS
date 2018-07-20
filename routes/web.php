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

Auth::routes();
Route::get('/', function () {
    return view('home');
});


Route::get('/home', function(){
  return view('home');
});
Route::group(['middleware' => ['auth']],function(){

Route::get('/conversations/{id}', 'ChatController@show');
Route::resource('/roles','RolesController');
Route::resource('/accountRequest','AccountRequestController');
Route::resource('projects','ProjectController');
Route::resource('SponsorAgency','SponsorAgencyController');
Route::resource('ExecutingAgency','ExecutingAgencyController');
Route::resource('/permissions','PermissionsController');
Route::get('/rolespermissionsusers/create','RolesPermissionsUsersController@create');
Route::post('/rolesandpermissions','RolesPermissionsUsersController@rolesandpermissionsstore');
Route::post('/usersandroles','RolesPermissionsUsersController@rolesandusersstore');
Route::post('/usersandpermissions','RolesPermissionsUsersController@usersandpermissionstore');
Route::get('/rolespermissionsusers/view','RolesPermissionsUsersController@index');
Route::get('/admin',function()
{
    return view('admindashboard');
});
Route::resource('/profile','ProfileController');
// For Executive
Route::prefix('executive')->group(function () {
  Route::get('/','ExecutiveController@index')->name('Exec_home');
  Route::get('/pems_tab','ExecutiveController@pems_index')->name('Exec_pems_tab');
  Route::get('/evaluation_tab','ExecutiveController@evaluation_index')->name('Exec_evaluation_tab');
});

Route::resource('assignproject','ProjectAssignController');
});
