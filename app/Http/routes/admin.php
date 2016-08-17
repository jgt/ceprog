<?php

//busca un usuario en la lita del personal
Route::get('buscarUser', ['as' => 'buscarUser', 'uses' => 'AdminController@buscarUser']);
//borra un usuario de la lista del personal.
Route::get('deleteU/{id}', ['as' => 'deleteU', 'uses' => 'AdminController@delete']);

Route::get('foro', ['as' => 'foro', 'uses' => 'ForoController@create']);//verificar
Route::post('foro', ['as' => 'foro.store', 'uses' => 'ForoController@foro']);
Route::get('deleteForo/{id}', ['as' => 'deleteForo', 'uses' => 'ForoController@deleteForo']);

//resource controller
Route::resource('admin', 'AdminController');	
Route::resource('role', 'RoleController');
Route::resource('permiso', 'PermisosController');
Route::resource('carrera', 'CarreraController');
Route::resource('semestre', 'SemestreController');
Route::resource('materia', 'MateriaController');

Route::get('deleteCarrera/{id}', ['as' => 'deleteCarrera', 'uses' => 'CarreraController@deleteCarrera']);

Route::post('storeTutorial', ['as' => 'storeTutorial', 'uses' => 'VideosController@storeTutorial']);