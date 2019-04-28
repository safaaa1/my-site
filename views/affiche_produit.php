<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>
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
						<a href="css_js_templates/template_client/index.html" class="site-logo">
							<img src="css_js_templates/template_client/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						
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
						<a href="?core=user&action=deconnecte">logout</a>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="?core=user&action=client_page">Home</a></li>
					<li><a href="?core=categorie&action=categorie_client">Categorie</a></li>
					<li><a href="#">***</a></li>
					<li><a href="#">---
						<span class="new">***</span>
					</a></li>
					<li><a href="#">***</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">***</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li>
					<li><a href="#">***</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="row">		                       
				<div class="col-lg-6">
					                    <?php 
                                         $a = 1;
                                        foreach($table_produit as $ligne){
                                         ?>
					<div class="product-pic-zoom">
						<img class="product-big-img" src="uploads/<?php echo $ligne->getImage(); ?>" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
					</div>
					                    <?php  } ?>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $ligne->getNom(); ?></h2>
					<h3 class="p-price">$<?php echo $ligne->getPrix(); ?></h3>
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
<div class="p-rating">
</br>
            votre avis
			<?php 
            for($a=0 ; $a<$ratesred ; $a++) { ?>
			<i class="fa fa-star-o"></i>
			<?php } ?>
            <?php  for($b=1 ; $b<=$ratesgris ; $b++) {
            ?>                        
	<a href="?core=produit&action=rating&nom=<?php echo $ligne->getNom(); ?>&raaate=<?php echo $b ?>"><i class="fa fa-star-o fa-fade" ></i></a> 
			<?php
			}
            ?>
	</br>	
            avis des clients :
            <?php 
            for($a=0 ; $a<$ratesredClient ; $a++) { ?>
			<i class="fa fa-star-o">   </i>
			<?php } ?>
            <?php  for($b=1 ; $b<=$ratesgrisClient ; $b++){
            ?>                            
	        <i class="fa fa-star-o fa-fade" ></i> 
			<?php
			}
            ?>
</div>	
	
					<div class="p-review">
						<a href="">COLOR: </a>|<a href=""><?php echo $ligne->getCouleur(); ?></a>			
					</div>
					<div class="p-review">						
						<a href="">FOURNISSEUR: </a>|<a href=""><?php echo $ligne->getFournisseur(); ?></a>
					</div>
					
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" value="<?php echo $ligne->getQuantite(); ?>"></div>
                    </div>
					<a href="#" class="site-btn">SHOP NOW</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p><?php echo $ligne->getDescription(); ?></p>		
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="css_js_templates/template_client/img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="css_js_templates/template_client/img/logo-light.png" alt=""></a>
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
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
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

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->
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
