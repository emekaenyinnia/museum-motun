<?php 
include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php if($_SESSION['type'] == 'admin'){?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Gallery</a></p>
								<div class="margin-top-20 margin-bottom-20">

									<h5><a href="add">Add to Museum Gallery</a></h5>
									
									<?php 


$gallery_counts=$conn->query("SELECT * from  tbl_gallery");
$counts = $gallery_counts->num_rows;


if($_GET['page'] > '0'){



$initital_limit = '10';
$page_index = ($_GET['page'] - 1) * $initital_limit;   
$limit = 'LIMIT '.$page_index.', '.$initital_limit;


}else{

$_GET['page'] = 1;
$initital_limit = '10';
$page_index = ($_GET['page'] - 1) * $initital_limit;   
$limit = 'LIMIT '.$page_index.', '.$initital_limit;


}

$gallery_statement = $gallery_order_by.' '.$limit;

$query=$conn->query("SELECT * from  tbl_gallery".$gallery_statement);
$totalPages = ceil($counts / $initital_limit);  


?>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">

<table class="table table-striped"id="myTable" style="color: #fff;">
    <thead>
      <tr>
        <th>Header</th>
        <th>Section</th>
        <th>Location</th>
        <th></th>

      </tr>
    </thead>
    <?php 	while($galleryRow = mysqli_fetch_assoc($query)){?>

    <tbody>
      <tr>
        <td><?php echo $galleryRow['header'];?></td>
        <td><?php echo $galleryRow['section'];?></td>
        <td><?php echo $galleryRow['location'];?></td>
        <td><a href="edit.php?gallery=<?php echo $galleryRow['gallery_id'];?>"class="btn btn-success">Manage</a><br><br><a href="delete.php?gallery=<?php echo $galleryRow['gallery_id'];?>"class="btn btn-danger">Delete</a></td>
      </tr>
 
    </tbody>
    <?php } ?>
		
  </table>

 <ul class="pagination justify-content-center">

	<?php 
	
$page = $_GET['page'];

	for ($page = 1; $page <= $totalPages; $page++) {?>

  <li><a class="btn btn-default" href="gallery?page=<?php echo $page;?>"><?php echo $page;?></a></li>

  <?php
}

?>

                </ul>		</div>
							
							</div>
						</div><!-- end row -->
						<!-- Share buttons -->
				
					</div><!-- end container -->
				</div>
			</div>
			<!-- end Hero section -->

	<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
			<!-- end Blog Post content -->
<?php } ?>

<?php include ('footer.php');?>