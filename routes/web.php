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
// Route::get('/', function () {
//     // return view('testinghome');
//     return view('home');
// });

Route::get('/upload', function () {
    return view('file_upload');
});

Route::get('/deleteProject','HomeController@deleteProject');

// attendance start
Route::get('/attendance','ExecutiveController@attendance')->name('attendance');
Route::get('/dailyattendance','ExecutiveController@dailyattendance')->name('dailyattendance');
// attendance end
// Route::post('/home','HomeController@upload');

Route::get('/','HomeController@index')->name('predashboard');
Route::group(['middleware' => ['auth']],function(){

  //predashboard

  // visitRequest_dashboard
  Route::get('/visitRequest_dashboard','HomeController@visitRequest_dashboard')->name('visitRequest_dashboard');
  // monitoring_dashboard
  Route::get('/monitoring_dashboard','HomeController@monitoringDashboard')->name('monitoring_dashboard');
  Route::get('/summarytable','HomeController@summarytable')->name('summarytable');
  // Manager & Directors & Chairman & Member & Chief
  Route::middleware('role:manager|directorevaluation|directormonitoring|chairman|member|chief') ->group(function () {
    Route::get('/summarytableMonitoring','HomeController@summarytableMonitoring')->name('summarytableMonitoring');
    Route::get('/summarytableEvaluation','HomeController@summarytableEvaluation')->name('summarytableEvaluation');
  });
  Route::get('/PDWP','HomeController@PDWBforDC')->name('PDWP');
  Route::get( '/FinancialYear', 'HomeController@FinancialYearPDWP')->name( 'FinancialYear');
  // evaluation_dashboard
  Route::get('/dashboard',"HomeController@dashboard")->name("evaluation_dashboard");

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

    Route::delete('admin/projects/{id}', 'ProjectController@destroy')->name('admin_projects_destroy');
    Route::get('admin/projects/remove', 'ProjectController@ProjectRemove')->name('admin_projects_remove');

    Route::get('/rolespermissionsusers/view','RolesPermissionsUsersController@index');
    Route::resource('project_type','ProjectTypeController');
    Route::resource('evaluation_type','EvaluationTypeController');
    Route::resource('sub_sector','SubSectorController');
    Route::resource('sector','SectorController');
    Route::resource('district','DistrictController');
    Route::resource('assigning_forum','AssigningForumController');
    Route::resource('approving_forum','ApprovingForumController');

    // Monitoring m_project_kpis
    Route::resource('/mprojectkpis','MonitoringProjectKpiController');

});


Route::prefix('manager')->middleware('role:manager|directorevaluation|directormonitoring')->group(function () {
  // PDWP MEETING MODULE
  Route::get('/conduct_pdwp_meeting','ExecutiveController@conduct_pdwp_meeting')->name('Conduct_PDWP_Meeting');
  Route::get('/list_agendas','ExecutiveController@list_agendas')->name('List_Agendas');
  Route::post('/agenda_comment_store','ExecutiveController@CommentAgenda')->name('store_agenda_comments');
  // Projects for ChairmanDashboard
  Route::post('chairmanProjects', 'ChairmanController@assignToExecutive')->name('CharimanProjectAssignToExecutive');
  // Route::get('chairmanProjects','ChairmanController@assignToChairman')->name('CharimanProjectAssignToDC');
});

// For Manager & Director Charts
Route::prefix('manager')->middleware('role:manager|directorevaluation')->group(function () {
  // APIs for getting InProgress Projects of Officers
  Route::get('/officersProjects','ExecutiveController@getOfficerProjects')->name('getOfficerProjects');

  // END APIs
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
  Route::get('/chart_thirteen','ExecutiveController@chart_thirteen')->name('districtWise');
  Route::get('/pems_tab','ExecutiveController@pems_index')->name('Exec_pems_tab');
  Route::get('/ViewAsOfficerNewAssignments/{user_id}','ViewAsOfficerController@ViewAsOfficerNewAssignments')->name('ViewAsOfficerNewAssignments');
  Route::get('/ViewOfficerActivities','ViewAsOfficerController@ViewOfficerActivities')->name('ViewAsOfficerActivities');

});


//For only Managers
  Route::prefix('manager')->middleware('role:manager')->group(function () {
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


    // MONITORING MODULE
    Route::get('/m_unassignedprojects','ExecutiveController@monitoring_unassigned')->name('monitoring_unassigned');
    Route::get('/m_assigntoconsultant','ProjectAssignController@assignToConsultant')->name('assign_To_consultant');
    Route::get('/m_inprogressprojects','ExecutiveController@monitoring_inprogress')->name('monitoring_inprogress');
    Route::get('/AssignedToExecutive', 'ChairmanController@AssignedToExecutive')->name('AssignedToExecutive');
    Route::get('/m_completedprojects','ExecutiveController@monitoring_completed')->name('monitoring_completed');
    // Route::get('/visitrequestSummary/{id}','ExecutiveController@visitRequestSummary')->name('visitrequestSummary');
    Route::post('/visitrequestDescision','SiteVisitController@visitRequestDescision')->name('visitrequestDescision');
    // Chairman
    Route::get('/AssignedToChairman', 'ChairmanController@AssignedToChairman')->name('AssignedToChairman');
    Route::post('/AssignedToChairman', 'ChairmanController@assignToChairman')->name('assignToChairman');
  });


  // For Director
  Route::prefix('director_evaluation')->middleware('role:directorevaluation')->group(function () {
      //for Evaluation Director
    Route::get('/re_assign','DirectorEvaluationController@re_assign')->name('Re_Assign');
    Route::get('/','DirectorEvaluationController@index')->name('Evaluation_home');
    Route::get('/pems_tab','DirectorEvaluationController@pems_index')->name('Evaluation_pems_tab');
    Route::get('/pmms_tab','DirectorEvaluationController@pmms_index')->name('Evaluation_pmms_tab');
    Route::get('/tpv_tab','DirectorEvaluationController@tpv_index')->name('Evaluation_tpv_tab');
    Route::get('/inquiry','DirectorEvaluationController@inquiry_index')->name('Evaluation_inquiry_tab');
    Route::get('/evaluation_assigned','DirectorEvaluationController@evaluation_assignedprojects')->name('Evaluation_evaluation_assigned');
    Route::get('/evaluation_inprogress','DirectorEvaluationController@evaluation_Inprogressprojects')->name('Evaluation_evaluation_Inprogressprojects');
    Route::get('/stoppedProjects','DirectorEvaluationController@stoppedProjects')->name('stoppedProjects');
    Route::get('/stoppingProjects','DirectorEvaluationController@stoppingProjects')->name('stoppingProjects');
    Route::get('/evaluation_completed','DirectorEvaluationController@evaluation_Completedprojects')->name('Evaluation_evaluation_Completed');

    Route::get('/search','DirectorEvaluationController@searchOfficer')->name('search_officer');
    Route::get('assignproject','ProjectAssignController@create_from_director')->name('create_from_director');
    Route::post('assignproject','ProjectAssignController@store_from_director')->name('store_from_director');
    Route::post('getAssignedProjects','DirectorEvaluationController@getAssignedProjects')->name('getofficersassigned');
    Route::post('getCompletedProjects','DirectorEvaluationController@getCompletedProjects')->name('getofficerscompleted');

    Route::get('/projects_assigned','DirectorEvaluationController@totalProjectAssigned')->name('totalProjectAssignedtoOfficers');
    Route::post('/stopAssignedProject','DirectorEvaluationController@stopAssignedProject')->name('stopAssignedProject');

    Route::get('/adpProject_1819','DirectorEvaluationController@adpProject_1819')->name('adpProject_1819');

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
    Route::get('/MonitoringAssignToDC','ChairmanController@MonitoringAssignToDC')->name('MonitoringAssignToDC');
    Route::get('/MonitoringAssignedToDC','ChairmanController@MonitoringAssignedToDC')->name('MonitoringAssignedToDC');
    Route::get('/monitoring_complete','DirectorMonitoringController@monitoring_completeprojects')->name('Monitoring_complete_projects');
    Route::get('/monitoring_assigntoconsultant','ProjectAssignController@DPM_AssignToConsultant')->name('Monitoring_assignToconsultant');
    Route::post('/monitoring_assigntoconsultant','ProjectAssignController@store_from_Mdirector')->name('store_from_Mdirector');



});
    Route::get('/getSectorWise','ExecutiveController@getSectorWise')->name('getSectorWise');





//Evaluator & officers & TransportOfficer
Route::prefix('Evaluatorofficer')->middleware('role:evaluator|officer|transportofficer')->group(function () {
  // Evaluation Module Routes
  Route::post('/save_percentage','OfficerController@save_percentage')->name('save_percentage');
  Route::post('/save_dates','OfficerController@save_dates')->name('save_dates');
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
  Route::post('/saveDocAttachment','OfficerController@saveDocAttachments')->name('saveDocAttachment');
  Route::resource('trip','SiteVisitController');
  Route::resource('report_images', 'ReportImageController');
  Route::post('/visitCompleted/{id}','SiteVisitController@visitCompleted')->name('visitCompleted');

  //Officer's Charts
  Route::get('/officer_chart_one','OfficerController@officer_chart_one')->name('officer_chart_one');
  Route::get('/officer_chart_two','OfficerController@officer_chart_two')->name('officer_chart_two');
  Route::get('/officer_chart_three','OfficerController@officer_chart_three')->name('officer_chart_three');
  Route::post('/post_sne','OfficerController@SavePostSne')->name('post_sne');

});
//Monitor officers
Route::prefix('Monitorofficer')->middleware('role:monitor|officer')->group(function () {

  // Monitoring Module Routes
  Route::get('/monitoring_newAssignment','OfficerController@monitoring_newAssignments')->name('Monitoring_newAssignments');
  Route::get('/monitoring_inprogressAssignment','OfficerController@monitoring_inprogressAssignments')->name('Monitoring_inprogressAssignments');
  Route::post('/monitoring_inprogress_costs_saved','OfficerController@monitoring_inprogress_costs_saved')->name('Monitoring_inprogressCostSaved');
  Route::post('/monitoring_inprogress_dates_saved','OfficerController@monitoring_inprogress_dates_saved')->name('Monitoring_inprogressDateSaved');

  Route::post('/Monitoring_PlannedDates','OfficerController@Monitoring_PlannedDates')->name('Monitoring_PlannedDates');

  Route::post('/monitoring_inprogress_organizations_saved','OfficerController@monitoring_inrogress_organizations_saved')->name('Monitoring_inprogressOrganizationSaved');
  Route::post('/monitoring_inprogress_location_saved','OfficerController@monitoring_inprogress_location_saved')->name('Monitoring_inprogressLocationSaved');
  Route::get('/monitoring_completedAssignment','OfficerController@monitoring_completedAssignments')->name('Monitoring_completedAssignments');
  Route::get('/monitoring_sInprogress','OfficerController@monitoring_inprogressSingle')->name('monitoring_inprogressSingle');

  //Review Tab
  Route::post('/monitoring_review_form','OfficerController@monitoring_review_form')->name('monitoring_review_form');

  //Plan Monitoring Tab
  Route::post('/saveMonitoringAttachments','OfficerController@saveMonitoringAttachments')->name('saveMonitoringAttachments');
  Route::post('/projectDesignMonitoring','OfficerController@projectDesignMonitoring')->name('projectDesignMonitoring');
  Route::post('/mappingOfObj','OfficerController@mappingOfObj')->name('mappingOfObj');
  Route::post('/getProjectComponents','OfficerController@getProjectComponents')->name('getProjectComponents');
  Route::post('/getProjectActivities','OfficerController@getProjectActivities')->name('getProjectActivities');
  Route::post('/kpiComponentMapping','OfficerController@kpiComponentMapping')->name('kpiComponentMapping');
  Route::post('/customkpiComponentMapping','OfficerController@customkpiComponentMapping')->name('customkpiComponentMapping');
  Route::get('/getSectorKpi','DataController@getProjectKpi')->name('getProjectKpi');
  Route::post('/componentActivities','OfficerController@componentActivities')->name('componentActivities');
  Route::post('/activities_duration','OfficerController@activities_duration')->name('activities_duration');
  Route::post('/Costing','OfficerController@Costing')->name('Costing');
  Route::post('/deleteObj','OfficerController@deleteObjective')->name('deleteObjective');
  Route::post('/deleteComponent','OfficerController@deleteComponent')->name('deleteComponent');
  Route::post('/deleteKpi','OfficerController@deleteKpi')->name('deleteKpi');
  Route::post('/deleteUserAssignedKpi','OfficerController@deleteUserAssignedKpi')->name('deleteUserAssignedKpi');
  Route::post('/deleteUserLoc','OfficerController@deleteUserLoc')->name('deleteUserLoc');
  Route::post('/deleteAttachment','OfficerController@deleteAttachment')->name('deleteAttachment');

  //Conduct Monitoring Tab
  Route::post('/saveUserLocation','OfficerController@saveUserLocation')->name('saveUserLocation');
  Route::post('/saveUserKpi','OfficerController@saveUserKpi')->name('saveUserKpi');
  Route::post('/saveQualityAssesment','OfficerController@saveQualityAssesment')->name('saveQualityAssesment');
  Route::post('/saveGeneralFeedBack','OfficerController@saveGeneralFeedBack')->name('saveGeneralFeedBack');
  Route::post('/saveMissues','OfficerController@saveMissues')->name('saveMissues');
  Route::post('/savehealthsafety','OfficerController@savehealthsafety')->name('savehealthsafety');
  Route::post('/storeFinancialSummary', 'OfficerController@storeFinancialSummary')->name('storeFinancialSummary');
  Route::post('/storeContractSummary', 'OfficerController@storeContractSummary')->name('storeContractSummary');

  Route::post('/m_observations','OfficerController@save_m_observations')->name('save_m_observations');
  Route::post('/stakeholders','OfficerController@savestakeholders')->name('savestakeholders');
  Route::post('/getAssignedSponsoringAgency','OfficerController@getAssignedSponsoringAgency')->name('getAssignedSponsoringAgency');
  Route::post('/getAssignedExecutingAgency','OfficerController@getAssignedExecutingAgency')->name('getAssignedExecutingAgency');
  Route::post('/saveManualImages','OfficerController@saveManualImages')->name('saveManualImages');
  Route::post('/saveQuestionnaire','OfficerController@storeQuestionnaire')->name('saveQuestionnaire');
  Route::post('/saveRisks', 'OfficerController@saveRisks')->name('saveRisks');

  //Result Monitoring Tab
  Route::post('/saveWbsRemarks','OfficerController@saveWbsRemarks')->name('saveWbsRemarks');
});

 // Monitoring group
  Route::group(['middleware' => ['role:dataentry|officer|monitor|manager|directormonitoring']],function () {
  Route::get('/visitrequestSummary/{id}','ExecutiveController@visitRequestSummary')->name('visitrequestSummary');

  // MonitoringDashbaord
  Route::get('/monitoring_dashboard','HomeController@monitoringDashboard')->name('monitoring_dashboard');

  // monitoring
  Route::get('/monitoringP','ProjectController@createMonitoringEntryForm')->name('createMonitoringEntryForm');
  Route::get('/monitoringP/{id}','ProjectController@EditMonitoringEntryForm')->name('EditMonitoringEntryForm');
  Route::get('/monitoringV','ProjectController@viewMonitoringForm')->name('viewMonitoringForm');


});


//For DataEntry
Route::group(['middleware' => ['role:admin|dataentry|officer|evaluator|monitor|manager|directormonitoring|directorevaluation|adminhr']],function () {
  Route::post('/getunassignedProjectCounter','ProjectCounterController@getUnassignedProjectCounter')->name('unassignedCounter');
  Route::post('/getinProgressProjectCounter','ProjectCounterController@getInProgressCounter')->name('inProgressCounter');
  Route::post('/getAssignedProjectCounter','ProjectCounterController@getAssignedProjectCounter')->name('assignedCounter');
  Route::post('/getCompletedCounter','ProjectCounterController@getCompletedCounter')->name('completedCounter');
  Route::post('/onsectorselect','DataEntryController@onSectorSelect')->name('sectorselect');
  Route::post('/onsubsectorselect','DataEntryController@onSub_SectorSelectdispatchLetterView');
  Route::post('/getMonitoringProjectNumber','DataEntryController@getMonitoringProjectData');
  Route::post('/onAssigningForumselect','DataEntryController@onAssigningForumselect');
  Route::post('/onchangefunction','DataEntryController@onSubSectorSelect');
  Route::post('/onnewprojectselect','DataEntryController@newproject');
  Route::resource('projects','ProjectController');
  Route::post('/financial_year','AdminHumanResourceController@financial_year')->name('fetch_financial_year');
  Route::post('/project_financial_year','ProjectController@financial_year')->name('fetch_project_financial_year');
  Route::get('/dispatchLetterViews','OfficerController@dispatchLetterView')->name('dispatchLetterViews');


    //Summary Tab
  Route::get('/generate_monitoring_report','OfficerController@generate_monitoring_report')->name('generate_monitoring_report');
  Route::post('/save_report_data','OfficerController@save_report_data');

  // CM DASHBOARD
  Route::get('/minitoringDashboard', 'OfficerController@DetailedDashboard')->name('monitoringDashboard');
  Route::get('/Summary', function () {
    return view('_Monitoring.monitoringDashboard.pages.Summary');
  })->name('Summary');
  Route::get('/projctlist', function () {
    return view('_Monitoring.monitoringDashboard.pages.projctlist');
  })->name('projctlist');

});

//for adminhr
Route::prefix('hr')->middleware('role:adminhr|manager|directormonitoring|directorevaluation')->group(function () {
  Route::post('/save_moms','AdminHumanResourceController@saveMoms')->name('save_moms');
  Route::resource('admin','AdminHumanResourceController');
  Route::post('/save_agendax','AdminHumanResourceController@save_agendax')->name('agendax');
  Route::post('/descisionAgendax','AdminHumanResourceController@DescisionAgenda')->name('DescisionAgenda');
  Route::get('/getfile/{id}','AdminHumanResourceController@getFile')->name('getFile');
  Route::get('/dispatch_form','AdminHumanResourceController@dispatch_form')->name('dispatch_form');
  Route::post('/dispatchLetterCreated','AdminHumanResourceController@dispatchLetterCreated')->name('dispatchLetterCreated');
  Route::get('/dispatchLetterIndex','AdminHumanResourceController@dispatchLetterIndex')->name('dispatchLetterIndex');
  Route::get('/misc_minutes_create','AdminHumanResourceController@misc_minutes_create')->name('misc_minutes_create');
  Route::get('/view_misc_minutes','AdminHumanResourceController@view_misc_minutes')->name('view_misc_minutes');
  Route::post('/store_misc_moms','AdminHumanResourceController@store_misc_moms')->name('store_misc_moms');

  Route::post('/addDescisioninMiscmom','AdminHumanResourceController@addDescisioninMiscmom')->name('addDescisioninMiscmom');
  Route::post('/removeMiscMom','AdminHumanResourceController@removeMiscMom')->name('removeMiscMom');

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


Route::get('/dashboard',"HomeController@dashboard")->name("evaluation_dashboard");
Route::post('/printerfunction','AdminHumanResourceController@printer');
Route::get('/analytics','MonitoringChartController@index')->name('analytics');
Route::get('/m_chart_one','MonitoringChartController@m_chart_one')->name('m_chart_one');
Route::get('/m_chart_two','MonitoringChartController@m_chart_two')->name('m_chart_two');

Route::get('/403',function(){
  return view('403');
});
// Route::get('/Attendance',function(){
//   return view('Attendance');
// });
Route::get('/dgv',function(){
  return view('hassan.dg');
});
Route::get('/ps',function(){
  return view('hassan.ps');
});
});
// });
