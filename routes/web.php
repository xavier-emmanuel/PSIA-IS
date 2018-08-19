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

Route::group( [ 'middleware' => 'auth' ], function()
{
	Route::post('/job-application/store', 'JobApplicationController@ajaxStore');
	Route::get('{job_id}/job-application', 'PagesController@jobApplication');

	Route::get('/GM-dashboard', 'GMPagesController@dashboard');

	Route::get('/profile-update/check-email', 'RegisterController@checkEmail');
	Route::get('/profile-update/check-username', 'RegisterController@checkUsername');
	Route::post('/profile-update/photo', 'ProfileController@ajaxUpdatePhoto');
	Route::post('/profile-update/account', 'ProfileController@ajaxUpdateAccount');
	Route::post('/profile-update/personal', 'ProfileController@ajaxUpdatePersonal');
	Route::post('/profile-update/contact', 'ProfileController@ajaxUpdateContact');

	Route::post('/job-vacancy/delete', 'JobVacancyController@ajaxDelete');
	Route::get('/job-vacancy/update-show', 'JobVacancyController@ajaxUpdateShow');
	Route::post('/job-vacancy/update', 'JobVacancyController@ajaxUpdate');
	Route::post('/job-vacancy/create', 'JobVacancyController@ajaxStore');
	Route::get('/job-vacancy/show', 'JobVacancyController@ajaxShow');

	Route::get('/user-profile', 'HRPagesController@profile');
	Route::get('/hired-applicants', 'HRPagesController@hiredApplicants');
	Route::get('/approved-applicants', 'HRPagesController@approvedApplicants');
	Route::get('/job-vacancy', 'HRPagesController@jobVacancy');
	Route::get('/HR-dashboard', 'HRPagesController@dashboard');
	Route::get('/HR/applicant-form/{id}/{name}', 'HRPagesController@applicantForm');

	Route::post('/set-interview', 'InterviewController@setInterview');

	Route::post('/approve-applicant', 'ApprovalController@approveApplicant');

	Route::post('/hire-applicant', 'HireController@hireApplicant');

	Route::get('/applicant-form/{id}/{name}', 'GMPagesController@applicantForm');

	Route::get('/applicants/show', 'ApplicantsController@ajaxShowApplicants');
	Route::get('/hired-applicants/show', 'ApplicantsController@ajaxShowHiredApplicants');
	Route::get('/approved-applicants/show', 'ApplicantsController@ajaxShowApprovedApplicants');
	Route::get('/evaluated-applicants/show', 'ApplicantsController@ajaxShowEvaluatedApplicants');

	Route::get('/hired-applicant-report', 'ReportsController@hiredApplicantReport');
	Route::get('/approved-applicant-report', 'ReportsController@approvedApplicantReport');
	Route::get('/application-form-report', 'ReportsController@applicationFormReport');
});

Route::get('/check-email', 'RegisterController@checkEmail');
Route::get('/check-username', 'RegisterController@checkUsername');
Route::post('/register/store', 'RegisterController@ajaxStore');
Route::post('/account/verify', 'RegisterController@ajaxVerify');

Route::get('/verify-account/{username}', 'PagesController@verifyAccount');
Route::get('/register', 'PagesController@register');

Route::get('/contact', 'PagesController@contact');
Route::post('/contact/send', 'ContactController@contactSend');

Route::get('/about', 'PagesController@about');
Route::get('/', 'PagesController@index');

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
