<?php
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('profile')->as('profile.')->group(function () {
    Route::get('/', 'ProfileController@edit')->name('edit');
    Route::patch('/', 'ProfileController@update')->name('update');
});

Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('settings', 'SettingController')->except(['show']);
Route::resource('employers', 'EmployerController');
Route::resource('jobs', 'EmployerJobController');
Route::resource('employees', 'EmployeeController')->except(['create', 'update', 'show']);
