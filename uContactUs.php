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
			<section id="main">
			<div class="inner">
					  <header>
						<h2 style="color:black;">Contact Us</h2>
					</header>
					<form method="post" action="uContactUs.php" style="color:black">
						<div class="field half first">
							<label for="email" style="color:black;">Email</label>
							<input type="email" name="email" id="email" />
						</div>
						<div class="field half">
							<label for="tujuan" style="color:black;">Tujuan aduan</label>
							<input type="text" name="tujuan_aduan" id="tujuan_aduan" />
                        </div>
						<div class="field">
							<label for="message" style="color:black;">Message</label>
                            <textarea name="cacatan_aduan" rows="5"></textarea>
                        </div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" style="color:black;border-color:black;"/>
						</ul>
					</form>
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

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$email=mysql_real_escape_string($_POST['email']);
$tujuan_aduan=mysql_real_escape_string($_POST['tujuan_aduan']);
$cacatan_aduan=mysql_real_escape_string($_POST['cacatan_aduan']);
$tarikh_aduan=date("Y-m-d H-i-s");
$bool=true;

mysql_connect("localhost", "root","") or die(mysql_error()); //connect to server
mysql_select_db("frisya") or die("Cannot connect to database"); //Connect to database
$query = mysql_query("Select * from aduan"); //Query the users table
while($row=mysql_fetch_array($query)) //display all rows from query
{
	$table_users=$row['email']; 
	if($email==$table_users) //checks if there any matching fields
	{
		$bool=false;  //sets bool to false
		Print '<script>alert("email has been taken!");</script>';  //prompts the user
		Print '<script>window.location.assign("ContactUs.php"); </script>';
	}
}
if($bool) //checks if bool is true
{
 mysql_query("INSERT INTO aduan(email,tujuan_aduan,cacatan_aduan,tarikh_aduan) VALUES ('$email','$tujuan_aduan','$cacatan_aduan','$tarikh_aduan')");  //inserts the value to table users
	Print '<script>alert("Successfully Registered!");</script>';
	Print '<script>window.location.assign("member.php");</script>';
}}?>