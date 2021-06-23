<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php
if(isset($_POST['login'])){

$email=$_POST['email'];
$password=md5($_POST['password']);

$check_for_user=$conn->query("SELECT * from tbl_users where email='$email' AND password='$password'");
$check_user_signin_row=$check_for_user->fetch_assoc();

$_SESSION['user_id']=$check_user_signin_row['user_id'];
// var_dump($_SESSION['user_id']);
    
if ($check_for_user->num_rows == '1'){ 


// echo '<script>window.location="'.$site_url.'"</script>';

echo '<script>window.location="index.php"</script>';


}else{


$error_message = '<span class="btn btn-danger">Email & Password Combination Not Valid</span><br><br>';


}

}
?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Login</a></p>
								<div class="margin-top-20 margin-bottom-20">
									<form action="" method="POST">        
									<center>  <?php echo $error_message;?> </center>
    
<input type="email" name="email" class="form-control"placeholder="Email">
<input type="password" name="password"class="form-control"placeholder="Password">
<input type="submit" name="login" value="Login"class="btn btn-success"> 

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