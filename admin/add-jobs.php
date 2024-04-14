<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>

<?php 

if(isset($_POST["Submit"])){
	// start of post submit

	$Job = $_POST["jobTitle"];

	if(empty($Job)){
		$_SESSION["ErrorMessage"]="All fields must be filled out";
		Redirect_to("add-jobs.php");
	}elseif (strlen($Job)< 2){
		$_SESSION["ErrorMessage"]="Job Title should be greater than 2 characters";
		Redirect_to("add-jobs.php");
	}elseif (strlen($Job) > 29){
		$_SESSION["ErrorMessage"]="Job Title should NOT exceed more than 30 characters";
		Redirect_to("add-jobs.php");
	}else{
		// query to instert job data into db
		global $ConnectingDB;
		$sql = "INSERT INTO jobs(jobTitle)";
		$sql .="VALUES(:jobTitle)";

		$stmt = $ConnectingDB->prepare($sql);

		$stmt->bindValue(':jobTitle',$Job);
		$Execute=$stmt->execute();

		if($Execute){
			$_SESSION["SuccessMessage"]="Job added successfully";
		} else {
			$_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
		}
		Redirect_to("add-jobs.php");
	}

// end of post submit
}


?>


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
							<a class="" href="#">Edit Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="#">Edit Jobs</a>
						</li>
					</ul>
				</div>
                    <!-- add submit button for post here -->
                
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-edit' ></i>
					<span class="text">Edit</span>
				</a> -->
			</div>
			<?php
			echo ErrorMessage();
			echo SuccessMesage();
			?>

			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Home Page</h4>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data" action="add-jobs.php">
                    
				  	<div class="form-group" style="text-align: center;">
                      <label for="post_title">Add Job(s)</label>
                      <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Web Dev/Graphic Designer">
                    </div>


                    <div class="button-container">
					<button type="submit" name="Submit" class="btn-submit">
    					<i class='bx bxs-edit'></i> Submit
					</button>

					<a href="edit-admin.php" class="btn-cancel">
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