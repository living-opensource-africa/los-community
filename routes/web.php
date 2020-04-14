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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['isActive', 'auth']], function() {
    Route::get('/home/{any?}/{id?}/{action?}', 'HomeController@index')->name('home');
    Route::post('/room', 'TrainingController@index');
});

// Admin Routes
Route::group(['middleware' => ['isActive', 'auth', 'Admin'], 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::post('/meet_up', 'AdminController@createMeetUp')->name('admin.meetup');
});

// Member Routes
Route::group(['middleware' => ['isActive', 'auth', 'member'], 'prefix' => 'member'], function() {
    Route::get('/', 'MemberController@index')->name('member.index');
});

// Student Area
Route::group(['middleware' => ['isActive', 'auth', 'student'], 'prefix' => 'student'], function() {
    Route::get('/', 'StudentController@index')->name('Student.index');
});