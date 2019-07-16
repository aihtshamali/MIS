<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
    Route::get('logout','UserController@logout');
    Route::get('assignedProject','DataController@getAssignedProject');
    Route::get('assignedMProjects','DataController@getMAssignedProject');
});
Route::get('projectRelatedKpi','DataController@getProjectKpi');
Route::get('assignedHealtSafety','DataController@assignedHealtSafety');
Route::post('projectRelatedKpiStorage','DataController@setProjectKpi');
Route::post('projectData','DataController@setProjectData');
Route::get('appVersion','DataController@appVersion');
Route::post('setAssignedProjectIssue','DataController@setAssignedProjectIssue');
// Route::get('/chats','ChatController@index');
// Route::get('/notifications/{user}','NotificationController@index');
// // dd(Auth);
// Route::post('/chats', 'ChatController@store');
// Route::middleware('auth:api')->group(function () {
//     // dd(Auth::user());
// });


//
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
