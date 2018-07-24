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
Route::get('/assignproject','ProjectAssignController@index');
Route::post('/assignproject','ProjectAssignController@store');
});
Route::resource('project_type','ProjectTypeController');
Route::resource('evaluation_type','EvaluationTypeController');
Route::resource('sub_sector','SubSectorController');
Route::resource('sector','SectorController');
Route::get('createproject','DataEntryController@create_project');
Route::post('/onchangefunction','DataEntryController@onSubSectorSelect');
Route::post('project/store','DataEntryController@store')->name('project.store');
Route::get('project/form','DataEntryController@form')->name('project.form');
Route::post('/onsectorselect','DataEntryController@onSectorSelect');
Route::post('/onnewprojectselect','DataEntryController@newproject');
