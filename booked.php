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
						<h2 style="color:black;">Get in Touch</h2>
					</header>
					<form method="post" action="booked.php" style="color:black">
						<div class="field">
							<label for="event" style="color:black;">Event date: </label><input id="event" name="tarikh_tempahan" type="date"/>
						</div>
						<div class="field">
							<label for="pakej" style="color:black;">Package</label>
							<input type="text" name="pakej_tempahan" id="pakej_tempahan" />
                        </div>
						<div class="field">
							<label for="lokasi" style="color:black;">Event Location</label>
                            <textarea name="lokasi_tempahan" rows="4"></textarea>
                        </div>
                        <div class="field">
							<label for="huraian" style="color:black;">Comment</label>
                            <textarea name="huraian_tempahan" rows="4"></textarea>
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
$tarikh_tempahan=mysql_real_escape_string($_POST['tarikh_tempahan']);
$pakej_tempahan=mysql_real_escape_string($_POST['pakej_tempahan']);
$lokasi_tempahan=mysql_real_escape_string($_POST['lokasi_tempahan']);
$huraian_tempahan=mysql_real_escape_string($_POST['huraian_tempahan']);
$tarikh= date("Y-m-d H-i-s");
$bool=true;

mysql_connect("localhost", "root","") or die(mysql_error()); //connect to server
mysql_select_db("frisya") or die("Cannot connect to database"); //Connect to database
$query = mysql_query("Select * from tempahan"); //Query the users table
while($row=mysql_fetch_array($query)) //display all rows from query
{
	$table_users=$row['tarikh_tempahan']; 
	if($tarikh_tempahan==$table_users) //checks if there any matching fields
	{
		$bool=false;  //sets bool to false
		Print '<script>alert("date has been taken!");</script>';  //prompts the user
		Print '<script>window.location.assign("booked.php"); </script>';
	}
}
if($bool) //checks if bool is true
{
	mysql_query("INSERT INTO tempahan(tarikh_tempahan,pakej_tempahan,lokasi_tempahan,huraian_tempahan,tarikh) VALUES ('$tarikh_tempahan','$pakej_tempahan','$lokasi_tempahan', '$huraian_tempahan','$tarikh')");  //inserts the value to table users
	Print '<script>alert("Successfully booked!");</script>';
	Print '<script>window.location.assign("member.php");</script>';
}}?>