<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'TaskController@index') -> name('home.index');

Route::get('/task/create' , 'TaskController@create') -> name('task.create');
Route::post('/task/create' , 'TaskController@store') -> name('task.store');
