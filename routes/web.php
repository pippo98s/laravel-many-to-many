<?php


Route::get('/', 'TaskController@index') -> name('home.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
