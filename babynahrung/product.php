<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/flexslider/flexslider.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>

<?php
	$pd=$_GET["page"];
	$id=$pd%10000;
	$k=0;
	
	$serv = "localhost";

    $conn = mysqli_connect($serv,"root","")
    or die("Error in DB");
	
    mysqli_select_db($conn, "db_baby");
	
	$k=mysqli_fetch_array($conn->query("SELECT Count(*) FROM `client` WHERE c_act=1;"))[0];
	if($k==0)
	{$pp='';}
	else
	{$pp=mysqli_fetch_array($conn->query("SELECT CONCAT(C_name,' ',C_vorname) FROM `client` WHERE c_act=1;"))[0];}
	
	$k=mysqli_fetch_array($conn->query("SELECT Count(*) FROM bezahlung WHERE fk_prod=".$id))[0];

	
	$data = $conn->query("select * from produkt where P_id=".$id);
	while ($res = mysqli_fetch_array($data)){
		$img = $res["P_img"];
		$name = $res["P_name"];
		$preis = $res["P_preis"];
	}
	
	if($k==0){$ok='+';}
	else
	{
		$r=mysqli_fetch_array($conn->query("SELECT b_menge FROM `bezahlung` WHERE fk_prod=".$id))[0];
		$ok=$r;
	}
	
	if($pd>10000){
		if($k==0){$conn->query("Insert into bezahlung (fk_prod) values (".$id.")");}
		
		$c=mysqli_fetch_array($conn->query("SELECT b_menge FROM `bezahlung` WHERE fk_prod=".$id))[0];
		$c=$c+1;
		$conn->query("Update bezahlung set b_menge=".$c.' Where fk_prod='.$id);
		$ok=$c;
		header ('Location: product.php?page='.$id);
		exit();
	}
	
?>

<!-- Menu -->

<div class="menu">


	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li><a href="index.php" >Home</a></li>
			<li><a href="category.php">Alle produkte</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+1 111-222-4444</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="#">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/logo_1.png" width="70" alt=""></div>
						<div>Babynahrung&nbsp;&nbsp;&nbsp;<?=$pp?></div>
					</div>
				</a>
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="category.php">Alle Produkte</a></li>

				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">



				<!-- Cart -->
				<div class="cart"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+1 111-222-4444</div>
				</div>
			</div>
		</div>
	</header>


	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Babynahrung</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li><a href="category.php">Alle Produkte</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Product -->

		<div class="product">
			<div class="container">
				<div class="row">
					
					<!-- Product Image -->
					<div class="col-lg-6">
						<img src='<?php echo $img;?>' />
					</div>

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<div class="product_info">
							<div class="product_name"><?php echo $name;?></div>

							<div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
								<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
								<div class="product_reviews">4.7</div>

							</div>
							<div class="product_price"><?php echo "$".$preis;?></div>

							<a href='product.php?page=<?=$id+10000?>'>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="images/cart.svg" class="svg" alt=""><div><?=$ok?></div></div></div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Boxes -->


		<!-- Footer -->

		<footer class="footer">
			<div class="footer_content">
				<div class="container">
					<div class="row">

						<!-- About -->
						<div class="col-lg-20 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="#">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="footer_logo_icon"><img src="images/logo_1.png" width="70" alt=""></div>
											<div>Babynahrung&nbsp;&nbsp;&nbsp;<?=$pp?></div>
										</div>
									</a>
								</div>
								<div class="footer_about_text">
									<p>2022 © Online-Shop für Babynahrung. Alle Informationen auf dieser Website dienen zu Informationszwecken und verpflichten den Käufer nicht, Maßnahmen zu ergreifen. Bitte konsultieren Sie vor der Anwendung Ihren Arzt.</p>
								</div>
							</div>
						</div>

						<!-- Footer Links -->


						<!-- Footer Contact -->

					</div>
				</div>
			</div>

		</footer>
	</div>
		
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="js/product.js"></script>
</body>
</html>