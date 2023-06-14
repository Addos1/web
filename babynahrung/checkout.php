<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<?php
$serv = "localhost";

    $conn = mysqli_connect($serv,"root","")
    or die("Error in DB");

    mysqli_select_db($conn, "db_baby");
	
	$k=mysqli_fetch_array($conn->query("SELECT Count(*) FROM `client` WHERE c_act=1;"))[0];
	if($k==0)
	{$pp='';
	$dd='';}
	else
	{$pp=mysqli_fetch_array($conn->query("SELECT CONCAT(C_name,' ',C_vorname) FROM `client` WHERE c_act=1;"))[0];
	$dd='<input type="submit" name="abme" value="Abmelden" class="btn" onclick="abmelden()" /></td>';}
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
					<li class=><a href="index.php">Home</a></li>
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

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Kasse</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index">Home</a></li>
							<li>Kasse</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<div class="row">
					
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Abrechnung</div>
							<div class="checkout_form_container">
								<form action="php/save_user.php" method="post" onsubmit="return validateForm()" id="checkout_form" class="checkout_form">
									<div class="row">
										<div class="col-lg-6">
											<!-- Name -->
											<input type="text" id="checkout_name" name="name" class="checkout_input" placeholder="Name" autocomplete="off">
										</div>
										<div class="col-lg-6">
											<!-- Last Name -->
											<input type="text" id="checkout_last_name" name="vorname" class="checkout_input" placeholder="Vorname" autocomplete="off">
										</div>
									</div>


									<div>
										<!-- Address -->
										<input type="text" id="checkout_address" name="adresse" class="checkout_input" placeholder="Adresse" autocomplete="off">

									</div>
									<div>
										<!-- Zipcode -->
										<input type="text" id="checkout_zipcode" name="zipcode" class="checkout_input" placeholder="Zip Code" autocomplete="off">
									</div>


									<div>
										<!-- Phone no -->
										<input type="phone" id="checkout_phone" name="phone" class="checkout_input" placeholder="Phone" autocomplete="off">
									</div>

									<div>
										<!-- Phone no -->
										<input type="submit" name="anme" value="Anmelden" class="btn" onclick="registration()" /></td>
										<input type="submit" name="entr" value="Eintragen" class="btn" onclick="eintragen()" /></td>
										<?php echo $dd?>
										</tr>
									</div>

								</form>


							</div>
						</div>
					</div>

					

					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
							    <?php


                                	$serv = "localhost";

                                    $conn = mysqli_connect($serv,"root","")
                                    or die("Error in DB");

                                    mysqli_select_db($conn, "db_baby");
                                    $data = $conn->query("select * from bezahlung");

                                    $ttpr=0;
                                    while ($res = mysqli_fetch_array($data)){
                                        $id=$res["fk_prod"];
                                        $preis=mysqli_fetch_array($conn->query("SELECT `P_preis` FROM `produkt` WHERE `P_id`=".$id))[0];
                                        $menge=$res["B_menge"];
                                        $total=$preis*$menge;
                                        $ttpr+=$total;
                                       }
                                    ?>
								<div class="checkout_title">Einkaufswagen Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">$<?=$ttpr?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Versand</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">$<?=$ttpr?></div>
									</li>
								</ul>


								<div class="checkout_button trans_200"><a href="danke.php">Bestellung aufgeben</a></div>
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

<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
<script src="js/login.js"></script>
</body>
</html>