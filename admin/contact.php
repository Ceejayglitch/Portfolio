<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>
<?php Confirm_Login() ?>

<?php
global $ConnectingDB;

if(isset($_POST["Submit"])){
    if(isset($_POST["Submit"])){
        $fullName 		= $_POST['FullName'];
        $email 			= $_POST['Email'];
        $phone 			= $_POST['Phone'];
        $address		= $_POST['Address'];
        $facebook		= $_POST['fb'];
        $github			= $_POST['git'];
        $instagram		= $_POST['insta'];
    
        if(empty($fullName) || empty($email) || empty($phone) || empty($address)){
            $_SESSION["ErrorMessage"] = "All fields must be filled out";
        } else {
            // query to update contact data in db
            $sql = "UPDATE contact 
                SET fn = :fullname,  email = :email, phone = :phone, address = :address, fb = :facebook, git = :github, insta = :instagram
                WHERE id = 1";
        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':fullname', $fullName);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':facebook', $facebook);
        $stmt->bindValue(':github', $github);
        $stmt->bindValue(':instagram', $instagram);

        $Execute = $stmt->execute();

        if($Execute){
            $_SESSION["SuccessMessage"] = "Contact information updated successfully";
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
        }
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
    <script src="https://kit.fontawesome.com/b2c2ccdc00.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/style.css">

	<title>Admin Panel</title>
	<link href="../images/cj_logo.png" rel="icon">

<style>
    .links {
        display: flex;
        align-items: center; /* Align items vertically */
        padding: 0;
        list-style: none;
    }

    .links li {
        margin-right: 10px; /* Adjust margin between items */
    }

    .links li a {
        color: #fff;
        background: #2F3C4F;
        padding: 10px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center; /* Align icon and text vertically */
    }

    .links li a i {
        font-size: 25px;
        margin-right: 5px; /* Adjust margin between icon and text */
    }
</style>

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
							<a class="active" href="#">Contact</a>
						</li>
					</ul>
				</div>
			</div>
			
			<?php
			echo ErrorMessage();
			echo SuccessMessage();
			?>


			<?php
			
				$sql = "SELECT * FROM contact";
				$stmt = $ConnectingDB->query($sql);
				while ($DataRows = $stmt->fetch()){
					$FullnameEdit		=	$DataRows["fn"];
					$EmailEdit			=	$DataRows["email"];
					$PhoneEdit			=	$DataRows["phone"];
					$AddressEdit		=	$DataRows["address"];
					$fblinkEdit			=	$DataRows["fb"];
					$gitlinkEdit		=	$DataRows["git"];
					$instalinkEdit		=	$DataRows["insta"];
				}

			?>
			
			<div class="col-12 grid-margin stretch-card">
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Home Page</h4>
                  <form class="forms-sample" action="contact.php" method="POST" enctype="multipart/form-data">

                        <h4>Contact</h4>

					<div class="form-group">
                      <label for="post_title">Full Name<span style="color:red"> * </span></label>
                      <input type="text" name="FullName" class="form-control" id="FullName" value="<?php echo $FullnameEdit  ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="post_title">Email<span style="color:red"> * </span></label>
                      <input type="text" name="Email" class="form-control" id="Email" value="<?php echo $EmailEdit ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="post_title">Phone Number<span style="color:red"> * </span></label>
                      <input type="text" name="Phone" class="form-control" id="Phone" value="<?php echo $PhoneEdit ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="post_title">Address<span style="color:red"> * </span></label>
                      <input type="text" name="Address" class="form-control" id="Address" value="<?php echo $AddressEdit ?>" required>
                    </div>





                    <h4>Social Links</h4>


                        <ul class="links">

                            <div class="form-group">
                                <label for="post_title">Facebook Link</label>
                                <input type="text" name="fb" class="form-control" id="fb" placeholder="" value="<?php echo $fblinkEdit ?>">
                            </div>
                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <div class="form-group">
                                <label for="post_title">Github Link</label>
                                <input type="text" name="git" class="form-control" id="git" placeholder="" value="<?php echo $gitlinkEdit ?>">
                            </div>
							<li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                            <div class="form-group">
                                <label for="post_title">Instagram Link</label>
                                <input type="text" name="insta" class="form-control" id="insta" placeholder="" value="<?php echo $instalinkEdit ?>">
                            </div>
							<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>

                    <div class="button-container">
                    <button type="submit" name="Submit" class="btn-submit">Submit</button>
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