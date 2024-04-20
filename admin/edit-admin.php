
<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php Confirm_Login() ?>

<?php
	global $ConnectingDB;


	$sql = "SELECT * FROM homepage";
	$stmt = $ConnectingDB->query($sql);
	while ($DataRows = $stmt->fetch()){
		$IntrohantoEdit		=	$DataRows["intro"];
		$NametoEdit			=	$DataRows["name"];
		$ImagetoEdit			=	$DataRows["image"];
		$CVtoEdit				=	$DataRows["cv_name"];
		$FilepathtoEdit		=	$DataRows["cv_loc"];
	}



	if (isset($_POST["Submit"])) {
		// Retrieve form data
		$Introduction 		= $_POST['introduction'];
		$Name 				= $_POST["name"];
		$CVName 			= ""; // Initialize $CVName variable
		// Check if a new image is uploaded
		if (!empty($_FILES["image"]["name"])) {
			$Image = $_FILES["image"]["name"];
			$Target = "img/" . basename($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
		} else {
			// If no new image is uploaded, retain the existing image path
			$Image = $ImagetoEdit;
		}
		$doc_name 			= $_FILES['docFile']['name'];
		// Set file destination paths
		$doc_dest_file 		= "upload/" . basename($_FILES['docFile']['name']);

		// Validate document file extension
		$doc_extension 		= pathinfo($doc_dest_file, PATHINFO_EXTENSION);
		$valid_extensions 	= array('pdf', 'doc', 'docx');

		if (!in_array(strtolower($doc_extension), $valid_extensions)) {
			$_SESSION["ErrorMessage"] = "Invalid file format. Please upload a PDF, DOC, or DOCX file.";
			Redirect_to("edit-admin.php");
		}

		// Automatically set $CVName to the extension of the uploaded file
		$CVName = $doc_name;

		// Prepare the SQL query to update the record with id = 1
		$sql = "UPDATE homepage SET intro = :introduction, name = :Name, image = :image, cv_name = :cvname, cv_loc = :cvpath WHERE id = 1";

		$stmt = $ConnectingDB->prepare($sql);
		$stmt->bindValue(':introduction', $Introduction);
		$stmt->bindValue(':Name', $Name);
		$stmt->bindValue(':image', $Image);
		$stmt->bindValue(':cvname', $CVName);
		$stmt->bindValue(':cvpath', $doc_dest_file);
		$Execute = $stmt->execute();

		// Check if the file exists and delete it before moving the new file
		if (file_exists($doc_dest_file)) {
			unlink($doc_dest_file); // Delete the existing file
		}

		move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
		move_uploaded_file($_FILES["docFile"]["tmp_name"], $doc_dest_file);

		if ($Execute) {
			$_SESSION["SuccessMessage"] = "Homepage edited successfully.";
			Redirect_to("admin.php");
		} else {
			$_SESSION["ErrorMessage"] = "Something went wrong. Try again.";
			Redirect_to("admin.php");
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

			<?php
			echo ErrorMessage();
			echo SuccessMessage();

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
                  <form class="forms-sample" action="edit-admin.php" method="POST" enctype="multipart/form-data">
                    
				  	<div class="form-group">
                      <label for="post_title">Introduction<span style="color:red"> * </span> </label>
                      <input type="text" name="introduction" class="form-control" id="introduction" placeholder="Hi, Im" value="<?php echo $IntrohantoEdit; ?>" required>
                    </div>

					<div class="form-group">
                      <label for="post_title">Name<span style="color:red"> * </span> </label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $NametoEdit; ?>" required>
                    </div>


                    <a href="add-jobs.php" class="btn-edit">
					    <i class='bx bxs-edit' ></i>
					    <span class="text">Edit Jobs</span>
				    </a>

					<?php
						global $ConnectingDB;
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
                      <label for="post_title">Job(s)</label>
                      <input type="text" name="job" class="form-control" id="job" placeholder="<?php echo htmlspecialchars(implode(",", $job_titles)); ?>" disabled >
                    </div>
                   
					 <!-- Existing Image -->
						<div class="form-group">
							<label for="existing_image">Current Image</label>
							<img src="img/<?php echo $ImagetoEdit; ?>" width="170px;" height="200px;">
						</div>
						<!-- New Image (Optional) -->
						<div class="form-group">
							<label for="image">Upload New Image (Optional)</label>
							<input class="form-control form-control-lg" name="image" id="image" type="file">
						</div>


					<!-- ===== SLIDER FOR SKILLS ===== -->
                    <!-- <div class="form-group">
                        <label for="customRange2" class="form-label">Las Vegas mowdels eskills</label>
                        <input type="range" class="form-range" min="0" max="10" id="customRange2">
                    </div> -->

					<div class="form-group">
                      <label for="file_name">CV Name<span style="color:red"> * </span> </label>
                      <input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="<?php echo $CVtoEdit; ?>" disabled>
                    </div>

					<div class="form-group">
						<label>File upload <span style="color:red"> * </span> </label>
						<input type="file" name="docFile" id="docFile" class="file-upload-default" style="display: none;">
						<div class="input-group col-xs-12">
							<input type="text" name="docFile" class="form-control file-upload-info" disabled placeholder="Upload File" id="fileNamePlaceholder">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('docFile').click();">Upload</button>
							</span>
						</div>
					</div>

                    <div class="button-container">
                    <button type="submit" name="Submit" class="btn-submit">Submit</button>
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
	<script>
		document.getElementById('docFile').addEventListener('change', function() {
			var fileName = this.files[0].name;
			document.getElementById('fileNamePlaceholder').value = fileName;
		});
	</script>
</body>
</html>