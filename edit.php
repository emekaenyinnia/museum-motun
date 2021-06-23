<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php


$gallery_id = $_GET['gallery'];

$gallery=$conn->query("SELECT * from  tbl_gallery where gallery_id = '$gallery_id'");
$galleryRow = mysqli_fetch_assoc($gallery);
$media = 'files/'.$galleryRow['media'];

if(isset($_POST['edit'])){


$header=$_POST['header'];
$body=$_POST['body'];
$section=$_POST['section'];
$location=$_POST['location'];


if($_FILES['image']['name'] ==""){

$update=$conn->query("UPDATE tbl_gallery SET header='$header', body = '$body', section = '$section', location = '$location' WHERE gallery_id = '$gallery_id'");

}else{

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 10; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
$session_idenc =md5(time());
$image = addslashes($_FILES['image']['name']);
$ext = pathinfo( $image );
$photo_post  = $session_idenc."_museum_".$randomString.".".strtolower ( $ext['extension'] );
$sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
$photo_location = "files/".$photo_post; // Target path where file is to be stored
$move = move_uploaded_file($sourcePath,$photo_location) ; // Moving Uploaded file



$update=$conn->query("UPDATE tbl_gallery SET header='$header', body = '$body', media ='$photo_post', section = '$section', location = '$location' WHERE gallery_id = '$gallery_id'");

unlink($media);
}


if($update){
$message = '<span class="btn btn-success">Updated<br></span>';


}else{
$message = '<span class="btn btn-danger">Error. Try Again<br></span>';


}

}
?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Edit</a></p>
								<div class="margin-top-20 margin-bottom-20">
									<form action="" method="post"enctype="multipart/form-data">   
									 <center> <?php echo $message;?></center>
         <br>
<input type="text" name="header" class="form-control"value="<?php echo $galleryRow['header'];?>">
<input type="text" name="location" class="form-control"value="<?php echo $galleryRow['origin'];?>">
<textarea name="body"><?php echo $galleryRow['body'];?></textarea>
<br>
<input type="text" name="section" class="form-control"value="<?php echo $galleryRow['section'];?>">
<input type="file"name="image"class="btn btn-primary">
<input type="submit" name="edit" value="Edit"class="btn btn-success"> 

</form>

 
<script>
CKEDITOR.replace('body');
</script>
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