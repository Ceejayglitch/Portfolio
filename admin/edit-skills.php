<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>
<?php Confirm_Login() ?>

<?php 
    global $ConnectingDB;
    // make sure the GET function gets the column of id name from the database
    $SearchQueryParameter = $_GET['skill_id'];
    
    if(isset($_POST["Submit"])){
        // start of post submit
        $SkillNamePost = $_POST["Skills"];
        $SkillRangePost = $_POST["Lvl"];
    
        if(empty($SkillNamePost) || empty($SkillRangePost)){
            $_SESSION["ErrorMessage"]="All fields must be filled out";
        } elseif (strlen($SkillNamePost) < 2){
            $_SESSION["ErrorMessage"]="Skill Name should be greater than 2 characters";
        } elseif (strlen($SkillNamePost) > 30){
            $_SESSION["ErrorMessage"]="Skill Name should NOT exceed more than 30 characters";
        } elseif ($SkillRangePost >= 100) {
            $_SESSION["ErrorMessage"] = "Skill Range should NOT exceed more than 99";
        } else {
            // query to insert job data into db
            $sql = "UPDATE skills SET skillName = :skillName, skillRange = :skillRange WHERE skill_id = :searchQueryParameter";
            $stmt = $ConnectingDB->prepare($sql);
    
            $stmt->bindValue(':skillName', $SkillNamePost);
            $stmt->bindValue(':skillRange', $SkillRangePost);
            $stmt->bindValue(':searchQueryParameter', $SearchQueryParameter);
            $Execute = $stmt->execute();
    
            if($Execute){
                $_SESSION["SuccessMessage"]="Skill updated successfully";
            } else {
                $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
            }
        }
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
							<a class="" href="#">Add Skills</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="#">Edit Skills</a>
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

			echo SuccessMessage();
			echo ErrorMessage();


            $sql	=	"SELECT * FROM skills WHERE skill_id = '$SearchQueryParameter'";
			$stmt	=	$ConnectingDB->query($sql);
				while($DataRows=$stmt->fetch()){
					$ID				    = $DataRows['skill_id'];
					$skillnameUpdate	= $DataRows['skillName'];
                    $skillrangeUpdate	= $DataRows['skillRange'];
				}

			?>

			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Skills</h4>
                  <form class="forms-sample" action="edit-skills.php?skill_id=<?php echo $SearchQueryParameter; ?>" method="POST" enctype="multipart/form-data" >
                    
				  	<div class="form-group" style="text-align: center;">
                      <label for="post_title">Edit Skills</label>
                      <input type="text" name="Skills" class="form-control" id="Skills" placeholder="" value="<?php echo $skillnameUpdate; ?>">
                    </div>

                    <div class="form-group" style="text-align: center;">
                      <label for="post_title">Skill %</label>
                      <input type="text" name="Lvl" class="form-control" id="Lvl" value="<?php echo $skillrangeUpdate; ?>">
                    </div>


                    <div class="button-container">
					<button type="submit" name="Submit" class="btn-submit">
    					<i class='bx bxs-edit'></i> Submit
					</button>

					<a href="add-skills.php" class="btn-cancel">
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