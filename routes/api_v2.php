<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user_types', 'HomeController@userTypes');
Route::post('/login', 'Api_v2\UserController@login');
Route::post('/register', 'Api_v2\UserController@register');
