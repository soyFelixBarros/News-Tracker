<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tag/{tag}', 'TagsController@show')->name('tag_show');

// Admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
	// Tags
	$this->get('/tags', 'TagsController@index')->name('tags');

	// Articles
	$this->get('/articles', 'ArticlesController@index')->name('article');
	$this->get('/articles/{id}/edit', 'ArticlesController@edit')->name('article_edit');
	$this->post('/articles/{id}/edit', 'ArticlesController@update');
});

// Settings
Route::group(['middleware' => 'auth', 'prefix' => 'settings'], function () {
	$this->get('/', 'SettingsController@profile');
	$this->get('/profile', 'SettingsController@profile')->name('profile');
	$this->post('/profile', 'SettingsController@updateProfile');
	$this->get('/security', 'SettingsController@security');
	$this->post('security', 'SettingsController@updatePassword');
});
