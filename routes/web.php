<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', 'Front\FrontendController@index');
Route::get('/jobs', 'Front\FrontendController@jobs');
Route::get('/jobs/{id}', 'Front\FrontendController@jobdetail')->name('front.job.detail');
Route::get('/about', 'Front\FrontendController@about');
Route::get('/contact', 'Front\FrontendController@contact');
Route::get('/freelancer', 'Front\FrontendController@freelancer');
Route::get('/ceritifcation', 'Front\FrontendController@ceritifcation');


Route::get('employee/login', 'Employee\AuthController@login')->name('employee.login');
Route::post('employee/login', 'Employee\AuthController@loginAuth')->name('employee.login.auth');
Route::get('employer/login', 'Employer\AuthController@login')->name('employer.login');
Route::post('employer/login', 'Employer\AuthController@loginAuth')->name('employer.login.auth');


Route::middleware('isEmployee')->prefix('employee')->as('employee.')->group(function () {
    Route::get('/dashboard', 'Employee\DashboardController@index')->name('dashboard');
    Route::post('/logout', 'Employee\AuthController@logout')->name('logout');
});

Route::middleware('isEmployer')->prefix('employer')->as('employer.')->group(function () {
    Route::get('/dashboard', 'Employer\DashboardController@index')->name('dashboard');
    Route::post('/logout', 'Employer\AuthController@logout')->name('logout');
});
