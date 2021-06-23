<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

  
                  <?php 

$gallery_id = $_GET['details'];

$gallery=$conn->query("SELECT * from  tbl_gallery where gallery_id = '$gallery_id'");
$galleryRow = mysqli_fetch_assoc($gallery);
?>




      <div class="section-2xl bg-image parallax-bg" data-bg-src="files/<?php echo $galleryRow['media'];?>">
        <div class="bg-dark-03">
          <div class="container text-center">
            <div class="row">
              <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <p class="font-small uppercase font-family-secondary"><a href="#"><?php echo $galleryRow['header'];?></a></p>
                <div class="margin-top-20 margin-bottom-20">
                 </div>
                  
              </div>
            </div><!-- end row -->
            <!-- Share buttons -->
        
          </div><!-- end container -->

        </div>
      </div>
      <!-- end Hero section -->


 <!-- Blog Post content -->
      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
              <p><?php echo $galleryRow['body'];?>
</p>
             
            </div>
   
        </div><!-- end container -->
      </div>
    </div>
      <!-- end Blog Post content -->
  <!-- Hero section -->
     

<?php include ('footer.php');?>