<?php
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agregar Casa</title>
  
  <!-- FAVICON -->
  <link href="../../img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="../../plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="../../plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="../../plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="../../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="../../css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="arrendador.php">
						<img src="../../images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="arrendador.php">Inicio</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Men??<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="AddPension.php">Agregar una casa nueva</a>
									<a class="dropdown-item" href="CitasArrendador">Contactar</a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
                <form action='../../control/accion/act_logout.php'>
                <input type="submit" name="sesionDestroy" class="nav-link text-white btn-danger" value="Cerrar sesion"/>
                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="bg-gray py-5">
    <div class="container">
        <form action="../../control/accion/act_nuevacasa.php" method="POST" enctype="multipart/form-data">
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Agregar casa</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Direcci??n: <strong>*</strong></h6>
                            <input name="direccion" id="direccion" type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="Escriba la direcci??n aqu??">
                            <h6 class="font-weight-bold pt-4 pb-1">Barrio: <strong>*</strong></h6>
                            <input name="barrio" id="barrio" type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="Escriba el barrio aqu??">
                            <h6 class="font-weight-bold pt-4 pb-1">Descripci??n: <strong>*</strong></h6>
                            <textarea name="descripcion" id="descripcion" class="border p-3 w-100" rows="7" placeholder="Breve descripci??n de la casa"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Sube una imagen de tu casa</span>
                                    <span class="d-block"></span>
                                    <!--<span class="d-block btn bg-primary text-white my-3 select-files">Selecciona archivo</span>-->
                                    <span class="d-block">Tama??o m??ximo del archivo: 750 KB</span>
                                    <input type="file" class="" id="file-upload" name="file1">
                                    
                                </label>
                            </div>
                        </div>
                    </div>
            </fieldset>
            <!-- Post Your ad end -->

            <!-- seller-information start -->
            <fieldset class="border p-4 my-5 seller-information bg-gray">
                  <div class="row">
                    <div class="col-lg-12">
                        <h3>Informaci??n de habitaciones</h3>
                    </div>
                    <div class="col-lg-6">
                      <h6 class="font-weight-bold pt-4 pb-1">Valor de las habitaciones</h6>
                      <input type="number" class="border w-100 p-2" name="valorhabitacion">
                      <h6 class="font-weight-bold pt-4 pb-1">Descripci??n: <strong>*</strong></h6>
                      <textarea name="descripcion2" id="descripcion" class="border p-3 w-100" rows="7" placeholder="Breve descripci??n de las habitaciones"></textarea>
                    </div>
                    <div class="col-lg-6">
                      <h6 class="font-weight-bold pt-4 pb-1">Capacidad de la habitaci??n</h6>
                      <input type="number" class="border w-100 p-2" name="capacidadhabitacion">
                      <!--<div class="choose-file text-center my-4 py-4 rounded">
                        <label for="file-upload">
                          <span class="d-block font-weight-bold text-dark">Sube una imagen de las habitaciones</span>
                          <span class="d-block"></span>
                          <!--<span class="d-block btn bg-primary text-white my-3 select-files">Selecciona archivo</span>--
                          <span class="d-block">Tama??o m??ximo del archivo: 750 KB</span>
                          <input type="file" class="" id="file-upload" name="file2">
                        </label>
                      </div>-->
                    </div>
                  </div>
            </fieldset>
            <!-- seller-information end-->

            <!-- ad-feature start -->
            <!--<fieldset class="border bg-white p-4 my-5 ad-feature bg-gray">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="pb-3">Qu?? servicios ofrece
                            <!--<span class="float-right"><a class="text-right font-weight-normal text-success" href="#">What
                                    is featured ad ?</a></span>--
                        </h3>
                    </div>
                    <div class="col-lg-6 my-3">
                        <span class="mb-3 d-block">Inclu??dos en el valor:</span>
                        <ul>
                            <li>
                                <input type="checkbox" id="incluido" name="aireacondicionado" value="1">
                                <label for="aireacondicionado" class="font-weight-bold text-dark py-1">Aire acondicionado</label>
                                <!--<span>$00.00</span>--
                            </li>
                            <li>
                                <input type="checkbox" id="incluido" name="aseohabitacion" value="2">
                                <label for="aseohabitacion" class="font-weight-bold text-dark py-1">Aseo a la habitaci??n</label>
                                <!--<span>$59.00</span>--
                            </li>
                            <li>
                                <input type="checkbox" id="incluido" name="alimentacion" value="3">
                                <label for="alimentacion" class="font-weight-bold text-dark py-1">Alimentaci??n</label>
                                <!--<span>$79.00</span>--
                            </li>
                            <li>
                                <input type="checkbox" name="cocina" id="cocina" value="4">
                                <label for="cocina" class="font-weight-bold text-dark py-1">Cocina</label>
                            </li>
                            <li>
                                <input type="checkbox" name="lavado" id="lavado" value="5">
                                <label for="lavado" class="font-weight-bold text-dark py-1">Lavado de ropa</label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 my-3">
                    </div>
                </div>
            </fieldset>
            <!-- ad-feature start -->

            <!-- submit button -->
            <button type="submit" class="btn btn-primary d-block mt-2">Guardar</button>
        </form>
    </div>
</section>
<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="../../images/logo.png" alt="">
          <!-- description -->
          <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Contactenos</h4>
          <ul>
            <li><a href="#">3004303030</a></li>
            <li><a href="#">pensiones@pensiones.co</a></li>
            <li><a href="#">Calle 12 # 15-20</a></li>
            <li><a href="terms-condition.html">Terminos & condiciones</a></li>
          </ul>
        </div>
      </div>
      <!--
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <!--
            <h4>Admin Pages</h4>
            <ul>
            <li><a href="category.html">Category</a></li>
            <li><a href="single.html">Single Page</a></li>
            <li><a href="store.html">Store Single</a></li>
            <li><a href="single-blog.html">Single Post</a>
            </li>
            <li><a href="blog.html">Blog</a></li>

          </ul>
           -->
        </div>
      </div>
      <!--
      <!-- Promotion --
      <div class="col-lg-4 col-md-7">
        <!-- App promotion --
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-- Icon -
              <img src="images/footer/phone-icon.png" alt="mobile-icon">
            </a>
            <p>Get the Dealsy Mobile App and Save more</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
            <a href="#" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
          </div>
        </div>
      </div>
    -->
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright ?? <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="../../plugins/jQuery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/popper.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="../../plugins/tether/js/tether.min.js"></script>
<script src="../../plugins/raty/jquery.raty-fa.js"></script>
<script src="../../plugins/slick-carousel/slick/slick.min.js"></script>
<script src="../../plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="../../plugins/smoothscroll/SmoothScroll.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../../plugins/google-map/gmap.js"></script>
<script src="../../js/script.js"></script>

<?php
if (isset($_GET["success"])) {
  $var = $_GET["success"];
  if ($var == 1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Registrado!', 'Casa registrada correctamente!', 'success');
      });
    </script>";
  }else if ($var == 2) {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function(event) {
      swal('Error!', 'No fue posible registrar, llena todos los campos!', 'error');
    });
  </script>";
  }
}
?>

</body>

</html>