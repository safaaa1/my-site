<?php
@mysql_connect("localhost","root","");
@mysql_select_db("test_web");
?>
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
	
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">

				<h2>Top Produits</h2>
			</div>
			
			<div class="row">
				                                     <?php 
                                                      
                                                      foreach($tables as $ligne) {
                                                      ?>
				<div class="col-lg-3 col-sm-6">
				                              
					<div class="product-item">
						<div class="pi-pic">
							<img src="uploads/<?php echo $ligne->getImage(); ?>" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$<?php echo $ligne->getPrix(); ?></h6>
							<p>*Modele*: <?php echo $ligne->getNom(); ?></p>
						</div>
					</div>
				</div>
				                                          <?php  } ?>			
	</section>
<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="css_js_templates/template_client/img/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>top produit</span>
				<h2>Get Now</h2>
				<a href="#" class="site-btn">Click ici</a>
			</div>
		</div>
	</section>
	<!-- Footer section -->
	
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
