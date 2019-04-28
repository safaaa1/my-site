
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="css_js_templates/template_client/img/favicon.ico" rel="shortcut icon"/>
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css_js_templates/template_client/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/flaticon.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/slicknav.min.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/animate.css"/>
	<link rel="stylesheet" href="css_js_templates/template_client/css/style.css"/>
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
							<img src="css_js_templates/template_client/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="#"><?php echo  $_SESSION['pseudo']." ".$_SESSION['full_name']; ?></a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="#">Shopping Cart</a>
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
					<li><a href="#">Home</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Jewelry
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Shoes</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
		</nav>
	</header>

	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">

<form action="" method="POST">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						                <?php                 
                                        foreach($table_categorie as $ligne) {
                                         ?>
						<ul class="category-menu">
							<li><a href="?core=categorie&action=pageMS&nom=<?php echo $ligne->getNom(); ?>"> <?php echo $ligne->getNom(); ?> </a>
		<!--						<ul class="sub-menu">
									<li><a href="#">Midi Dresses <span>(2)</span></a></li>
								</ul>
								     -->
							</li>
						
						</ul>
						 <?php  } ?>
					</div>
</form>

					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<div class="price-range-wrap">
							<form action="?core=categorie&action=chercheprix" method="POST">
							<h4>Price</h4>
							
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"  data-min="10" data-max="270">
                            	
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" name="prixmin" id="minamount">
                                    <input name="prixmax" type="text" id="maxamount" >

                                </div>
                            </div>
                     <button type="submit" name="cherche"value="chercher"></button>
                        </div>
					</div>
</form>					
					<div class="filter-widget mb-0">
						<h2 class="fw-title">color by</h2>
						<div class="fw-color-choose">
							<div class="cs-item">
								<input  type="radio" name="cs" id="gray-color"  >
								<label class="cs-gray" for="gray-color">
									<span><a style="color: black" href="?core=produit&action=cher_couleur&color=Noir">Noir</a></span>
								</label>								
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="orange-color">
								<label class="cs-orange" for="orange-color">
									<span><a style="color: red" href="?core=produit&action=cher_couleur&color=Rouge">Rouge</a></span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="yollow-color">
								<label class="cs-yollow" for="yollow-color">
									<span><a style="color: grey" href="?core=produit&action=cher_couleur&color=Gris">GRIS</a></span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="green-color">
								<label class="cs-green" for="green-color">
									<span><a style="color: blue" href="?core=produit&action=cher_couleur&color=Blue">Blue</a></span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="purple-color">
								<label class="cs-purple" for="purple-color">
									<span><a style="color: brown" href="?core=produit&action=cher_couleur&color=Marron">Marron</a></span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="blue-color" checked="">
								<label class="cs-blue" for="blue-color">
									<span><a style="color: black" href="?core=produit&action=cher_couleur&color=blanc">Blanc</a></span>
								</label>
							</div>
						</div>					
					</div>
					<div class="filter-widget mb-0">
						<!--<h2 class="fw-title">Size</h2>-->
						<div class="fw-size-choose">
						</div>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Fournisseur</h2>
						<ul class="category-menu">
							<li><a href="#">SAMSUNG <span></span></a></li>
							<li><a href="#">LG<span></span></a></li>
							<li><a href="#">BRANDT<span></span></a></li>
							<li><a href="#">LENEVO<span></span></a></li>
							<li><a href="#"><span></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						                <?php 
                                         $a = 1;
                                        foreach($table_produits as $ligne) {
                                         ?>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">

								<div class="pi-pic">

									<div class="tag-sale">ON SALE</div>
									<a href="?core=produit&action=afficheproduit&nom=<?php echo $ligne->getNom(); ?>">
									<img  src="uploads/<?php echo $ligne->getImage(); ?>" alt="">
								    </a>
								    <form name="like">
									<div class="pi-links">
										<a href="" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>		
										<a href="?core=produit&action=favorisproduit&nom=<?php echo $ligne->getNom(); ?>" class="wishlist-btn" id="like"><i class="flaticon-heart"  onclick="color_red()"></i></a>	
										<script>
											function color_red()
											{
												document.getElementById('like').style.backgroundColor="red";
											}
										</script>								
									</div>
									</form>
								</div>
								<div class="pi-text">
									<h6>$<?php echo $ligne->getPrix(); ?></h6>
									<p>*Modele*: <?php echo $ligne->getNom(); ?></p>
								</div>
								 
							</div>
						</div>
						<?php  } ?>

						<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">LOAD MORE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="home.html"><img src="css_js_templates/template_client/img/logo-light.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="css_js_templates/template_client/img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="css_js_templates/template_client/img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="css_js_templates/template_client/img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
			</div>
        </div>
	</section>
<!--====== Javascripts & Jquery ======-->
<script src="css_js_templates/template_client/js/jquery-3.2.1.min.js"></script>
	<script src="css_js_templates/template_client/js/bootstrap.min.js"></script>
	<script src="css_js_templates/template_client/js/jquery.slicknav.min.js"></script>
	<script src="css_js_templates/template_client/js/owl.carousel.min.js"></script>
	<script src="css_js_templates/template_client/js/jquery.nicescroll.min.js"></script>
	<script src="css_js_templates/template_client/js/jquery.zoom.min.js"></script>
	<script src="css_js_templates/template_client/js/jquery-ui.min.js"></script>
	<script src="css_js_templates/template_client/js/main.js"></script>
	</body>
</html>
