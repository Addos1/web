<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>
<body>

<?php
	
	$serv = "localhost";

    $conn = mysqli_connect($serv,"root","")
    or die("Error in DB");
	
    mysqli_select_db($conn, "db_baby");
	
	$conn->query("DELETE FROM `bezahlung` WHERE B_menge=0");
	
	$k=mysqli_fetch_array($conn->query("SELECT Count(*) FROM `client` WHERE c_act=1;"))[0];
	if($k==0)
	{$pp='';}
	else
	{$pp=mysqli_fetch_array($conn->query("SELECT CONCAT(C_name,' ',C_vorname) FROM `client` WHERE c_act=1;"))[0];}
	
	$pd=$_GET["page"];
	
	if($pd==999999)
	{
		$conn->query('DELETE FROM bezahlung');
		header ('Location: cart.php');
	}
	
	if(10000<$pd && $pd<100000)
	{
		$dd=$pd%10000;
		
		$c=mysqli_fetch_array($conn->query("SELECT b_menge FROM `bezahlung` WHERE fk_prod=".$dd))[0];
		$c=$c-1;
		$conn->query("Update bezahlung set b_menge=".$c.' Where fk_prod='.$dd);
		header ('Location: cart.php');
	}
	elseif($pd>100000)
	{
		$dd=$pd%100000;
		
		$c=mysqli_fetch_array($conn->query("SELECT b_menge FROM `bezahlung` WHERE fk_prod=".$dd))[0];
		$c=$c+1;
		$conn->query("Update bezahlung set b_menge=".$c.' Where fk_prod='.$dd);
		header ('Location: cart.php');
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
					<li ><a href="index.php">Home</a></li>
					<li><a href="category.php">Alle Produkte</a></li>

				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">



				<!-- Cart -->
				<div class="cart"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+1 111-222-3333</div>
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
					<div class="home_title">Einkaufswagen</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li>Ihr Einkaufswagen</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Produkt</li>
									<li>Preis</li>
									<li>Menge</li>
									<li>Total</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">
									<?php
									$data = $conn->query("select * from bezahlung");
									$ttpr=0;
									while ($res = mysqli_fetch_array($data)){
										$id=$res["fk_prod"];
										$img=mysqli_fetch_array($conn->query("SELECT `P_img` FROM `produkt` WHERE `P_id`=".$id))[0];
										$name=mysqli_fetch_array($conn->query("SELECT `P_name` FROM `produkt` WHERE `P_id`=".$id))[0];
										$preis=mysqli_fetch_array($conn->query("SELECT `P_preis` FROM `produkt` WHERE `P_id`=".$id))[0];
										$menge=$res["B_menge"];
										$total=$preis*$menge;
										$ttpr+=$total;
										echo "<!-- Cart Item -->
										<li class='cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start'>
											<div class='product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto'>
												<div><div class='product_number'>".$id."</div></div>
												<div><div class='product_image'><img src='".$img."' alt=''></div></div>
												<div class='product_name_container'>
													<div class='product_name'><a href='product.php?page=".$id."'>".$name."</a></div>

												</div>
											</div>
											<div class='product_price product_text'><span>Preis: </span>$".$preis."</div>
											<div class='product_quantity_container'>
												<div class='product_quantity ml-lg-auto mr-lg-auto text-center'>
													<span class='product_text product_num'>".$menge."</span>
													<div class='qty_sub qty_button trans_200 text-center'><a href='cart.php?page=".($id+10000)."'><span>-</span></a></div>


													<div class='qty_add qty_button trans_200 text-center'><a href='cart.php?page=".($id+100000)."'><span>+</span></a></div>
												</div>
											</div>
											<div class='product_total product_text'><span>Total:</span>$".$total."</div>
										</li>";
									}
									?>
									
								</ul>
							</div>

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">


									<div class="button button_clear trans_200"><a href='cart.php?page=<?=999999?>'>Einkaufswagen löschen</a></div>


									<div class="button button_continue trans_200"><a href="category.php">weiter shoppen</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row cart_extra_row">

					<div class="col-lg-6 cart_extra_col">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Einkaufswagen Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto"><?=$ttpr?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Versand</div>
										<div class="cart_extra_total_value ml-auto">Frei</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto"><?=$ttpr?></div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="checkout.php">weiter zur Kasse</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart.js"></script>
</body>
</html>