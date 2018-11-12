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
    // return view('testinghome');
    return view('home');
});
// Predashboard
Route::get('/predashboard',function(){
  return view('predashboard');
});

// EvaluationDashbaord
//Route::get('/dashboard',function(){
//  return view('dashboard');
//});
// Route::get('/dashboard',function(){
//   return view('dashboard');
// })->name("evaluation_dashboard");

// MonitoringDashbaord
Route::get('/monitoring_dashboard',function(){
  return view('monitoring_dashboard');
})->name("monitoring_dashboard");


Route::get('/home','HomeController@index');
Route::group(['middleware' => ['auth']],function(){
  Route::get('/reset_password','HomeController@reset_password');
  Route::post('/reset_store','HomeController@reset_store');


//For Admin
Route::group(['middleware' => ['role:admin']], function () {
  Route::resource('/accountRequest','AccountRequestController');
    Route::resource('/roles','RolesController');
    Route::resource('SponsorAgency','SponsorAgencyController');
    Route::resource('ExecutingAgency','ExecutingAgencyController');
    Route::resource('/permissions','PermissionsController');
    Route::get('/rolespermissionsusers/create','RolesPermissionsUsersController@create');
    Route::post('/rolesandpermissions','RolesPermissionsUsersController@rolesandpermissionsstore');
    Route::post('/usersandroles','RolesPermissionsUsersController@rolesandusersstore');
    Route::post('/usersandpermissions','RolesPermissionsUsersController@usersandpermissionstore');

    Route::get('/rolespermissionsusers/view','RolesPermissionsUsersController@index');
    Route::resource('project_type','ProjectTypeController');
    Route::resource('evaluation_type','EvaluationTypeController');
    Route::resource('sub_sector','SubSectorController');
    Route::resource('sector','SectorController');
    Route::resource('district','DistrictController');
    Route::resource('assigning_forum','AssigningForumController');
    Route::resource('approving_forum','ApprovingForumController');

});

// For Manager
Route::prefix('manager')->middleware('role:manager')->group(function () {
  Route::get('/','ExecutiveController@index')->name('Exec_home');
  // PEMS GRAPHS -EVALUATION MODULE
  Route::get('/chart_one','ExecutiveController@chart_one')->name('chart_one');
  Route::get('/chart_two','ExecutiveController@chart_two')->name('chart_two');
  Route::get('/chart_three','ExecutiveController@chart_three')->name('chart_three');
  Route::get('/chart_four','ExecutiveController@chart_four')->name('chart_four');
  Route::get('/chart_five','ExecutiveController@chart_five')->name('chart_five');
  Route::get('/chart_six','ExecutiveController@chart_six')->name('chart_six');
  Route::get('/chart_seven','ExecutiveController@chart_seven')->name('chart_seven');
  Route::get('/chart_eight','ExecutiveController@chart_eight')->name('chart_eight');
  Route::get('/chart_nine','ExecutiveController@chart_nine')->name('chart_nine');
  Route::get('/chart_ten','ExecutiveController@chart_ten')->name('chart_ten');
  Route::get('/chart_eleven','ExecutiveController@GlobalProgressWiseChart')->name('GlobalProgressWiseChart');
  Route::get('/chart_twelve','ExecutiveController@SneWiseChart')->name('SneWiseChart');

  // chart details
  // Route::get('/chart_two_details','ExecutiveController@chart_two')->name('chart_two_details');

  //
  Route::get('/pems_tab','ExecutiveController@pems_index')->name('Exec_pems_tab');
  Route::get('/pmms_tab','ExecutiveController@pmms_index')->name('Exec_pmms_tab');
  Route::get('/getSectorWise','ExecutiveController@getSectorWise')->name('getSectorWise');
  Route::get('/tpv_tab','ExecutiveController@tpv_index')->name('Exec_tpv_tab');
  Route::get('/specialAssign_tab','ExecutiveController@specialassign_index')->name('Exec_special_tab');
  Route::get('/inquiry','ExecutiveController@inquiry_index')->name('Exec_inquiry_tab');
  Route::get('/other_tab','ExecutiveController@other_index')->name('Exec_other_tab');
  Route::get('/evaluation_assigned','ExecutiveController@evaluation_assignedprojects')->name('Exec_evaluation_assigned');
  Route::get('/evaluation_completed','ExecutiveController@evaluation_completedprojects')->name('Exec_evaluation_completed');
  Route::resource('assignproject','ProjectAssignController');
  Route::get('/evaluation_reviewed','ExecutiveController@reviewed_projects');

  // PDWP MEETING MODULE
  Route::get('/conduct_pdwp_meeting','ExecutiveController@conduct_pdwp_meeting')->name('Conduct_PDWP_Meeting');
  Route::get('/list_agendas','ExecutiveController@list_agendas')->name('List_Agendas');
  Route::post('/agenda_comment_store','ExecutiveController@CommentAgenda')->name('store_agenda_comments');

  // MONITORING MODULE
  Route::get('/m_unassignedprojects','ExecutiveController@monitoring_unassigned')->name('monitoring_unassigned');
  Route::get('/m_assigntoconsultant','ProjectAssignController@assignToConsultant')->name('assign_To_consultant');
  Route::get('/m_inprogressprojects','ExecutiveController@monitoring_inprogress')->name('monitoring_inprogress');
  Route::get('/m_completedprojects','ExecutiveController@monitoring_completed')->name('monitoring_completed');

});


// For Director
Route::prefix('director_evaluation')->middleware('role:directorevaluation')->group(function () {
    //for Evaluation Director
  // Route::get('/re_assign_store','DirectorEvaluationController@re_assign_store')->name('Re_Assign_Store');
  Route::get('/re_assign','DirectorEvaluationController@re_assign')->name('Re_Assign');
  Route::get('/','DirectorEvaluationController@index')->name('Evaluation_home');
  Route::get('/pems_tab','DirectorEvaluationController@pems_index')->name('Evaluation_pems_tab');
  Route::get('/pmms_tab','DirectorEvaluationController@pmms_index')->name('Evaluation_pmms_tab');
  Route::get('/tpv_tab','DirectorEvaluationController@tpv_index')->name('Evaluation_tpv_tab');
  Route::get('/inquiry','DirectorEvaluationController@inquiry_index')->name('Evaluation_inquiry_tab');
  Route::get('/evaluation_assigned','DirectorEvaluationController@evaluation_assignedprojects')->name('Evaluation_evaluation_assigned');
  Route::get('/evaluation_inprogress','DirectorEvaluationController@evaluation_Inprogressprojects')->name('Evaluation_evaluation_Inprogressprojects');
  Route::get('/evaluation_completed','DirectorEvaluationController@evaluation_Completedprojects')->name('Evaluation_evaluation_Completed');

  Route::get('/search','DirectorEvaluationController@searchOfficer')->name('search_officer');
  Route::get('assignproject','ProjectAssignController@create_from_director')->name('create_from_director');
  Route::post('assignproject','ProjectAssignController@store_from_director')->name('store_from_director');

  //
  Route::post('getAssignedProjects','DirectorEvaluationController@getAssignedProjects')->name('getofficersassigned');
  Route::post('getCompletedProjects','DirectorEvaluationController@getCompletedProjects')->name('getofficerscompleted');

  Route::get('/projects_assigned','DirectorEvaluationController@totalProjectAssigned')->name('totalProjectAssignedtoOfficers');


});
  //for Monitoring Director
Route::prefix('director_Monitor')->middleware('role:directormonitoring')->group(function () {
    Route::get('/','DirectorMonitoringController@index')->name('Monitoring_home');
    Route::get('/pems_tab','DirectorMonitoringController@pems_index')->name('Monitoring_pems_tab');
    Route::get('/pmms_tab','DirectorMonitoringController@pmms_index')->name('Monitoring_pmms_tab');
    Route::get('/tpv_tab','DirectorMonitoringController@tpv_index')->name('Monitoring_tpv_tab');
    Route::get('/inquiry','DirectorMonitoringController@inquiry_index')->name('Monitoring_inquiry_tab');
    Route::get('/monitoring_unassigned','DirectorMonitoringController@monitoring_unassignedprojects')->name('Monitoring_unassigned_projects');
    Route::get('/assignproject_M','ProjectAssignController@DPM_AssignToConsultant')->name('DPM_AssignToConsultant');
    Route::get('/monitoring_inprogress','DirectorMonitoringController@monitoring_inprogressprojects')->name('Monitoring_inprogress_projects');
    Route::get('/monitoring_complete','DirectorMonitoringController@monitoring_completeprojects')->name('Monitoring_complete_projects');
    Route::get('/monitoring_assigntoconsultant','ProjectAssignController@DPM_AssignToConsultant')->name('Monitoring_assignToconsultant');


});
Route::get('/getSectorWise','ExecutiveController@getSectorWise')->name('getSectorWise');





//officers
Route::prefix('officer')->middleware('role:officer')->group(function () {
  // Evaluation Module Routes
  Route::post('/save_percentage','OfficerController@save_percentage')->name('save_percentage');
  Route::get('/main','OfficerController@evaluation_main')->name('main_page');
  Route::get('/','OfficerController@evaluation_index')->name('new_evaluation');
  Route::post('/submitActivities','OfficerController@activitiesSubmit')->name('activitiesSubmit');
  Route::get('/inprogress_evaluation','OfficerController@evaluation_inprogress')->name('inprogress_evaluation');
  Route::get('/activities_evaluation/{project_id}','OfficerController@evaluation_activities')->name('evaluation_activities');
  Route::get('/completed_evaluation','OfficerController@evaluation_completed')->name('completed_evaluation');
  Route::post('/project_completed','OfficerController@projectCompleted')->name('projectCompleted');
  Route::get('/review_form/{project_id}','OfficerController@review_form')->name('review_form');
  Route::post('/review_form','OfficerController@review_forms')->name('review_forms');
  Route::post('/AssignActivityDocuments','OfficerController@AssignActivityDocument')->name('AssignActivityDocument');
  Route::post('/saveActivityAttachment','OfficerController@saveActivityAttachment')->name('saveActivityAttachment');
  Route::get('/new_trip','SiteVisitController@create')->name('new_trip');
  Route::get('/view_trips','SiteVisitController@view')->name('view_trips');
  Route::get('/new_tripbackup','SiteVisitController@create')->name('new_tripbackup');

  Route::post('/saveDocAttachment','OfficerController@saveDocAttachments')->name('saveDocAttachment');

  // Monitoring Module Routes
  Route::get('/monitoring_newAssignment','OfficerController@monitoring_newAssignments')->name('Monitoring_newAssignments');
  Route::get('/monitoring_inprogressAssignment','OfficerController@monitoring_inprogressAssignments')->name('Monitoring_inprogressAssignments');
  Route::get('/monitoring_completedAssignment','OfficerController@monitoring_completedAssignments')->name('Monitoring_completedAssignments');
  Route::get('/monitoring_sInprogress','OfficerController@monitoring_inprogressSingle')->name('monitoring_inprogressSingle');

});

//For DataEntry
Route::group(['middleware' => ['role:dataentry|officer|manager|directormonitoring|directorevaluation']],function () {
Route::post('/getunassignedProjectCounter','ProjectCounterController@getUnassignedProjectCounter')->name('unassignedCounter');
Route::post('/getinProgressProjectCounter','ProjectCounterController@getInProgressCounter')->name('inProgressCounter');
Route::post('/getAssignedProjectCounter','ProjectCounterController@getAssignedProjectCounter')->name('assignedCounter');
Route::post('/getCompletedCounter','ProjectCounterController@getCompletedCounter')->name('completedCounter');
Route::post('/onsectorselect','DataEntryController@onSectorSelect');
Route::post('/onsubsectorselect','DataEntryController@onSub_SectorSelect');
Route::post('/getMonitoringProjectNumber','DataEntryController@getMonitoringProjectData');
Route::post('/onAssigningForumselect','DataEntryController@onAssigningForumselect');
Route::post('/onchangefunction','DataEntryController@onSubSectorSelect');
Route::post('/onnewprojectselect','DataEntryController@newproject');
Route::resource('projects','ProjectController');

// monitoring
Route::get('/monitoringP','ProjectController@createMonitoringEntryForm')->name('createMonitoringEntryForm');

Route::get('/monitoringV','ProjectController@viewMonitoringForm')->name('viewMonitoringForm');

});

//for adminhr
Route::prefix('hr')->middleware('role:adminhr|manager')->group(function () {
  Route::post('/save_moms','AdminHumanResourceController@saveMoms')->name('save_moms');
  Route::resource('admin','AdminHumanResourceController');
  Route::post('/save_agendax','AdminHumanResourceController@save_agendax')->name('agendax');
  // Route::get('/search_agendas','AdminHumanResourceController@search_agendas')->name('search_agendas');
  // Route::get('/','inHumanResourceController@index')->name('index_meeting');
});
Route::group(['middleware'=>['permission:can.chat']],function(){
  Route::get('/conversations/{id}', 'ChatController@show');
});
Route::group(['middleware'=>['permission:can.view.profile']],function(){
  Route::resource('/profile','ProfileController');
});
Route::get('GetUnreadCount/{message}','ProblematicRemarksController@getUnreadCount')->name('getUnreadCount');
Route::resource('Problematicremarks','ProblematicRemarksController');
Route::post('ReadProblematicremarks','ProblematicRemarksController@readMessages');
Route::group(['middleware'=>['permission:can.problematicremark']],function(){
});
// Route::group(['middleware' => ['permission:can.edit.project|can.view.project']],function(){
// });


//TO
Route::prefix('to')->middleware('role:to')->group(function () {

});
Route::get('/dashboard',"HomeController@dashboard")->name("evaluation_dashboard");

Route::post('/printerfunction','AdminHumanResourceController@printer');


Route::get('/403',function(){
  return view('403');
});
Route::get('/dgv',function(){
  return view('hassan.dg');
});
Route::get('/ps',function(){
  return view('hassan.ps');
});
});
