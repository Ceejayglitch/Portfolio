<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php") ?>
<?php require_once("include/session.php") ?>
<?php Confirm_Login() ?>

<header>   
		<!-- REMEMBER isama to sa header.php para masama to sa other pages pati isahan edit -->
		<section id="sidebar">
		<a href="#" class="brand">
			<img src="../images/cj_logo.png" alt="">
			<span class="text">Admin Panel</span>
		</a>
		<ul class="side-menu top">
			<li <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') echo 'class="active"'; ?>>
			<a href="admin.php">
				<i class='bx bxs-home' ></i>
				<span class="text">Home</span>
			</a>
			</li>
			<li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>
				<a href="about.php">
					<i class='bx bxs-info-square' ></i>
					<span class="text">About</span>
				</a>
			</li>
			<li <?php if (basename($_SERVER['PHP_SELF']) == 'projects.php') echo 'class="active"'; ?>>
				<a href="projects.php">
					<i class='bx bxs-image-add'></i>
					<span class="text">Projects</span>
				</a>
			</li>
			<li <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?>>
				<a href="contact.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Contact</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>	
		</section>

		
	</header>