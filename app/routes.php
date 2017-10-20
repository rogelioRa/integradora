<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

<<<<<<< HEAD
Route::get('/', function(){
	return View::make('home');
});

Route::get("/categoria",function(){
	return View::make("categorias");
});

Route::group(["before"=>"auth"],function(){
	//solo se podrá acceder a las rutas que esten dentro de aquí
	//en caso de que el usuario este logeado

});

Route::post("/register","UserController@register");
Route::post("/login",'LoginController@login');
Route::get("/logout",'LoginController@logout');
=======
Route::get('/', function()
{
	return View::make('login');
});

Route::get("/registrar",'UserController@registrar');
Route::post("/login",'UserController@logear');
>>>>>>> 183e9c200334798cb6cd42d60fd56eec268a390c
