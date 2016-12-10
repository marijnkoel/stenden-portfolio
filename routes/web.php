<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/school_group/{school_group}/users', 'School_groupsController@users');

Route::resource('school_groups', 'School_groupsController');
Route::resource('portfolios', 'PortfoliosController');
Route::resource('modules', 'ModulesController');
Route::resource('module_portfolios', 'Module_portfoliosController');
Route::resource('comments', 'CommentsController');
Route::resource('users', 'UsersController');