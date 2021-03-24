<?php include('dbconfig.php'); ?>
<?php
$city=$_GET['city']; 
?>
									<div id="abc">						
									<select class="form-control" data-live-search="true" name="destination" id="destination" required>
											<option value="" selected="selected">To </option>
											<?php
												$query_city=mysqli_query($con,"select * from cities WHERE id!='$city' and  state_id=4");
												while($r_city=mysqli_fetch_array($query_city)){ ?>
												<option value="<?php echo $r_city['id']; ?>"><?php echo $r_city['city_name']; ?> </option>
											<?php }?>
									</select>		
									</div>