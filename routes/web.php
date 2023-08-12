<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/', 'welcome');


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
