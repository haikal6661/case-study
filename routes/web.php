<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Auth::routes(['verify'=>true]);

require __DIR__.'/auth.php';

Route::get('/verify-email', 'App\Http\Controllers\Auth\EmailVerificationPromptController@__invoke')
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', 'App\Http\Controllers\Auth\VerifyEmailController@__invoke')
->middleware(['auth', 'signed', 'throttle:6,1'])
->name('verification.verify');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth','verified');

Route::group(['middleware' => 'auth','verified'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth','verified'], function () {
	Route::get('employee','App\Http\Controllers\EmployeeController@index')->name('employee');
    Route::get('add_employee','App\Http\Controllers\EmployeeController@create');
    Route::post('add_employee','App\Http\Controllers\EmployeeController@store');
    Route::get('edit_employee/{id}','App\Http\Controllers\EmployeeController@edit');
    Route::post('/update_employee/{id}','App\Http\Controllers\EmployeeController@update');
    Route::get('delete/{id}','App\Http\Controllers\EmployeeController@destroy');
    Route::get('archive','App\Http\Controllers\EmployeeController@archive')->name('archive-employee');
    Route::get('force-delete/{id}','App\Http\Controllers\EmployeeController@forceDestroy');
	Route::get('restore/{id}','App\Http\Controllers\EmployeeController@restore');
	Route::get('restore-all','App\Http\Controllers\EmployeeController@restoreAll');
});
