<?php

$mysqli = new mysqli("localhost","root","","BH");

if(mysqli_connect_errno())
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
else
{
	echo "<html><head><title>Create Account</title>";
	echo "<meta charset='utf-8'>";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1' >";
	echo "<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>";
	echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>";
	echo "<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>";
	echo "</head><link href = 'styles.css' type = 'text/css' rel = 'stylesheet'/>";
	echo "<body>";
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	#protection
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($mysqli,$username);
	$password = mysqli_real_escape_string($mysqli,$password);
	$sql = "SELECT * FROM account WHERE username = '" .$username. "' and password = '" .$password. "'";
	$result = mysqli_query($mysqli,$sql);

	$count =  mysqli_num_rows($result);

	if($count == 1)
	{
		$newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$id = $newArray['account_id'];
		$fname = $newArray['first_name'];
		
		session_start();
		#$_SESSION['account_id'] = $id;
		#$_SESSION['first_name'] = $fname;
		header("location:menu.php"); #research
	}
	else
	{
		echo "<h1><div class='text-center'>Wrong Username or Password!</div></h1>";
		echo "<div class = 'text-center'>";
		echo "<br><a href = 'admin_login.php' ><button type='button' class='btn btn-warning btn-lg'>Back</button></a>";
		echo "</div>";
	}
	
	echo "</body>";
}
?>