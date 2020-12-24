<?php
include("path.php");
?>
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="member.php" class="logo"><img src="images/frisya_logo.png" width="140px" height="65px" style="margin-top:20px"></a>
					<nav id="nav">
						<a href="member.php">Home</a>
                        <a href="upackage.php">Package</a>
						<a href="uContactUs.php">Contact Us</a>
						<a href="uAboutUs.php">About Us</a>
                         <a href="editprofile.php">Welcome <?php echo $_SESSION['username']; ?>!</a>
                        <a href="logout.php">Logout</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special">
						<h1 style="color:black;">ABout us</h1>
                        <p></p>
					</header>
					<p><span class="image left"><img src="images/3.jpg" alt="" /></span><br><br><br> Frisya Bridal is a wedding planner company. They usually operate after working hours from 5.00 p.m untill 10.00 p.m. This company was stand from 16 December 2015 untill today. This company is usually doing their operation and services around Muar, Johor</p>
				</div>
			</section>
         <div style="height:100px;">
    </div>

		<!-- Footer -->
			<section id="footer" style="background-color:black;">
				<div class="inner">
					<div class="copyright">
						
					</div>
				</div>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>