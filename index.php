<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>


<?php include ('landing.php');?>

	
<?php



if($_GET['order_by'] == 'oldest'){

  $gallery_order_by = 'ORDER BY gallery_id ASC';

}

if($_GET['order_by'] == 'latest'){

  $gallery_order_by = 'ORDER BY gallery_id DESC';

}



$gallery_counts=$conn->query("SELECT * from  tbl_gallery where gallery_id  > '0'");


$counts = $gallery_counts->num_rows;



if($_GET['page'] > '0'){



$initital_limit = '6';
$page_index = ($_GET['page'] - 1) * $initital_limit;   
$limit = 'LIMIT '.$page_index.', '.$initital_limit;


}else{

$_GET['page'] = 1;
$initital_limit = '6';
$page_index = ($_GET['page'] - 1) * $initital_limit;   
$limit = 'LIMIT '.$page_index.', '.$initital_limit;


}

$gallery_statement = $gallery_order_by.' '.$limit;



$query=$conn->query("SELECT * from  tbl_gallery where gallery_id  > '0' ".$gallery_statement);
$totalPages = ceil($counts / $initital_limit);  


	?>
			<!-- Portfolio section -->
			<div class="section-lg padding-top-0">
				<div class="container">
					<div class="portfolio-masonry portfolio-title-overlay hover-style-2 column-3 spacing-20">
					<?php
					while($galleryRow = mysqli_fetch_assoc($query)){?>


						<div class="portfolio-item">
							<a href="gallery?details=<?php echo $galleryRow['gallery_id'];?>">
								<div class="portfolio-img">
									<img src="files/<?php echo $galleryRow['media'];?>" alt="<?php echo $galleryRow['header'];?>">
								</div>
								<div class="portfolio-hover">
									<div class="portfolio-hover-box">
										<h4 class="font-weight-normal"><?php echo $galleryRow['header'];?></h4>
										<!--<span class="font-small uppercase">Category</span>-->
									</div>
								</div>
							</a>
						</div>

					<?php } ?>


					</div>

            
        
				</div>
				 

<p><br><br><br></p>
				 <ul class="pagination justify-content-center">

	<?php 
	
$page = $_GET['page'];

	for ($page = 1; $page <= $totalPages; $page++) {?>

  <li><a class="btn btn-default" href="log?page=<?php echo $page;?>"><?php echo $page;?></a></li>

  <?php
}

?>

                </ul>
			</div>
			<!-- end Portfolio section -->

<?php include ('footer.php');?>