<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <title>Green 86 - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="/assets/images/logo-banner.png">
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link media="all" type="text/css" rel="stylesheet" href="/libs/mdb/css/bootstrap.min.css">

    <link media="all" type="text/css" rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css">

  	<link media="all" type="text/css" rel="stylesheet" href="/libs/mdb/css/mdb.min.css">

    <!-- Main CSS -->
    <link href="/assets/css/blog.css" rel="stylesheet" type="text/css">
    @yield('css')
</head>
<body>
  <!--Main Navigation-->
<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark black">
        <a style="margin-left:5rem;" class="navbar-brand" href="/"><img src="/assets/images/logo-banner.png" class="img-fluid" style="width:10rem;height:2.6rem;" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fa fa-home"></i> Inicio </a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
<!--Main Navigation-->

<!--Main Layout-->
<main class="container pt-3" style="margin-top:6rem;">
<!--Main layout-->

	<!-- First row -->
	<div class="row">
		<div class="col-md-6 float-md-none mx-auto">
			<img src="/assets/images/404.png" alt="Error 404" class="img-fluid wow fadeIn" style="animation-name: none; visibility: visible;">
		</div>
	</div>
	<!-- /.First row -->

	<!-- Second row -->
	<div class="row mt-3">
		<div class="col-md-12 text-center mb-r">
			<h2 class="h2-responsive wow fadeIn" data-wow-delay="0.2s" style="font-weight: 500; animation-name: none; visibility: visible;">Oops! La página que intentas buscar no fue encontrada.</h2>
			<p class="wow fadeIn" data-wow-delay="0.4s" style="font-size: 1.25rem; animation-name: none; visibility: visible;">Sí crees que esto es un error del sistema consulta con el administrador.</p>
      <a href="#" onclick="window.history.back();">Regresar</a>
		</div>
	</div>

	<!-- /.Second row -->

<!--/.Main layout-->
</main>

    <!-- Begin Footer -->
    <footer class="footer">

        <!-- Begin Footer Section -->
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 footer-column not-right-column">
                        <div class="footer-text">
                          <h4>Contactanos</h4>

                          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla rebds vel pellentesqu</p> -->
                          <p>Nos gustaría saber más de tí dejanos algún mensaje o contáctanos</p>
                          <ul class="icon-list list-unstyled">
                              <li>
                                  <i class="fa fa-phone"></i> +8712127851
                              </li>

                              <li>
                                  <i class="fa fa-envelope-o"></i> green86.eco@gmail.com
                              </li>

                              <li>
                                  <i class="fa fa-map-marker"></i> 14374 Salemba Raya, Central Jakarta
                              </li>

                              <li>
                                  <i class="fa fa-clock-o"></i> HORARIOS:
LUNES A VIERNES DE 9 AM A 6 PM Y SÁBADO DE 10 AM A 1 PM
                              </li>
                          </ul>
                        </div>
                        <!-- //.footer-text -->
                    </div>
                    <!-- //.footer-column -->

                    <!-- //.footer-column -->

                    <div class="col-sm-4 col-md-4 footer-column">

                    </div>
                    <!-- //.footer-column -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //End Footer Section -->

        <!-- Begin Copyright -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright &copy; {{Date('Y')}} <a href="#">Green86.</a></p>
                    </div>
                    <!-- //.col-md-12 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </div>
        <!-- //End Copyright -->
    </footer>
    <!-- //End Footer -->

<script src="/libs/mdb/js/jquery-3.1.1.min.js"></script>
<script src="/libs/mdb/js/popper.min.js"></script>

<script src="/libs/mdb/js/bootstrap.min.js"></script>

<script src="/libs/mdb/js/mdb.min.js"></script>
@yield('js')
</body>
</html>
