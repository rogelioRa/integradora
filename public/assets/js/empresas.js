$(document).ready(function(){
  $("#btn-save").click(function(){
    var data = {
      nombre : $("#nombre").val(),
      descripcion: $("#descripcion").val(),
      correo:      $("#correo").val()
    }
    console.log(data);
    mandarDatos(data);
  });

  function mandarDatos(datos){
    $.ajax({
      url:"saveEmpresa",
      type:"POST",
      data:datos
    }).done(function(res){
      if(res.estauts== "200"){
        document.location.reload();
      }else{
        alert("Favor de llenar los datos");
      }
    }).fail(function(error){
      console.log(error);
    });
  }
});
