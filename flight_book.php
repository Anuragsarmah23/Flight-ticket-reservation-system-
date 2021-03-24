<?php include('dbconfig.php'); ?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Flight List</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
			
			<script>
			function loadcity(str) {
			  var xhttp;
			  if (str.length == 0) { 
				document.getElementById("abc").innerHTML = "";
				return;
			  }
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  document.getElementById("abc").innerHTML = xhttp.responseText;
				}
			  };
			  xhttp.open("GET", "load_city.php?city="+str, true);
			  xhttp.send();   
			}
			</script>
		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
			  		<div class="row align-items-center">
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-left">
			  							
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-right">
							<!--<div class="header-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>-->
			  			</div>
			  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="index.php">Home</a></li>
						  <li><a href="register.php">Register</a></li>
						  <li><a href="login.php">Login</a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container"  style=" height:300px">
					<div class="row fullscreen align-items-center justify-content-between">						
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start popular-destination Area -->
			
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<section class="price-area section-gap"> 
				<div class="container"> 
		            <form action="ticket.php" method="post">	
					<input type="hidden" name="adult" value="<?php echo $_POST['adult']; ?>">
					<input type="hidden" name="child" value="<?php echo $_POST['child']; ?>">
					<input type="hidden" name="origin" value="<?php echo $_POST['origin']; ?>">
					<input type="hidden" name="destination" value="<?php echo $_POST['destination']; ?>">
					<input type="hidden" name="flight_id" value="<?php echo $_POST['flight_id']; ?>">
					<input type="hidden" name="journey_date" value="<?php echo $_POST['start']; ?>">
					<input type="hidden" name="deparature" value="<?php echo $_POST['deparature']; ?>">
					<input type="hidden" name="arrival" value="<?php echo $_POST['arrival']; ?>">
					<input type="hidden" name="total_amount" value="<?php echo $_POST['total_amount']; ?>">					
					<?php for($i=1;$i<=$_POST['adult'];$i++){ $typ=$_POST['adult']+$_POST['child']; ?>
						Adult <?php echo $i; ?>
						<div class="col-lg-6">
							<div class="single-price"><input type="hidden" name="type<?php echo $i; ?>" value="Adult"><input type="text" class="form-control" name="name<?php echo $i; ?>" placeholder="Name" required>		</div>
						</div>
						<div class="col-lg-6">
							<div class="single-price"><input type="text" class="form-control" name="age<?php echo $i; ?>" placeholder="Age" required>		</div>
						</div>
					<?php } ?>
					<?php for($j=$i;$j<=$typ;$j++){ ?>
						Child <?php echo $i; ?>
						<div class="col-lg-6">
							<div class="single-price"><input type="hidden" name="type<?php echo $j; ?>" value="Child"><input type="text" class="form-control" name="name<?php echo $j; ?>" placeholder="Name" required>		</div>
						</div>
						<div class="col-lg-6">
							<div class="single-price"><input type="text" class="form-control" name="age<?php echo $j; ?>" placeholder="Age" required>		</div>
						</div>
					<?php } ?>
					<div class="col-lg-6">
					<div class="single-price"><input type="text" class="form-control" name="contact_no" placeholder="Contact Number" required></div>
					</div>
					<div class="col-lg-6">
					<div class="single-price"><input type="submit" value="Submit" class="primary-btn text-uppercase"></div>
					</div>
					</form>
						
				</div>	
				
			</section>
			<!-- End price Area -->
			

			<!-- Start other-issue Area -->
			
			<!-- End other-issue Area -->
			

			<!-- Start testimonial Area -->
		    
		    <!-- End testimonial Area -->

			<!-- Start home-about Area -->
			
			<!-- End home-about Area -->
			
	
			<!-- Start blog Area -->
			
			<!-- End recent-blog Area -->			

			<!-- start footer Area -->		
			
			<!-- End footer Area -->	

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>