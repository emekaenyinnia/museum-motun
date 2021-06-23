<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php

if(isset($_POST['register'])){


$email = $_POST['email'];
$password = md5($_POST['password']);
$origin = $_POST['origin'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];



if(!empty($email) || !empty($_POST['password']) || !empty($firstname) || !empty($surname) || !empty($phone)  || !empty($origin)) {

	$check_for_email= $conn->query("SELECT * from tbl_users where email='$email'");
	
	$check_for_phone= $conn->query("SELECT * from tbl_users where phone='$phone'");

if ($check_for_email->num_rows == '0' && $check_for_phone->num_rows == '0'){ 
$add = mysqli_query($conn, "INSERT INTO tbl_users (email,password,origin,firstname,surname,phone,type,status) values('$email','$password','$origin','$firstname','$surname','$phone','admin','active')");
echo '<script>window.location="login.php";</script>';

}else{

$error_message = '<span class="btn btn-danger">Email & Phone Combination Already Exist<br><br>
</span>';

}
}else{
$error_message = '<span class="btn btn-danger">Please Complete All Fields<br><br>
</span>';


}
}
?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Register</a></p>
								<div class="margin-top-20 margin-bottom-20">
									<form action="" method="post">   
									 <center> <?php echo $error_message;?></center>
         
<input type="text" name="origin" class="form-control"placeholder="I am From">
<input type="text" name="firstname" class="form-control"placeholder="Firstname">
<input type="text" name="surname"class="form-control"placeholder="Surname">
<input type="email" name="email" class="form-control"placeholder="Email">
<input type="number" name="phone"class="form-control"placeholder="Phone Number" maxlength="14">
<input type="password" name="password"class="form-control"placeholder="Password">
<input type="submit" name="register" value="Register"class="btn btn-success"> 

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