<!---Simple Captcha Session Code --->
<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha']=simple_php_captcha();
?>
<!---End Simple Captcha Session Code --->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="try/css/style.css">
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><img src="images/frisya_logo.png" width="140px" height="65px" style="margin-top:20px"></a>
					<nav id="nav">
						<a href="index.php">Home</a>
                        <a href="package.php">Package</a>
						<a href="ContactUs.php">Contact Us</a>
						<a href="AboutUs.php">About Us</a>
                        <a href="login.php">Login</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- One -->
			<section id="one">
				<div class="inner">
				 <div class="form" style="margin: -8% auto;width:40%; height:30%; position: inherit; color:white;">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup" style="font-size:10pt;">Sign Up</a></li>
        <li class="tab"><a href="#login" style="font-size:10pt;">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h3 style="color:white">Sign Up for Free</h3>
          
          <form action="login.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap" >
              <label style="margin-top:2px;font-size:10pt;">
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first" required autocomplete="off" />
            </div>
              <div class="field-wrap">
              <label style="margin-top:2px;font-size:10pt;">
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="last" required autocomplete="off"/>
            </div>
          </div>
           <div class="top-row">
                <div class="field-wrap">
            <label style="margin-top:2px;font-size:10pt;">
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label style="margin-top:2px;font-size:10pt;">
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
              </div>        
             <div class="field-wrap">
              <label style="margin-top:2px;font-size:10pt;">
                Address<span class="req">*</span>
              </label>
              <input type="text" name="address" required autocomplete="off"/>
              </div>
              
               <div class="field-wrap">
              <label style="margin-top:2px;font-size:10pt;">
                Phone Number <span class="req">*</span>
              </label>
              <input type="text" name="phone" required autocomplete="off"/>
              </div>
          
          <button type="submit" style="font-size:12pt; padding-top:0%" class="button button-block"/>Get Started
          
          </form>

        </div>
        
        <div id="login">   
          <h3 style="color:white">Welcome Back!</h3>
          
          <form action="checklogin.php" method="post">
          
            <div class="field-wrap">
            <label style="margin-top:2px;font-size:10pt;">
              Username
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label style="margin-top:2px;font-size:10pt;">
              Password
            </label>
            <input type="password" name="password"required autocomplete="off"/>
          </div>
               <div class="field-wrap">
            <!---Start Simple Captcha Code --->
            <label style="margin-top:2px;font-size:10pt;">
             Captcha
            </label>
            <input type="text" name="captcha"required autocomplete="off"/>
            <?php echo '<img src="'.$_SESSION['captcha']['image_src'].'" alt="CAPTCHA code">';?>
            <!---End Simple Captcha Code--->
          </div>
          <button class="button button-block" style="font-size:12pt; padding-top:0%" />Log In
          
            </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <div style="height:100px;">
    </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="try/js/index.js"></script>	
				
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
$username=mysql_real_escape_string($_POST['username']);
$first=mysql_real_escape_string($_POST['first']);
$last=mysql_real_escape_string($_POST['last']);
$password=mysql_real_escape_string($_POST['password']);
$address=mysql_real_escape_string($_POST['address']);
$phone=mysql_real_escape_string($_POST['phone']);
$date=date("Y-m-d H-i-s");
$bool=true;

mysql_connect("localhost", "root","") or die(mysql_error()); //connect to server
mysql_select_db("frisya") or die("Cannot connect to database"); //Connect to database
$query = mysql_query("Select * from pengguna"); //Query the users table
while($row=mysql_fetch_array($query)) //display all rows from query
{
	$table_users=$row['username']; 
	if($username==$table_users) //checks if there any matching fields
	{
		$bool=false;  //sets bool to false
		Print '<script>alert("Username has been taken!");</script>';  //prompts the user
		Print '<script>window.location.assign("login.php"); </script>';
	}
}
if($bool) //checks if bool is true
{
    $encrypted_password=md5($password);
	mysql_query("INSERT INTO pengguna(username,first,last,password,address,phone,date) VALUES ('$username','$first','$last', '$encrypted_password','$address','$phone','$date')");  //inserts the value to table users
	Print '<script>alert("Successfully Registered!");</script>';
	Print '<script>window.location.assign("login.php");</script>';
}}?>