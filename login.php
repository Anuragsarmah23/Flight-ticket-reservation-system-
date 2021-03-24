<?php include('dbconfig.php'); ?>
<?php
	if(isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		
		$query1=mysqli_query($con,"select * from user WHERE email='$email' and password='$password'");
		$count1=mysqli_num_rows($query1);
		
		if($count1==0)
		{
			echo "<script>alert('Wrong Email ID or Password'); location.href='login.php';</script>";
		}
		else
		{
			$_SESSION['email']=$email;
			header('location: user/index.php');
		}
	}
?>
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
		<title>Travel</title>

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
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Away from monotonous life</h6>
							<h1 class="text-white">Magical Travel</h1>
							
							<!--<a href="#" class="primary-btn text-uppercase">Get Started</a>-->
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" action="" method="post">
									<input type="email" class="form-control" name="email" placeholder="Email ID" required>
									<input type="password" class="form-control" name="password" placeholder="Password" required>					
									<input type="submit" value="Login" name="login" class="primary-btn text-uppercase">								
								</form>
							  </div>
							  
							  
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start popular-destination Area -->
			
			<!-- End popular-destination Area -->
			<section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Flight List</h1>
								
		                    </div>
		                </div>
		            </div>						
					<div class="row">

						<div class="col-lg-3">
							<div class="single-price">Flight name</div>
						</div>
						<div class="col-lg-3">
							<div class="single-price">Origin</div>
						</div>
						<div class="col-lg-3">
							<div class="single-price">Destination</div>
						</div>
						<div class="col-lg-3">
							<div class="single-price">Price</div>
						</div>
						<br>
						<?php
						$query1=mysqli_query($con,"select * from flight");
						$count_flight=0;
						while($r1=mysqli_fetch_array($query1))
						{ 
						 	$origin=$r1['origin'];
							$destination=$r1['destination'];
							$query_origin=mysqli_query($con,"SELECT * FROM cities WHERE id='$origin'");
							$r_origin=mysqli_fetch_array($query_origin);
							$query_destination=mysqli_query($con,"SELECT * FROM cities WHERE id='$destination'");
							$r_destination=mysqli_fetch_array($query_destination);
						?>		
								
								<div class="col-lg-3">
									<div class="single-price"><?php echo $r1['flight_name']."<br>".$r1['flight_no']; ?></div>
								</div>
								<div class="col-lg-3">
									<div class="single-price"><?php echo $r_origin['city_name']; ?></div>
								</div>
								<div class="col-lg-3">
									<div class="single-price"><?php echo $r_destination['city_name']; ?></div>
								</div>
								<div class="col-lg-3">
									<div class="single-price"><?php echo $r1['adult_price']; ?></div>
								</div>
								
						<?php
						}						
						?>
				</div>	
				
			</section>

			<!-- Start price Area -->
			
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