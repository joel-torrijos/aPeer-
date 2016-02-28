<!DOCTYPE html>
<html lang="en">
<head>
  <title>Send a Report</title>
  <script>
function validateForm() {
  var a = document.forms["myForm"]["idNum"].value;
  var b = document.forms["myForm"]["fName"].value;
  var c = document.forms["myForm"]["optionsRadios"].value;
  var x = document.forms["myForm"]["relation"].value;
  var y = document.forms["myForm"]["repName"].value;
  var z = document.forms["myForm"]["contact"].value;
  if (a == "" || b == "" || y == "" || z == "" || x == "0") {
    alert("Some fields need to be field!");
    return false;
  } 
}
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kreon" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<style> body { background-color: #FBFBEA } </style>
<body>
<form action = "send_report.php" onsubmit = "return validateForm()"  method = "POST" name = "myForm">
	<div class="container"> 
      <img class="img-responsive center-block" src="pleasehelp.png" class="img-rounded" style="width: 25%; height=auto;"> 
    </div>
<div class="container" style="font-family:Kreon; font-size:16px; color:#F7943E;">
  <div class="row">
   <div class="col-md-offset-3 col-md-6	 col-xs-12">
  <form role="form">
    <div class="col-xs-3">
      <label for="id">ID Number:</label>
	</div>
	<div class="col-xs-9">
      <input type="text" class=form-control id = "idNum" name="idNum">
    </div><br><br><br>
    <div class="col-xs-3">
      <label for="name">Name:</label>
	</div>
	<div class="col-xs-9">
      <input type="text" class=form-control id = "fName" name="fName">
    </div><br><br>
	<div class="col-xs-3">
	<label for="name">Urgency:</label>
	</div>
	<div class="col-xs-9 radio">
		<label>
			<input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
			1
	</label>
		<label>
			<input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
			2
		</label>
		<label>
			<input type="radio" name="optionsRadios" id="optionsRadios3" value="3" checked>
			3
		</label>
		<label>
			<input type="radio" name="optionsRadios" id="optionsRadios4" value="4">
			4
	</label>
		<label>
			<input type="radio" name="optionsRadios" id="optionsRadios5" value="5" >
			5
		</label>
	</div><br><br><br>
	
	<div class="col-xs-3">
      <label for="rel">Your Relation:</label>
	 </div>
	 <div class="col-xs-9">
      <select name= "relation"class="form-control col-xs-4 text-warning" id="relation" name = 'relation'>
		<option value = '0'></option>
		<option value = 'Family'>Family</option>
		<option value = 'Friends'>Friends</option>
		<option value = 'Professor'>Professor</option>
		<option value = 'Other'>Other</option>
  </select>
    </div><br><br><br>
	<div class="col-xs-3" id="symptoms">
	<label for="symptoms">Symptoms:</label>
	</div>
	<div class="btn-group col-xs-9" data-toggle="buttons">
		<label class="btn btn-warning btn-block">
			<input type="checkbox" name="cbox[]" value="Self Esteem Issues" autocomplete="off"> Self-Esteem Issues
		</label>
	</div><br><br>
	<div class="col-xs-3"></div>
	<div class="btn-group col-xs-9" data-toggle="buttons">
		<label class="btn btn-warning btn-block">
			<input type="checkbox" name="cbox[]" value="Acads Stress" autocomplete="off"> Academic Stress
		</label>
	</div><br><br>
	<div class="col-xs-3"></div>
	<div class="btn-group col-xs-9" data-toggle="buttons">
		<label class="btn btn-warning btn-block">
			<input type="checkbox" name="cbox[]" value="Personal Problems" autocomplete="off"> Personal Problems
		</label>
	</div><br><br>
	<div class="col-xs-3"></div>
	<div class="btn-group col-xs-9" data-toggle="buttons">
		<label class="btn btn-warning btn-block">
			<input type="checkbox" name="cbox[]" value="Heartbreak" autocomplete="off"> Romantic Problems
		</label>
	</div><br><br>
	<div class="col-xs-3"></div>
	<div class="btn-group col-xs-9" data-toggle="buttons">
		<label class="btn btn-warning btn-block">
			<input type="checkbox" name="cbox[]" value="Depression" autocomplete="off"> Depression/Anxiety
		</label>
	</div><br><br>
	<div class="col-xs-3"></div>
	<div class="btn-group col-xs-9" data-toggle="buttons">
		<label class="btn btn-warning btn-block">
			<input type="checkbox" name="cbox[]" value="Self-Harm" autocomplete="off"> Self-Harm
		</label>
	</div><br><br><br>
	<div class="col-xs-3">
		<fieldset class="form-group">
		<label for="Description">Describe:</label>
		</div>
		<div class="col-xs-9">
		<textarea class="form-control" id="Description" name = "desc" rows="6"></textarea>
  </div><br>
  </fieldset>
  <legend><br> </legend>
  <div class="col-xs-3">
  <label for="repName">Your Name:</label>
  </div>
  <div class="col-xs-9">
  <input type="text" class="form-control" id = 'repName' name="repName">
  </div><br><br><br>
  <div class="col-xs-3">
  <label for="contact">Your Contact Details:</label>
  </div><br>
  <div class="col-xs-9">
  <input type="text" class="form-control" id = "contact" name="contact"><br>
  </div><br><br><br>
	<div class=" text-center">
	<style>
		.submit {
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
		<button class="submit" type="submit" class="btn btn-success btn-lg" id="submit" value ="submit">SUBMIT DETAILS</button>
	</div>
  </form
  </div>
  </div>
</div>
</body>
</html>