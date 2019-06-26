<?php 
	session_start();
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	if(!strcmp($email, "")){
		echo "<script>location.href='http://localhost/disenio2/application/views/cliente/';</script>";
	}
	 
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>La Reserva | Restaurante</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script language="JavaScript">
	function myFunction(id) {
  	var entrada = document.getElementById('c1');
  	var ensalada = document.getElementById('c2');
  	var carta = document.getElementById('c3');
  	var pasta = document.getElementById('c4');
  	var postre = document.getElementById('c5');
  	var bebida = document.getElementById('c6');
	switch(id) {
 	case 1:

          entrada.style.display = 'block';
          ensalada.style.display = 'none';
          carta.style.display = 'none';
          pasta.style.display = 'none';
          postre.style.display = 'none';
          bebida.style.display = 'none';
    break;

 	case 2:
          entrada.style.display = 'none';
          ensalada.style.display = 'block';
          carta.style.display = 'none';
          pasta.style.display = 'none';
          postre.style.display = 'none';
          bebida.style.display = 'none';
    break;

 	case 3:
          entrada.style.display = 'none';
          ensalada.style.display = 'none';
          carta.style.display = 'block';
          pasta.style.display = 'none';
          postre.style.display = 'none';
          bebida.style.display = 'none';
    break;

    case 4:
    	  entrada.style.display = 'none';
          ensalada.style.display = 'none';
          carta.style.display = 'none';
          pasta.style.display = 'block';
          postre.style.display = 'none';
          bebida.style.display = 'none';
          break;

    case 5:
    	  entrada.style.display = 'none';
          ensalada.style.display = 'none';
          carta.style.display = 'none';
          pasta.style.display = 'none';
          postre.style.display = 'block';
          bebida.style.display = 'none';
          break;

    case 6:
    	  entrada.style.display = 'none';
          ensalada.style.display = 'none';
          carta.style.display = 'none';
          pasta.style.display = 'none';
          postre.style.display = 'none';
          bebida.style.display = 'block';
          break;
	default:
          carta.style.display ='block';
        }

   }

   </script>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Buscar productos....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<span><?php echo "$username";?></span>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="cart.html">Carrito de compras</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="index.html">Inicio</a></li>
					<li><a href=#>Menu</a>
					<ul class="sub-menu">
							<li><a onclick="myFunction(1)" href="#uncles">Entradas</a></li>
							<li><a onclick="myFunction(2)" href="#uncles">Ensaladas</a></li>
							<li><a onclick="myFunction(3)" href="#uncles">Platos a la carta</a></li>
							<li><a onclick="myFunction(4)" href="#uncles">Pastas</a></li>
							<li><a onclick="myFunction(5)" href="#uncles">Postres</a></li>
					</ul>
					</li>
					<li><a href="#">Nosotros</a>
						<ul class="sub-menu">
							<li><a href="#">El Restaurante</a></li>
							<li><a href="#">Trabajadores</a></li>
						</ul>
					</li>
					<li><a href="reserva.html">Reserva</a></li>
					<li><a href="category.html">Categorias</a></li>
					<li><a href="contact.html">Contactanos</a></li>
					
					
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Productos por categoria</h4>
			<div class="site-pagination">
				<a href="#index.html">Inicio</a> /
				<a href="">Productos</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section id="uncles" class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categorias</h2>
						<ul class="category-menu">
							<li><a href="#">Platos</a>
								<ul class="sub-menu">
									<li><a style='cursor: pointer;' onclick="myFunction(1)">Entradas<span>(4)</span></a></li>
									<li><a style='cursor: pointer;' onclick="myFunction(2)">Ensaladas<span>(4)</span></a></li>
									<li><a style='cursor: pointer;' onclick="myFunction(3)">Platos a la carta<span>(8)</span></a></li>
									<li><a style='cursor: pointer;' onclick="myFunction(4)">Pasta<span>(3)</span></a></li>
									<li><a style='cursor: pointer;' onclick="myFunction(5)">Postre<span>(3)</span></a></li>
								</ul>
							</li>
							
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<div class="price-range-wrap">
							<h4>Price</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
					</div>
					
					
					<div class="filter-widget">
						<h2 class="fw-title">Bebidas</h2>
						<ul class="category-menu">
							<li><a href="#">Cervezas <span>(2)</span></a></li>
							<li><a href="#">Vinos<span>(56)</span></a></li>
							<li><a href="#">Sangria<span>(36)</span></a></li>
							<li><a href="#">Gaseosa<span>(27)</span></a></li>
							<li><a href="#">Chicha morada<span>(19)</span></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div id="c1" style="display:none" class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Entradas/causa.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./12,00</h6>
							<p>Causa de pollo</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Entradas/ocopa.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./8,00</h6>
							<p>Ocopa Arequipeña</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Entradas/papa.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./8,00</h6>
							<p>Papa a la huancaina</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Entradas/rocotor.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./15,00</h6>
							<p>Rocoto relleno</p>
						</div>
					</div>
				</div>
				</div>
		</div>
		<div id="c2" style="display:none" class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Ensalada/cesar.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./22,00</h6>
							<p>Cesar de Pollo</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Ensalada/lareserva.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./24,00</h6>
							<p>La Reserva</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Ensalada/primavera.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./25,00</h6>
							<p>Primavera</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Ensalada/salad-atun.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./24,00</h6>
							<p>Atun</p>
						</div>
					</div>
				</div>
				</div>
		</div>
		<div id="c3" class="container">
			<div class="row" >
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/1.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./35,00</h6>
							<p>Lomo Saltado</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-sale">ON SALE</div>
							<img src="./img/product/carapulcra.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./30,00</h6>
							<p>Carapulcra</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/7.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./35,00</h6>
							<p>Pollo al Horno</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/8.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./35,00</h6>
							<p>Escabeche de Pollo</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./35,00</h6>
							<p>Tallarín Saltado</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/10.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./35,00</h6>
							<p>Ceviche Peruano</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/11.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./35,00</h6>
							<p>Arroz Chaufa con Pollo</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/arroztapado.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>AGREGAR AL CARRITO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./25,00</h6>
							<p>Arroz Tapado</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="c4" style="display:none" class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Pastas/fettuchini a la huancaina.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./28,00</h6>
							<p>Fettuccini a la huancaina</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Pastas/fettuchini.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./26,00</h6>
							<p>Fettuccini al pesto</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Pastas/spaguetti a lo alfredo.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./22,00</h6>
							<p>Spaguetti a lo alfredo</p>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div id="c5" style="display:none" class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Postre/brownie.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./12,00</h6>
							<p>Brownie con helado</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Postre/crema.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./10,00</h6>
							<p>Crema volteada</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Postre/Pancake.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./12,00</h6>
							<p>Pancakes la reserva</p>
						</div>
					</div>
				</div>
				</div>
		</div>
		<div id="c6" style="display:none" class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/6.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./12,00</h6>
							<p>Limonada Frozen</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/12.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./10,00</h6>
							<p>Chicha Morada</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Bebida/cerveza.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./12,00</h6>
							<p>Cerveza pilsen x unidad</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Bebida/gaseosa.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./8,00</h6>
							<p>Gaseosa</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Bebida/sangria.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./15,00</h6>
							<p>Jarra de sangria</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/Bebida/vino.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CAR</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>S./32,00</h6>
							<p>Vino</p>
						</div>
					</div>
				</div>
				</div>
		</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->


	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="./img/logo-light.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Acerca del restaurante</h2>
						<p>Nos dedicamos a preparar los mejores platos y brindarle un buen servicio a nuestros clientes, ofreciendole rapidez en la entrega de pedidos que realizan y dándoles los mejores productos tanto en platos, bedidas y postres.</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Preguntas frecuentes</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>Qué comer en el almuerzo</h6>
									<span>Jun 21, 2019</span>
									<a href="#" class="readmore">Leer más</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>Platos más vendidos</h6>
									<span>Jun 21, 2019</span>
									<a href="#" class="readmore">Leer más</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Contáctanos</h2>
						<div class="con-info">
							<span>Restaurante.</span>
							<p>La Reserva</p>
						</div>
						<div class="con-info">
							<span>Ubicación.</span>
							<p>Av. Universitaria</p>
						</div>
						<div class="con-info">
							<span>Telefono.</span>
							<p>+51 993420344</p>
						</div>
						<div class="con-info">
							<span>Email.</span>
							<p>nataly.grace@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="https://www.instagram.com/nyasharisha/?hl=es-la" target="_blank" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="https://www.pinterest.es/dantepercing/modelos/" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="https://www.facebook.com/nataly.gvs" target="_blank" class="facebook"><i class="fa fa-facebook" ></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="https://www.youtube.com/watch?v=h96e9IXd8wY" target="_blank" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(Nuevo Date().getFullYear());</script> Facultad de Ingeniería de Sistemas e Informática<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Chalas/a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
