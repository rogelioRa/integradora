$(function(){
  var $frmR = $("#frm-register");
  $("#frm-register").submit(function(event){
    event.preventDefault();
    if($("#nombre").val() == "" || $("#apellidos").val()=="" || $("email-r").val()==""){
      toastr.info("Favor de llenar todos los campos");
    }else{
      data = {
        nombre: $("#nombre").val(),
        apellidos: $("#apellidos").val(),
        password: $("#pass-r").val(),
        email : $("#email").val(),
        username : $("#username-r").val()
      }
      $.ajax({
        url:"/register",
        method:"POST",
        data: data
      }).done(function(response){
        if(response.status=="200"){
          toastr.success(response.message+', ahora puedes iniciar sesion',"Registro completado.");
          $("#btn-close").trigger("click");
          $frmR[0].reset();
          setTimeout(function(){
              document.location = "/";
          },3500)

          //Document.getElementById('frm-register').reset();
        }else if(response.status=="401-D"){
          console.log(response);
          $.each(response.data,function(object,value){
            toastr.info(value);
          });
        }
      }).fail(function(error){
        console.error(error);
      });
    }
  });
  $("#frm-login").submit(function(event){
    event.preventDefault();
    data = {
      username: $("#username").val(),
      password:  $("#pass").val()
    };
    $.ajax({
      url:"/login",
      method:"POST",
      data:data
    }).done(function(response){
      if(response.status=="200"){
        toastr.success(response.message,"Audiso:");
        $("#btn-close").trigger("click");
        document.location = "/empresas";
      }else if(response.status=="D-106"){
        toastr.info("email o contraseña incorrectos");
      }
    }).fail(function(error){
      console.error(error);
    });
  });
});
