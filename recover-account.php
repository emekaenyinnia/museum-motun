<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php
if(isset($_POST['recover'])){

$email=$_POST['email'];
$phone=$_POST['phone'];

$check_for_user=$conn->query("SELECT * from tbl_users where email='$email' AND phone='$phone'");
$check_user_signin_row=$check_for_user->fetch_assoc();

$encrypt_new_password = md5(time());

$raw_new_password = time();

$query=$conn->query("UPDATE tbl_users SET password='$encrypt_new_password' WHERE email = '$email'");

    
if ($check_for_user->num_rows == '1'){ 


$message = '<span class="btn btn-success">Your new password is:'.$raw_new_password.'</span><br><br>';



}else{


$message = '<span class="btn btn-danger">Email & Phone Combination Not Valid</span><br><br>';


}

}
?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Recover Account</a></p>
								<div class="margin-top-20 margin-bottom-20">
									<form action="" method="POST">        
									<center>  <?php echo $message;?> </center>
    Provide the following details to get a new password
<input type="email" name="email" class="form-control"placeholder="Email">
<input type="number" name="phone"class="form-control"placeholder="Phone" maxlength="14">
<input type="submit" name="recover" value="Recover"class="btn btn-success"> 

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