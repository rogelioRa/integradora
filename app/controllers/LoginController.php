<?php

class LoginController extends BaseController {


	public function login(){
			$data = Input::all();
			//return $data;
			$credenciales = [
				"email"=> $data["email"],
				"password"=>$data["password"],
				"active"=>1
			];
			return $this->logear($credenciales);
  }
  public function logout(){
		Auth::logout();
		return Redirect::to('/');
  }

	private function logear($credenciales){
		if(Auth::attempt($credenciales)){
			return Response::json(array("status" => "200", 'statusMessage' => "success",'message'=>'Bienvenido '.$credenciales["email"]));
		}else return Response::json(array("status"=>'D-106',"statusMessage"=>"warning","message"=>'Credenciales incorrectas'));
	}
}
