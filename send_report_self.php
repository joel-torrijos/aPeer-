<?php

$mysqli = new mysqli("localhost","root","","bh");

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
	
	$idNum = $_POST["idNum"];
	$urgency = $_POST["optionsRadios"];
	$fName = $_POST["fName"]; #friends name
	$contact = $_POST["contact"];
	$desc = $_POST["desc"];

	$symptoms = "";

	if(!empty($_POST['cbox'])) {
	    foreach($_POST['cbox'] as $check) {
	    	$temp = (string) $check;
	        $symptoms .= $temp; //echoes the value set in the HTML form for each checked checkbox.
	        $symptoms .= ", ";
	    }
	}
	#protection
	$idNum = stripslashes($idNum);
	$idNum = mysqli_real_escape_string($mysqli,$idNum);
	$urgency = stripslashes($urgency);
	$urgency = mysqli_real_escape_string($mysqli,$urgency);
	$fName = stripslashes($fName);
	$fName = mysqli_real_escape_string($mysqli,$fName);
	$contact = stripslashes($contact);
	$contact = mysqli_real_escape_string($mysqli,$contact);
	$desc = stripslashes($desc);
	$desc = mysqli_real_escape_string($mysqli,$desc);
	$symptoms = stripslashes($symptoms);
	$symptoms = mysqli_real_escape_string($mysqli,$symptoms);

	#username has to be unique!
	$sql = "SELECT * FROM student WHERE idNumber = " .$idNum;
	$result = mysqli_query($mysqli,$sql);

	$count =  mysqli_num_rows($result);

	#symptoms VARCHAR(255),

	#valid id number
	if($count > 0)
	{
		$sql = "INSERT INTO report (idNumber,name,urgency,repName,contact,symptoms,relation,repStatus,description) 
				VALUES (" .$idNum. ", '" .$fName. "', " .$urgency. ", '" .$fName. "', '" .$contact. "', '" 
					.$symptoms. "', 'Self', 'Pending', '" .$desc."')";
		$res = mysqli_query($mysqli, $sql);
		if ($res === TRUE) 
		{
			echo "<h1><div class='text-center'>A report has been sent. Thank you!</div></h1>";
		echo "<div>";
		echo "<style>
		.askhelp {
			min-width: 250px;
			min-height: 50px;
			color: #FBFBEA; 
			background-color: #F7943E;
			border-radius: 24px;
			font-size: 18px;
			font-family: 'Kreon';
			margin-bottom: 20px;
		}
	</style>
	<a href='homepage.php'><center><button class='askhelp' type='submit' class='btn btn-warning btn-lg' id='submit' value ='submit'>BACK</button></center></a>";
		echo "</div>";
		}
		else {
		printf("Could not send report: %s\n", mysqli_error($mysqli));
		echo "<br><a href = 'report_self.php' ><button>Send Again</button></a></br>";
			echo "<br><a href = 'homepage.php' ><button>Back</button></a></br>";
		}
	}
	else
	{
		echo "<h1><div class='text-center'>Invalid ID Number!</div></h1>";
		echo "<div>";
		echo "<style>
		.askhelp {
			min-width: 250px;
			min-height: 50px;
			color: #FBFBEA; 
			background-color: #F7943E;
			border-radius: 24px;
			font-size: 18px;
			font-family: 'Kreon';
			margin-bottom: 20px;
		}
	</style>
	<a href='report_self.php'><center><button class='askhelp' type='submit' class='btn btn-warning btn-lg' id='submit' value ='submit'>Send Again</button></center></a>;
	<a href='homepage.php'><center><button class='askhelp' type='submit' class='btn btn-warning btn-lg' id='submit' value ='submit'>BACK</button></center></a>";
		echo "</div>";
		echo $urgency;
		echo "</div>";
	}
	
	echo "</body>";
	echo "</html>";
	
	mysqli_close($mysqli);
}
?>