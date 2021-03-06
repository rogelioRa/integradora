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

Route::get('/', function(){
	return View::make('home');
});

Route::get("/empresas",function(){
	return View::make("categorias");
});

Route::group(["before"=>"auth"],function(){
	//solo se podrá acceder a las rutas que esten dentro de aquí
	//en caso de que el usuario este logeado

});

Route::post("/saveEmpresa","EmpresaController@registrarEmpresa");
Route::post("/saveDepartamento","DepartamentoController@registrarDepartamento");
Route::get("/departamentos/{id}","DepartamentoController@mostrar");
Route::post("/register","UserController@register");
Route::post("/login",'LoginController@login');
Route::get("/logout",'LoginController@logout');
