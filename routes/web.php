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
Route::group(['middleware' => ['auth']],function()
{

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
  Route::get('/pmms_tab','ExecutiveController@pmms_index')->name('Exec_pmms_tab');
  Route::get('/tpv_tab','ExecutiveController@tpv_index')->name('Exec_tpv_tab');
  Route::get('/specialAssign_tab','ExecutiveController@specialassign_index')->name('Exec_special_tab');
  Route::get('/inquiry','ExecutiveController@inquiry_index')->name('Exec_inquiry_tab');
  Route::get('/other_tab','ExecutiveController@other_index')->name('Exec_other_tab');

  Route::get('/evaluation_tab','ExecutiveController@evaluation_index')->name('Exec_evaluation_tab');
  Route::get('/evaluation_assigned','ExecutiveController@evaluation_assignedprojects')->name('Exec_evaluation_assigned');
  Route::get('/evaluation_completed','ExecutiveController@evaluation_completedprojects')->name('Exec_evaluation_completed');
});

//officers
Route::prefix('officer')->group(function () {
  Route::get('/main','OfficerController@evaluation_main')->name('main_page');
  Route::get('/','OfficerController@evaluation_index')->name('new_evaluation');

  Route::post('/acknowledged','OfficerController@assignProjectAcknowledged')->name('assignProjectAcknowledged');
  Route::post('/submitActivities','OfficerController@activitiesSubmit')->name('activitiesSubmit');

  Route::get('/inprogress_evaluation','OfficerController@evaluation_inprogress')->name('inprogress_evaluation');
  Route::get('/activities_evaluation/{project_id}','OfficerController@evaluation_activities')->name('evaluation_activities');
  Route::get('/completed_evaluation','OfficerController@evaluation_completed')->name('completed_evaluation');

});

});
