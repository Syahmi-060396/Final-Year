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
        <style>
        table {
       width:80%;
         }
       table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
         }
    th, td {
 padding: 0px;
    text-align: center;
      }
            </style>
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
        	<!-- One -->
			<section id="one">
				<div class="inner">
					<header>
						<h2>PACKAGE offered</h2>
					</header>
                    <center>
                    <table>
                    <tr>
                    <td>
                    <p><img src="images/1.jpg" style="width:200px; height:185px;" alt="" />
                        </td>
                    <td>
                    <img src="images/4.jpg" style="width:200px; height:200px;"  alt="" />
                        </td>
                        </tr>
                    <tr>
                    <td>
                    
                      The decoration for the main stage is fully with the <br>deceration of fresh flowers and the <br> stage can be decorated <br> 
                    based on the customer weddings concept.  
                    </td> 
                    <td>
                      The cloth for men and women that are usually used when<br> it is matched with the deceration of<br> the mainstage. The cloth is also<br> can change based on customer concept.
                    </td>
                    </tr>
                    </table>
                      <a class="btntmp" href="booked.php" style="background-color:white; color:black; border-style: solid; border-width:2px; border-color:black;padding:20px;">BOOKED</a> 
                    </center>
                    
                   
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