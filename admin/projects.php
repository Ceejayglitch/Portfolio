<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>
<?php Confirm_Login() ?>

<?php 

// if(isset($_POST["Submit"])){
// 	// start of post submit

// 	$Job = $_POST["jobTitle"];

// 	if(empty($Job)){
// 		$_SESSION["ErrorMessage"]="All fields must be filled out";
// 		Redirect_to("add-jobs.php");
// 	}elseif (strlen($Job)< 2){
// 		$_SESSION["ErrorMessage"]="Job Title should be greater than 2 characters";
// 		Redirect_to("add-jobs.php");
// 	}elseif (strlen($Job) > 29){
// 		$_SESSION["ErrorMessage"]="Job Title should NOT exceed more than 30 characters";
// 		Redirect_to("add-jobs.php");
// 	}else{
// 		// query to instert job data into db
// 		global $ConnectingDB;
// 		$sql = "INSERT INTO jobs(jobTitle)";
// 		$sql .="VALUES(:jobTitle)";

// 		$stmt = $ConnectingDB->prepare($sql);

// 		$stmt->bindValue(':jobTitle',$Job);
// 		$Execute=$stmt->execute();

// 		if($Execute){
// 			$_SESSION["SuccessMessage"]="Job added successfully";
// 		} else {
// 			$_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
// 		}
// 		Redirect_to("add-jobs.php");
// 	}

// // end of post submit
// }


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
							<a class="active" href="#">Projects</a>
						</li>
                        <!-- <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="" href="#">Add Jobs</a>
						</li> -->
					</ul>
				</div>
                    <!-- add submit button for post here -->
                
				<!-- <a href="#" class="btn-download">
                    <i class='bx bx-image-add'></i>
					<span class="text">Add Project</span>
				</a> -->
			</div>
			<?php
			echo ErrorMessage();
			echo SuccessMessage();
			?>

			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Home Page</h4>
                  <!-- <form class="forms-sample" method="POST" enctype="multipart/form-data" action="projects.php">
                    
				  	<div class="form-group" style="text-align: center;">
                      <label for="post_title">Add Job(s)</label>
                      <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Web Dev/Graphic Designer">
                    </div>


                    

					<a href="edit-admin.php" class="btn-cancel">
						<i class='bx bx-undo'></i> Cancel
					</a>
                  </form>  -->

                    <a href="add-project.php" class="btn-edit">
                        <i class='bx bx-image-add'></i>
					    <span class="text">Add Project</span>
				    </a>

                </div>
				<!-- Add table here -->
				<section class="container py-2 mb-4">
					<h2 style="text-align: center;">Project List</h2>
					<div class="row">
						<div class="col-lg-10">
							<table class="table table-striped table-hover">
								<thead class="thead-dark">
								<tr>
									<th>#</th>
									<th>Project Name</th>
                                    <th>Project Description</th>
                                    <th>Project Link</th>
									<th>Edit / Delete</th>
								</tr>
								</thead>
								<?php

								global $ConnectingDB;
								$sql = "SELECT * FROM projects";
								$stmt = $ConnectingDB->query($sql);
								$count = 0;
								while ($DataRows = $stmt->fetch()){
									$Id			=	$DataRows["id"];
									$Project	=	$DataRows["projName"];
                                    $Image	    =	$DataRows["projImg"];
                                    $Type	    =	$DataRows["projType"];
                                    $Link	    =	$DataRows["projLink"];
									$count++;
								?>
								<tbody>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $Project; ?></td>
                                    <td><?php echo $Type; ?></td>
                                    <td><?php echo $Link; ?></td>
									<td>
										<a href="edit-project.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span></a>
										<a href="delete-project.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a>
									</td>
									<!-- <td> -->
										<!-- echo $image here -->
										<!-- <img src=upload/<?php ?>" width="170px;" height="50px" -->
									<!-- </td> -->
								</tr>
								</tbody>
								<?php } ?>

							</table>
						</div>
					</div>

				</section>

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