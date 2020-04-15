<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['middleware' => ['auth:api']], function() {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
    Route::get('/all_users', 'HomeController@getAllUsers');
    Route::get('/user_types', 'HomeController@userTypes');
    Route::get('/meetups', 'HomeController@meetups');
    Route::get('/training/{id}', 'HomeController@training');
    Route::get('/trainer/{id}', 'HomeController@getUser');
    Route::put('training/{id}/update', 'TrainingController@updateMeetUp');
});

Route::group(['middleware' => ['auth:api', 'admin']], function() {

});

Route::group(['middleware' => ['auth:api', 'member']], function() {

});

Route::group(['middleware' => ['auth:api', 'student']], function() {

});
