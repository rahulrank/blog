<?php

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('tags/{tags}', 'TagsController@show');
Route::resource('articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
	]);