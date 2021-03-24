<?php include('dbconfig.php'); ?>
<?php 
if(isset($_POST['origin'],$_POST['destination'],$_POST['start'],$_POST['adult'],$_POST['child']))
{
	if($_POST['adult']=="" && $_POST['child']=="")
	{
		echo "<script>alert('Adult and Child Both Cannot Be Zero!!'); location.href='index.php';</script>";
	}
	date_default_timezone_set('Asia/Kolkata');
	$timestamp = time();
	$today_date = date("Y-m-d", $timestamp);
	
	$start=date("Y-m-d",strtotime($_POST['start']));
	if($start<$today_date)
	{
		echo "<script>alert('Invalid Start Date!!'); location.href='index.php';</script>";
	}

	$today_time = date("H", $timestamp);
	$flight_day=date("l",strtotime($start));
	
	$child=$_POST['child'];
	$adult=$_POST['adult'];
	if($_POST['child']==""){ $child=0; }
	
	$origin=$_POST['origin'];
	$destination=$_POST['destination'];
	$query_origin=mysqli_query($con,"SELECT * FROM cities WHERE id='$origin'");
	$r_origin=mysqli_fetch_array($query_origin);
	$query_destination=mysqli_query($con,"SELECT * FROM cities WHERE id='$destination'");
	$r_destination=mysqli_fetch_array($query_destination);
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
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Available Flights</h1>
								
								<p>Flights From <?php echo $r_origin['city_name']." To ".$r_destination['city_name']; ?>
		                    </div>
		                </div>
		            </div>						
					<div class="row">

						<div class="col-lg-3">
							<div class="single-price">Flight name</div>
						</div>
						<div class="col-lg-2">
							<div class="single-price">Deparature</div>
						</div>
						<div class="col-lg-2">
							<div class="single-price">Arrival</div>
						</div>
						<div class="col-lg-2">
							<div class="single-price">Price</div>
						</div>
						<div class="col-lg-3">
							<div class="single-price"></div>
						</div>
						<br>
						<?php
						$query1=mysqli_query($con,"select * from flight WHERE origin='$origin' and destination='$destination' and flight_day='$flight_day' and flight_status='Available'");
						$count_flight=0;
						while($r1=mysqli_fetch_array($query1))
						{ 
						 $count_flight++;
						?>		
								
								<div class="col-lg-3">
									<div class="single-price"><?php echo $r1['flight_name']."<br>".$r1['flight_no']; ?></div>
								</div>
								<div class="col-lg-2">
									<div class="single-price"><?php echo date("H:i",strtotime($r1['deparature'])); ?></div>
								</div>
								<div class="col-lg-2">
									<div class="single-price"><?php echo date("H:i",strtotime($r1['arrival'])); ?></div>
								</div>
								<div class="col-lg-2">
									<div class="single-price"><?php echo $total=($child*$r1['child_price'])+($adult*$r1['adult_price']); ?></div>
								</div>
								<div class="col-lg-3">
									<div class="single-price">
									<form class="form-wrap" action="login.php" method="post">
										<input type="hidden" name="adult" value="<?php echo $adult; ?>">
										<input type="hidden" name="child" value="<?php echo $child; ?>">
										<input type="hidden" name="origin" value="<?php echo $origin; ?>">
										<input type="hidden" name="destination" value="<?php echo $destination; ?>">
										<input type="hidden" name="flight_id" value="<?php echo $r1['flight_id']; ?>">
										<input type="hidden" name="start" value="<?php echo $start; ?>">
										<input type="hidden" name="deparature" value="<?php echo date("H:i",strtotime($r1['deparature'])); ?>">
										<input type="hidden" name="arrival" value="<?php echo date("H:i",strtotime($r1['arrival'])); ?>">
										<input type="hidden" name="total_amount" value="<?php echo $total; ?>">
										<input type="submit" value="Book Now" class="primary-btn text-uppercase">
									</form>	
									</div>
								</div>
								<br>
						<?php
						}						
						?>
				</div>	
				<?php
				if($count_flight==0)
				{
					echo "<center><font color='red' style='font-size:30px'>No Flights Available</font></center>";
				}
				?>
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