<?php

class DepartamentoController extends BaseController {
  function mostrar($id){
    $departamentos = Departamento::where("active","=","1")->where("empresa_id","=",$id)->get();

    return View::make("departamentos",["departamentos"=>$departamentos,"empresa_id"=>$id]);
  }
  function registrarDepartamento(){
    $data = Input::all();
    $rules =  [
      "nombre" => "required",
      "descripcion"=>"required",
      "correo"=>"required",
      "empresa_id"=>"required"
    ];
    $validador = Validator::make($data,$rules);
    if($validador->fails()){
      return Response::json(["estatus"=>"201","message"=>$validador->messages()]);
    }else{
      $departamento = new Departamento();
      $departamento->nombre = $data["nombre"];
      $departamento->descripcion = $data["descripcion"];
      $departamento->correo_encargado = $data["correo"];
      $departamento->active = 1;
      $departamento->empresa_id =$data["empresa_id"];
      $departamento->save();
      return Response::json(["estatus"=>"200","message"=>"El departamento se ha registrado exitosamente"]);
    }

  }
}
