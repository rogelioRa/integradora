<?php

class EmpresaController extends BaseController {
  function registrarEmpresa(){
    $data = Input::all();
    $rules =  [
      "nombre" => "required",
      "descripcion"=>"required",
      "correo"=>"required"
    ];
    $validador = Validator::make($data,$rules);
    if($validador->fails()){
      return Response::json(["status"=>"201","message"=>$validador->messages()]);
    }else{
      $empresa = new Empresa();
      $empresa->nombre = $data["nombre"];
      $empresa->descripcion = $data["descripcion"];
      $empresa->correo_encargado = $data["correo"];
      $empresa->active = 1;
      $empresa->save();
      return Response::json(["estatus"=>"200","message"=>"La empresa se ha registrado exitosamente"]);
    }

  }
}
