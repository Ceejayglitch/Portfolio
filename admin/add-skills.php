<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>
<?php Confirm_Login() ?>

<?php 

if(isset($_POST["Submit"])){
	// start of post submit

	$SkillNamePost = $_POST["Skills"];
	$SkillRangePost = $_POST["Lvl"];

	if(empty($SkillNamePost) && empty($SkillRangePost)){
		$_SESSION["ErrorMessage"]="All fields must be filled out";
		Redirect_to("add-skills.php");
	}elseif (strlen($SkillNamePost)< 2){
		$_SESSION["ErrorMessage"]="Skill Name should be greater than 2 characters";
		Redirect_to("add-skills.php");
	}elseif (strlen($SkillNamePost) > 29){
		$_SESSION["ErrorMessage"]="Skill Name should NOT exceed more than 30 characters";
		Redirect_to("add-skills.php");
	}else{
		// query to insert job data into db
		global $ConnectingDB;
		$sql = "INSERT INTO skills (skillName, skillRange) ";
		$sql .= "VALUES (:skillname, :skillrange)";

		$stmt = $ConnectingDB->prepare($sql);

		$stmt->bindValue(':skillname', $SkillNamePost);
		$stmt->bindValue(':skillrange', $SkillRangePost);
		$Execute = $stmt->execute();

		if($Execute){
			$_SESSION["SuccessMessage"]="Skill added successfully";
		} else {
			$_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
		}
		Redirect_to("add-skills.php");
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
							<a class="" href="#">About Me</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Add Skills</a>
						</li>
                        <!-- <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="#">Edit Jobs</a>
						</li> -->
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
			echo SuccessMessage();
			?>

			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Skills</h4>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data" action="add-skills.php">

				  	<div class="form-group" style="text-align: center;">
                      <label for="post_title">Add Skill(s)</label>
                      <input type="text" name="Skills" class="form-control" id="Skills" placeholder="Python, etc. ">
                    </div>

                    <div class="form-group" style="text-align: center;">
                      <label for="post_title">Skill %</label>
                      <input type="text" name="Lvl" class="form-control" id="Lvl" placeholder="Skill Level 1-100">
                    </div>

                    <!-- <div class="form-group">
                        <label for="customRange2" class="form-label">Skill Range</label>
                        <input type="range" class="form-range" min="0" max="10" id="customRange2">
                    </div> -->


                    <div class="button-container">
					<button type="submit" name="Submit" class="btn-submit">
    					<i class='bx bxs-edit'></i> Submit
					</button>

					<a href="about.php" class="btn-cancel">
						<i class='bx bx-undo'></i> Cancel
					</a>
                    </div>
                    
                  </form>
                </div>

				<!-- Add table here -->
				<section class="container py-2 mb-12">
					<h2 style="text-align: center;">Skill List</h2>
					<div class="row">
						<div class="col-lg-10">
							<table class="table table-striped table-hover">
								<thead class="thead-dark">
								<tr>
									<th>#</th>
									<th>Skill Name</th>
									<th>Skill Range</th>
									<th>Edit / Delete</th>
								</tr>
								</thead>
								<?php

								global $ConnectingDB;
								$sql = "SELECT * FROM skills";
								$stmt = $ConnectingDB->query($sql);
								$count = 0;
								while ($DataRows = $stmt->fetch()){
									$skillId			=	$DataRows["skill_id"];
									$skillName			=	$DataRows["skillName"];
									$skillRange			=	$DataRows["skillRange"];
									$count++;
								?>
								<tbody>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $skillName; ?></td>
									<td><?php echo $skillRange; ?></td>
									<td>
										<a href="edit-skills.php?skill_id=<?php echo $skillId; ?>"><span class="btn btn-warning">Edit</span></a>
										<a href="delete-skills.php?skill_id=<?php echo $skillId; ?>"><span class="btn btn-danger">Delete</span></a>
									</td>
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