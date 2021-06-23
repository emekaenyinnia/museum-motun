			<!-- Header -->
			<div class="header absolute-light">
				<div class="container">
					<div class="logo">
						<h4 class="uppercase letter-spacing-2"><a href="<?php echo $site_url;?>"><?php echo $site_name;?></a></h4>
					</div>
					<div class="header-menu-wrapper">
						<!-- Menu -->
						<ul class="header-menu">
							<li class="m-item">
								<!-- <a class="m-link" href="<?php  //echo $site_url;?>">Home</a> -->
								<a class="m-link" href="<?php echo 'index.php' ?>">Home</a>
							</li>
							
							<?php  if (isset($_SESSION['user_id']))
							//   if (isset($_SESSION['email']))
							  {?>
							<li class="m-item">
								<a class="m-link" href="#">Explore</a>
								<ul class="m-dropdown">
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="update-password">Update Password</a>
									</li>

									<?php if($_SESSION['type'] == "admin"){?>
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="users.php">Users</a>
									</li>
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="manage-gallery.php">Gallery</a>
									</li>
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="create.php">Create</a>
									</li>
									<?php } ?>
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="logout.php">Logout</a>
									</li>
									
								</ul>
						
							</li>
						<?php }else{ ?>

							<li class="m-item">
								<a class="m-link" href="#">Explore</a>
								<ul class="m-dropdown">
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="login.php">Login</a>
									</li>
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="register.php">Register</a>
									</li>
									<li class="m-dropdown-item">
										<a class="m-dropdown-link" href="recover-account.php">Recover Account</a>
									</li>
									
								</ul>
						
							</li>

						<?php } ?>

						</ul>
						<!-- Close Button -->
						<button class="close-button">
							<span></span>
						</button>
					</div><!-- end header-menu-wrapper -->
					<!-- Menu Toggle on Mobile -->
					<button class="m-toggle">
						<span></span>
					</button>
				</div><!-- end container -->
			</div>
			<!-- end Header -->