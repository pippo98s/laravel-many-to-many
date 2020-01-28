<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'TaskController@index') -> name('home.index');

Route::get('/task/create' , 'TaskController@create') -> name('task.create');
Route::post('/task/create' , 'TaskController@store') -> name('task.store');

Route::get('task/update/{id}' , 'TaskController@edit') -> name('task.edit');
Route::post('task/update/{id}' , 'TaskController@update') -> name('task.update');

Route::delete('task/delete/{id}' , 'TaskController@destroy') -> name('task.destroy');