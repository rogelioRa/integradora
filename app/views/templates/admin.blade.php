<!-- Ancho Máximo 767px -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/assets/images/logo-banner.png">
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/styles/admin/stack/admin.min.css">
    <link rel="stylesheet" href="/styles/admin/stack/skins/skin-black.min.css">
    <link rel="stylesheet" href="/styles/admin/css/admin-gral.css">
    <link rel="stylesheet" href="/libs/sweetalert2-master/dist/sweetalert2.css">
    @yield('styles')

    <title>
      @yield('title')
    </title>
  </head>

  <body class="hold-transition skin-black fixed">
    <div class="wrapper">
      <header class="main-header">
        <a href="javascript:void(0)" class="logo">
          <span class="logo-lg"><b>Audisof</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menú</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="active li-menu" id="li-blog">
              <a href="/admin/secciones">
                <i class="fa fa-link"></i>
                <span>Empresas</span>
              </a>
            </li>
            <li class="li-menu" id="li-catalogo">
              <a href="/admin/categorias#">
                <i class="fa fa-link"></i>
                <span>Cuestionarios</span>
              </a>
            </li>
            <li class="li-menu">
              <a href="/logout">
                <i class="fa fa-sign-out"></i>
                <span>Auditoria</span>
              </a>
            </li>
            <li class="li-menu">
              <a href="/logout">
                <i class="fa fa-sign-out"></i>
                <span>Cerrar session</span>
              </a>
            </li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content">

          @yield('content')

        </section>
      </div>

      <footer class="main-footer">
        <strong>
          Copyright &copy; 2017
          <a href="https://www.supernovaapps.com.mx">Supernova Apps</a>
        </strong>
        | Todos los derechos reservados.
      </footer>

    </div>

    <script src="/libs/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="/libs/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="/libs/fastclick/fastclick.js"></script>
    <script src="/scripts/app.min.js"></script>
    <script src="/scripts/admin/admin.js" charset="utf-8"></script>
    <script src="/libs/sweetalert2-master/dist/sweetalert2.js" charset="utf-8"></script>

    @yield('scripts')

  </body>
</html>
