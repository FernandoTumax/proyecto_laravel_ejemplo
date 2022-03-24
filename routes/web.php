<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/home');
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('campus', CampusController::class);
Route::post('campus-ajax/towns', 'CampusController@towns')->name('towns');
Route::get('validate-campus', 'CampusController@validCode');
Route::get('/administracion', 'HomeController@indexAdministracion')->name('administracion')->middleware('role:admin');
Route::resource('jobs', JobTitleController::class);
Route::resource('employees', EmployeeController::class);
Route::get('validate-cui', 'EmployeeController@validCui');
Route::get('validate-nit', 'EmployeeController@validNit');
Route::get('validate-job', 'JobTitleController@validJob');

