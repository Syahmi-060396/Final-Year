<?php
	session_start();
	$username=mysql_real_escape_string($_POST['username']);
	$password=MD5($_POST['password']);
    $captcha=$_POST['captcha'];
	$bool=true;
	
	mysql_connect("localhost", "root", "") or die (mysql_error()); //connect to server
	mysql_select_db("frisya") or die ("Cannot connect to database"); //connect to database
	$query=mysql_query("SELECT * FROM `pengguna` WHERE username='$username'"); //query the users table
	$exists=mysql_num_rows($query);
	$table_users = "";
	$table_password = "";
if($captcha==$_SESSION['captcha']['code'])
{
	if($exists>0) //if there are no returning rows or no existing username
	{
		while($row=mysql_fetch_assoc($query)) //disply all rows from query
		{
			$table_users=$row['username']; //the first pswd  row is passed on to table_password
			$table_password=$row['password'];
		}
		if(($username==$table_users) && ($password==$table_password))
		{
			if($password==$table_password)
			{
				$_SESSION['username']=$username; //set the username in a sessio
				header("location:member.php");
			}
		}
		else
		{
			Print '<script>alert("Incorrect password!");</script>'; //prompts user
			Print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect username!");</script>'; //prompts user
		Print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
	}
}
else
{
    Print '<script>alert("Incorrect captcha!");</script>'; //prompts user
   Print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
}
	
	?>
