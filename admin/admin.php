<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>
<?php Confirm_Login() ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/style.css">

	<title>Admin Panel</title>
	<link href="../images/cj_logo.png" rel="icon">
</head>
<body>


	<?php include('header.php'); ?>

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>

			<a href="#" class="profile">
				<img src="../images/cj_logo.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<!-- =========================== MAIN BODY ================================= -->
			<div class="head-title">
				<div class="left">
					<h1>Home Page</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="#">Home</a>
						</li>
						<!-- <li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li> -->
					</ul>
				</div>
				<a href="edit-admin.php" class="btn-download">
					<i class='bx bxs-edit' ></i>
					<span class="text">Edit</span>
				</a>
			</div>

			<?php
			global $ConnectingDB;
			
			echo ErrorMessage();
			echo SuccessMessage();

			$sql = "SELECT * FROM homepage WHERE id = 1";
			$stmt = $ConnectingDB->query($sql);
			while ($DataRows = $stmt->fetch()){
				$introhan			=	$DataRows["intro"];
				$Name	=	$DataRows["name"];
				$Image	=	$DataRows["image"];
				$CV		=	$DataRows["cv_name"];
				$Filepath	=	$DataRows["cv_loc"];
			}


			?>

			<!-- <ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul> -->

			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Home Page</h4>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    
				  	<div class="form-group">
                      <label for="post_title">Introduction</label>
                      <input type="text" name="introduction" class="form-control" id="introduction" placeholder="" value="<?php echo $introhan; ?>" disabled>
                    </div>

					<div class="form-group">
                      <label for="post_title">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $Name; ?>" disabled>
                    </div>

					<?php
						$sql = "SELECT jobTitle FROM jobs";
						$stmt = $ConnectingDB->query($sql);

						$job_titles = array();

						while ($DataRows = $stmt->fetch()) {
							// Store each job title in the $job_titles array
							$job_titles[] = $DataRows["jobTitle"];
						}

						if (!empty($job_titles)) {
							// Concatenate all job titles into a single string separated by commas
							$job_titles_str = implode(", ", $job_titles);
						} else {
							$job_titles_str = "Default Job Title";
						}
					?>

					<div class="form-group">
                      <label for="post_title">Job</label>
                      <input type="text" name="job" class="form-control" id="job" placeholder="<?php echo htmlspecialchars(implode(",", $job_titles)); ?>" disabled >
                    </div>

					<div class="form-group"> <!-- EDITED ---------------------------------------->
						<div class="custom-file">
							<label for="formFileLg" class="form-label">Current Image</label>
							<img src="img/<?php echo $Image; ?>" width="170px;" height="200px;">
                            <!-- <input class="form-control form-control-lg" id="formFileLg" type="file" value="<?php echo $Image; ?>" disabled> -->
						</div>
					</div>


					<!-- ===== SLIDER FOR SKILLS ===== -->
                    <!-- <div class="form-group">
                        <label for="customRange2" class="form-label">Las Vegas mowdels eskills</label>
                        <input type="range" class="form-range" min="0" max="10" id="customRange2">
                    </div> -->

					<div class="form-group"> <!-- EDITED ---------------------------------------->
						<div class="custom-file">
							<label for="formFileLg" class="form-label">Uploaded CV Name</label>
							<div class="filename"><?php echo $Filepath; ?></div>
                            <!-- <input class="form-control form-control-lg" id="formFileLg" type="file" value="<?php echo $CV; ?>" disabled> -->
						</div>
					</div>

                  </form>
                </div>
              </div>
            </div>

			
			<!-- main body end -->

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="assets/script.js"></script>
	<script src="adminjs.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>