<?php
  session_start();
  if (isset($_SESSION['nombre'])) {
    if ($_SESSION['type'] == 1) {
      header("Location: Arrendador.php");
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- SITE TITTLE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estudiante | Buscar</title>

	<!-- FAVICON -->
	<link href="../../images/logo.png" rel="shortcut icon">
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

	<section class="bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light navigation">
						<a class="navbar-brand" href="arrendatario.php">
							<img src="../../images/logo.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav ">
								<li class="nav-item active">
									<a class="nav-link" href="arrendatario.php">Inicio</a>
								</li>
								<li class="nav-item dropdown dropdown-slide">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Menú<span><i
												class="fa fa-angle-down"></i></span>
									</a>

									<!-- Dropdown list -->
									<div class="dropdown-menu">
										<a class="dropdown-item" href="search.php">Buscar casa</a>
										<!--<a class="dropdown-item" href="CitasArrendatario">Contactar</a>-->
									</div>
								</li>
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<form action='../../control/accion/act_logout.php'>
										<input type="submit" name="sesionDestroy" class="nav-link text-white btn-danger"
											value="Cerrar sesion" />
									</form>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="page-search">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Advance Search -->
					<div class="advance-search">
						<form action="../../control/accion/act_BuscarPension.php" method="POST">
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control my-2 my-lg-0" id="buscarpension"
										placeholder="¿Qué estás buscando?" name="buscarpension">
								</div>
								<div class="form-group col-md-6">
									<button type="submit" class="btn btn-secondary" name="buscar">Buscar ahora</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-sm">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!--<div class="search-result bg-gray">
						<h2>Results For "Almendros"</h2>
						<p>12 Resultados</p>
					</div>-->
					<?php
					if (isset($_GET['q']) && $_GET['q'] != "") {
						echo '<div class="search-result bg-gray">
								<h2>Resultados para "'.$_GET['q'].'"</h2>
								<p>Resultados</p>
							</div>';
					}else if (isset($_GET['error']) && $_GET['error']==0) {
						echo '<div class="search-result bg-gray">
								<h2>No se encontró nada para su búsqueda</h2>
								<p>Resultados</p>
							</div>';
					}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="category-sidebar">
						<!--<div class="widget category-list">
							<h4 class="widget-header">Categorias</h4>
							<ul class="category-list">
								<li><a href="category.html">Barrio <span>2</span></a></li>
								<li><a href="category.html">Precio <span>3</span></a></li>
								<li><a href="category.html">Comidas <span>4</span></a></li>
								<li><a href="category.html">Personas <span>3</span></a></li>
							</ul>
						</div>-->

						<!--<div class="widget price-range w-100">
							<h4 class="widget-header">Rango de precio</h4>
							<div class="block">
								<input class="range-track w-100" type="text" data-slider-min="0"
									data-slider-max="700000" data-slider-step="7" data-slider-value="[0,5000]">
								<div class="d-flex justify-content-between mt-2">
									<span class="value">$100000 - $700000</span>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<button>Buscar</button>
								</div>
							</div>
						</div>-->
					</div>
				</div>
				<div class="col-md-9">
					<div class="category-search-filter">
						<!--<div class="row">
							<div class="col-md-6">
								<strong>Ordenar por</strong>
								<select>
									<option value="1">A - Z</option>
									<option value="2">Z - A</option>
									<option value="3">Menor precio</option>
									<option value="4">Mayor precio</option>
								</select>
							</div>
						</div>-->
					</div>
					<div class="product-grid-list">
						<div class="row mt-30">
							<?php
								if (isset($_GET["q"])) {
									require_once (__DIR__."/../../control/accion/act_loadpension.php");
									$pensiones = PensionDAO::BuscarPension($_GET["q"]);
									foreach ($pensiones as $pension) {
										echo"
										<div class='col-sm-12 col-lg-4 col-md-6'>
											<div class='product-item bg-light'>";
										echo"
												<div class='card'>
													<div class='thumb-content'>
														<a href='verPensionArrendatario.php?ref=".$pension['houseid']."'>
															<img class='card-img-top img-fluid' src='../../images/products/icono.png' alt='Card image cap'>
														</a>
													</div>
													<h4 class='card-title'><a href='verPensionArrendatario'>".$pension['address']."</a></h4>
													<ul class='list-inline product-meta'>
														<li class='list-inline-item'>
															<a href='#'><i class='fa fa-folder-open-o'></i>".$pension['neighborhood']."</a>
														</li>
														<li class='list-inline-item'>
															<a href='#'><i class='fa fa-money'></i>".$pension['rental_price']."</a>
														</li>
													</ul>
													<p class='card-text'>".$pension['description']."</p>";
										echo"
												</div>
											</div>
										</div>";
										}
								}else{
									require_once (__DIR__."/../../control/accion/act_loadpension.php");
									$pensiones = PensionDAO::GetPensiones();
									foreach ($pensiones as $pension) {
										echo"
										<div class='col-sm-12 col-lg-4 col-md-6'>
											<div class='product-item bg-light'>";
										echo"
												<div class='card'>
													<div class='thumb-content'>
														<a href='verPensionArrendatario.php?ref=".$pension['id']."'>
															<img class='card-img-top img-fluid' src='../../images/products/icono.png' alt='Card image cap'>
														</a>
													</div>
													<h4 class='card-title'><a href='verPensionArrendatario'>".$pension['address']."</a></h4>
													<ul class='list-inline product-meta'>
														<li class='list-inline-item'>
															<a href='verPensionArrendatario'><i class='fa fa-folder-open-o'></i>".$pension['neighborhood']."</a>
														</li>
														<li class='list-inline-item'>
															<a href='verPensionArrendatario'><i class='fa fa-calendar'></i>".date("d M")."</a>
														</li>
													</ul>
													<p class='card-text'>".$pension['description']."</p>";
										echo"
												</div>
											</div>
										</div>";
									}
								}
							?>
						</div>
					</div>
					<div class="pagination justify-content-center">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item active"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
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
						<p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							exercitation ullamco
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
						<p>Copyright ©
							<script>
								var CurrentYear = new Date().getFullYear()
								document.write(CurrentYear)
							</script>. Todos los derechos reservados.
						</p>
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
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
	<script src="../../plugins/google-map/gmap.js"></script>
	<script src="../../js/script.js"></script>

	<?php
if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error == 1) {
    echo "<script>
      		document.addEventListener('DOMContentLoaded', function(event) {
        		swal('Error', 'Correo o contraseña invalidos');
      });
    </script>";
  }else if ($error == 2) {
    echo "<script>
			document.addEventListener('DOMContentLoaded', function (event) {
				swal('Error', 'Error interno');
		});
	</script>";
  }
  else if ($error == 3) {
    echo "<script>
			document.addEventListener('DOMContentLoaded', function (event) {
				swal('Error', 'Llene todos los campos', 'error');
		});
	</script>";
  }else if ($error = 0) {
	echo "<script>
    		document.addEventListener('DOMContentLoaded', function(event) {
     			swal('Error', 'Sin resultados', 'error');
    		});
  		</script>";
  }
}
?>

</body>

</html>