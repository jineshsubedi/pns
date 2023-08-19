<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', 'Front\FrontendController@index');
Route::get('/jobs', 'Front\FrontendController@jobs');
Route::get('/jobs/{id}', 'Front\FrontendController@jobdetail')->name('front.job.detail');
Route::get('/about', 'Front\FrontendController@about');
Route::get('/contact', 'Front\FrontendController@contact');
Route::get('/freelancer', 'Front\FrontendController@freelancer');
Route::get('/freelancer/{id}', 'Front\FrontendController@freelancerShow')->name('front.freelancer.show');
Route::get('/certification', 'Front\FrontendController@certification');
Route::get('/certification/{id}', 'Front\FrontendController@certificationShow')->name('front.certification.show');

Route::post('/v_login', 'Employee\AuthController@vloginAuth')->name('v_login');


Route::get('employee/login', function () {
    return redirect('/');
})->name('employee.login');
Route::post('employee/login', 'Employee\AuthController@loginAuth')->name('employee.login.auth');
Route::post('employee/singup', 'Employee\AuthController@singup')->name('auth.singup');

Route::get('employer/login', function () {
    return redirect('/');
})->name('employer.login');
Route::post('employer/login', 'Employer\AuthController@loginAuth')->name('employer.login.auth');

Route::middleware('isEmployee')->prefix('employee')->as('employee.')->group(function () {
    Route::get('/dashboard', 'Employee\DashboardController@index')->name('dashboard');
    Route::post('/logout', 'Employee\AuthController@logout')->name('logout');

    route::get('/bookmarked', 'Employee\DashboardController@bookmarked')->name('bookmarked');
    route::get('/jobs', 'Employee\DashboardController@jobs')->name('jobs');
    route::post('jobs/{id}/bookmarked', 'Employee\DashboardController@tooglebookmarked')->name('tooglebookmarked');
    route::post('jobs/{id}/apply', 'Employee\DashboardController@apply')->name('apply');
    route::get('/change_password', 'Employee\DashboardController@change_password')->name('change_password');
    route::post('/change_password', 'Employee\DashboardController@save_change_password')->name('save_change_password');
    route::get('/profile', 'Employee\DashboardController@profile')->name('profile');
    route::put('/profile', 'Employee\DashboardController@updateProfile')->name('updateProfile');

    route::post('/experience', 'Employee\DashboardController@saveExperience')->name('saveExperience');
    route::get('/experience/{id}', 'Employee\DashboardController@deleteExperience')->name('deleteExperience');
    route::post('/education', 'Employee\DashboardController@saveEducation')->name('saveEducation');
    route::get('/education/{id}', 'Employee\DashboardController@deleteEducation')->name('deleteEducation');
});

Route::middleware('isEmployer')->prefix('employer')->as('employer.')->group(function () {
    Route::get('/dashboard', 'Employer\DashboardController@index')->name('dashboard');
    Route::post('/logout', 'Employer\AuthController@logout')->name('logout');

    route::get('/jobs', 'Employer\DashboardController@jobs')->name('jobs');
    route::post('/jobs', 'Employer\DashboardController@saveJobs')->name('saveJobs');
    route::get('/resumes', 'Employer\DashboardController@resumes')->name('resumes');
    route::get('/change_password', 'Employer\DashboardController@change_password')->name('change_password');
    route::post('/change_password', 'Employer\DashboardController@save_change_password')->name('save_change_password');
    route::get('/profile', 'Employer\DashboardController@profile')->name('profile');
    route::put('/profile', 'Employer\DashboardController@updateProfile')->name('updateProfile');
    route::get('/resumes', 'Employer\DashboardController@resumes')->name('resumes');
});
