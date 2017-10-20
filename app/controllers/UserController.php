<?php

class UserController extends BaseController {


	public function register(){
    if(!Auth::user()){
			$data = Input::all();
			$rules = [
				"email" 		=> "required|email|unique:users",
				"nombre"		=>"required",
				"apellidos"	=>"required"
			];
			$messages = [
				"required" => "El campo :attribute es requerido.",
				"unique"   => "El campo :attribute ya se encuentra en uso.",
				"email" 	 => "El formato de tu email es incorrecto."
			];
			$validacion = Validator::make($data,$rules,$messages);
			if($validacion->fails()){
				return UserController::VALID_ERROR($validacion->messages());
			}else{
				$user = new User($data);
				$user->password = Hash::make("NuestrosValores");
				$user->active = 1;
				//$user->active = 0;
				$user->save();
				Auth::loginUsingId($user->id);
				return UserController::SUCCESS(null);
			}
    }
  }

  public function ValidEmail(){

  }

  public function sendEmail(){

  }
	public static function VALID_ERROR($data){
		return Response::json(["status"=>"401-D",'statusMessage'=>"validError","message"=>"Fallo al validar algunos datos","data"=>$data]);
	}
	public static function SUCCESS($data){
		return Response::json(["status"=>"200",'statusMessage'=>"success","message"=>"El registro se ha realizadó exitósamente","data"=>$data]);
	}
	public static function WARNING($data){
		return Response::json(["status"=>"201",'statusMessage'=>"warning","message"=>"Algo salio mal durante el registro, consulte con el administrador del portal","data"=>$data]);
	}
}
