
<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php Confirm_Login() ?>

<?php
	global $ConnectingDB;

    $SearchQueryParameter = $_GET['id'];

	$sql = "SELECT * FROM projects WHERE id = '$SearchQueryParameter'";
	$stmt = $ConnectingDB->query($sql);
	while ($DataRows = $stmt->fetch()){
        $projectId          =   $DataRows['id'];
		$nameEdit		    =	$DataRows["projName"];
		$imgEdit			=	$DataRows["projImg"];
		$typeEdit			=	$DataRows["projType"];
		$linkEdit			=	$DataRows["projLink"];
	}



    if (isset($_POST["Submit"])) {
        // Retrieve form data
        $ProjName = $_POST['Project'];
        $ProjType = $_POST["Type"];
        $WebLink = $_POST['website']; // Added missing semicolon at the end

        if (!empty($_FILES["image"]["name"])) {
			$Image = $_FILES["image"]["name"];
			$Target = "img/" . basename($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
		} else {
			// If no new image is uploaded, retain the existing image path
			$Image = $imgEdit;
		}


        // Prepare the SQL query to update the record with id = 1
        // $sql = "INSERT INTO projects (projName, projImg, projType, projLink)";
        // $sql .= "VALUES(:projName, :projImg, :projType, :projLink)";

        $sql =  "UPDATE projects SET projName = :projName, projImg = :projImg, projType = :projType, projLink = :projLink WHERE id = $SearchQueryParameter";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':projName', $ProjName);
        $stmt->bindValue(':projImg', $Image);
        $stmt->bindValue(':projType', $ProjType);
        $stmt->bindValue(':projLink', $WebLink); // Assuming projLink corresponds to the project link
        $Execute = $stmt->execute();

        move_uploaded_file($_FILES["image"]["tmp_name"], $Target);

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Project Edited successfully.";
            Redirect_to("projects.php"); // Assuming Redirect_to function is defined elsewhere
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try again.";
            Redirect_to("projects.php"); // Assuming Redirect_to function is defined elsewhere
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
							<a class="" href="#">Projects</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="#">Edit Projects</a>
						</li>
					</ul>
				</div>
                
			</div>

			<?php
			echo ErrorMessage();
			echo SuccessMessage();

			?>


			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Home Page</h4>
                  <form class="forms-sample" action="edit-project.php?id=<?php echo $SearchQueryParameter; ?>" method="POST" enctype="multipart/form-data">
                    
				  	<div class="form-group">
                      <label for="post_title">Project Name<span style="color:red"> * </span> </label>
                      <input type="text" name="Project" class="form-control" id="Project" value="<?php echo $nameEdit ?>" required>
                    </div>

					<div class="form-group">
                        <label for="post_title">Project Type<span style="color:red">*</span></label><br>
                        <input type="radio" name="Type" id="imageRadio" value="Graphic Design" <?php if ($typeEdit == "Graphic Design") echo "checked"; ?>> Graphic Design<br>
                        <input type="radio" name="Type" id="websiteRadio" value="Website" <?php if ($typeEdit == "Website") echo "checked"; ?>> Website<br>
                    </div>

                    <div class="form-group" id="imageFormGroup">
                        <label for="formFileLg" class="form-label">Current Image</label>
                        <img src="img/<?php echo $imgEdit; ?>" width="170px;" height="200px;" id="currentImage">
                        <br>
                       
                        <br>
                        <label for="image">Upload Image</label>
                        <input class="form-control form-control-lg" name="image" id="image" type="file" value="None">
                    </div>

                    <div class="form-group" id="websiteFormGroup">
                        <label for="website">Website Link</label>
                        <input class="form-control form-control-lg" name="website" id="website" type="text" value="<?php echo $linkEdit ?>">
                    </div>

                    <div class="button-container">
                    <button type="submit" name="Submit" class="btn-submit">Submit</button>
                    <a href="projects.php" class="btn-cancel">
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
	<script>
    // Function to disable image form group and enable website form group
    function enableWebsiteForm() {
        document.getElementById("imageFormGroup").style.display = "none";
        document.getElementById("websiteFormGroup").style.display = "block";
        document.getElementById("image").disabled = true;
        document.getElementById("website").disabled = false;
    }

    // Function to enable image form group and disable website form group
    function enableImageForm() {
        document.getElementById("imageFormGroup").style.display = "block";
        document.getElementById("websiteFormGroup").style.display = "none";
        document.getElementById("image").disabled = false;
        document.getElementById("website").disabled = true;
    }

    // Event listener for image radio button
    document.getElementById("imageRadio").addEventListener("change", function() {
        enableImageForm();
    });

    // Event listener for website radio button
    document.getElementById("websiteRadio").addEventListener("change", function() {
        enableWebsiteForm();
    });

    // Initially enable image form group and disable website form group
    enableImageForm();

	</script>
</body>
</html>