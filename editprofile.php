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
						<h2 style="color:black;"></h2>
					</header>
					<form method="post" action="editprofile.php" style="color:black">
						<div class="field half first">
							<label for="first" style="color:black;">first</label>
							<input type="text" name="first" id="first" />
						</div>
						<div class="field half">
							<label for="last" style="color:black;">last</label>
							<input type="text" name="last" id="last" />
                        </div>
                        <div class="field half first">
							<label for="old" style="color:black;">Old password</label>
							<input type="password" name="password" id="password" />
						</div>
						<div class="field half">
							<label for="last" style="color:black;">new password</label>
							<input type="password" name="password" id="npassword" />
                        </div>
                        <div class="field half first">
							<label for="last" style="color:black;">new password</label>
							<input type="password" name="password" id="npassword" />
                        </div>
                        <div class="field half">
							<label for="phone" style="color:black;">Phone</label>
                            <input type="text" name="phone" />
                        </div>
                        <div class="field">
							<label for="address" style="color:black;">address</label>
                            <textarea name="address" rows="5"></textarea>
                        </div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" style="color:black;border-color:black;"/>
						</ul>
					</form>
                </div>
        </section>
        
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
$first=mysql_real_escape_string($_POST['first']);
$last=mysql_real_escape_string($_POST['last']);
$password=mysql_real_escape_string($_POST['password']);
$npassword=mysql_real_escape_string($_POST['npassword']);
$cpassword=mysql_real_escape_string($_POST['cpassword']);
$phone=mysql_real_escape_string($_POST['phone']);
$address=mysql_real_escape_string($_POST['address']);
$date=date("Y-m-d H-i-s");
$bool=true;

mysql_connect("localhost", "root","") or die(mysql_error()); //connect to server
mysql_select_db("frisya") or die("Cannot connect to database"); //Connect to database
$query = mysql_query("Select * from pengguna where username='".$_SESSION['login']."'"); //Query the users table
while($row=mysql_fetch_array($query)) //display all rows from query
{
	$table_users=$row['password']; 
	if($password==$npassword) //checks if there any matching fields
	{
		$bool=false;  //sets bool to false
		Print '<script>alert("Password is same as previous!");</script>';  //prompts the user
		Print '<script>window.location.assign("editprofile.php"); </script>';
	}
    else if($npassword!=$cpassword)
    {
        $bool=false;  //sets bool to false
		Print '<script>alert("Password is not confirm!");</script>';  //prompts the user
		Print '<script>window.location.assign("editprofile.php"); </script>';
    }
}
if($bool) //checks if bool is true
{
$npassword=$password;
 mysql_query("update pengguna set (first= '".$_POST['first']."',last='".$_POST['last']."',password='".$_POST['password']."',phone='".$_POST['phone']."',address='".$_POST['address']."',date='".$_POST[date("Y-m-d H-i-s")]."') where username='"._SESSION['login']."')");  //inserts the value to table users
	Print '<script>alert("Successfully updated!");</script>';
	Print '<script>window.location.assign("editprofile.php");</script>';
}}?>