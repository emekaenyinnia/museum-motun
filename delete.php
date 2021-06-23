<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


  
                  <?php 

$gallery_id = $_GET['gallery'];

$gallery=$conn->query("SELECT * from  tbl_gallery where gallery_id = '$gallery_id'");
var_dump($gallery);
die();
$galleryRow = mysqli_fetch_assoc($gallery);
$media = 'files/'.$galleryRow['media'];

unlink($media);

$gallery=$conn->query("DELETE  from  tbl_gallery where gallery_id = '$gallery_id'");

echo "<script>window.location='manage-gallery';</script>";
?>


<?php include ('footer.php');?>