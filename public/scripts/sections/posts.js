$(function () {

// =========================================================================
// DECLARACION DE VARIABLES

  const $imagen = $("input[name=imagen]");
  const $openfile = $("button[name=openfile]");
  const $posts = $("#posts");
  const $imageName = $("input[name=file-image]");
  const maxSize = 2048000;
  const $title = $("input[name=titulo]");
  const $content = $("input[name=contenido]");
  const $btnSave = $("button[name=savepost]");
  const $btnPrev = $("button[name=preview]");
  const $btnDel = $("body").find('button[name=post-del]');
  const $btnCancel = $('body').find('button[name=conf-cancel]');
  const $btnEdit = $('body').find('button[name=post-edit]');
  const $btnInPost = $('body').find('button[name=post-in]');

  var saveType = "save";
  var post_id;
  var section_id;

// =========================================================================
// INICIALIZACIÓN

  $posts.DataTable();
  tinymce.init({
    selector: 'textarea',
    height: 400,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor textcolor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code help'
    ],
    toolbar: 'insert | undo redo |  styleselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tinymce.com/css/codepen.min.css']
  });

// =========================================================================
// FUNCIONES

  function fileExt(archivo, tipos){
    extensiones_permitidas = tipos;
    extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
    permitida = false;
    for (var i = 0; i < extensiones_permitidas.length; i++) {
      if (extensiones_permitidas[i] == extension) {
        permitida = true;
        break;
      }
    }
    if (!permitida) {
      swal(
        'Upps!',
        "Comprueba la extensión del archivo a subir. \nSólo se pueden subir archivos con extensiones de tipo: "+extensiones_permitidas.join(),
        'warning'
      );
    	}else{
       return true;
    	}
     return false;
  }

  function resetConf(){
    $imageName.val("");
    $title.val("");
    $content.val("");
    tinymce.activeEditor.setContent("");
  }

  function getValues(){
    let values = new FormData($("#form-imagen")[0]);
    values.append('titulo', $title.val());
    values.append('contenido', tinymce.activeEditor.getContent());
    values.append('seccion_id', section_id);
    console.log(values.get("contenido"));
    return values;
  }

  function savepost(data, uri){
    console.log(data);
    $.ajax({
      url: uri,
      type: 'POST',
      data: data,
      cache: false,
      contentType: false,
      processData: false
    })
    .done(function(res){
      try {
        switch (res.status) {
          case "200":
            swal(
              'Bien hecho!',
              'La publicación se ha guardado.',
              'success'
            );
            window.location.reload();
            break;
          case "401":
            $.each(res.data, function(index, obj){
              swal(
                'Upps!',
                 ""+obj,
                'info'
              );
            });
            $btnSave.prop("disabled", false);
            $btnDel.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            break;
          default:
            $btnSave.prop("disabled", false);
            $btnDel.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            swal(
              'Upps!',
              'Error no administrado, vulve a intentarlo\nSi el problema continua, contactanos http://www.supernovaapps.com.mx',
              'error'
            );
            break;
        }
      } catch (e) {
        swal(
          'Upps!',
          'Error no administrado, vulve a intentarlo\nSi el problema continua, contactanos http://www.supernovaapps.com.mx',
          'error'
        );
      }
    })
    .fail(function(err){
      console.log(err);
    });
  }

  function deletepost(id){
    swal({
      title: '¿Estás seguro?',
      text: "Al eliminar esta publicación no podrás revertir los cambios",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar!',
      cancelButtonText: 'cancelar'
    }).then(function () {
      $.ajax({
        url: '/post-delete',
        type: 'POST',
        data: {'id': id}
      })
      .done(function(res){
        console.log(res);
        switch (res.status) {
          case '200':
            swal(
              'Eliminado!',
              'La publicación ha sido eliminada.',
              'success'
            );
            window.location.reload();
            break;
          case '404':
            swal(
              'Upps!',
              'No se ha realizado la acción, recarga e intentalo nuevamente.',
              'info'
            );
            break;
        }
      })
      .fail(function(err){
        swal(
          'Upps!',
          'Error no administrado, vulve a intentarlo\nSi el problema continua, contactanos http://www.supernovaapps.com.mx',
          'error'
        );
        console.log(err);
      });
    });
    $btnDel.prop('disabled', false);
    $btnInPost.prop("disabled", false);
    $btnEdit.prop('disabled', false);
  }

  function getEditValues(id){
    $.ajax({
      url: '/post-info',
      type: 'POST',
      data: {'id': id}
    })
    .done(function(res){
      console.log(res);
      try {
        switch (res.status) {
          case '200':
            $title.val(res.data.titulo);
            tinymce.activeEditor.setContent(res.data.contenido);
            $btnPrev.data('img-prev', `/assets/images/post/${res.data.banner}`);
            $(`.section-table`).hide('slow');
            $(`.admin-section`).show('slow');
            break;
          case '404':
            swal(
              'Upps',
              'La publicación seleccionada no pudo ser obtenida',
              'info'
            );
            break;
          default:
            swal(
              'Upps!',
              'Error no administrado, vulve a intentarlo\nSi el problema continua, contactanos http://www.supernovaapps.com.mx',
              'error'
          );
            break;
        }
      } catch (e) {
        console.log(e);
        swal(
          'Upps!',
          'Error no administrado, vulve a intentarlo\nSi el problema continua, contactanos http://www.supernovaapps.com.mx',
          'error'
        );
      }
    })
    .fail(function(err){
      swal(
        'Upps!',
        'Error no administrado, vulve a intentarlo\nSi el problema continua, contactanos http://www.supernovaapps.com.mx',
        'error'
      );
      console.log(err);
    });
  }

// =========================================================================
// LLAMADAS Y ACCIONES

  $("button[name=conf-cancel]").on('click', resetConf);
  $("button[name=conf-in]").on('click', function(e){
    saveType = "save";
    resetConf();
    section_id = $(this).data('val');
  });

  $openfile.on('click', () => { $imagen.trigger('click'); })

  $imagen.on('change', (e) => {
    if (e.target.value.trim() != ""){
      var archivos = document.getElementById(e.target.id).files;
      if(archivos[0].size > maxSize){
        $imageName.val("");
        $imagen.val("");
        $btnPrev.data('img-prev', '');
        swal(
          'Upps!',
          `El archivo seleccionado excede el peso máximo de ${((maxSize / 1024) / 1000) + " MB"}`,
          'warning'
        );
      }
      let value = archivos[0].name;
      if ( fileExt(value, ['.png', '.jpg']) == true ){
        var reader = new FileReader();
        reader.onload = function (e) { $btnPrev.data('img-prev', e.target.result); }
        reader.readAsDataURL(archivos[0]);
        $imageName.val(value);
      }
      else {
        $btnPrev.data('img-prev', '');
        $imageName.val("");
        $imagen.val("");
      }
    }
  });

  $btnSave.on('click', function(e) {
    $btnSave.prop("disabled", true);
    $btnDel.prop("disabled", true);
    $btnCancel.prop("disabled", true);
    let data = getValues();
    var uri = "";
    if (saveType == "save"){
      uri = "/post-create";
    }
    else {
      uri = "/post-update";
      data.append('id', post_id);
    }
    savepost(data, uri);
  });

  $btnPrev.on('click', function() {
    $("#preview").html("");
    $("#preview").append(`<h1 class="post-title">${$title.val()}</h1>`);
    $("#preview").append(`<div style="background-image: url(${$btnPrev.data('img-prev')})" class="post-banner"></div>`);
    $("#preview").append(tinymce.activeEditor.getContent());
  });

  $btnDel.on('click', function(e) {
    $btnDel.prop('disabled', true);
    $btnInPost.prop("disabled", true);
    $btnEdit.prop('disabled', true);
    $("button[name=conf-in]").prop("disabled", true);
    deletepost($(this).data('val'));
  });

  $btnEdit.on('click', function (e) {
    $btnEdit.prop('disabled', true);
    $btnDel.prop('disabled', true);
    $btnInPost.prop("disabled", true);
    $("button[name=conf-in]").prop("disabled", true);
    post_id = $(this).data('val');
    saveType = 'update';
    getEditValues(post_id);
  });

  $btnCancel.on('click', (e) => {
    $btnEdit.prop('disabled', false);
    $btnDel.prop('disabled', false);
    $btnInPost.prop("disabled", false);
    $("button[name=conf-in]").prop("disabled", false);
  });



// =========================================================================

});

/*

//ploblema de cortar el césped
var superficieAzteca = 7140;// mts cuadrados
var maquitasEmpleadasAzteca = 3;// maquinas utilizadas para cortar el cesped
var horasEmpleadas = 5;// horas empleadas para cortar el cesped del estadio
var cantidadCortadaPorMaquita = superficieAzteca/maquitasEmpleadasAzteca;
var cantidadCortadaPorMaquitaPorHora = cantidadCortadaPorMaquita / horasEmpleadas;
// imprimimos la respuesta y nos tiene que dar la cantidad que cortaron las maquitas por hora
alert(cantidadCortadaPorMaquitaPorHora);
//comprobamos que los calculos esten correctos
alert((cantidadCortadaPorMaquitaPorHora*maquitasEmpleadasAzteca)*horasEmpleadas);
// ahora sí teniendo esto comenzamos el nuevo problema
var superficieA_Calcular = superficieAzteca / 2; // ya que nos dice el problema que la superficie sea la mitad
var maquitasEmpleadasNuevas = 7;
//var cantidadCortadaPorMaquitaNueva = superficieA_Calcular / maquitasEmpleadasNuevas;
// realizamos el calcullo dividiendo la superficie que se cortara
//sentre  la cantidad de metros que corta una maquita por hora multiplicada por las maquitas empleadas que son 7 en este caso
var horasATardarParaCortarElCesped = superficieA_Calcular / (cantidadCortadaPorMaquitaPorHora*maquitasEmpleadasNuevas);
// vemos el resultado
alert(horasATardarParaCortarElCesped);
*/
