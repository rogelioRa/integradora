<!DOCTYPE html5>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="keywords" content="prefiltros,motores,torreon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="//assets/media/images/valores/nuestrosvalores.jpg">    <title>@yield('title')</title>
    <!-- Zona de archivos de estilo -->
    {{HTML::style('/libs/mdb/css/bootstrap.min.css')}}
    {{HTML::style('/libs/font-awesome/css/font-awesome.min.css')}}
  	{{HTML::style('/libs/mdb/css/mdb.min.css')}}
    {{HTML::style('/libs/mdb/css/style.css')}}
    {{HTML::style('/assets/css/main.css')}}
    {{HTML::style('/assets/css/style.css?'.rand())}}
    {{HTML::style('/assets/css/preload.css')}}
    <link rel="stylesheet" href="//libs/sweetalert2/sweetalert2.min.css">
  	@yield('css')
  </style>
</head>
<body class="intro-page pink-skin">
    <header>
      <!-- navbar-fixed-top scrolling-navbar -->
        <!--Navbar-->
        <!--Main Navigation-->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-default">
        <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Opinions</a>
                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </nav>

</header>
<!--Main Navigation-->
        @yield("carousel-section")
<main>
     @yield('content-main')
</main>
<div class="modal fade" id="mdl-login-register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist" style="background-color:#E31837!important;">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Registrarme</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <form id="frm-login">
                          <div class="modal-body mb-1">
                              <div class="md-form form-sm">
                                  <i class="fa fa-envelope prefix"></i>
                                  <input type="text" id="email" name="email" class="form-control">
                                  <label for="email">Correo</label>
                              </div>

                              <div class="md-form form-sm">
                                  <i class="fa fa-lock prefix"></i>
                                  <input type="password" id="password" name="password" class="form-control">
                                  <label for="password">Contraseña</label>
                              </div>
                              <div class="text-center mt-2">
                                  <button class="btn btn-success" id="btn-login">Iniciar <i class="fa fa-sign-in ml-1"></i></button>
                              </div>
                          </div>
                        </form>
                        <!--Footer-->
                        <div class="modal-footer display-footer">
                            <button type="submit" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal">Cerrar <i class="fa fa-times-circle ml-1"></i></button>
                        </div>

                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body">
                            <form id="frm-register">
                              <div class="md-form form-sm">
                                  <i class="fa fa-envelope prefix"></i>
                                  <input type="email" id="email-r" name="emai-r" class="form-control" length="100">
                                  <label for="email-r">Correo</label>
                              </div>
                              <div class="md-form form-sm">
                                  <i class="fa fa-keyboard-o prefix"></i>
                                  <input type="text" id="nombre" name="nombre" class="form-control" length="100">
                                  <label for="nombre">Nombre(s)</label>
                              </div>

                              <div class="md-form form-sm">
                                  <i class="fa fa-keyboard-o prefix"></i>
                                  <input type="text" id="apellidos" name="apellidos" class="form-control" length="100">
                                  <label for="apellidos">Apellido(s)</label>
                              </div>

                              <div class="text-center form-sm mt-2">
                                  <button type="submit" class="btn btn-success" id="btn-register">Iniciar <i class="fa fa-sign-in ml-1"></i></button>
                              </div>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal" id="btn-close" >Cerrar <i class="fa fa-times-circle ml-1"></i></button>
                        </div>
                        </form>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
</div>
<!--Footer-->
<footer class="page-footer blue center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title">Footer Content</h5>
                <p>Here you can use rows and columns here to organize your footer content.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="title">Links</h5>
                <ul>
                    <li><a href="#!">Link 1</a></li>
                    <li><a href="#!">Link 2</a></li>
                    <li><a href="#!">Link 3</a></li>
                    <li><a href="#!">Link 4</a></li>
                </ul>
            </div>
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2015 Copyright: <a href="https://www.MDBootstrap.com"> MDBootstrap.com </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

     <!--/.Footer-->

 <!-- Zona de archivos js -->
    {{HTML::script('/libs/mdb/js/jquery-3.1.1.min.js')}}
    {{HTML::script('/libs/mdb/js/popper.min.js')}}
    {{HTML::script('/libs/mdb/js/bootstrap.min.js')}}
    {{HTML::script('/libs/mdb/js/mdb.min.js')}}
    {{HTML::script('/libs/validation/jquery.validate.min.js')}}
    {{HTML::script('/libs/validation/additional-methods.min.js')}}
    {{HTML::script('/libs/validation/localization/messages_es.js')}}
    <script src="//assets/js/dupont.js" charset="utf-8"></script>
    <script src="//assets/js/user.js?{{rand()}}"></script>

        <script>
            //Animation init
            new WOW().init();

            //Modal
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').focus()
            })

            // Material Select Initialization
            $(document).ready(function() {
                $('.mdb-select').material_select();
            });

            // MDB Lightbox Init
            $(function () {
                $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
            });
        </script>
    @yield('js')
<!--/.Navbar-->
</body>
</html>
