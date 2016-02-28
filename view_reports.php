<!DOCTYPE html>
<html>
<head>
<title>-----------</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kreon" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<form name="main_form" method="post" action="view_reports.php" onsubmit="return validate()">
	
	<?php
	session_start(); 

	$mysqli = new mysqli("localhost","root","","bh");

	if(mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	else
	{
	
		#$id  = $_SESSION['account_id'];
		#protection
		$sql = "SELECT * FROM report where repStatus != 'Attended'";
		$result = mysqli_query($mysqli,$sql);

		//$count =  mysqli_num_rows($result);

		if($result)
		{
			$newArray = mysqli_fetch_array($result, MYSQLI_ASSOC);

			echo "<div class='button-grp text-center'><input class='btn btn-success btn-lg' type='submit' name='edit' value='Edit'>";
			echo "<input class='btn btn-success btn-lg' type='submit' name='view' value='View'>";
			echo "<input class='btn btn-success btn-lg' type='submit' name='sort' value='Sort by Urgency'></div>";

			if(isset($_POST['edit'])) 
			{
				#print_r($_POST); #for checking purposes
				$edit_mall_name = NULL;
				foreach ($mysqli->query($sql) as $myrow) 
				{ #for all entries in the mall list
					$edit_entry_id = $myrow["report_id"];	#assign current entry's mall_id to variable
					if(isset($_POST[$edit_entry_id]) != NULL) 
					{	#check if the entry's checkbox was selected (meaning the entry should be deleted)
						$edit_mall_name = $myrow["name"]; #assign entry's mall name to variable
						break; #get out of loop
					}
				}

				if($edit_mall_name == NULL) 
				{
					echo 
					"<p class='notif'>Please select one (1) report to edit, then click [Edit]. <br> <br>
						Note that if multiple entries are selected, only the <b>first one</b> selected on the list will be considered for editing.
					</p>";
				}
				else 
				{
					#display form for EDIT MALL
					echo 
						"<fieldset class = 'notice'>
						<legend> Edit Report Status </legend>
						<!--<form name='edit_form' method='post' action='display_malls.php'>-->";
					echo
						"<select name='status' class='form-control' style='width:auto'>
						    <option value = 'Processing'>Processing</option>
						    <option value = 'Attended'>Attended</option>
							</select>";
					echo "<input class='btn btn-info btn-md' type='submit' name='edit_mall' value='Save Changes' onclick='return validate(this.value)'>
						<input type='hidden' name='id' value='$edit_entry_id'><!--#to send mall_id-->
						<!--</form>-->
					</fieldset>";
				}
			}
			else if(isset($_POST['edit_mall'])) 
			{
				$new_status = $_POST['status']; #get the mall name from the textbox named "new_mall_name"
				$report_id = $_POST['id']; #get the mall id from the hidden input component of the form named "id"
				#print_r($_POST); #for checking purposes
				#execute update
				$update_query = "UPDATE report SET repStatus = '$new_status' WHERE report_id = '$report_id'";
				$mysqli->query($update_query);
				echo "<p class='notif'> Report status updated. </p>";			
				#header("Location: display_malls.php"); #to avoid refresh issues
			}

			else if(isset($_POST['view'])) 
			{
				#print_r($_POST); #for checking purposes
				$edit_mall_name = NULL;
				$lmao;
				foreach ($mysqli->query($sql) as $myrow) 
				{ #for all entries in the mall list
					$edit_entry_id = $myrow["report_id"];	#assign current entry's mall_id to variable
					$lmao = $edit_entry_id;
					if(isset($_POST[$edit_entry_id]) != NULL) 
					{	#check if the entry's checkbox was selected (meaning the entry should be deleted)
						$edit_mall_name = $myrow["name"]; #assign entry's mall name to variable
						break; #get out of loop
					}
				}

				$lmaoSql = "SELECT * FROM report where report_id = " .$lmao;

				if($edit_mall_name == NULL) 
				{
					echo 
					"<p class='notif'> Please select one (1) report to view, then click [View]. <br> <br>
						Note that if multiple entries are selected, only the <b>first one</b> selected on the list will be considered for viewing.
					</p>";
				}
				else 
				{

					#display form for EDIT MALL
					echo 
						"<fieldset class = 'notice'>
						<legend> View Detailed Report </legend>
						<!--<form name='edit_form' method='post' action='display_malls.php'>-->";
						foreach ($mysqli->query($lmaoSql) as $myrow) 
						{ #for all entries in the mall list
							echo "<label>";
							echo $myrow["name"];
							echo "</label>";
							echo "<br>";
							echo $myrow["description"];
						}
					
					echo"</fieldset>";
				}
			
			}

			else if(isset($_POST['sort'])) 
			{
				$sql = "SELECT * FROM report where repStatus != 'Attended' ORDER BY urgency DESC";
			}

			echo "<h1><div class='text-center'>Reports</div></h1>";
			#display mall table contents
			echo "<table class='table table-condensed table-bordered'>";
			echo 
			"<tr>
				<th>Report ID</th> 
				<th>ID Number</th> 
				<th>Student Name</th> 
				<th>Urgency</th> 
				<th>Symptoms</th> 
				<th>Contact of Reporter</th> 
				<th>Status</th> 
			</tr>";
			#for layout purposes start	
			$num = 0;
			$class = "even";
			#end
			foreach ($mysqli->query($sql) as $myrow) 
			{
				$checkbox_id = $myrow["report_id"];
				#for layout purposes start
				#end
				#echo $checkbox_id; #for checking purposes
				echo "<td>";
				echo "<input type='checkbox' name='$checkbox_id'>", "   ", $myrow["report_id"];
				echo "</td><td>";
				echo $myrow["idNumber"];
				echo "</td><td>";
				echo $myrow["name"];
				echo "</td><td>";
				echo $myrow["urgency"];
				echo "</td><td>";
				echo $myrow["symptoms"];
				echo "</td><td>";
				echo $myrow["contact"];
				echo "</td><td>";
				echo $myrow["repStatus"];
				echo "</td></tr>";
			}
			echo "</table>";
		}

	}
	#end of display
?>
	<style>
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
	</form>
		<?php echo "<a href='homepage.php'><center><button class='askhelp' type='submit' class='btn btn-warning btn-lg' id='submit' value ='submit'>BACK</button></center></a>";
		?>
	</body>
</html>