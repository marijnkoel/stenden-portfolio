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

Route::get('portfolios/{portfolio}','PortfoliosController@show');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	
		Route::resource('modules', 'ModulesController');
	Route::group(['middleware' => ['self']], function () {
		// Self
		Route::resource('portfolios', 'PortfoliosController',['except' => ['show']]);
		Route::resource('users', 'UsersController');
	});

	Route::group(['middleware' => ['admin']], function () {
		// Admin
		Route::resource('school_groups', 'School_groupsController');
		Route::resource('module_portfolios', 'Module_portfoliosController');
		Route::resource('comments', 'CommentsController');
		Route::post('/modules/{module}/approve','ModulesController@approve');
		Route::post('/modules/{module}/grade','ModulesController@grade');
		Route::post('/modules/{module}/gradeportfolio','ModulesController@gradeportfolio');
		Route::get('/school_groups/{school_group}/users', 'School_groupsController@users');
		Route::post('/portfolios/{portfolio}/comment','PortfoliosController@comment');
	});
});