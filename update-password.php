<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php

if(isset($_POST['edit'])){


$password=md5($_POST['password']);


$query=$conn->query("UPDATE tbl_users SET password='$password' WHERE user_id = '$user_id'");


$message = '<span class="btn btn-success">Updated<br><br>
</span>';




}

?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Update Password</a></p>
								<div class="margin-top-20 margin-bottom-20">
									<form action="" method="post">   
									 <center> <?php echo $message;?></center>

<input type="password" name="password"class="form-control"placeholder="Password">
<input type="submit" name="edit" value="Edit"class="btn btn-success"> 

</form>

									</div>
							
							</div>
						</div><!-- end row -->
						<!-- Share buttons -->
				
					</div><!-- end container -->
				</div>
			</div>
			<!-- end Hero section -->

	
			<!-- end Blog Post content -->


<?php include ('footer.php');?>