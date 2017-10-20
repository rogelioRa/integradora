@extends('templates.admin')

@section('styles')
  <link rel="stylesheet" href="/libs/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="/styles/section/css/section.css">
@stop

@section('title')
  Cuestionario - Audisof
@stop

@section('content')
  <section class="row section-table">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cuestionario de auditorias</h3>
          <div class="pull-right">
            <button type="button" name="conf-in" class="btn btn-success conf-display">
              <span class="fa fa-plus"></span>&nbsp;
              Nuevo cuestionario
            </button>
          </div>
          <br>
        </div>
        <div class="box-body">
          <table id="categorias" class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th>Nombre del cuestionariow</th>
                <th>Fecha de Creación</th>
                <th>Última Actualización</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @for($i=0;$i<10;$i++)
              <tr>
                <td>nombre</td>
                <td>fecha</td>
                <td>Última actualización</td>
                <td>
                  <center>
                    <button type="button" name="categoria-edit" class="btn btn-info btn-inline-block" title="Editar" data-val="">
                      <span class="fa fa-pencil"></span>
                    </button>
                    <button type="button" name="categoria-del" class="btn btn-danger btn-inline-block" title="Eliminar" data-val="">
                      <span class="fa fa-trash"></span>
                    </button>
                    <a href="/admin/producto/" name="categoria-in" class="btn btn-primary btn-inline-block" title="Ingresar">
                      <span class="fa fa-arrow-right"></span>
                    </a>
                  </center>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

<!-- Detalles de la seccion y agregar nuevo -->
  <section class="row admin-section">
    <div class="col-xs-12">
      <div class="box">

        <div class="box-header">
          <h3 class="box-title">
            Agregar nueva categoría
          </h3>
        </div>

        <div class="box-body">
          <form name="form-section">
            <div class="form-group">
              <label>Título de la categoría</label>
              <input type="text" name="titulo" class="form-control" autofocus>
            </div>
          </form>
          <form name="form-imagen" hidden="hidden" id="form-imagen">
            <input type="file" name="imagen" id="imagen">
          </form>
        </div>

        <div class="box-footer">
          <div class="text-right">
            <button type="button" name="conf-cancel" class="btn btn-warning conf-display">
              <span class="fa fa-trash"></span>&nbsp;
              Cancelar
            </button>
            <button type="button" name="saveCategoria" class="btn btn-primary">
              <span class="fa fa-check"></span>&nbsp;
              Guardar Categoría
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="row section-preview">
    <div class="col-md-12">
      <div class="back-section">
        <button name="back-conf" class="btn btn-primary btn-preview">
          <span class="fa fa-arrow-left"></span>&nbsp;
          Regresar
        </button><br><br>
      </div>
      <div class="box">
        <div class="box-body">
          <div id="preview"></div>
          @for ($i=0; $i < 3; $i++)
          <div class="col-md-4">
            <img src="/assets/images/system/post.png" class="img-responsive">
            {{-- <div id="preview-posts"></div> --}}
          </div>
          @endfor
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')
  <script src="/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="/libs/datatables/dataTables.bootstrap.min.js"></script>
  <script src="/libs/tinymce/js/tinymce/tinymce.min.js" charset="utf-8"></script>
  <script src="/scripts/catalogo/categoria.js" charset="utf-8"></script>
@stop
