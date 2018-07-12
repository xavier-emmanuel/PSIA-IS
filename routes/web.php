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
Route::get('/GM-dashboard', 'GMPagesController@dashboard');

Route::get('/hired-applicants', 'HRPagesController@hiredApplicants');
Route::get('/approved-applicants', 'HRPagesController@approvedApplicants');
Route::get('/applicants', 'HRPagesController@applicants');
Route::get('/job-vacancy', 'HRPagesController@jobVacancy');
Route::get('/HR-dashboard', 'HRPagesController@dashboard');

Route::get('/check-email', 'RegisterController@checkEmail');
Route::get('/check-username', 'RegisterController@checkUsername');
Route::post('/register/store', 'RegisterController@ajaxStore');
Route::post('/account/verify', 'RegisterController@ajaxVerify');

Route::get('/verify-account/{username}', 'PagesController@verifyAccount');
Route::get('/register', 'PagesController@register');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
Route::get('/', 'PagesController@index');
