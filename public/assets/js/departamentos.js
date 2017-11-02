$(document).ready(function(){
  $("#btn-save").click(function(){
    var data = {
      nombre :     $("#nombre").val(),
      descripcion: $("#descripcion").val(),
      correo:      $("#correo").val(),
      empresa_id:   $("#empresa_id").val()
    }
    console.log(data);
    mandarDatos(data);
  });

  function mandarDatos(datos){
    $.ajax({
      url:"/saveDepartamento",
      type:"POST",
      data:datos
    }).done(function(res){
      if(res.estatus=="200"){
        document.location.reload();
      }else if(res.estatus=="201"){
        alert("Favor de llenar todos los campos");
      }
    }).fail(function(error){
      console.log(error);
    });
  }
});
