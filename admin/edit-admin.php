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
							<a class="" href="#">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Edit Home</a>
						</li>
					</ul>
				</div>
                    <!-- add submit button for post here -->
                
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-edit' ></i>
					<span class="text">Edit</span>
				</a> -->
			</div>

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
                      <input type="text" name="introduction" class="form-control" id="introduction" placeholder="Hi, Im">
                    </div>

					<div class="form-group">
                      <label for="post_title">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    </div>


                    <a href="add-jobs.php" class="btn-edit">
					    <i class='bx bxs-edit' ></i>
					    <span class="text">Edit Jobs</span>
				    </a>
					<div class="form-group">
                      <label for="post_title">Job</label>
                      <input type="text" name="job" class="form-control" id="job" placeholder="Web Dev/Graphic Designer" disabled >
                    </div>
                   
					<div class="form-group"> <!-- EDITED ---------------------------------------->
						<div class="custom-file">
							<label for="img" class="form-label">Upload Image</label>
                            <input class="form-control form-control-lg" id="img" type="file">
						</div>
					</div>


					<!-- ===== SLIDER FOR SKILLS ===== -->
                    <!-- <div class="form-group">
                        <label for="customRange2" class="form-label">Las Vegas mowdels eskills</label>
                        <input type="range" class="form-range" min="0" max="10" id="customRange2">
                    </div> -->

					<div class="form-group"> <!-- EDITED ---------------------------------------->
						<div class="custom-file">
							<label for="cv" class="form-label">Upload CV</label>
                            <input class="form-control form-control-lg" id="cv" type="file">
						</div>
					</div>

                    <div class="button-container">
                    <button type="submit" class="btn-submit">Submit</button>
                    <a href="admin.php" class="btn-cancel">
                        <i class='bx bx-undo'></i> Cancel
                    </a>
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