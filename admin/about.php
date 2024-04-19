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
							<a class="active" href="#">About Me</a>
						</li>
						<!-- <li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Edit Home</a>
						</li> -->
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
                      <label for="post_title">Little About Me</label>
                      <input type="text" name="about" class="form-control" id="about" placeholder="Hello, I'm Criston Jade B. Enolpe. A Full-stack developer, and graphic designer.
                        I specialize in crafting engaging user experiences, developing reliable web application,
                        and producing eye-catching designs.">
                    </div>

                        <h4>Resume</h4>

					<div class="form-group">
                      <label for="post_title">College</label>
                      <input type="text" name="college" class="form-control" id="college" placeholder="College Name">
                    </div>

                    <div class="form-group">
                      <label for="post_title">Senior High School</label>
                      <input type="text" name="shs" class="form-control" id="shs" placeholder="Senior High School Name">
                    </div>

                    <div class="form-group">
                      <label for="post_title">High School</label>
                      <input type="text" name="hs" class="form-control" id="hs" placeholder="High School Name">
                    </div>

                    <div class="form-group">
                      <label for="post_title">Grade School</label>
                      <input type="text" name="elementary" class="form-control" id="elementary" placeholder="Grade School Name">
                    </div>


                    <h4>Skills</h4>
					<!-- ===== SLIDER FOR SKILLS ===== -->
                    <a href="add-skills.php" class="btn-edit">
					    <i class='bx bxs-edit' ></i>
					    <span class="text">Add Skill(s)</span>
				    </a>
                    
                    <!-- <div class="form-group">
                        <label for="customRange2" class="form-label">Web Development</label>
                        <input type="range" class="form-range" min="0" max="10" id="customRange2">
                    </div> -->


                    <div class="button-container">
                    <button type="submit" class="btn-submit">Submit</button>
                    <!-- <a href="admin.php" class="btn-cancel">
                        <i class='bx bx-undo'></i> Cancel
                    </a> -->
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