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

Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes

Route::group(['middleware' => ['isActive', 'Admin'], 'prefix' => 'admin'], function() {
    // Admin routes defination
});

Route::group(['middleware' => ['isActive','member'], 'prefix' => 'member'], function() {
    // Member routes defination
});

Route::group(['middleware' => ['isActive', 'student'], 'prefix' => 'student'], function() {
    // STudent Routes
});