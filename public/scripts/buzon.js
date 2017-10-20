$(function(){
  var object = {
    getDataInteres : function(){
      return {
        email   : $("#emailaddress").val(),
        name    : $("#nombres").val(),
        message : $("#mensaje").val(),
        id      : $("#id").val()
      }
    },
    getData   : function(){
      return {
        email   : $("#email_address").val(),
        name    : $("#first_name").val(),
        message : $("#message").val()
      }
    },
    enviar: function(data,btn){
      alertify.success("Enviando correo por favor espere.");
      var html = btn.html();
      btn.html("Enviando...");
      btn.prop("disabled",true);
      object.sendMessage(data,function(response){
        console.log(response);
        if(response.status=="200"){
          alertify.success(response.message);
          $("#frm-send-message")[0].reset();
          $("#frm-send-message-int")[0].reset();
          $("#bntCancel").trigger("click");
          btn.html(html);
          btn.prop("disabled",false);
        }else{
          alertify.error("Algo salio mal consulte con el administrador");
        }
      });
    },
    sendMessage : function(data,callback){
      $.ajax({
        "url"  :  "/send-messaege",
        "type" :  "POST",
        "data" : data
      }).done(callback).fail(function(error){
        console.error(error);
      });
    }
  }
  $("#frm-send-message").submit(function(event){
    event.preventDefault();
    var data = object.getData();
    console.log(data);
    object.enviar(data,$("#btnSend"));
  });
  $("#frm-send-message-int").submit(function(event){
    event.preventDefault();
    var data = object.getDataInteres();
    console.log(data);
    object.enviar(data,$("#btnSendInt"));
  });
});
