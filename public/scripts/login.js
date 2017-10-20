$(function(){

  $(".btn-inAccess, #r-btnLogin").click(function(){
    $("#modalReg").modal('hide');
    $("#modalAccess").modal('show');
  });

  $("#btnRegister").click(function(){
    $("#modalAccess").modal('hide');
    $("#modalReg").modal('show');
  });

  $("#btnLogin").click(function(){
    let correo = $("#correo").val();
    let pass = $("#pass").val();
    if (correo.trim() != "" && pass.trim() != ""){
      $.ajax({
        url: '/login',
        type: 'POST',
        data: {
          email: correo.trim(),
          cotrasenia: pass.trim()
        }
      })
      .done(function(res){
        switch (res.status) {
          case '200':
            window.location = "/admin/secciones";
            break;
          case '403':
            alertify.alert('Los datos ingresados no coinciden');
            break;
        }
        console.log(res);
      })
      .fail(function(err){
        alertify.error("Algo va mal");
        console.log(err);
      });
    }
    else {
      alertify.alert("Es necesario que ingreses todos los datos");
    }
  });

  $("#r-accept").click(function(){
    let correo = $("#r-correo").val();
    let pass = $("#r-pass").val();
    let name = $("#r-name").val();
    if (correo.trim() != "" && pass.trim() != "" && name != ""){
      $.ajax({
        url: '/register',
        type: 'POST',
        data: {
          nombre: name,
          email: correo.trim(),
          cotrasenia: pass.trim()
        }
      })
      .done(function(res){
        switch (res.status) {
          case '401':
            alertify,alert('El usuario ya existe, inicia sesión o intenta con otro correo');
            break;
          case '200':
            window.location.reload();
            break;
        }
        console.log(res);
      })
      .fail(function(err){
        console.log(err);
      });
    }
    else {
      alertify.alert("Es necesario que ingreses todos los datos");
    }
  });

});
