<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/style.css">

	<title>Admin Panel</title>
	<link href="../images/cj_logo.png" rel="icon">
</head>
<body>

	<header>   
		<!-- REMEMBER isama to sa header.php para masama to sa other pages pati isahan edit -->
		<section id="sidebar">
		<a href="#" class="brand">
			<img src="../images/cj_logo.png" alt="">
			<span class="text">Admin Panel</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-home' ></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-info-square' ></i>
					<span class="text">About</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-image-add'></i>
					<span class="text">Projects</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Contact</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>	
		</section>

		
	</header>



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
				<a href="#" class="btn-download">
					<i class='bx bxs-edit' ></i>
					<span class="text">Edit</span>
				</a>
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

					<div class="form-group">
                      <label for="post_title">Job</label>
                      <input type="text" name="job" class="form-control" id="job" placeholder="Web Dev/Graphic Designer">
                    </div>

					<div class="form-group">
						<div class="custom-file">
							<label for="imageSelect" class="custom-file-label">Current Image</label>
						</div>
					</div>

					<!-- <div class="form-group">
                      <label for="post_title">Job <span style="color:red"> * </span> </label>
                      <input type="text" name="job" class="form-control" id="job" placeholder="Web Dev/Graphic Designer" required="">
                    </div> -->

					<div class="form-group">
                      <label for="post_title">Uploaded CV</label>
                      <input type="text" name="job" class="form-control" id="job" placeholder="CV here" >
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
</body>
</html>