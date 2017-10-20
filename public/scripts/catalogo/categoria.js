$(function () {
// =========================================================================
// DECLARACION DE VARIABLES
  const $imagen = $("input[name=imagen]");
  const $openfile = $("button[name=openfile]");
  const $categorias = $("#categorias");
  const $imageName = $("input[name=file-image]");
  const maxSize = 2048000;
  const $title = $("input[name=titulo]");
  const $content = $("input[name=contenido]");
  const $btnSave = $("button[name=saveCategoria]");
  const $btnPrev = $("button[name=preview]");
  const $btnDel = $("body").find('button[name=categoria-del]');
  const $btnCancel = $('body').find('button[name=conf-cancel]');
  const $btnEdit = $('body').find('button[name=categoria-edit]');
  const $btnInPost = $('body').find('button[name=categoria-in]');
  var saveType = "save";
  var categoria_id;
// =========================================================================
// INICIALIZACIÓN
  $categorias.DataTable
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
  }
  function getValues(){
    let values = new FormData($("#form-imagen")[0]);
    values.append('nombre', $title.val());
    return values;
  }
  function saveCategoria(data, uri){
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
              'La sección de ha guardado.',
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
  function deleteCategoria(id){
    swal({
      title: '¿Estás seguro?',
      text: "Al eliminar esta categoría también se eliminaran todos los productos permanecientes a esta categoría.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar!',
      cancelButtonText: 'cancelar'
    }).then(function () {
      $.ajax({
        url: '/categoria-delete',
        type: 'POST',
        data: {'id': id}
      })
      .done(function(res){
        console.log(res);
        switch (res.status) {
          case '200':
            swal(
              'Eliminado!',
              'La categoría ha sido eliminada.',
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
      url: '/categoria-info',
      type: 'POST',
      data: {'id': id}
    })
    .done(function(res){
      try {
        switch (res.status) {
          case '200':
            $title.val(res.data.nombre);
            $(`.section-table`).hide('slow');
            $(`.admin-section`).show('slow');
            break;
          case '404':
            swal(
              'Upps',
              'La categoría seleccionada no pudo ser obtenida',
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
    resetConf();
    saveType = "save";
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
        $imageName.val("");
        $imagen.val("");
        $btnPrev.data('img-prev', '');
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
      uri= "/categoria-create";
    }
    else {
      uri = "/categoria-update";
      data.append('id', categoria_id);
    }
    saveCategoria(data, uri);
  });
  $btnPrev.on('click', function() {
    $("#preview").html("");
    $("#preview").append(`<h1 class="categoria-title">${$title.val()}</h1>`);
    $("#preview").append(`<div style="background-image: url(${$btnPrev.data('img-prev')})" class="categoria-banner"></div>`);
  });
  $btnDel.on('click', function(e) {
    $btnDel.prop('disabled', true);
    $btnInPost.prop("disabled", true);
    $btnEdit.prop('disabled', true);
    $("button[name=conf-in]").prop("disabled", true);
    deleteCategoria($(this).data('val'));
  });
  $btnEdit.on('click', function (e) {
    $btnEdit.prop('disabled', true);
    $btnDel.prop('disabled', true);
    $btnInPost.prop("disabled", true);
    $("button[name=conf-in]").prop("disabled", true);
    categoria_id = $(this).data('val');
    saveType = 'update';
    getEditValues(categoria_id);
  });
  $btnCancel.on('click', (e) => {
    $btnEdit.prop('disabled', false);
    $btnDel.prop('disabled', false);
    $btnInPost.prop("disabled", false);
    $("button[name=conf-in]").prop("disabled", false);
  });
  $(".li-menu").removeClass("active");
  $("#li-catalogo").addClass("active");

// =========================================================================
});
