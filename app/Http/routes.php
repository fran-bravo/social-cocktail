<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {
    return view('plantillas.admin.admin');
});
Route::group(['prefix' => 'admin'], function(){
    route::get('create', function(){
        return view('plantillas.admin.UserForms.create');
    });
});