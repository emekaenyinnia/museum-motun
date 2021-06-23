<?php include ('dbsettings.php');?>
<?php include ('head.php');?>


<?php include ('header.php');?>

<?php if($_SESSION['type'] == 'admin'){?>

	<!-- Hero section -->
			<div class="section-2xl bg-image parallax-bg" data-bg-src="">
				<div class="bg-dark-03">
					<div class="container text-center">
						<div class="row">
							<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<p class="font-small uppercase font-family-secondary"><a href="#">Users</a></p>
								<div class="margin-top-20 margin-bottom-20">
									
									<?php 


$users_counts=$conn->query("SELECT * from  tbl_users");
$counts = $users_counts->num_rows;


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

$users_statement = $users_order_by.' '.$limit;

$query=$conn->query("SELECT * from  tbl_users".$users_statement);
$totalPages = ceil($counts / $initital_limit);  


?>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">

<table class="table table-striped"id="myTable" style="color: #fff;">
    <thead>
      <tr>
        <th>I am From</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone Number</th>

      </tr>
    </thead>
    <?php 	while($userRow = mysqli_fetch_assoc($query)){?>

    <tbody>
      <tr>
        <td><?php echo $userRow['origin'];?></td>
        <td><?php echo $userRow['surname'].' '.$userRow['firstname'];?></td>
        <td><?php echo $userRow['email'];?></td>
        <td><?php echo $userRow['phone'];?></td>
      </tr>
 
    </tbody>
    <?php } ?>
		
  </table>

 <ul class="pagination justify-content-center">

	<?php 
	
$page = $_GET['page'];

	for ($page = 1; $page <= $totalPages; $page++) {?>

  <li><a class="btn btn-default" href="users?page=<?php echo $page;?>"><?php echo $page;?></a></li>

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