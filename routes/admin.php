<?php
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('profile')->as('profile.')->group(function () {
    Route::get('/', 'ProfileController@edit')->name('edit');
    Route::patch('/', 'ProfileController@update')->name('update');
});

Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('category', 'CategoryController')->except(['show']);
Route::resource('testimonials', 'TestimonialController')->except(['show']);
Route::resource('settings', 'SettingController')->except(['show']);
Route::resource('employers', 'EmployerController');
Route::resource('jobs', 'EmployerJobController');
Route::get('jobs/{id}/applicants', 'EmployerJobController@applicants')->name('jobs.applicants');
Route::post('jobs/{id}/applicants', 'EmployerJobController@updateApplicants')->name('jobs.updateApplicants');
Route::resource('employees', 'EmployeeController')->except(['create', 'update', 'show']);
