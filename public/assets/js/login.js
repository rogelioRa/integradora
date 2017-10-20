$(document).ready(function(){
  $("#btnLogin").click(function(){
    var data = {
      username: $("#username").val(),
      password: $("#password").val()
    }
    console.log(data);
  });
});
