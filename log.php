<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>



<div class="section">
				<div class="container">
					<div class="row">
						<!-- Blog Posts -->
						<div class="col-12 col-lg-8">



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
						

						<?php
					while($galleryRow = mysqli_fetch_assoc($query)){?>

							<div class="row align-items-center margin-top-50">
								<div class="col-12 col-lg-5">
									<a href="gallery?details=<?php echo $galleryRow['gallery_id'];?>">
										<img src="files/<?php echo $galleryRow['media'];?>" alt="<?php echo $galleryRow['header'];?>" alt="">
									</a>
								</div>
								<div class="col-12 col-lg-7">
									<h5 class="font-weight-normal margin-top-10"><a href="gallery?details=<?php echo $galleryRow['gallery_id'];?>"><?php echo $galleryRow['header'];?></a></h5>
									
								
								</div>
							</div>

<?php } ?>




							<!-- Pagination -->
							<nav class="margin-top-50 text-center">
									 <ul class="pagination justify-content-center">

	<?php 
	
$page = $_GET['page'];

	for ($page = 1; $page <= $totalPages; $page++) {?>

  <li><a class="btn btn-default" href="log?page=<?php echo $page;?>"><?php echo $page;?></a></li>

  <?php
}

?>

                </ul>
							</nav>
						</div>
						<!-- Sidebar -->
						<!--
							<div class="border padding-30 margin-top-30 text-center">
								<h6 class="font-weight-normal font-small uppercase margin-bottom-30">Popular Tags</h6>
								<ul class="list-inline-sm font-small font-family-primary">
									<li><a class="button button-xs button-gray button-font-2" href="#">Art</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Design</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Fashion</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Inspiration</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Movie</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Music</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Nature</a></li>
									<li><a class="button button-xs button-gray button-font-2" href="#">Photography</a></li>
								</ul>
							</div>
						</div>
						-->


					</div><!-- end row -->
				</div><!-- end container -->
			</div>

<?php include ('footer.php');?>