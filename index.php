<?php require_once("admin/include/DB.php"); ?>
<?php require_once("admin/include/function.php") ?>
<?php require_once("admin/include/session.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/animate.min.css">
    <script src="https://kit.fontawesome.com/b2c2ccdc00.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
    
    <title> Portfolio </title>
    <link href="images/cj_logo.png" rel="icon">

</head>

<body>
<div class="l-wrapper">
    <header id="navbar">
        <div class="container">
            <nav>
                <div class="logo">
                    <a href="admin/login.php"><img src="images/cj_logo.png" alt="Portfolio Logo"></a>
                </div>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#projectSection">Projects</a></li>
                    <!-- <li><a href="#">Services</a></li> -->
                    <li><a href="#contactSect">Contact</a></li>
                </ul>
                <button class="hamburger">
                    <div class="bar"></div>
                </button>
            </nav>
        </div>
    </header>

    <?php
        global $ConnectingDB;
			
        // echo ErrorMessage();
        // echo SuccessMessage();

        $sql = "SELECT * FROM homepage WHERE id = 1";
        $stmt = $ConnectingDB->query($sql);
        while ($DataRows = $stmt->fetch()){
            $introhan		=	$DataRows["intro"];
            $Name	        =	$DataRows["name"];
            $Image	        =	$DataRows["image"];
            $CV		        =	$DataRows["cv_name"];
            $Filepath	    =	$DataRows["cv_loc"];
        }
    ?>

    <section class="home" id="home">
        <div class="container">
            <div class="home-info">
                <div class="left">
                    <h3><?php echo $introhan; ?></h3>
                    <h1><?php echo $Name; ?></h1>
                    <h4>
                        I'm a <span class="multiple"></span>
                    </h4>
                    <!-- <p>
                        Hello, I'm Criston Jade B. Enolpe. A Full-stack developer, and graphic designer.
                        I specialize in crafting engaging user experiences, developing reliable web application,
                        and producing eye-catching designs.
                    </p> -->
                    <button>
                        <a href="admin/upload/<?php echo $CV; ?>">Download CV</a>
                     </button>
                </div>
                <div class="right">
                    <div class="profile" data-aos="fade-up" data-aos-duration="1500">
                        <img src="admin/img/<?php echo $Image; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
		<!-- ==========================
        ABOUT SECTION  
        =========================== -->
        <section class="about" id="about">
            <div class="container-about">
              <!-- WELCOME TEXT -->
              <!-- <div class="row"> -->

                <!-- ilalagay sa contact -->
                <!-- <div class="col-md-4">
                    <ul class="info">
						<li><span class="first-block">Full Name:</span><span class="second-block">Criston Jade B. Enolpe</span></li>
						<li><span class="first-block">Date of Birth:</span><span class="second-block">November 13, 1998</span></li>
						<li><span class="first-block">Email:</span><span class="second-block">cristonjade@gmail.com</span></li>
						<li><span class="first-block">Phone:</span><span class="second-block">09361877020</span></li>
						<li><span class="first-block">Address:</span><span class="second-block">Zamboanga City</span></li>
					</ul>
                </div> -->
                <div class="short-desc">
                    <h2>A little about me</h2>
					<p>Hello, I'm Criston Jade B. Enolpe. A Full-stack developer, and graphic designer.
                        I specialize in crafting engaging user experiences, developing reliable web application,
                        and producing eye-catching designs.
                    </p>
						<!-- <ul class="fh5co-social-icons">
							<li><a href="https://www.facebook.com/Ceejayski/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
							<li><a href="https://github.com/Ceejayglitch" target="_blank"><i class="fa-brands fa-github"></i></a></li>
							<li><a href="https://www.instagram.com/c_jade.mp4/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
						</ul> -->
                </div>
              </div>

            <!-- Resume -->

            <div id="fh5co-resume" class="fh5co-bg-color">
                <div class="container">
                    <div class="row justify-content-center pb-5">
                        <div class="col-md-12 heading-section text-center ftco-animate" data-aos="fade-up" data-aos-duration="1000">
                            <h1 class="big big-2">Resume</h1>
                            <h2 class="mb-4"> My Resume</h2>
                        </div>
                    </div>
                    <div class="row-resume">
                        <div class="col-md-12 col-md-offset-0">
                            <ul class="timeline">
                                <li class="timeline-heading text-center" data-aos="fade-up" data-aos-duration="200">
                                    <div><h3>Education</h3></div>
                                </li>
                                <li class="timeline-unverted">
                                    <div class="timeline-badge"><i class="fa-solid fa-graduation-cap"></i></div>
                                    <div class="timeline-panel"  data-aos="fade-right" data-aos-duration="1800">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">College</h3>
                                            <span class="company">2020-2024</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Western Mindanao State University</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted animate-box">
                                    <div class="timeline-badge"><i class="fa-solid fa-graduation-cap"></i></div>
                                    <div class="timeline-panel" data-aos="fade-left" data-aos-duration="1800">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">Senior High School</h3>
                                            <span class="company">2018-2020</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>STI Colleges Zamboanga</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-unverted">
                                    <div class="timeline-badge"><i class="fa-solid fa-graduation-cap"></i></div>
                                    <div class="timeline-panel" data-aos="fade-right" data-aos-duration="1800">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">Junior Highschool</h3>
                                            <span class="company">2011-2017</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Manicahan National Highschool</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted animate-box">
                                    <div class="timeline-badge"><i class="fa-solid fa-graduation-cap"></i></div>
                                    <div class="timeline-panel" data-aos="fade-left" data-aos-duration="1800">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">Grade School</h3>
                                            <span class="company">2005-2009</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Canelar Elementary School <br> Manicahan Poblacion Elementary School</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End RESUME -->

            <!-- SKILLS -->

            <div class="skills" id="skillsSection">
                <div class="container">
                    <div class="row justify-content-center pb-5">
                        <div class="col-md-12 heading-section text-center ftco-animate" data-aos="fade-up" data-aos-duration="1000">
                            <h1 class="big big-2">Skills</h1>
                            <h2 class="mb-4"> My Skills</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="skill-content col-md-6 col-xs-11" data-aos="fade-right" data-aos-duration="1000">
                            <h2>SKILLS</h2>
                            <h4>Full-stack Developer &AMP; Graphic Designer</h4>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
                            <p>Dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p> -->
                        </div>
                        <div class="skillbar col-md-6 col-xs-11" data-aos="fade-left" data-aos-duration="1000">
                            <span class="num" data-val="75">Web Design <small>75%</small></span> <!-- php echo code to change static 75 and data val into something editable-->
                                <div class="progress">
                                    <div data-aos="fade-right" data-aos-duration="1800" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                </div>
                            <span class="num" data-val="80">PHP <small>80%</small></span>
                                <div class="progress">
                                    <div data-aos="fade-right" data-aos-duration="2000" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            <span class="num" data-val="50">Graphic Design <small>50%</small></span>
                                <div class="progress">
                                    <div data-aos-offset="0" data-aos="fade-right" data-aos-duration="2500" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            <span class="num" data-val="80">HTLM5 &AMP; CSS3 <small>80%</small></span>
                                <div class="progress">
                                    <div data-aos-offset="0" data-aos="fade-right" data-aos-duration="3000" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            
          </section>

                        <!-- Projects Section -->

    <section class="projects" id="projectSection">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="big big-2">Projects</h1>
              <h2 class="mb-4">My Projects</h2>
            </div>
        </div>
        <div id="fh5co-work" class="fh5co-bg-dark">
            <div class="container">

                <div class="row">
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="images/Art.jpg"  target="_blank" class="work" style="background-image: url(images/Art.jpg);">
                            <div class="desc">
                                <h3>Brutalism Poster</h3>
                                <span>Graphic Design</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="images/Enolpe_Y2K_Music_Festival_Poster.png" target="_blank" class="work" style="background-image: url(images/Enolpe_Y2K_Music_Festival_Poster.png);">
                            <div class="desc">
                                <h3>Y2K Poster</h3>
                                <span>Graphic Design</span>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="images/Gboy.png" target="_blank" class="work" style="background-image: url(images/Gboy.png);">
                            <div class="desc">
                                <h3>Brutalism Poster</h3>
                                <span>Graphic Design</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="images/SMOKING.png" target="_blank" class="work" style="background-image: url(images/SMOKING.png);">
                            <div class="desc">
                                <h3>Brutalism Poster</h3>
                                <span>Graphic Design</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="#" class="work" >
                            <div class="desc">
                                <h3>Project Name</h3>
                                <span>Website</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="#" class="work" >
                            <div class="desc">
                                <h3>Project Name</h3>
                                <span>Illustration</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="#" class="work" >
                            <div class="desc">
                                <h3>Project Name</h3>
                                <span>Brading</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center col-padding animate-box">
                        <a href="#" class="work" >
                            <div class="desc">
                                <h3>Project Name</h3>
                                <span>Illustration</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="contacts" id="contactSect">
        <div class="container-about">
              <!-- WELCOME TEXT -->
              <div class="row">
                <!-- ilalagay sa contact -->
                <div class="col-md-4">
                    <ul class="info">
						<li><span class="first-block">Full Name:</span><span class="second-block">Criston Jade B. Enolpe</span></li>
						<!-- <li><span class="first-block">Date of Birth:</span><span class="second-block">November 13, 1998</span></li> -->
						<li><span class="first-block">Email:</span><span class="second-block">cristonjade@gmail.com</span></li>
						<li><span class="first-block">Phone:</span><span class="second-block">09361877020</span></li>
						<li><span class="first-block">Address:</span><span class="second-block">Zamboanga City</span></li>
					</ul>
                </div>
                <div class="col-md-8">
                    <h2>Contact Me</h2>
					<p>Have a project in mind or just want to say hello? I'd love to hear from you! Feel free to reach out using the contact information given or by filling out the form below. </p>
						<ul class="fh5co-social-icons">
							<li><a href="https://www.facebook.com/Ceejayski/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
							<li><a href="https://github.com/Ceejayglitch" target="_blank"><i class="fa-brands fa-github"></i></a></li>
							<li><a href="https://www.instagram.com/c_jade.mp4/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
						</ul>
                </div>
              </div>
            </div>

            <!-- =========== FORM ========== -->

            <div class="container-form">
                <div class="contactbox">
                    <div class="left-form">

                    </div>

                    <div class="right-form">
                    <h2>Contact Form</h2>
                    <input type="text" id="name" class="field" placeholder="Your Name">
                    <input type="email" id="email" class="field" placeholder="Your Email">
                    <input type="text" id="num" class="field" placeholder="Your Number">
                    <textarea class="field" id="msg" placeholder="Message"></textarea>
                    <button>
                        <span class="box">
                            Submit
                        </span>
                    </button>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="assets/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
</body>

</html>