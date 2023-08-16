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

Route::post('/v_login', 'Employee\AuthController@vloginAuth')->name('v_login');


Route::get('employee/login', function () {
    return redirect('/');
})->name('employee.login');
// Route::post('employee/login', 'Employee\AuthController@loginAuth')->name('employee.login.auth');
Route::get('employer/login', 'Employer\AuthController@login')->name('employer.login');
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
});

Route::middleware('isEmployer')->prefix('employer')->as('employer.')->group(function () {
    Route::get('/dashboard', 'Employer\DashboardController@index')->name('dashboard');
    Route::post('/logout', 'Employer\AuthController@logout')->name('logout');
});
